<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Teknopang_model;
use App\Imports\TeknopangImport;
use Maatwebsite\Excel\Facades\Excel;

class TeknologiPangan extends Controller
{
    // Main page
    public function index()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myteknopang           = new Teknopang_model();
        $teknopang                    = $myteknopang->semua();
  
  
        $data = array(
            'title'                => 'Data Dosen Prodi Teknologi pangan',
            'teknopang'                  => $teknopang,
            'content'            => 'admin/teknologipangan/index'
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
        
        Excel::import(new TeknopangImport, \public_path ('/Datadosen/'.$namaFile));  
       
         return redirect('admin/teknologipangan')->with(['sukses' => 'Data telah ditambah']);
  
    }
    
  
    // Cari
    public function cari(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myteknopang          = new Teknopang_model();
        $keywords         = $request->keywords;
        $teknopang            =   $myteknopang->cari($keywords);
       
  
        $data = array(
            'title'             => 'Data Dosen Prodi Teknologi Pangan',
            'teknopang'          => $teknopang,
            'content'           => 'admin/teknologipangan/index'
        );
        return view('admin/layout/wrapper', $data);
    }
    
  
    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if (isset($_POST['hapus'])) {
            $id_tekonpangnya       = $request->id_tp;
            for ($i = 0; $i < sizeof( $id_tekonpangnya); $i++) {
                DB::table('teknologi_pangan')->where('id_tp', $id_tekonpangnya [$i])->delete();
            }
            return redirect('admin/teknologipangan')->with(['sukses' => 'Data telah dihapus']);
            // PROSES SETTING DRAFT
        } elseif (isset($_POST['update'])) {
            $id_tekonpangnya      = $request->id_rpl;
            for ($i = 0; $i < sizeof( $id_tekonpangnya); $i++) {
                DB::table('teknologi_pangan')->where('id_tp',  $id_tekonpangnya [$i])->update([
                    'id_user'               => Session()->get('id_user'),
                   
                ]);
            }
            return redirect('admin/teknologipangan')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }
  
  
    // // Tambah
    public function tambah()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $teknopang   = DB::table('teknologi_pangan')->get();
  
        $data = array(
            'title'             => 'Tambah Data Dosen',
            'teknopang'         =>  $teknopang,
            'content'           => 'admin/teknologipangan/tambah'
        );
        return view('admin/layout/wrapper', $data);
    }
  
    // edit
    public function edit($id_tp)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $teknopangnya         = new Teknopang_model();
        $teknopang             =  $teknopangnya->detail($id_tp);
    
  
        $data = array(
            'title'             => 'Edit Data Dosen',
            'teknopang'            =>   $teknopang,
            'content'           => 'admin/teknologipangan/edit'
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
  
        DB::table('teknologi_pangan')->insert([
            'id_user'                => Session()->get('id_user'),
            'nidn'                   => $request->nidn,
            'nik_nip'                => $request->nik_nip,
            'nama'                   => $request->nama,
            'email'                 => $request->email
        ]);
        return redirect('admin/teknologipangan')->with(['sukses' => 'Data telah ditambah']);
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
        
            DB::table('teknologi_pangan')->where('id_tp', $request->id_tp)->update([
                'id_user'                => Session()->get('id_user'),
                'nidn'                   => $request->nidn,
                'nik_nip'                => $request->nik_nip,
                'nama'                   => $request->nama,
                'email'                 => $request->email
            ]);
        
  
        return redirect('admin/teknologipangan')->with(['sukses' => 'Data telah ditambah']);
    }
    // Delete
    public function delete($id_tp)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        DB::table('teknologi_pangan')->where('id_tp', $id_tp)->delete();
        return redirect('admin/teknologipangan')->with(['sukses' => 'Data telah dihapus']);
    }
  }
