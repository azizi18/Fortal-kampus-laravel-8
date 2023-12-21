<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Image;
use App\Models\Instagram_model;

class Instagram extends Controller
{
    // Main page
    public function index()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        Paginator::useBootstrap();
        $myinstagram     = new Instagram_model();
        $instagram     = $myinstagram ->semua();
        $kategori     = DB::table('kategori')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'       => 'Data Instagram',
            'instagram'      => $instagram,
            'kategori'    => $kategori,
            'content'     => 'admin/instagram/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    // Add
    public function add()
    {
        $data = array(
            'title'       => 'Data Instagram'
        );
        return view('admin/instagram/add', $data);
    }

    // Cari
    public function cari(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myinstagram          = new Instagram_model();
        $keywords           = $request->keywords;
        $instagram             = $myinstagram->cari($keywords);
        $kategori           = DB::table('kategori')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'             => 'Data Instagram ',
            'instagram'            => $instagram ,
            'kategori'   => $kategori,
            'content'           => 'admin/berita/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    // Proses
    public function proses(Request $request)
    {
       
        $pengalihan     = $request->pengalihan;
        // PROSES HAPUS MULTIPLE
        if (isset($_POST['hapus'])) {
            $id_instagramnya       = $request->id_instagram;
            for ($i = 0; $i < sizeof($id_instagramnya); $i++) {
                DB::table('instagram')->where('id_instagram', $id_instagramnya[$i])->delete();
            }
            return redirect($pengalihan)->with(['sukses' => 'Data telah dihapus']);
            // PROSES SETTING DRAFT
        } elseif (isset($_POST['draft'])) {
            $id_instagramnya       = $request->id_instagram;
            for ($i = 0; $i < sizeof($id_instagramnya); $i++) {
                DB::table('instagram')->where('id_instagram', $id_instagramnya[$i])->update([
                    'id_user'       => Session()->get('id_user'),
                    'status_berita' => 'Draft'
                ]);
            }
            return redirect($pengalihan)->with(['sukses' => 'Data telah diubah menjadi Draft']);
            // PROSES SETTING PUBLISH
        } elseif (isset($_POST['publish'])) {
            $id_instagramnya       = $request->id_instagram;
            for ($i = 0; $i < sizeof($id_instagramnya); $i++) {
                DB::table('instagram')->where('id_berita', $id_instagramnya[$i])->update([
                    'id_user'       => Session()->get('id_user'),
                    
                ]);
            }
            return redirect($pengalihan)->with(['sukses' => 'Data telah diubah menjadi Publish']);
        } elseif (isset($_POST['update'])) {
            $id_instagramnya       = $request->id_instagram;
            for ($i = 0; $i < sizeof($id_instagramnya); $i++) {
                DB::table('instagram')->where('id_instagram', $id_instagramnya[$i])->update([
                    'id_user'        => Session()->get('id_user'),
                    'id_kategori'    => $request->id_kategori
                ]);
            }
            return redirect($pengalihan)->with(['sukses' => 'Data kategori telah diubah']);
        }
    }



    // Tambah
    public function tambah()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $kategori    = DB::table('kategori')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'             => 'Tambah Instagram',
            'kategori'   => $kategori,
            'content'           => 'admin/instagram/tambah'
        );
        return view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_instagram)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myinstagram            = new Instagram_model();
        $instagram              = $myinstagram ->detail($id_instagram );
        $kategori    = DB::table('kategori')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'             => 'Edit instagram ',
            'instagram'            => $instagram ,
            'kategori'              => $kategori,
            'content'           => 'admin/instagram/edit'
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
            'link'      => 'required',
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
           
            DB::table('instagram')->insert([
                'id_user'           => Session()->get('id_user'),
                'gambar'            => $input['nama_file'],
                'link'            => $request->link,
                'urutan'            => $request->urutan
            ]);
        } else {
            DB::table('instagram')->insert([
                'id_user'           => Session()->get('id_user'),
                'link'            => $request->link,
                'urutan'            => $request->urutan
            ]);
        }
       
            return redirect('admin/instagram')->with(['sukses' => 'Data telah ditambah']);
     
            
    }

    // edit
    public function edit_proses(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        request()->validate([
            'link'      => 'required',
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
         
            DB::table('instagram')->where('id_instagram', $request->id_instagram)->update([
                'id_user'           => Session()->get('id_user'),
                'gambar'            => $input['nama_file'],
                'link'              => $request->link,
                'urutan'            => $request->urutan
            ]);
        } else {

            DB::table('instagram')->where('id_instagram', $request->id_instagram)->update([
                'id_user'           => Session()->get('id_user'),
                'link'            => $request->link,
                'urutan'            => $request->urutan
            ]);
        }
       
            return redirect('admin/instagram')->with(['sukses' => 'Data telah ditambah']);
           
    }

    // Delete
    public function delete($id_instagram)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        DB::table('instagram')->where('id_instagram', $id_instagram)->delete();
        return redirect('admin/instagram')->with(['sukses' => 'Data telah dihapus']);
    }
}
