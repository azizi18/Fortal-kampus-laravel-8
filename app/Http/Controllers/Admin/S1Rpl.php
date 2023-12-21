<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\S1Rpl_model;
use App\Imports\S1RplImport;
use Maatwebsite\Excel\Facades\Excel;

class S1Rpl extends Controller
{
    // Main page
    public function index()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myrpl           = new S1Rpl_model();
        $rpl              =$myrpl->semua();
  
  
        $data = array(
            'title'                => 'Data Dosen Prodi S1 RPL',
            'rpl'                  => $rpl,
            'content'            => 'admin/s1rpl/index'
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
        
        Excel::import(new S1RplImport, \public_path ('/Datadosen/'.$namaFile));  
       
         return redirect('admin/s1rpl')->with(['sukses' => 'Data telah ditambah']);
  
    }
    
  
    // Cari
    public function cari(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myrpl          = new S1Rpl_model();
        $keywords         = $request->keywords;
        $rpl            =  $myrpl ->cari($keywords);
       
  
        $data = array(
            'title'             => 'Data Dosen Prodi S1 RPL',
            'rpl'                => $rpl,
            'content'           => 'admin/s1rpl/index'
        );
        return view('admin/layout/wrapper', $data);
    }
    
  
    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if (isset($_POST['hapus'])) {
            $id_rplnya       = $request->id_rfl;
            for ($i = 0; $i < sizeof( $id_rplnya); $i++) {
                DB::table('s1_rpl')->where('id_rpl',  $id_rplnya [$i])->delete();
            }
            return redirect('admin/s1rpl')->with(['sukses' => 'Data telah dihapus']);
            // PROSES SETTING DRAFT
        } elseif (isset($_POST['update'])) {
            $id_rplnya       = $request->id_rpl;
            for ($i = 0; $i < sizeof( $id_rplnya); $i++) {
                DB::table('s1_rpl')->where('id_rpl',  $id_rplnya [$i])->update([
                    'id_user'               => Session()->get('id_user'),
                   
                ]);
            }
            return redirect('admin/s1rpl')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }
  
  
    // // Tambah
    public function tambah()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $ti   = DB::table('d3_rpl')->get();
  
        $data = array(
            'title'             => 'Tambah Data Dosen',
            'ti'                 => $ti,
            'content'           => 'admin/s1rpl/tambah'
        );
        return view('admin/layout/wrapper', $data);
    }
  
    // edit
    public function edit($id_rpl)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myrpl         = new S1Rpl_model();
        $rpl             =   $myrpl->detail($id_rpl);
    
  
        $data = array(
            'title'             => 'Edit Data Dosen',
            'rpl'            =>  $rpl,
            'content'           => 'admin/s1rpl/edit'
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
  
        DB::table('s1_rpl')->insert([
            'id_user'                => Session()->get('id_user'),
            'nidn'                   => $request->nidn,
            'nik_nip'                => $request->nik_nip,
            'nama'                   => $request->nama,
            'email'                 => $request->email
        ]);
        return redirect('admin/s1rpl')->with(['sukses' => 'Data telah ditambah']);
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
        
            DB::table('s1_rpl')->where('id_rpl', $request->id_rpl)->update([
                'id_user'                => Session()->get('id_user'),
                'nidn'                   => $request->nidn,
                'nik_nip'                => $request->nik_nip,
                'nama'                   => $request->nama,
                'email'                 => $request->email
            ]);
        
  
        return redirect('admin/s1rpl')->with(['sukses' => 'Data telah ditambah']);
    }
    // Delete
    public function delete($id_rpl)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        DB::table('s1_rpl')->where('id_rpl', $id_rpl)->delete();
        return redirect('admin/s1rpl')->with(['sukses' => 'Data telah dihapus']);
    }
  }
