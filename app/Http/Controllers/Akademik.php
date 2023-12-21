<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;

class Akademik extends Controller
{
    // Main page
    public function index()
    {
        Paginator::useBootstrap();
        $kategori_kalender = DB::table('kategori_akademik')
                    ->orderBy('kategori_akademik.urutan','ASC')
                    ->get();

		$data = array(  'title'		             => 'Dokumen '.website('namaweb'),
						'deskripsi'	          => 'Dokumen '.website('namaweb'),
						'keywords'	           => 'Dokumen '.website('namaweb'),
						'kategori_kalender'	  => $kategori_kalender,
                        'content'	          => 'akademik/informasi/kategori'
                    );
        return view('layout/wrapper',$data);
    }

    // Main page
    public function kategori($slug_kategori_akademik)
    {
        
        $kategori   = DB::table('kategori_akademik')
                    ->where('kategori_akademik.slug_kategori_akademik',$slug_kategori_akademik)
                    ->first();
        $akademik = DB::table('akademik')
                    ->join('kategori_akademik', 'kategori_akademik.id_kategori_akademik', '=', 'akademik.id_kategori_akademik','LEFT')
                    ->select('akademik.*', 'kategori_akademik.nama_kategori_akademik')
                    ->where('akademik.id_kategori_akademik',$kategori->id_kategori_akademik)
                    ->orderBy('akademik.id_akademik','DESC')
                    ->get();

        $data = array(  'title'     => $kategori->nama_kategori_akademik,
                        'deskripsi' => $kategori->nama_kategori_akademik,
                        'keywords'  => $kategori->nama_kategori_akademik,
                        'akademik' => $akademik,
                        'kategori'  => $kategori,
                        'content'   => 'akademik/peraturan-akademik/index'
                    );
        return view('layout/wrapper',$data);
    }

   

    

}
