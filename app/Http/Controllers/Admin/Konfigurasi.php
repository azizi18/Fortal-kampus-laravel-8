<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;
use App\Models\Konfigurasi_model;

class Konfigurasi extends Controller
{
    // Main page
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	$mykonfigurasi 	= new Konfigurasi_model();
		$site 			= $mykonfigurasi->listing();

		$data = array(  'title'        => 'Data Konfigurasi',
						'site'         => $site,
                        'content'      => 'admin/konfigurasi/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // logo
    public function logo()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mykonfigurasi  = new Konfigurasi_model();
        $site           = $mykonfigurasi->listing();

        $data = array(  'title'        => 'Update Logo',
                        'site'         => $site,
                        'content'      => 'admin/konfigurasi/logo'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // logo
    public function profil()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mykonfigurasi  = new Konfigurasi_model();
        $site           = $mykonfigurasi->listing();

        $data = array(  'title'        => 'Profil '.$site->namaweb,
                        'site'         => $site,
                        'content'      => 'admin/konfigurasi/profil'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // gambar
    public function gambar()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mykonfigurasi  = new Konfigurasi_model();
        $site           = $mykonfigurasi->listing();

        $data = array(  'title'        => 'Update Gambar Banner',
                        'site'         => $site,
                        'content'      => 'admin/konfigurasi/gambar'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // icon
    public function icon()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mykonfigurasi  = new Konfigurasi_model();
        $site           = $mykonfigurasi->listing();

        $data = array(  'title'        => 'Update Icon',
                        'site'         => $site,
                        'content'      => 'admin/konfigurasi/icon'
                    );
        return view('admin/layout/wrapper',$data);
    }


    // Proses
    public function proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'namaweb'          => 'required'
                            ]);
       DB::table('konfigurasi')->where('id_konfigurasi',$request->id_konfigurasi)->update([
            'namaweb'           => $request->namaweb,
            'singkatan'         => $request->singkatan,
            'tagline'           => $request->tagline,
            'email'             => $request->email,
            'alamat'            => $request->alamat,
            'telepon'           => $request->telepon,
            'id_user'           => Session()->get('id_user'),
        ]);
        return redirect('admin/konfigurasi')->with(['sukses' => 'Data telah diupdate']);
    }

    // logo
    public function proses_logo(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'logo'        => 'required|file|image|mimes:jpeg,png,jpg|max:8024',
                            ]);
        // UPLOAD START
        $image                  = $request->file('logo');
        $filenamewithextension  = $request->file('logo')->getClientOriginalName();
        $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $input['nama_file']     = Str::slug($filename, '-').'.'.$image->getClientOriginalExtension();
        $destinationPath        = './assets/upload/image/thumbs/';
        $img = Image::make($image->getRealPath(),array(
            'width'     => 150,
            'height'    => 150,
            'grayscale' => false
        ));
        $img->save($destinationPath.'/'.$input['nama_file']);
        $destinationPath = './assets/upload/image/';
        $image->move($destinationPath, $input['nama_file']);
        // END UPLOAD
        DB::table('konfigurasi')->where('id_konfigurasi',$request->id_konfigurasi)->update([
            'id_user'  => Session()->get('id_user'),
            'logo'     => $input['nama_file']
        ]);
        return redirect('admin/konfigurasi/logo')->with(['sukses' => 'Logo telah diupdate']);
    }

    

    // icon
    public function proses_icon(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'icon'        => 'required|file|image|mimes:jpeg,png,jpg|max:8024',
                            ]);
        // UPLOAD START
        $image                  = $request->file('icon');
        $filenamewithextension  = $request->file('icon')->getClientOriginalName();
        $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $input['nama_file']     = Str::slug($filename, '-').'.'.$image->getClientOriginalExtension();
        $destinationPath        = './assets/upload/image/thumbs';
        $img = Image::make($image->getRealPath(),array(
            'width'     => 150,
            'height'    => 150,
            'grayscale' => false
        ));
        $img->save($destinationPath.'/'.$input['nama_file']);
        $destinationPath = './assets/upload/image';
        $image->move($destinationPath, $input['nama_file']);
        // END UPLOAD
        DB::table('konfigurasi')->where('id_konfigurasi',$request->id_konfigurasi)->update([
            'id_user'  => Session()->get('id_user'),
            'icon'     => $input['nama_file']
        ]);
        return redirect('admin/konfigurasi/icon')->with(['sukses' => 'Icon telah diupdate']);
    }

    // gambar
    public function proses_gambar(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'gambar'        => 'required|file|image|mimes:jpeg,png,jpg|max:8024',
                            ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
        $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $input['nama_file']     = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
        $destinationPath        = './assets/upload/image/thumbs/';
        $img = Image::make($image->getRealPath(),array(
            'width'     => 150,
            'height'    => 150,
            'grayscale' => false
        ));
        $img->save($destinationPath.'/'.$input['nama_file']);
        $destinationPath = './assets/upload/image/';
        $image->move($destinationPath, $input['nama_file']);
        // END UPLOAD
        DB::table('konfigurasi')->where('id_konfigurasi',$request->id_konfigurasi)->update([
            'id_user'  => Session()->get('id_user'),
            'gambar'     => $input['nama_file']
        ]);
        return redirect('admin/konfigurasi/gambar')->with(['sukses' => 'Gambar Banner telah diupdate']);
    }

}
