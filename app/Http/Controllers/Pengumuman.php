<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

use App\Models\Pengumuman_model;


class Pengumuman extends Controller
{

    public function index()
    {
        Paginator::useBootstrap();
        $site     = DB::table('konfigurasi')->first();
        Paginator::useBootstrap();
        $peng = DB::table('pengumuman')
                    ->select('*')
                    ->orderBy('id_pengumuman','DESC')
                    ->paginate(12);
        $model     = new Pengumuman_model();
        $pengumuman = $model->listing();
        $shareButton =\Share::page('http://127.0.0.1:8000/', 'id_pengumuman')
        ->facebook()
        ->twitter()
        ->pinterest();
       
        
        $data = array(
            'title'     => 'Pengumuman',
            'deskripsi' => 'Pengumuman',
            'keywords'  => 'Pengumuman',
            'site'        => $site,
            'pengumuman'    => $pengumuman,
            'pengumuman'    => $pengumuman,
            'peng'    => $peng,
            'shareButton'    => $shareButton,
            'content'   => 'pengumuman/index'
        );
        return view('layout/wrapper', $data);
    }

    // public function like($like){
    //     $site       = DB::table('konfigurasi')->first();
    //     $model     = new Pengumuman_model();
    //     $pengumuman = $model->like($like);
       
    //     if (!$pengumuman) {
    //         return redirect('pengumuman');
    //     }
    //     $data = array(
    //             'title'     => 'Pengumuman',
    //             'deskripsi' => 'Pengumuman',
    //             'keywords'  => 'Pengumuman',
    //             'site'        => $site,
    //              'pengumuman'    => $pengumuman,
    //             'content'   => 'pengumuman/index'
    //     );
    //     return view('layout/wrapper', $data);
    // }

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
        $model      = new Pengumuman_model();
        $pengumuman     = $model->kategori_depan($id_kategori);


        $data = array(
            'title'     => $kategori->nama_kategori,
            'deskripsi' => $kategori->nama_kategori,
            'keywords'  => $kategori->nama_kategori,
            'site'      => $site,
            'pengumuman'    =>  $pengumuman,
            'pengumuman'    =>  $pengumuman,
            'content'   => 'pengumuman/index'
        );
        return view('layout/wrapper', $data);
    }

   

    // kontak
    public function terjadi($slug_pengumuman)
    {
        Paginator::useBootstrap();
        $site   = DB::table('konfigurasi')->first();
        $model  = new Pengumuman_model();
        $pengumuman = $model->read($slug_pengumuman);
        $layanan = DB::table('pengumuman')->where(array('jenis_pengumuman' => 'Layanan', 'status_pengumuman' => 'Publish'))->orderBy('urutan', 'ASC')->get();
        if (!$pengumuman) {
            return redirect('pengumuman');
        }

        $data = array(
            'title'     => $pengumuman->judul_pengumuman,
            'deskripsi' => $pengumuman->judul_pengumuman,
            'keywords'  => $pengumuman->judul_pengumuman,
            'site'      => $site,
            'pengumuman'    => $pengumuman,
            'layanan'   => $layanan,
            'content'   => 'pengumuman/terjadi'
        );
        return view('layout/wrapper', $data);
    }

    // kontak
    public function read($slug_pengumuman)
    {
        Paginator::useBootstrap();
        $site   = DB::table('konfigurasi')->first();
      
        // $berita = DB::table('berita')->where('status_berita','Publish')->orderBy('id_berita', 'DESC')->get();
        $model  = new Pengumuman_model();
        $read   = $model->read($slug_pengumuman);
        $read_related   = $model->related_post();
        $related   = DB::table('pengumuman')->inRandomOrder()->get();
        if (!$read) {
            return redirect('pengumuman');
        }
        $related_post   = DB::table('pengumuman')->inRandomOrder()->take(3)->get();
        if (!$read_related) {
            return redirect('pengumuman');
        }
        $shareButton_pengumuman =\Share::page('http://127.0.0.1:8000/', 'id_pengumuman')
        ->facebook()
        ->twitter()
        ->pinterest();

        $data = array(
            'title'     => $read->judul_pengumuman,
            'deskripsi' => $read->judul_pengumuman,
            'keywords'  => $read->judul_pengumuman,
            'site'      => $site,
            'read'      => $read,
            'related'  => $related,
            'shareButton_pengumuman'  => $shareButton_pengumuman,
            'related_post'  => $related_post,
            
            'content'   => 'pengumuman/read'
        );
        return view('layout/wrapper', $data);
    }
    public function toggleLike(Request $request)
    {
        $dataId = $request->input('id_pengumuman');

        // Periksa apakah data sudah memiliki like
        $likeCount = DB::table('likes')->where('id', $dataId)->value('like_count');

        if (!$likeCount) {
            $likeCount = 0;
            DB::table('likes')->where('id', $dataId)->update(['like_count' => $likeCount + 1]);
        } else {
            DB::table('likes')->where('id', $dataId)->increment('like_count');
        }

        return response()->json(['like_count' => $likeCount + 1]);
    }

    
}
