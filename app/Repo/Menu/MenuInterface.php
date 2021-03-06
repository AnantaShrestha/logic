<?php
namespace App\Repo\Menu;
use Illuminate\Http\Request;

interface MenuInterface{
	public function getMenu();
	public function getTreeMenu();
	public function saveMenu(Request $request);
	public function findMenu($id);
	public function updateMenu(Request $request,$id);
	public function deleteMenu($id);
	public function menuSort(Request $request);
}