<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pemetaan;
use Illuminate\Http\Request;

class PemetaanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $pemetaans = Pemetaan::query()
            ->when($search, function ($q) use ($search) {
                $q->where(function ($qq) use ($search) {
                    $qq->where('nama', 'like', "%{$search}%")
                       ->orWhere('jalan_diperbaiki', 'like', "%{$search}%")
                       ->orWhere('pt', 'like', "%{$search}%")
                       ->orWhere('rt', 'like', "%{$search}%")
                       ->orWhere('rw', 'like', "%{$search}%");
                });
            })
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return view('admin.pemetaan.index', compact('pemetaans', 'search'));
    }

    public function create()
    {
        return view('admin.pemetaan.create');
    }

    public function store(Request $request)
    {
        // Normalize comma decimals to dots for lat/lng (locale-safe)
        if ($request->has('latitude')) {
            $request->merge(['latitude' => is_string($request->latitude) ? str_replace(',', '.', $request->latitude) : $request->latitude]);
        }
        if ($request->has('longitude')) {
            $request->merge(['longitude' => is_string($request->longitude) ? str_replace(',', '.', $request->longitude) : $request->longitude]);
        }
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'jalan_diperbaiki' => 'nullable|string',
            'panjang_jalan' => 'nullable|numeric',
            'lebar_jalan' => 'nullable|numeric',
            'pt' => 'nullable|string|max:255',
            'data_pembangunan' => 'nullable|string',
            'rt' => 'nullable|string',
            'rw' => 'nullable|string',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'dokumen' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $path = $file->store('dokumen', 'public');
            $data['dokumen'] = $path;
        }

        Pemetaan::create($data);

        return redirect()->route('admin.pemetaan.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(Pemetaan $pemetaan)
    {
        return view('admin.pemetaan.edit', compact('pemetaan'));
    }

    public function update(Request $request, Pemetaan $pemetaan)
    {
        // Normalize comma decimals to dots for lat/lng (locale-safe)
        if ($request->has('latitude')) {
            $request->merge(['latitude' => is_string($request->latitude) ? str_replace(',', '.', $request->latitude) : $request->latitude]);
        }
        if ($request->has('longitude')) {
            $request->merge(['longitude' => is_string($request->longitude) ? str_replace(',', '.', $request->longitude) : $request->longitude]);
        }
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'jalan_diperbaiki' => 'nullable|string',
            'panjang_jalan' => 'nullable|numeric',
            'lebar_jalan' => 'nullable|numeric',
            'pt' => 'nullable|string|max:255',
            'data_pembangunan' => 'nullable|string',
            'rt' => 'nullable|string',
            'rw' => 'nullable|string',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'dokumen' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $path = $file->store('dokumen', 'public');
            $data['dokumen'] = $path;
        }

        $pemetaan->update($data);

        return redirect()->route('admin.pemetaan.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Pemetaan $pemetaan)
    {
        $pemetaan->delete();
        return redirect()->route('admin.pemetaan.index')->with('success', 'Data berhasil dihapus.');
    }

    public function show(Pemetaan $pemetaan)
    {
        return view('admin.pemetaan.show', compact('pemetaan'));
    }
}
