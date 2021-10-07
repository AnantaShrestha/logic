<?php
namespace App\Http\Controllers\Admin;

class IndexController extends BackendController{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		return view($this->ADMINTEMPLATEROOT.'index');
	}
}