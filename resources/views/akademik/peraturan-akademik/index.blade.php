@extends('layout.head')
@section('content')
    <section id="sejarah" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1 class="text-center mt-5">{{ $title }}</h1>
            <?php  foreach($akademik as $akademik) { ?>
                 <div class="isi">
                    <?php echo $akademik->isi ?>
                </div> 
                <?php } ?>
                </div>
        </div>
    </section><!-- End Banner -->
@endsection
