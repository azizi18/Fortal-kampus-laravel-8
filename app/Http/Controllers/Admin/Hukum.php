<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Models\Hukum_model;
use Illuminate\Http\Request;
use App\Imports\HukumImport;
use Maatwebsite\Excel\Facades\Excel;

class Hukum extends Controller
{
    // Main page
    public function index()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myhukum          = new Hukum_model();
        $hukum             =$myhukum->semua();
  
  
        $data = array(
            'title'                => 'Data Dosen Prodi Hukum',
            'hukum'                  => $hukum,
            'content'            => 'admin/hukum/index'
        );
        return view('admin/layout/wrapper', $data);
    }
    
    public function import(Request $request){
  
        request()->validate([
            'file'        => 'required|mimes:csv,xls,xlsx',
            ]);
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('Datadosen', $namaFile);
        
        Excel::import(new HukumImport, \public_path ('/Datadosen/'.$namaFile));  
       
         return redirect('admin/hukum')->with(['sukses' => 'Data telah ditambah']);
  
    }
    
  
    // Cari
    public function cari(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myhukum          = new Hukum_model();
        $keywords         = $request->keywords;
        $hukum           =  $myhukum->cari($keywords);
       
  
        $data = array(
            'title'             => 'Data Dosen Prodi Hukum',
            'hukum'                => $hukum,
            'content'           => 'admin/hukum/index'
        );
        return view('admin/layout/wrapper', $data);
    }
    
  
    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if (isset($_POST['hapus'])) {
            $id_hukumnya       = $request->id_huk;
            for ($i = 0; $i < sizeof( $id_hukumnya); $i++) {
                DB::table('hukum')->where('id_huk',  $id_hukumnya [$i])->delete();
            }
            return redirect('admin/hukum')->with(['sukses' => 'Data telah dihapus']);
            // PROSES SETTING DRAFT
        } elseif (isset($_POST['update'])) {
            $id_hukumnya       = $request->id_huk;
            for ($i = 0; $i < sizeof( $id_hukumnya); $i++) {
                DB::table('hukum')->where('id_huk',  $id_hukumnya [$i])->update([
                    'id_user'               => Session()->get('id_user'),
                   
                ]);
            }
            return redirect('admin/hukum')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }
  
  
    // // Tambah
    public function tambah()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $hukum   = DB::table('hukum')->get();
  
        $data = array(
            'title'             => 'Tambah Data Dosen',
            'hukum'                 => $hukum,
            'content'           => 'admin/hukum/tambah'
        );
        return view('admin/layout/wrapper', $data);
    }
  
    // edit
    public function edit($id_huk)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myhukum        = new Hukum_model();
        $hukum            =   $myhukum->detail($id_huk);
    
  
        $data = array(
            'title'             => 'Edit Data Dosen',
            'hukum'            =>  $hukum,
            'content'           => 'admin/hukum/edit'
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
            'nidn'          => 'required',
            'nik_nip'        => 'required',
            'nama'           => 'required',
            'email'           => 'required'
        ]);
  
        DB::table('hukum')->insert([
            'id_user'                => Session()->get('id_user'),
            'nidn'                   => $request->nidn,
            'nik_nip'                => $request->nik_nip,
            'nama'                   => $request->nama,
            'email'                 => $request->email
        ]);
        return redirect('admin/hukum')->with(['sukses' => 'Data telah ditambah']);
    }
  
    // edit
    public function edit_proses(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        request()->validate([
            'nidn'          => 'required',
            'nik_nip'        => 'required',
            'nama'           => 'required',
            'email'           => 'required'
        ]);
        
            DB::table('hukum')->where('id_huk', $request->id_huk)->update([
                'id_user'                => Session()->get('id_user'),
                'nidn'                   => $request->nidn,
                'nik_nip'                => $request->nik_nip,
                'nama'                   => $request->nama,
                'email'                 => $request->email
            ]);
        
  
        return redirect('admin/hukum')->with(['sukses' => 'Data telah ditambah']);
    }
    // Delete
    public function delete($id_huk)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        DB::table('hukum')->where('id_huk', $id_huk)->delete();
        return redirect('admin/hukum')->with(['sukses' => 'Data telah dihapus']);
    }
  }
