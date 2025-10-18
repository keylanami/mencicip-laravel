<?php

namespace App\Http\Controllers;

use App\Models\Kereta;
use Illuminate\Http\Request;

class KeretaController extends Controller
{
    public function create()
    {
        return view('kereta.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_kereta' => 'required|string|max:255',
                'no_kereta' => 'required|string|max:255|',
                'nama.required' => 'Nama kereta wajib diisi',
                'nama.max' => 'Nama kereta maksimal 100 karakter',
                'kode.required' => 'Kode kereta wajib diisi',
                'kode.unique' => 'Kode kereta sudah digunakan',
                'kode.max' => 'Kode kereta maksimal 10 karakter',
            ]);

            Kereta::create([
                'nama_kereta' => $request->nama_kereta,
                'no_kereta' => $request->no_kereta,
            ]);
            return redirect()->route('kereta.index')->with('success', 'Kereta berhasil ditambahkan!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            report($e);
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
        }
    }

    public function index()
    {
        $kereta = Kereta::all();
        return view('kereta.index', compact('kereta'));
    }

    public function show($id)
    {
        $kereta = Kereta::findOrFail($id);
        return view('kereta.show', compact('kereta'));
    }

    public function edit($id)
    {
        $kereta = Kereta::findOrFail($id);
        return view('kereta.edit', compact('kereta'));
    }

    public function update(Request $request, $id)
    {
        $kereta = Kereta::findOrFail($id);
        $validated = $request->validate([
            'nama_kereta' => 'required|string|max:255',
            'no_kereta' => 'required|string|max:255|unique:kereta,no_kereta,' . $id . ',id_kereta',
        ]);

        $kereta->update($validated);
        return redirect()->route('kereta.index')->with('success', 'Data kereta berhasil diupdate!');
    }

    public function destroy($id)
    {
        $kereta = Kereta::findOrFail($id);
        $kereta->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data kereta berhasil dihapus!',
        ]);
    }
}
