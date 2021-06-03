<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\TransacaoController;

Route::resource('categoria', CategoriaController::class);

Route::get('tipo',[TipoController::class, 'index']);

Route::resource('transacao', TransacaoController::class);
