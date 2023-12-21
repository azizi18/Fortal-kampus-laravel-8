<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kemahasiswaan_model extends Model
{

	protected $table 		= "kemahasiswaan";
	protected $primaryKey 	= 'id_kemahasiswaan';

    // listing
    public function semua()
    {
        $query = DB::table('kemahasiswaan')
            ->join('kategori_kemahasiswaan', 'kategori_kemahasiswaan.id_kategori_kemahasiswaan', '=', 'kemahasiswaan.id_kategori_kemahasiswaan','LEFT')
            ->select('kemahasiswaan.*', 'kategori_kemahasiswaan.slug_kategori_kemahasiswaan', 'kategori_kemahasiswaan.nama_kategori_kemahasiswaan')
            ->orderBy('kemahasiswaan.id_kemahasiswaan','DESC')
            ->get();
        return $query;
    }

    // listing
    public function cari($keywords)
    {
        $query = DB::table('kemahasiswaan')
            ->join('kategori_kemahasiswaan', 'kategori_kemahasiswaan.id_kategori_kemahasiswaan', '=', 'kemahasiswaan.id_kategori_kemahasiswaan','LEFT')
            ->select('kemahasiswaan.*', 'kategori_kemahasiswaan.slug_kategori_kemahasiswaan', 'kategori_kemahasiswaan.nama_kategori_kemahasiswaan')
            ->where('kemahasiswaan.urutan', 'LIKE', "%{$keywords}%") 
            ->orWhere('kemahasiswaan.isi', 'LIKE', "%{$keywords}%") 
            ->orderBy('id_kemahasiswaan','DESC')
            ->get();
        return $query;
    }

    // listing
    public function listing()
    {
    	$query = DB::table('kemahasiswaan')
         ->join('kategori_kemahasiswaan', 'kategori_kemahasiswaan.id_kategori_kemahasiswaan', '=', 'kemahasiswaan.id_kategori_kemahasiswaan','LEFT')
         ->select('kemahasiswaan.*', 'kategori_kemahasiswaan.slug_kategori_kemahasiswaan', 'kategori_kemahasiswaan.nama_kategori_kemahasiswaan')
         ->where('status_kalender','Publish')
            ->orderBy('id_kemahasiswaan','DESC')
            ->get();
        return $query;
    }

    // kategori
    public function kategori_kemahasiswaan($id_kategori_kemahasiswaan)
    {
        $query = DB::table('kemahasiswaan')
        ->join('kategori_kemahasiswaan', 'kategori_kemahasiswaan.id_kategori_kemahasiswaan', '=', 'kemahasiswaan.id_kategori_kemahasiswaan','LEFT')
        ->select('kemahasiswaan.*', 'kategori_kemahasiswaan.slug_kategori_kemahasiswaan', 'kategori_kemahasiswaan.nama_kategori_kemahasiswaan')
        ->where(array(  'kemahasiswaan.status_kemahasiswaan'         => 'Publish',
                            'kemahasiswaan.id_kategori_akademik'    => $id_kategori_kemahasiswaan))
            ->orderBy('id_kemahasiswaan','DESC')
            ->get();
        return $query;
    }

    // kategori
    public function all_kategori_kemahasiswaan($id_kategori_kemahasiswaan)
    {
        $query = DB::table('kemahasiswaan')
        ->join('kategori_kemahasiswaan', 'kategori_kemahasiswaan.id_kategori_kemahasiswaan', '=', 'kemahasiswaan.id_kategori_kemahasiswaan','LEFT')
        ->select('kemahasiswaan.*', 'kategori_kemahasiswaan.slug_kategori_kemahasiswaan', 'kategori_kemahasiswaan.nama_kategori_kemahasiswaan')
        ->where(array(  'kemahasiswaan.id_kategori_kemahasiswaan'    => $id_kategori_kemahasiswaan))
            ->orderBy('id_kemahasiswaan','DESC')
            ->get();
        return $query;
    }

   

    // kategori
    public function detail_kategori_kemahasiswaan($id_kategori_kemahasiswaan)
    {
        $query = DB::table('kemahasiswaan')
        ->join('kategori_kemahasiswaan', 'kategori_kemahasiswaan.id_kategori_kemahasiswaan', '=', 'kemahasiswaan.id_kategori_kemahasiswaan','LEFT')
        ->select('kemahasiswaan.*', 'kategori_kemahasiswaan.slug_kategori_kemahasiswaan', 'kategori_kemahasiswaan.nama_kategori_kemahasiswaan')
        ->where(array(  'kemahasiswaan.status_kemahasiswaan'         => 'Publish',
                            'kemahasiswaan.id_kategori_kemahasiswaan'    => $id_kategori_kemahasiswaan))
            ->orderBy('id_download','DESC')
            ->first();
        return $query;
    }

    


    // kategori
    public function slug_kategori_kemahasiswaan($slug_kategori_kemahasiswaan)
    {
        $query = DB::table('kemahasiswaan')
        ->join('kategori_kemahasiswaan', 'kategori_kemahasiswaan.id_kategori_kemahasiswaan', '=', 'kemahasiswaan.id_kategori_kemahasiswaan','LEFT')
        ->select('kemahasiswaan.*', 'kategori_kemahasiswaan.slug_kategori_kemahasiswaan', 'kategori_kemahasiswaan.nama_kategori_kemahasiswaan')
        ->where(array(  'kemahasiswaan.status_kemahasiswaan'                  => 'Publish',
                            'kategori_kemahasiswaan.slug_kategori_kemahasiswaan'  => $slug_kategori_kemahasiswaan))
            ->orderBy('id_kemahasiswaan','DESC')
            ->get();
        return $query;
    }

    // detail
    public function read($slug_kemahasiswaan)
    {
        $query = DB::table('kemahasiswaan')
        ->join('kategori_kemahasiswaan', 'kategori_kemahasiswaan.id_kategori_kemahasiswaan', '=', 'kemahasiswaan.id_kategori_kemahasiswaan','LEFT')
        ->select('kemahasiswaan.*', 'kategori_kemahasiswaan.slug_kategori_kemahasiswaan', 'kategori_kemahasiswaan.nama_kategori_kemahasiswaan')
        ->where('kemahasiswaan.slug_kemahasiswaan',$slug_kemahasiswaan)
            ->orderBy('id_kemahasiswaan','DESC')
            ->first();
        return $query;
    }

     // detail
    public function detail($id_kemahasiswaan)
    {
        $query = DB::table('kemahasiswaan')
        ->join('kategori_kemahasiswaan', 'kategori_kemahasiswaan.id_kategori_kemahasiswaan', '=', 'kemahasiswaan.id_kategori_kemahasiswaan','LEFT')
        ->select('kemahasiswaan.*', 'kategori_kemahasiswaan.slug_kategori_kemahasiswaan', 'kategori_kemahasiswaan.nama_kategori_kemahasiswaan')
        ->where('kemahasiswaan.id_kemahasiswaan',$id_kemahasiswaan)
            ->orderBy('id_kemahasiswaan','DESC')
            ->first();
        return $query;
    }

}
