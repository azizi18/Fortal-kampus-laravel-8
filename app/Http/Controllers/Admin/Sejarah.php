<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

use App\Models\Sejarah_model;

class Sejarah extends Controller
{
    // Main page
    public function index()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        Paginator::useBootstrap();
        $mysejarah     = new Sejarah_model();
        $sejarah    = $mysejarah ->semua();
       

        $data = array(
            'title'       => 'Data Sejarah',
            'sejarah'      => $sejarah,
            'content'     => 'admin/sejarah/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    // Add
    public function add()
    {
        $data = array(
            'title'       => 'Data Sejarah'
        );
        return view('admin/sejarah/add', $data);
    }

    // Cari
    public function cari(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mysejarah          = new Sejarah_model();
        $keywords           = $request->keywords;
        $sejarah            = $mysejarah->cari($keywords);
        

        $data = array(
            'title'             => 'Data Sejarah',
            'sejarah'            => $sejarah ,
            'content'           => 'admin/sejarah/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    // Proses
    public function proses(Request $request)
    {
       
        $pengalihan     = $request->pengalihan;
        // PROSES HAPUS MULTIPLE
        if (isset($_POST['hapus'])) {
            $id_sejarahnya       = $request->id_sejarah;
            for ($i = 0; $i < sizeof($id_sejarahnya); $i++) {
                DB::table('sejarah')->where('id_sejarah', $id_sejarahnya[$i])->delete();
            }
            return redirect($pengalihan)->with(['sukses' => 'Data telah dihapus']);
            
        }
    }



    // Tambah
    public function tambah()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mysejarah     = new Sejarah_model();
        $sejarah    = $mysejarah ->semua();
        $data = array(
            'title'             => 'Tambah Sejarah',
            'sejarah'   =>   $sejarah,
            'content'           => 'admin/sejarah/tambah'
        );
        return view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_instagram)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mysejarah             = new Sejarah_model();
        $sejarah             = $mysejarah->detail($id_instagram );

        $data = array(
            'title'             => 'Edit Sejarah',
            'sejarah'            => $sejarah,
            'content'           => 'admin/sejarah/edit'
        );
     
        return view('admin/layout/wrapper', $data);
    }

    // tambah
    public function tambah_proses(Request $request)
    {
           
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        request()->validate([
            'judul'      => 'required',
            'isi'      => 'required',
           
        ]);
        
            DB::table('sejarah')->insert([
                'id_user'           => Session()->get('id_user'),
                'judul'            => $request->judul,
                'isi'                => $request->isi,
                'urutan'            => $request->urutan
            ]);
       
            return redirect('admin/sejarah')->with(['sukses' => 'Data telah ditambah']);
     
            
    }

    // edit
    public function edit_proses(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        request()->validate([
            'judul'      => 'required',
            'isi'      => 'required',
           
        ]);
       
         
            DB::table('sejarah')->where('id_sejarah', $request->id_sejarah)->update([
                'id_user'           => Session()->get('id_user'),
                'judul'             => $request->judul,
                'isi'               => $request->isi,
                'urutan'            => $request->urutan
            ]);
       
            return redirect('admin/sejarah')->with(['sukses' => 'Data telah ditambah']);
           
    }

    // Delete
    public function delete($id_sejarah)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        DB::table('sejarah')->where('id_sejarah', $id_sejarah)->delete();
        return redirect('admin/sejarah')->with(['sukses' => 'Data telah dihapus']);
    }
}
