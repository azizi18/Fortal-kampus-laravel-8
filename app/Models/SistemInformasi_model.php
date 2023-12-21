<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SistemInformasi_model extends Model
{
    protected $table         = "sistem_informasi";
    protected $primaryKey     = 'id_si';
    public $timestamps = false;

    protected $fillable = [
        
        'nidn',
        'nik_nip',
        'nama',
        'email',
       
    ];



    public function semua()
    {
        $query = DB::table('sistem_informasi')
        ->join('users', 'users.id_user', '=', 'sistem_informasi.id_user', 'LEFT')
            ->select('sistem_informasi.*', 'sistem_informasi.nidn', 'sistem_informasi.nik_nip', 'sistem_informasi.nama', 'sistem_informasi.email')
            ->orderBy('sistem_informasi.id_si', 'DESC')
            ->get();
        return $query;
    }
    // listing
    public function home()
    {
        $query = DB::table('sistem_informasi')
            ->join('users', 'users.id_user', '=', 'sistem_informasi.id_user', 'LEFT')
            ->select('sistem_informasi.*', 'sistem_informasi.nidn', 'sistem_informasi.nik_nip', 'sistem_informasi.nama', 'sistem_informasi.email')
            ->orderBy('id_si', 'DESC')
            ->limit(15)
            ->get();
        return $query;
    }
    public function detail($id_si)
    {
        $query = DB::table('sistem_informasi')
            ->join('users', 'users.id_user', '=', 'sistem_informasi.id_user', 'LEFT')
            ->select('sistem_informasi.*', 'sistem_informasi.nidn', 'sistem_informasi.nik_nip', 'sistem_informasi.nama', 'sistem_informasi.email')
            ->where('sistem_informasi.id_si', $id_si)
            ->orderBy('id_si', 'DESC')
            ->first();
        return $query;
    }


    // // listing
    public function cari($keywords)
    {
        $query = DB::table('sistem_informasi')
             ->join('users', 'users.id_user', '=', 'sistem_informasi.id_user', 'LEFT')
             ->select('sistem_informasi.*', 'sistem_informasi.nidn', 'sistem_informasi.nik_nip', 'sistem_informasi.nama', 'sistem_informasi.email')
            ->where('sistem_informasi.nama', 'LIKE', "%{$keywords}%")
            ->orderBy('id_si', 'DESC')
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
