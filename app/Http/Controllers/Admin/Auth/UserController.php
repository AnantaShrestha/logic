<?php
namespace App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Admin\BackendController;
use App\Repo\Permission\PermissionRepo;
use App\Repo\Role\RoleRepo;
use App\Repo\User\UserRepo;
use App\Repo\User\UserRequest;
use App\Http\Traits\AdminroutelistTrait;
class UserController extends BackendController{
	private $user,$role,$permission;
	public function __construct(UserRepo $user,
		RoleRepo $role,PermissionRepo $permission){
		parent::__construct();
		$this->userrepo=$user;
		$this->rolerepo=$role;
		$this->permissionrepo=$permission;
	}

	public function index(){
		$data=[
			'users'=>$this->userrepo->getUser()
		];
		return view($this->ADMINTEMPLATEROOT.'auth.user.index')
		->with($data);
	}

	public function dataTable(){
		$data=[
			'users'=>$this->userrepo->dataTable(request())
		];
		return view($this->ADMINTEMPLATEROOT.'auth.user.table-listing')
		->with($data)
		->render();
	}

	
	public function create(){
		$data=[
			'roles'=>$this->rolerepo->getAll()->pluck('name','id'),
			'permissions'=>$this->permissionrepo->getAll()->pluck('name','id')
		];
		return view($this->ADMINTEMPLATEROOT.'auth.user.form')
		->with($data);
	}

	public function store(UserRequest $request){
		$this->userrepo->saveUser($request);
		return redirect()
		->route('user.index')
		->with(['message'=>'User added Successfully','type'=>'success']);
	}

	public function edit($id){
		$data=[
			'user'=>$this->userrepo->findUser($id),
			'roles'=>$this->rolerepo->getAll()->pluck('name','id'),
			'permissions'=>$this->permissionrepo->getAll()->pluck('name','id')
		];
		return view($this->ADMINTEMPLATEROOT.'auth.user.form')
		->with($data);
	}

	public function update(Request $request,$id){
		$this->userrepo->updateUser($request,$id);
		return redirect()
		->route('user.index')
		->with(['message'=>'User update Successfully','type'=>'success']);
	}

	public function delete($id){
		if(request()->ajax()){
			$id=request()->id;
			$this->userrepo->deleteUser($id);
			return response()->json(['message'=>'User deleted Successfully','type'=>'success']);
		}
	}
}