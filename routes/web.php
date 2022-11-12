<?php

use App\Http\Controllers\RolesAndPermissions\RolesController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Users\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthenticatedSessionController;
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

Route::get('/',function(){
    return redirect('login');
});

$limiter = config('fortify.limiters.login');

Route::post('/login', [CustomAuthenticatedSessionController::class, 'store'])
    ->middleware(array_filter([
        'guest:'.config('fortify.guard'),
        $limiter ? 'throttle:'.$limiter : null,
    ]));

// User needs to be authenticated to enter here.
Route::group(['middleware' => 'auth'], function () {
    Route::get('test',[TestController::class, 'test']);
    Route::resource('users',UsersController::class);
    Route::get('users-toggle-status/{user}',[UsersController::class,'toggleStatus'])->name('users.toggle.status');
    Route::get('get-all-roles',[RolesController::class,'getAllRoles'])->name('get.all.roles');
    Route::view('/home','welcome')->name('index');


});
