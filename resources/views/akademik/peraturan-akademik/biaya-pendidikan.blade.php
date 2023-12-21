@extends('layout.head')
@section('content')
    <section id="sejarah" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1 class="text-center mt-5">Biaya Pendidikan</h1>
            <div class="mt-4">
                Biaya pendidikan mencakup :</div>
            <div class="prodi">
                <ol>
                    <li class="">Uang Sumbangan Dana Pengembangan Pendidikan (DPP) yang diberikan pada saat
                        diterima sebagai mahasiswa baru.</li>
                    <li class="mt-2">Sumbangan Penyelenggaraan Pendidikan (SPP) yang besarnya tiap tahun akademik
                        bisa tidak sama, sesuai dengan petunjuk dari pimpinan perguruan tinggi atau kebijaksanaan lain.</li>
                    <li class="mt-2">Biaya pengambilan mata kuliah per sks.</li>
                    <li class="mt-2">Biaya Praktikum Komputer di Laboratorium Komputasi per semester (jika
                        mengambil/menempuh mata kuliah praktikum)</li>
                    <li class="mt-2">Biaya Skripsi / Tugas Akhir</li>
                    <li class="mt-2">Biaya Wisuda.</li>
                </ol>
         

                <div class="biaya">
                    <div class="biaya-list">
                        <div data-bs-toggle="collapse" href="#faq2" class="collapsed question fw-bold">Bagaimana Cara
                            Pembayarannya ? </div>
                        <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Pembayaran dilakukan pada Bank yang telah ditunjuk oleh lembaga. Mahasiswa yang akan
                                melakukan pembayaran terlebih dahulu meminta blangko setoran ke bagian keuangan kemudian
                                mahasiswa melakukan pembayaran. Bukti setoran dari bank kemudian ditukar ke bagian keuangan
                                dengan surat keterangan yang nantinya digunakan sebagi bukti pembayaran.
                            </p>
                            <div class="mt-4 fw-bold fs-6 text-center">
                                JENIS DAN WAKTU PEMBAYARAN
                            </div>

                            <table class="table table-striped table-bordered mt-2">
                                <thead class="text-center">
                                    <th>NO</th>
                                    <th>JENIS PEMBAYARAN</th>
                                    <th>WAKTU PEMBAYARAN</th>
                                    <th>BATAS AKHIR PEMBAYARAN</th>
                                    <th>TEMPAT PEMBAYARAN</th>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td>A</td>
                                        <td class="fw-bold">SPP</td>
                                        <td>setiap awal semester pada waktu yang telah ditentukan dan jumlah pembayaran
                                            disesuaikan berdasarkan angkatan</td>
                                        <td>1 (satu) minggu sebelum pengumpulan KRS , kecuali mahasiswa baru diatur dalam
                                            ketentuan khusus.</td>
                                        <td>Pengambilan blanko di bagian keuangan</td>
                                    </tr>
                                    <tr>
                                        <td>B</td>
                                        <td class="fw-bold">LABORATORIUM</td>
                                        <td>dilakukan pada awal semester.</td>
                                        <td>1 (satu) minggu sebelum pengumpulan KRS, kecuali mahasiswa baru sebelum mid
                                            semester</td>
                                        <td>Pembayaran di bank sesua dengan blanko
                                            yang diisi oleh bagian keuangan</td>
                                    </tr>
                                    <tr>
                                        <td>C</td>
                                        <td class="fw-bold">SKS</td>
                                        <td>setiap awal semester pada waktu yang telah ditentukan</td>
                                        <td>1 (satu) minggu sebelum pengumpulan KRS</td>
                                        <td>Bukti setoran Bank ditukar ke bagian keuangan dengan surat keterangan pembayaran
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>D</td>
                                        <td class="fw-bold">PERPUSTAKAAN, & DANA KEMAHASISWAAN</td>
                                        <td>sesuai dengan ketentuan (Pada saat daftar ulang mahasiswa baru)</td>

                                    </tr>
                                    <tr>
                                        <td>E</td>
                                        <td class="fw-bold">SKRIPSI/
                                            TUGAS AKHIR</td>
                                        <td>setelah pengajuan sinopsis</td>
                                        <td>setelah penentuan dosen pembimbing oleh ketua program studi</td>
                                    </tr>
                                    <tr>
                                        <td>F</td>
                                        <td class="fw-bold">CUTI AKADEMIK</td>
                                        <td>sebelum mid semester</td>
                                        <td>1 (satu) minggu sebelum mid semester berlangsung</td>

                                    </tr>
                                    <tr>
                                        <td>G</td>
                                        <td class="fw-bold">WISUDA</td>
                                        <td>disesuaikan dengan waktu pelaksanaan 1 (satu) bulan sebelum wisuda dan jumlah
                                            disesuaikan dengan biaya-biaya pada waktu pelaksanaan wisuda</td>
                                        <td>1 (satu) minggu sebelum pelaksanaan wisuda</td>

                                    </tr>
                                    <tr>
                                        <td>H</td>
                                        <td class="fw-bold">PERMINTAAN LEGALISIR, SURAT KETERANGAN DAN SEJENISNYA</td>
                                        <td>dikenakan biaya administrasi sesuai dengan ketentuan</td>

                                    </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <p class="mt-4">
                    Besarnya biaya pendidikan dapat berubah dari tahun ke tahun sesuai dengan keputusan Ketua Universitas
                    Bumigora. Ketentuan perubahan tersebut cenderung direalisasikan (berlaku efektif) bagi mahasiswa baru,
                    kecuali hal-hal tertentu (dengan pertimbangan khusus) akan diberlakukan pada seluruh mahasiswa (semua
                    angkatan).
                </p>
                <p class="mt-4">
                    Mahasiswa yang Cuti Akademik wajib membayar Uang Cuti Kuliah 20 % dari SPP. Mahasiswa yang tidak aktif
                    atau tidak mengajukan cuti akademik (tanpa keterangan)dan tidak membayar uang cuti kuliah dikenakan
                    pembayaran sebesar SPP penuh.
                </p>
                <p class="mt-4">
                    Bagi calon mahasiswa baru atau mahasiswa pindahan yang telah melakukan pendaftaran ulang kemudian ingin
                    membatalkannya, uangnya tidak dapat dikembalikan kecuali lolos seleksi UMPTN dan dikenakan biaya
                    administrasi sebesar 25% dari biaya yang telah dibayarkan.
                </p>
            </div>
        </div>
        </div>
    </section><!-- End Banner -->
@endsection
