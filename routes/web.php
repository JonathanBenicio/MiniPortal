<?php

use App\Http\Controllers\EditorController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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



Route::view('/', 'index');

Route::get('/login/adm', [LoginController::class, 'indexAdm']);
Route::get('/login/edt', [LoginController::class, 'indexEdt']);

Route::post('/login/adm', [LoginController::class, 'logarAdm']);
Route::post('/login/edt', [LoginController::class, 'logarEdt']);

Route::post('/create/edt', [LoginController::class, 'createEdt']);
Route::post('/create/edt', [LoginController::class, 'createEdt']);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');






Route::get('/adm', [AdmController::class, 'index'])->name('listar-Editor')->middleware('autenticador');

Route::get('/edt', [EditorController::class, 'index'])->name('listar-Post')->middleware('autenticador');
Route::get('/edt/criar', [EditorController::class, 'criar'])->middleware('autenticador');

Route::post('/edt/criar', [EditorController::class, 'criar'])->middleware('autenticador');
Route::get('/edt/atualizar/{id}', [EditorController::class, 'atualizar'])->middleware('autenticador');
Route::post('/edt/atualizar/{id}', [EditorController::class, 'atualizar'])->middleware('autenticador');
Route::delete('/edt/deletar/{id}', [EditorController::class, 'deletar'])->middleware('autenticador');



