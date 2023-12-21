<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;


class Kemahasiswaan extends Controller
{
    // Main page
    public function index()
    {
        Paginator::useBootstrap();
        $kategori_kemahasiswaan = DB::table('kategori_kemahasiswaan')
                    ->orderBy('kategori_kemahasiswaan.urutan','ASC')
                    ->get();

		$data = array(  'title'		             => 'Dokumen '.website('namaweb'),
						'deskripsi'	          => 'Dokumen '.website('namaweb'),
						'keywords'	           => 'Dokumen '.website('namaweb'),
						'kategori_kemahasiswaan'	  => $kategori_kemahasiswaan,
                        'content'	          => 'akademik/kemahasiswaan/kategori'
                    );
        return view('layout/wrapper',$data);
    }

    // Main page
    public function kategori($slug_kategori_kemahasiswaan)
    {
        
        $kategori   = DB::table('kategori_kemahasiswaan')
                    ->where('kategori_kemahasiswaan.slug_kategori_kemahasiswaan',$slug_kategori_kemahasiswaan)
                    ->first();
        $kemahasiswaan = DB::table('kemahasiswaan')
                    ->join('kategori_kemahasiswaan', 'kategori_kemahasiswaan.id_kategori_kemahasiswaan', '=', 'kemahasiswaan.id_kategori_kemahasiswaan','LEFT')
                    ->select('kemahasiswaan.*', 'kategori_kemahasiswaan.nama_kategori_kemahasiswaan')
                    ->where('kemahasiswaan.id_kategori_kemahasiswaan',$kategori->id_kategori_kemahasiswaan)
                    ->orderBy('kemahasiswaan.id_kemahasiswaan','DESC')
                    ->get();

        $data = array(  'title'     => $kategori->nama_kategori_kemahasiswaan,
                        'deskripsi' => $kategori->nama_kategori_kemahasiswaan,
                        'keywords'  => $kategori->nama_kategori_kemahasiswaan,
                        'kemahasiswaan' => $kemahasiswaan,
                        'kategori'  => $kategori,
                        'content'   => 'akademik/kemahasiswaan/index'
                    );
        return view('layout/wrapper',$data);
    }

   

    

}
