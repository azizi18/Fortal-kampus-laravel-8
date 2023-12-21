<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dkv_model extends Model
{
    protected $table         = "dkv";
    protected $primaryKey     = 'id_dkv';
    public $timestamps = false;

    protected $fillable = [
        
        'nidn',
        'nik_nip',
        'nama',
        'email',
       
    ];



    public function semua()
    {
        $query = DB::table('dkv')
        ->join('users', 'users.id_user', '=', 'dkv.id_user', 'LEFT')
            ->select('dkv.*', 'dkv.nidn', 'dkv.nik_nip', 'dkv.nama', 'dkv.email')
            ->orderBy('dkv.id_dkv', 'DESC')
            ->get();
        return $query;
    }
    // listing
    public function home()
    {
        $query = DB::table('dkv')
            ->join('users', 'users.id_user', '=', 'dkv.id_user', 'LEFT')
            ->select('dkv.*', 'dkv.nidn', 'dkv.nik_nip', 'dkv.nama', 'dkv.email')
            ->orderBy('id_dkv', 'DESC')
            ->limit(15)
            ->get();
        return $query;
    }
    public function detail($id_dkv)
    {
        $query = DB::table('dkv')
            ->join('users', 'users.id_user', '=', 'dkv.id_user', 'LEFT')
            ->select('dkv.*', 'dkv.nidn', 'dkv.nik_nip', 'dkv.nama', 'dkv.email')
            ->where('dkv.id_dkv', $id_dkv)
            ->orderBy('id_dkv', 'DESC')
            ->first();
        return $query;
    }


    // // listing
    public function cari($keywords)
    {
        $query = DB::table('dkv')
             ->join('users', 'users.id_user', '=', 'dkv.id_user', 'LEFT')
             ->select('dkv.*', 'dkv.nidn', 'dkv.nik_nip', 'dkv.nama', 'dkv.email')
            ->where('dkv.nama', 'LIKE', "%{$keywords}%")
            ->orderBy('id_dkv', 'DESC')
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
