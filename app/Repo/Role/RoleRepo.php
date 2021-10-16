<?php
namespace App\Repo\Role;
use App\Models\Admin\Role;
use Illuminate\Http\Request;

class RoleRepo implements RoleInterface{
	private $role;
	public function __construct(Role $role){
		$this->role=$role;
	}	

	public function getAll(){
		return $this->role->all();
	}

	public function getRole(){
		return $this->role->getRole();
	}

	public function dataTable(Request $request){
		return $this->role->getTableData($request);
	}
	
	public function saveRole(Request $request){
		$data=[
			'name'=>$request->name,
			'slug'=>$request->slug ?? \Str::slug($request->name)
		];
		$role=$this->role->saveRole($data);
		$permission=$request->permission ?? [];
		$user=$request->user ?? [];
		if($permission)
			$role->permissions()->attach($permission);
		if($user)
			$role->administrators()->attach($user);
		return $role;
	}

	public function findRole($id){
		return $this->role->with('permissions','administrators')
		->findOrfail($id);
	}

	public function updateRole(Request $request,$id){
		$data=[
			'name'=>$request->name,
			'slug'=>$request->slug ?? \Str::slug($request->name)
		];
		$role=$this->role->updateRole($data,$id);
		$permission = $request->permission ?? [];
        $user=$request->user ?? [];
        if($permission){
       		$role->permissions()->detach();
        	$role->permissions()->attach($permission);
        }
        if($user){
        	$role->administrators()->detach();
        	$role->administrators()->attach($user);
        }
        return $role;
	}

	public function deleteRole($id){
		$role=$this->role->deleteRole($id);
		$role->permissions()->detach();
		$role->administrators()->detach();
		return $role;
	}
}