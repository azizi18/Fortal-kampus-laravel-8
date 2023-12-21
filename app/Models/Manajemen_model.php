<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Manajemen_model extends Model
{
    protected $table         = "manajemen";
    protected $primaryKey     = 'id_man';
    public $timestamps = false;

    protected $fillable = [
        
        'nidn',
        'nik_nip',
        'nama',
        'email',
       
    ];



    public function semua()
    {
        $query = DB::table('manajemen')
        ->join('users', 'users.id_user', '=', 'manajemen.id_user', 'LEFT')
            ->select('manajemen.*', 'manajemen.nidn', 'manajemen.nik_nip', 'manajemen.nama', 'manajemen.email')
            ->orderBy('manajemen.id_man', 'DESC')
            ->get();
        return $query;
    }
    // listing
    public function home()
    {
        $query = DB::table('manajemen')
            ->join('users', 'users.id_user', '=', 'manajemen.id_user', 'LEFT')
            ->select('manajemen.*', 'manajemen.nidn', 'manajemen.nik_nip', 'manajemen.nama', 'manajemen.email')
            ->orderBy('id_man', 'DESC')
            ->limit(15)
            ->get();
        return $query;
    }
    public function detail($id_man)
    {
        $query = DB::table('manajemen')
            ->join('users', 'users.id_user', '=', 'manajemen.id_user', 'LEFT')
            ->select('manajemen.*', 'manajemen.nidn', 'manajemen.nik_nip', 'manajemen.nama', 'manajemen.email')
            ->where('manajemen.id_man', $id_man)
            ->orderBy('id_man', 'DESC')
            ->first();
        return $query;
    }


    // // listing
    public function cari($keywords)
    {
        $query = DB::table('manajemen')
             ->join('users', 'users.id_user', '=', 'manajemen.id_user', 'LEFT')
             ->select('manajemen.*', 'manajemen.nidn', 'manajemen.nik_nip', 'manajemen.nama', 'manajemen.email')
            ->where('manajemen.nama', 'LIKE', "%{$keywords}%")
            ->orderBy('id_man', 'DESC')
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