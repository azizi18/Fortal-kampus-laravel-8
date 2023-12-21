<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use App\Models\Video_model;

class Video extends Controller
{
    // Main page
    public function index()
    {
        Paginator::useBootstrap();
        $video = DB::table('video')
                    ->select('*')
                    ->orderBy('id_video','DESC')
                    ->paginate(10);
       	$site 	= DB::table('konfigurasi')->first();

		$data = array(  'title'		=> 'Video and Webinar '.$site->namaweb,
						'deskripsi'	=> 'Video and Webinar '.$site->namaweb,
						'keywords'	=> 'Video and Webinar '.$site->namaweb,
						'videos'	=> $video,
						'site'		=> $site,
                        'content'	=> 'video/index'
                    );
        return view('layout/wrapper',$data);
    }

    

}
