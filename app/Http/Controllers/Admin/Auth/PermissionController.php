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
			'permissions'=>$this->permissionrepo->getPermission()
		];
		return view($this->ADMINTEMPLATEROOT.'auth.permission.index')
		->with($data);
	}

	public function datatable(){

		$data=[
			'permissions'=>$this->permissionrepo->dataTable(request())
		];
		return view($this->ADMINTEMPLATEROOT.'auth.permission.table-listing')
		->with($data)
		->render();
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
		->with(['message','Permission Updated Successfully','type'=>'success']);
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
		->with(['message','Permission Updated Successfully','type'=>'success']);
	}	

	public function delete($id){
		$this->permissionrepo->deletePermission($id);
		return redirect()
		->back()
		->with(['message','Permission Deleted Successfully','type'=>'danger']);
	}
}