<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Kategori_kalender extends Controller
{
    // Index
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
		$kategori_kalender 	= DB::table('kategori_kalender')->orderBy('urutan','ASC')->get();

		$data = array(  'title'             => 'Kategori Kalender',
						'kategori_kalender'	=> $kategori_kalender,
                        'content'           => 'admin/kategori_kalender/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'nama_kategori_kalender' => 'required|unique:kategori_kalender',
					        'urutan' 		       => 'required',
					        ]);
    	$slug_kategori_kalender = Str::slug($request->nama_kategori_kalender, '-');
        DB::table('kategori_kalender')->insert([
            'nama_kategori_kalender'  => $request->nama_kategori_kalender,
            'slug_kategori_kalender'	=> $slug_kategori_kalender,
            'urutan'   		        => $request->urutan
            
        ]);
        return redirect('admin/kategori_kalender')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'nama_kategori_kalender' => 'required',
					        'urutan'               => 'required',
					        ]);
    	$slug_kategori_kalender = Str::slug($request->nama_kategori_kalender, '-');
        DB::table('kategori_kalender')->where('id_kategori_kalender',$request->id_kategori_kalender)->update([
            'nama_kategori_kalender'  => $request->nama_kategori_kalender,
            'slug_kategori_kalender'	=> $slug_kategori_kalender,
            'urutan'                => $request->urutan
            
        ]);
        return redirect('admin/kategori_kalender')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id_kategori_kalender)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	DB::table('kategori_kalender')->where('id_kategori_kalender',$id_kategori_kalender)->delete();
    	return redirect('admin/kategori_kalender')->with(['sukses' => 'Data telah dihapus']);
    }
}
