<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Repo\Menu\MenuRepo;
class AdminmenuComposer{
	public function	compose	(View $view){
		$menus= \Auth::guard('admin')->user()->isAdministrator() ? (new MenuRepo)->getMenu()->groupBy('parent_id') : (new MenuRepo)->getListVisible();
		return $view->with('menus',$menus);
	}
}