<?php

use App\Http\Controllers\DonorController;
use App\Http\Controllers\DonorDatatable;
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
    return view('index');
});

Route::get('/donors/register', function () {
    return view('donor-registration');
})->name('donors.register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::any('/donors/datatable/{status?}', DonorDatatable::class)->name('donors.datatable');

Route::resource('donors', DonorController::class);
