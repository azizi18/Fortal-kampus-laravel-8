@extends('layout.head')
@section('content')
    <section id="berita" class="d-flex align-items-center isi-mahasiswa">
        <div class="container">
            <h1 class="mt-5 text-center">Berita</h1>
            <?php foreach($berita as $berita) { ?>
                <?php if($berita->status_berita=="Publish") { ?>
            <p> <?php echo $berita->nama; ?>| <?php echo date('M d Y ', strtotime($berita->tanggal_publish)); ?>
                | <?php echo $berita->jenis_berita; ?> | 0 Comments</p>
            <div class="berita" href="#faq1">

                <a href="{{ asset('berita/read/' . $berita->slug_berita) }}">
                    <h4 class="fw-bold"><i class="bi bi-camera-fill icon-camera"> </i><?php echo $berita->judul_berita; ?> </h4>
                </a>
            </div>
           
            <h6><?php echo $berita->isi; ?></h6>

            <div class="read-more" href="#faq1">
                <a href="{{ asset('berita/read/' . $berita->slug_berita) }}">
                    <p class="fw-bold">Read More<i class="bi bi-chevron-right">
                        </i></p>
                </a>
                <div class="share d-flex justify-content-end gap-4">
                    <div class="post">          
                        <div class="share-icon">
                            <i class="fas fa-share-alt"></i>
                            <div class="share-container">
                                {!! $linkButton !!}
                            </div>
                        </div>
                    </div>
                <div class="like-heart">
                <i class="bi bi-heart-fill"></i>
            </div>
            
            </div>
            </div>
            <?php } ?>
            <?php } ?>
            <div class="gt-pagination">
                {{ $ber->links() }}
            </div>
        </div>
    
   

    </section>
@endsection
