<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Berita_model;
use App\Models\Pengumuman_model;
use App\Models\Staff_model;
use App\Models\Instagram_model;
use PDF;

class Home extends Controller
{
    // Homepage
    public function index()
    {
        $site_config   = DB::table('konfigurasi')->first();
        $video          = DB::table('video')->orderBy('id_video', 'DESC')->first();
        $slider         = DB::table('galeri')->get();
        $layanan        = DB::table('berita')->where(array('jenis_berita' => 'Layanan'))->limit(3)->orderBy('urutan', 'ASC')->paginate(3);
        $news           = new Berita_model();
        $berita         = $news->home();
        $baru           = new Pengumuman_model();
        $pengumuman        = $baru->home();
        $new           = new Staff_model();
        $staff       =   $new->home();
        $new           = new Instagram_model();
        $instagram       =   $new->home();
        $data = array(
            'title'         => $site_config->namaweb . ' - ' . $site_config->tagline,
            'deskripsi'     => $site_config->namaweb . ' - ' . $site_config->tagline,
            'keywords'      => $site_config->namaweb . ' - ' . $site_config->tagline,
            'slider'        => $slider,
            'site_config'   => $site_config,
            'berita'        => $berita,
            'pengumuman'    => $pengumuman,
            'staff'         => $staff,
            'instagram'      => $instagram,
            'beritas'       => $berita,
            'layanan'       => $layanan,
            'video'         => $video,
            'content'       => 'home/index'
        );
        return view('layout/wrapper', $data);
    }

    // Homepage
    public function javawebmedia()
    {
        $site_config   = DB::table('konfigurasi')->first();
        $news   = new Berita_model();
        $berita = $news->home();
        // Staff
        $kategori_staff  = DB::table('kategori_staff')->orderBy('urutan', 'ASC')->get();
        $layanan = DB::table('berita')->where(array('jenis_berita' => 'Layanan'))->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'     => 'Tentang ' . $site_config->namaweb,
            'deskripsi' => 'Tentang ' . $site_config->namaweb,
            'keywords'  => 'Tentang ' . $site_config->namaweb,
            'site_config'      => $site_config,
            'berita'    => $berita,
            'layanan'   => $layanan,
            'kategori_staff'     => $kategori_staff,
            'content'   => 'home/aws'
        );
        return view('layout/wrapper', $data);
    }

    // kontak
    public function kontak()
    {
        $site_config   = DB::table('konfigurasi')->first();

        $data = array(
            'title'     => 'Menghubungi ' . $site_config->namaweb,
            'deskripsi' => 'Kontak ' . $site_config->namaweb,
            'keywords'  => 'Kontak ' . $site_config->namaweb,
            'site_config'      => $site_config,
            'content'   => 'home/index'
        );
        return view('layout/wrapper', $data);
    }
}
