<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/vehicles/service/confirmation/{service_id}', [VehicleController::class, 'serviceConfirmation'])->name('service.confirmation');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/logout', [HomeController::class, 'logout'])->name('auth.logout');

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

//User Controller
    Route::get('/users/all', [UserController::class, 'getUsers'])->name('users.all');
    Route::resource('users', UserController::class);

//Vehicle Controller
    Route::get('/vehicles/all', [VehicleController::class, 'getVehicles'])->name('vehicles.all');
    Route::get('/vehicles/{vehicleId}/service/history', [VehicleController::class, 'getServiceHistories'])->name('vehicles.service.history');
    Route::get('/vehicles/data/service/upcoming', [VehicleController::class, 'getServiceUpcoming'])->name('vehicles.service.upcoming');
    Route::get('/vehicles/service/upcoming', [VehicleController::class, 'serviceUpcoming'])->name('data.service.upcoming');
    Route::post('/select2/vehicles', [VehicleController::class, 'getSelectVehicles'])->name('select2.vehicles');
    Route::get('/vehicles/upload/excel', [VehicleController::class, 'excel'])->name('vehicles.excel');
    Route::post('/vehicles/upload/excel', [VehicleController::class, 'excelUpload'])->name('vehicles.excel');
    Route::get('/vehicles/upload/service', [VehicleController::class, 'service'])->name('vehicles.service');
    Route::post('/vehicles/upload/service', [VehicleController::class, 'serviceUpload'])->name('vehicles.service');
    Route::resource('vehicles', VehicleController::class);

});
