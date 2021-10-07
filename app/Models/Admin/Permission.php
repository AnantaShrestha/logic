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

    public function savePermission($data){
        $data=[
            'name' => $data->name,
            'slug' => $data->slug ?? \Str::slug($data->name),
            'http_uri' => implode(',', ($data->http_uri ?? [])),
        ];
        return self::create($data);
    }

    public function updatePermission($data,$id){
        $data=[
            'name' => $data->name,
            'slug' => $data->slug ?? \Str::slug($data->name),
            'http_uri' => implode(',', ($data->http_uri ?? [])),
        ];
        return self::where('id',$id)->update($data);
    }

}