<?php 
namespace App\Http\Controllers\Admin;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
class BackendController extends BaseController{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	public $templateAdminRoot;
	public function __construct(){
	   	$this->ADMINTEMPLATEROOT=ADMIN_TEMPLATE_ROOT;
	}
}