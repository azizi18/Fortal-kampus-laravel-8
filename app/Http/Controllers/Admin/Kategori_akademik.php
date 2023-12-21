<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Kategori_Akademik extends Controller
{
    // Index
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
		$kategori_akademik 	= DB::table('kategori_akademik')->orderBy('urutan','ASC')->get();

		$data = array(  'title'             => 'Kategori Akademik',
						'kategori_akademik'	=> $kategori_akademik,
                        'content'           => 'admin/kategori_akademik/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'nama_kategori_akademik' => 'required|unique:kategori_akademik',
					        'urutan' 		       => 'required',
					        ]);
    	$slug_kategori_akademik = Str::slug($request->nama_kategori_akademik, '-');
        DB::table('kategori_akademik')->insert([
            'nama_kategori_akademik'  => $request->nama_kategori_akademik,
            'slug_kategori_akademik'	=> $slug_kategori_akademik,
            'urutan'   		        => $request->urutan
            
        ]);
        return redirect('admin/kategori_akademik')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'nama_kategori_akademik' => 'required',
					        'urutan'               => 'required',
					        ]);
    	$slug_kategori_akademik = Str::slug($request->nama_kategori_akademik, '-');
        DB::table('kategori_akademik')->where('id_kategori_akademik',$request->id_kategori_akademik)->update([
            'nama_kategori_akademik'  => $request->nama_kategori_akademik,
            'slug_kategori_akademik'	=> $slug_kategori_akademik,
            'urutan'                => $request->urutan
            
        ]);
        return redirect('admin/kategori_akademik')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id_kategori_akademik)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	DB::table('kategori_akademik')->where('id_kategori_akademik',$id_kategori_akademik)->delete();
    	return redirect('admin/kategori_akademik')->with(['sukses' => 'Data telah dihapus']);
    }
}
