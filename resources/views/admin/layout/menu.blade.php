<style type="text/css" media="screen">
    .nav ul li p !important {
        font-size: 12px;
    }

    .infoku {
        margin-left: 20px;
        text-transform: uppercase;
        color: yellow;
        font-size: 11px;
    }
</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ asset('admin/dasbor') }}" class="brand-link">
        <img src="{{ asset('assets/upload/image/'.website('icon')) }}"
        alt="{{ website('namaweb') }}"
        class="brand-image img-circle elevation-3"
        style="opacity: .8">
     <span class="brand-text font-weight-light">{{ website('namaweb') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- DASHBOARD -->
                <li class="nav-item">
                    <a href="{{ asset('admin/dasbor') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <!-- Website Content -->
                <li class="batas">
                    <hr> <span class="infoku"><i class="fa fa-certificate"></i> Berita & Content</span>
                </li>
                <li class="batas">
                    <hr>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>Berita<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ asset('admin/berita') }}" class="nav-link"><i
                                    class="fas fa-newspaper nav-icon"></i>
                                <p>Data Berita</p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/berita/tambah') }}" class="nav-link"><i
                                    class="fa fa-plus nav-icon"></i>
                                <p>Tambah Berita</p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/kategori') }}" class="nav-link"><i
                                    class="fa fa-tags nav-icon"></i>
                                <p>Kategori berita</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>Pengumuman<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ asset('admin/pengumuman') }}" class="nav-link"><i
                                    class="fas fa-newspaper nav-icon"></i>
                                <p>Data Pengumuman</p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/pengumuman/tambah') }}" class="nav-link"><i
                                    class="fa fa-plus nav-icon"></i>
                                <p>Tambah Pengumuman</p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/kategori-pengumuman') }}" class="nav-link"><i
                                    class="fa fa-tags nav-icon"></i>
                                <p>Kategori Pengumuman</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-image"></i>
                        <p>Galeri Banner<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ asset('admin/galeri') }}" class="nav-link"><i
                                    class="fas fa-newspaper nav-icon"></i>
                                <p>Data Galeri</p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/galeri/tambah') }}" class="nav-link"><i
                                    class="fa fa-plus nav-icon"></i>
                                <p>Tambah Galeri</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="bi bi-instagram" style="margin-left: 4px"></i>
                        <p class="mx-2">Galeri Instagram<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ asset('admin/instagram') }}" class="nav-link"><i
                                    class="fas fa-newspaper nav-icon"></i>
                                <p>Data Instagram</p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/instagram/tambah') }}" class="nav-link"><i
                                    class="fa fa-plus nav-icon"></i>
                                <p>Tambah Instagram</p>
                            </a>
                        </li>

                    </ul>
                </li>

               

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-download"></i>
                        <p>Unduh<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ asset('admin/download') }}" class="nav-link"><i
                                    class="fas fa-newspaper nav-icon"></i>
                                <p>Data Unduh</p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/download/tambah') }}" class="nav-link"><i
                                    class="fa fa-plus nav-icon"></i>
                                <p>Tambah Unduh</p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/kategori_download') }}" class="nav-link"><i class="fa fa-tags nav-icon"></i><p>Kategori Unduh</p></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-university"></i>
                        <p>Peraturan Akademik<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ asset('admin/akademik') }}" class="nav-link"><i
                                    class="fas fa-newspaper nav-icon"></i>
                                <p>Data Akademik</p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/akademik/tambah') }}" class="nav-link"><i
                                    class="fa fa-plus nav-icon"></i>
                                <p>Tambah Akademik</p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/kategori_akademik') }}" class="nav-link"><i class="fa fa-tags nav-icon"></i><p>Kategori Akademik</p></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-university"></i>
                        <p>Kemahasiswaan<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ asset('admin/kemahasiswaan') }}" class="nav-link"><i
                                    class="fas fa-newspaper nav-icon"></i>
                                <p>Data Kemahasiswaan</p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/kemahasiswaan/tambah') }}" class="nav-link"><i
                                    class="fa fa-plus nav-icon"></i>
                                <p>Tambah Kemahasiswaan</p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/kategori_kemahasiswaan') }}" class="nav-link"><i class="fa fa-tags nav-icon"></i><p>Kategori Kemahasiswaan</p></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>Kalender Akademik<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ asset('admin/kalender') }}" class="nav-link"><i
                                    class="fas fa-newspaper nav-icon"></i>
                                <p>Data Kalender</p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/kalender/tambah') }}" class="nav-link"><i
                                    class="fa fa-plus nav-icon"></i>
                                <p>Tambah Kalender</p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/kategori_kalender') }}" class="nav-link"><i class="fa fa-tags nav-icon"></i><p>Kategori Kalender</p></a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ asset('admin/video') }}" class="nav-link">
                        <i class="nav-icon fas fa-film"></i>
                        <p>Video Youtube</p>
                    </a>
                </li>

                
                

                <li class="batas">
                    <hr> <span class="infoku"><i class="fa fa-certificate"></i> Profil</span>
                </li>
                <li class="batas">
                    <hr>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="bi bi-building" style="margin-left: 4px"></i>
                        <p class="mx-2">Sejarah<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ asset('admin/sejarah') }}" class="nav-link"><i
                                    class="fas fa-newspaper nav-icon"></i>
                                <p>Data Sejarah</p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/sejarah/tambah') }}" class="nav-link"><i
                                    class="fa fa-plus nav-icon"></i>
                                <p>Tambah Sejarah</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="bi bi-building" style="margin-left: 4px"></i>
                        <p class="mx-2">Visi-Misi<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ asset('admin/visi_misi') }}" class="nav-link"><i
                                    class="fas fa-newspaper nav-icon"></i>
                                <p>Data Visi-Misi</p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/visi_misi/tambah') }}" class="nav-link"><i
                                    class="fa fa-plus nav-icon"></i>
                                <p>Tambah Visi-Misi</p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/kategori_vismis') }}" class="nav-link"><i class="fa fa-tags nav-icon"></i><p>Kategori Visi Misi</p></a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="bi bi-building" style="margin-left: 4px"></i>
                        <p class="mx-2">Fasilitas<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ asset('admin/fasilitas') }}" class="nav-link"><i
                                    class="fas fa-newspaper nav-icon"></i>
                                <p>Data Fasilitas</p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/fasilitas/tambah') }}" class="nav-link"><i
                                    class="fa fa-plus nav-icon"></i>
                                <p>Tambah Fasilitas</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Struktur Organisasi<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="" class="nav-link"> <i class="nav-icon bi bi-mortarboard-fill"></i>
                                <p>Pimpinan Universitas<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"><a href="{{ asset('admin/staff') }}" class="nav-link"><i
                                    class="fas fa-newspaper nav-icon"></i>
                                <p>Rektor</p>
                                   </a>
                                 </li>
                                 <li class="nav-item"><a href="{{ asset('admin/wakilrektor') }}" class="nav-link"><i
                                    class="fas fa-newspaper nav-icon"></i>
                                <p>Wakil Rektor</p>
                                   </a>
                                 </li>
                                </li>
                            </ul>
                            
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon bi bi-mortarboard-fill"></i>
                                    <p>Dekan Universitas<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item"><a href="{{ asset('admin/dekanstaff') }}" class="nav-link"><i
                                        class="fas fa-newspaper nav-icon"></i>
                                    <p>Dekan Universitas</p>
                                       </a>
                                     </li>
                                </ul>
                            </li>
                         <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-mortarboard-fill"></i>
                                <p>Kepala Prodi<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"><a href="{{ asset('admin/prodistaff') }}" class="nav-link"><i
                                    class="fas fa-newspaper nav-icon"></i>
                                <p>Kepala Prodi</p>
                                   </a>
                                 </li>
                                 <li class="nav-item"><a href="{{ asset('admin/prodistaff/tambah') }}" class="nav-link"><i
                                    class="fa fa-plus nav-icon"></i>
                                <p>Tambah Data Kepala Prodi</p>
                            </a>
                        </li>
                         <li class="nav-item"><a href="{{ asset('admin/kategori_staff') }}" class="nav-link"><i
                            class="fa fa-tags nav-icon"></i>
                         <p>Kategori Kepala Prodi</p>
                            </a>
                             </li>
                            </ul>
                         </li>
                        
                </li>
                 <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-image"></i>
                                <p>Gambar Struktur<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"><a href="{{ asset('admin/gambar-struktur') }}" class="nav-link"><i
                                    class="fas fa-newspaper nav-icon"></i>
                                <p>Gambar Struktur</p>
                                   </a>
                                 </li>
                                 <li class="nav-item"><a href="{{ asset('admin/gambar-struktur/tambah') }}" class="nav-link"><i
                                    class="fa fa-plus nav-icon"></i>
                                <p>Tambah Data Gambar Struktur</p>
                            </a>
                        </li>
                            </ul>
                         </li>
            </ul>
               
                    
              
               
                
               
                <li class="batas">
                    <hr> <span class="infoku"><i class="fa fa-certificate"></i>Master Data</span>
                </li>
                <li class="batas">
                    <hr>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Data Dosen &amp; Staff<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">

                        {{-- fakultas teknik --}}
                        <li class="batas">
                            <hr> <span class="infoku"><i class="fa fa-certificate"></i> Fakultas Teknik</span>
                        </li>
                        <li class="batas">
                            <hr>
                        </li>
        
                        <li class="nav-item"><a href="{{ asset('admin/ilmukomputer') }}" class="nav-link"><i
                                    class="fas fa-newspaper nav-icon"></i>
                                <p>Data Ilmu Komputer</p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/teknologiinformasi') }}" class="nav-link"><i
                            class="fas fa-newspaper nav-icon"></i>
                        <p>Data Prodi TI</p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/d3rpl') }}" class="nav-link"><i
                            class="fas fa-newspaper nav-icon"></i>
                        <p>Data Prodi D3 RPL</p>
                            </a>
                        </li>
                          <li class="nav-item"><a href="{{ asset('admin/sisteminformasi') }}" class="nav-link"><i
                            class="fas fa-newspaper nav-icon"></i>
                        <p>Data Sistem informasi</p>
                            </a>
                         </li>
                         <li class="nav-item"><a href="{{ asset('admin/teknologipangan') }}" class="nav-link"><i
                            class="fas fa-newspaper nav-icon"></i>
                        <p>Data Teknologi Pangan</p>
                            </a>
                         </li>
                         <li class="nav-item"><a href="{{ asset('admin/s1rpl') }}" class="nav-link"><i
                            class="fas fa-newspaper nav-icon"></i>
                        <p>Data Prodi S1 RPL</p>
                            </a>
                         </li>
                         <li class="nav-item"><a href="{{ asset('admin/pendidikanteknologi') }}" class="nav-link"><i
                            class="fas fa-newspaper nav-icon"></i>
                        <p>Data Prodi PTI</p>
                            </a>
                         </li>
                           {{-- End Menu fakultas teknik --}}

                           {{-- fakultas kesehatan --}}
                        <li class="batas">
                            <hr> <span class="infoku"><i class="fa fa-certificate"></i> Fakultas Kesehatan</span>
                        </li>
                        <li class="batas">
                            <hr>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/farmasi') }}" class="nav-link"><i
                            class="fas fa-newspaper nav-icon"></i>
                        <p>Data Prodi Farmasi</p>
                            </a>
                         </li>
                         <li class="nav-item"><a href="{{ asset('admin/gizi') }}" class="nav-link"><i
                            class="fas fa-newspaper nav-icon"></i>
                        <p>Data Prodi Gizi  </p>
                            </a>
                         </li>
                         {{-- End fakultas kesehatan --}}
                         
                           {{-- Fakultas Ekonomi Dan Bisnis --}}
                        <li class="batas">
                            <hr> <span class="infoku"><i class="fa fa-certificate"></i> Fakultas Ekonomi Dan Bisnis</span>
                        </li>
                        <li class="batas">
                            <hr>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/manajemen') }}" class="nav-link"><i
                            class="fas fa-newspaper nav-icon"></i>
                        <p>Data Prodi Manajemen</p>
                            </a>
                         </li>
                         <li class="nav-item"><a href="{{ asset('admin/akuntansi') }}" class="nav-link"><i
                            class="fas fa-newspaper nav-icon"></i>
                        <p>Data Prodi Akuntansi </p>
                            </a>
                         </li>
                         <li class="nav-item"><a href="{{ asset('admin/bisnisdigital') }}" class="nav-link"><i
                            class="fas fa-newspaper nav-icon"></i>
                        <p>Data Prodi Bisnis Digital </p>
                            </a>
                         </li>
                       {{-- End Fakultas Ekonomi Dan Bisnis --}}

                       
                           {{-- fakultas Ilmu Budaya --}}
                           <li class="batas">
                            <hr> <span class="infoku"><i class="fa fa-certificate"></i> Fakultas Ilmu Budaya</span>
                        </li>
                        <li class="batas">
                            <hr>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/s1sastrainggris') }}" class="nav-link"><i
                            class="fas fa-newspaper nav-icon"></i>
                        <p>Data Prodi Sastra Inggris</p>
                            </a>
                         </li>
                         <li class="nav-item"><a href="{{ asset('admin/s2sastrainggris') }}" class="nav-link"><i
                            class="fas fa-newspaper nav-icon"></i>
                        <p>Data Prodi S2 Sastra Inggris </p>
                            </a>
                         </li>
                         {{-- End Fakultas Ilmu Budaya --}}

                         {{-- Fakultas Seni Dan Desain --}}
                         <li class="batas">
                            <hr> <span class="infoku"><i class="fa fa-certificate"></i> Fakultas Seni Dan Desain</span>
                        </li>
                        <li class="batas">
                            <hr>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/dkv') }}" class="nav-link"><i
                            class="fas fa-newspaper nav-icon"></i>
                        <p>Data Prodi DKV</p>
                            </a>
                    
                         {{-- End Fakultas Ilmu Budaya --}}

                         
                         {{-- Fakultas Ilmu Hukum --}}
                         <li class="batas">
                            <hr> <span class="infoku"><i class="fa fa-certificate"></i> Fakultas Ilmu Hukum</span>
                        </li>
                        <li class="batas">
                            <hr>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/hukum') }}" class="nav-link"><i
                            class="fas fa-newspaper nav-icon"></i>
                        <p>Data Prodi Ilmu Hukum</p>
                            </a>
                    
                         {{-- End Fakultas Ilmu Budaya --}}


                    </ul>
                </li>

                


                <!-- Website Content -->
                <li class="batas">
                    <hr> <span class="infoku"><i class="fa fa-certificate"></i> Website Setting</span>
                </li>
                <li class="batas">
                    <hr>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('admin/user') }}" class="nav-link">
                        <i class="nav-icon fas fa-lock"></i>
                        <p>Pengguna Web</p>
                    </a>
                </li>



                <!-- MENU -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Konfigurasi
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ asset('admin/konfigurasi') }}" class="nav-link"><i
                                    class="fas fa-tools nav-icon"></i>
                                <p>Konfigurasi Umum</p>
                            </a>
                        </li>


                        <li class="nav-item"><a href="{{ asset('admin/konfigurasi/icon') }}" class="nav-link"><i
                                    class="fa fa-upload nav-icon"></i>
                                <p>Ganti Icon</p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/konfigurasi/logo') }}" class="nav-link"><i class="fa fa-home nav-icon"></i><p>Ganti Logo</p></a>
                        </li>

                    </ul>
                </li>



            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="card-title"><?php echo $title; ?></h2>
                            </div>


                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive konten">
