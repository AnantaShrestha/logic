<?php
Route::group(['prefix'=>'mailsetting'],function(){
	Route::get('index',[App\Http\Controllers\Admin\MailsettingController::class,'index'])->name('mailsetting.index');
	Route::post('store',[App\Http\Controllers\Admin\MailsettingController::class,'store'])->name('mailsetting.store');
});