@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        Data Pemetaan
    </div>

    <div class="card-body">
        <div style="margin-bottom: 10px;" class="row align-items-center">
            <div class="col-lg-6 mb-2 mb-lg-0">
                <a class="btn btn-success" href="{{ route('admin.pemetaan.create') }}">
                    Tambah Data
                </a>
            </div>
            <div class="col-lg-6">
                <form method="GET" action="{{ route('admin.pemetaan.index') }}">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari Kecamatan…" value="{{ $search }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Cari</button>
                            @if(!empty($search))
                                <a href="{{ route('admin.pemetaan.index') }}" class="btn btn-outline-secondary">Reset</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Kecamatan</th>
                        <th>Jalan Diperbaiki</th>
                        <th>Panjang Jalan</th>
                        <th>Lebar Jalan</th>
                        <th>PT</th>
                        <th>Dokumen</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pemetaans as $key => $pemetaan)
                        <tr data-entry-id="{{ $pemetaan->id }}">
                            <td>{{ $pemetaan->id }}</td>
                            <td>{{ $pemetaan->nama }}</td>
                            <td>{{ $pemetaan->jalan_diperbaiki }}</td>
                            <td>{{ $pemetaan->panjang_jalan }}</td>
                            <td>{{ $pemetaan->lebar_jalan }}</td>
                            <td>{{ $pemetaan->pt }}</td>
                            <td>
                                @if($pemetaan->dokumen)
                                    <a href="{{ asset('storage/'.$pemetaan->dokumen) }}" target="_blank">Lihat</a>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.pemetaan.show', $pemetaan->id) }}">Lihat</a>
                                <a class="btn btn-xs btn-info" href="{{ route('admin.pemetaan.edit', $pemetaan->id) }}">Edit</a>
                                <form action="{{ route('admin.pemetaan.destroy', $pemetaan->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?');" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-xs btn-danger" value="Hapus">
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $pemetaans->links() }}
        </div>
    </div>
</div>
@endsection

{{-- No DataTables script: using server-side pagination & search --}}
