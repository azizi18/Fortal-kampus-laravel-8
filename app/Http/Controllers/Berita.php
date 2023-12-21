<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Models\Berita_model;

Paginator::useBootstrap();

class Berita extends Controller
{

    // Beritapage
    public function index()
    {
        Paginator::useBootstrap();
        $site     = DB::table('konfigurasi')->first();
       
        $ber = DB::table('berita')
                    ->select('*')
                    ->orderBy('id_berita','DESC')
                    ->paginate(10);
        $model     = new Berita_model();
        $berita = $model->listing();
        $linkButton =\Share::page('http://127.0.0.1:8000/', 'id_berita')
        ->facebook()
        ->twitter()
        ->pinterest();

        $data = array(
            'title'     => 'Berita dan Update',
            'deskripsi' => 'Berita dan Update',
            'keywords'  => 'Berita dan Update',
            'site'        => $site,
            'berita'    => $berita,
            'berita'    => $berita,
            'linkButton'    => $linkButton,
            'ber'       => $ber,
            'content'   => 'berita/index'
        );
        return view('layout/wrapper', $data);
    }

    // Beritapage
    public function kategori($slug_kategori)
    {
        Paginator::useBootstrap();
        $site       = DB::table('konfigurasi')->first();
        $kategori   = DB::table('kategori')->where('slug_kategori', $slug_kategori)->first();
        if (!$kategori) {
            return redirect('berita');
        }
        $id_kategori = $kategori->id_kategori;
        $model      = new Berita_model();
        $berita     = $model->kategori_depan($id_kategori);


        $data = array(
            'title'     => $kategori->nama_kategori,
            'deskripsi' => $kategori->nama_kategori,
            'keywords'  => $kategori->nama_kategori,
            'site'      => $site,
            'berita'    => $berita,
            'beritas'    => $berita,
            'content'   => 'pengumuman/index'
           
        );
        return view('layout/wrapper', $data);
    }

   // kontak
   public function pengumuman($slug_berita)
   {
       Paginator::useBootstrap();
       $site   = DB::table('konfigurasi')->first();
       $model  = new Berita_model();
       $berita = $model->read($slug_berita);
       $pengumuman = DB::table('berita')->where(array('jenis_berita' => 'pengumuman','status_berita' => 'Publish'))->orderBy('urutan', 'ASC')->get();
       if(!$berita)
       {
           return redirect('berita');
       }

       $data = array(  'title'     => $berita->judul_berita,
                       'deskripsi' => $berita->judul_berita,
                       'keywords'  => $berita->judul_berita,
                       'site'      => $site,
                       'berita'    => $berita,
                       'pengumuman'   => $pengumuman,
                       'content'   => 'berita/pengumuman'
                   );
       return view('layout/wrapper',$data);
   }

    // kontak
    public function read($slug_berita)
    {
        Paginator::useBootstrap();
        $site   = DB::table('konfigurasi')->first();
        // $berita = DB::table('berita')->where('status_berita','Publish')->orderBy('id_berita', 'DESC')->get();
        $model  = new Berita_model();
        $read   = $model->read($slug_berita);
        $read_related   = $model->related_post();
        $related   = DB::table('berita')->get();

        if (!$read) {
            return redirect('berita');
        }
        $related_post   = DB::table('berita')->inRandomOrder()->take(3)->get();
        if (!$read_related) {
            return redirect('berita');
        }
        $linkButton_berita =\Share::page('http://127.0.0.1:8000/', 'id_pengumuman')
        ->facebook()
        ->twitter()
        ->pinterest();
        $data = array(
            'title'     => $read->judul_berita,
            'deskripsi' => $read->judul_berita,
            'keywords'  => $read->judul_berita,
            'site'      => $site,
            'read'      => $read,
            'related'      => $related,
            'linkButton_berita'      => $linkButton_berita,
            'related_post'      => $related_post,
            'content'   => 'berita/read'
        );
        return view('layout/wrapper', $data);
    }
}
