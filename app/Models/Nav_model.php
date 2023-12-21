<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nav_model extends Model
{

   
    // Main page
    public function nav_profil()
    {
    	$query = DB::table('berita')
            ->join('kategori', 'kategori.id_kategori', '=', 'berita.id_kategori','LEFT')
            ->select('berita.*', 'kategori.slug_kategori', 'kategori.nama_kategori')
            ->where(array(	'berita.status_berita'	=> 'Publish',
                            'berita.jenis_berita'  => 'Profil'))
            ->orderBy('berita.id_berita','DESC')
            ->get();
        return $query;
    }

    // Main page
    public function nav_berita()
    {
        $query = DB::table('kategori')
            ->orderBy('kategori.urutan','DESC')
            ->get();
        return $query;
    }

    // Main page
    public function nav_materi()
    {
        $query = DB::table('kategori_download')
            ->orderBy('kategori_download.urutan','ASC')
            ->get();
        return $query;
    }
        // Main page
        public function nav_kalender()
        {
            $query = DB::table('kategori_kalender')
                ->orderBy('kategori_kalender.urutan','ASC')
                ->get();
            return $query;
        }

     // Main page
     public function nav_akademik()
     {
         $query = DB::table('kategori_akademik')
             ->orderBy('kategori_akademik.urutan','ASC')
             ->get();
         return $query;
     }
      // Main page
      public function nav_kemahasiswaan()
      {
          $query = DB::table('kategori_kemahasiswaan')
              ->orderBy('kategori_kemahasiswaan.urutan','ASC')
              ->get();
          return $query;
      }
        // Main page
    public function nav_isi()
    {
        $query = DB::table('visi_misi')
        ->orderBy('visi_misi.urutan','ASC')
            ->get();
        return $query;
    }
         // Main page
         public function nav_vismis()
         {
             $query = DB::table('kategori_vismis')
             ->orderBy('kategori_vismis.urutan','ASC')
                 ->get();
             return $query;
         }

 
     // Main page
     public function nav_pengumuman()
     {
         $query = DB::table('berita')
             ->join('kategori', 'kategori.id_kategori', '=', 'berita.id_kategori','LEFT')
             ->select('berita.*', 'kategori.slug_kategori', 'kategori.nama_kategori')
             ->where(array(  'berita.status_berita'  => 'Publish',
                             'berita.jenis_berita'  => 'pengumuman'))
             ->orderBy('berita.urutan','ASC')
             ->get();
         return $query;
     }

    // Main page
    public function nav_jenis($jenis_berita)
    {
        $query = DB::table('berita')
            ->join('kategori', 'kategori.id_kategori', '=', 'berita.id_kategori','LEFT')
            ->select('berita.*', 'kategori.slug_kategori', 'kategori.nama_kategori')
            ->where(array(  'berita.status_berita'  => 'Publish',
                            'berita.jenis_berita'  => $jenis_berita))
            ->orderBy('berita.urutan','ASC')
            ->get();
        return $query;
    }
}
