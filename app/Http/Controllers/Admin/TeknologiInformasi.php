<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Imports\TiImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\TeknologiInformasi_model;
class TeknologiInformasi extends Controller
{
    // Main page
    public function index()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myti            = new TeknologiInformasi_model();
        $ti              = $myti->semua();


        $data = array(
            'title'                => 'Data Prodi Teknologi Informasi',
            'ti'                  => $ti,
            'content'            => 'admin/teknologiinformasi/index'
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
        
        Excel::import(new TiImport, \public_path ('/Datadosen/'.$namaFile));  
       
         return redirect('admin/teknologiinformasi')->with(['sukses' => 'Data telah ditambah']);

    }
    

    // Cari
    public function cari(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myti          = new TeknologiInformasi_model();
        $keywords           = $request->keywords;
        $ti        =    $myti  ->cari($keywords);
       

        $data = array(
            'title'             => 'Data Prodi Ilmu Komputer',
            'ti'                => $ti,
            'content'           => 'admin/ilmukomputer/index'
        );
        return view('admin/layout/wrapper', $data);
    }
    

    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if (isset($_POST['hapus'])) {
            $id_tinya       = $request->id_ti;
            for ($i = 0; $i < sizeof( $id_tinya); $i++) {
                DB::table('teknologi_informasi')->where('id_ti',  $id_tinya [$i])->delete();
            }
            return redirect('admin/teknologiinformasi')->with(['sukses' => 'Data telah dihapus']);
            // PROSES SETTING DRAFT
        } elseif (isset($_POST['update'])) {
            $id_tinya       = $request->id_ti;
            for ($i = 0; $i < sizeof($id_tinya  ); $i++) {
                DB::table('teknologi_informasi')->where('id_ti', $id_tinya [$i])->update([
                    'id_user'               => Session()->get('id_user'),
                   
                ]);
            }
            return redirect('admin/teknologiinformasi')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }


    // // Tambah
    public function tambah()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $ti   = DB::table('teknologi_informasi')->get();

        $data = array(
            'title'             => 'Tambah Data Dosen',
            'ti'                 => $ti,
            'content'           => 'admin/teknologiinformasi/tambah'
        );
        return view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_ti)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myti         = new TeknologiInformasi_model();
        $ti             =  $myti->detail($id_ti);
    

        $data = array(
            'title'             => 'Edit Data Dosen',
            'ti'            =>  $ti,
            'content'           => 'admin/teknologiinformasi/edit'
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

        DB::table('teknologi_informasi')->insert([
            'id_user'                => Session()->get('id_user'),
            'nidn'                   => $request->nidn,
            'nik_nip'                => $request->nik_nip,
            'nama'                   => $request->nama,
            'email'                 => $request->email
        ]);
        return redirect('admin/teknologiinformasi')->with(['sukses' => 'Data telah ditambah']);
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
        
            DB::table('teknologi_informasi')->where('id_ti', $request->id_ti)->update([
                'id_user'                => Session()->get('id_user'),
                'nidn'                   => $request->nidn,
                'nik_nip'                => $request->nik_nip,
                'nama'                   => $request->nama,
                'email'                 => $request->email
            ]);
        

        return redirect('admin/teknologiinformasi')->with(['sukses' => 'Data telah ditambah']);
    }
    // Delete
    public function delete($id_ti)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        DB::table('teknologi_informasi')->where('id_ti', $id_ti)->delete();
        return redirect('admin/teknologiinformasi')->with(['sukses' => 'Data telah dihapus']);
    }
}
