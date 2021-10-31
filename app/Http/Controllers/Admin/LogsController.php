<?php
namespace App\Http\Controllers\Admin;
use App\Repo\Logs\LogsRepo;
class LogsController extends BackendController{
	private $logsrepo;
	public function __construct(LogsRepo $logsrepo){
		parent::__construct();
		$this->logsrepo=$logsrepo;
	}

	public function index(){
		$data=[
			'logs'=>$this->logsrepo->getLogs()
		];
		return view($this->ADMINTEMPLATEROOT.'logs.index')
		->with($data);
	}

	public function datatable(){
		$data=[
			'logs'=>$this->logsrepo->dataTable(request())
		];
		return view($this->ADMINTEMPLATEROOT.'logs.table-listing')
		->with($data)
		->render();
	}

	public function delete(){
		if(request()->ajax()){
			$id=request()->id;
			$this->logsrepo->deleteLogs($id);
			return response()->json(['message'=>'Logs deleted Successfully','type'=>'success']);
		}
	}
}