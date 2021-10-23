<?php

namespace App\Repo\Menu;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest{
	public function authorize(){
		return true;
	}

	public function rules(){
		return [
			'title'=>'required|unique:admin_menu,title,'.$this->id,
			'parent_id'=>'required',
		];
	}
}