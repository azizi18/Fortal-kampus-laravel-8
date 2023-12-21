<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Models\Manajemen_model;
use Illuminate\Http\Request;
use App\Imports\ManajemenImport;
use Maatwebsite\Excel\Facades\Excel;

class Manajemen extends Controller
{
    // Main page
    public function index()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mymanajemen           = new Manajemen_model();
        $manajemen                 =  $mymanajemen ->semua();
  
  
        $data = array(
            'title'                => 'Data Dosen Prodi Manajemen',
            'manajemen'              => $manajemen,
            'content'                => 'admin/manajemen/index'
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
        
        Excel::import(new ManajemenImport, \public_path ('/Datadosen/'.$namaFile));  
       
         return redirect('admin/manajemen')->with(['sukses' => 'Data telah ditambah']);
  
    }
    
  
    // Cari
    public function cari(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mymanajemen         = new Manajemen_model();
        $keywords         = $request->keywords;
        $manajemen            =  $mymanajemen ->cari($keywords);
       
  
        $data = array(
            'title'             => 'Data Dosen Prodi Manajemen',
            'manajemen'          => $manajemen,
            'content'           => 'admin/manajemen/index'
        );
        return view('admin/layout/wrapper', $data);
    }
    
  
    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if (isset($_POST['hapus'])) {
            $id_manajemennya       = $request->id_man;
            for ($i = 0; $i < sizeof( $id_manajemennya); $i++) {
                DB::table('manajemen')->where('id_man',  $id_manajemennya [$i])->delete();
            }
            return redirect('admin/d3rpl')->with(['sukses' => 'Data telah dihapus']);
            // PROSES SETTING DRAFT
        } elseif (isset($_POST['update'])) {
            $id_manajemennya       = $request->id_man;
            for ($i = 0; $i < sizeof( $id_manajemennya); $i++) {
                DB::table('manajemen')->where('id_man',  $id_manajemennya [$i])->update([
                    'id_user'               => Session()->get('id_user'),
                   
                ]);
            }
            return redirect('admin/manajemen')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }
  
  
    // // Tambah
    public function tambah()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $manajemen   = DB::table('manajemen')->get();
  
        $data = array(
            'title'             => 'Tambah Data Dosen',
            'manajemen'          => $manajemen,
            'content'           => 'admin/manajemen/tambah'
        );
        return view('admin/layout/wrapper', $data);
    }
  
    // edit
    public function edit($id_man)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mymanajemen         = new Manajemen_model();
        $manajemen             =   $mymanajemen->detail($id_man);
    
  
        $data = array(
            'title'             => 'Edit Data Dosen',
            'manajemen'            =>  $manajemen,
            'content'           => 'admin/manajemen/edit'
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
  
        DB::table('manajemen')->insert([
            'id_user'                => Session()->get('id_user'),
            'nidn'                   => $request->nidn,
            'nik_nip'                => $request->nik_nip,
            'nama'                   => $request->nama,
            'email'                 => $request->email
        ]);
        return redirect('admin/manajemen')->with(['sukses' => 'Data telah ditambah']);
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
        
            DB::table('manajemen')->where('id_man', $request->id_man)->update([
                'id_user'                => Session()->get('id_user'),
                'nidn'                   => $request->nidn,
                'nik_nip'                => $request->nik_nip,
                'nama'                   => $request->nama,
                'email'                 => $request->email
            ]);
        
  
        return redirect('admin/manajemen')->with(['sukses' => 'Data telah ditambah']);
    }
    // Delete
    public function delete($id_man)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        DB::table('manajemen')->where('id_man', $id_man)->delete();
        return redirect('admin/manajemen')->with(['sukses' => 'Data telah dihapus']);
    }
  }
