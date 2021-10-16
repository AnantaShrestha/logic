<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Role;
use App\Models\Admin\Permission;

class Permission extends Model
{
    protected $table='permissions';
    protected $guarded=[];

    public function roles()
    {
        return $this->belongsToMany(Role::class,'role_permission', 'permission_id', 'role_id');
    }

    public function administrators()
    {
        return $this->belongsToMany(Adminuser::class,'admin_permission', 'permission_id', 'admin_id');
    }

    public function getPermission(){
        return self::orderBy('created_at','desc')
        ->paginate(PAGINATION_NUMBER);
    }

    public function getTableData($data){
        $query=$data['query'];
        $query=str_replace(" ", "%", $query);
        return self::where('id', 'like', '%'.$query.'%')
        ->orWhere('name', 'like', '%'.$query.'%')
        ->orderBy('created_at','desc')
        ->paginate(PAGINATION_NUMBER);
    }

    public function savePermission($data){
        return self::create($data);
    }

    public function updatePermission($data,$id){
        return self::where('id',$id)->update($data);
    }

    public function deletePermission($id){
        return self::where('id',$id)
                ->delete();
    }   

}
