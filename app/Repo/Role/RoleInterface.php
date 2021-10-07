<?php
namespace App\Repo\Role;

interface RoleInterface{
	public function getAll();
	public function findRole($id);
	
}