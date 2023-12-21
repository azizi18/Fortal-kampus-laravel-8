<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pti_model;
use App\Imports\PtiImport;
use Maatwebsite\Excel\Facades\Excel;

class Pti extends Controller
{
    // Main page
    public function index()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mypti          = new Pti_model();
        $pti             =  $mypti->semua();
  
  
        $data = array(
            'title'                => 'Data Dosen Prodi Pendidikan Teknologi Informasi ',
            'pti'                  => $pti,
            'content'            => 'admin/pendidikanteknologi/index'
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
        
        Excel::import(new PtiImport, \public_path ('/Datadosen/'.$namaFile));  
       
         return redirect('admin/pendidikanteknologi')->with(['sukses' => 'Data telah ditambah']);
  
    }
    
  
    // Cari
    public function cari(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mypti        = new Pti_model();
        $keywords         = $request->keywords;
        $pti            =  $mypti->cari($keywords);
       
  
        $data = array(
            'title'             => 'Data Dosen Prodi Pendidikan Teknologi Informasi',
            'pti'                => $pti,
            'content'           => 'admin/pendidikanteknologi/index'
        );
        return view('admin/layout/wrapper', $data);
    }
    
  
    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if (isset($_POST['hapus'])) {
            $id_ptinya       = $request->id_rfl;
            for ($i = 0; $i < sizeof(  $id_ptinya); $i++) {
                DB::table('pti')->where('id_pti',  $id_ptinya [$i])->delete();
            }
            return redirect('admin/pendidikanteknologi')->with(['sukses' => 'Data telah dihapus']);
            // PROSES SETTING DRAFT
        } elseif (isset($_POST['update'])) {
            $id_ptinya        = $request->id_rpl;
            for ($i = 0; $i < sizeof(  $id_ptinya ); $i++) {
                DB::table('pti')->where('id_pti', $id_ptinya   [$i])->update([
                    'id_user'               => Session()->get('id_user'),
                   
                ]);
            }
            return redirect('admin/pendidikanteknologi')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }
  
  
    // // Tambah
    public function tambah()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $pti   = DB::table('pti')->get();
  
        $data = array(
            'title'             => 'Tambah Data Dosen',
            'pti'                 => $pti,
            'content'           => 'admin/pendidikanteknologi/tambah'
        );
        return view('admin/layout/wrapper', $data);
    }
  
    // edit
    public function edit($id_pti)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mypti         = new Pti_model();
        $pti             =   $mypti->detail($id_pti);
    
  
        $data = array(
            'title'             => 'Edit Data Dosen',
            'pti'            =>  $pti,
            'content'           => 'admin/pendidikanteknologi/edit'
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
  
        DB::table('pti')->insert([
            'id_user'                => Session()->get('id_user'),
            'nidn'                   => $request->nidn,
            'nik_nip'                => $request->nik_nip,
            'nama'                   => $request->nama,
            'email'                 => $request->email
        ]);
        return redirect('admin/pendidikanteknologi')->with(['sukses' => 'Data telah ditambah']);
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
        
            DB::table('pti')->where('id_pti', $request->id_pti)->update([
                'id_user'                => Session()->get('id_user'),
                'nidn'                   => $request->nidn,
                'nik_nip'                => $request->nik_nip,
                'nama'                   => $request->nama,
                'email'                 => $request->email
            ]);
        
  
        return redirect('admin/pendidikanteknologi')->with(['sukses' => 'Data telah ditambah']);
    }
    // Delete
    public function delete($id_pti)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        DB::table('pti')->where('id_pti', $id_pti)->delete();
        return redirect('admin/pendidikanteknologi')->with(['sukses' => 'Data telah dihapus']);
    }
  }
