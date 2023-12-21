<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Kategori_kemahasiswaan extends Controller
{
    // Index
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
		$kategori_kemahasiswaan 	= DB::table('kategori_kemahasiswaan')->orderBy('urutan','ASC')->get();

		$data = array(  'title'             => 'Kategori Kemahasiswaan',
						'kategori_kemahasiswaan'	=> $kategori_kemahasiswaan,
                        'content'           => 'admin/kategori_kemahasiswaan/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'nama_kategori_kemahasiswaan' => 'required|unique:kategori_kemahasiswaan',
					        'urutan' 		       => 'required',
					        ]);
    	$slug_kategori_kemahasiswaan = Str::slug($request->nama_kategori_kemahasiswaan, '-');
        DB::table('kategori_kemahasiswaan')->insert([
            'nama_kategori_kemahasiswaan'  => $request->nama_kategori_kemahasiswaan,
            'slug_kategori_kemahasiswaan'	=> $slug_kategori_kemahasiswaan,
            'urutan'   		        => $request->urutan
            
        ]);
        return redirect('admin/kategori_kemahasiswaan')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'nama_kategori_kemahasiswaan' => 'required',
					        'urutan'               => 'required',
					        ]);
    	$slug_kategori_kemahasiswaan = Str::slug($request->nama_kategori_kemahasiswaan, '-');
        DB::table('kategori_kemahasiswaan')->where('id_kategori_kemahasiswaan',$request->id_kategori_kemahasiswaan)->update([
            'nama_kategori_kemahasiswaan'  => $request->nama_kategori_kemahasiswaan,
            'slug_kategori_kemahasiswaan'	=> $slug_kategori_kemahasiswaan,
            'urutan'                => $request->urutan
            
        ]);
        return redirect('admin/kategori_kemahasiswaan')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id_kategori_kemahasiswaan)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	DB::table('kategori_kemahasiswaan')->where('id_kategori_kemahasiswaan',$id_kategori_kemahasiswaan)->delete();
    	return redirect('admin/kategori_kemahasiswaan')->with(['sukses' => 'Data telah dihapus']);
    }
}
