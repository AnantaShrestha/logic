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
}
