<?php
use Illuminate\Support\Facades\DB;
use App\Models\Nav_model;
$site                 = DB::table('konfigurasi')->first();
// Nav profil
$myprofil    = new Nav_model();
$nav_materi  = $myprofil->nav_materi();
$nav_kalender  = $myprofil->nav_kalender();
$nav_akademik= $myprofil->nav_akademik();
$nav_vismis = $myprofil->nav_vismis();
$nav_kemahasiswaan = $myprofil->nav_kemahasiswaan();


?>
<!-- ======= Header ======= -->

<header id="header" class="d-flex fixed-top align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo">
            <a href="{{ url('/') }}"><img src="{{ asset('assets/upload/image/'.$site->logo) }}">
            <span><?php echo $site->namaweb ?></span>
        </a>
    </h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

        <nav id="navbar" class="navbar">

            <ul>
                <li><a class="nav-link scrollto " id="#" href="{{ url('/') }}">Beranda</a></li>
                <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ url('sejarah') }}">Sejarah</a></li>
                        <li><a href="{{ url('visi-misi/') }}">Visi & Misi</a></li>
                        <li><a href="{{ url('struktur') }}">Struktur Organisasi</a></li>
                        <li><a href="{{ url('data-dosen') }}">Data Dosen & Staf</a></li>
                        <li><a href="{{ url('fasilitas-kampus') }}">Fasilitas Kampus</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Akademik</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li class="dropdown"><a href="#"><span>PASCASARJANA</span> <i
                                    class="bi bi-chevron-right"></i></a>
                            <ul>
                                <li><a href="#">S2 ILMU KOMPUTER</a></li>
                                <li><a href="https://magister-sastra.universitasbumigora.ac.id/">S2 Sastra
                                        Inggris</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#"><span>Fakultas</span> <i
                                    class="bi bi-chevron-right"></i></a>
                            <ul>
                                <li class="dropdown"><a href="#"><span>Teknik</span> <i
                                            class="bi bi-chevron-right"></i></a>
                                    <ul>
                                        <li><a href="http://ilmukomputer.universitasbumigora.ac.id/">S1 Ilmu
                                                Komputer</a></li>
                                        <li><a href="http://ti.universitasbumigora.ac.id/">S1 Teknologi
                                                Informasi</a>
                                        </li>
                                        <li><a href="http://rpl.universitasbumigora.ac.id/">S1 Rekaya Perangkat
                                                Lunak</a></li>
                                        <li><a href="http://sisteminformasi.universitasbumigora.ac.id/">D3 Sistem
                                                Informasi</a></li>
                                        <li><a href="#">D3 Rekayasa Perangkat Lunak</a></li>
                                        <li><a href="https://teknologipangan.universitasbumigora.ac.id/">S1
                                                Teknologi
                                                Pangan</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#"><span>Fakultas Seni & Desain</span> <i
                                            class="bi bi-chevron-right"></i></a>
                                    <ul>
                                        <li><a href="http://dkv.universitasbumigora.ac.id/">S1 Desain Komunikasi
                                                Visual</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#"><span>Fakultas Kesehatan</span> <i
                                            class="bi bi-chevron-right"></i></a>
                                    <ul>
                                        <li><a href="http://gizi.universitasbumigora.ac.id/">S1 Gizi</a></li>
                                        <li><a href="http://farmasi.universitasbumigora.ac.id/">S1 Farmasi</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#"><span>Fakultas Ilmu Budaya</span> <i
                                            class="bi bi-chevron-right"></i></a>
                                    <ul>
                                        <li><a href="http://sastrainggris.universitasbumigora.ac.id/">S1 Sastra
                                                Inggris</a></li>
                                        <li><a href="http://bahasainggris.universitasbumigora.ac.id/">D3 Bahasa
                                                Inggris</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#"><span>Fakultas Hukum</span> <i
                                            class="bi bi-chevron-right"></i></a>
                                    <ul>
                                        <li><a href="http://hukum.universitasbumigora.ac.id/">S1 Hukum</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#"><span>Fakultas Ekonomi & Bisnis</span> <i
                                            class="bi bi-chevron-right"></i></a>
                                    <ul>
                                        <li><a href="https://bisnisdigital.universitasbumigora.ac.id">S1 Bisnis
                                                Digital</a></li>
                                        <li><a href="https://manajemen.universitasbumigora.ac.id/">S1 Manajemen</a>
                                        </li>
                                        <li><a href="https://akuntansi.universitasbumigora.ac.id/">S1 Akuntansi</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#"><span>Peraturan Akademik</span> <i
                                    class="bi bi-chevron-right"></i></a>
                            <ul>
                                <li><a href="{{ url('evaluasi-studi') }}">Evaluasi Studi & Penilaian</a></li>
                                <li><a href="{{ url('jurusan') }}">Jurusan</a></li>
                                <?php foreach($nav_akademik as $nav_akademik) { ?>
                                <li><a href="{{ asset('akademik/kategori/'.$nav_akademik->slug_kategori_akademik) }}">{{ Str::words($nav_akademik->nama_kategori_akademik,6) }}</a></li>
                                <?php } ?>
                                {{-- <li><a href="{{ url('perkuliahan') }}">Perkuliahan</a></li>
                                <li><a href="{{ url('perwalian') }}">Perwalian</a></li>
                                <li><a href="{{ url('praktikum') }}">Praktikum</a></li>
                                <li><a href="{{ url('sanksi') }}">Sanksi & Peringatan</a></li>
                                <li><a href="{{ url('syarat-ujian') }}">Syarat Ujian</a></li>
                                <li><a href="{{ url('tata-tertib') }}">Tata Tertib</a></li>
                                <li><a href="{{ url('tugas-akhir') }}">Tugas Akhir & Skripsi</a></li>
                                <li><a href="{{ url('kuliah-kerja') }}">Kuliah Kerja Praktek</a></li> --}}
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#"><span>Informasi</span> <i
                                    class="bi bi-chevron-right"></i></a>
                            <ul>
                                <li><a href="https://baak.universitasbumigora.ac.id/">Website Akademik</a></li>
                                <?php foreach($nav_kalender as $nav_kalender) { ?>
                                    <li><a href="{{ asset('kalender/kategori/'.$nav_kalender->slug_kategori_kalender) }}">{{ Str::words($nav_kalender->nama_kategori_kalender,6) }}</a></li>
                                    <?php } ?>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#"><span>Kemahasiswaan</span> <i
                                    class="bi bi-chevron-right"></i></a>
                            <ul>
                                <?php foreach($nav_kemahasiswaan as $nav_kemahasiswaan) { ?>
                                    <li><a href="{{ asset('kemahasiswaan/kategori/'.$nav_kemahasiswaan->slug_kategori_kemahasiswaan) }}">{{ Str::words($nav_kemahasiswaan->nama_kategori_kemahasiswaan,6) }}</a></li>
                                    <?php } ?>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Unduh</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <?php foreach($nav_materi as $nav_materi) { ?>
                            <li><a href="{{ asset('download/kategori/'.$nav_materi->slug_kategori_download) }}">{{ Str::words($nav_materi->nama_kategori_download,6) }}</a></li>
                            <?php } ?>
                        {{-- <li><a href="{{ url('adum') }}">Administrasi Umum</a></li> --}}
                        <li><a href="{{ url('jurusan') }}">Jurusan</a></li>
                        {{-- <li><a href="{{ url('pustik') }}">PusTik</a></li>
                        <li><a href="{{ url('beasiswa-ppa') }}">Beasiswa PPA</a></li> --}}
                        <li><a href="{{ url('mbkm') }}">MBKM</a></li>
                    </ul>
                </li>   
                
                <li><a class="nav-link scrollto" id="#" href="{{ url('pengumuman') }}" >Pengumuman</a></li>

                <li class="dropdown"><a href="#"><span>Galeri</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ url('video') }}">Video</a></li>
                        <li><a href="{{ url('foto') }}">Foto</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="{{ url('berita') }}">Berita</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
      var currentLocation = window.location.href;
      var navLinks = document.querySelectorAll("nav a");
  
      navLinks.forEach(function (link) {
        if (link.href === currentLocation) {
          link.classList.add("active");
        }
      });
    });
  </script>
  
