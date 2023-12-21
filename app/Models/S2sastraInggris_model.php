<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class S2sastraInggris_model extends Model
{
    protected $table         = "s2sastra_inggris";
    protected $primaryKey     = 'id_sas';
    public $timestamps = false;

    protected $fillable = [
        
        'nidn',
        'nik_nip',
        'nama',
        'email',
       
    ];



    public function semua()
    {
        $query = DB::table('s2sastra_inggris')
        ->join('users', 'users.id_user', '=', 's2sastra_inggris.id_user', 'LEFT')
            ->select('s2sastra_inggris.*', 's2sastra_inggris.nidn', 's2sastra_inggris.nik_nip', 's2sastra_inggris.nama', 's2sastra_inggris.email')
            ->orderBy('s2sastra_inggris.id_sas', 'DESC')
            ->get();
        return $query;
    }
    // listing
    public function home()
    {
        $query = DB::table('s2sastra_inggris')
            ->join('users', 'users.id_user', '=', 's2sastra_inggris.id_user', 'LEFT')
            ->select('s2sastra_inggris.*', 's2sastra_inggris.nidn', 's2sastra_inggris.nik_nip', 's2sastra_inggris.nama', 's2sastra_inggris.email')
            ->orderBy('id_sas', 'DESC')
            ->limit(15)
            ->get();
        return $query;
    }
    public function detail($id_sas)
    {
        $query = DB::table('s2sastra_inggris')
            ->join('users', 'users.id_user', '=', 's2sastra_inggris.id_user', 'LEFT')
            ->select('s2sastra_inggris.*', 's2sastra_inggris.nidn', 's2sastra_inggris.nik_nip', 's2sastra_inggris.nama', 's2sastra_inggris.email')
            ->where('s2sastra_inggris.id_sas', $id_sas)
            ->orderBy('id_sas', 'DESC')
            ->first();
        return $query;
    }


    // // listing
    public function cari($keywords)
    {
        $query = DB::table('s2sastra_inggris')
             ->join('users', 'users.id_user', '=', 's2sastra_inggris.id_user', 'LEFT')
             ->select('s2sastra_inggris.*', 's2sastra_inggris.nidn', 's2sastra_inggris.nik_nip', 's2sastra_inggris.nama', 's2sastra_inggris.email')
            ->where('s2sastra_inggris.nama', 'LIKE', "%{$keywords}%")
            ->orderBy('id_sas', 'DESC')
            ->get();
        return $query;
    }

    // // listing
    // public function listing()
    // {
    //     $query = DB::table('instagram')
    //         ->join('kategori_instagram', 'kategori_instagram.id_kategori_instagram', '=', 'instagram.id_kategori_instagram', 'LEFT')
    //         ->select('instagram.*', 'kategori_instagram.slug_kategori_instagram', 'kategori_instagram.nama_kategori_instagram')
    //         ->where('status_instagram', 'Publish')
    //         ->orderBy('id_instagram', 'DESC')
    //         ->get();
    //     return $query;
    // }



    // // detail
    // public function read($slug_instagram)
    // {
    //     $query = DB::table('instagram')
    //         ->join('kategori_instagram', 'kategori_instagram.id_kategori_instagram', '=', 'instagram.id_kategori_instagram', 'LEFT')
    //         ->select('instagram.*', 'kategori_instagram.slug_kategori_instagram', 'kategori_instagram.nama_kategori_instagram')
    //         ->where('instagram.slug_instagram', $slug_instagram)
    //         ->orderBy('id_instagram', 'DESC')
    //         ->first();
    //     return $query;
    // }

    // // detail

    // Gambar
    // public function gambar($id_fasilitas)
    // {
    //     $query = DB::table('ilmu_komputer')
    //         ->select('*')
    //         ->where('gambar.id_fasilitas', $id_fasilitas)
    //         ->orderBy('id_fasilitas', 'DESC')
    //         ->get();
    //     return $query;
    // }
}
