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
}