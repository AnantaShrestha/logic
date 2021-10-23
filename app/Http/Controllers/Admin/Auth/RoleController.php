<?php
namespace App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Admin\BackendController;
use App\Repo\Role\RoleRequest;
use App\Repo\Role\RoleRepo;
use App\Repo\Permission\PermissionRepo;
use App\Repo\User\UserRepo;
class RoleController extends BackendController{
	private $rolerepo,$permissionrepo,$userrepo;
	public function __construct(RoleRepo $rolerepo,
		Permissionrepo $permissionrepo,
		UserRepo $userrepo){
		parent::__construct();
		$this->rolerepo=$rolerepo;
		$this->permissionrepo=$permissionrepo;
		$this->userrepo=$userrepo;
	}

	public function index(){
		$data['roles']=$this->rolerepo->getRole();
		return view($this->ADMINTEMPLATEROOT.'auth.role.index')
		->with($data);
	}

	public function datatable(){
		$data=[
			'roles'=>$this->rolerepo->dataTable(request())
		];
		return view($this->ADMINTEMPLATEROOT.'auth.role.table-listing')
		->with($data)
		->render();
	}

	public function create(){
		$data=[
			'permissions'=>$this->permissionrepo->getAll()->pluck('name','id'),
			'users'=>$this->userrepo->getAll()->pluck('name','id')
		];
		return view($this->ADMINTEMPLATEROOT.'auth.role.form')
		->with($data);
	}

	public function store(RoleRequest $request){
		$this->rolerepo->saveRole($request);
		return redirect()
		->route('role.index')
		->with(['message'=>'Role added Successfully','type'=>'success']);
	}

	public function edit($id){
		$data=[
			'role'=>$this->rolerepo->findRole($id),
			'permissions'=>$this->permissionrepo->getAll()->pluck('name','id'),
			'users'=>$this->userrepo->getAll()->pluck('name','id')
		];
		return view($this->ADMINTEMPLATEROOT.'auth.role.form')
		->with($data);
	}

	public function update(RoleRequest $request,$id){
		$this->rolerepo->updateRole($request,$id);
		return redirect()
		->route('role.index')
		->with(['message'=>'Role updated Successfully','type'=>'success']);
	}

	public function delete(){
		if(request()->ajax()){
			$id=request()->id;
			$this->rolerepo->deleteRole($id);
			return response()->json(['message'=>'Role deleted Successfully','type'=>'success']);
		}
	}
}