<?php

use App\Http\Controllers\Create;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Views;
use App\Http\Controllers\UserAuth;

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

Route::get('/', [Views::class, 'main']);
Route::get('/login', [Views::class, 'login']);
Route::get('/register', [Views::class, 'register']);

Route::get('/companies', [Views::class, 'all']);
Route::get('/create', [Views::class, 'create'])->middleware('auth');


Route::post('/register', [UserAuth::class, 'register']);
Route::post('/login', [UserAuth::class, 'login']);
Route::get('logout', [UserAuth::class, 'logout']);
Route::post('/create', [Create::class, 'create'])->middleware('auth');
