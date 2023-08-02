<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressesController;


// Um usuário, tem inicialmente, um endereço
Route::get('/users', [UserController::class, 'index']);

// Incluindo um usuário no banco de dados
Route::post('/users/create', [UserController::class, 'createUser']);

Route::get('/users/dell', [UserController::class, 'dell']);

// Buscando somente um usuário pelo seu ID
Route::get('/users/{id?}', [UserController::class, 'findOne']);


// ---------------------------Address-----------------------------------------------

// Rota para listar endereços
Route::get('/addresses', [AddressesController::class, 'index']);

// Buscando um endereço pelo seu ID
Route::get('/addresses/{id?}', [AddressesController::class, 'findOne']);

// Criando um novo endereço
Route::post('/addresses/create', [AddressesController::class, 'createAddresses']);