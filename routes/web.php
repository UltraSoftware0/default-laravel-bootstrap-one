<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TestController;
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
route::get('/',function(){
    return redirect('login');
});


// User needs to be authenticated to enter here.
Route::group(['middleware' => 'auth'], function () {
    Route::get('test',[TestController::class, 'test']);

    Route::get('/home', function () {
        return view('welcome');
    })->name('home');
});
