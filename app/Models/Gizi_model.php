<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Gizi_model extends Model
{
    protected $table         = "gizi";
    protected $primaryKey     = 'id_giz';
    public $timestamps = false;

    protected $fillable = [
        
        'nidn',
        'nik_nip',
        'nama',
        'email',
       
    ];



    public function semua()
    {
        $query = DB::table('gizi')
        ->join('users', 'users.id_user', '=', 'gizi.id_user', 'LEFT')
            ->select('gizi.*', 'gizi.nidn', 'gizi.nik_nip', 'gizi.nama', 'gizi.email')
            ->orderBy('gizi.id_giz', 'DESC')
            ->get();
        return $query;
    }
    // listing
    public function home()
    {
        $query = DB::table('gizi')
            ->join('users', 'users.id_user', '=', 'gizi.id_user', 'LEFT')
            ->select('gizi.*', 'gizi.nidn', 'gizi.nik_nip', 'gizi.nama', 'gizi.email')
            ->orderBy('id_giz', 'DESC')
            ->limit(15)
            ->get();
        return $query;
    }
    public function detail($id_giz)
    {
        $query = DB::table('gizi')
            ->join('users', 'users.id_user', '=', 'gizi.id_user', 'LEFT')
            ->select('gizi.*', 'gizi.nidn', 'gizi.nik_nip', 'gizi.nama', 'gizi.email')
            ->where('gizi.id_giz', $id_giz)
            ->orderBy('id_giz', 'DESC')
            ->first();
        return $query;
    }


    // // listing
    public function cari($keywords)
    {
        $query = DB::table('gizi')
             ->join('users', 'users.id_user', '=', 'gizi.id_user', 'LEFT')
             ->select('gizi.*', 'gizi.nidn', 'gizi.nik_nip', 'gizi.nama', 'gizi.email')
            ->where('gizi.nama', 'LIKE', "%{$keywords}%")
            ->orderBy('id_giz', 'DESC')
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