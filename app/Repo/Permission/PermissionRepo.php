<?php
namespace App\Repo\Permission;
use App\Models\Admin\Permission;
use Illuminate\Http\Request;
class PermissionRepo implements PermissionInterface{
	private $permission;
	public function __construct(Permission $permission){
		$this->permission=$permission;
	}	

	public function getAll(){
		return $this->permission->all();
	}

	public function getPermission(){
		return $this->permission->getPermission();
	}

	public function dataTable(Request $request){
		return $this->permission->getTableData($request);
	}

	public function savePermission(Request $request){
		$data=[
			'name' => $request->name,
			'slug' => $request->slug ?? \Str::slug($request->name),
			'http_uri' => implode(',', ($request->http_uri ?? [])),
		];
		return $this->permission->savePermission($data);
	}

	public function findPermission($id){
		return $this->permission->findOrfail($id);
	}

	public function updatePermission(Request $request,$id){
		$data=[
            'name' => $request->name,
            'slug' => $request->slug ?? \Str::slug($request->name),
            'http_uri' => implode(',', ($request->http_uri ?? [])),
        ];
		return $this->permission->updatePermission($data,$id);
	}

	public function deletePermission($id){
		return $this->permission->deletePermission($id);
	}
}