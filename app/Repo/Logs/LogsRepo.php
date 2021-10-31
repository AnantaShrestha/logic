<?php 
namespace App\Repo\Logs;
use App\Models\Admin\Log;
use Illuminate\Http\Request;
use App\Library\Classes\Admin;
class LogsRepo implements LogsInterface{
	public function __construct(){
		$this->logs=new Log();
	}
	public function getLogs(){
		return $this->logs->getlogs();
	}

	public function createLogs(Request $request){
		$data=[
            'admin_id' => Admin::user()->id,
            'path' => substr($request->path(), 0, 255),
            'method' => $request->method(),
            'ip' => $request->getClientIp(),
            'user_agent' => $request->header('User-Agent'),
            'input' => json_encode($request->input()),
        ];
        return $this->logs->createLogs($data);
	}

	public function dataTable(Request $request){
		return $this->logs->getTableData($request);
	}

	public function deleteLogs($id){
		return $this->logs->deleteLogs($id);
	}
}