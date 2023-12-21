<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Akademik_model;


class Akademik extends Controller
{
    // Main page
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	$myakademik			= new Akademik_model();
		$akademik 			= $myakademik->semua();
		$kategori_akademik 	= DB::table('kategori_akademik')->orderBy('urutan','ASC')->get();

		$data = array(  'title'				=> 'Data Peraturan Akademik',
						'akademik'			=> $akademik,
						'kategori_akademik'	=> $kategori_akademik,
                        'content'			=> 'admin/akademik/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Cari
    public function cari(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myakademik          = new Akademik_model();
        $keywords           = $request->keywords;
        $akademik             = $myakademik->cari($keywords);
        $kategori_akademik    = DB::table('kategori_akademik')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Peraturan Akademik',
                        'akademik'            => $akademik,
                        'kategori_akademik'   => $kategori_akademik,
                        'content'           => 'admin/kalender/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $id_akademiknya       = $request->id_akademik;
            for($i=0; $i < sizeof($id_akademiknya);$i++) {
                DB::table('akademik')->where('id_akademik',$id_akademiknya[$i])->delete();
            }
            return redirect('admin/akademik')->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }elseif(isset($_POST['update'])) {
            $id_akademiknya       = $request->id_akademik;
            for($i=0; $i < sizeof($id_akademiknya);$i++) {
                DB::table('akademik')->where('id_akademik',$id_akademiknya[$i])->update([
                        'id_user'               => Session()->get('id_user'),
                        'id_kategori_akademik'    => $request->id_kategori_akademik
                    ]);
            }
            return redirect('admin/akademik')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }


    //Kategori
    public function kategori($id_kategori_akademik)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myakademik           = new Akademik_model();
        $akademik             = $myakademik->all_kategori_download($id_kategori_akademik);
        $kategori_akademik    = DB::table('kategori_akademik')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Kalender',
                        'akademik'            => $akademik,
                        'kategori_akademik'   => $kategori_akademik,
                        'content'           => 'admin/akademik/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Tambah
    public function tambah()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $kategori_akademik    = DB::table('kategori_akademik')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Tambah Akademik',
                        'kategori_akademik'   => $kategori_akademik,
                        'content'           => 'admin/akademik/tambah'
                    );
        return view('admin/layout/wrapper',$data);
    }

  

    // edit
    public function edit($id_akademik)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myakademik           = new Akademik_model();
        $akademik             = $myakademik->detail($id_akademik);
        $kategori_akademik    = DB::table('kategori_akademik')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Edit Akademik',
                        'akademik'            => $akademik,
                        'kategori_akademik'   => $kategori_akademik,
                        'content'           => 'admin/akademik/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah_proses(Request $request)
    {
       
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                           
                            'isi'  => 'required',
                            'urutan'  => 'required',
                            ]);
      
        DB::table('akademik')->insert([
            'id_kategori_akademik'  => $request->id_kategori_akademik,
            'id_user'               => Session()->get('id_user'),
            'isi'                  => $request->isi,
            'urutan'                  => $request->urutan
        ]);
        return redirect('admin/akademik')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'urutan'    => 'required',
                            'isi'  => 'required',
                            ]);
        
            // END UPLOAD
            DB::table('akademik')->where('id_akademik',$request->id_akademik)->update([
                'id_kategori_akademik'  => $request->id_kategori_akademik,
                'id_user'               => Session()->get('id_user'),
                'isi'               => $request->isi,
                'urutan'                  => $request->urutan

            ]);
        
        return redirect('admin/akademik')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id_akademik)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        DB::table('akademik')->where('id_akademik',$id_akademik)->delete();
        return redirect('admin/akademik')->with(['sukses' => 'Data telah dihapus']);
    }
}
