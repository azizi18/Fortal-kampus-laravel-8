<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SistemInformasi_model;
use App\Imports\SiImport;
use Maatwebsite\Excel\Facades\Excel;

class SistemInformasi extends Controller
{
    // Main page
    public function index()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mysistem           = new SistemInformasi_model();
        $sistem              =$mysistem->semua();
  
  
        $data = array(
            'title'                => 'Data Dosen Prodi Sistem Informasi',
            'sistem'                  => $sistem ,
            'content'            => 'admin/sisteminformasi/index'
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
        
        Excel::import(new SiImport, \public_path ('/Datadosen/'.$namaFile));  
       
         return redirect('admin/sisteminformasi')->with(['sukses' => 'Data telah ditambah']);
  
    }
    
  
    // Cari
    public function cari(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mysistem          = new SistemInformasi_model();
        $keywords         = $request->keywords;
        $sistem            =    $mysistem   ->cari($keywords);
       
  
        $data = array(
            'title'             => 'Data Dosen Prodi Sistem Informasi ',
            'sistem'                => $sistem,
            'content'           => 'admin/sisteminformasi/index'
        );
        return view('admin/layout/wrapper', $data);
    }
    
  
    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if (isset($_POST['hapus'])) {
            $id_sistemnya       = $request->id_rfl;
            for ($i = 0; $i < sizeof( $id_sistemnya); $i++) {
                DB::table('sistem_informasi')->where('id_si',   $id_sistemnya [$i])->delete();
            }
            return redirect('admin/sisteminformasi')->with(['sukses' => 'Data telah dihapus']);
            // PROSES SETTING DRAFT
        } elseif (isset($_POST['update'])) {
            $id_sistemnya       = $request->id_rpl;
            for ($i = 0; $i < sizeof(  $id_sistemnya); $i++) {
                DB::table('sistem_informasi')->where('id_si',    $id_sistemnya [$i])->update([
                    'id_user'               => Session()->get('id_user'),
                   
                ]);
            }
            return redirect('admin/sisteminformasi')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }
  
  
    // // Tambah
    public function tambah()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $ti   = DB::table('sistem_informasi')->get();
  
        $data = array(
            'title'             => 'Tambah Data Dosen',
            'ti'                 => $ti,
            'content'           => 'admin/sisteminformasi/tambah'
        );
        return view('admin/layout/wrapper', $data);
    }
  
    // edit
    public function edit($id_si)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mysistem         = new SistemInformasi_model();
        $sistem             =   $mysistem->detail($id_si);
    
  
        $data = array(
            'title'             => 'Edit Data Dosen',
            'sistem'            =>   $sistem,
            'content'           => 'admin/sisteminformasi/edit'
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
  
        DB::table('d3_rpl')->insert([
            'id_user'                => Session()->get('id_user'),
            'nidn'                   => $request->nidn,
            'nik_nip'                => $request->nik_nip,
            'nama'                   => $request->nama,
            'email'                 => $request->email
        ]);
        return redirect('admin/sisteminformasi')->with(['sukses' => 'Data telah ditambah']);
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
        
            DB::table('sistem_informasi')->where('id_si', $request->id_si)->update([
                'id_user'                => Session()->get('id_user'),
                'nidn'                   => $request->nidn,
                'nik_nip'                => $request->nik_nip,
                'nama'                   => $request->nama,
                'email'                 => $request->email
            ]);
        
  
        return redirect('admin/sisteminformasi')->with(['sukses' => 'Data telah ditambah']);
    }
    // Delete
    public function delete($id_si)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        DB::table('sistem_informasi')->where('id_si', $id_si)->delete();
        return redirect('admin/sisteminformasi')->with(['sukses' => 'Data telah dihapus']);
    }
  }
