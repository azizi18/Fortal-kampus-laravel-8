<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;
use App\Models\Kalender_model;

class Kalender extends Controller
{
    // Main page
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	$mykalender			= new Kalender_model();
		$kalender 			= $mykalender->semua();
		$kategori_kalender 	= DB::table('kategori_kalender')->orderBy('urutan','ASC')->get();

		$data = array(  'title'				=> 'Data Kalender',
						'kalender'			=> $kalender,
						'kategori_kalender'	=> $kategori_kalender,
                        'content'			=> 'admin/kalender/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Cari
    public function cari(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mykalender          = new Kalender_model();
        $keywords           = $request->keywords;
        $kalender             = $mykalender->cari($keywords);
        $kategori_kalender    = DB::table('kategori_kalender')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Kalender',
                        'kalender'            => $kalender,
                        'kategori_download'   => $kategori_kalender,
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
            $id_kalendernya       = $request->id_kalender;
            for($i=0; $i < sizeof($id_kalendernya);$i++) {
                DB::table('kalender')->where('id_kalender',$id_kalendernya[$i])->delete();
            }
            return redirect('admin/kalender')->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }elseif(isset($_POST['update'])) {
            $id_kalendernya       = $request->id_kalender;
            for($i=0; $i < sizeof($id_kalendernya);$i++) {
                DB::table('kalender')->where('id_kalender',$id_kalendernya[$i])->update([
                        'id_user'               => Session()->get('id_user'),
                        'id_kategori_kalender'    => $request->id_kategori_kalender
                    ]);
            }
            return redirect('admin/kalender')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }

    

    //Kategori
    public function kategori($id_kategori_kalender)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mykalender           = new Kalender_model();
        $kalender             = $mykalender->all_kategori_download($id_kategori_kalender);
        $kategori_kalender    = DB::table('kategori_download')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Kalender',
                        'kalender'            => $kalender,
                        'kategori_kalender'   => $kategori_kalender,
                        'content'           => 'admin/kalender/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Tambah
    public function tambah()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $kategori_kalender    = DB::table('kategori_kalender')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Tambah Kalender',
                        'kategori_kalender'   => $kategori_kalender,
                        'content'           => 'admin/kalender/tambah'
                    );
        return view('admin/layout/wrapper',$data);
    }

  

    // edit
    public function edit($id_kalender)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mykalender           = new Kalender_model();
        $kalender             = $mykalender->detail($id_kalender);
        $kategori_kalender    = DB::table('kategori_kalender')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Edit Kalender',
                        'kalender'            => $kalender,
                        'kategori_kalender'   => $kategori_kalender,
                        'content'           => 'admin/kalender/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah_proses(Request $request)
    {
       
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'urutan'  => 'required',
                            'isi'  => 'required',
                            ]);
      
        DB::table('kalender')->insert([
            'id_kategori_kalender'  => $request->id_kategori_kalender,
            'id_user'               => Session()->get('id_user'),
            'urutan'        => $request->urutan,
            'isi'                  => $request->isi
        ]);
        return redirect('admin/kalender')->with(['sukses' => 'Data telah ditambah']);
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
            DB::table('kalender')->where('id_kalender',$request->id_kalender)->update([
                'id_kategori_kalender'  => $request->id_kategori_kalender,
                'id_user'               => Session()->get('id_user'),
                'urutan'                => $request->urutan,
                'isi'                    => $request->isi
            ]);
        
        return redirect('admin/kalender')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id_kalender)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        DB::table('kalender')->where('id_kalender',$id_kalender)->delete();
        return redirect('admin/kalender')->with(['sukses' => 'Data telah dihapus']);
    }
}
