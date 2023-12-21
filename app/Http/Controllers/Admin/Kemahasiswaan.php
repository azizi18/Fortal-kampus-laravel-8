<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Kemahasiswaan_model;


class Kemahasiswaan extends Controller
{
    // Main page
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	$mykemahasiswaan			= new Kemahasiswaan_model();
		$kemahasiswaan 			= $mykemahasiswaan->semua();
		$kategori_kemahasiswaan 	= DB::table('kategori_kemahasiswaan')->orderBy('urutan','ASC')->get();

		$data = array(  'title'				=> 'Data Kemahasiswaan',
						'kemahasiswaan'			=> $kemahasiswaan,
						'kategori_kemahasiswaan'	=> $kategori_kemahasiswaan,
                        'content'			=> 'admin/kemahasiswaan/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Cari
    public function cari(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mykemahasiswaan          = new Kemahasiswaan_model();
        $keywords           = $request->keywords;
        $kemahasiswaan            = $mykemahasiswaan->cari($keywords);
        $kategori_kemahasiswaan    = DB::table('kategori_kemahasiswaan')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Kemahasiswaan',
                        'kemahasiswaan'            => $kemahasiswaan,
                        'kategori_kemahasiswaan'   => $kategori_kemahasiswaan,
                        'content'           => 'admin/kemahasiswaan/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $id_kemahasiswaannya       = $request->id_kemahasiswaan;
            for($i=0; $i < sizeof($id_kemahasiswaannya);$i++) {
                DB::table('kemahasiswaan')->where('id_kemahasiswaan',$id_kemahasiswaannya[$i])->delete();
            }
            return redirect('admin/kemahasiswaan')->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }elseif(isset($_POST['update'])) {
            $id_kemahasiswaannya       = $request->id_kemahasiswaan;
            for($i=0; $i < sizeof($id_kemahasiswaannya);$i++) {
                DB::table('kemahasiswaan')->where('id_kemahasiswaan',$id_kemahasiswaannya[$i])->update([
                        'id_user'               => Session()->get('id_user'),
                        'id_kategori_kemahasiswaan'    => $request->id_kategori_kemahasiswaan
                    ]);
            }
            return redirect('admin/kemahasiswaan')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }


    //Kategori
    public function kategori($id_kategori_kemahasiswaan)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mykemahasiswaan          = new Kemahasiswaan_model();
        $kemahasiswaan             = $mykemahasiswaan->all_kategori_kemahasiswaan($id_kategori_kemahasiswaan);
        $kategori_kemahasiswaan   = DB::table('kategori_kemahasiswaan')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data kemahasiswaan',
                        'kemahasiswaan'            => $kemahasiswaan,
                        'kategori_kemahasiswaan'   => $kategori_kemahasiswaan,
                        'content'           => 'admin/kemahasiswaan/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Tambah
    public function tambah()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $kategori_kemahasiswaan   = DB::table('kategori_kemahasiswaan')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Tambah Kemahasiswaan',
                        'kategori_kemahasiswaan'   => $kategori_kemahasiswaan,
                        'content'           => 'admin/kemahasiswaan/tambah'
                    );
        return view('admin/layout/wrapper',$data);
    }

  

    // edit
    public function edit($id_kemahasiswaan)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mykemahasiswaan           = new Kemahasiswaan_model();
        $kemahasiswaan             = $mykemahasiswaan->detail($id_kemahasiswaan);
        $kategori_kemahasiswaan    = DB::table('kategori_kemahasiswaan')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Edit Kemahasiswaan',
                        'kemahasiswaan'            => $kemahasiswaan,
                        'kategori_kemahasiswaan'   => $kategori_kemahasiswaan,
                        'content'           => 'admin/kemahasiswaan/edit'
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
      
        DB::table('kemahasiswaan')->insert([
            'id_kategori_kemahasiswaan'  => $request->id_kategori_kemahasiswaan,
            'id_user'               => Session()->get('id_user'),
            'isi'                  => $request->isi,
            'urutan'                  => $request->urutan
        ]);
        return redirect('admin/kemahasiswaan')->with(['sukses' => 'Data telah ditambah']);
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
            DB::table('kemahasiswaan')->where('id_kemahasiswaan',$request->id_kemahasiswaan)->update([
                'id_kategori_kemahasiswaan'  => $request->id_kategori_kemahasiswaan,
                'id_user'               => Session()->get('id_user'),
                'isi'                   => $request->isi,
                'urutan'                  => $request->urutan

            ]);
        
        return redirect('admin/kemahasiswaan')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id_kemahasiswaan)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        DB::table('kemahasiswaan')->where('id_kemahasiswaan',$id_kemahasiswaan)->delete();
        return redirect('admin/kemahasiswaan')->with(['sukses' => 'Data telah dihapus']);
    }
}
