<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;


class Kalender extends Controller
{
    // Main page
    public function index()
    {
        Paginator::useBootstrap();
        $kategori_kalender = DB::table('kategori_kalender')
                    ->orderBy('kategori_kalender.urutan','ASC')
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
    public function kategori($slug_kategori_kalender)
    {
        
        $kategori   = DB::table('kategori_kalender')
                    ->where('kategori_kalender.slug_kategori_kalender',$slug_kategori_kalender)
                    ->first();
        $kalender = DB::table('kalender')
                    ->join('kategori_kalender', 'kategori_kalender.id_kategori_kalender', '=', 'kalender.id_kategori_kalender','LEFT')
                    ->select('kalender.*', 'kategori_kalender.nama_kategori_kalender')
                    ->where('kalender.id_kategori_kalender',$kategori->id_kategori_kalender)
                    ->orderBy('kalender.id_kalender','DESC')
                    ->get();

        $data = array(  'title'     => $kategori->nama_kategori_kalender,
                        'deskripsi' => $kategori->nama_kategori_kalender,
                        'keywords'  => $kategori->nama_kategori_kalender,
                        'kalender' => $kalender,
                        'kategori'  => $kategori,
                        'content'   => 'akademik/informasi/index'
                    );
        return view('layout/wrapper',$data);
    }

   

    

}
