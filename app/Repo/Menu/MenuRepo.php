<?php 
namespace App\Repo\Menu;
use App\Models\Admin\Adminmenu;
use Illuminate\Http\Request;

class MenuRepo implements MenuInterface{
	private $menu;
	public function __construct(Adminmenu $menu){
		$this->menu=$menu;
	}

	public function getMenu(){

	}

	public function saveMenu(Request $request){

	}

	public function findMenu($id){
		return $this->menu->findOrfail($id);
	}

	public function updateMenu(Request $request,$id){

	}

	public function deleteMenu($id){
		
	}
}