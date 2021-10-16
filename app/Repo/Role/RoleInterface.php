<?php
namespace App\Repo\Role;
use Illuminate\Http\Request;

interface RoleInterface{
	public function getAll();
	public function getRole();
	public function dataTable(Request $request);
	public function saveRole(Request $request);
	public function findRole($id);
	public function updateRole(Request $request,$id);
	public function deleteRole($id);
	
}