<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Farmasi_model;
use App\Imports\FaramsiImport;
use Maatwebsite\Excel\Facades\Excel;

class Farmasi extends Controller
{
    // Main page
    public function index()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myfarm           = new Farmasi_model();
        $farmasi              =$myfarm->semua();
  
  
        $data = array(
            'title'                => 'Data Dosen Prodi Farmasi',
            'farmasi'                  => $farmasi,
            'content'            => 'admin/farmasi/index'
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
        
        Excel::import(new FaramsiImport, \public_path ('/Datadosen/'.$namaFile));  
       
         return redirect('admin/farmasi')->with(['sukses' => 'Data telah ditambah']);
  
    }
    
  
    // Cari
    public function cari(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myfarm          = new Farmasi_model();
        $keywords         = $request->keywords;
        $farmasi            =   $myfarm->cari($keywords);
       
  
        $data = array(
            'title'             => 'Data Dosen Prodi Farmasi',
            'farmasi'                => $farmasi,
            'content'           => 'admin/farmasi/index'
        );
        return view('admin/layout/wrapper', $data);
    }
    
  
    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if (isset($_POST['hapus'])) {
            $id_farmnya       = $request->id_rfl;
            for ($i = 0; $i < sizeof($id_farmnya); $i++) {
                DB::table('farmasi')->where('id_farm', $id_farmnya [$i])->delete();
            }
            return redirect('admin/farmasi')->with(['sukses' => 'Data telah dihapus']);
            // PROSES SETTING DRAFT
        } elseif (isset($_POST['update'])) {
           $id_farmnya       = $request->id_rpl;
            for ($i = 0; $i < sizeof($id_farmnya); $i++) {
                DB::table('farmasi')->where('id_farm', $id_farmnya [$i])->update([
                    'id_user'               => Session()->get('id_user'),
                   
                ]);
            }
            return redirect('admin/farmasi')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }
  
  
    // // Tambah
    public function tambah()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $farmasi   = DB::table('farmasi')->get();
  
        $data = array(
            'title'             => 'Tambah Data Dosen',
            'farmasi'                 => $farmasi,
            'content'           => 'admin/farmasi/tambah'
        );
        return view('admin/layout/wrapper', $data);
    }
  
    // edit
    public function edit($id_farm)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myfarm        = new Farmasi_model();
        $farmasi            =    $myfarm ->detail($id_farm);
    
  
        $data = array(
            'title'             => 'Edit Data Dosen',
            'farmasi'            =>  $farmasi,
            'content'           => 'admin/farmasi/edit'
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
  
        DB::table('farmasi')->insert([
            'id_user'                => Session()->get('id_user'),
            'nidn'                   => $request->nidn,
            'nik_nip'                => $request->nik_nip,
            'nama'                   => $request->nama,
            'email'                 => $request->email
        ]);
        return redirect('admin/farmasi')->with(['sukses' => 'Data telah ditambah']);
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
        
            DB::table('farmasi')->where('id_farm', $request->id_farm)->update([
                'id_user'                => Session()->get('id_user'),
                'nidn'                   => $request->nidn,
                'nik_nip'                => $request->nik_nip,
                'nama'                   => $request->nama,
                'email'                 => $request->email
            ]);
        
  
        return redirect('admin/farmasi')->with(['sukses' => 'Data telah ditambah']);
    }
    // Delete
    public function delete($id_farm)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        DB::table('farmasi')->where('id_farm', $id_farm)->delete();
        return redirect('admin/farmasi  ')->with(['sukses' => 'Data telah dihapus']);
    }
  }
