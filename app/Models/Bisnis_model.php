<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bisnis_model extends Model
{
    protected $table         = "bisnis_digital";
    protected $primaryKey     = 'id_bis';
    public $timestamps = false;

    protected $fillable = [
        
        'nidn',
        'nik_nip',
        'nama',
        'email',
       
    ];



    public function semua()
    {
        $query = DB::table('bisnis_digital')
        ->join('users', 'users.id_user', '=', 'bisnis_digital.id_user', 'LEFT')
            ->select('bisnis_digital.*', 'bisnis_digital.nidn', 'bisnis_digital.nik_nip', 'bisnis_digital.nama', 'bisnis_digital.email')
            ->orderBy('bisnis_digital.id_bis', 'DESC')
            ->get();
        return $query;
    }
    // listing
    public function home()
    {
        $query = DB::table('bisnis_digital')
            ->join('users', 'users.id_user', '=', 'bisnis_digital.id_user', 'LEFT')
            ->select('bisnis_digital.*', 'bisnis_digital.nidn', 'bisnis_digital.nik_nip', 'bisnis_digital.nama', 'bisnis_digital.email')
            ->orderBy('id_bis', 'DESC')
            ->limit(15)
            ->get();
        return $query;
    }
    public function detail($id_bis)
    {
        $query = DB::table('bisnis_digital')
            ->join('users', 'users.id_user', '=', 'bisnis_digital.id_user', 'LEFT')
            ->select('bisnis_digital.*', 'bisnis_digital.nidn', 'bisnis_digital.nik_nip', 'bisnis_digital.nama', 'bisnis_digital.email')
            ->where('bisnis_digital.id_bis', $id_bis)
            ->orderBy('id_bis', 'DESC')
            ->first();
        return $query;
    }


    // // listing
    public function cari($keywords)
    {
        $query = DB::table('bisnis_digital')
             ->join('users', 'users.id_user', '=', 'bisnis_digital.id_user', 'LEFT')
             ->select('bisnis_digital.*', 'bisnis_digital.nidn', 'bisnis_digital.nik_nip', 'bisnis_digital.nama', 'bisnis_digital.email')
            ->where('bisnis_digital.nama', 'LIKE', "%{$keywords}%")
            ->orderBy('id_bis', 'DESC')
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
