<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Visi_model extends Model
{

	protected $table 		= "visi_misi";
	protected $primaryKey 	= 'id_vismis';

    // listing
    public function semua()
    {
        $query = DB::table('visi_misi')
            ->join('kategori_vismis', 'kategori_vismis.id_kategori_vismis', '=', 'visi_misi.id_kategori_vismis','LEFT')
            ->select('visi_misi.*', 'kategori_vismis.slug_kategori_vismis', 'kategori_vismis.nama_kategori_vismis')
            ->orderBy('visi_misi.id_vismis','ASC')
            ->get();
        return $query;
    }

    // listing
    public function cari($keywords)
    {
        $query = DB::table('visi_misi')
            ->join('kategori_vismis', 'kategori_vismis.id_kategori_vismis', '=', 'visi_misi.id_kategori_vismis','LEFT')
            ->select('visi_misi.*', 'kategori_vismis.slug_kategori_vismis', 'kategori_vismis.nama_kategori_vismis')
            ->where('visi_misi.judul_vismis', 'LIKE', "%{$keywords}%") 
            ->orWhere('visi_misi.isi', 'LIKE', "%{$keywords}%") 
            ->orderBy('id_vismis','DESC')
            ->get();
        return $query;
    }

    // listing
    public function listing()
    {
    	$query = DB::table('visi_misi')
            ->join('kategori_vismis', 'kategori_vismis.id_kategori_vismis', '=', 'visi_misi.id_kategori_vismis','LEFT')
            ->select('visi_misi.*', 'kategori_vismis.slug_kategori_vismis', 'kategori_vismis.nama_kategori_vismis')
            ->where('status_vismis','Publish')
            ->orderBy('id_vismis','DESC')
            ->get();
        return $query;
    }

    // kategori
    public function kategori_vismis($id_kategori_vismis)
    {
        $query = DB::table('visi_misi')
            ->join('kategori_vismis', 'kategori_vismis.id_kategori_vismis', '=', 'visi_misi.id_kategori_vismis','LEFT')
            ->select('visi_misi.*', 'kategori_vismis.slug_kategori_vismis', 'kategori_vismis.nama_kategori_vismis')
            ->where(array(  'visi_misi.status_vismis'         => 'Publish',
                            'visi_misi.id_kategori_vismis'    => $id_kategori_vismis))
            ->orderBy('id_vismis','DESC')
            ->get();
        return $query;
    }

    // kategori
    public function all_kategori_vismis($id_kategori_vismis)
    {
        $query = DB::table('visi_misi')
        ->join('kategori_vismis', 'kategori_vismis.id_kategori_vismis', '=', 'visi_misi.id_kategori_vismis','LEFT')
        ->select('visi_misi.*', 'kategori_vismis.slug_kategori_vismis', 'kategori_vismis.nama_kategori_vismis')
        ->where(array(  'visi_misi.id_kategori_vismis'    => $id_kategori_vismis))
            ->orderBy('id_vismis','DESC')
            ->get();
        return $query;
    }

 

    // kategori
    public function detail_kategori_download($id_kategori_download)
    {
        $query = DB::table('visi_misi')
        ->join('kategori_vismis', 'kategori_vismis.id_kategori_vismis', '=', 'visi_misi.id_kategori_vismis','LEFT')
        ->select('visi_misi.*', 'kategori_vismis.slug_kategori_vismis', 'kategori_vismis.nama_kategori_vismis')
            ->where(array(  'visi_misi.status_vismis'         => 'Publish',
                            'visi_misi.id_kategori_vismis'    => $id_kategori_download))
            ->orderBy('id_vismis','DESC')
            ->first();
        return $query;
    }

    // kategori
    public function detail_slug_kategori_vismis($slug_kategori_vismis)
    {
        $query = DB::table('visi_misi')
        ->join('kategori_vismis', 'kategori_vismis.id_kategori_vismis', '=', 'visi_misi.id_kategori_vismis','LEFT')
        ->select('visi_misi.*', 'kategori_vismis.slug_kategori_vismis', 'kategori_vismis.nama_kategori_vismis')
        ->where(array(  'visi_misi.status_vismis'                  => 'Publish',
                            'kategori_vismis.slug_kategori_vismis'  => $slug_kategori_vismis))
            ->orderBy('id_vismis','DESC')
            ->first();
        return $query;
    }


    // kategori
    public function slug_kategori_vismis($slug_kategori_vismis)
    {
        $query = DB::table('visi_misi')
        ->join('kategori_vismis', 'kategori_vismis.id_kategori_vismis', '=', 'visi_misi.id_kategori_vismis','LEFT')
        ->select('visi_misi.*', 'kategori_vismis.slug_kategori_vismis', 'kategori_vismis.nama_kategori_vismis')
            ->where(array(  'visi_misi.status_vismis'                  => 'Publish',
                            'kategori_vismis.slug_kategori_vismis'  => $slug_kategori_vismis))
            ->orderBy('id_vismis','DESC')
            ->get();
        return $query;
    }

    // detail
    public function read($slug_vismis)
    {
        $query = DB::table('visi_misi')
        ->join('kategori_vismis', 'kategori_vismis.id_kategori_vismis', '=', 'visi_misi.id_kategori_vismis','LEFT')
        ->select('visi_misi.*', 'kategori_vismis.slug_kategori_vismis', 'kategori_vismis.nama_kategori_vismis')
            ->where('visi_misi.slug_vismis',$slug_vismis)
            ->orderBy('id_vismis','DESC')
            ->first();
        return $query;
    }

     // detail
    public function detail($id_vismis)
    {
        $query = DB::table('visi_misi')
        ->join('kategori_vismis', 'kategori_vismis.id_kategori_vismis', '=', 'visi_misi.id_kategori_vismis','LEFT')
        ->select('visi_misi.*', 'kategori_vismis.slug_kategori_vismis', 'kategori_vismis.nama_kategori_vismis')
            ->where('visi_misi.id_vismis',$id_vismis)
            ->orderBy('id_vismis','DESC')
            ->first();
        return $query;
    }

}
