<?php
Route::group(['prefix'=>'role'],function(){
	Route::get('index',[App\Http\Controllers\Admin\Auth\RoleController::class,'index'])->name('role.index');
});