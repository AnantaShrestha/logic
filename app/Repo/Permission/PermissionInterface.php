<?php 
namespace App\Repo\Permission;
use Illuminate\Http\Request;
interface PermissionInterface{
	public function getPermission();
	public function dataTable(Request $request);
	public function savePermission(Request $request);
	public function findPermission($id);
	public function updatePermission(Request $request,$id);
	public function deletePermission($id);
}