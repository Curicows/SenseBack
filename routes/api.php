<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\TransacaoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('categoria', CategoriaController::class);

Route::get('tipo',[TipoController::class, 'index']);

Route::resource('transacao', TransacaoController::class);
