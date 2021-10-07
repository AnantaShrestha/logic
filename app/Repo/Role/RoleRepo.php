<?php
namespace App\Repo\Role;
use App\Models\Admin\Role;
class RoleRepo implements RoleInterface{
	private $role;
	public function __construct(Role $role){
		$this->role=$role;
	}	

	public function getAll(){
		return $this->role->all();
	}
	

	public function findRole($id){
		return $this->findOrfail($id);
	}
}