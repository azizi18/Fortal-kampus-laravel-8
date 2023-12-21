@extends('layout.head')
@section('content')
<section id="portfolio" class="portfolio p-5">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h1 class="mt-5 text-center">Photo</h1>
        <div class="row mt-4" data-aos="fade-up" data-aos-delay="100">
            <?php foreach($instagram as $instagram) { ?>
                <div class="col-md-3 mb-4">
                    <a href="<?php echo $instagram->link; ?>">
                        <img src="{{ asset('assets/upload/image/' . $instagram->gambar) }}" class="img-fluid"
                            alt="">
                    </a>
                </div>
                <?php } ?>
        </div>
        <div class="btn-ig">
            <a href="https://www.instagram.com/universitasbumigora/"><i class="bi bi-instagram"></i> <span>Follow
                    on Instagram</span></a>
        </div>
    </div>
    </div>

</section>
@endsection
