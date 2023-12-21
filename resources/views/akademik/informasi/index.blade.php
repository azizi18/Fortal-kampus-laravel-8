@extends('layout.head')
@section('content')
    <section id="sejarah" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1 class="mt-5 text-center">{{ $title }}</h1>
            <div class="row justify-content-center align-item-center" data-aos="fade-up" data-aos-delay="100">
                
                    <?php  foreach($kalender as $kalender) { ?>
                     <div class="isi">
                        <?php echo $kalender->isi ?>
                    </div> 
                    <?php } ?>
                    </div>
               
               
            </div>
    </section>
@endsection
