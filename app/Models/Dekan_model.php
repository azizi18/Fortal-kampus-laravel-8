<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dekan_model extends Model
{

    protected $table         = "dekan_staff";
    protected $primaryKey     = 'id_staff';

    // listing
    public function semua()
    {
        $query = DB::table('dekan_staff')
            // ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'dekan_staff.id_kategori_staff', 'LEFT')
            ->select('dekan_staff.*')
            ->orderBy('dekan_staff.id_staff', 'DESC')
            ->get();
        return $query;
    }

    // listing
    public function cari($keywords)
    {
        $query = DB::table('dekan_staff')
            // ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'dekan_staff.id_kategori_staff', 'LEFT')
            ->select('dekan_staff.*')
            ->where('dekan_staff.nama_staff', 'LIKE', "%{$keywords}%")
            ->orWhere('dekan_staff.isi', 'LIKE', "%{$keywords}%")
            ->orderBy('id_staff', 'DESC')
            ->get();
        return $query;
    }

    // listing
    public function listing()
    {
        $query = DB::table('dekan_staff')
            // ->join('users', 'users.id_user', '=', 'dekan_staff.id_user', 'LEFT')
            ->select('dekan_staff.*', 'dekan_staff.slug_staff ', 'dekan_staff.nama_staff ')
            ->where(array('dekan_staff.status_staff' => 'dekan_staff'))
            ->orderBy('id_staff', 'DESC')
            ->paginate(12);
        return $query;
    }
    // listing
    public function home()
    {
        $query = DB::table('dekan_staff')
            // ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'dekan_staff.id_kategori_staff', 'LEFT')
            ->join('users', 'users.id_user', '=', 'dekan_staff.id_user', 'LEFT')
            ->select('dekan_staff.*')

            ->orderBy('id_staff', 'DESC')
            ->limit(15)
            ->get();
        return $query;
    }

    // // kategori
    // public function kategori_staff($id_kategori_staff)
    // {
    //     $query = DB::table('dekan_staff')
    //         // ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'dekan_staff.id_kategori_staff', 'LEFT')
    //         ->select('dekan_staff.*')
    //         ->where(array(
    //             'dekan_staff.status_staff'         => 'Publish',
    //             'dekan_staff.id_kategori_staff'    => $id_kategori_staff
    //         ))
    //         ->orderBy('id_staff', 'DESC')
    //         ->get();
    //     return $query;
    // }

    // Kategori
    // public function kategori()
    // {
    //     $query = DB::table('dekan_staff')
    //         ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'dekan_staff.id_kategori_staff')
    //         ->select('dekan_staff.*', 'kategori_staff.slug_kategori_staff', 'kategori_staff.nama_kategori_staff')
    //         ->where(array('dekan_staff.status_staff'         => 'Publish'))
    //         ->groupBy('dekan_staff.id_kategori_staff')
    //         ->orderBy('kategori_staff.urutan', 'ASC')
    //         ->get();
    //     return $query;
    // }
    // public function kategori_depan($id_kategori_staff)
    // {
    //     $query = DB::table('dekan_staff')
    //         ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'dekan_staff.id_kategori_staff', 'LEFT')
    //         ->join('users', 'users.id_user', '=', 'dekan_staff.id_user', 'LEFT')
    //         ->select('dekan_staff.*', 'kategori_staff.slug_staff', 'kategori_staff.nama_kategori_staff', 'users.nama')
    //         ->where(array(
    //             'dekan_staff.id_kategori_staff'    => $id_kategori_staff,
               
    //         ))
    //         ->orderBy('id_staff', 'DESC')
    //         ->paginate(4);
    //     return $query;
    // }


    // // kategori
    // public function all_kategori_staff($id_kategori_staff)
    // {
    //     $query = DB::table('dekan_staff')
    //         ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'dekan_staff.id_kategori_staff', 'LEFT')
    //         ->select('dekan_staff.*', 'kategori_staff.slug_kategori_staff', 'kategori_staff.nama_kategori_staff')
    //         ->where(array('dekan_staff.id_kategori_staff'    => $id_kategori_staff))
    //         ->orderBy('id_staff', 'DESC')
    //         ->get();
    //     return $query;
    // }

    // // kategori
    // public function status_staff($status_staff)
    // {
    //     $query = DB::table('dekan_staff')
    //         ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'dekan_staff.id_kategori_staff', 'LEFT')
    //         ->select('dekan_staff.*', 'kategori_staff.slug_kategori_staff', 'kategori_staff.nama_kategori_staff')
    //         ->where(array('dekan_staff.status_staff'         => $status_staff))
    //         ->orderBy('id_staff', 'DESC')
    //         ->get();
    //     return $query;
    // }

    // // kategori
    // public function detail_kategori_staff($id_kategori_staff)
    // {
    //     $query = DB::table('dekan_staff')
    //         ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'dekan_staff.id_kategori_staff', 'LEFT')
    //         ->select('dekan_staff.*', 'kategori_staff.slug_kategori_staff', 'kategori_staff.nama_kategori_staff')
    //         ->where(array(
    //             'dekan_staff.status_staff'         => 'Publish',
    //             'dekan_staff.id_kategori_staff'    => $id_kategori_staff
    //         ))
    //         ->orderBy('id_staff', 'DESC')
    //         ->first();
    //     return $query;
    // }

    // // kategori
    // public function detail_slug_kategori_staff($slug_kategori_staff)
    // {
    //     $query = DB::table('dekan_staff')
    //         ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'dekan_staff.id_kategori_staff', 'LEFT')
    //         ->select('dekan_staff.*', 'kategori_staff.slug_kategori_staff', 'kategori_staff.nama_kategori_staff')
    //         ->where(array(
    //             'dekan_staff.status_staff'                  => 'Publish',
    //             'kategori_staff.slug_kategori_staff'  => $slug_kategori_staff
    //         ))
    //         ->orderBy('id_staff', 'DESC')
    //         ->first();
    //     return $query;
    // }


    // // kategori
    // public function slug_kategori_staff($slug_kategori_staff)
    // {
    //     $query = DB::table('dekan_staff')
    //         ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'dekan_staff.id_kategori_staff', 'LEFT')
    //         ->select('dekan_staff.*', 'kategori_staff.slug_kategori_staff', 'kategori_staff.nama_kategori_staff')
    //         ->where(array(
    //             'dekan_staff.status_staff'                  => 'Publish',
    //             'kategori_staff.slug_kategori_staff'  => $slug_kategori_staff
    //         ))
    //         ->orderBy('id_staff', 'DESC')
    //         ->get();
    //     return $query;
    // }

    // detail
    // public function read($slug_staff)
    // {
    //     $query = DB::table('dekan_staff')
    //         ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'dekan_staff.id_kategori_staff', 'LEFT')
    //         ->select('dekan_staff.*', 'kategori_staff.slug_kategori_staff', 'kategori_staff.nama_kategori_staff')
    //         ->where('dekan_staff.slug_staff', $slug_staff)
    //         ->orderBy('id_staff', 'DESC')
    //         ->first();
    //     return $query;
    // }

    // detail
    public function detail($id_staff)
    {
        $query = DB::table('dekan_staff')
            // ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'dekan_staff.id_kategori_staff', 'LEFT')
            ->select('dekan_staff.*')
            ->where('dekan_staff.id_staff', $id_staff)
            ->orderBy('id_staff', 'DESC')
            ->first();
        return $query;
    }

    // Gambar
    public function gambar($id_staff)
    {
        $query = DB::table('gambar_staff')
            ->select('*')
            ->where('gambar_staff.id_staff', $id_staff)
            ->orderBy('id_staff', 'DESC')
            ->get();
        return $query;
    }
}
