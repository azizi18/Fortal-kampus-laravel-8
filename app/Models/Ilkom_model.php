<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ilkom_model extends Model
{
    protected $table         = "ilmu_komputer";
    protected $primaryKey     = 'id_ilkom';
    public $timestamps = false;

    protected $fillable = [
        
        'nidn',
        'nik_nip',
        'nama',
        'email',
       
    ];



    public function semua()
    {
        $query = DB::table('ilmu_komputer')
        ->join('users', 'users.id_user', '=', 'ilmu_komputer.id_user', 'LEFT')
            ->select('ilmu_komputer.*', 'ilmu_komputer.nidn', 'ilmu_komputer.nik_nip', 'ilmu_komputer.nama', 'ilmu_komputer.email')
            ->orderBy('ilmu_komputer.id_ilkom', 'DESC')
            ->get();
        return $query;
    }
    // listing
    public function home()
    {
        $query = DB::table('ilmu_komputer')
            ->join('users', 'users.id_user', '=', 'ilmu_komputer.id_user', 'LEFT')
            ->select('ilmu_komputer.*', 'ilmu_komputer.nidn', 'ilmu_komputer.nik_nip', 'ilmu_komputer.nama', 'ilmu_komputer.email')
            ->orderBy('id_ilkom', 'DESC')
            ->limit(15)
            ->get();
        return $query;
    }
    public function detail($id_ilkom)
    {
        $query = DB::table('ilmu_komputer')
            ->join('users', 'users.id_user', '=', 'ilmu_komputer.id_user', 'LEFT')
            ->select('ilmu_komputer.*', 'ilmu_komputer.nidn', 'ilmu_komputer.nik_nip', 'ilmu_komputer.nama', 'ilmu_komputer.email')
            ->where('ilmu_komputer.id_ilkom', $id_ilkom)
            ->orderBy('id_ilkom', 'DESC')
            ->first();
        return $query;
    }


    // // listing
    public function cari($keywords)
    {
        $query = DB::table('ilmu_komputer')
             ->join('users', 'users.id_user', '=', 'ilmu_komputer.id_user', 'LEFT')
             ->select('ilmu_komputer.*', 'ilmu_komputer.nidn', 'ilmu_komputer.nik_nip', 'ilmu_komputer.nama', 'ilmu_komputer.email')
            ->where('ilmu_komputer.nama', 'LIKE', "%{$keywords}%")
            ->orderBy('id_ilkom', 'DESC')
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
    public function gambar($id_fasilitas)
    {
        $query = DB::table('ilmu_komputer')
            ->select('*')
            ->where('gambar.id_fasilitas', $id_fasilitas)
            ->orderBy('id_fasilitas', 'DESC')
            ->get();
        return $query;
    }
}
