
@extends('layout.head')
@section('content')
    <section id="fasilitas" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1 class="fw-bold mt-5 text-center">Fasilitas Kampus</h1>
            <div class="container" data-aos="fade-up">
                <iframe width="100%" height="456" class="frame-last mt-4"
                    src="https://www.youtube.com/embed/_5ccf9ldxwQ?si=Xpd5OonIlIoALG5K" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>
            <div class="row mt-3" data-aos="fade-up" data-aos-delay="100">
            <?php foreach($fasilitas as $fasilitas) { ?>
                    <div class="col-md-3" data-aos="fade-right" data-aos-delay="100">
                        <img src="{{ asset('assets/upload/image/' . $fasilitas->gambar) }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-3 d-flex flex-column" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="fw-bold judul-fasilitas">
                            <?php echo $fasilitas->judul_fasilitas; ?></h3>
                        <p class="desc-fasilitas">
                            <?php echo $fasilitas->isi; ?>
                        </p>
                    </div>
                    <?php } ?>
                </div>
            </div>
    </section><!-- End Banner -->
@endsection
