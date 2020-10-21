<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CandidatoController;

Route::get('/candidato', [CandidatoController::class, 'index']);
Route::get('/candidato/{id}', [CandidatoController::class, 'show']);
Route::post('/candidato', [CandidatoController::class, 'store']);
Route::post('/candidato/{id}', [CandidatoController::class, 'update']);
Route::delete('/candidato/{id}', [CandidatoController::class, 'destroy']);


