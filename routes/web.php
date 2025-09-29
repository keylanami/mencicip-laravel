<?php

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
