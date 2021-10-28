<?php
namespace App\Library\Classes;
use Auth;
class Admin{
	public static function user()
    {
        return Auth::guard('admin')->user();
    }
}