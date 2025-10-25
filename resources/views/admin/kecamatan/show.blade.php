<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Detail Proyek — Renovasi Jembatan Ampera</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Leaflet CSS & JS (keempat CDN dimuat sebelum inisialisasi) -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>

    <style>
        /* minor styles */
        #map {
            height: 320px;
        }

        .kv {
            min-width: 10rem
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800 font-sans">
<div class="max-w-6xl mx-auto p-6">
    <div class="flex items-start justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold">Renovasi Jembatan Ampera</h1>
            <p class="text-sm text-slate-500 mt-1">Proyek Dinas PUPR Kota Palembang — Kode: PUPR/AMPR/2025/001</p>
        </div>
        <div class="text-right">
                <span class="inline-block px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-sm font-medium">Status:
                    On Progress</span>
            <div class="text-xs text-slate-500 mt-2">Progress: <span class="font-medium">58%</span></div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left column: summary + map -->
        <div class="lg:col-span-2 space-y-6">

            <!-- Card: overview -->
            <div class="bg-white p-5 rounded-2xl shadow">
                <div class="md:flex md:items-center md:justify-between">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-14 h-14 rounded-full bg-gradient-to-br from-blue-400 to-indigo-500 flex items-center justify-center text-white font-semibold">
                            AM</div>
                        <div>
                            <div class="text-lg font-semibold">Renovasi Jembatan Ampera</div>
                            <div class="text-sm text-slate-500">Lokasi: Jembatan Ampera, Palembang</div>
                        </div>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <a href="/peta"
                           class="inline-block text-sm px-4 py-2 bg-slate-100 rounded-md hover:bg-slate-200">Kembali
                            ke peta</a>
                    </div>
                </div>

                <div class="mt-6">
                    <div class="w-full bg-slate-100 rounded-full h-3 overflow-hidden">
                        <div class="h-3 bg-green-500" style="width:58%"></div>
                    </div>
                    <div class="flex justify-between text-xs text-slate-500 mt-2">
                        <div>58% selesai</div>
                        <div>Estimasi selesai: <strong>12 Des 2025</strong></div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mt-5">
                    <div class="bg-slate-50 p-4 rounded-lg">
                        <div class="text-xs text-slate-500">Anggaran Total</div>
                        <div class="text-lg font-semibold mt-1">Rp 45.000.000.000</div>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-lg">
                        <div class="text-xs text-slate-500">Sudah Terpakai</div>
                        <div class="text-lg font-semibold mt-1">Rp 26.100.000.000</div>
                    </div>
                </div>
            </div>

            <!-- Card: map -->
            <div class="bg-white p-4 rounded-2xl shadow">
                <div class="flex items-start justify-between mb-3">
                    <div>
                        <h3 class="font-semibold">Lokasi Proyek</h3>
                        <p class="text-sm text-slate-500">Jembatan Ampera — Palembang</p>
                    </div>
                    <div class="text-sm text-slate-500">Koordinat: <span class="font-mono">-2.9901, 104.7624</span>
                    </div>
                </div>
                <div id="map" class="rounded-lg border"></div>
                <div class="mt-3 text-sm text-slate-500">Marker menandai titik pusat pekerjaan; area kerja ditandai
                    sebagai radius ~150m.</div>
            </div>

            <!-- Card: gallery -->
            <div class="bg-white p-4 rounded-2xl shadow">
                <h3 class="font-semibold mb-3">Galeri & Dokumen</h3>
                <div class="grid grid-cols-3 gap-3">
                    <img src="https://images.unsplash.com/photo-1509395176047-4a66953fd231?q=80&w=800&auto=format&fit=crop&ixlib=rb-4.0.3&s=placeholder"
                         alt="ampera-1" class="w-full h-32 object-cover rounded">
                    <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?q=80&w=800&auto=format&fit=crop&ixlib=rb-4.0.3&s=placeholder"
                         alt="ampera-2" class="w-full h-32 object-cover rounded">
                    <img src="https://images.unsplash.com/photo-1496307042754-b4aa456c4a2d?q=80&w=800&auto=format&fit=crop&ixlib=rb-4.0.3&s=placeholder"
                         alt="ampera-3" class="w-full h-32 object-cover rounded">
                </div>

                <div class="mt-4 flex gap-3">
                    <a href="#" class="px-4 py-2 bg-slate-100 rounded hover:bg-slate-200 text-sm">Download RAB
                        (PDF)</a>
                    <a href="#" class="px-4 py-2 bg-slate-100 rounded hover:bg-slate-200 text-sm">Lihat Gambar
                        Teknis</a>
                </div>
            </div>

        </div>

        <!-- Right column: detail metadata -->
        <aside class="space-y-6">
            <div class="bg-white p-4 rounded-2xl shadow">
                <h4 class="font-semibold mb-3">Informasi Proyek</h4>
                <div class="grid grid-cols-2 gap-2 text-sm text-slate-600">
                    <div class="kv">Nomor Kontrak</div>
                    <div class="font-medium">KTR-2025-AMPR-07</div>
                    <div class="kv">Sumber Dana</div>
                    <div>APBN - PUPR</div>
                    <div class="kv">Tanggal Mulai</div>
                    <div>15 Mar 2025</div>
                    <div class="kv">Estimasi Selesai</div>
                    <div>12 Des 2025</div>
                    <div class="kv">Panjang Jembatan</div>
                    <div>1.1 km</div>
                    <div class="kv">Lebar</div>
                    <div>12 m</div>
                    <div class="kv">Volume Pekerjaan</div>
                    <div>Perbaikan Struktur & Penerangan</div>
                </div>
            </div>

            <div class="bg-white p-4 rounded-2xl shadow">
                <h4 class="font-semibold mb-3">Vendor</h4>
                <div class="text-sm text-slate-700">
                    <div class="font-medium">PT. Kontraktor Nusantara</div>
                    <div class="text-xs text-slate-500 mt-1">PIC: Budi Santoso</div>
                    <div class="text-xs text-slate-500">Tel: +62 811-234-567</div>
                    <div class="text-xs text-slate-500">Email: budi.s@kn-construct.co.id</div>
                </div>
                <div class="mt-3">
                    <a href="#" class="inline-block px-3 py-2 bg-blue-600 text-white rounded-md text-sm">Hubungi
                        Vendor</a>
                </div>
            </div>

            <div class="bg-white p-4 rounded-2xl shadow">
                <h4 class="font-semibold mb-3">Catatan & Risiko</h4>
                <ul class="text-sm text-slate-600 space-y-2">
                    <li>- Pembatasan lalu lintas malam hari diperlukan selama penggantian kabel.</li>
                    <li>- Risiko cuaca saat musim hujan; jadwal dapat bergeser.</li>
                    <li>- Perlu koordinasi dengan Dinas Perhubungan setempat.</li>
                </ul>
            </div>

            <div class="bg-white p-4 rounded-2xl shadow">
                <h4 class="font-semibold mb-3">Quick Actions</h4>
                <div class="flex flex-col gap-2">
                    <a class="px-3 py-2 rounded bg-green-50 text-green-700 text-sm">Tambah Progress</a>
                    <a class="px-3 py-2 rounded bg-amber-50 text-amber-700 text-sm">Laporkan Inspeksi</a>
                    <a class="px-3 py-2 rounded bg-red-50 text-red-700 text-sm">Laporkan Risiko</a>
                </div>
            </div>

        </aside>
    </div>

    <!-- Timeline -->
    <div class="mt-8 bg-white p-5 rounded-2xl shadow">
        <h3 class="font-semibold mb-4">Timeline & Milestone</h3>
        <div class="space-y-4">
            <div class="flex items-start gap-4">
                <div class="w-3 h-3 rounded-full bg-green-500 mt-2"></div>
                <div>
                    <div class="text-sm font-medium">15 Mar 2025 — Mobilisasi Kontraktor</div>
                    <div class="text-xs text-slate-500">Alat & tenaga kerja mulai hadir di lokasi.</div>
                </div>
            </div>

            <div class="flex items-start gap-4">
                <div class="w-3 h-3 rounded-full bg-green-500 mt-2"></div>
                <div>
                    <div class="text-sm font-medium">05 Apr 2025 — Pekerjaan Struktur Dimulai</div>
                    <div class="text-xs text-slate-500">Perbaikan beton dan penguatan pondasi.</div>
                </div>
            </div>

            <div class="flex items-start gap-4">
                <div class="w-3 h-3 rounded-full bg-amber-400 mt-2"></div>
                <div>
                    <div class="text-sm font-medium">01 Okt 2025 — Pemasangan Penerangan (On-going)</div>
                    <div class="text-xs text-slate-500">Pemasangan rangkaian lampu LED baru di seluruh badan
                        jembatan.</div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    // Simple init for the map — marker + circle to highlight area.
    window.addEventListener('load', () => {
        if (typeof window.L === 'undefined') {
            console.error('Leaflet belum tersedia. Pastikan leaflet.js dimuat.');
            return;
        }

        const map = L.map('map', { zoomControl: true }).setView([-2.9901, 104.7624], 16);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Marker dengan custom icon (simple circle marker)
        const bridgeIcon = L.icon({
            iconUrl: 'https://upload.wikimedia.org/wikipedia/commons/e/ec/RedDot.svg',
            iconSize: [18, 18],
            iconAnchor: [9, 9]
        });

        const marker = L.marker([-2.9901, 104.7624], { icon: bridgeIcon }).addTo(map);
        marker.bindPopup('<strong>Jembatan Ampera</strong><br>Renovasi struktur & penerangan').openPopup();

        // Highlight approximate working area as circle (radius ~150 meters)
        const area = L.circle([-2.9901, 104.7624], {
            radius: 150,
            color: '#2563EB',
            fillColor: '#2563EB',
            fillOpacity: 0.08
        }).addTo(map);

        // Fit bounds with some padding
        const group = L.featureGroup([marker, area]);
        map.fitBounds(group.getBounds().pad(0.3));
    });
</script>
</body>

</html>
