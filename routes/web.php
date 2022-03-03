<?php

use App\Http\Controllers\PermissionsController;
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

Route::middleware(['auth'])->get('/users', function(){
    return view('pages.users.list');
})->name('users');


Route::middleware('auth')->group(function(){

    Route::prefix('/permissions')->group(function(){
        Route::get('',[PermissionsController::class,'index'])->name('permissions.index');
        Route::get('/create',[PermissionsController::class,'create'])->name('permissions.create');
        Route::post('',[PermissionsController::class,'store'])->name('permissions.store');
        Route::get('/edit/{permission}',[PermissionsController::class,'edit'])->name('permissions.edit');
        Route::put('/update/{permission}',[PermissionsController::class,'update'])->name('permissions.update');
        Route::get('/show/{permission}',[PermissionsController::class,'show'])->name('permissions.show');
        Route::delete('/delete/{permission}',[PermissionsController::class,'destroy'])->name('permissions.delete');
        Route::delete('/delete',[PermissionsController::class,'destroyAll'])->name('permissions.destroyAll');
    });


});
