<?php
namespace App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Admin\BackendController;
use App\Repo\Permission\PermissionRepo;
use App\Repo\Permission\PermissionRequest;
use App\Http\Traits\AdminroutelistTrait;
class PermissionController extends BackendController{
	private $permissionrepo;
	use AdminroutelistTrait;
	public function __construct(Permissionrepo $permissionrepo){
		parent::__construct();
		$this->permissionrepo=$permissionrepo;
	}

	public function index(){
		$data=[
			'permission'=>$this->permissionrepo->getAll()
		];
		return view($this->ADMINTEMPLATEROOT.'auth.permission.index')
		->with($data);
	}

	public function create(){
		$data=[
			'permission'=>[],
			'routeList'=>$this->routeList()
		];
		return view($this->ADMINTEMPLATEROOT.'auth.permission.form')
		->with($data);
	}

	public function store(PermissionRequest $request){
		$this->permissionrepo->savePermission($request);
		return redirect()
		->route('permission.index')
		->with('message','Permission Created Successfully');
	}
	public function edit($id){
		$data=[
			'permission'=>$this->permissionrepo->findPermission($id),
			'routeList'=>$this->routeList()
		];
		return view($this->ADMINTEMPLATEROOT.'auth.permission.form')
		->with($data);
	}

	public function update(PermissionRequest $request,$id){
		$this->permissionrepo->updatePermission($request,$id);
		return redirect()
		->route('permission.index')
		->with('message','Permission Updated Successfully');
	}	
}