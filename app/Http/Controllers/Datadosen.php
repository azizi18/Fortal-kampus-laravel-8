<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Datadosen extends Controller
{

    public function index()
    {
      
        $ilkom = DB::table('ilmu_komputer')
                    ->select('*')
                    ->orderBy('id_ilkom','ASC')
                    ->get();
         $ti = DB::table('teknologi_informasi')
                    ->select('*')
                    ->orderBy('id_ti','ASC')
                    ->get();
        $rpl = DB::table('d3_rpl')
                    ->select('*')
                    ->orderBy('id_rpl','DESC')
                    ->get();
         $sistem = DB::table('sistem_informasi')
                    ->select('*')
                    ->orderBy('id_si','DESC')
                    ->get();
         $teknopang = DB::table('teknologi_pangan')
                    ->select('*')
                    ->orderBy('id_tp','DESC')
                    ->get();
          $s1rpl = DB::table('s1_rpl')
                    ->select('*')
                    ->orderBy('id_rpl','DESC')
                    ->get();
         $pti = DB::table('pti')
                    ->select('*')
                    ->orderBy('id_pti','DESC')
                    ->get();
          $farmasi = DB::table('farmasi')
                    ->select('*')
                    ->orderBy('id_farm','DESC')
                    ->get();
         $gizi      = DB::table('gizi')
                    ->select('*')
                    ->orderBy('id_giz','DESC')
                    ->get();
        $manajemen   = DB::table('manajemen')
                    ->select('*')
                    ->orderBy('id_man','DESC')
                    ->get();
         $akuntansi   = DB::table('akuntansi')
                    ->select('*')
                    ->orderBy('id_aku','DESC')
                    ->get();
         $bisnis   = DB::table('bisnis_digital')
                    ->select('*')
                    ->orderBy('id_bis','DESC')
                    ->get();
         $s1sastra   = DB::table('s1sastra_inggris')
                    ->select('*')
                    ->orderBy('id_sas','DESC')
                    ->get();
          $s2sastra   = DB::table('s2sastra_inggris')
                    ->select('*')
                    ->orderBy('id_sas','DESC')
                    ->get();
         $dkv   = DB::table('dkv')
                    ->select('*')
                    ->orderBy('id_dkv','DESC')
                    ->get();
         $hukum   = DB::table('hukum')
                    ->select('*')
                    ->orderBy('id_huk','DESC')
                    ->get();
  
  
  

		$data = array(  
						'ilkom' 	=>   $ilkom ,
                        'ti'	    =>   $ti,
                        'rpl'	    =>   $rpl,
                        'sistem'	=>   $sistem,
                        'teknopang'	=>   $teknopang,
                        's1rpl' 	=>   $s1rpl,
                        'pti'	    =>   $pti,
                        'farmasi'	=>   $farmasi,
                        'gizi'	    =>   $gizi,
                        'manajemen'	=>   $manajemen,
                        'akuntansi'	=>   $akuntansi,
                        'bisnis'	=>   $bisnis,
                        's1sastra'	=>   $s1sastra,
                        's2sastra'	=>   $s2sastra,
                        'dkv'	    =>   $dkv,
                        'hukum' 	=>   $hukum,

                        'content'	=> 'profil/data-dosen'
                    );
        return view('layout/wrapper',$data);
    }
}
