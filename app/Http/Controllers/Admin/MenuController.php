<?php
namespace App\Http\Controllers\Admin;

class MenuController extends BackendController{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data=[
			'menu'=>[]
		];
		return view($this->ADMINTEMPLATEROOT.'menu.index')
		->with($data);
	}

	public function store(Request $request){
		$data=[
			'menu'=>[]
		];
		return view($this->ADMINTEMPLATEROOT.'menu.index')
		->with($data);
	}
}