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
    Route::get('index',[App\Http\Controllers\Admin\IndexController::class,'index'])->name('admin.index');
    foreach(glob(__DIR__.'/adminroutes/*.php') as $filename){
        require_once $filename;
    }
});