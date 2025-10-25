@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1>Data Kecamatan</h1>
    <a href="{{ route('admin.kecamatan.create') }}" class="btn btn-success mb-3">Tambah Data</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Kecamatan</th>
                <th>Jalan Diperbaiki</th>
                <th>Panjang Jalan</th>
                <th>Lebar Jalan</th>
                <th>RT</th>
                <th>RW</th>
                <th>Data Pembangunan</th>
                <th>Dokumen</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kecamatans as $kecamatan)
            <tr>
                <td>{{ $kecamatan->nama }}</td>
                <td>{{ $kecamatan->jalan_diperbaiki }}</td>
                <td>{{ $kecamatan->panjang_jalan }}</td>
                <td>{{ $kecamatan->lebar_jalan }}</td>
                <td>{{ $kecamatan->rt }}</td>
                <td>{{ $kecamatan->rw }}</td>
                <td>{{ $kecamatan->data_pembangunan }}</td>
                <td>
                    @if($kecamatan->dokumen)
                        <a href="{{ asset('storage/'.$kecamatan->dokumen) }}" target="_blank">Lihat</a>
                    @endif
                </td>
                <td>
                    <a href="{{ route('kecamatan.edit', $kecamatan->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('kecamatan.destroy', $kecamatan->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
