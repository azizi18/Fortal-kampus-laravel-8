<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Instagram_model extends Model
{
    protected $table         = "instagram";
    protected $primaryKey     = 'id_instagram';

    public function semua()
    {
        $query = DB::table('instagram')
             ->join('users', 'users.id_user', '=', 'instagram.id_user', 'LEFT')
            // ->join('kategori_instagram', 'kategori_instagram.id_kategori_instagram', '=', 'instagram.id_kategori_instagram', 'LEFT')
            ->select('instagram.*', 'instagram.gambar', 'instagram.link')
            ->orderBy('instagram.id_instagram', 'DESC')
            ->get();
        return $query;
    }
    // listing
    public function home()
    {
        $query = DB::table('instagram')
            ->join('users', 'users.id_user', '=', 'instagram.id_user', 'LEFT')
            ->select('instagram.*', 'instagram.gambar', 'instagram.link')
            ->orderBy('instagram.urutan','ASC')
            ->paginate(20);
        return $query;
    }
    public function detail($id_instagram)
    {
        $query = DB::table('instagram')
            ->select('instagram.*', 'instagram.gambar', 'instagram.link', 'instagram.urutan')
            ->where('instagram.id_instagram', $id_instagram)
            ->orderBy('id_instagram', 'DESC')
            ->first();
        return $query;
    }


    // // listing
    public function cari($keywords)
    {
        $query = DB::table('instagram')
            ->join('kategori_instagram', 'kategori_instagram.id_kategori_instagram', '=', 'instagram.id_kategori_instagram', 'LEFT')
            ->select('instagram.*', 'kategori_instagram.slug_kategori_instagram', 'kategori_instagram.nama_kategori_instagram')
            ->where('instagram.judul_instagram', 'LIKE', "%{$keywords}%")
            ->orWhere('instagram.isi', 'LIKE', "%{$keywords}%")
            ->orderBy('id_instagram', 'DESC')
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
    // public function gambar($id_instagram)
    // {
    //     $query = DB::table('gambar')
    //         ->select('*')
    //         ->where('gambar_instagram.id_instagram', $id_instagram)
    //         ->orderBy('id_instagram', 'DESC')
    //         ->get();
    //     return $query;
    // }
}
