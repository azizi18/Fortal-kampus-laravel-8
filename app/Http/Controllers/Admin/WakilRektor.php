<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;
use App\Models\Wakilrektor_model;

class WakilRektor extends Controller
{
    // Main page
    public function index()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mystaff             = new Wakilrektor_model();
        $staff             = $mystaff->semua();
        $kategori_staff     = DB::table('kategori_staff')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'                => 'Data Struktur Organisasi Wakil Rektor',
            'staff'            => $staff,
            'kategori_staff'    => $kategori_staff,
            'content'            => 'admin/wakilrektor/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    // Main page
    public function detail($id_staff)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mystaff        = new Wakilrektor_model();
        $staff          = $mystaff->detail($id_staff);

        $data = array(
            'title'             => $staff->nama_staff,
            'staff'             => $staff,
            'content'           => 'admin/wakilrektor/detail'
        );
        return view('admin/layout/wrapper', $data);
    }

    // Cari
    public function cari(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mystaff           = new Wakilrektor_model();
        $keywords           = $request->keywords;
        $staff             = $mystaff->cari($keywords);
        $kategori_staff    = DB::table('kategori_staff')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'             => 'Data Struktur Organisasi Wakil Rektor',
            'staff'            => $staff,
            'kategori_staff'   => $kategori_staff,
            'content'           => 'admin/wakilrektor/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if (isset($_POST['hapus'])) {
            $id_staffnya       = $request->id_staff;
            for ($i = 0; $i < sizeof($id_staffnya); $i++) {
                DB::table('staff')->where('id_staff', $id_staffnya[$i])->delete();
            }
            return redirect('admin/wakilrektor')->with(['sukses' => 'Data telah dihapus']);
            // PROSES SETTING DRAFT
        } elseif (isset($_POST['update'])) {
            $id_staffnya       = $request->id_staff;
            for ($i = 0; $i < sizeof($id_staffnya); $i++) {
                DB::table('staff')->where('id_staff', $id_staffnya[$i])->update([
                    'id_user'               => Session()->get('id_user'),
                    'id_kategori_staff'    => $request->id_kategori_staff
                ]);
            }
            return redirect('admin/wakilrektor')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }

    //Status
    public function status_staff($status_staff)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mystaff           = new Wakilrektor_model();
        $staff             = $mystaff->status_staff($status_staff);
        $kategori_staff    = DB::table('kategori_staff')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'             => 'Data Struktur Organisasi Kepala Program Studi',
            'staff'            => $staff,
            'kategori_staff'   => $kategori_staff,
            'content'           => 'admin/wakilrektor/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    

    // Tambah
    public function tambah()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $kategori_staff    = DB::table('kategori_staff')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'             => 'Tambah Struktur Organisasi Kepala Program Studi',
            'kategori_staff'   => $kategori_staff,
            'content'           => 'admin/wakilrektor/tambah'
        );
        return view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_staff)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mystaff           = new Wakilrektor_model();
        $staff             = $mystaff->detail($id_staff);
        $kategori_staff    = DB::table('kategori_staff')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'             => 'Edit Struktur Organisasi Kepala Program Studi',
            'staff'            => $staff,
            'kategori_staff'   => $kategori_staff,
            'content'           => 'admin/wakilrektor/edit'
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
            'nama_staff'  => 'required|unique:staff',
            'gambar'        => 'required|file|image|mimes:jpeg,png,jpg|max:8024',
        ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        if (!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = Str::slug($filename, '-') . '-' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath        = './assets/upload/staff/thumbs/';
            $img = Image::make($image->getRealPath(), array(
                'width'     => 150,
                'height'    => 150,
                'grayscale' => false
            ));
            $img->save($destinationPath . '/' . $input['nama_file']);
            $destinationPath = './assets/upload/staff/';
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
            $slug_staff = Str::slug($request->nama_staff . '-' . $request->jabatan, '-');
            DB::table('wakilrektor_staff')->insert([
                'id_user'               => Session()->get('id_user'),
                'nama_staff'            => $request->nama_staff,
                'slug_staff'            => $slug_staff,
                'nik'                    => $request->nik,
                'jabatan'               => $request->jabatan,
                'gambar'                => $input['nama_file'],
                'status_staff'          => $request->status_staff,
                'urutan'                => $request->urutan
            ]);
        } else {
            $slug_staff = Str::slug($request->nama_staff . '-' . $request->jabatan, '-');
            DB::table('wakilrektor_staff')->insert([
                'id_user'               => Session()->get('id_user'),
                'nama_staff'            => $request->nama_staff,
                'slug_staff'            => $slug_staff,
                'nik'                    => $request->nik,
                'jabatan'               => $request->jabatan,
                'status_staff'          => $request->status_staff,
                'urutan'                => $request->urutan
            ]);
        }
        return redirect('admin/wakilrektor')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit_proses(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        request()->validate([
            'nama_staff'  => 'required',
            'gambar'        => 'file|image|mimes:jpeg,png,jpg|max:8024',
        ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        if (!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = Str::slug($filename, '-') . '-' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath        = './assets/upload/staff/thumbs/';
            $img = Image::make($image->getRealPath(), array(
                'width'     => 150,
                'height'    => 150,
                'grayscale' => false
            ));
            $img->save($destinationPath . '/' . $input['nama_file']);
            $destinationPath = './assets/upload/staff/';
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
            $slug_staff = Str::slug($request->nama_staff . '-' . $request->jabatan, '-');
            DB::table('wakilrektor_staff')->where('id_staff', $request->id_staff)->update([
                'id_user'               => Session()->get('id_user'),
                'nama_staff'            => $request->nama_staff,
                'slug_staff'            => $slug_staff,
                'nik'                    => $request->nik,
                'jabatan'               => $request->jabatan,
                'gambar'                => $input['nama_file'],
                'status_staff'          => $request->status_staff,
                'urutan'                => $request->urutan
            ]);
        } else {
            $slug_staff = Str::slug($request->nama_staff . '-' . $request->jabatan, '-');
            DB::table('wakilrektor_staff')->where('id_staff', $request->id_staff)->update([
                'id_user'               => Session()->get('id_user'),
                'nama_staff'            => $request->nama_staff,
                'slug_staff'            => $slug_staff,
                'nik'                    => $request->nik,
                'jabatan'               => $request->jabatan,
                // 'gambar'                => $input['nama_file'],
                'status_staff'          => $request->status_staff,
                'urutan'                => $request->urutan
            ]);
        }
        return redirect('admin/wakilrektor')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id_staff)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        DB::table('wakilrektor_staff')->where('id_staff', $id_staff)->delete();
        return redirect('admin/wakilrektor')->with(['sukses' => 'Data telah dihapus']);
    }
}
