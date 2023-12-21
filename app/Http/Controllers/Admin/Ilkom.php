<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Imports\IlkomImport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Models\Ilkom_model;

class Ilkom extends Controller
{
    // Main page
    public function index()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myilkom            = new Ilkom_model();
        $ilkom              = $myilkom->semua();


        $data = array(
            'title'                => 'Data Prodi Ilmu Komputer',
            'ilkom'            => $ilkom,
            'content'            => 'admin/ilmukomputer/index'
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
        
        Excel::import(new IlkomImport, \public_path ('/Datadosen/'.$namaFile));  
       
         return redirect('admin/ilmukomputer')->with(['sukses' => 'Data telah ditambah']);

    }
    

    // Cari
    public function cari(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myilkom          = new Ilkom_model();
        $keywords           = $request->keywords;
        $ilkom         = $myilkom ->cari($keywords);
       

        $data = array(
            'title'             => 'Data Prodi Ilmu Komputer',
            'ilkom'            => $ilkom,
            'content'           => 'admin/ilmukomputer/index'
        );
        return view('admin/layout/wrapper', $data);
    }
    

    // // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if (isset($_POST['hapus'])) {
            $id_ilkomnya       = $request->id_fasilitas;
            for ($i = 0; $i < sizeof($id_ilkomnya); $i++) {
                DB::table('ilmu_komputer')->where('id_ilkom', $id_ilkomnya[$i])->delete();
            }
            return redirect('admin/ilmukomputer')->with(['sukses' => 'Data telah dihapus']);
            // PROSES SETTING DRAFT
        } elseif (isset($_POST['update'])) {
            $id_ilkomnya       = $request->id_galeri;
            for ($i = 0; $i < sizeof($id_ilkomnya); $i++) {
                DB::table('ilmu_komputer')->where('id_ilkom', $id_ilkomnya[$i])->update([
                    'id_user'               => Session()->get('id_user'),
                   
                ]);
            }
            return redirect('admin/fasilitas')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }


    // // Tambah
    public function tambah()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $ilkom   = DB::table('ilmu_komputer')->get();

        $data = array(
            'title'             => 'Tambah Data Dosen',
            'ilkom'          => $ilkom,
            'content'           => 'admin/ilmukomputer/tambah'
        );
        return view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_ilkom)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myilkom         = new Ilkom_model();
        $ilkom         = $myilkom->detail($id_ilkom);
    

        $data = array(
            'title'             => 'Edit Data Dosen',
            'ilkom'            =>  $ilkom,
            'content'           => 'admin/ilmukomputer/edit'
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

        DB::table('ilmu_komputer')->insert([
            'id_user'                => Session()->get('id_user'),
            'nidn'                   => $request->nidn,
            'nik_nip'                => $request->nik_nip,
            'nama'                   => $request->nama,
            'email'                 => $request->email
        ]);
        return redirect('admin/ilmukomputer')->with(['sukses' => 'Data telah ditambah']);
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
        
            DB::table('ilmu_komputer')->where('id_ilkom', $request->id_ilkom)->update([
                'id_user'                => Session()->get('id_user'),
                'nidn'                   => $request->nidn,
                'nik_nip'                => $request->nik_nip,
                'nama'                   => $request->nama,
                'email'                 => $request->email
            ]);
        

        return redirect('admin/ilmukomputer')->with(['sukses' => 'Data telah ditambah']);
    }
    // Delete
    public function delete($id_ilkom)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        DB::table('ilmu_komputer')->where('id_ilkom', $id_ilkom)->delete();
        return redirect('admin/ilmukomputer')->with(['sukses' => 'Data telah dihapus']);
    }
}
