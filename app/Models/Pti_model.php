<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pti_model extends Model
{
    protected $table         = "pti";
    protected $primaryKey     = 'id_pti';
    public $timestamps = false;

    protected $fillable = [
        
        'nidn',
        'nik_nip',
        'nama',
        'email',
       
    ];



    public function semua()
    {
        $query = DB::table('pti')
        ->join('users', 'users.id_user', '=', 'pti.id_user', 'LEFT')
            ->select('pti.*', 'pti.nidn', 'pti.nik_nip', 'pti.nama', 'pti.email')
            ->orderBy('pti.id_pti', 'DESC')
            ->get();
        return $query;
    }
    // listing
    public function home()
    {
        $query = DB::table('pti')
            ->join('users', 'users.id_user', '=', 'pti.id_user', 'LEFT')
            ->select('pti.*', 'pti.nidn', 'pti.nik_nip', 'pti.nama', 'pti.email')
            ->orderBy('id_pti', 'DESC')
            ->limit(15)
            ->get();
        return $query;
    }
    public function detail($id_pti)
    {
        $query = DB::table('pti')
            ->join('users', 'users.id_user', '=', 'pti.id_user', 'LEFT')
            ->select('pti.*', 'pti.nidn', 'pti.nik_nip', 'pti.nama', 'pti.email')
            ->where('pti.id_pti', $id_pti)
            ->orderBy('id_pti', 'DESC')
            ->first();
        return $query;
    }


    // // listing
    public function cari($keywords)
    {
        $query = DB::table('pti')
             ->join('users', 'users.id_user', '=', 'pti.id_user', 'LEFT')
             ->select('pti.*', 'pti.nidn', 'pti.nik_nip', 'pti.nama', 'pti.email')
            ->where('pti.nama', 'LIKE', "%{$keywords}%")
            ->orderBy('id_pti', 'DESC')
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
