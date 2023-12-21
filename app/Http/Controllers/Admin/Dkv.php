<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Models\Dkv_model;
use Illuminate\Http\Request;
use App\Imports\DkvImport;
use Maatwebsite\Excel\Facades\Excel;

class Dkv extends Controller
{
    // Main page
    public function index()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mydkv           = new Dkv_model();
        $dkv             =$mydkv->semua();
  
  
        $data = array(
            'title'                => 'Data Dosen Prodi D3 Desain Komunikasi Visual',
            'dkv'                  => $dkv,
            'content'            => 'admin/dkv/index'
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
        
        Excel::import(new DkvImport, \public_path ('/Datadosen/'.$namaFile));  
       
         return redirect('admin/dkv')->with(['sukses' => 'Data telah ditambah']);
  
    }
    
  
    // Cari
    public function cari(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mydkv          = new Dkv_model();
        $keywords         = $request->keywords;
        $dkv            =  $mydkv->cari($keywords);
       
  
        $data = array(
            'title'             => 'Data Dosen Prodi D3 RPL',
            'dkv'                => $dkv,
            'content'           => 'admin/dkv/index'
        );
        return view('admin/layout/wrapper', $data);
    }
    
  
    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if (isset($_POST['hapus'])) {
            $id_dkvnya       = $request->id_dkv;
            for ($i = 0; $i < sizeof( $id_dkvnya); $i++) {
                DB::table('dkv')->where('id_dkv',  $id_dkvnya [$i])->delete();
            }
            return redirect('admin/dkv')->with(['sukses' => 'Data telah dihapus']);
            // PROSES SETTING DRAFT
        } elseif (isset($_POST['update'])) {
            $id_dkvnya       = $request->id_dkv;
            for ($i = 0; $i < sizeof( $id_dkvnya); $i++) {
                DB::table('dkv')->where('id_dkv',  $id_dkvnya [$i])->update([
                    'id_user'               => Session()->get('id_user'),
                   
                ]);
            }
            return redirect('admin/dkv')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }
  
  
    // // Tambah
    public function tambah()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $dkv   = DB::table('dkv')->get();
  
        $data = array(
            'title'             => 'Tambah Data Dosen',
            'dkv'                 => $dkv,
            'content'           => 'admin/d3rpl/tambah'
        );
        return view('admin/layout/wrapper', $data);
    }
  
    // edit
    public function edit($id_dkv)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mydkv         = new Dkv_model();
        $dkv            =   $mydkv->detail($id_dkv);
    
  
        $data = array(
            'title'             => 'Edit Data Dosen',
            'dkv'            =>  $dkv,
            'content'           => 'admin/dkv/edit'
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
  
        DB::table('dkv')->insert([
            'id_user'                => Session()->get('id_user'),
            'nidn'                   => $request->nidn,
            'nik_nip'                => $request->nik_nip,
            'nama'                   => $request->nama,
            'email'                 => $request->email
        ]);
        return redirect('admin/dkv')->with(['sukses' => 'Data telah ditambah']);
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
        
            DB::table('dkv')->where('id_dkv', $request->id_dkv)->update([
                'id_user'                => Session()->get('id_user'),
                'nidn'                   => $request->nidn,
                'nik_nip'                => $request->nik_nip,
                'nama'                   => $request->nama,
                'email'                 => $request->email
            ]);
        
  
        return redirect('admin/dkv')->with(['sukses' => 'Data telah ditambah']);
    }
    // Delete
    public function delete($id_dkv)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        DB::table('dkv')->where('id_dkv', $id_dkv)->delete();
        return redirect('admin/dkv')->with(['sukses' => 'Data telah dihapus']);
    }
  }
