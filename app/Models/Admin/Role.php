<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Adminuser;
use App\Models\Admin\Permission;

class Role extends Model
{
    protected $guarded=[];
    protected $table='roles';

    public function administrators()
    {

        return $this->belongsToMany(Adminuser::class,'admin_role', 'role_id', 'admin_id');
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'role_permission', 'role_id', 'permission_id');
    }

    public function getRole(){
       return self::with('permissions','administrators')->orderBy('created_at','desc')
        ->paginate(PAGINATION_NUMBER);
    }

    public function getTableData($data){
        $query=$data['query'];
        $query=str_replace(" ", "%", $query);
        return self::where('id', 'like', '%'.$query.'%')
        ->orWhere('name', 'like', '%'.$query.'%')
        ->orderBy('created_at','desc')
        ->with('permissions','administrators')
        ->paginate(PAGINATION_NUMBER);
    }

    public function saveRole($data){
        return self::create($data);
    }

    public function findRole($id){
        return self::findOrFail($id);
    }

    public function updateRole($data,$id){
        $role=$this->findRole($id);
        $role->update($data);
        return $role;
    }

    public function deleteRole($id){
        $role=$this->findRole();
        $role->delete();
        return $role;
    }
}
