<?php
namespace App\Repo\Permission;
use App\Models\Admin\Permission;
use Illuminate\Http\Request;
class PermissionRepo implements PermissionInterface{
	private $permission;
	public function __construct(Permission $permission){
		$this->permission=$permission;
	}	

	public function getPermission(){
		return $this->permission->getPermission();
	}

	public function savePermission(Request $request){
		return $this->permission->savePermission($request);
	}

	public function findPermission($id){
		return $this->permission->findOrfail($id);
	}

	public function updatePermission(Request $request,$id){
		return $this->permission->updatePermission($request,$id);
	}

	public function deletePermission($id){
		return $this->permission->deletePermission($id);
	}
}