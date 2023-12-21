<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

use App\Models\Visi_model;

class VisiMisi extends Controller
{
    // Main page
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	$myvismis			= new Visi_model();
		$vismis 			= $myvismis->semua();
		$kategori_vismis 	= DB::table('kategori_vismis')->orderBy('urutan','ASC')->get();

		$data = array(  'title'				=> 'Data Visi Misi',
						'vismis'			=> $vismis,
						'kategori_vismis'	=> $kategori_vismis,
                        'content'			=> 'admin/visi-misi/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Cari
    public function cari(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myvismis          = new Visi_model();
        $keywords           = $request->keywords;
        $vismis             = $myvismis->cari($keywords);
        $kategori_vismis    = DB::table('kategori_vismis')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Visi Misi',
                        'vismis'            => $vismis,
                        'kategori_vismis'  => $kategori_vismis,
                        'content'           => 'admin/visi-misi/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $id_vismisnya       = $request->id_kalender;
            for($i=0; $i < sizeof( $id_vismisnya );$i++) {
                DB::table('visi_misi')->where('id_vismis', $id_vismisnya [$i])->delete();
            }
            return redirect('admin/visi-misi')->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }elseif(isset($_POST['update'])) {
             $id_vismisnya        = $request->id_vismis;
            for($i=0; $i < sizeof( $id_vismisnya );$i++) {
                DB::table('visi_misi')->where('id_vismis', $id_vismisnya [$i])->update([
                        'id_user'               => Session()->get('id_user'),
                        'id_kategori_vismis'    => $request->id_kategori_vismis
                    ]);
            }
            return redirect('admin/visi-misi')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }

  

    //Kategori
    public function kategori($id_kategori_vismis)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myvismis          = new Visi_model();
        $vismis             = $myvismis->all_kategori_download($id_kategori_vismis);
        $kategori_vismis    = DB::table('kategori_vismis')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Visi Misi',
                        'vismis'            => $vismis,
                        'kategori_vismis'   => $kategori_vismis,
                        'content'           => 'admin/visi-misi/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Tambah
    public function tambah()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $kategori_vismis   = DB::table('kategori_vismis')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Tambah Visi Misi',
                        'kategori_vismis'   => $kategori_vismis,
                        'content'           => 'admin/visi-misi/tambah'
                    );
        return view('admin/layout/wrapper',$data);
    }

  

    // edit
    public function edit($id_vismis)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myvismis           = new Visi_model();
        $vismis             = $myvismis->detail($id_vismis);
        $kategori_vismis    = DB::table('kategori_vismis')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Edit Visi Misi',
                        'vismis'            => $vismis,
                        'kategori_vismis'   => $kategori_vismis,
                        'content'           => 'admin/visi-misi/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah_proses(Request $request)
    {
       
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                           
                            'isi'  => 'required',
                            ]);
      
        DB::table('visi_misi')->insert([
            'id_kategori_vismis'  => $request->id_kategori_vismis,
            'id_user'               => Session()->get('id_user'),
            'urutan'        => $request->urutan,
            'isi'                  => $request->isi
        ]);
        return redirect('admin/visi_misi')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'isi'  => 'required',
                            ]);
        
            // END UPLOAD
            DB::table('visi_misi')->where('id_vismis',$request->id_vismis)->update([
                'id_kategori_vismis'  => $request->id_kategori_vismis,
                'id_user'               => Session()->get('id_user'),
                'urutan'        => $request->urutan,
                'isi'               => $request->isi
            ]);
        
        return redirect('admin/visi_misi')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id_vismis)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        DB::table('visi_misi')->where('id_vismis',$id_vismis)->delete();
        return redirect('admin/visi_misi')->with(['sukses' => 'Data telah dihapus']);
    }
}
