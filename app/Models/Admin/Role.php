<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Adminuser;
use App\Models\Admin\Permission;

class Role extends Model
{
    protected $table='roles';

    public function administrators()
    {

        return $this->belongsToMany(Adminuser::class,'admin_role', 'role_id', 'admin_id');
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'role_permission', 'role_id', 'permission_id');
    }
}
