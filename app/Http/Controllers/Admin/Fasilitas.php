<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Fasilitas_model;
use Illuminate\Support\Str;
use Image;

class Fasilitas extends Controller
{
    // Main page
    public function index()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myfasilitas             = new Fasilitas_model();
        $fasilitas               = $myfasilitas->semua();

        $data = array(
            'title'                => 'Data Fasilitas',
            'fasilitas'            => $fasilitas,
            'content'            => 'admin/fasilitas/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    // Cari
    public function cari(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myfasilitas          = new Fasilitas_model();
        $keywords           = $request->keywords;
        $fasilitas          = $myfasilitas->cari($keywords);

        $data = array(
            'title'             => 'Data Fasilitas',
            'fasilitas'            => $fasilitas,
            'content'           => 'admin/fasilitas/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if (isset($_POST['hapus'])) {
            $id_fasilitasnya       = $request->id_fasilitas;
            for ($i = 0; $i < sizeof($id_fasilitasnya); $i++) {
                DB::table('fasilitas')->where('id_fasilitas', $id_fasilitasnya[$i])->delete();
            }
            return redirect('admin/fasilitas')->with(['sukses' => 'Data telah dihapus']);
            // PROSES SETTING DRAFT
        } elseif (isset($_POST['update'])) {
            $id_fasilitasnya       = $request->id_galeri;
            for ($i = 0; $i < sizeof($id_fasilitasnya); $i++) {
                DB::table('fasilitas')->where('id_fasilitas', $id_fasilitasnya[$i])->update([
                    'id_user'               => Session()->get('id_user'),
                    'id_kategori_galeri'    => $request->id_kategori_galeri
                ]);
            }
            return redirect('admin/fasilitas')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }


    // Tambah
    public function tambah()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $kategori_galeri    = DB::table('kategori_galeri')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'             => 'Tambah Fasilitas',
            'kategori_galeri'   => $kategori_galeri,
            'content'           => 'admin/fasilitas/tambah'
        );
        return view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_fasilitas)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myfasilitas          = new Fasilitas_model();
        $fasilitas           = $myfasilitas->detail($id_fasilitas);

        $data = array(
            'title'             => 'Edit Fasilitas',
            'fasilitas'            => $fasilitas,
            'content'           => 'admin/fasilitas/edit'
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
            'judul_fasilitas'   => 'required',
            'isi'           => 'required',
            'gambar'        => 'required|file|image|mimes:jpeg,png,jpg|max:8024',
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
        // END UPLOAD

        DB::table('fasilitas')->insert([
            'id_user'               => Session()->get('id_user'),
            'id_user'               => Session()->get('id_user'),
            'judul_fasilitas'       => $request->judul_fasilitas,
            'isi'                   => $request->isi,
            'gambar'                => $input['nama_file'],
            'urutan'                => $request->urutan
        ]);
        return redirect('admin/fasilitas')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit_proses(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        request()->validate([
            'judul_fasilitas'   => 'required',
            'isi'           => 'required',
            'gambar'        => 'file|image|mimes:jpeg,png,jpg|max:8024',
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
            DB::table('fasilitas')->where('id_fasilitas', $request->id_fasilitas)->update([
                'id_user'           => Session()->get('id_user'),
                'judul_fasilitas'     => $request->judul_fasilitas,
                'isi'               => $request->isi,
                'gambar'            => $input['nama_file'],
                'urutan'            => $request->urutan
            ]);
        } else {

            DB::table('fasilitas')->where('id_fasilitas', $request->id_fasilitas)->update([
                'id_user'           => Session()->get('id_user'),
                'judul_fasilitas'      => $request->judul_fasilitas,
                'isi'               => $request->isi,
                'urutan'            => $request->urutan
            ]);
        }

        return redirect('admin/fasilitas')->with(['sukses' => 'Data telah diupdate']);
    }
    // Delete
    public function delete($id_fasilitas)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        DB::table('fasilitas')->where('id_fasilitas', $id_fasilitas)->delete();
        return redirect('admin/fasilitas')->with(['sukses' => 'Data telah dihapus']);
    }
}
