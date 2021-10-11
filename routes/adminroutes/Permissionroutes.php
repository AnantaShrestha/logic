<?php

Route::group(['prefix'=>'permission'],function(){
	Route::get('index',[App\Http\Controllers\Admin\Auth\PermissionController::class,'index'])->name('permission.index');
	Route::get('create',[App\Http\Controllers\Admin\Auth\PermissionController::class,'create'])->name('permission.create');
	Route::post('create',[App\Http\Controllers\Admin\Auth\PermissionController::class,'store'])->name('permission.store');
	Route::get('edit/{id}',[App\Http\Controllers\Admin\Auth\PermissionController::class,'edit'])->name('permission.edit');
	Route::post('edit/{id}',[App\Http\Controllers\Admin\Auth\PermissionController::class,'update'])->name('permission.update');
	Route::get('delete/{id}',[App\Http\Controllers\Admin\Auth\PermissionController::class,'delete'])->name('permission.delete');
});