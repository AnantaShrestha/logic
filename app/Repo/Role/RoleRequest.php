<?php

namespace App\Repo\Role;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest{
	public function authorize(){
		return true;
	}

	public function rules(){
		return [
			'name'=>'required|unique:roles,name,'.$this->id,
			'slug'=>'nullable',	
		];
	}
}