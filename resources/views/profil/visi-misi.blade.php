<?php
use Illuminate\Support\Facades\DB;
use App\Models\Nav_model;
$site                 = DB::table('konfigurasi')->first();
// Nav profil
$myprofil    = new Nav_model();
$nav_vismis  = $myprofil->nav_vismis();
$nav_isi  = $myprofil->nav_isi();

?>
@extends('layout.head')
@section('content')
    <section id="sejarah" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-in" data-aos-delay="100">
            <h1>Visi & Misi</h1>
            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-md-4">
                    <iframe class="mt-5"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.046584392539!2d116.1138633736998!3d-8.591519787220504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcdbf5c2462a5ed%3A0xbc0f44d683d529b1!2sUniversitas%20Bumigora!5e0!3m2!1sid!2sid!4v1698462619346!5m2!1sid!2sid"
                        style="border:0; width: 100%; height: 345px;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-2 mt-5 ">
                    
                  <ul class="menu">
                        @foreach($nav_vismis as $key => $nav_vismis)
                    <a href="#{{$nav_vismis->slug_kategori_vismis }}"><div class="menu-item {{$key == '0' ? 'active':''}}">{{ $nav_vismis->nama_kategori_vismis }}</div></a>
                    @endforeach
                </ul>
                </div>
                <div class="col-md-6 mt-5 ">
                    <div id="content">
                        <?php  foreach($vismis as  $key =>$vismis) { ?>
                        <div class="content-item {{$key >'0' ? 'hidden':''}}" data-aos="fade-up" data-aos-delay="100">
                            <?php echo $vismis->isi ?>
                        </div>
                        <?php } ?>
                      
                       

                    </div>
                </div> 
            </div>
        </div>

        </ul>

        </div>
        </div>
        </div>
    </section><!-- End Banner -->
   
@endsection
