<?php

use App\Http\Controllers\Backend\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Backend routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "backend" middleware group. Enjoy building your API!
|
*/
//
//Route::middleware('auth:backend')->get('/backend', function (Request $request) {
//    return $request->user();
//});

Route::resource('employees', EmployeeController::class);

