<?php

use App\Http\Controllers\KeretaController;
use App\Http\Controllers\Stasiun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('form.index');
});

Route::get('/stasiun', [Stasiun::class, 'index'])->name('stasiun.index');

Route::post('/action', function (Request $req){
    return $req->all();
});

Route::get('/kereta', [KeretaController::class, 'index'])->name('kereta.index');

Route::get('/kereta/create', [KeretaController::class, 'create'])->name('kereta.create');

Route::post('/kereta', [KeretaController::class, 'store'])->name('kereta.store');




Route::get('/kereta', [KeretaController::class, 'index'])->name('kereta.index');

Route::get('/kereta/{id}', [KeretaController::class, 'show'])->name('kereta.show');




Route::get('/kereta/{id}/edit', [KeretaController::class, 'edit'])->name('kereta.edit');

Route::put('/kereta/{id}', [KeretaController::class, 'update'])->name('kereta.update');

Route::delete('/kereta/{id}', [KeretaController::class, 'destroy'])->name('kereta.destroy');
