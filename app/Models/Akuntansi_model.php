<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Akuntansi_model extends Model
{
    protected $table         = "akuntansi";
    protected $primaryKey     = 'id_aku';
    public $timestamps = false;

    protected $fillable = [
        
        'nidn',
        'nik_nip',
        'nama',
        'email',
       
    ];



    public function semua()
    {
        $query = DB::table('akuntansi')
        ->join('users', 'users.id_user', '=', 'akuntansi.id_user', 'LEFT')
            ->select('akuntansi.*', 'akuntansi.nidn', 'akuntansi.nik_nip', 'akuntansi.nama', 'akuntansi.email')
            ->orderBy('akuntansi.id_aku', 'DESC')
            ->get();
        return $query;
    }
    // listing
    public function home()
    {
        $query = DB::table('akuntansi')
            ->join('users', 'users.id_user', '=', 'akuntansi.id_user', 'LEFT')
            ->select('akuntansi.*', 'akuntansi.nidn', 'akuntansi.nik_nip', 'akuntansi.nama', 'akuntansi.email')
            ->orderBy('id_aku', 'DESC')
            ->limit(15)
            ->get();
        return $query;
    }
    public function detail($id_aku)
    {
        $query = DB::table('akuntansi')
            ->join('users', 'users.id_user', '=', 'akuntansi.id_user', 'LEFT')
            ->select('akuntansi.*', 'akuntansi.nidn', 'akuntansi.nik_nip', 'akuntansi.nama', 'akuntansi.email')
            ->where('akuntansi.id_aku', $id_aku)
            ->orderBy('id_aku', 'DESC')
            ->first();
        return $query;
    }


    // // listing
    public function cari($keywords)
    {
        $query = DB::table('akuntansi')
             ->join('users', 'users.id_user', '=', 'akuntansi.id_user', 'LEFT')
             ->select('akuntansi.*', 'akuntansi.nidn', 'akuntansi.nik_nip', 'akuntansi.nama', 'akuntansi.email')
            ->where('akuntansi.nama', 'LIKE', "%{$keywords}%")
            ->orderBy('id_aku', 'DESC')
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
