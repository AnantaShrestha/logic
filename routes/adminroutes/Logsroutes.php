<?php

Route::group(['prefix'=>'logs'],function(){
	Route::get('index',[App\Http\Controllers\Admin\LogsController::class,'index'])->name('logs.index');
	Route::get('pagination',[App\Http\Controllers\Admin\LogsController::class,'datatable'])->name('logs.pagination');
	Route::get('delete/{id}',[App\Http\Controllers\Admin\LogsController::class,'delete'])->name('logs.delete');
});