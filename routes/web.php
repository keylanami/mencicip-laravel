<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('form.index');
});

Route::get('/admin', function () {
    return view('admin.index');
});

Route::post('/action', function (Request $req){
    return $req->all();
});
