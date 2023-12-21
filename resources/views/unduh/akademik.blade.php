
@extends('layout.head')
@section('content')
    <section id="unduh" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1 class="text-center">Akademik</h1>
            <div class="row justify-content-center align-item-center" data-aos="fade-up" data-aos-delay="100">
                <div class="mt-5">
                  <?php $i=1; foreach($downloads as $download) { ?>
                    <div class="btn-jurusan">
                        <a href="<?php echo $download->link ?>"><i
                                class="bi bi-arrow-down-circle  icon-download"></i> <span class="mx-1 "><?php echo $download->judul_download ?></span></a>
                    </div>
                    <?php $i++; } ?>
                    
                    </div>
                </div>
                <div class="gt-pagination">
                  <br><br>
                  {{ $downloads->links() }}
               </div>
            </div>
    </section>
@endsection