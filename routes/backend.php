<?php

use App\Http\Controllers\Backend\BackendUserController;
use Illuminate\Http\Request;
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

Route::middleware('auth:backend')->get('/backend', function (Request $request) {
    return $request->user();
});


Route::get('/backend/all', [BackendUserController::class, 'index'])->name('all');

