@extends('layout.head')
@section('content')
    <section id="evaluasi" class="faq">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1 class="text-center mt-5">Evaluasi Studi</h1>
            <div class="container" data-aos="fade-up">
                <div class="row justify-content-center">
                    <ul class="faq-list mt-3">
                        <li>
                            <div data-bs-toggle="collapse" class="collapsed question fw-bold" href="#faq1">ELEMEN
                                PENILAIAN <i class="bi bi-plus-circle icon-show"></i><i
                                    class="bi bi bi-dash-circle icon-close"></i></div>
                            <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Penilaian terhadap kemampuan Mahasiswa diadakan secara aktif melalui: quis, tugas,
                                    diskusi, seminar, latihan-latihan, pekerjaan rumah, tes kecil, seminar komputer,
                                    praktikum, ujian tengah semester dan ujian akhir semester. Hasil penilaian dinyatakan
                                    dengan nilai angka dan nilai huruf.
                                </p>
                            </div>
                        </li>

                        <li>
                            <div data-bs-toggle="collapse" href="#faq2" class="collapsed question fw-bold">
                                BOBOT NILAI
                                <i class="bi bi-plus-circle  icon-show"></i><i class="bi bi bi-dash-circle icon-close"></i>
                            </div>
                            <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                                <p><span class="mx-2">1.</span>Bobot nilai tiap mata kuliah adalah sebagai
                                    berikut : 50 %
                                    Ujian Akhir Semester (UAS) , 30 % Ujian Tengah Semester (UTS) & 20 % Harian (yang
                                    mencakup Tugas & Quiz)</p>
                                <p><span class="mx-2">2.</span>Evaluasi hasil melaksanakan Tugas Khusus, Kerja Praktek dan
                                    Tugas Akhir diatur tersendiri.</p>
                            </div>
                        </li>

                        <li>
                            <div data-bs-toggle="collapse" href="#faq3" class="collapsed question fw-bold">EVALUASI HASIL
                                STUDI
                                <i class="bi bi-plus-circle  icon-show"></i><i class="bi bi bi-dash-circle icon-close"></i>
                            </div>
                            <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                                <p><span class="mx-2">1.</span>Pelaksanaan Ujian Tengah Semester (UTS) dan Ujian Akhir
                                    Semester (UAS) diatur dalam kalender akademik.</p>
                                <p><span class="mx-2">2.</span>Evaluasi hasil studi untuk menentukan nilai akhir hanya
                                    dilaksanakan satu kali dalam tiap semester dan tidak diadakan evaluasi ulang.</p>
                            </div>
                        </li>

                        <li>
                            <div data-bs-toggle="collapse" href="#faq4" class="collapsed question fw-bold">INDEKS PRESTASI
                                SEMESTER (IPS) / NARS
                                <i class="bi bi-plus-circle  icon-show"></i><i class="bi  bi-dash-circle icon-close"></i>
                            </div>
                            <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Keberhasilan studi mahasiswa dinyatakan melalui perhitungan Indeks Prestasi Semester
                                    (IPS /NARS) yang dihitung pada tiap akhir semester dengan rumus :
                                </p>
                                <p> <img src="assets/img/content/rumus.png" class="img-fluid" alt=""
                                        style="width: 222px"><span class="mx-2">Dimana :</span></p>
                                <p>
                                    N = Nilai total hasil evaluasi semester
                                </p>
                                <p>
                                    K = Bobot SKS mata Kuliah yang dievaluasi.
                                </p>

                            </div>
                        </li>

                        <li>
                            <div data-bs-toggle="collapse" href="#faq5" class="collapsed question fw-bold">SISTEM
                                PENILAIAN <i class="bi bi-plus-circle  icon-show"></i><i
                                    class="bi  bi-dash-circle icon-close"></i>
                            </div>
                            <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Sistem penilaian yang dipakai Sekolah Tinggi Manajemen Informatika menggunakan batasan
                                    baku yang dibagi ke dalam lima golongan nilai :
                                </p>
                                <p> <img src="assets/img/content/penilaian.png" class="img-fluid img-penilaian"
                                        alt="" style="width: 566px height:178px"></p>
                            </div>
                        </li>

                        <li>
                            <div data-bs-toggle="collapse" href="#faq6" class="collapsed question fw-bold">INDEKS PRESTASI
                                KUMULATIF (IPK) <i class="bi bi bi-plus-circle  icon-show"></i><i
                                    class="bi  bi-dash-circle icon-close"></i>
                            </div>
                            <div id="faq6" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Indeks Prestasi Kumulatif (IPK) dihitung di akhir masa studi dengan rumus:
                                </p>
                                <p> <img src="assets/img/content/ipk.png" class="img-fluid" alt=""
                                        style="width: 245px"><span class="mx-2">Dimana :</span> <span class="mx-2">Ni =
                                        Nilai Numerik akhir hasil evaluasi masing-masing Mata Kuliah dalam 1 program.</span>
                                </p>
                                <p>
                                    Ki = Bobot SKS mata Kuliah.
                                </p>
                                <p>
                                    n = Jumlah mata kuliah di dalam satu program studi
                                </p>
                            </div>
                        </li>
                        <li>
                            <div data-bs-toggle="collapse" href="#faq7" class="collapsed question fw-bold">PREDIKAT
                                KELULUSAN <i class="bi bi-plus-circle  icon-show"></i><i
                                    class="bi  bi-dash-circle icon-close"></i>
                            </div>
                            <div id="faq7" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Kepada lulusan STMIK Bumigora Mataram diberikan predikat kelulusan yang terdiri dari 3
                                    tingkatan:
                                </p>
                                <p> <img src="assets/img/content/kelulusan.png" class="img-fluid img-penilaian"
                                        alt="" style="width: 566px height:178px"></p>
                                <p>Predikat kelulusan Dengan Pujian ditetapkan dengan memperhatikan masa studi, maksimal n
                                    tahun (masa studi minimum) + 1 tahun.</p>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>

        </div>
    </section><!-- End Banner -->
@endsection
