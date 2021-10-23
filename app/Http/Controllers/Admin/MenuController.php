<?php
namespace App\Http\Controllers\Admin;
use App\Repo\Menu\MenuRepo;
use App\Repo\Menu\MenuRequest;
use App\Http\Traits\MenuroutelistTrait;
use Illuminate\Http\Request;

class MenuController extends BackendController{
	private $menurepo;
	use MenuroutelistTrait;
	public function __construct(MenuRepo $menu){
		parent::__construct();
		$this->menurepo=$menu;
	}

	public function index(){
		$data=[
			'getTreeMenu'=>$this->menurepo->getTreeMenu(),
			'urlList' =>$this->routeList()
		];
		return view($this->ADMINTEMPLATEROOT.'menu.index')
		->with($data);
	}

	public function store(MenuRequest $request){
		$this->menurepo->saveMenu($request);
		return redirect()
		->route('menu.index')
		->with(['message'=>'Menu added Successfully','type'=>'success']);
	}

	public function edit($id){
		$data=[
			'getTreeMenu'=>$this->menurepo->getTreeMenu(),
			'urlList' =>$this->routeList(),
			'menu'=>$this->menurepo->findMenu($id)
		];
		return view($this->ADMINTEMPLATEROOT.'menu.index')
		->with($data);
	}

	public function update(MenuRequest $request,$id){
		$this->menurepo->updateMenu($request,$id);
		return redirect()
		->back()
		->with(['message'=>'Menu updated Successfully','type'=>'success']);
	}

	public function delete(){
		if(request()->ajax()){
			$id=request()->id;
			$this->menurepo->deleteMenu($id);
			return response()->json(['message'=>'Menu deleted Successfully','type'=>'success']);
		}
	}


	public function sorting(Request $request){
		$response=$this->menurepo->menuSort($request);
		return response()->json($response);
	}
}