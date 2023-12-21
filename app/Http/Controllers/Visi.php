<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\Kategori_vismis;
use App\Models\Visi_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Visi extends Controller
{
    // Main page
    public function index()
    {
      
        $kategori_vismis = DB::table('kategori_vismis')
                    ->orderBy('kategori_vismis.slug_kategori_vismis','ASC')
                    ->get();
          $vismis = DB::table('visi_misi')
                    ->orderBy('visi_misi.urutan','ASC')
                    ->get();
        
                  
		$data = array(  'title'		             => 'Dokumen '.website('namaweb'),
						'deskripsi'	          => 'Dokumen '.website('namaweb'),
						'keywords'	           => 'Dokumen '.website('namaweb'),
						'kategori_vismis'	  => $kategori_vismis,
                        'vismis'	         => $vismis,
                        'content'	          => 'profil/visi-misi'
                    );
        return view('layout/wrapper',$data);
    }

    // Main page
    public function kategori($slug_kategori_vismis)
    {
        
        $kategori   = DB::table('kategori_vismis')
                    ->where('kategori_vismis.slug_kategori_vismis',$slug_kategori_vismis)
                    ->first();
        $vismis = DB::table('visi_misi')
                    ->join('kategori_vismis', 'kategori_vismis.id_kategori_vismis', '=', 'visi_misi.id_kategori_vismis','LEFT')
                    ->select('visi_misi.*', 'kategori_vismis.nama_kategori_vismis')
                    ->where('visi_misi.id_kategori_vismis',$kategori->id_kategori_vismis)
                    ->orderBy('visi_misi.id_vismis','DESC')
                    ->get();

        $data = array(  'title'     => $kategori->nama_kategori_vismis,
                        'deskripsi' => $kategori->nama_kategori_vismis,
                        'keywords'  => $kategori->nama_kategori_vismis,
                        'vismis'    => $vismis,
                        'kategori'  => $kategori,
                        'content'   => 'profil/visi-misi'
                    );
        return view('layout/wrapper',$data);
    }

   

    

}
