
@extends('layout.head')
@section('content')
    <section id="pengumuman" class="isi-mahasiswa">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1 class="mt-5 text-center">Pengumuman</h1>
            <div id="dataContainer">
            <div class="row" data-aos="fade-up" data-aos-delay="50">
                <?php foreach($pengumuman as $pengumuman) { ?>
                    <?php if($pengumuman->status_pengumuman=="Publish") { ?>

                <div class="col-lg-4 mt-4" data-post-id="{{ $pengumuman->id_pengumuman }}">
                    <p><?php echo $pengumuman->nama; ?>| <?php echo date('M d Y ', strtotime($pengumuman->tanggal_publish)); ?> |<?php echo $pengumuman->jenis_pengumuman; ?> | 0
                        comments
                    </p>
                    <div class="berita" href="#faq1">
                        <a href="{{ asset('pengumuman/read/' . $pengumuman->slug_pengumuman) }}">
                            <h4 class="fw-bold"><?php echo $pengumuman->judul_pengumuman; ?>
                            </h4>
                        </a>
                    </div>
                    <h6 class="mt-4"><?php echo \Illuminate\Support\Str::limit(strip_tags($pengumuman->isi), 100, $end = '...'); ?></h6>
                
                    <div class="read-more mt-2" href="#faq1">
                        <a href="{{ asset('pengumuman/read/' . $pengumuman->slug_pengumuman) }}">
                            <p class="fw-bold">Read More<i class="bi bi-chevron-right">
                                </i></p>
                        </a>
                        <div class="share d-flex justify-content-end gap-4">
                            <div class="post">
                                <div class="share-icon">
                                    <i class="fas fa-share-alt"></i>
                                    <div class="share-container">
                                        {!! $shareButton !!}
                                    </div>
                                </div>
                            </div>
     
                        <div class="like-heart">
                      <i id="loveIcon" class="bi bi-heart-fill love-icon likeCount" onclick="toggleLike({{ $pengumuman->id_pengumuman }})"></i><span id="likeCount_{{ $pengumuman->id_pengumuman }}" class="mx-2">0</span>
                    </div>
                    </div>
                    </div>
                
                    <div class="garbar-pengumuman"></div>
                </div>

                <?php } ?>
                <?php } ?>
            </div>
            </div>
            <div class="gt-pagination">
            {{ $peng->links() }}
        </div>

        </div>
      
        
    </section>

@endsection
