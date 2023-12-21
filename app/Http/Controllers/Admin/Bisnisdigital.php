<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Models\Bisnis_model;
use Illuminate\Http\Request;
use App\Imports\BisnisImport;
use Maatwebsite\Excel\Facades\Excel;

class Bisnisdigital extends Controller
{
    // Main page
    public function index()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mybisnis           = new Bisnis_model();
        $bisnis              =$mybisnis->semua();
  
  
        $data = array(
            'title'                => 'Data Dosen Prodi  Bisnis Digital',
            'bisnis'                  => $bisnis,
            'content'            => 'admin/bisnisdigital/index'
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
        
        Excel::import(new BisnisImport, \public_path ('/Datadosen/'.$namaFile));  
       
         return redirect('admin/bisnisdigital')->with(['sukses' => 'Data telah ditambah']);
  
    }
    
  
    // Cari
    public function cari(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mybisnis         = new Bisnis_model();
        $keywords         = $request->keywords;
        $bisnis           =  $mybisnis->cari($keywords);
       
  
        $data = array(
            'title'             => 'Data Dosen Prodi Bisnis Digital',
            'bisnis'                => $bisnis,
            'content'           => 'admin/bisnisdigital/index'
        );
        return view('admin/layout/wrapper', $data);
    }
    
  
    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if (isset($_POST['hapus'])) {
            $id_bisnisnya       = $request->id_bis;
            for ($i = 0; $i < sizeof( $id_bisnisnya); $i++) {
                DB::table('bisnis_digital')->where('id_bis',  $id_bisnisnya [$i])->delete();
            }
            return redirect('admin/bisnisdigital')->with(['sukses' => 'Data telah dihapus']);
            // PROSES SETTING DRAFT
        } elseif (isset($_POST['update'])) {
            $id_bisnisnya       = $request->id_bis;
            for ($i = 0; $i < sizeof( $id_bisnisnya); $i++) {
                DB::table('bisinis_digital')->where('id_bis',  $id_bisnisnya [$i])->update([
                    'id_user'               => Session()->get('id_user'),
                   
                ]);
            }
            return redirect('admin/bisnisdigital')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }
  
  
    // // Tambah
    public function tambah()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $bisnis   = DB::table('bisnis_digital')->get();
  
        $data = array(
            'title'             => 'Tambah Data Dosen',
            'bisnis'                 => $bisnis,
            'content'           => 'admin/bisnisdigital/tambah'
        );
        return view('admin/layout/wrapper', $data);
    }
  
    // edit
    public function edit($id_bis)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mybisnis         = new Bisnis_model();
        $bisnis             =   $mybisnis->detail($id_bis);
    
  
        $data = array(
            'title'             => 'Edit Data Dosen',
            'bisnis'            =>  $bisnis,
            'content'           => 'admin/bisnisdigital/edit'
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
  
        DB::table('bisnis_digital')->insert([
            'id_user'                => Session()->get('id_user'),
            'nidn'                   => $request->nidn,
            'nik_nip'                => $request->nik_nip,
            'nama'                   => $request->nama,
            'email'                 => $request->email
        ]);
        return redirect('admin/bisnisdigital')->with(['sukses' => 'Data telah ditambah']);
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
        
            DB::table('bisnis_digital')->where('id_bis', $request->id_bis)->update([
                'id_user'                => Session()->get('id_user'),
                'nidn'                   => $request->nidn,
                'nik_nip'                => $request->nik_nip,
                'nama'                   => $request->nama,
                'email'                 => $request->email
            ]);
        
  
        return redirect('admin/bisnisdigital')->with(['sukses' => 'Data telah ditambah']);
    }
    // Delete
    public function delete($id_bis)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        DB::table('bisnis_digital')->where('id_bis', $id_bis)->delete();
        return redirect('admin/bisnisdigital')->with(['sukses' => 'Data telah dihapus']);
    }
  }
