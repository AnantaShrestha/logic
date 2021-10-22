<?php

namespace App\Repo\Menu;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest{
	public function authorize(){
		return true;
	}

	public function rules(){
		return [

		];
	}
}