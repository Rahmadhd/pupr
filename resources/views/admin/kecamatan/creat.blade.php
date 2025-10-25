@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1>{{ isset($kecamatan) ? 'Edit' : 'Tambah' }} Data Kecamatan</h1>

    <form action="{{ isset($kecamatan) ? route('kecamatan.update', $kecamatan->id) : route('kecamatan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($kecamatan))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label>Nama Kecamatan</label>
            <input type="text" name="nama" class="form-control" value="{{ $kecamatan->nama ?? '' }}" required>
        </div>
        <div class="mb-3">
            <label>Jalan yang diperbaiki</label>
            <textarea name="jalan_diperbaiki" class="form-control">{{ $kecamatan->jalan_diperbaiki ?? '' }}</textarea>
        </div>
        <div class="mb-3">
            <label>Panjang Jalan (meter)</label>
            <input type="number" step="0.01" name="panjang_jalan" class="form-control" value="{{ $kecamatan->panjang_jalan ?? '' }}">
        </div>
        <div class="mb-3">
            <label>Lebar Jalan (meter)</label>
            <input type="number" step="0.01" name="lebar_jalan" class="form-control" value="{{ $kecamatan->lebar_jalan ?? '' }}">
        </div>
        <div class="mb-3">
            <label>Data Pembangunan</label>
            <textarea name="data_pembangunan" class="form-control">{{ $kecamatan->data_pembangunan ?? '' }}</textarea>
        </div>
        <div class="mb-3">
            <label>RT</label>
            <input type="text" name="rt" class="form-control" value="{{ $kecamatan->rt ?? '' }}">
        </div>
        <div class="mb-3">
            <label>RW</label>
            <input type="text" name="rw" class="form-control" value="{{ $kecamatan->rw ?? '' }}">
        </div>
        <div class="mb-3">
            <label>Upload Dokumen / Foto</label>
            <input type="file" name="dokumen" class="form-control">
            @if(isset($kecamatan) && $kecamatan->dokumen)
                <a href="{{ asset('storage/'.$kecamatan->dokumen) }}" target="_blank">Lihat file</a>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
