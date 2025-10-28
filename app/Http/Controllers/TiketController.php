<?php

namespace App\Http\Controllers;
use App\Models\Stasiun;
use App\Models\Kereta;
use App\Models\Tiket;

use Illuminate\Http\Request;


class TiketController extends Controller
{
    
    public function create(){
        $keretas = Kereta::all();
        $stasiuns = Stasiun::all();
        return view(('tiket.create'), 
        compact('keretas', 'stasiuns'));
    }

   public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_kereta' => ['required', 'exists:kereta,id_kereta'],
            'id_stasiun_asal' => ['required', 'exists:stasiun,id_stasiun', 'different:id_stasiun_tujuan'],
            'id_stasiun_tujuan' => ['required', 'exists:stasiun,id_stasiun'],
            'tanggal_keberangkatan' => ['required', 'date', 'after_or_equal:today']

        ], [
            'id_kereta.required' => 'Pilih kereta.',
            'id_kereta.exists' => 'Kereta tidak valid.',
            'id_stasiun_asal.required' => 'Pilih stasiun asal.',
            'id_stasiun_asal.exists' => 'Stasiun asal tidak valid.',
            'id_stasiun_asal.different' => 'Stasiun asal tidak boleh sama dengan stasiun tujuan.',
            'id_stasiun_tujuan.required' => 'Pilih stasiun tujuan.',
            'id_stasiun_tujuan.exists' => 'Stasiun tujuan tidak valid.',
            'tanggal_keberangkatan.required' => 'Pilih tanggal keberangkatan.',
            'tanggal_keberangkatan.date' => 'Format tanggal keberangkatan tidak valid.',
            'tanggal_keberangkatan.after_or_equal' => 'tanggal keberangkatan tidak boleh di masa lalu.',
           
        ]);

        Tiket::create([
            'id_kereta' => $validatedData['id_kereta'],
            'id_stasiun_asal' => $validatedData['id_stasiun_asal'],
            'id_stasiun_tujuan' => $validatedData['id_stasiun_tujuan'],
            'tanggal_keberangkatan' => $validatedData['tanggal_keberangkatan'],
            'waktu_keberangkatan'=>'00:00:00'
        ]);

        return redirect()->route('kereta.index')->with('success', 'Tiket berhasil dipesan!');
    }
}
