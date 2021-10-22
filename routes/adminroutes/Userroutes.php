<?php

Route::group(['prefix'=>'user'],function(){
	Route::get('index',[App\Http\Controllers\Admin\Auth\UserController::class,'index'])->name('user.index');
	Route::get('pagination',[App\Http\Controllers\Admin\Auth\UserController::class,'datatable'])->name('user.pagination');
	Route::get('create',[App\Http\Controllers\Admin\Auth\UserController::class,'create'])->name('user.create');
	Route::post('create',[App\Http\Controllers\Admin\Auth\UserController::class,'store'])->name('user.store');
	Route::get('edit/{id}',[App\Http\Controllers\Admin\Auth\UserController::class,'edit'])->name('user.edit');
	Route::post('edit/{id}',[App\Http\Controllers\Admin\Auth\UserController::class,'update'])->name('user.update');
	Route::get('delete/{id}',[App\Http\Controllers\Admin\Auth\UserController::class,'delete'])->name('user.delete');
});