
@extends('layout.head')
@section('content')
    <section id="berita" class="d-flex align-items-center isi-mahasiswa">
        <div class="container">
          
            <p> <?php echo $read->nama; ?>| <?php echo date('M d Y ', strtotime($read->tanggal_publish)); ?>
                | <?php echo $read->jenis_berita; ?></p>
            <div class="berita" href="#faq1">

                <a href="{{ asset('berita/read/' . $read->slug_berita) }}">
                    <h4 class="fw-bold"><i class="bi bi-camera-fill icon-camera"> </i><?php echo $read->judul_berita; ?> </h4>
                </a>
            </div>
           
            <h6><?php echo $read->isi; ?></h6>
            <hr style="width: 10%">
            <div class="share fw-bold" style="font-size: 12px">
                Share this:
            </div>
          <div class="icon-share mt-2">
            <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text=Check out this post!" target="_blank">
            <img src="{{ asset('assets/img/icons/twitter.svg')}}" alt="twitter" style="width : 30px"></a>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" rel="noopener noreferrer">
                <img src="{{ asset('assets/img/icons/facebook.svg')}}" alt="twitter" class="mx-4" style="width : 30px"></a>
            
        </div>
        <hr style="width: 10%">
        <div class="share fw-bold" style="font-size: 12px">
            Like this:
        </div> 
        <div class="like">
            <div class="btn-like">
                <a href=""><i class="bi bi-star"></i> <span>Like</span></a>
            </div>
            <p style="font-size: 12px" class="mt-1">Be the first to like this.</p>
        </div>
        <hr style="width: 10%" class="mt-4">
        <div class="related fw-bold mt-2" style="font-size: 12px">
            Related
        </div> 
        <div class="row mt-4" data-aos="fade-up" data-aos-delay="100">
            <?php foreach($related->take(3) as $related) { ?>
                <div class="col-md-4 ">
                  
                    <div class="berita" href="#faq1">
                        <a href="">
                            <h6 class="fw-bold"><?php echo $related->judul_berita; ?>
                            </h6>
                        </a>
                        
                        <div style="font-size: 12px"> <?php echo date('M d Y ', strtotime($related->tanggal_publish));  ?>
                        </div>
                        <div style="font-size: 12px"> Ini "<?php echo $related->jenis_berita; ?>"
                        </div>    
                    </div>
                   
                            
                </div>
                <?php } ?>
                <div class="share d-flex justify-content-end gap-4">
                    <div class="post"> 
                    <div class="share-icon">
                        <i class="fas fa-share-alt"></i>
                        <div class="share-container">
                        {!! $linkButton_berita !!}
                        </div>
                    </div>
                    </div>
                <div class="like-heart">
                <i id="loveIcon" class="bi bi-heart-fill love-icon" onclick="toggleLike()"></i><span id="likeCount" class="mx-2">0</span>

            </div>
            </div>
                <div class="garbar-pengumuman"></div>
        </div>
        <div class="related-post mt-4" style="font-size: 24px">
            Related Posts
        </div> 
        <div class="row" data-aos="fade-up" data-aos-delay="50">
            
        <?php foreach($related_post as $related_post) { ?>
            <?php if($related_post->status_berita=="Publish") { ?>

        <div class="col-lg-4 mt-4">
            <h6 class="mt-4"><?php echo \Illuminate\Support\Str::limit(strip_tags($related_post->isi), 100, $end = '...'); ?></h6>
            <div class="berita" href="#faq1">
                <a href="{{ asset('berita/read/' . $related_post->slug_berita) }}">
                    <h4 class="fw-bold"><?php echo $related_post->judul_berita; ?>
                    </h4>
                </a>
            </div>
            <p> <?php echo date('M d Y ', strtotime($related_post->tanggal_publish)); ?>  
            </p>
            <div class="read-more mt-2" href="#faq1">
                <a href="{{ asset('berita/read/' . $related_post->slug_berita) }}">
                    <p class="fw-bold">Read More<i class="bi bi-chevron-right">
                        </i></p>
                </a>
              
            </div>
        </div>
        <?php } ?>
        <?php } ?>
        </div>
        <div class="garbar-pengumuman"></div>
        <div id="disqus_thread" class="mt-4"></div>
        <script>
            /**
             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT 
             *  THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR 
             *  PLATFORM OR CMS.
             *  
             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: 
             *  https://disqus.com/admin/universalcode/#configuration-variables
             */
            /*
            var disqus_config = function () {
                // Replace PAGE_URL with your page's canonical URL variable
                this.page.url = PAGE_URL;  
                
                // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                this.page.identifier = PAGE_IDENTIFIER; 
            };
            */
            
            (function() {  // REQUIRED CONFIGURATION VARIABLE: EDIT THE SHORTNAME BELOW
                var d = document, s = d.createElement('script');
                
                // IMPORTANT: Replace EXAMPLE with your forum shortname!
                s.src = 'https://EXAMPLE.disqus.com/embed.js';
                
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        </script>
    </section>
@endsection
