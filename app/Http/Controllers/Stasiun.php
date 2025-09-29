<?php

namespace App\Http\Controllers;
use App\Models\Stasiun as ModelsStasiun;
use Illuminate\Http\Request;


class Stasiun extends Controller
{
    public function index()
    {
        $allstasiun = ModelsStasiun::all();
        return view('stasiun.index', compact('allstasiun'));
    }
}
