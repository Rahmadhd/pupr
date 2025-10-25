@extends('layouts.admin')

@section('content')
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>

<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center bg-white border-0 py-3 px-4">
        <div>
            <span class="text-muted d-block small">Detail Pemetaan</span>
            <strong class="h5 mb-0">{{ $pemetaan->nama }}</strong>
        </div>
        <div>
            <a href="{{ route('admin.pemetaan.index') }}" class="btn btn-sm btn-outline-secondary">Kembali</a>
        </div>
    </div>

    <div class="card-body p-4">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="mb-3">
                    @if($pemetaan->jalan_diperbaiki)
                        <span class="badge bg-light text-dark border">Jalan diperbaiki: {{ $pemetaan->jalan_diperbaiki }}</span>
                    @endif
                    @if($pemetaan->pt)
                        <span class="badge bg-primary ms-2">PT: {{ $pemetaan->pt }}</span>
                    @endif
                </div>

                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="border rounded p-3 h-100">
                            <div class="text-muted small">Panjang Jalan (m)</div>
                            <div class="fw-semibold fs-5">{{ $pemetaan->panjang_jalan ?? '-' }}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="border rounded p-3 h-100">
                            <div class="text-muted small">Lebar Jalan (m)</div>
                            <div class="fw-semibold fs-5">{{ $pemetaan->lebar_jalan ?? '-' }}</div>
                        </div>
                    </div>
                    <div class="col-sm-6 mt-3">
                        <div class="border rounded p-3 h-100">
                            <div class="text-muted small">Luas (m²)</div>
                            @php
                                $luas = null;
                                if (!is_null($pemetaan->panjang_jalan) && !is_null($pemetaan->lebar_jalan)) {
                                    $luas = (float)$pemetaan->panjang_jalan * (float)$pemetaan->lebar_jalan;
                                }
                            @endphp
                            <div class="fw-semibold fs-5">{{ $luas !== null ? number_format($luas, 2) : '-' }}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="border rounded p-3 h-100">
                            <div class="text-muted small">RT / RW</div>
                            <div class="fw-semibold fs-5">{{ $pemetaan->rt ?? '-' }} / {{ $pemetaan->rw ?? '-' }}</div>
                        </div>
                    </div>
                </div>

                @if($pemetaan->data_pembangunan)
                <div class="mt-4">
                    <div class="text-muted small mb-1">Data Pembangunan</div>
                    <div class="border rounded p-3">{!! nl2br(e($pemetaan->data_pembangunan)) !!}</div>
                </div>
                @endif

                <div class="mt-4">
                    <div class="text-muted small mb-1">Lokasi</div>
                    @if(!is_null($pemetaan->latitude) && !is_null($pemetaan->longitude))
                        <div class="text-muted small mb-2">Koordinat: {{ $pemetaan->latitude }}, {{ $pemetaan->longitude }}</div>
                    @else
                        <div class="text-muted small mb-2">Koordinat belum diisi</div>
                    @endif
                    <div id="mapPemetaan" style="height: 360px; border-radius: .5rem; overflow: hidden; border: 1px solid #e9ecef;"></div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="border rounded p-3 mb-3">
                    <div class="text-muted small mb-2">Dokumen / Foto</div>
                    @if($pemetaan->dokumen)
                        @php
                            $path = $pemetaan->dokumen;
                            $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
                            $isImage = in_array($ext, ['jpg','jpeg','png','gif','webp']);
                        @endphp
                        @if($isImage)
                            <img src="{{ asset('storage/'.$path) }}" class="img-fluid rounded mb-2" alt="dokumen">
                        @endif
                        <div class="d-flex gap-2">
                            <a href="{{ asset('storage/'.$path) }}" target="_blank" class="btn btn-sm btn-outline-primary">Lihat</a>
                            <a href="{{ asset('storage/'.$path) }}" download class="btn btn-sm btn-outline-secondary">Unduh</a>
                        </div>
                    @else
                        <div class="text-muted">Tidak ada dokumen</div>
                    @endif
                </div>

                <div class="border rounded p-3">
                    <div class="text-muted small mb-2">Ringkasan</div>
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex justify-content-between py-1"><span class="text-muted">Nama</span><span class="fw-semibold">{{ $pemetaan->nama }}</span></li>
                        <li class="d-flex justify-content-between py-1"><span class="text-muted">PT</span><span class="fw-semibold">{{ $pemetaan->pt ?? '-' }}</span></li>
                        <li class="d-flex justify-content-between py-1"><span class="text-muted">RT</span><span class="fw-semibold">{{ $pemetaan->rt ?? '-' }}</span></li>
                        <li class="d-flex justify-content-between py-1"><span class="text-muted">RW</span><span class="fw-semibold">{{ $pemetaan->rw ?? '-' }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@parent
<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof window.L === 'undefined') {
            console.warn('Leaflet library not loaded; skipping map init');
            return;
        }
        const hasCoords = {{ (!is_null($pemetaan->latitude) && !is_null($pemetaan->longitude)) ? 'true' : 'false' }};
        const center = hasCoords ? [{{ $pemetaan->latitude ?? 0 }}, {{ $pemetaan->longitude ?? 0 }}] : [-2.976074, 104.775430]; // Palembang default
        const zoom = hasCoords ? 15 : 12;
        const projName = @json($pemetaan->nama);

        const map = L.map('mapPemetaan', { zoomControl: true }).setView(center, zoom);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        const popupText = hasCoords
            ? `Lokasi: ${projName}<br>[${center[0].toFixed(6)}, ${center[1].toFixed(6)}]`
            : 'Lokasi proyek (dummy)';
        L.marker(center).addTo(map).bindPopup(popupText);

        setTimeout(() => { map.invalidateSize(); }, 300);
    });
</script>
@endsection
