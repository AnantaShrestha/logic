<?php

namespace App\Repo\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest{
	public function authorize(){
		return true;
	}

	public function rules(){
		return [
			'name'=>'required|regex:/^[\pL\s\-]+$/u',
			'username' => 'required|unique:admin_user,username,'.$this->id,
			'email' => 'required|email|unique:admin_user,email,'.$this->id,
			'password'=>$this->id == null ? 'required|confirmed|min:6' : 'nullable|confirmed|min:6' 
		];
	}
}