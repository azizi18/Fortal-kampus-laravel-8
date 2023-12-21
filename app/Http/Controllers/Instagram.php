<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use App\Models\Video_model;
class Instagram extends Controller
{
    // Main page
    public function index()
    {
        Paginator::useBootstrap();
        $instagram = DB::table('instagram')
                    ->select('*')
                    ->orderBy('id_instagram','DESC')
                    ->paginate(10);
       	$site 	= DB::table('konfigurasi')->first();

		$data = array(  'title'		=> 'Video and Webinar '.$site->namaweb,
						'deskripsi'	=> 'Video and Webinar '.$site->namaweb,
						'keywords'	=> 'Video and Webinar '.$site->namaweb,
						'instagram'	=> $instagram,
						'site'		=> $site,
                        'content'	=> 'foto/index'
                    );
        return view('layout/wrapper',$data);
    }
}
