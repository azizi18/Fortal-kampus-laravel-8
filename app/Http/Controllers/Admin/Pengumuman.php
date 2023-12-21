<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengumuman_model;



class Pengumuman extends Controller
{
    // Main page
    public function index()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        Paginator::useBootstrap();
        $mypengumuman   = new Pengumuman_model();
        $pengumuman   = $mypengumuman->pengumuman_update();
        $kategori     = DB::table('kategori_pengumuman')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'       => 'Data pengumuman',
            'pengumuman'      => $pengumuman,
            'pengumuman'      => $pengumuman,
            'kategori'    => $kategori,
            'content'     => 'admin/pengumuman/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    // Add
    public function add()
    {
        $data = array(
            'title'       => 'Data pengumuman'
        );
        return view('admin/pengumuman/add', $data);
    }

    // Cari
    public function cari(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mypengumuman         = new Pengumuman_model();
        $keywords           = $request->keywords;
        $pengumuman           = $mypengumuman->cari($keywords);
        $kategori           = DB::table('kategori_pengumuman')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'             => 'Data pengumuman',
            'pengumuman'            => $pengumuman,
            'kategori'   => $kategori,
            'content'           => 'admin/pengumuman/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site           = DB::table('konfigurasi')->first();
        $pengalihan     = $request->pengalihan;
        // PROSES HAPUS MULTIPLE
        if (isset($_POST['hapus'])) {
            $id_pengumumannya       = $request->id_pengumuman;
            for ($i = 0; $i < sizeof($id_pengumumannya); $i++) {
                DB::table('pengumuman')->where('id_pengumuman', $id_pengumumannya[$i])->delete();
            }
            return redirect($pengalihan)->with(['sukses' => 'Data telah dihapus']);
            // PROSES SETTING DRAFT
        } elseif (isset($_POST['draft'])) {
            $id_pengumumannya       = $request->id_pengumuman;
            for ($i = 0; $i < sizeof($id_pengumumannya); $i++) {
                DB::table('pengumuman')->where('id_pengumuman', $id_pengumumannya[$i])->update([
                    'id_user'       => Session()->get('id_user'),
                    'status_pengumuman' => 'Draft'
                ]);
            }
            return redirect($pengalihan)->with(['sukses' => 'Data telah diubah menjadi Draft']);
            // PROSES SETTING PUBLISH
        } elseif (isset($_POST['publish'])) {
            $id_pengumumannya       = $request->id_pengumuman;
            for ($i = 0; $i < sizeof($id_pengumumannya); $i++) {
                DB::table('pengumuman')->where('id_pengumuman', $id_pengumumannya[$i])->update([
                    'id_user'       => Session()->get('id_user'),
                    'status_pengumuman' => 'Publish'
                ]);
            }
            return redirect($pengalihan)->with(['sukses' => 'Data telah diubah menjadi Publish']);
        } elseif (isset($_POST['update'])) {
            $id_pengumumannya       = $request->id_pengumuman;
            for ($i = 0; $i < sizeof($id_pengumumannya); $i++) {
                DB::table('pengumuman')->where('id_pengumuman', $id_pengumumannya[$i])->update([
                    'id_user'        => Session()->get('id_user'),
                    'id_kategori'    => $request->id_kategori
                ]);
            }
            return redirect($pengalihan)->with(['sukses' => 'Data kategori telah diubah']);
        }
    }

    //Status
    public function status_pengumuman($status_pengumuman)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        Paginator::useBootstrap();
        $mypengumuman  = new Pengumuman_model();
        $pengumuman    = $mypengumuman->status_pengumuman($status_pengumuman);
        $kategori    = DB::table('kategori_pengumuman')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'             => 'Status pengumuman: ' . $status_pengumuman,
            'pengumuman'            => $pengumuman,
            'kategori'   => $kategori,
            'content'           => 'admin/pengumuman/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    //Status
    public function jenis_pengumuman($jenis_pengumuman)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        Paginator::useBootstrap();
        $mypengumuman  = new Pengumuman_model();
        $pengumuman    = $mypengumuman->jenis_pengumuman($jenis_pengumuman);
        $kategori    = DB::table('kategori_pengumuman')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'             => 'Jenis pengumuman: ' . $jenis_pengumuman,
            'pengumuman'            => $pengumuman,
            'kategori'   => $kategori,
            'content'           => 'admin/pengumuman/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    //Status
    public function author($id_user)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        Paginator::useBootstrap();
        $mypengumuman         = new Pengumuman_model();
        $pengumuman           = $mypengumuman->author($id_user);
        $kategori    = DB::table('kategori_pengumuman')->orderBy('urutan', 'ASC')->get();
        $author    = DB::table('users')->where('id_user', $id_user)->orderBy('id_user', 'ASC')->first();

        $data = array(
            'title'             => 'Data pengumuman dengan Penulis: ' . $author->nama,
            'pengumuman'            => $pengumuman,
            'kategori'   => $kategori,
            'content'           => 'admin/pengumuman/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    //Kategori
    public function kategori($id_kategori)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        Paginator::useBootstrap();
        $mypengumuman  = new Pengumuman_model();
        $pengumuman    = $mypengumuman->all_kategori($id_kategori);
        $kategori    = DB::table('kategori_pengumuman')->orderBy('urutan', 'ASC')->get();
        $detail      = DB::table('kategori_pengumuman')->where('id_kategori', $id_kategori)->first();
        $data = array(
            'title'             => 'Kategori: ' . $detail->nama_kategori,
            'pengumuman'            => $pengumuman,
            'kategori'   => $kategori,
            'content'           => 'admin/pengumuman/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    // Tambah
    public function tambah()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $kategori    = DB::table('kategori_pengumuman')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'             => 'Tambah pengumuman',
            'kategori'   => $kategori,
            'content'           => 'admin/pengumuman/tambah'
        );
        return view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_pengumuman)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mypengumuman         = new Pengumuman_model();
        $pengumuman           = $mypengumuman->detail($id_pengumuman);
        $kategori    = DB::table('kategori_pengumuman')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'             => 'Edit pengumuman',
            'pengumuman'            => $pengumuman,
            'kategori'   => $kategori,
            'content'           => 'admin/pengumuman/edit'
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
            'judul_pengumuman'  => 'required|unique:pengumuman',
            'isi'           => 'required',
            
        ]);
       
            $slug_pengumuman = Str::slug($request->judul_pengumuman, '-');
            DB::table('pengumuman')->insert([
                'id_kategori'       => $request->id_kategori,
                'id_user'           => Session()->get('id_user'),
                'slug_pengumuman'       => $slug_pengumuman,
                'judul_pengumuman'      => $request->judul_pengumuman,
                'isi'               => $request->isi,
                'jenis_pengumuman'      => $request->jenis_pengumuman,
                'status_pengumuman'      => $request->status_pengumuman,
                'tanggal_publish'   => date('Y-m-d', strtotime($request->tanggal_publish)),
                'urutan'            => $request->urutan,
                'tanggal_post'      => date('Y-m-d H:i:s')
            ]);
        
        
        if ($request->jenis_pengumuman == "pengumuman") {
            return redirect('admin/pengumuman')->with(['sukses' => 'Data telah ditambah']);
        } else {
            return redirect('admin/pengumuman/jenis_pengumuman/' . $request->jenis_pengumuman)->with(['sukses' => 'Data telah ditambah']);
        }
    }

    // edit
    public function edit_proses(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        request()->validate([
            'judul_pengumuman'   => 'required',
            'isi'           => 'required',
        ]);
       
            $slug_pengumuman = Str::slug($request->judul_pengumuman, '-');
            DB::table('pengumuman')->where('id_pengumuman', $request->id_pengumuman)->update([
                'id_kategori'       => $request->id_kategori,
                'id_user'           => Session()->get('id_user'),
                'slug_pengumuman'       => $slug_pengumuman,
                'judul_pengumuman'      => $request->judul_pengumuman,
                'isi'               => $request->isi,
                'jenis_pengumuman'      => $request->jenis_pengumuman,
                'status_pengumuman'      => $request->status_pengumuman,
                'tanggal_publish'   => date('Y-m-d', strtotime($request->tanggal_publish)),
                'urutan'            => $request->urutan
            ]);
       
        if ($request->jenis_pengumuman == "pengumuman") {
            return redirect('admin/pengumuman')->with(['sukses' => 'Data telah diupdate']);
        } else {
            return redirect('admin/pengumuman/jenis_pengumuman/' . $request->jenis_pengumuman)->with(['sukses' => 'Data telah diupdate']);
        }
    }

   
    

   

}

