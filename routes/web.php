<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;

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
Route::get('/auth', function () {
    return view('auth.login');
});

Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:Employee'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:Admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:Subadmin'])->group(function () {

    Route::get('/subadmin/home', [HomeController::class, 'subadminHome'])->name('subadmin.home');
});


// admin && Subadmin Routes --
Route::get('/employee', [AdminController::class, 'index'])->name('employees.index');
Route::get('/employee/create', [AdminController::class, 'create'])->name('employees.create');
Route::post('/employees', [AdminController::class, 'store'])->name('employees.store');
Route::get('/employees/{employee}/edit', [AdminController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{employee}', [AdminController::class, 'update'])->name('employees.update');
Route::delete('/employees/{employee}', [AdminController::class, 'destroy'])->name('employees.destroy');
// End ---

// Employee Route ---

// Route::get('/employee/profile', [AdminController::class, 'profile'])->name('employees.profile');

// End ---
