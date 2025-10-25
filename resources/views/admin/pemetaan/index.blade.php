@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1>Pemetaan</h1>

    <!-- Input Pencarian -->
    <form method="GET" action="">
        <input type="text" name="q" placeholder="Cari nama kecamatan..." style="width: 80%; padding: 5px;">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    @if(isset($results))
    <h4>Hasil Pencarian:</h4>
    <ul>
        @forelse($results as $kecamatan)
            <li>{{ $kecamatan->nama }} - Jalan diperbaiki: {{ $kecamatan->jalan_diperbaiki ?? '-' }}</li>
        @empty
            <li>Tidak ditemukan</li>
        @endforelse
    </ul>
    @endif
</div>
@endsection
