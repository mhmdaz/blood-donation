<?php

use App\Http\Controllers\DonorController;
use App\Http\Controllers\DonorDatatable;
use App\Http\Controllers\UpdateDonatedDate;
use App\Http\Controllers\UpdateDonorStatus;
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
})->name('index');

Route::get('/donors/register', function () {
    return view('donor-registration');
})->name('donors.register');

Route::get('/donors/donated-date', function () {
    return view('edit-donated-date');
})->name('donors.donated-date.edit');

Route::put('/donors/donated-date', UpdateDonatedDate::class)->name('donors.donated-date.update');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::any('/donors/datatable/{status?}', DonorDatatable::class)->name('donors.datatable');
Route::put('/donors/{donor}/status', UpdateDonorStatus::class)->name('donors.status.update');

Route::resource('donors', DonorController::class);
