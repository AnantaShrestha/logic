<?php

Route::group(['prefix'=>'menu'],function(){
	Route::get('index',[App\Http\Controllers\Admin\MenuController::class,'index'])->name('menu.index');
	Route::post('create',[App\Http\Controllers\Admin\MenuController::class,'store'])->name('menu.store');
	Route::post('edit/{id}',[App\Http\Controllers\Admin\MenuController::class,'update'])->name('menu.update');
	Route::get('delete/{id}',[App\Http\Controllers\Admin\MenuController::class,'delete'])->name('menu.delete');
});