<?php
namespace App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Admin\BackendController;
use App\Repo\Role\RoleRepo;

class RoleController extends BackendController{
	private $rolerepo;
	public function __construct(Rolerepo $rolerepo){
		parent::__construct();
		$this->rolerepo=$rolerepo;
	}

	public function index(){
		$data['roles']=$this->rolerepo->getAll();
		return view($this->ADMINTEMPLATEROOT.'auth.role.index')
		->with($data);
	}
}