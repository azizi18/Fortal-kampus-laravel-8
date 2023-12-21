<?php 
use Illuminate\Support\Facades\DB;

$site_config = DB::table('konfigurasi')->first();

?>
<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>Universitas Bumigora</h3>
                    <p>
                        <strong>Alamat :</strong><br>
                        <?php echo nl2br($site_config->alamat) ?>
                        <br>
                            <br>
                        <strong>Telephone :</strong> <br>
                        {{ $site_config->telepon }}<br> <br>
                        <strong>Email :</strong> <br>
                         {{ $site_config->email }}<br>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>KERJASAMA</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="https://www.netacad.com/">Cisco Academy</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="https://mikrotik.com/training/academy  ">MikroTik Academy</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="https://academy.microsoft.com">Microsoft Academy</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="https://academy.oracle.com">Oracle Academy</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>SISTEM INFORMASI</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="http://simpeg.stmikbumigora.ac.id">Sistem Informasi Pegawai</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="http://siaset.stmikbumigora.ac.id">Sistem Informasi Iventaris</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="http://digilib.stmikbumigora.ac.id">Perpustakaan (Digital Library)</a>
                        </li>
                        <li><i class="bx bx-chevron-right"></i> <a href="http://bkc.stmikbumigora.ac.id">Bumigora Knowledge's Center</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="http://kkp.stmikbumigora.ac.id">Kuliah Kerja Praktek</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>KANAL MAHASISWA</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="http://pmb.universitasbumigora.ac.id/v.2019/#/">Admision</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="http://kemahasiswaan.universitasbumigora.ac.id/">Kemahasiswaan</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="https://journal.universitasbumigora.ac.id/">Journal</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="http://kuisioner.universitasbumigora.ac.id">KUISIONER</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="https://siska.universitasbumigora.ac.id/login">SISKA</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="https://docs.google.com/forms/d/e/1FAIpQLSc9pFAexBILNgy2HQb-pflT7g83sDzYeJD7vx-qWTTRmFR5gA/viewform">Tracer Study</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="http://e-learning.universitasbumigora.ac.id/">E-Learning</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Wisudawan</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="https://baak.universitasbumigora.ac.id/">Akademik</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
