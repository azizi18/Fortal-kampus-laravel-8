<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Models\Akuntansi_model;
use Illuminate\Http\Request;
use App\Imports\AkuntansiImport;
use Maatwebsite\Excel\Facades\Excel;

class Akuntansi extends Controller
{
    // Main page
    public function index()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myakuntansi           = new Akuntansi_model();
        $akuntansi               =$myakuntansi ->semua();
  
  
        $data = array(
            'title'                => 'Data Dosen Prodi Akuntansi ',
            'akuntansi'           => $akuntansi,
            'content'            => 'admin/akuntansi/index'
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
        
        Excel::import(new AkuntansiImport, \public_path ('/Datadosen/'.$namaFile));  
       
         return redirect('admin/akuntansi')->with(['sukses' => 'Data telah ditambah']);
  
    }
    
  
    // Cari
    public function cari(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myakuntansi          = new Akuntansi_model();
        $keywords         = $request->keywords;
        $akuntansi            =  $myakuntansi ->cari($keywords);
       
  
        $data = array(
            'title'             => 'Data Dosen Prodi D3 Akuntansi',
            'akuntansi'          => $akuntansi,
            'content'           => 'admin/akuntansi/index'
        );
        return view('admin/layout/wrapper', $data);
    }
    
  
    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if (isset($_POST['hapus'])) {
            $id_akuntansinya       = $request->id_aku;
            for ($i = 0; $i < sizeof( $id_akuntansinya); $i++) {
                DB::table('akuntansi  ')->where('id_aku',  $id_akuntansinya [$i])->delete();
            }
            return redirect('admin/akuntansi')->with(['sukses' => 'Data telah dihapus']);
            // PROSES SETTING DRAFT
        } elseif (isset($_POST['update'])) {
            $id_akuntansinya       = $request->id_aku;
            for ($i = 0; $i < sizeof( $id_akuntansinya); $i++) {
                DB::table('akuntansi')->where('id_aku',  $id_akuntansinya [$i])->update([
                    'id_user'               => Session()->get('id_user'),
                   
                ]);
            }
            return redirect('admin/akuntansi')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }
  
  
    // // Tambah
    public function tambah()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $akuntansi    = DB::table('d3_rpl')->get();
  
        $data = array(
            'title'             => 'Tambah Data Dosen',
            'akuntansi'          => $akuntansi,
            'content'           => 'admin/akuntansi/tambah'
        );
        return view('admin/layout/wrapper', $data);
    }
  
    // edit
    public function edit($id_aku)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myakuntansi         = new Akuntansi_model();
        $akuntansi             =   $myakuntansi->detail($id_aku);
    
  
        $data = array(
            'title'             => 'Edit Data Dosen',
            'akuntansi'            => $akuntansi,
            'content'           => 'admin/akuntansi/edit'
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
  
        DB::table('akuntansi')->insert([
            'id_user'                => Session()->get('id_user'),
            'nidn'                   => $request->nidn,
            'nik_nip'                => $request->nik_nip,
            'nama'                   => $request->nama,
            'email'                 => $request->email
        ]);
        return redirect('admin/akuntansi')->with(['sukses' => 'Data telah ditambah']);
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
        
            DB::table('akuntansi')->where('id_aku', $request->id_aku)->update([
                'id_user'                => Session()->get('id_user'),
                'nidn'                   => $request->nidn,
                'nik_nip'                => $request->nik_nip,
                'nama'                   => $request->nama,
                'email'                 => $request->email
            ]);
        
  
        return redirect('admin/akuntansi')->with(['sukses' => 'Data telah ditambah']);
    }
    // Delete
    public function delete($id_aku)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        DB::table('akuntansi')->where('id_aku', $id_aku)->delete();
        return redirect('admin/akuntansi')->with(['sukses' => 'Data telah dihapus']);
    }
  }
