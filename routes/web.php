<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Process_Controller;
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

Route::get('/', function () {return view('index');});
Route::post('/regit', [Process_Controller::class, 'regit_proces']);
Route::get('/itiran', [Process_Controller::class, 'itiran']);
Route::post('/select_shogo_get', [Process_Controller::class, 'select_shogo_get']);
