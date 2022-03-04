<?php

use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Database\Factories\PermissionFactory;
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

// Route::get('/dashboard', function () {
//     return view('pages.dashboard');
// });

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::middleware(['auth'])->get('/dashboard', function(){
    return view('pages.dashboard.index');
})->name('dashboard');




Route::middleware('auth')->group(function(){

    Route::prefix('/permissions')->group(function(){
        Route::get('',[PermissionsController::class,'index'])->name('permissions.index');
        Route::get('/create',[PermissionsController::class,'create'])->name('permissions.create');
        Route::get('/show/{permission}',[PermissionsController::class,'show'])->name('permissions.show');
        Route::post('',[PermissionsController::class,'store'])->name('permissions.store');
        Route::get('/edit/{permission}',[PermissionsController::class,'edit'])->name('permissions.edit');
        Route::put('/update/{permission}',[PermissionsController::class,'update'])->name('permissions.update');
        Route::delete('/delete/{permission}',[PermissionsController::class,'destroy'])->name('permissions.delete');
        Route::delete('/delete',[PermissionsController::class,'destroyMany'])->name('permissions.deleteMany');
    });

    Route::prefix('/users')->group(function(){
        Route::get('', [UserController::class,'index'])->name('users.index');
        Route::get('/create',[UserController::class,'create'])->name('users.create');
        Route::get('/show/{user}',[UserController::class,'show'])->name('users.show');
        Route::post('',[UserController::class,'store'])->name('users.store');
        Route::get('/edit/{user}',[UserController::class,'edit'])->name('users.edit');
        Route::put('/update/{user}',[UserController::class,'update'])->name('users.update');
        Route::delete('/delete/{user}',[UserController::class,'destroy'])->name('users.delete');
        Route::delete('/delete',[UserController::class,'destroyMany'])->name('users.deleteMany');
    });

    Route::prefix('/roles')->group(function(){
        Route::get('',[RoleController::class,'index'])->name('roles.index');
        Route::get('/create',[RoleController::class,'create'])->name('roles.create');
        Route::get('/show/{role}',[RoleController::class,'show'])->name('roles.show');
        Route::post('',[RoleController::class,'store'])->name('roles.store');
        Route::get('/edit/{role}',[RoleController::class,'edit'])->name('roles.edit');
        Route::put('/update/{role}',[RoleController::class,'update'])->name('roles.update');
        Route::delete('/delete/{role}',[RoleController::class,'destroy'])->name('roles.delete');
        Route::delete('/delete',[RoleController::class,'destroyMany'])->name('roles.deleteMany');
    });


});
