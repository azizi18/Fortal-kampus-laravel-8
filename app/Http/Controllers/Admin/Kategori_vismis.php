<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Kategori_vismis extends Controller
{
    // Index
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
		$kategori_vismis 	= DB::table('kategori_vismis')->orderBy('urutan','ASC')->get();

		$data = array(  'title'             => 'Kategori Visi Misi',
						'kategori_vismis'	=> $kategori_vismis,
                        'content'           => 'admin/kategori_vismis/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'nama_kategori_vismis' => 'required|unique:kategori_vismis',
					        'urutan' 		       => 'required',
					        ]);
    	$slug_kategori_vismis = Str::slug($request->nama_kategori_vismis, '-');
        DB::table('kategori_vismis')->insert([
            'nama_kategori_vismis'  => $request->nama_kategori_vismis,
            'slug_kategori_vismis'	=> $slug_kategori_vismis,
            'urutan'   		        => $request->urutan
            
        ]);
        return redirect('admin/kategori_vismis')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'nama_kategori_vismis' => 'required|unique:kategori_vismis',
					        'urutan'               => 'required',
					        ]);
    	$slug_kategori_vismis = Str::slug($request->nama_kategori_vismis, '-');
        DB::table('kategori_vismis')->where('id_kategori_vismis',$request->id_kategori_vismis)->update([
            'nama_kategori_vismis'  => $request->nama_kategori_vismis,
            'slug_kategori_vismis'	=> $slug_kategori_vismis,
            'urutan'                => $request->urutan
            
        ]);
        return redirect('admin/kategori_vismis')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id_kategori_vismis)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	DB::table('kategori_vismis')->where('id_kategori_vismis',$id_kategori_vismis)->delete();
    	return redirect('admin/kategori_vismis')->with(['sukses' => 'Data telah dihapus']);
    }
}
