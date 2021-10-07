<?php

namespace App\Repo\Permission;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest{
	public function authorize(){
		return true;
	}

	public function rules(){
		return [
			'name'=>'required',
			'slug'=>'nullable',
			'http_uri'=>'nullable'
		];
	}
}