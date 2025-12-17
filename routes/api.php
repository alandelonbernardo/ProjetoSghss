<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\ConsultaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class,'register']);
Route::get('login', function(){
    return ['message' => 'Você não está autenticado'];
})->name('login');

Route::middleware(['auth:api'])->group(function() {

    Route::group(['prefix' => 'paciente'], function() {
        Route::post('/create', [PacienteController::class, 'create']);
        Route::get('/show/{id}', [PacienteController::class, 'show']);
        Route::get('/index', [PacienteController::class, 'index']);
        Route::post('/update/{id}', [PacienteController::class, 'update']);
        Route::delete('/delete/{id}', [PacienteController::class, 'delete']);
    });

    Route::group(['prefix' => 'medico'], function() {
        Route::post('/create', [MedicoController::class, 'create']);
        Route::get('/show/{id}', [MedicoController::class, 'show']);
        Route::get('/index', [MedicoCOntroller::class, 'index']);
        Route::post('/update/{id}', [MedicoController::class, 'update']);
        Route::delete('/delete/{id}', [MedicoController::class, 'delete']);
    });

    Route::group(['prefix' => 'consulta'], function() {
        Route::post('/create', [ConsultaController::class, 'create']);
        Route::get('/show/{id}', [ConsultaController::class, 'show']);
        Route::get('/index', [ConsultaCOntroller::class, 'index']);
        Route::post('/update/{id}', [ConsultaController::class, 'update']);
        Route::delete('/delete/{id}', [ConsultaController::class, 'delete']);
    });

});



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
