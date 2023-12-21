
@extends('layout.head')
@section('content')
    <section id="sejarah" class="d-flex align-items-center">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <h1 class="">{{$title}}</h1>
            <?php  foreach($kemahasiswaan as $kemahasiswaan) { ?>
                <div class="isi-mahasiswa">
                    <?php echo $kemahasiswaan->isi ?>
                </div>
                <?php } ?>
               
                
              
        </div>
    </section>
@endsection
