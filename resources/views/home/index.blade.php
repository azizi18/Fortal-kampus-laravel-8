@extends('layout.head')
@section('content')
<section id="home-slider">
    <div id="carouselExampleSlidesOnly" class="carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach($slider as $index => $slider) { ?>
          <div class="carousel-item {{$index == '0' ? 'active':''}}">
            <img src="{{ asset('assets/upload/image/'.$slider->gambar) }}" class="" alt="">     
    
            <div class="carousel-caption">
                <?php if($slider->status_text=="Ya") { ?>
                    <h1 data-aos="fade-up" data-aos-delay="100" >{{ $slider->judul_galeri }}</h1>
                    <h2 data-aos="fade-up" data-aos-delay="150">{{ ($slider->motto) }}</h2>
                    <h3 data-aos="fade-up" data-aos-delay="200">{{ ($slider->isi) }}</h3>
                   
                    <?php } ?>
              </div>
            </div>
            <?php } ?>
        </div>
      </div>
   
 </section>
 

        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services">
            <div class="container">
                <div class="container text-center">
                    <div class="periode">
                        <div class="row">
                            <div class="col order-1">
                                <p class="title-periode">Periode pendaftaran</p>
                                <p class="garbar-periode"></p>
                                <p class="description">9 Desember 2022 s.d 30 April 2023</p>
                                <p class="description">01 Mei 2023 s.d 31 Agustus 2023</p>
                                <p class="description">Belum Dibuka</p>
                                <p class="btn-brosur"><a
                                        href="https://drive.google.com/drive/folders/1FP8RfZem7rjsGuCh_3cBsoE-zKkQJm08">Unduh
                                        Brosur</a></p>
                            </div>
                            <div class="col-md-2 order-2">
                                <p class="title">Ingin Menjadi Mahasiswa Universitas Bumigora</p>
                                <p class="btn-daftar"><a href="https://pmb.universitasbumigora.ac.id/v.2019/#/">Daftar
                                        Online Sekarang</a></p>
                            </div>
                            <div class="col order-3">
                                <p class="title-kegiatan">Kegiatan</p>
                                <P class="garbar-kegiatan"></P>
                                <p class="title-ba">Belum Ada.</p>
                                <p class="description">Jadwal Praktikum</p>
                                <p class="btn-kegiatan"><a href="https://labkom.universitasbumigora.ac.id/"
                                        class="btn btn-light">Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Featured Services Section -->


        <!-- ======= Berita Section ======= -->
        <section id="faq" class="faq">
            <div class="container" data-aos="fade-up">
                <div class="row justify-content-between">
                    <div class="col-md-6">
                        <h1 class="fw-bold">Pengumuman</h1>

                        <h5 class="fw-bold d-flex">Perwalian, Pembayaran, Sanksi DLL.<div class="underline"></div>
                        </h5>
                        <?php foreach($pengumuman->take(3) as $pengumuman) { ?>
                            
                        <ul class="berita-list">

                            <li>
                                <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">
                                    <a href="{{ asset('pengumuman/read/' . $pengumuman->slug_pengumuman) }}">
                                        <h4 class="fw-bold"><?php echo $pengumuman->judul_pengumuman; ?></h4>
                                    </a>
                                </div>
                                <p> <?php echo date('M d Y ', strtotime($pengumuman->tanggal_publish)); ?></p>
                            </li>


                        </ul>
                        <?php } ?>
                        

                    </div>
                    <div class="col-md-6">
                        <h1 class="fw-bold">Berita Utama</h1>
                        <h5 class="fw-bold d-flex">Berita dan Agenda<div class="underline"></div>
                        </h5>
                        <?php foreach($berita->take(3) as $berita) { ?>
                            
                        <ul class="berita-list">

                            <li>
                                <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">
                                    <a href="{{ asset('berita/read/' . $berita->slug_berita) }}">
                                        <h4 class="fw-bold"><?php echo $berita->judul_berita; ?></h4>
                                    </a>
                                </div>
                                <p> <?php echo date('M d Y ', strtotime($berita->tanggal_publish)); ?></p>
                            </li>


                        </ul>
                        <?php } ?>
                      
                    </div>
                </div>
            </div>
            </div>
        </section> <!-- End Berita Section -->

        <!-- ======= gallery Section ======= -->
        <section id="portfolio" class="portfolio p-5">
            <div class="container" data-aos="fade-up">
                <div class="row mt-2" data-aos="fade-up" data-aos-delay="100">
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



        </section><!-- End galery Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <div class="title">
                    <h3>DIPERCAYA OLEH 2000+ PELAJAR</h3>
                    <p>
                        Kami memiliki kualitas dan staf pengajar profesional lulusan kampus ternama di Indonesia, serta staf
                        pendukung mahasiswa yang sangat efektif dan antusias.</p>
                </div>
                <div class="btn-skrg">
                    <p class="btn-buktikan"><a href="https://pmb.universitasbumigora.ac.id/v.2019/#/">BUKTIKAN
                            SEKARANG</a></p>
                </div>
            </div>
            </div>
        </section><!-- End Services Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container" data-aos="fade-up">
                <div class="section-title">

                    <p>Beberapa Fakta Tentang Universitas Bumigora</p>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="count-box">
                            <img src="assets/img/icons/kampus.svg" alt="kampus">
                            <span data-purecounter-start="0" data-purecounter-end="2867" data-purecounter-duration="1"
                                class="purecounter"></span>
                            </div>
                            <p class="mahasiswa text-center">Mahasiswa Aktif</p>
                    </div>

                    <div class="col-lg-3  mt-md-0">
                        <div class="count-box ">
                            <img src="assets/img/icons/student.svg" alt="mahasiswa">
                            <span data-purecounter-start="0" data-purecounter-end="3750" data-purecounter-duration="1"
                                class="purecounter"></span>
                            </div>
                            <p class="lulusan text-center">Lulusan</p>
                    </div>

                    <div class="col-lg-3  mt-lg-0">
                        <div class="count-box ">
                            <img src="assets/img/icons/sertifikat.svg" alt="sertifikat">
                            <span data-purecounter-start="0" data-purecounter-end="28" data-purecounter-duration="1"
                                class="purecounter"></span>
                            </div>
                            <p class="pengalaman text-center">Tahun Pengalaman</p>
                    </div>

                    <div class="col-lg-3  mt-lg-0">
                        <div class="count-box ">
                            <img src="assets/img/icons/book.svg" alt="book">
                            <span data-purecounter-start="0" data-purecounter-end="12003 " data-purecounter-duration="1"
                                class="purecounter"></span>
                            </div>
                            <p class="buku text-center">Buku di Perpustakaan</p>
                    </div>
                </div>

            </div>
        </section><!-- End Counts Section -->


        <!-- ======= Let's Watch ======= -->
        <section id="contact" class="contact">

            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h3>Let’s Watch</h3>
                </div>
                <p>Waktu Anda di Universitas Bumigora merupakan kesempatan besar untuk bertemu kenalan baru, mencoba hal
                    baru, dan mengembangkan minat baru Anda.</p>

                <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">

                    <div class="col-lg-4">
                        <div class="col-md-4 thumbnail">    
                                <img src="assets/img/logo/ubg.png" class="img-fluid background-image" data-bs-toggle="modal"
                                    href="#exampleModalToggle"> 
                                    <img src="assets/img/play.png" class="img-fluid overlay-image" data-bs-toggle="modal"
                                    href="#exampleModalToggle">     
                               
                                </div>
                        <!-- Full screen modal -->
                        <div class="modal fade" id="exampleModalToggle" aria-hidden="true"
                            aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                            <div class="modal-dialog modal-fullscreen">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <iframe class="frame"
                                        src="https://www.youtube.com/embed/OjC7-hm1MVk?si=0waqLjPLUPvH2Rez"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <iframe class="frame-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.0465843925385!2d116.11386337369977!3d-8.591519787220513!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcdbf5c2462a5ed%3A0xbc0f44d683d529b1!2sUniversitas%20Bumigora!5e0!3m2!1sid!2sid!4v1700008620250!5m2!1sid!2sid" width="600" height="325" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="col-lg-4">
                        <div class="col-md-4 thumbnail-mandalika">    
                            <img src="assets/img/logo/play-mandalika.png" class="img-fluid background-image-mandalika" data-bs-toggle="modal"
                                href="#exampleModalToggle"> 
                                <img src="assets/img/play.png" class="img-fluid overlay-image-mandalika" data-bs-toggle="modal"
                                href="#exampleModalToggle">     
                           
                            </div>
                        <div class="modal fade" id="exampleModalToggle" aria-hidden="true"
                            aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                            <div class="modal-dialog modal-fullscreen">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <iframe class="frame-mandalika"
                                        src="https://youtu.be/wsLOoGj44xU?si=rsIU6W0qlA5-9Xux"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </section><!-- End Let's Watch Section -->

        <section id="youtube" class="youtube">
            <div class="container" data-aos="fade-up">
                <iframe width="100%" height="556" class="frame-last"
                    src="https://www.youtube.com/embed/_5ccf9ldxwQ?si=Xpd5OonIlIoALG5K" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>
        </section>

        <section id="testimoni" class="testimoni">
            <div class="container" data-aos="fade-up">
                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-md-6">
                        <img src="assets/img/content/shop.jpeg" alt="shop" class="img-shop">
                        <div class="btn-shop align-content-center"><a
                                href="https://bumigorashop.com/">www.bumigorashop.com</a></div>
                    </div>
                    <div class="col-md-6">
                        <div class="caption ">
                            <h3 class="caption-tittle">Success Stories</h3>
                            <img src="assets/img/icons/caption.svg" class="icon-caption">
                            <div class="caption-desc">
                                <div class="col-lg-8">

                                    <span class="bold">Apa Alasan Saya Masuk Universitas Bumigora?</span> <span
                                        class="gagal">Gagal SNMPTN bukan alasan yang pertama. Itu mungkin alasan yang
                                        ke-sekian puluh bagi saya. Alasan saya masuk Universitas Bumigora yang pertama
                                        adalah saya ingin mendalami dunia IT yang sebenernya.</span>
                                    </span>
                                    <p class="garbar"></p>
                                    <img src="assets/img/icons/student.svg" alt="mahasiswa" class="img-mahasiswa">
                                    <p class="autor">- Oleh David Pernanda, Staff IT</p>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
            </div>
        </section>

@endsection
