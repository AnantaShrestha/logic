<?php
namespace App\Repo\User;
use Illuminate\Http\Request;

interface UserInterface{
	public function getAll();
	public function getUser();
	public function dataTable(Request $request);
	public function saveUser(Request $request);
	public function findUser($id);
	public function updateUser(Request $request,$id);
	public function deleteUser($id);

}