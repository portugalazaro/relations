<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Um usuário, tem inicialmente, um endereço
Route::get('/users', [UserController::class, 'index']);

// Rota para listar endereços
Route::get('/addresses', [AddressesController::class, 'index']);