<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Json\JsonController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/json_form', [JsonController::class, 'index']);
Route::post('/json_form', [JsonController::class, 'store']);
