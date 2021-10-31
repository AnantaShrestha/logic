<?php
namespace App\Repo\Logs;
use Illuminate\Http\Request;

interface LogsInterface{
	public function getLogs();
	public function createLogs(Request $request);
	public function dataTable(Request $request);
	public function deleteLogs($id);
}