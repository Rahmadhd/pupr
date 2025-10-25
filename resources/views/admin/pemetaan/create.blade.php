@extends('layouts.admin')

@section('content')
<!-- Leaflet CSS for map picker -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>

<div class="card">
    <div class="card-header">Tambah Data Pemetaan</div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.pemetaan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Nama Kecamatan</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
            </div>
            <div class="mb-3">
                <label>Jalan yang diperbaiki</label>
                <textarea name="jalan_diperbaiki" class="form-control">{{ old('jalan_diperbaiki') }}</textarea>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Panjang Jalan (meter)</label>
                        <input type="number" step="0.01" name="panjang_jalan" class="form-control" value="{{ old('panjang_jalan') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Lebar Jalan (meter)</label>
                        <input type="number" step="0.01" name="lebar_jalan" class="form-control" value="{{ old('lebar_jalan') }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Latitude</label>
                        <input type="text" name="latitude" class="form-control" value="{{ old('latitude') }}" placeholder="Contoh: -6.0280331">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Longitude</label>
                        <input type="text" name="longitude" class="form-control" value="{{ old('longitude') }}" placeholder="Contoh: 106.0471210">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label>Pilih Titik pada Peta</label>
                <div id="mapPicker" style="height: 360px; border: 1px solid #e9ecef; border-radius: .5rem;"></div>
                <small class="text-muted">Klik pada peta untuk mengisi Latitude dan Longitude.</small>
            </div>
            <div class="mb-3">
                <label>PT (Kontraktor)</label>
                <input type="text" name="pt" class="form-control" value="{{ old('pt') }}">
            </div>
            <div class="mb-3">
                <label>Data Pembangunan</label>
                <textarea name="data_pembangunan" class="form-control">{{ old('data_pembangunan') }}</textarea>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>RT</label>
                        <input type="text" name="rt" class="form-control" value="{{ old('rt') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>RW</label>
                        <input type="text" name="rw" class="form-control" value="{{ old('rw') }}">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label>Upload Dokumen / Foto</label>
                <input type="file" name="dokumen" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.pemetaan.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection

@section('scripts')
@parent
<!-- Leaflet JS for map picker -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof window.L === 'undefined') {
            console.warn('Leaflet not loaded; skipping map picker');
            return;
        }
        const latInput = document.querySelector('input[name="latitude"]');
        const lngInput = document.querySelector('input[name="longitude"]');

        const latVal = parseFloat(latInput.value);
        const lngVal = parseFloat(lngInput.value);
        const hasCoords = !isNaN(latVal) && !isNaN(lngVal);
        const center = hasCoords ? [latVal, lngVal] : [-2.976074, 104.775430]; // Palembang default
        const zoom = hasCoords ? 15 : 12;

        const map = L.map('mapPicker').setView(center, zoom);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        let marker = hasCoords ? L.marker(center).addTo(map) : null;

        function placeMarker(latlng) {
            if (marker) {
                marker.setLatLng(latlng);
            } else {
                marker = L.marker(latlng).addTo(map);
            }
        }

        map.on('click', function (e) {
            const latlng = e.latlng;
            latInput.value = latlng.lat.toFixed(7);
            lngInput.value = latlng.lng.toFixed(7);
            placeMarker(latlng);
        });

        setTimeout(() => map.invalidateSize(), 250);
    });
</script>
@endsection
