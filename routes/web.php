<?php

use App\Http\Controllers\PermissionsController;
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
    Route::get('/permissions',[PermissionsController::class,'index'])->name('permissions.index');
    Route::get('/permissions/create',[PermissionsController::class,'create'])->name('permissions.create');
    Route::post('/permissions',[PermissionsController::class,'store'])->name('permissions.store');
    Route::get('/permissions/edit/{permission}',[PermissionsController::class,'edit'])->name('permissions.edit');
    Route::put('/permissions/update/{permission}',[PermissionsController::class,'update'])->name('permissions.update');
});
