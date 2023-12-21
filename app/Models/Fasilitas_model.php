<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Fasilitas_model extends Model
{
    protected $table         = "fasilitas";
    protected $primaryKey     = 'id_fasilitas';

    public function semua()
    {
        $query = DB::table('fasilitas')

            // ->join('kategori_instagram', 'kategori_instagram.id_kategori_instagram', '=', 'instagram.id_kategori_instagram', 'LEFT')
            ->select('fasilitas.*', 'fasilitas.isi',  'fasilitas.urutan')
            ->orderBy('fasilitas.id_fasilitas', 'DESC')
            ->get();
        return $query;
    }
    // listing
    public function home()
    {
        $query = DB::table('fasilitas')
            ->join('users', 'users.id_user', '=', 'fasilitas.id_user', 'LEFT')
            ->select('fasilitas.*', 'fasilitas.isi',  'fasilitas.urutan')
            ->orderBy('id_fasilitas', 'DESC')
            ->limit(15)
            ->get();
        return $query;
    }
    public function detail($id_fasilitas)
    {
        $query = DB::table('fasilitas')
            ->join('users', 'users.id_user', '=', 'fasilitas.id_user', 'LEFT')
            ->select('fasilitas.*', 'fasilitas.isi',  'fasilitas.urutan')
            ->where('fasilitas.id_fasilitas', $id_fasilitas)
            ->orderBy('id_fasilitas', 'DESC')
            ->first();
        return $query;
    }


    // // listing
    public function cari($keywords)
    {
        $query = DB::table('fasilitas')
            ->select('fasilitas.*', 'fasilitas.isi',  'fasilitas.urutan')
            ->where('fasilitas.isi', 'LIKE', "%{$keywords}%")
            ->orWhere('fasilitas.isi', 'LIKE', "%{$keywords}%")
            ->orderBy('id_fasilitas', 'DESC')
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

    // // kategori
    // public function kategori_instagram($id_kategori_instagram)
    // {
    //     $query = DB::table('instagram')
    //         ->join('kategori_instagram', 'kategori_instagram.id_kategori_instagram', '=', 'instagram.id_kategori_instagram', 'LEFT')
    //         ->select('instagram.*', 'kategori_instagram.slug_kategori_instagram', 'kategori_instagram.nama_kategori_instagram')
    //         ->where(array(
    //             'instagram.status_instagram'         => 'Publish',
    //             'instagram.id_kategori_instagram'    => $id_kategori_instagram
    //         ))
    //         ->orderBy('id_instagram', 'DESC')
    //         ->get();
    //     return $query;
    // }

    // // kategori
    // public function all_kategori_instagram($id_kategori_instagram)
    // {
    //     $query = DB::table('instagram')
    //         ->join('kategori_instagram', 'kategori_instagram.id_kategori_instagram', '=', 'instagram.id_kategori_instagram', 'LEFT')
    //         ->select('instagram.*', 'kategori_instagram.slug_kategori_instagram', 'kategori_instagram.nama_kategori_instagram')
    //         ->where(array('instagram.id_kategori_instagram'    => $id_kategori_instagram))
    //         ->orderBy('id_instagram', 'DESC')
    //         ->get();
    //     return $query;
    // }

    // // kategori
    // public function status_instagram($status_instagram)
    // {
    //     $query = DB::table('instagram')
    //         ->join('kategori_instagram', 'kategori_instagram.id_kategori_instagram', '=', 'instagram.id_kategori_instagram', 'LEFT')
    //         ->select('instagram.*', 'kategori_instagram.slug_kategori_instagram', 'kategori_instagram.nama_kategori_instagram')
    //         ->where(array('instagram.jenis_instagram'         => $status_instagram))
    //         ->orderBy('id_instagram', 'DESC')
    //         ->get();
    //     return $query;
    // }

    // // kategori
    // public function detail_kategori_instagram($id_kategori_instagram)
    // {
    //     $query = DB::table('instagram')
    //         ->join('kategori_instagram', 'kategori_instagram.id_kategori_instagram', '=', 'instagram.id_kategori_instagram', 'LEFT')
    //         ->select('instagram.*', 'kategori_instagram.slug_kategori_instagram', 'kategori_instagram.nama_kategori_instagram')
    //         ->where(array(
    //             'instagram.status_instagram'         => 'Publish',
    //             'instagram.id_kategori_instagram'    => $id_kategori_instagram
    //         ))
    //         ->orderBy('id_instagram', 'DESC')
    //         ->first();
    //     return $query;
    // }

    // // kategori
    // public function detail_slug_kategori_instagram($slug_kategori_instagram)
    // {
    //     $query = DB::table('instagram')
    //         ->join('kategori_instagram', 'kategori_instagram.id_kategori_instagram', '=', 'instagram.id_kategori_instagram', 'LEFT')
    //         ->select('instagram.*', 'kategori_instagram.slug_kategori_instagram', 'kategori_instagram.nama_kategori_instagram')
    //         ->where(array(
    //             'instagram.status_instagram'                  => 'Publish',
    //             'kategori_instagram.slug_kategori_instagram'  => $slug_kategori_instagram
    //         ))
    //         ->orderBy('id_instagram', 'DESC')
    //         ->first();
    //     return $query;
    // }


    // // kategori
    // public function slug_kategori_instagram($slug_kategori_instagram)
    // {
    //     $query = DB::table('instagram')
    //         ->join('kategori_instagram', 'kategori_instagram.id_kategori_instagram', '=', 'instagram.id_kategori_instagram', 'LEFT')
    //         ->select('instagram.*', 'kategori_instagram.slug_kategori_instagram', 'kategori_instagram.nama_kategori_instagram')
    //         ->where(array(
    //             'instagram.status_instagram'                  => 'Publish',
    //             'kategori_instagram.slug_kategori_instagram'  => $slug_kategori_instagram
    //         ))
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
        $query = DB::table('fasilitas')
            ->select('*')
            ->where('gambar.id_fasilitas', $id_fasilitas)
            ->orderBy('id_fasilitas', 'DESC')
            ->get();
        return $query;
    }
}
