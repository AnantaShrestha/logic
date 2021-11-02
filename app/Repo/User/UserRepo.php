<?php
namespace App\Repo\User;
use App\Models\Admin\Adminuser;
use Illuminate\Http\Request;
class UserRepo implements UserInterface{
	private $adminuser;
	public function __construct(Adminuser $adminuser){
		$this->adminuser=$adminuser;
	}

	public function getAll(){
		return $this->adminuser->all();
	}

	public function getUser(){
		return $this->adminuser->getUser();
	}

	public function dataTable(Request $request){
		return $this->adminuser->getTableData($request);
	}

	public function saveUser(Request $request){
		$data=[
			'name'=>$request->name,
			'username'=>$request->username,
			'email'=>$request->email,
			'password'=>$request->password
		];
		$user=$this->adminuser->saveUser($data);
		$permission=$request->permission ?? [];
		$role=$request->role ?? [];
		if($permission)
			$user->permissions()->attach($permission);
		if($role)
			$user->roles()->attach($role);
		return $user;
	}

	public function findUser($id){
		return $this->adminuser->findOrFail($id);
	}

	public function updateUser(Request $request,$id){
		$data=[
			'name'=>$request->name,
			'username'=>$request->username,
			'email'=>$request->email,
		];
		if($request->password){
			$data['password']=$request->password;
		}
		$user=$this->adminuser->updateUser($data,$id);
		$permission=$request->permission ?? [];
		$role=$request->role ?? [];
		$user->permissions()->detach();
		$user->roles()->detach();
		if($permission)
			$user->permissions()->attach($permission);
		if($role)
			$user->roles()->attach($role);
		return $user;
	}

	public function deleteUser($id){
		$user=$this->adminuser->deleteUser($id);
		$user->permissions()->detach();
		$user->roles()->detach();
		return $user;
	}


	public function accountActivateorNot(Request $request){
		$data=[
			'activate'=>$request->activate
		];
		return $this->adminuser->updateUser($data,$request->id);
	}
}
