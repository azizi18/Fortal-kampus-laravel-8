@extends('layout.head')
@section('content')
    <section id="sejarah" class="d-flex align-items-center">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <h1>Sejarah</h1>
            <?php  foreach($sejarah as $sejarah) { ?>
            <H2><?php echo $sejarah->judul ?></H2>
            <div>
                <?php echo $sejarah->isi ?>
            </div>
            <?php } ?>
            
            </div>
    </section><!-- End Banner -->
@endsection
