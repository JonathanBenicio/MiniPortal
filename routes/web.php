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





Route::prefix('login')->group(function () {
    Route::prefix('adm')->group(function () {
        Route::get('/', [LoginController::class, 'indexAdm']);
        Route::post('/', [LoginController::class, 'logarAdm']);
    });
    Route::prefix('edt')->group(function () {
        Route::get('/', [LoginController::class, 'indexEdt']);
        Route::post('/', [LoginController::class, 'logarEdt']);
    });

    Route::prefix('create')->group(function () {
        Route::get('edt', [LoginController::class, 'createEdt']);
        Route::post('edt', [LoginController::class, 'createEdt']);
    });
});


Route::middleware(['autenticador'])->group(function () {
    Route::prefix('edt')->group(function () {
        Route::get('/', [EditorController::class, 'index'])->name('listar-Post');
        Route::prefix('post')->group(function () {

            Route::prefix('criar')->group(function () {
                Route::get('/', [EditorController::class, 'criar']);
                Route::post('/', [EditorController::class, 'criar']);
            });
            Route::prefix('atualizar')->group(function () {
                Route::get('{id}', [EditorController::class, 'atualizar']);
            Route::post('{id}', [EditorController::class, 'atualizar']);
            });
            Route::delete('deletar/{id}', [EditorController::class, 'deletar']);
        });
    });

    Route::prefix('adm')->group(function () {
        Route::get('/', [AdmController::class, 'index'])->name('listar-Editor');
    });

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

