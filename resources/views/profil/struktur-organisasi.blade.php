<?php 
use Illuminate\Support\Facades\DB;

$rektor = DB::table('staff')->first();
$pim = DB::table('wakilrektor_staff')->get();
$dekan = DB::table('dekan_staff')->get();
$prodi = DB::table('prodi_staff')->get();
$gambar = DB::table('gambar_struktur')->first();

?>
@extends('layout.head')
@section('content')
    <section id="struktur" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1 class="struktur-title">Struktur Organisasi</h1>
            <div class="mb-5 img-struktur">
                <img src="{{ asset('assets/upload/image/' . $gambar->gambar) }}" style="width: 100%"
                alt="">            
            </div>
            <p class="fw-bold fs-6">PENGELOLA UNIVERSITAS</p>
            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-md-3 ">
                    <ul class="menu">
                        <div class="menu-item active">PIMPINAN UNIVERSITAS</div>
                        <div class="menu-item">DEKAN UNIVERSITAS</div>
                        <div class="menu-item">Kepala Program Studi</div>
                    </ul>
                </div>

                <div class="col-md-9 mt-2">
                    <div id="content">
                        <div class="content-item" data-aos="fade-up" data-aos-delay="100">
                            <div class="row justify-content-center align-items-center">
                            <div class="col-md-4 mt-4">
                                <?php if($rektor->status_staff=="Ya") { ?>
                              <div class="card  mx-auto" style="width: 18rem;">
                                <div class="img-top">
                                    <img src="{{ asset('assets/upload/staff/'.$rektor->gambar) }}" class="img-fluid"
                                        style="height:276px" alt="{{ $rektor->nama_staff }}">
                                    <div class="card-body">
                                        <p class="card-text">{{ $rektor->nama_staff }}</p>
                                        <p class="nik">NIK/NIP : {{ $rektor->nik }}</p>
                                        <p class="rektor">{{ $rektor->jabatan }}</p>
                                    </div>
                                </div>
                              </div>
                              <?php } ?>
                            </div>
                            </div>
                            <div class="row justify-content-center align-items-center">
                                <?php foreach($pim->take(3) as $pim) { ?>
                                <div class="col-md-4 mt-4">
                                    <div class="card  mx-auto" style="width: 18rem;">
                                        <div class="img-top">
                                            <img src="{{ asset('assets/upload/staff/'.$pim->gambar) }}" class="img-fluid"
                                                style="height:276px" alt="">
                                            <div class="card-body">
                                                <p class="card-text">{{ $pim->nama_staff }}</p>
                                                <p class="nik">NIK/NIP : {{ $pim->nik }}</p>
                                                <p class="rektor">{{ $pim->jabatan }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                             </div>
                        </div>
                        <div class="content-item hidden">
                            <div class="row" data-aos="fade-up" data-aos-delay="100">
                                <?php foreach($dekan->take(3) as $dekan) { ?>
                                <div class="col-md-4 mt-4">
                                    <div class="card  mx-auto" style="width: 18rem;">
                                        <div class="">
                                            <img src="{{ asset('assets/upload/staff/'.$dekan->gambar) }}" class="img-fluid"
                                                style="height:276px" alt="">
                                            <div class="card-body">
                                                <p class="card-text">{{ $dekan->nama_staff }}</p>
                                                <p class="nik">NIK/NIP : {{ $dekan->nik }}</p>
                                                <p class="rektor">{{ $dekan->jabatan }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                               
                            </div>
                        </div>
                        <div class="content-item hidden">
                            <?php foreach($kategori_staff as $kategori_staff) { 
                                $id_kategori_staff = $kategori_staff->id_kategori_staff;
                                $staff    = DB::table('prodi_staff')->where(array('status_staff'=>'Ya','id_kategori_staff'=>$id_kategori_staff))->orderBy('urutan','ASC')->get();
                                if($staff) {
                                ?>
                            <div class="mt-3">
                                <p class="fw-bold fs-6">{{ $kategori_staff->nama_kategori_staff }}</p>
                            </div>
                            <div class="row justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="100">
                                <?php foreach($staff as $staff) { ?>
                                <div class="col-md-4 card-kaprodi">
                                    <div class="card  mx-auto" style="width: 12rem;">
                                        <div class="">
                                            <img src="{{ asset('assets/upload/staff/'.$staff->gambar) }}" class="img-fluid"
                                                style="height:276px" alt="">
                                            <div class="card-body">
                                                <p class="card-text">{{ $staff->nama_staff }}</p>
                                                <p class="nik">NIK/NIP : {{ $staff->nik }}</p>
                                                <p class="rektor"> {{ $staff->jabatan }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php }} ?>
                                </div>
                            </div>
                        </div>
                    </div>
    </section><!-- End Banner -->
@endsection
