<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Akademik_model extends Model
{

	protected $table 		= "akademik";
	protected $primaryKey 	= 'id_akademik';

    // listing
    public function semua()
    {
        $query = DB::table('akademik')
            ->join('kategori_akademik', 'kategori_akademik.id_kategori_akademik', '=', 'akademik.id_kategori_akademik','LEFT')
            ->select('akademik.*', 'kategori_akademik.slug_kategori_akademik', 'kategori_akademik.nama_kategori_akademik')
            ->orderBy('akademik.id_akademik','DESC')
            ->get();
        return $query;
    }

    // listing
    public function cari($keywords)
    {
        $query = DB::table('akademik')
            ->join('kategori_akademik', 'kategori_akademik.id_kategori_akademik', '=', 'akademik.id_kategori_akademik','LEFT')
            ->select('akademik.*', 'kategori_akademik.slug_kategori_akademik', 'kategori_akademik.nama_kategori_akademik')
            ->where('akademik.judul_kalender', 'LIKE', "%{$keywords}%") 
            ->orWhere('akademik.isi', 'LIKE', "%{$keywords}%") 
            ->orderBy('id_akademik','DESC')
            ->get();
        return $query;
    }

    // listing
    public function listing()
    {
    	$query = DB::table('akademik')
            ->join('kategori_akademik', 'kategori_akademik.id_kategori_akademik', '=', 'akademik.id_kategori_akademik','LEFT')
            ->select('akademik.*', 'kategori_akademik.slug_kategori_akademik', 'kategori_akademik.nama_kategori_akademik')
            ->where('status_kalender','Publish')
            ->orderBy('id_akademik','DESC')
            ->get();
        return $query;
    }

    // kategori
    public function kategori_akademik($id_kategori_akademik)
    {
        $query = DB::table('akademik')
            ->join('kategori_akademik', 'kategori_akademik.id_kategori_akademik', '=', 'akademik.id_kategori_akademik','LEFT')
            ->select('akademik.*', 'kategori_akademik.slug_kategori_akademik', 'kategori_akademik.nama_kategori_akademik')
            ->where(array(  'akademik.status_kalender'         => 'Publish',
                            'akademik.id_kategori_akademik'    => $id_kategori_akademik))
            ->orderBy('id_akademik','DESC')
            ->get();
        return $query;
    }

    // kategori
    public function all_kategori_download($id_kategori_download)
    {
        $query = DB::table('akademik')
            ->join('kategori_akademik', 'kategori_akademik.id_kategori_akademik', '=', 'akademik.id_kategori_akademik','LEFT')
            ->select('akademik.*', 'kategori_akademik.slug_kategori_akademik', 'kategori_akademik.nama_kategori_akademik')
            ->where(array(  'akademik.id_kategori_akademik'    => $id_kategori_download))
            ->orderBy('id_akademik','DESC')
            ->get();
        return $query;
    }

    // kategori
    public function status_download($status_download)
    {
        $query = DB::table('akademik')
            ->join('kategori_akademik', 'kategori_akademik.id_kategori_akademik', '=', 'akademik.id_kategori_akademik','LEFT')
            ->select('akademik.*', 'kategori_akademik.slug_kategori_akademik', 'kategori_akademik.nama_kategori_akademik')
            ->where(array(  'akademik.status_kalender'         => $status_download))
            ->orderBy('id_akademik','DESC')
            ->get();
        return $query;
    }

    // kategori
    public function detail_kategori_download($id_kategori_download)
    {
        $query = DB::table('akademik')
            ->join('kategori_download', 'kategori_download.id_kategori_download', '=', 'akademik.id_kategori_download','LEFT')
            ->select('akademik.*', 'kategori_akademik.slug_kategori_akademik', 'kategori_akademik.nama_kategori_akademik')
            ->where(array(  'akademik.status_download'         => 'Publish',
                            'akademik.id_kategori_download'    => $id_kategori_download))
            ->orderBy('id_download','DESC')
            ->first();
        return $query;
    }

    // kategori
    public function detail_slug_kategori_download($slug_kategori_download)
    {
        $query = DB::table('akademik')
            ->join('kategori_download', 'kategori_download.id_kategori_download', '=', 'akademik.id_kategori_download','LEFT')
            ->select('akademik.*', 'kategori_akademik.slug_kategori_akademik', 'kategori_akademik.nama_kategori_akademik')
            ->where(array(  'akademik.status_download'                  => 'Publish',
                            'kategori_download.slug_kategori_download'  => $slug_kategori_download))
            ->orderBy('id_download','DESC')
            ->first();
        return $query;
    }


    // kategori
    public function slug_kategori_download($slug_kategori_download)
    {
        $query = DB::table('akademik')
            ->join('kategori_akademik', 'kategori_akademik.id_kategori_akademik', '=', 'akademik.id_kategori_akademik','LEFT')
            ->select('akademik.*', 'kategori_akademik.slug_kategori_akademik', 'kategori_akademik.nama_kategori_akademik')
            ->where(array(  'akademik.status_kalender'                  => 'Publish',
                            'kategori_akademik.slug_kategori_kalender'  => $slug_kategori_download))
            ->orderBy('id_akademik','DESC')
            ->get();
        return $query;
    }

    // detail
    public function read($slug_download)
    {
        $query = DB::table('akademik')
            ->join('kategori_akademik', 'kategori_akademik.id_kategori_akademik', '=', 'akademik.id_kategori_akademik','LEFT')
            ->select('akademik.*', 'kategori_akademik.slug_kategori_akademik', 'kategori_akademik.nama_kategori_akademik')
            ->where('akademik.slug_kalender',$slug_download)
            ->orderBy('id_akademik','DESC')
            ->first();
        return $query;
    }

     // detail
    public function detail($id_download)
    {
        $query = DB::table('akademik')
            ->join('kategori_akademik', 'kategori_akademik.id_kategori_akademik', '=', 'akademik.id_kategori_akademik','LEFT')
            ->select('akademik.*', 'kategori_akademik.slug_kategori_akademik', 'kategori_akademik.nama_kategori_akademik')
            ->where('akademik.id_akademik',$id_download)
            ->orderBy('id_akademik','DESC')
            ->first();
        return $query;
    }

}
