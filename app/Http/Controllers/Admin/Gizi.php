<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Models\Gizi_model;
use Illuminate\Http\Request;
use App\Imports\GiziImport;
use Maatwebsite\Excel\Facades\Excel;

class Gizi extends Controller
{
    // Main page
    public function index()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mygizi           = new Gizi_model();
        $gizi              = $mygizi->semua();
  
  
        $data = array(
            'title'                => 'Data Dosen Prodi Gizi',
            'gizi'                  =>   $gizi,
            'content'            => 'admin/gizi/index'
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
        
        Excel::import(new GiziImport, \public_path ('/Datadosen/'.$namaFile));  
       
         return redirect('admin/gizi')->with(['sukses' => 'Data telah ditambah']);
  
    }
    
  
    // Cari
    public function cari(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mygizi         = new Gizi_model();
        $keywords         = $request->keywords;
        $gizi            =  $mygizi->cari($keywords);
       
  
        $data = array(
            'title'             => 'Data Dosen Prodi Gizi',
            'gizi'                => $gizi,
            'content'           => 'admin/gizi/index'
        );
        return view('admin/layout/wrapper', $data);
    }
    
  
    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if (isset($_POST['hapus'])) {
            $id_gizinya       = $request->id_giz;
            for ($i = 0; $i < sizeof(  $id_gizinya); $i++) {
                DB::table('gizi')->where('id_giz',   $id_gizinya [$i])->delete();
            }
            return redirect('admin/gizi')->with(['sukses' => 'Data telah dihapus']);
            // PROSES SETTING DRAFT
        } elseif (isset($_POST['update'])) {
             $id_gizinya       = $request->id_giz;
            for ($i = 0; $i < sizeof(  $id_gizinya); $i++) {
                DB::table('gizi')->where('id_giz',   $id_gizinya [$i])->update([
                    'id_user'               => Session()->get('id_user'),
                   
                ]);
            }
            return redirect('admin/gizi')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }
  
  
    // // Tambah
    public function tambah()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $gizi   = DB::table('gizi')->get();
  
        $data = array(
            'title'             => 'Tambah Data Dosen',
            'gizi'                 => $gizi,
            'content'           => 'admin/gizi/tambah'
        );
        return view('admin/layout/wrapper', $data);
    }
  
    // edit
    public function edit($id_giz)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mygizi         = new Gizi_model();
        $gizi             =$mygizi->detail($id_giz);
    
  
        $data = array(
            'title'             => 'Edit Data Dosen',
            'gizi'            =>   $gizi,
            'content'           => 'admin/gizi/edit'
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
  
        DB::table('gizi')->insert([
            'id_user'                => Session()->get('id_user'),
            'nidn'                   => $request->nidn,
            'nik_nip'                => $request->nik_nip,
            'nama'                   => $request->nama,
            'email'                 => $request->email
        ]);
        return redirect('admin/gizi')->with(['sukses' => 'Data telah ditambah']);
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
        
            DB::table('gizi')->where('id_giz', $request->id_giz)->update([
                'id_user'                => Session()->get('id_user'),
                'nidn'                   => $request->nidn,
                'nik_nip'                => $request->nik_nip,
                'nama'                   => $request->nama,
                'email'                 => $request->email
            ]);
        
  
        return redirect('admin/gizi')->with(['sukses' => 'Data telah ditambah']);
    }
    // Delete
    public function delete($id_giz)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        DB::table('gizi')->where('id_giz', $id_giz)->delete();
        return redirect('admin/gizi')->with(['sukses' => 'Data telah dihapus']);
    }
  }
  
