<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kalender_model extends Model
{

	protected $table 		= "kalender";
	protected $primaryKey 	= 'id_kalender';

    // listing
    public function semua()
    {
        $query = DB::table('kalender')
            ->join('kategori_kalender', 'kategori_kalender.id_kategori_kalender', '=', 'kalender.id_kategori_kalender','LEFT')
            ->select('kalender.*', 'kategori_kalender.slug_kategori_kalender', 'kategori_kalender.nama_kategori_kalender')
            ->orderBy('kalender.id_kalender','DESC')
            ->get();
        return $query;
    }

    // listing
    public function cari($keywords)
    {
        $query = DB::table('kalender')
            ->join('kategori_kalender', 'kategori_kalender.id_kategori_kalender', '=', 'kalender.id_kategori_kalender','LEFT')
            ->select('kalender.*', 'kategori_kalender.slug_kategori_kalender', 'kategori_download.nama_kategori_kalender')
            ->where('kalender.judul_kalender', 'LIKE', "%{$keywords}%") 
            ->orWhere('kalender.isi', 'LIKE', "%{$keywords}%") 
            ->orderBy('id_kalender','DESC')
            ->get();
        return $query;
    }

    // listing
    public function listing()
    {
    	$query = DB::table('kalender')
            ->join('kategori_kalender', 'kategori_kalender.id_kategori_kalender', '=', 'kalender.id_kategori_kalender','LEFT')
            ->select('kalender.*', 'kategori_kalender.slug_kategori_kalender', 'kategori_kalender.nama_kategori_kalender')
            ->where('status_kalender','Publish')
            ->orderBy('id_kalender','DESC')
            ->get();
        return $query;
    }

    // kategori
    public function kategori_download($id_kategori_download)
    {
        $query = DB::table('kalender')
            ->join('kategori_kalender', 'kategori_kalender.id_kategori_kalender', '=', 'kalender.id_kategori_kalender','LEFT')
            ->select('kalender.*', 'kategori_kalenderslug_kategori_kalender', 'kategori_kalender.nama_kategori_kalender')
            ->where(array(  'kalender.status_kalender'         => 'Publish',
                            'kalender.id_kategori_kalender'    => $id_kategori_download))
            ->orderBy('id_kalender','DESC')
            ->get();
        return $query;
    }

    // kategori
    public function all_kategori_download($id_kategori_download)
    {
        $query = DB::table('kalender')
            ->join('kategori_kalender', 'kategori_kalender.id_kategori_kalender', '=', 'kalender.id_kategori_kalender','LEFT')
            ->select('kalender.*', 'kategori_kalender.slug_kategori_kalender', 'kategori_kalender.nama_kategori_kalender')
            ->where(array(  'kalender.id_kategori_kalender'    => $id_kategori_download))
            ->orderBy('id_kalender','DESC')
            ->get();
        return $query;
    }

    // kategori
    public function status_download($status_download)
    {
        $query = DB::table('kalender')
            ->join('kategori_kalender', 'kategori_kalender.id_kategori_kalender', '=', 'kalender.id_kategori_kalender','LEFT')
            ->select('kalender.*', 'kategori_kalender.slug_kategori_kalender', 'kategori_kalender.nama_kategori_kalender')
            ->where(array(  'kalender.status_kalender'         => $status_download))
            ->orderBy('id_kalender','DESC')
            ->get();
        return $query;
    }

    // kategori
    public function detail_kategori_download($id_kategori_download)
    {
        $query = DB::table('kalender')
            ->join('kategori_download', 'kategori_download.id_kategori_download', '=', 'kalender.id_kategori_download','LEFT')
            ->select('kalender.*', 'kategori_download.slug_kategori_download', 'kategori_download.nama_kategori_download')
            ->where(array(  'kalender.status_download'         => 'Publish',
                            'kalender.id_kategori_download'    => $id_kategori_download))
            ->orderBy('id_download','DESC')
            ->first();
        return $query;
    }

    // kategori
    public function detail_slug_kategori_download($slug_kategori_download)
    {
        $query = DB::table('kalender')
            ->join('kategori_download', 'kategori_download.id_kategori_download', '=', 'kalender.id_kategori_download','LEFT')
            ->select('kalender.*', 'kategori_download.slug_kategori_download', 'kategori_download.nama_kategori_download')
            ->where(array(  'kalender.status_download'                  => 'Publish',
                            'kategori_download.slug_kategori_download'  => $slug_kategori_download))
            ->orderBy('id_download','DESC')
            ->first();
        return $query;
    }


    // kategori
    public function slug_kategori_download($slug_kategori_download)
    {
        $query = DB::table('kalender')
            ->join('kategori_kalender', 'kategori_kalender.id_kategori_kalender', '=', 'kalender.id_kategori_kalender','LEFT')
            ->select('kalender.*', 'kategori_kalender.slug_kategori_kalender', 'kategori_kalender.nama_kategori_kalender')
            ->where(array(  'kalender.status_kalender'                  => 'Publish',
                            'kategori_kalender.slug_kategori_kalender'  => $slug_kategori_download))
            ->orderBy('id_kalender','DESC')
            ->get();
        return $query;
    }

    // detail
    public function read($slug_download)
    {
        $query = DB::table('kalender')
            ->join('kategori_kalender', 'kategori_kalender.id_kategori_kalender', '=', 'kalender.id_kategori_kalender','LEFT')
            ->select('kalender.*', 'kategori_kalender.slug_kategori_kalender', 'kategori_kalender.nama_kategori_kalender')
            ->where('kalender.slug_kalender',$slug_download)
            ->orderBy('id_kalender','DESC')
            ->first();
        return $query;
    }

     // detail
    public function detail($id_download)
    {
        $query = DB::table('kalender')
            ->join('kategori_kalender', 'kategori_kalender.id_kategori_kalender', '=', 'kalender.id_kategori_kalender','LEFT')
            ->select('kalender.*', 'kategori_kalender.slug_kategori_kalender', 'kategori_kalender.nama_kategori_kalender')
            ->where('kalender.id_kalender',$id_download)
            ->orderBy('id_kalender','DESC')
            ->first();
        return $query;
    }

}
