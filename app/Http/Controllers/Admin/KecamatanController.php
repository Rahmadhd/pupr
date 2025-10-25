<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function index()
    {
        $kecamatans = Kecamatan::all();
        return view('admin.kecamatan.index', compact('kecamatans'));
    }

    public function create()
    {
        return view('admin.kecamatan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'jalan_diperbaiki' => 'nullable|string',
            'panjang_jalan' => 'nullable|numeric',
            'lebar_jalan' => 'nullable|numeric',
            'data_pembangunan' => 'nullable|string',
            'rt' => 'nullable|string',
            'rw' => 'nullable|string',
            'dokumen' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);

        if($request->hasFile('dokumen')){
            $file = $request->file('dokumen');
            $path = $file->store('dokumen', 'public');
            $data['dokumen'] = $path;
        }

        Kecamatan::create($data);

        return redirect()->route('kecamatan.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(Kecamatan $kecamatan)
    {
        return view('admin.kecamatan.edit', compact('kecamatan'));
    }

    public function update(Request $request, Kecamatan $kecamatan)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'jalan_diperbaiki' => 'nullable|string',
            'panjang_jalan' => 'nullable|numeric',
            'lebar_jalan' => 'nullable|numeric',
            'data_pembangunan' => 'nullable|string',
            'rt' => 'nullable|string',
            'rw' => 'nullable|string',
            'dokumen' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);

        if($request->hasFile('dokumen')){
            $file = $request->file('dokumen');
            $path = $file->store('dokumen', 'public');
            $data['dokumen'] = $path;
        }

        $kecamatan->update($data);

        return redirect()->route('kecamatan.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Kecamatan $kecamatan)
    {
        $kecamatan->delete();
        return redirect()->route('kecamatan.index')->with('success', 'Data berhasil dihapus.');
    }
}
