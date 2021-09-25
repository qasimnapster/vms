<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\SupplierController;



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
    return view('admin.index');
});

Route::prefix('admin')->middleware('admin.auth')->group(function() {

    Route::get('/', [AuthController::class, 'index'])->name('admin.index');

    Route::get('login', [AuthController::class, 'getLogin'])->name('admin.login');
    Route::post('process/login', [AuthController::class, 'processLogin'])->name('admin.process_login');

    Route::resource('suppliers', SupplierController::class);

});



