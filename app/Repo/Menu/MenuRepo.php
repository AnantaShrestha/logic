<?php 
namespace App\Repo\Menu;
use App\Models\Admin\Adminmenu;
use App\Library\Classes\Admin;
use Illuminate\Http\Request;

class MenuRepo implements MenuInterface{
	public function __construct(){
		$this->menu=new Adminmenu();
	}

	public function getMenu(){
		return $this->menu
		->orderBy('sort', 'asc')
		->get();
	}

	public function getTreeMenu($parent = 0, &$tree = null, $menus = null, &$st = ''){
		$menus = $menus ?? $this->getMenu()->groupBy('parent_id');
        $tree = $tree ?? [];
        $lisMenu = $menus[$parent] ?? [];
        foreach ($lisMenu as $menu) {
            $tree[$menu->id] = $st . ' ' . $menu->title;
            if (!empty($menus[$menu->id])) {
                $st .= '--';
                $this->getTreeMenu($menu->id, $tree, $menus, $st);
                $st = '';
            }
        }
        return $tree;
	}

	public function saveMenu(Request $request){
		 return $this->menu->saveMenu($request->all());
	}

	public function findMenu($id){
		return $this->menu->findMenu($id);
	}

	public function updateMenu(Request $request,$id){
		return $this->menu->updateMenu($request->except('_token'),$id);
	}

	public function deleteMenu($id){
		return $this->menu->deleteMenu($id);
	}

	public function menuSort(Request $request){
		$data = $request->menu ?? [];
        $reSort = json_decode($data, true);
        $newTree=$this->sortingProcess($reSort);
        return $this->menu->resort($newTree);
	}

	public function sortingProcess($reSort,$parent = 0,&$tree= null){
		$tree= $tree ?? [];
		foreach($reSort as $key=>$level){
			$id=$level['id'];
			$tree[$id] = [
                'parent_id' =>$parent,
                'sort' => ++$key,
            ];
            $children=$level['children'] ?? '';
            if(!empty($children)){
            	$this->sortingProcess($children,$id,$tree);
            }
		}
		return $tree;
	}


	 /**
     * Get list menu can visible for user
     *
     * @return  [type]  [return description]
     */
    public function getListVisible()
    {
       $list = $this->getMenu();
       $listVisible = [];
       foreach($list as $menu){
	       	if (empty($menu->uri) || $menu->uri === 'admin/index') {
	       		$listVisible[] = $menu;
	       	} else{
	       		$url = url($menu->uri);
	       		if (Admin::user()->checkUrlAllowAccess($url)) {
	       			$listVisible[] = $menu;
	       		}
	       	}
       }
       $listVisible = collect($listVisible);
       $groupVisible = $listVisible->groupBy('parent_id');
        foreach ($listVisible as $key => $value) {
            if ((isset($groupVisible[$value->id]) && count($groupVisible[$value->id]) == 0)
                || (!isset($groupVisible[$value->id]) && !$value->uri)
            ){
                unset($listVisible[$key]);
                continue;
            }
        }
        $listVisible=collect($listVisible);
        $groupVisible = $listVisible->groupBy('parent_id');
        foreach ($listVisible as $key => $value) {
            if ((isset($groupVisible[$value->id]) && count($groupVisible[$value->id]) == 0)
                || (!isset($groupVisible[$value->id]) && !$value->uri)
            ){
                unset($listVisible[$key]);
                continue;
            }
        }
        $listVisible=$listVisible->groupBy('parent_id');
        return $listVisible;
    }
}