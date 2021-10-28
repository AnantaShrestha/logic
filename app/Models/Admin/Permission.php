<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Role;
use App\Models\Admin\Permission;
use Illuminate\Http\Request;
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

    public function findPermission($id){
        return self::findOrFail($id);
    }

    public function updatePermission($data,$id){
        return self::where('id',$id)->update($data);
    }

    public function deletePermission($id){
        return self::where('id',$id)
                ->delete();
    } 

    public function passRequest(): bool{
        if (empty($this->http_uri)) {
            return false;
        }
        $uriCurrent = \Route::getCurrentRoute()->uri;
        $urlArr = explode(',', $this->http_uri);
        if(in_array($uriCurrent,$urlArr)){
            return true;
        }
        return false;

    }

}
