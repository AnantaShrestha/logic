<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix'=>ADMIN_TEMPLATE_PREFIX],function(){
    Route::get('app_login',[App\Http\Controllers\Admin\Auth\LoginController::class,'loginForm'])->name('admin.login');
    Route::post('app_login',[App\Http\Controllers\Admin\Auth\LoginController::class,'loginProcess'])->name('admin.login');
    Route::get('app_logout',[App\Http\Controllers\Admin\Auth\LoginController::class,'getLogout'])->name('admin.logout');

    Route::group(['middleware'=>ADMIN_MIDDLEWARE],function(){
        Route::get('index',[App\Http\Controllers\Admin\IndexController::class,'index'])->name('admin.index');
        foreach(glob(__DIR__.'/adminroutes/*.php') as $filename){
            require_once $filename;
        }
    });
    
});