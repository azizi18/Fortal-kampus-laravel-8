<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Models\S1sastraInggris_model;
use Illuminate\Http\Request;
use App\Imports\S1sastraInggrisImport;
use Maatwebsite\Excel\Facades\Excel;

class S1sastraInggris extends Controller
{
    // Main page
    public function index()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mysastra           = new S1sastraInggris_model();
        $sastra             =$mysastra->semua();
  
  
        $data = array(
            'title'                => 'Data Dosen Prodi S1 Sastra Inggris',
            'sastra'                  => $sastra,
            'content'            => 'admin/s1sastrainggris/index'
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
        
        Excel::import(new S1sastraInggrisImport, \public_path ('/Datadosen/'.$namaFile));  
       
         return redirect('admin/s1sastrainggris')->with(['sukses' => 'Data telah ditambah']);
  
    }
    
  
    // Cari
    public function cari(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mysastra          = new S1sastraInggris_model();
        $keywords         = $request->keywords;
        $sastra            =  $mysastra ->cari($keywords);
       
  
        $data = array(
            'title'             => 'Data Dosen Prodi S1 Sastra Inggris',
            'sastra'                => $sastra,
            'content'           => 'admin/s1sastrainggris/index'
        );
        return view('admin/layout/wrapper', $data);
    }
    
  
    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if (isset($_POST['hapus'])) {
            $id_sastranya       = $request->id_sas;
            for ($i = 0; $i < sizeof( $id_sastranya); $i++) {
                DB::table('s1sastra_inggris')->where('id_sas',  $id_sastranya [$i])->delete();
            }
            return redirect('admin/s1sastrainggris')->with(['sukses' => 'Data telah dihapus']);
            // PROSES SETTING DRAFT
        } elseif (isset($_POST['update'])) {
            $id_sastranya       = $request->id_sas;
            for ($i = 0; $i < sizeof( $id_sastranya); $i++) {
                DB::table('s1sastra_inggris')->where('id_sas',  $id_sastranya [$i])->update([
                    'id_user'               => Session()->get('id_user'),
                   
                ]);
            }
            return redirect('admin/s1sastrainggris')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }
  
  
    // // Tambah
    public function tambah()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $sastra  = DB::table('s1sastra_inggris')->get();
  
        $data = array(
            'title'             => 'Tambah Data Dosen',
            'sastra'                 => $sastra,
            'content'           => 'admin/s1sastrainggris/tambah'
        );
        return view('admin/layout/wrapper', $data);
    }
  
    // edit
    public function edit($id_sas)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mysastra          = new S1sastraInggris_model();
        $sastra             =   $mysastra->detail($id_sas);
    
  
        $data = array(
            'title'             => 'Edit Data Dosen',
            'sastra'            => $sastra,
            'content'           => 'admin/s1sastrainggris/edit'
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
  
        DB::table('s1sastra_inggris')->insert([
            'id_user'                => Session()->get('id_user'),
            'nidn'                   => $request->nidn,
            'nik_nip'                => $request->nik_nip,
            'nama'                   => $request->nama,
            'email'                 => $request->email
        ]);
        return redirect('admin/s1sastrainggris')->with(['sukses' => 'Data telah ditambah']);
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
        
            DB::table('s1sastra_inggris')->where('id_sas', $request->id_sas)->update([
                'id_user'                => Session()->get('id_user'),
                'nidn'                   => $request->nidn,
                'nik_nip'                => $request->nik_nip,
                'nama'                   => $request->nama,
                'email'                 => $request->email
            ]);
        
  
        return redirect('admin/s1sastrainggris')->with(['sukses' => 'Data telah ditambah']);
    }
    // Delete
    public function delete($id_sas)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        DB::table('s1sastra_inggris')->where('id_sas', $id_sas)->delete();
        return redirect('admin/s1sastrainggris')->with(['sukses' => 'Data telah dihapus']);
    }
  }
