<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Like;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/* frontend header */
/* frontend profil */
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['guest']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/', 'App\Http\Controllers\Home@index');
Route::get('home', 'App\Http\Controllers\Home@index');
Route::get('sejarah', 'App\Http\Controllers\Sejarah@index');
Route::get('struktur', 'App\Http\Controllers\Struktur@index');
Route::get('struktur/kategori/{par1}', 'App\Http\Controllers\Struktur@kategori');
Route::get('data-dosen', 'App\Http\Controllers\Datadosen@index');
Route::get('fasilitas-kampus', 'App\Http\Controllers\Fasilitas@index');

/* frontend akademik */
Route::get('evaluasi-studi', 'App\Http\Controllers\Evaluasi@index');
Route::get('jurusan', 'App\Http\Controllers\Jurusan@index');
Route::get('biaya-pendidikan', 'App\Http\Controllers\BiayaPendidikan@index');


/* frontend kemahasiswaan */
Route::get('kerjasama', 'App\Http\Controllers\Kerjasama@index');
Route::get('beasiswa', 'App\Http\Controllers\Beasiswa@index');


/* frontend unduh */
Route::get('akademik', 'App\Http\Controllers\Akademik@index');
Route::get('mbkm', 'App\Http\Controllers\Mbkm@index');



/* frontend pengumuman */
Route::get('pengumuman', 'App\Http\Controllers\Pengumuman@index');
Route::get('pengumuman/read/{par1}', 'App\Http\Controllers\Pengumuman@read');
Route::post('/pengumuman/like/{id_pengumuman}', [Like::class, 'toggleLike'])->name('pengumuman.toggleLike');

/* frontend Galery */

Route::get('foto', 'App\Http\Controllers\Instagram@index');
Route::get('video', 'App\Http\Controllers\Video@index');



/* login */
Route::get('login', function () {
    return view('login/index');
});
Route::post('login/check', 'App\Http\Controllers\Login@check');
Route::get('login/lupa', 'App\Http\Controllers\Login@lupa');
Route::get('login/logout', 'App\Http\Controllers\Login@logout');

// dasbor
Route::get('admin/dasbor', 'App\Http\Controllers\Admin\Dasbor@index');
Route::get('admin/dasbor/konfigurasi', 'App\Http\Controllers\Admin\Dasbor@konfigurasi');

//berita
Route::get('berita', 'App\Http\Controllers\Berita@index');
Route::get('berita/read/{par1}', 'App\Http\Controllers\Berita@read');
Route::get('berita/pengumuman/{par1}', 'App\Http\Controllers\Berita@pengumuman');
Route::get('berita/kategori/{par1}', 'App\Http\Controllers\Berita@kategori');

// download
Route::get('download', 'App\Http\Controllers\Download@index');
Route::get('download/unduh/{par1}', 'App\Http\Controllers\Download@unduh');
Route::get('download/kategori/{par1}', 'App\Http\Controllers\Download@kategori');


// Kalender
Route::get('kalender', 'App\Http\Controllers\Kalender@index');
Route::get('kalender/kategori/{par1}', 'App\Http\Controllers\Kalender@kategori');

// Akademik
Route::get('akademik', 'App\Http\Controllers\Akademik@index');
Route::get('akademik/kategori/{par1}', 'App\Http\Controllers\Akademik@kategori');

// Kemahasiswaan
Route::get('kemahasiswaan', 'App\Http\Controllers\Kemahasiswaan@index');
Route::get('kemahasiswaan/kategori/{par1}', 'App\Http\Controllers\Kemahasiswaan@kategori');

// visi misi
Route::get('visi-misi', 'App\Http\Controllers\Visi@index');
Route::get('visi-misi/kategori/{par1}', 'App\Http\Controllers\Visi@kategori');
// galeri
Route::get('galeri', 'App\Http\Controllers\Galeri@index');
Route::get('galeri/detail/{par1}', 'App\Http\Controllers\Galeri@detail');
// video



/* BACK END */

// dasbor
Route::get('admin/dasbor', 'App\Http\Controllers\Admin\Dasbor@index');
Route::get('admin/dasbor/konfigurasi', 'App\Http\Controllers\Admin\Dasbor@konfigurasi');

// user
Route::get('admin/user', 'App\Http\Controllers\Admin\User@index');
Route::post('admin/user/tambah', 'App\Http\Controllers\Admin\User@tambah');
Route::get('admin/user/edit/{par1}', 'App\Http\Controllers\Admin\User@edit');
Route::post('admin/user/proses_edit', 'App\Http\Controllers\Admin\User@proses_edit');
Route::get('admin/user/delete/{par1}', 'App\Http\Controllers\Admin\User@delete');
Route::post('admin/user/proses', 'App\Http\Controllers\Admin\User@proses');
// konfigurasi
Route::get('admin/konfigurasi', 'App\Http\Controllers\Admin\Konfigurasi@index');
Route::get('admin/konfigurasi/logo', 'App\Http\Controllers\Admin\Konfigurasi@logo');
Route::get('admin/konfigurasi/icon', 'App\Http\Controllers\Admin\Konfigurasi@icon');
Route::post('admin/konfigurasi/proses', 'App\Http\Controllers\Admin\Konfigurasi@proses');
Route::post('admin/konfigurasi/proses_logo', 'App\Http\Controllers\Admin\Konfigurasi@proses_logo');
Route::post('admin/konfigurasi/proses_icon', 'App\Http\Controllers\Admin\Konfigurasi@proses_icon');

// berita
Route::get('admin/berita', 'App\Http\Controllers\Admin\Berita@index');
Route::get('admin/berita/cari', 'App\Http\Controllers\Admin\Berita@cari');
Route::get('admin/berita/status_berita/{par1}', 'App\Http\Controllers\Admin\Berita@status_berita');
Route::get('admin/berita/kategori/{par1}', 'App\Http\Controllers\Admin\Berita@kategori');
Route::get('admin/berita/jenis_berita/{par1}', 'App\Http\Controllers\Admin\Berita@jenis_berita');
Route::get('admin/berita/author/{par1}', 'App\Http\Controllers\Admin\Berita@author');
Route::get('admin/berita/tambah', 'App\Http\Controllers\Admin\Berita@tambah');
Route::get('admin/berita/edit/{par1}', 'App\Http\Controllers\Admin\Berita@edit');
Route::get('admin/berita/delete/{par1}', 'App\Http\Controllers\Admin\Berita@delete');
Route::post('admin/berita/tambah_proses', 'App\Http\Controllers\Admin\Berita@tambah_proses');
Route::post('admin/berita/edit_proses', 'App\Http\Controllers\Admin\Berita@edit_proses');
Route::post('admin/berita/proses', 'App\Http\Controllers\Admin\Berita@proses');
Route::get('admin/berita/add', 'App\Http\Controllers\Admin\Berita@add');
// pengumuman
Route::get('admin/pengumuman', 'App\Http\Controllers\Admin\pengumuman@index');
Route::get('admin/pengumuman/cari', 'App\Http\Controllers\Admin\pengumuman@cari');
Route::get('admin/pengumuman/status_pengumuman/{par1}', 'App\Http\Controllers\Admin\pengumuman@status_pengumuman');
Route::get('admin/pengumuman/kategori/{par1}', 'App\Http\Controllers\Admin\pengumuman@kategori');
Route::get('admin/pengumuman/jenis_pengumuman/{par1}', 'App\Http\Controllers\Admin\pengumuman@jenis_pengumuman');
Route::get('admin/pengumuman/author/{par1}', 'App\Http\Controllers\Admin\pengumuman@author');
Route::get('admin/pengumuman/tambah', 'App\Http\Controllers\Admin\pengumuman@tambah');
Route::get('admin/pengumuman/edit/{par1}', 'App\Http\Controllers\Admin\pengumuman@edit');
Route::get('admin/pengumuman/delete/{par1}', 'App\Http\Controllers\Admin\pengumuman@delete');
Route::post('admin/pengumuman/tambah_proses', 'App\Http\Controllers\Admin\pengumuman@tambah_proses');
Route::post('admin/pengumuman/edit_proses', 'App\Http\Controllers\Admin\pengumuman@edit_proses');
Route::post('admin/pengumuman/proses', 'App\Http\Controllers\Admin\pengumuman@proses');
Route::get('admin/pengumuman/add', 'App\Http\Controllers\Admin\pengumuman@add');

// kategori Berita
Route::get('admin/kategori', 'App\Http\Controllers\Admin\Kategori@index');
Route::post('admin/kategori/tambah', 'App\Http\Controllers\Admin\Kategori@tambah');
Route::post('admin/kategori/edit', 'App\Http\Controllers\Admin\Kategori@edit');
Route::get('admin/kategori/delete/{par1}', 'App\Http\Controllers\Admin\Kategori@delete');

// kategori
Route::get('admin/kategori-pengumuman', 'App\Http\Controllers\Admin\Kategori_pengumuman@index');
Route::post('admin/kategori-pengumuman/tambah', 'App\Http\Controllers\Admin\Kategori_pengumuman@tambah');
Route::post('admin/kategori-pengumuman/edit', 'App\Http\Controllers\Admin\Kategori_pengumuman@edit');
Route::get('admin/kategori-pengumuman/delete/{par1}', 'App\Http\Controllers\Admin\Kategori_pengumuman@delete');
// status
Route::get('admin/status_site', 'App\Http\Controllers\Admin\Status_site@index');
Route::post('admin/status_site/tambah', 'App\Http\Controllers\Admin\Status_site@tambah');
Route::post('admin/status_site/edit', 'App\Http\Controllers\Admin\Status_site@edit');
Route::get('admin/status_site/delete/{par1}', 'App\Http\Controllers\Admin\Status_site@delete');
// status
Route::get('admin/heading', 'App\Http\Controllers\Admin\Heading@index');
Route::post('admin/heading/tambah', 'App\Http\Controllers\Admin\Heading@tambah');
Route::post('admin/heading/edit', 'App\Http\Controllers\Admin\Heading@edit');
Route::get('admin/heading/delete/{par1}', 'App\Http\Controllers\Admin\Heading@delete');
// status
Route::get('admin/status_proyek', 'App\Http\Controllers\Admin\Status_proyek@index');
Route::post('admin/status_proyek/tambah', 'App\Http\Controllers\Admin\Status_proyek@tambah');
Route::post('admin/status_proyek/edit', 'App\Http\Controllers\Admin\Status_proyek@edit');
Route::get('admin/status_proyek/delete/{par1}', 'App\Http\Controllers\Admin\Status_proyek@delete');
// video
Route::get('admin/video', 'App\Http\Controllers\Admin\Video@index');
Route::get('admin/video/edit/{par1}', 'App\Http\Controllers\Admin\Video@edit');
Route::post('admin/video/tambah', 'App\Http\Controllers\Admin\Video@tambah');
Route::post('admin/video/proses_edit', 'App\Http\Controllers\Admin\Video@proses_edit');
Route::get('admin/video/delete/{par1}', 'App\Http\Controllers\Admin\Video@delete');
Route::post('admin/video/proses', 'App\Http\Controllers\Admin\Video@proses');

// gambar struktur
Route::get('admin/gambar-struktur', 'App\Http\Controllers\Admin\GambarStruktur@index');
Route::get('admin/gambar-struktur/edit/{par1}', 'App\Http\Controllers\Admin\GambarStruktur@edit');
Route::post('admin/gambar-struktur/tambah', 'App\Http\Controllers\Admin\GambarStruktur@tambah');
Route::post('admin/gambar-struktur/proses_edit', 'App\Http\Controllers\Admin\GambarStruktur@proses_edit');
Route::get('admin/gambar-struktur/delete/{par1}', 'App\Http\Controllers\Admin\GambarStruktur@delete');
Route::post('admin/gambar-struktur/proses', 'App\Http\Controllers\Admin\GambarStruktur@proses');

// kategori_kalender
Route::get('admin/kategori_kalender', 'App\Http\Controllers\Admin\Kategori_kalender@index');
Route::post('admin/kategori_kalender/tambah', 'App\Http\Controllers\Admin\Kategori_kalender@tambah');
Route::post('admin/kategori_kalender/edit', 'App\Http\Controllers\Admin\Kategori_kalender@edit');
Route::get('admin/kategori_kalender/delete/{par1}', 'App\Http\Controllers\Admin\Kategori_kalender@delete');

// kategori_akademik
Route::get('admin/kategori_akademik', 'App\Http\Controllers\Admin\Kategori_akademik@index');
Route::post('admin/kategori_akademik/tambah', 'App\Http\Controllers\Admin\Kategori_akademik@tambah');
Route::post('admin/kategori_akademik/edit', 'App\Http\Controllers\Admin\Kategori_akademik@edit');
Route::get('admin/kategori_akademik/delete/{par1}', 'App\Http\Controllers\Admin\Kategori_akademik@delete');


// kategori_kemahasiswaan
Route::get('admin/kategori_kemahasiswaan', 'App\Http\Controllers\Admin\Kategori_kemahasiswaan@index');
Route::post('admin/kategori_kemahasiswaan/tambah', 'App\Http\Controllers\Admin\Kategori_kemahasiswaan@tambah');
Route::post('admin/kategori_kemahasiswaan/edit', 'App\Http\Controllers\Admin\Kategori_kemahasiswaan@edit');
Route::get('admin/kategori_kemahasiswaan/delete/{par1}', 'App\Http\Controllers\Admin\Kategori_kemahasiswaan@delete');

// kategori_visi misi
Route::get('admin/kategori_vismis', 'App\Http\Controllers\Admin\Kategori_vismis@index');
Route::post('admin/kategori_vismis/tambah', 'App\Http\Controllers\Admin\Kategori_vismis@tambah');
Route::post('admin/kategori_vismis/edit', 'App\Http\Controllers\Admin\Kategori_vismis@edit');
Route::get('admin/kategori_vismis/delete/{par1}', 'App\Http\Controllers\Admin\Kategori_vismis@delete');

// kategori_download
Route::get('admin/kategori_download', 'App\Http\Controllers\Admin\Kategori_download@index');
Route::post('admin/kategori_download/tambah', 'App\Http\Controllers\Admin\Kategori_download@tambah');
Route::post('admin/kategori_download/edit', 'App\Http\Controllers\Admin\Kategori_download@edit');
Route::get('admin/kategori_download/delete/{par1}', 'App\Http\Controllers\Admin\Kategori_download@delete');
// kategori_galeri
Route::get('admin/kategori_galeri', 'App\Http\Controllers\Admin\Kategori_galeri@index');
Route::post('admin/kategori_galeri/tambah', 'App\Http\Controllers\Admin\Kategori_galeri@tambah');
Route::post('admin/kategori_galeri/edit', 'App\Http\Controllers\Admin\Kategori_galeri@edit');
Route::get('admin/kategori_galeri/delete/{par1}', 'App\Http\Controllers\Admin\Kategori_galeri@delete');
// kategori_staff
Route::get('admin/kategori_staff', 'App\Http\Controllers\Admin\Kategori_staff@index');
Route::post('admin/kategori_staff/tambah', 'App\Http\Controllers\Admin\Kategori_staff@tambah');
Route::post('admin/kategori_staff/edit', 'App\Http\Controllers\Admin\Kategori_staff@edit');
Route::get('admin/kategori_staff/delete/{par1}', 'App\Http\Controllers\Admin\Kategori_staff@delete');


// galeri
Route::get('admin/galeri', 'App\Http\Controllers\Admin\Galeri@index');
Route::get('admin/galeri/cari', 'App\Http\Controllers\Admin\Galeri@cari');
Route::get('admin/galeri/status_galeri/{par1}', 'App\Http\Controllers\Admin\Galeri@status_galeri');
Route::get('admin/galeri/tambah', 'App\Http\Controllers\Admin\Galeri@tambah');
Route::get('admin/galeri/edit/{par1}', 'App\Http\Controllers\Admin\Galeri@edit');
Route::get('admin/galeri/delete/{par1}', 'App\Http\Controllers\Admin\Galeri@delete');
Route::post('admin/galeri/tambah_proses', 'App\Http\Controllers\Admin\Galeri@tambah_proses');
Route::post('admin/galeri/edit_proses', 'App\Http\Controllers\Admin\Galeri@edit_proses');
Route::post('admin/galeri/proses', 'App\Http\Controllers\Admin\Galeri@proses');

// instagram
Route::get('admin/instagram', 'App\Http\Controllers\Admin\Instagram@index');
Route::get('admin/instagram/cari', 'App\Http\Controllers\Admin\Instagram@cari');
Route::get('admin/instagram/tambah', 'App\Http\Controllers\Admin\Instagram@tambah');
Route::get('admin/instagram/edit/{par1}', 'App\Http\Controllers\Admin\Instagram@edit');
Route::get('admin/instagram/delete/{par1}', 'App\Http\Controllers\Admin\Instagram@delete');
Route::post('admin/instagram/tambah_proses', 'App\Http\Controllers\Admin\Instagram@tambah_proses');
Route::post('admin/instagram/edit_proses', 'App\Http\Controllers\Admin\Instagram@edit_proses');
Route::post('admin/instagram/proses', 'App\Http\Controllers\Admin\Instagram@proses');
Route::get('admin/instagram/add', 'App\Http\Controllers\Admin\Instagram@add');

// fasilitas
Route::get('admin/fasilitas', 'App\Http\Controllers\Admin\Fasilitas@index');
Route::get('admin/fasilitas/cari', 'App\Http\Controllers\Admin\Fasilitas@cari');
Route::get('admin/fasilitas/tambah', 'App\Http\Controllers\Admin\Fasilitas@tambah');
Route::get('admin/fasilitas/edit/{par1}', 'App\Http\Controllers\Admin\Fasilitas@edit');
Route::get('admin/fasilitas/delete/{par1}', 'App\Http\Controllers\Admin\Fasilitas@delete');
Route::post('admin/fasilitas/tambah_proses', 'App\Http\Controllers\Admin\Fasilitas@tambah_proses');
Route::post('admin/fasilitas/edit_proses', 'App\Http\Controllers\Admin\Fasilitas@edit_proses');
Route::post('admin/fasilitas/proses', 'App\Http\Controllers\Admin\Fasilitas@proses');

// staff
Route::get('admin/staff', 'App\Http\Controllers\Admin\Staff@index');
Route::get('admin/staff/cari', 'App\Http\Controllers\Admin\Staff@cari');
Route::get('admin/staff/status_staff/{par1}', 'App\Http\Controllers\Admin\Staff@status_staff');
Route::get('admin/staff/kategori/{par1}', 'App\Http\Controllers\Admin\Staff@kategori');
Route::get('admin/staff/detail/{par1}', 'App\Http\Controllers\Admin\Staff@detail');
Route::get('admin/staff/tambah', 'App\Http\Controllers\Admin\Staff@tambah');
Route::get('admin/staff/edit/{par1}', 'App\Http\Controllers\Admin\Staff@edit');
Route::get('admin/staff/delete/{par1}', 'App\Http\Controllers\Admin\Staff@delete');
Route::post('admin/staff/tambah_proses', 'App\Http\Controllers\Admin\Staff@tambah_proses');
Route::post('admin/staff/edit_proses', 'App\Http\Controllers\Admin\Staff@edit_proses');
Route::post('admin/staff/proses', 'App\Http\Controllers\Admin\Staff@proses');

// Wakil Rektor Staff
Route::get('admin/wakilrektor', 'App\Http\Controllers\Admin\WakilRektor@index');
Route::get('admin/wakilrektor/cari', 'App\Http\Controllers\Admin\WakilRektor@cari');
Route::get('admin/wakilrektor/status_staff/{par1}', 'App\Http\Controllers\Admin\WakilRektor@status_staff');
Route::get('admin/wakilrektor/kategori/{par1}', 'App\Http\Controllers\Admin\WakilRektor@kategori');
Route::get('admin/wakilrektor/detail/{par1}', 'App\Http\Controllers\Admin\WakilRektor@detail');
Route::get('admin/wakilrektor/tambah', 'App\Http\Controllers\Admin\WakilRektor@tambah');
Route::get('admin/wakilrektor/edit/{par1}', 'App\Http\Controllers\Admin\WakilRektor@edit');
Route::get('admin/wakilrektor/delete/{par1}', 'App\Http\Controllers\Admin\WakilRektor@delete');
Route::post('admin/wakilrektor/tambah_proses', 'App\Http\Controllers\Admin\WakilRektor@tambah_proses');
Route::post('admin/wakilrektor/edit_proses', 'App\Http\Controllers\Admin\WakilRektor@edit_proses');
Route::post('admin/wakilrektor/proses', 'App\Http\Controllers\Admin\WakilRektor@proses');

//  Dekan  staff
Route::get('admin/dekanstaff', 'App\Http\Controllers\Admin\DekanStaff@index');
Route::get('admin/dekanstaff/cari', 'App\Http\Controllers\Admin\DekanStaff@cari');
Route::get('admin/dekanstaff/status_staff/{par1}', 'App\Http\Controllers\Admin\DekanStaff@status_staff');
Route::get('admin/dekanstaff/kategori/{par1}', 'App\Http\Controllers\Admin\DekanStaff@kategori');
Route::get('admin/dekanstaff/detail/{par1}', 'App\Http\Controllers\Admin\DekanStaff@detail');
Route::get('admin/dekanstaff/tambah', 'App\Http\Controllers\Admin\DekanStaff@tambah');
Route::get('admin/dekanstaff/edit/{par1}', 'App\Http\Controllers\Admin\DekanStaff@edit');
Route::get('admin/dekanstaff/delete/{par1}', 'App\Http\Controllers\Admin\DekanStaff@delete');
Route::post('admin/dekanstaff/tambah_proses', 'App\Http\Controllers\Admin\DekanStaff@tambah_proses');
Route::post('admin/dekanstaff/edit_proses', 'App\Http\Controllers\Admin\DekanStaff@edit_proses');
Route::post('admin/dekanstaff/proses', 'App\Http\Controllers\Admin\DekanStaff@proses');


//  Kepala Prodi staff
Route::get('admin/prodistaff', 'App\Http\Controllers\Admin\ProdiStaff@index');
Route::get('admin/prodistaff/cari', 'App\Http\Controllers\Admin\ProdiStaff@cari');
Route::get('admin/prodistaff/status_staff/{par1}', 'App\Http\Controllers\Admin\ProdiStaff@status_staff');
Route::get('admin/prodistaff/kategori/{par1}', 'App\Http\Controllers\Admin\ProdiStaff@kategori');
Route::get('admin/prodistaff/detail/{par1}', 'App\Http\Controllers\Admin\ProdiStaff@detail');
Route::get('admin/prodistaff/tambah', 'App\Http\Controllers\Admin\ProdiStaff@tambah');
Route::get('admin/prodistaff/edit/{par1}', 'App\Http\Controllers\Admin\ProdiStaff@edit');
Route::get('admin/prodistaff/delete/{par1}', 'App\Http\Controllers\Admin\ProdiStaff@delete');
Route::post('admin/prodistaff/tambah_proses', 'App\Http\Controllers\Admin\ProdiStaff@tambah_proses');
Route::post('admin/prodistaff/edit_proses', 'App\Http\Controllers\Admin\ProdiStaff@edit_proses');
Route::post('admin/prodistaff/proses', 'App\Http\Controllers\Admin\ProdiStaff@proses');

// sejarah
Route::get('admin/sejarah', 'App\Http\Controllers\Admin\Sejarah@index');
Route::get('admin/sejarah/cari', 'App\Http\Controllers\Admin\Sejarah@cari');
Route::get('admin/sejarah/tambah', 'App\Http\Controllers\Admin\Sejarah@tambah');
Route::get('admin/sejarah/edit/{par1}', 'App\Http\Controllers\Admin\Sejarah@edit');
Route::get('admin/sejarah/delete/{par1}', 'App\Http\Controllers\Admin\Sejarah@delete');
Route::post('admin/sejarah/tambah_proses', 'App\Http\Controllers\Admin\Sejarah@tambah_proses');
Route::post('admin/sejarah/edit_proses', 'App\Http\Controllers\Admin\Sejarah@edit_proses');
Route::post('admin/sejarah/proses', 'App\Http\Controllers\Admin\Sejarah@proses');
Route::get('admin/sejarah/add', 'App\Http\Controllers\Admin\Sejarah@add');

// Visi Misi
Route::get('admin/visi_misi', 'App\Http\Controllers\Admin\VisiMisi@index');
Route::get('admin/visi_misi/cari', 'App\Http\Controllers\Admin\VisiMisi@cari');
Route::get('admin/visi_misi/kategori/{par1}', 'App\Http\Controllers\Admin\VisiMisi@kategori');
Route::get('admin/visi_misi/tambah', 'App\Http\Controllers\Admin\VisiMisi@tambah');
Route::get('admin/visi_misi/edit/{par1}', 'App\Http\Controllers\Admin\VisiMisi@edit');
Route::get('admin/visi_misi/delete/{par1}', 'App\Http\Controllers\Admin\VisiMisi@delete');
Route::post('admin/visi_misi/tambah_proses', 'App\Http\Controllers\Admin\VisiMisi@tambah_proses');
Route::post('admin/visi_misi/edit_proses', 'App\Http\Controllers\Admin\VisiMisi@edit_proses');
Route::post('admin/visi_misi/proses', 'App\Http\Controllers\Admin\VisiMisi@proses');
Route::get('admin/visi_misi/add', 'App\Http\Controllers\Admin\VisiMisi@add');


// site
Route::get('admin/site', 'App\Http\Controllers\Admin\Site@index');
Route::get('admin/site/cari', 'App\Http\Controllers\Admin\Site@cari');
Route::get('admin/site/status_site/{par1}', 'App\Http\Controllers\Admin\Site@status_site');
Route::get('admin/site/kategori/{par1}', 'App\Http\Controllers\Admin\Site@kategori');
Route::get('admin/site/detail/{par1}', 'App\Http\Controllers\Admin\Site@detail');
Route::get('admin/site/tambah', 'App\Http\Controllers\Admin\Site@tambah');
Route::get('admin/site/edit/{par1}', 'App\Http\Controllers\Admin\Site@edit');
Route::get('admin/site/status/{par1}', 'App\Http\Controllers\Admin\Site@status');
Route::get('admin/site/delete/{par1}', 'App\Http\Controllers\Admin\Site@delete');
Route::post('admin/site/tambah_proses', 'App\Http\Controllers\Admin\Site@tambah_proses');
Route::post('admin/site/edit_proses', 'App\Http\Controllers\Admin\Site@edit_proses');
Route::post('admin/site/proses', 'App\Http\Controllers\Admin\Site@proses');

// Prodi Ilmu Komputer
Route::get('admin/ilmukomputer', 'App\Http\Controllers\Admin\Ilkom@index');
Route::get('admin/ilmukomputer/cari', 'App\Http\Controllers\Admin\Ilkom@cari');
Route::get('admin/ilmukomputer/status_ilmukomputer/{par1}', 'App\Http\Controllers\Admin\Ilkomr@status_ilmukomputer');
Route::get('admin/ilmukomputer/kategori/{par1}', 'App\Http\Controllers\Admin\Ilkom@kategori');
Route::get('admin/ilmukomputer/detail/{par1}', 'App\Http\Controllers\Admin\Ilkom@detail');
Route::get('admin/ilmukomputer/tambah', 'App\Http\Controllers\Admin\Ilkom@tambah');
Route::get('admin/ilmukomputer/edit/{par1}', 'App\Http\Controllers\Admin\Ilkom@edit');
Route::get('admin/ilmukomputer/delete/{par1}', 'App\Http\Controllers\Admin\Ilkom@delete');
Route::post('admin/ilmukomputer/tambah_proses', 'App\Http\Controllers\Admin\Ilkom@tambah_proses');
Route::post('admin/ilmukomputer/edit_proses', 'App\Http\Controllers\Admin\Ilkom@edit_proses');
Route::post('admin/ilmukomputer/proses', 'App\Http\Controllers\Admin\Ilkom@proses');
Route::post('admin/ilmukomputer/import', 'App\Http\Controllers\Admin\Ilkom@import');

// Prodi Teknologi Informasi
Route::get('admin/teknologiinformasi', 'App\Http\Controllers\Admin\TeknologiInformasi@index');
Route::get('admin/teknologiinformasi/cari', 'App\Http\Controllers\Admin\TeknologiInformasi@cari');
Route::get('admin/teknologiinformasi/status_teknologiinformasi/{par1}', 'App\Http\Controllers\Admin\TeknologiInformasir@status_teknologiinformasi');
Route::get('admin/teknologiinformasi/kategori/{par1}', 'App\Http\Controllers\Admin\TeknologiInformasi@kategori');
Route::get('admin/teknologiinformasi/detail/{par1}', 'App\Http\Controllers\Admin\TeknologiInformasi@detail');
Route::get('admin/teknologiinformasi/tambah', 'App\Http\Controllers\Admin\TeknologiInformasi@tambah');
Route::get('admin/teknologiinformasi/edit/{par1}', 'App\Http\Controllers\Admin\TeknologiInformasi@edit');
Route::get('admin/teknologiinformasi/delete/{par1}', 'App\Http\Controllers\Admin\TeknologiInformasi@delete');
Route::post('admin/teknologiinformasi/tambah_proses', 'App\Http\Controllers\Admin\TeknologiInformasi@tambah_proses');
Route::post('admin/teknologiinformasi/edit_proses', 'App\Http\Controllers\Admin\TeknologiInformasi@edit_proses');
Route::post('admin/teknologiinformasi/proses', 'App\Http\Controllers\Admin\TeknologiInformasi@proses');
Route::post('admin/teknologiinformasi/import', 'App\Http\Controllers\Admin\TeknologiInformasi@import');

//Prodi D3 RPL
Route ::get('admin/d3rpl', 'App\Http\Controllers\Admin\D3Rpl@index');
Route::get('admin/d3rpl/cari', 'App\Http\Controllers\Admin\D3Rpl@cari');
Route::get('admin/d3rpl/status_d3rpl/{par1}', 'App\Http\Controllers\Admin\D3Rpl@status_d3rpl');
Route::get('admin/d3rpl/kategori/{par1}', 'App\Http\Controllers\Admin\D3Rpl@kategori');
Route::get('admin/d3rpl/detail/{par1}', 'App\Http\Controllers\Admin\D3Rpl@detail');
Route::get('admin/d3rpl/tambah', 'App\Http\Controllers\Admin\D3Rpl@tambah');
Route::get('admin/d3rpl/edit/{par1}', 'App\Http\Controllers\Admin\D3Rpl@edit');
Route::get('admin/d3rpl/delete/{par1}', 'App\Http\Controllers\Admin\D3Rpl@delete');
Route::post('admin/d3rpl/tambah_proses', 'App\Http\Controllers\Admin\D3Rpl@tambah_proses');
Route::post('admin/d3rpl/edit_proses', 'App\Http\Controllers\Admin\D3Rpl@edit_proses');
Route::post('admin/d3rpl/proses', 'App\Http\Controllers\Admin\D3Rpl@proses');
Route::post('admin/d3rpl/import', 'App\Http\Controllers\Admin\D3Rpl@import');

//Prodi Sistem Informasi
Route ::get('admin/sisteminformasi', 'App\Http\Controllers\Admin\SistemInformasi@index');
Route::get('admin/sisteminformasi/cari', 'App\Http\Controllers\Admin\SistemInformasi@cari');
Route::get('admin/sisteminformasi/status_sisteminformasi/{par1}', 'App\Http\Controllers\Admin\SistemInformasi@status_sisteminformasi');
Route::get('admin/sisteminformasi/kategori/{par1}', 'App\Http\Controllers\Admin\SistemInformasi@kategori');
Route::get('admin/sisteminformasi/detail/{par1}', 'App\Http\Controllers\Admin\SistemInformasi@detail');
Route::get('admin/sisteminformasi/tambah', 'App\Http\Controllers\Admin\SistemInformasi@tambah');
Route::get('admin/sisteminformasi/edit/{par1}', 'App\Http\Controllers\Admin\SistemInformasi@edit');
Route::get('admin/sisteminformasi/delete/{par1}', 'App\Http\Controllers\Admin\SistemInformasi@delete');
Route::post('admin/sisteminformasi/tambah_proses', 'App\Http\Controllers\Admin\SistemInformasi@tambah_proses');
Route::post('admin/sisteminformasi/edit_proses', 'App\Http\Controllers\Admin\SistemInformasi@edit_proses');
Route::post('admin/sisteminformasi/proses', 'App\Http\Controllers\Admin\SistemInformasi@proses');
Route::post('admin/sisteminformasi/import', 'App\Http\Controllers\Admin\SistemInformasi@import');

//Prodi Teknologi Pangan
Route ::get('admin/teknologipangan', 'App\Http\Controllers\Admin\TeknologiPangan@index');
Route::get('admin/teknologipangan/cari', 'App\Http\Controllers\Admin\TeknologiPangan@cari');
Route::get('admin/teknologipangan/status_teknologipangan/{par1}', 'App\Http\Controllers\Admin\TeknologiPangan@status_teknologipangan');
Route::get('admin/teknologipangan/kategori/{par1}', 'App\Http\Controllers\Admin\TeknologiPangan@kategori');
Route::get('admin/teknologipangan/detail/{par1}', 'App\Http\Controllers\Admin\TeknologiPangan@detail');
Route::get('admin/teknologipangan/tambah', 'App\Http\Controllers\Admin\TeknologiPangan@tambah');
Route::get('admin/teknologipangan/edit/{par1}', 'App\Http\Controllers\Admin\TeknologiPangan@edit');
Route::get('admin/teknologipangan/delete/{par1}', 'App\Http\Controllers\Admin\TeknologiPangan@delete');
Route::post('admin/teknologipangan/tambah_proses', 'App\Http\Controllers\Admin\TeknologiPangan@tambah_proses');
Route::post('admin/teknologipangan/edit_proses', 'App\Http\Controllers\Admin\TeknologiPangan@edit_proses');
Route::post('admin/teknologipangan/proses', 'App\Http\Controllers\Admin\TeknologiPangan@proses');
Route::post('admin/teknologipangan/import', 'App\Http\Controllers\Admin\TeknologiPangan@import');

//Prodi S1 RPL
Route ::get('admin/s1rpl', 'App\Http\Controllers\Admin\S1Rpl@index');
Route::get('admin/s1rpl/cari', 'App\Http\Controllers\Admin\S1Rpl@cari');
Route::get('admin/s1rpl/status_s1rpl/{par1}', 'App\Http\Controllers\Admin\S1Rpl@status_s1rpl');
Route::get('admin/s1rpl/kategori/{par1}', 'App\Http\Controllers\Admin\S1Rpl@kategori');
Route::get('admin/s1rpl/detail/{par1}', 'App\Http\Controllers\Admin\S1Rpl@detail');
Route::get('admin/s1rpl/tambah', 'App\Http\Controllers\Admin\S1Rpl@tambah');
Route::get('admin/s1rpl/edit/{par1}', 'App\Http\Controllers\Admin\S1Rpl@edit');
Route::get('admin/s1rpl/delete/{par1}', 'App\Http\Controllers\Admin\S1Rpl@delete');
Route::post('admin/s1rpl/tambah_proses', 'App\Http\Controllers\Admin\S1Rpl@tambah_proses');
Route::post('admin/s1rpl/edit_proses', 'App\Http\Controllers\Admin\S1Rpl@edit_proses');
Route::post('admin/s1rpl/proses', 'App\Http\Controllers\Admin\S1Rpl@proses');
Route::post('admin/s1rpl/import', 'App\Http\Controllers\Admin\S1Rpl@import');

//Prodi PTI
Route ::get('admin/pendidikanteknologi', 'App\Http\Controllers\Admin\Pti@index');
Route::get('admin/pendidikanteknologi/cari', 'App\Http\Controllers\Admin\Pti@cari');
Route::get('admin/pendidikanteknologi/status_pendidikanteknologi/{par1}', 'App\Http\Controllers\Admin\Pti@status_pendidikanteknologi');
Route::get('admin/pendidikanteknologi/kategori/{par1}', 'App\Http\Controllers\Admin\Pti@kategori');
Route::get('admin/pendidikanteknologi/detail/{par1}', 'App\Http\Controllers\Admin\Pti@detail');
Route::get('admin/pendidikanteknologi/tambah', 'App\Http\Controllers\Admin\Pti@tambah');
Route::get('admin/pendidikanteknologi/edit/{par1}', 'App\Http\Controllers\Admin\Pti@edit');
Route::get('admin/pendidikanteknologi/delete/{par1}', 'App\Http\Controllers\Admin\Pti@delete');
Route::post('admin/pendidikanteknologi/tambah_proses', 'App\Http\Contr  ollers\Admin\Pti@tambah_proses');
Route::post('admin/pendidikanteknologi/edit_proses', 'App\Http\Controllers\Admin\Pti@edit_proses');
Route::post('admin/pendidikanteknologi/proses', 'App\Http\Controllers\Admin\Pti@proses');
Route::post('admin/pendidikanteknologi/import', 'App\Http\Controllers\Admin\Pti@import');

//Prodi Farmasi
Route ::get('admin/farmasi', 'App\Http\Controllers\Admin\Farmasi@index');
Route::get('admin/farmasi/cari', 'App\Http\Controllers\Admin\Farmasi@cari');
Route::get('admin/farmasi/status_farmasi/{par1}', 'App\Http\Controllers\Admin\Farmasi@status_farmasi');
Route::get('admin/farmasi/kategori/{par1}', 'App\Http\Controllers\Admin\Farmasi@kategori');
Route::get('admin/farmasi/detail/{par1}', 'App\Http\Controllers\Admin\Farmasi@detail');
Route::get('admin/farmasi/tambah', 'App\Http\Controllers\Admin\Farmasi@tambah');
Route::get('admin/farmasi/edit/{par1}', 'App\Http\Controllers\Admin\Farmasi@edit');
Route::get('admin/farmasi/delete/{par1}', 'App\Http\Controllers\Admin\Farmasi@delete');
Route::post('admin/farmasi/tambah_proses', 'App\Http\Controllers\Admin\Farmasi@tambah_proses');
Route::post('admin/farmasi/edit_proses', 'App\Http\Controllers\Admin\Farmasi@edit_proses');
Route::post('admin/farmasi/proses', 'App\Http\Controllers\Admin\Farmasi@proses');
Route::post('admin/farmasi/import', 'App\Http\Controllers\Admin\Farmasi@import');

//Prodi Gizi
Route ::get('admin/gizi', 'App\Http\Controllers\Admin\Gizi@index');
Route::get('admin/gizi/cari', 'App\Http\Controllers\Admin\Gizi@cari');
Route::get('admin/gizi/status_gizi/{par1}', 'App\Http\Controllers\Admin\Gizi@status_gizi');
Route::get('admin/gizi/kategori/{par1}', 'App\Http\Controllers\Admin\Gizi@kategori');
Route::get('admin/gizi/detail/{par1}', 'App\Http\Controllers\Admin\Gizi@detail');
Route::get('admin/gizi/tambah', 'App\Http\Controllers\Admin\Gizi@tambah');
Route::get('admin/gizi/edit/{par1}', 'App\Http\Controllers\Admin\Gizi@edit');
Route::get('admin/gizi/delete/{par1}', 'App\Http\Controllers\Admin\Gizi@delete');
Route::post('admin/gizi/tambah_proses', 'App\Http\Controllers\Admin\Gizi@tambah_proses');
Route::post('admin/gizi/edit_proses', 'App\Http\Controllers\Admin\Gizi@edit_proses');
Route::post('admin/gizi/proses', 'App\Http\Controllers\Admin\Gizi@proses');
Route::post('admin/gizi/import', 'App\Http\Controllers\Admin\Gizi@import');

//Prodi Manajemen
Route ::get('admin/manajemen', 'App\Http\Controllers\Admin\Manajemen@index');
Route::get('admin/manajemen/cari', 'App\Http\Controllers\Admin\Manajemen@cari');
Route::get('admin/manajemen/status_manajemen/{par1}', 'App\Http\Controllers\Admin\Manajemen@status_manajemen');
Route::get('admin/manajemen/kategori/{par1}', 'App\Http\Controllers\Admin\Manajemen@kategori');
Route::get('admin/manajemen/detail/{par1}', 'App\Http\Controllers\Admin\Manajemen@detail');
Route::get('admin/manajemen/tambah', 'App\Http\Controllers\Admin\Manajemen@tambah');
Route::get('admin/manajemen/edit/{par1}', 'App\Http\Controllers\Admin\Manajemen@edit');
Route::get('admin/manajemen/delete/{par1}', 'App\Http\Controllers\Admin\Manajemen@delete');
Route::post('admin/manajemen/tambah_proses', 'App\Http\Controllers\Admin\Manajemen@tambah_proses');
Route::post('admin/manajemen/edit_proses', 'App\Http\Controllers\Admin\Manajemen@edit_proses');
Route::post('admin/manajemen/proses', 'App\Http\Controllers\Admin\Manajemen@proses');
Route::post('admin/manajemen/import', 'App\Http\Controllers\Admin\Manajemen@import');

//Prodi Akuntansi
Route ::get('admin/akuntansi', 'App\Http\Controllers\Admin\Akuntansi@index');
Route::get('admin/akuntansi/cari', 'App\Http\Controllers\Admin\Akuntansi@cari');
Route::get('admin/akuntansi/status_akuntansi/{par1}', 'App\Http\Controllers\Admin\Akuntansi@status_akuntansi');
Route::get('admin/akuntansi/kategori/{par1}', 'App\Http\Controllers\Admin\Akuntansi@kategori');
Route::get('admin/akuntansi/detail/{par1}', 'App\Http\Controllers\Admin\Akuntansi@detail');
Route::get('admin/akuntansi/tambah', 'App\Http\Controllers\Admin\Akuntansi@tambah');
Route::get('admin/akuntansi/edit/{par1}', 'App\Http\Controllers\Admin\Akuntansi@edit');
Route::get('admin/akuntansi/delete/{par1}', 'App\Http\Controllers\Admin\Akuntansi@delete');
Route::post('admin/akuntansi/tambah_proses', 'App\Http\Controllers\Admin\Akuntansi@tambah_proses');
Route::post('admin/akuntansi/edit_proses', 'App\Http\Controllers\Admin\Akuntansi@edit_proses');
Route::post('admin/akuntansi/proses', 'App\Http\Controllers\Admin\Akuntansi@proses');
Route::post('admin/akuntansi/import', 'App\Http\Controllers\Admin\Akuntansi@import');

//Prodi Bisnis Digital
Route ::get('admin/bisnisdigital', 'App\Http\Controllers\Admin\Bisnisdigital@index');
Route::get('admin/bisnisdigital/cari', 'App\Http\Controllers\Admin\Bisnisdigital@cari');
Route::get('admin/bisnisdigital/status_bisnisdigital/{par1}', 'App\Http\Controllers\Admin\Bisnisdigital@status_bisnisdigital');
Route::get('admin/bisnisdigital/kategori/{par1}', 'App\Http\Controllers\Admin\Bisnisdigital@kategori');
Route::get('admin/bisnisdigital/detail/{par1}', 'App\Http\Controllers\Admin\Bisnisdigital@detail');
Route::get('admin/bisnisdigital/tambah', 'App\Http\Controllers\Admin\Bisnisdigital@tambah');
Route::get('admin/bisnisdigital/edit/{par1}', 'App\Http\Controllers\Admin\Bisnisdigital@edit');
Route::get('admin/bisnisdigital/delete/{par1}', 'App\Http\Controllers\Admin\Bisnisdigital@delete');
Route::post('admin/bisnisdigital/tambah_proses', 'App\Http\Controllers\Admin\Bisnisdigital@tambah_proses');
Route::post('admin/bisnisdigital/edit_proses', 'App\Http\Controllers\Admin\Bisnisdigital@edit_proses');
Route::post('admin/bisnisdigital/proses', 'App\Http\Controllers\Admin\Bisnisdigital@proses');
Route::post('admin/bisnisdigital/import', 'App\Http\Controllers\Admin\Bisnisdigital@import');

//Prodi S1 Sastra Inggris
Route ::get('admin/s1sastrainggris', 'App\Http\Controllers\Admin\S1sastraInggris@index');
Route::get('admin/s1sastrainggris/cari', 'App\Http\Controllers\Admin\S1sastraInggris@cari');
Route::get('admin/s1sastrainggris/status_s1sastrainggris/{par1}', 'App\Http\Controllers\Admin\S1sastraInggris@status_s1sastrainggris');
Route::get('admin/s1sastrainggris/kategori/{par1}', 'App\Http\Controllers\Admin\S1sastraInggris@kategori');
Route::get('admin/s1sastrainggris/detail/{par1}', 'App\Http\Controllers\Admin\S1sastraInggris@detail');
Route::get('admin/s1sastrainggris/tambah', 'App\Http\Controllers\Admin\S1sastraInggris@tambah');
Route::get('admin/s1sastrainggris/edit/{par1}', 'App\Http\Controllers\Admin\S1sastraInggris@edit');
Route::get('admin/s1sastrainggris/delete/{par1}', 'App\Http\Controllers\Admin\S1sastraInggris@delete');
Route::post('admin/s1sastrainggris/tambah_proses', 'App\Http\Controllers\Admin\S1sastraInggris@tambah_proses');
Route::post('admin/s1sastrainggris/edit_proses', 'App\Http\Controllers\Admin\S1sastraInggris@edit_proses');
Route::post('admin/s1sastrainggris/proses', 'App\Http\Controllers\Admin\S1sastraInggris@proses');
Route::post('admin/s1sastrainggris/import', 'App\Http\Controllers\Admin\S1sastraInggris@import');

//Prodi S2 Sastra Inggris
Route ::get('admin/s2sastrainggris', 'App\Http\Controllers\Admin\S2sastraInggris@index');
Route::get('admin/s2sastrainggris/cari', 'App\Http\Controllers\Admin\S2sastraInggris@cari');
Route::get('admin/s2sastrainggris/status_s2sastrainggris/{par1}', 'App\Http\Controllers\Admin\S2sastraInggris@status_s2sastrainggris');
Route::get('admin/s2sastrainggris/kategori/{par1}', 'App\Http\Controllers\Admin\S2sastraInggris@kategori');
Route::get('admin/s2sastrainggris/detail/{par1}', 'App\Http\Controllers\Admin\S2sastraInggris@detail');
Route::get('admin/s2sastrainggris/tambah', 'App\Http\Controllers\Admin\S2sastraInggris@tambah');
Route::get('admin/s2sastrainggris/edit/{par1}', 'App\Http\Controllers\Admin\S2sastraInggris@edit');
Route::get('admin/s2sastrainggris/delete/{par1}', 'App\Http\Controllers\Admin\S2sastraInggris@delete');
Route::post('admin/s2sastrainggris/tambah_proses', 'App\Http\Controllers\Admin\S2sastraInggris@tambah_proses');
Route::post('admin/s2sastrainggris/edit_proses', 'App\Http\Controllers\Admin\S2sastraInggris@edit_proses');
Route::post('admin/s2sastrainggris/proses', 'App\Http\Controllers\Admin\S2sastraInggris@proses');
Route::post('admin/s2sastrainggris/import', 'App\Http\Controllers\Admin\S2sastraInggris@import');

//Prodi S2 Desain Komunikasi visual
Route ::get('admin/dkv', 'App\Http\Controllers\Admin\Dkv@index');
Route::get('admin/dkv/cari', 'App\Http\Controllers\Admin\Dkv@cari');
Route::get('admin/dkv/status_dkv/{par1}', 'App\Http\Controllers\Admin\Dkv@status_dkv');
Route::get('admin/dkv/kategori/{par1}', 'App\Http\Controllers\Admin\Dkv@kategori');
Route::get('admin/dkv/detail/{par1}', 'App\Http\Controllers\Admin\Dkv@detail');
Route::get('admin/dkv/tambah', 'App\Http\Controllers\Admin\Dkv@tambah');
Route::get('admin/dkv/edit/{par1}', 'App\Http\Controllers\Admin\Dkv@edit');
Route::get('admin/dkv/delete/{par1}', 'App\Http\Controllers\Admin\Dkv@delete');
Route::post('admin/dkv/tambah_proses', 'App\Http\Controllers\Admin\Dkv@tambah_proses');
Route::post('admin/dkv/edit_proses', 'App\Http\Controllers\Admin\Dkv@edit_proses');
Route::post('admin/dkv/proses', 'App\Http\Controllers\Admin\Dkv@proses');
Route::post('admin/dkv/import', 'App\Http\Controllers\Admin\Dkv@import');

//Prodi Hukum
Route ::get('admin/hukum', 'App\Http\Controllers\Admin\Hukum@index');
Route::get('admin/hukum/cari', 'App\Http\Controllers\Admin\Hukum@cari');
Route::get('admin/hukum/status_hukum/{par1}', 'App\Http\Controllers\Admin\Hukum@status_hukum');
Route::get('admin/hukum/kategori/{par1}', 'App\Http\Controllers\Admin\Hukum@kategori');
Route::get('admin/hukum/detail/{par1}', 'App\Http\Controllers\Admin\Hukum@detail');
Route::get('admin/hukum/tambah', 'App\Http\Controllers\Admin\Hukum@tambah');
Route::get('admin/hukum/edit/{par1}', 'App\Http\Controllers\Admin\Hukum@edit');
Route::get('admin/hukum/delete/{par1}', 'App\Http\Controllers\Admin\Hukum@delete');
Route::post('admin/hukum/tambah_proses', 'App\Http\Controllers\Admin\Hukum@tambah_proses');
Route::post('admin/hukum/edit_proses', 'App\Http\Controllers\Admin\Hukum@edit_proses');
Route::post('admin/hukum/proses', 'App\Http\Controllers\Admin\Hukum@proses');
Route::post('admin/hukum/import', 'App\Http\Controllers\Admin\Hukum@import');


// download
Route::get('admin/download', 'App\Http\Controllers\Admin\Download@index');
Route::get('admin/download/cari', 'App\Http\Controllers\Admin\Download@cari');
Route::get('admin/download/status_download/{par1}', 'App\Http\Controllers\Admin\Download@status_download');
Route::get('admin/download/kategori/{par1}', 'App\Http\Controllers\Admin\Download@kategori');
Route::get('admin/download/tambah', 'App\Http\Controllers\Admin\Download@tambah');
Route::get('admin/download/edit/{par1}', 'App\Http\Controllers\Admin\Download@edit');
Route::get('admin/download/unduh/{par1}', 'App\Http\Controllers\Admin\Download@unduh');
Route::get('admin/download/delete/{par1}', 'App\Http\Controllers\Admin\Download@delete');
Route::post('admin/download/tambah_proses', 'App\Http\Controllers\Admin\Download@tambah_proses');
Route::post('admin/download/edit_proses', 'App\Http\Controllers\Admin\Download@edit_proses');
Route::post('admin/download/proses', 'App\Http\Controllers\Admin\Download@proses');

// Kalender
Route::get('admin/kalender', 'App\Http\Controllers\Admin\Kalender@index');
Route::get('admin/kalender/cari', 'App\Http\Controllers\Admin\Kalender@cari');
Route::get('admin/kalender/status_download/{par1}', 'App\Http\Controllers\Admin\Kalender@status_download');
Route::get('admin/kalender/kategori/{par1}', 'App\Http\Controllers\Admin\Kalender@kategori');
Route::get('admin/kalender/tambah', 'App\Http\Controllers\Admin\Kalender@tambah');
Route::get('admin/kalender/edit/{par1}', 'App\Http\Controllers\Admin\Kalender@edit');
Route::get('admin/kalender/unduh/{par1}', 'App\Http\Controllers\Admin\Kalender@unduh');
Route::get('admin/kalender/delete/{par1}', 'App\Http\Controllers\Admin\Kalender@delete');
Route::post('admin/kalender/tambah_proses', 'App\Http\Controllers\Admin\Kalender@tambah_proses');
Route::post('admin/kalender/edit_proses', 'App\Http\Controllers\Admin\Kalender@edit_proses');
Route::post('admin/kalender/proses', 'App\Http\Controllers\Admin\Kalender@proses');

// Akademik
Route::get('admin/akademik', 'App\Http\Controllers\Admin\Akademik@index');
Route::get('admin/akademik/cari', 'App\Http\Controllers\Admin\Akademik@cari');
Route::get('admin/akademik/kategori/{par1}', 'App\Http\Controllers\Admin\Akademik@kategori');
Route::get('admin/akademik/tambah', 'App\Http\Controllers\Admin\Akademik@tambah');
Route::get('admin/akademik/edit/{par1}', 'App\Http\Controllers\Admin\Akademik@edit');
Route::get('admin/akademik/delete/{par1}', 'App\Http\Controllers\Admin\Akademik@delete');
Route::post('admin/akademik/tambah_proses', 'App\Http\Controllers\Admin\Akademik@tambah_proses');
Route::post('admin/akademik/edit_proses', 'App\Http\Controllers\Admin\Akademik@edit_proses');
Route::post('admin/akademik/proses', 'App\Http\Controllers\Admin\Akademik@proses');

// Kemahasiswaan
Route::get('admin/kemahasiswaan', 'App\Http\Controllers\Admin\Kemahasiswaan@index');
Route::get('admin/kemahasiswaan/cari', 'App\Http\Controllers\Admin\Kemahasiswaan@cari');
Route::get('admin/kemahasiswaan/kategori/{par1}', 'App\Http\Controllers\Admin\Kemahasiswaan@kategori');
Route::get('admin/kemahasiswaan/tambah', 'App\Http\Controllers\Admin\Kemahasiswaan@tambah');
Route::get('admin/kemahasiswaan/edit/{par1}', 'App\Http\Controllers\Admin\Kemahasiswaan@edit');
Route::get('admin/kemahasiswaan/delete/{par1}', 'App\Http\Controllers\Admin\Kemahasiswaan@delete');
Route::post('admin/kemahasiswaan/tambah_proses', 'App\Http\Controllers\Admin\Kemahasiswaan@tambah_proses');
Route::post('admin/kemahasiswaan/edit_proses', 'App\Http\Controllers\Admin\Kemahasiswaan@edit_proses');
Route::post('admin/kemahasiswaan/proses', 'App\Http\Controllers\Admin\Kemahasiswaan@proses');

/* END BACK END*/
