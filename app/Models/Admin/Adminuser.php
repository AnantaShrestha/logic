<?php
namespace App\Models\Admin;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Role;
use App\Models\Admin\Permission;
class Adminuser extends Model implements AuthenticatableContract{
	use Authenticatable;
	protected $table='admin_user';
	protected $guarded = [];
    protected $hidden  = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class,'admin_role', 'admin_id', 'role_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'admin_permission', 'admin_id', 'permission_id');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function saveUser($data){
        return self::create($data);
    }

    public function getUser(){
        return self::with('permissions','roles')->orderBy('created_at','desc')
        ->paginate(PAGINATION_NUMBER);
    }

    public function getTableData($data){
        $query=$data['query'];
        $query=str_replace(" ", "%", $query);
        return self::where('id', 'like', '%'.$query.'%')
        ->orWhere('name', 'like', '%'.$query.'%')
        ->orWhere('username', 'like', '%'.$query.'%')
        ->orderBy('created_at','desc')
        ->with('permissions','roles')
        ->paginate(PAGINATION_NUMBER);
    }

    public function findUser($id){
        return self::findOrFail($id);
    }

    public function updateUser($data,$id){
        $user=$this->findUser($id);
        $user->update($data);
        return $user;
    }
    public function deleteUser($id){
       $user=$this->findUser($id);
       $user->delete();
       return $user;
    }
}