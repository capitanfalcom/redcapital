<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EvaluacionController;

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

Route::get('/', function () {
    return view('index');
});

Route::controller(EvaluacionController::class)->group(function () {
    /* Route::get('/redcapital', 'index'); */
    Route::post('/preguntauno', 'preguntauno');
    Route::post('/preguntados', 'preguntados');
    Route::post('/preguntatres', 'preguntatres');
    Route::post('/preguntacuatro', 'preguntacuatro');
});