<?php 
namespace App\Repo\Permission;
use Illuminate\Http\Request;
interface PermissionInterface{
	public function getAll();
	public function savePermission(Request $request);
	public function findPermission($id);
	public function updatePermission(Request $request,$id);
}