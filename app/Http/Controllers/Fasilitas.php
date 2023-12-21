<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
class Fasilitas extends Controller
{
    // Main page
    public function index()
    {
        Paginator::useBootstrap();
        $fasilitas = DB::table('fasilitas')
                    ->select('*')
                    ->orderBy('fasilitas.urutan','ASC')
                    ->paginate(15);
       	$site 	= DB::table('konfigurasi')->first();

		$data = array(  
						'fasilitas'	=> $fasilitas,
						'site'		=> $site,
                        'content'	=> 'profil/fasilitas-kampus'
                    );
        return view('layout/wrapper',$data);
    }

}
