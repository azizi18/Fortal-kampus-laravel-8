<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;

class GambarStruktur extends Controller
{
    // Index
    public function index()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $gambar  = DB::table('gambar_struktur')->orderBy('id_gambar', 'DESC')->get();

        $data = array(
            'title'     => 'Data Gambar Struktur',
            'gambar'  => $gambar,
            'content'   => 'admin/gambar-struktur/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    // Edit
    public function edit($id_gambar)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $gambar   = DB::table('gambar_struktur')->where('id_gambar', $id_gambar)->orderBy('urutan', 'ASC')->first();

        $data = array(
            'title'     => 'Edit Data Gambar Struktur',
            'gambar'     => $gambar,
            'content'   => 'admin/gambar-struktur/edit'
        );
        return view('admin/layout/wrapper', $data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if (isset($_POST['hapus'])) {
            $id_gambarnya       = $request->id_gambar;
            for ($i = 0; $i < sizeof($id_gambarnya); $i++) {
                DB::table('gambar_struktur')->where('id_gambar', $id_gambarnya[$i])->delete();
            }
            return redirect('admin/gambar-struktur')->with(['sukses' => 'Data telah dihapus']);
            // PROSES SETTING DRAFT
        }
    }

    // tambah
    public function tambah(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        request()->validate([
            'urutan'     => 'required|unique:video',
            'gambar'    => 'file|image|mimes:jpeg,png,jpg|max:8024'
        ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
        $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $input['nama_file']     = Str::slug($filename, '-') . '-' . time() . '.' . $image->getClientOriginalExtension();
        $destinationPath        = './assets/upload/image/thumbs/';
        $img = Image::make($image->getRealPath(), array(
            'width'     => 150,
            'height'    => 150,
            'grayscale' => false
        ));
        $img->save($destinationPath . '/' . $input['nama_file']);
        $destinationPath = './assets/upload/image/';
        $image->move($destinationPath, $input['nama_file']);
            // UPLOAD START
            DB::table('gambar_struktur')->insert([
                'id_user'       => Session()->get('id_user'),
                'gambar'         => $input['nama_file'],
                'urutan'         => $request->urutan
                
               
            ]);
            return redirect('admin/gambar-struktur')->with(['sukses' => 'Data telah ditambah']);
        
    }

    // edit
    public function proses_edit(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        request()->validate([
            'urutan'     => 'required', 
            'gambar'    => 'file|image|mimes:jpeg,png,jpg|max:8024'
        ]);
         // UPLOAD START
         $image                  = $request->file('gambar');
         if (!empty($image)) {
             $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
             $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
             $input['nama_file']     = Str::slug($filename, '-') . '-' . time() . '.' . $image->getClientOriginalExtension();
             $destinationPath        = './assets/upload/image/thumbs/';
             $img = Image::make($image->getRealPath(), array(
                 'width'     => 150,
                 'height'    => 150,
                 'grayscale' => false
             ));
             $img->save($destinationPath . '/' . $input['nama_file']);
             $destinationPath = './assets/upload/image/';
             $image->move($destinationPath, $input['nama_file']);
             // END UPLOAD
            
            
            DB::table('gambar_struktur')->where('id_gambar', $request->id_gambar)->update([
                'id_user'       => Session()->get('id_user'),
                'gambar'                => $input['nama_file'],
                'urutan'         => $request->urutan
                
            ]);
        } else {
           
            DB::table('gambar_struktur')->where('id_gambar', $request->id_gambar)->update([
                'id_user'               => Session()->get('id_user'),
                'urutan'         => $request->urutan
            ]);
        }
            return redirect('admin/gambar-struktur')->with(['sukses' => 'Data telah diupdate']);
        
            
        
    }

    // Delete
    public function delete($id_gambar)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        DB::table('gambar_struktur')->where('id_gambar', $id_gambar)->delete();
        return redirect('admin/gambar-struktur')->with(['sukses' => 'Data telah dihapus']);
    }
}
