@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <span>KEDINASAN PUPR </span>
                    <!-- Logo di header sebelah kanan -->
                    <img src="{{ asset('images/logo-pupr.png') }}" 
                         alt="Logo PUPR" 
                         style="height:50px;">
                </div>

                <div class="card-body text-center">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Logo besar di tengah -->
                    <div class="mb-3">
                        <img src="{{ asset('images/logo-pupr1.png') }}" 
                             alt="Logo PUPR" 
                             style="max-width:350px; height:auto;">
                    </div>

                    <h4>Selamat Datang di Website Contracts 
                        Kementerian Dinas PUPR 
                        Kota Palembang

                  <!-- ===================== PROFIL ===================== -->
<div class="row mt-5 text-left align-items-center">
    <!-- Kolom kiri: Deskripsi -->
    <div class="col-md-7" data-aos="fade-right">
        <h5>Profil Dinas PUPR Kota Palembang</h5>
        <p>
            Dinas Pekerjaan Umum dan Perumahan Rakyat (PUPR) Kota Palembang 
            merupakan instansi pemerintah yang bertugas dalam perencanaan, 
            pembangunan, pengawasan, serta pemeliharaan infrastruktur wilayah 
            Kota Palembang. 
        </p>
        <p>
            Fokus utama PUPR meliputi pembangunan jalan dan jembatan, 
            penyediaan sarana prasarana permukiman, pengelolaan sumber daya air, 
            serta mendukung program perumahan rakyat yang layak huni dan berkelanjutan. 
        </p>
        <p>
            Dengan hadirnya sistem informasi kontrak berbasis web ini, 
            diharapkan dapat meningkatkan transparansi, akuntabilitas, 
            dan efisiensi dalam pelaksanaan proyek-proyek pembangunan di Kota Palembang.
        </p>
    </div>

    <!-- Kolom kanan: Foto -->
    <div class="col-md-5 text-center" data-aos="zoom-in">
        <img src="{{ asset('images/kantor-pupr.jpg') }}" 
             alt="Kantor PUPR Palembang" 
             class="img-fluid rounded shadow foto-animasi">
    </div>
</div>

<!-- ===================== VISI & MISI ===================== -->
<div class="row mt-5 text-left align-items-center">
    <!-- Kolom kiri: Foto -->
    <div class="col-md-5 text-center" data-aos="fade-left">
        <img src="{{ asset('images/visi-misi.jpg') }}" 
             alt="Visi Misi PUPR" 
             class="img-fluid rounded shadow foto-animasi">
    </div>

    <!-- Kolom kanan: Deskripsi -->
    <div class="col-md-7" data-aos="fade-up">
        <h5>VISI</h5>
        <p>
            “Mewujudkan infrastruktur yang handal, berkelanjutan, 
            serta mendukung pertumbuhan ekonomi dan kesejahteraan masyarakat Kota Palembang.”
        </p>

        <h5>MISI</h5>
        <ul>
            <li>Meningkatkan kualitas pembangunan dan pemeliharaan infrastruktur jalan dan jembatan.</li>
            <li>Menyediakan sarana prasarana perumahan dan permukiman yang layak dan berkelanjutan.</li>
            <li>Mengoptimalkan pengelolaan sumber daya air untuk kepentingan masyarakat.</li>
            <li>Meningkatkan tata kelola pemerintahan yang transparan, akuntabel, dan partisipatif.</li>
        </ul>
    </div>
</div>
<!-- ===================== END VISI & MISI ===================== -->

<!-- Tambahkan di bawah konten -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,  // durasi animasi
        once: true       // hanya muncul sekali
    });
</script>

<style>
/* Efek hover lembut pada foto */
.foto-animasi {
    transition: all 0.4s ease;
}
.foto-animasi:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}
</style>

<!-- ===================== KONTAK KAMI ===================== -->
<!-- Import AOS CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<div class="row mt-5">
    <div class="col-12 text-center" data-aos="fade-down">
        <h4 class="fw-bold mb-4">Kontak Kami</h4>
    </div>

    <!-- MAPS LOKASI -->
    <div class="col-12 mb-4" data-aos="zoom-in">
        <div class="ratio ratio-16x9">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15961.005141877387!2d104.7645835!3d-2.9799373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b7615cf26f1c9%3A0x48e3d43a995f7a29!2sDinas%20Pekerjaan%20Umum%20Dan%20Penataan%20Ruang%20Palembang!5e0!3m2!1sid!2sid!4v1696256478901!5m2!1sid!2sid"
                width="100%" 
                height="450" 
                style="border:0; border-radius:10px;" 
                allowfullscreen 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>

    <!-- KONTAK DETAIL -->
    <div class="col-12">
        <div class="row text-center small">

            <!-- KIRI -->
            <div class="col-md-6 mb-3" data-aos="fade-right">
                <div class="contact-item p-3 shadow-sm rounded-3">
                    <p class="mb-2">
                        <i class="fas fa-envelope text-primary me-2"></i>
                        <strong>Email:</strong> info@dpupr-palembang.com
                    </p>
                    <p class="mb-0">
                        <i class="fas fa-phone-alt text-success me-2"></i>
                        <strong>Telepon/HP:</strong> (0711) 710033
                    </p>
                </div>
            </div>

            <!-- KANAN -->
            <div class="col-md-6 mb-3" data-aos="fade-left">
                <div class="contact-item p-3 shadow-sm rounded-3">
                    <p class="mb-2">
                        <i class="fab fa-facebook text-primary me-2"></i>
                        <strong>Facebook:</strong> 
                        <a href="https://web.facebook.com/profile.php?id=61575007388689" target="_blank">
                            fb.com/puprpalembang
                        </a>
                    </p>
                    <p class="mb-0">
                        <i class="fab fa-instagram text-danger me-2"></i>
                        <strong>Instagram:</strong> 
                        <a href="https://www.instagram.com/dinas_pupr_palembang/" target="_blank">
                            @puprpalembang
                        </a>
                    </p>
                </div>
            </div>

            <!-- ALAMAT (TENGAH BAWAH) -->
            <div class="col-12 mt-3" data-aos="fade-up">
                <div class="contact-item p-3 shadow-sm rounded-3">
                    <p class="mb-0">
                        <i class="fas fa-map-marker-alt text-warning me-2"></i>
                        <strong>Alamat:</strong> 
                        Jl. Slamet Riady No.550, Kuto Batu, Kec. Ilir Tim. II, Kota Palembang, Sumatera Selatan 30114
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- STYLING TAMBAHAN -->
<style>
    .contact-item {
        background: #ffffff;
        transition: all 0.3s ease;
    }

    .contact-item:hover {
        transform: translateY(-5px);
        background: #f8f9fa;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .contact-item a {
        color: inherit;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .contact-item a:hover {
        color: #0d6efd;
        text-decoration: underline;
    }
</style>

<!-- Import AOS JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,  // durasi animasi
        once: true      // animasi hanya muncul sekali
    });
</script>
<!-- ===================== END KONTAK KAMI ===================== -->



                </div>
            </div>
        </div>
    </div>
</div>
@endsection