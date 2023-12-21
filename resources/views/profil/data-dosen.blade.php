@extends('layout.head')
@section('content')
    <section id="sejarah" class="d-flex align-items-center">
        <div class="container" data-aos="fade-up" data-aos-delay="50">
            <h1 class="">Data Dosen & Staf</h1>
            <h2 class="mt-4">Fakultas Teknik</h2>
            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-md-3 mt-3">
                    <div class="menu-dosen mx-0">
                        <div class="menu-item active">Prodi Ilmu Komputer</div>
                        <div class="menu-item">Prodi TI</div>
                        <div class="menu-item">Prodi D3 RPL</div>
                        <div class="menu-item">Prodi Sistem Informasi</div>
                        <div class="menu-item">Prodi Teknologi Pangan</div>
                        <div class="menu-item">Prodi S1 RPL</div>
                        <div class="menu-item">Prodi Pendidikan Teknologi Informasi</div>
                    </div>
                </div>
                <div class="col-md-9 mt-3">
                    <div id="content" class="mt-3">
                        <div class="content-item" data-aos="fade-up" data-aos-delay="100">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NIDN</th>
                                        <th>NIK/NIP</th>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($ilkom as $ilkom) { ?>
                                    <tr>
                                        <td><?php echo $ilkom->nidn; ?></td>
                                        <td><?php echo $ilkom->nik_nip; ?></td>
                                        <td><?php echo $ilkom->nama; ?></td>
                                        <td><?php echo $ilkom->email; ?></td>

                                    </tr>
                                    <?php $i++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="content" class="mt-3">
                        <div class="content-item hidden" data-aos="fade-up" data-aos-delay="50">
                            <table id="tabel-two" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NIDN</th>
                                        <th>NIK/NIP</th>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($ti as $ti) { ?>
                                    <tr>
                                        <td><?php echo $ti->nidn; ?></td>
                                        <td><?php echo $ti->nik_nip; ?></td>
                                        <td><?php echo $ti->nama; ?></td>
                                        <td><?php echo $ti->email; ?></td>
                                    </tr>
                                    <?php $i++; } ?>
                                </tbody>
                            </table>
                           
                        </div>

                    </div>
                    <div id="content" class="mt-3">
                        <div class="content-item hidden" data-aos="fade-up" data-aos-delay="50">
                            <table id="tabel-three" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NIDN</th>
                                        <th>NIK/NIP</th>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($rpl as $rpl) { ?>
                                    <tr>
                                        <td><?php echo $rpl->nidn; ?></td>
                                        <td><?php echo $rpl->nik_nip; ?></td>
                                        <td><?php echo $rpl->nama; ?></td>
                                        <td><?php echo $rpl->email; ?></td>

                                    </tr>
                                    <?php $i++; } ?>
                                 
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div id="content" class="mt-3">
                        <div class="content-item hidden" data-aos="fade-up" data-aos-delay="50">
                            <table id="tabel-four" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NIDN</th>
                                        <th>NIK/NIP</th>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($sistem as $sistem) { ?>
                                    <tr>
                                        <td><?php echo $sistem->nidn; ?></td>
                                        <td><?php echo $sistem->nik_nip; ?></td>
                                        <td><?php echo $sistem->nama; ?></td>
                                        <td><?php echo $sistem->email; ?></td>

                                    </tr>
                                    <?php $i++; } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div id="content" class="mt-3">
                        <div class="content-item hidden" data-aos="fade-up" data-aos-delay="50">
                            <table id="tabel-five" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NIDN</th>
                                        <th>NIK/NIP</th>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($teknopang as $teknopang) { ?>
                                    <tr>
                                        <td><?php echo $teknopang->nidn; ?></td>
                                        <td><?php echo $teknopang->nik_nip; ?></td>
                                        <td><?php echo $teknopang->nama; ?></td>
                                        <td><?php echo $teknopang->email; ?></td>

                                    </tr>
                                    <?php $i++; } ?>
                                  
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div id="content" class="mt-3">
                        <div class="content-item hidden" data-aos="fade-up" data-aos-delay="50">
                            <table id="tabel-six" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NIDN</th>
                                        <th>NIK/NIP</th>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($s1rpl as $s1rpl) { ?>
                                    <tr>
                                        <td><?php echo $s1rpl->nidn; ?></td>
                                        <td><?php echo $s1rpl->nik_nip; ?></td>
                                        <td><?php echo $s1rpl->nama; ?></td>
                                        <td><?php echo $s1rpl->email; ?></td>
                                    </tr>
                                    <?php $i++; } ?>
                                  
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div id="content" class="mt-3">
                        <div class="content-item hidden" data-aos="fade-up" data-aos-delay="50">
                            <table id="tabel-seven" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NIDN</th>
                                        <th>NIK/NIP</th>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($pti as $pti) { ?>
                                    <tr>
                                        <td><?php echo $pti->nidn; ?></td>
                                        <td><?php echo $pti->nik_nip; ?></td>
                                        <td><?php echo $pti->nama; ?></td>
                                        <td><?php echo $pti->email; ?></td>

                                    </tr>
                                    <?php $i++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <h2 class="mt-4">Fakultas Kesehatan</h2>
                    <div class="menu-dosen mx-0">
                        <div class="menu-item active">Dosen Program Studi Farmasi</div>
                        <div class="menu-item">Dosen Program Studi Gizi</div>

                    </div>
                </div>
                <div class="col-md-9 mt-5">
                    <div id="content" class="mt-3">
                        <div class="content-item" data-aos="fade-up" data-aos-delay="50">
                            <table id="tabel-fak-farmasi" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NIDN</th>
                                        <th>NIK/NIP</th>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($farmasi as $farmasi) { ?>
                                    <tr>
                                        <td><?php echo $farmasi->nidn; ?></td>
                                        <td><?php echo $farmasi->nik_nip; ?></td>
                                        <td><?php echo $farmasi->nama; ?></td>
                                        <td><?php echo $farmasi->email; ?></td>


                                    </tr>
                                    <?php $i++; } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div id="content" class="mt-3">
                        <div class="content-item hidden" data-aos="fade-up" data-aos-delay="50">
                            <table id="tabel-fak-gizi" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NIDN</th>
                                        <th>NIK/NIP</th>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($gizi as $gizi) { ?>
                                    <tr>
                                        <td><?php echo $gizi->nidn; ?></td>
                                        <td><?php echo $gizi->nik_nip; ?></td>
                                        <td><?php echo $gizi->nama; ?></td>
                                        <td><?php echo $gizi->email; ?></td>

                                    </tr>
                                    <?php $i++; } ?>
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <h2 class="mt-4">Fakultas Ekonomi Dan Bisnis</h2>

                    <div class="menu-dosen mx-0">
                        <div class="menu-item active">Dosen Program Studi Manajaemen</div>
                        <div class="menu-item">Dosen Program Studi Akuntansi</div>
                        <div class="menu-item">Dosen Program Studi Bisnis Digital</div>

                    </div>
                </div>
                <div class="col-md-9 mt-5">
                    <div id="content" class="mt-3">
                        <div class="content-item" data-aos="fade-up" data-aos-delay="50">
                            <table id="tabel-eko-manajemen" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NIDN</th>
                                        <th>NIK/NIP</th>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($manajemen as $manajemen) { ?>
                                    <tr>
                                        <td><?php echo $manajemen->nidn; ?></td>
                                        <td><?php echo $manajemen->nik_nip; ?></td>
                                        <td><?php echo $manajemen->nama; ?></td>
                                        <td><?php echo $manajemen->email; ?></td>

                                    </tr>
                                    <?php $i++; } ?>
                                   
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div id="content" class="mt-3">
                        <div class="content-item hidden" data-aos="fade-up" data-aos-delay="50">
                            <table id="tabel-eko-akuntansi" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NIDN</th>
                                        <th>NIK/NIP</th>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($akuntansi as $akuntansi) { ?>
                                    <tr>
                                        <td><?php echo $akuntansi->nidn; ?></td>
                                        <td><?php echo $akuntansi->nik_nip; ?></td>
                                        <td><?php echo $akuntansi->nama; ?></td>
                                        <td><?php echo $akuntansi->email; ?></td>

                                    </tr>
                                    <?php $i++; } ?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="content" class="mt-3">
                        <div class="content-item hidden" data-aos="fade-up" data-aos-delay="50">
                            <table id="tabel-eko-bisnis" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NIDN</th>
                                        <th>NIK/NIP</th>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($bisnis as $bisnis) { ?>
                                    <tr>
                                        <td><?php echo $bisnis->nidn; ?></td>
                                        <td><?php echo $bisnis->nik_nip; ?></td>
                                        <td><?php echo $bisnis->nama; ?></td>
                                        <td><?php echo $bisnis->email; ?></td>

                                    </tr>
                                    <?php $i++; } ?>
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <h2 class="mt-4">Fakultas Ilmu Budaya</h2>

                    <div class="menu-dosen mx-0">
                        <div class="menu-item active">Dosen Program Sastra Inggris</div>
                        <div class="menu-item">Dosen Program S2 Sastra Inggris</div>
                    </div>
                </div>
                <div class="col-md-9 mt-5">
                    <div id="content" class="mt-3">
                        <div class="content-item" data-aos="fade-up" data-aos-delay="50">
                            <table id="tabel-ilmu-sastra-one" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NIDN</th>
                                        <th>NIK/NIP</th>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($s1sastra as $s1sastra) { ?>
                                    <tr>
                                        <td><?php echo $s1sastra->nidn; ?></td>
                                        <td><?php echo $s1sastra->nik_nip; ?></td>
                                        <td><?php echo $s1sastra->nama; ?></td>
                                        <td><?php echo $s1sastra->email; ?></td>

                                    </tr>
                                    <?php $i++; } ?>
                                   
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div id="content" class="mt-3">
                        <div class="content-item hidden" data-aos="fade-up" data-aos-delay="50">
                            <table id="tabel-ilmu-sastra-two" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NIDN</th>
                                        <th>NIK/NIP</th>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($s2sastra as $s2sastra) { ?>
                                    <tr>
                                        <td><?php echo $s2sastra->nidn; ?></td>
                                        <td><?php echo $s2sastra->nik_nip; ?></td>
                                        <td><?php echo $s2sastra->nama; ?></td>
                                        <td><?php echo $s2sastra->email; ?></td>

                                    </tr>
                                    <?php $i++; } ?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <h2 class="mt-4">Fakultas Seni Dan Desain</h2>

                    <div class="menu-dosen mx-0">
                        <div class="menu-item active">Dosen Program Studi Desain Komunikasi Visual</div>

                    </div>
                </div>
                <div class="col-md-9 mt-5">
                    <div id="content" class="mt-3">
                        <div class="content-item" data-aos="fade-up" data-aos-delay="50">
                            <table id="tabel-seni-komunikasi" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NIDN</th>
                                        <th>NIK/NIP</th>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($dkv as $dkv) { ?>
                                    <tr>
                                        <td><?php echo $dkv->nidn; ?></td>
                                        <td><?php echo $dkv->nik_nip; ?></td>
                                        <td><?php echo $dkv->nama; ?></td>
                                        <td><?php echo $dkv->email; ?></td>

                                    </tr>
                                    <?php $i++; } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="col-md-3">
                    <h2 class="mt-4">Fakultas Hukum</h2>

                    <div class="menu-dosen mx-0">
                        <div class="menu-item active">Dosen Program Studi Hukum</div>

                    </div>
                </div>
                <div class="col-md-9 mt-5">
                    <div id="content" class="mt-3">
                        <div class="content-item" data-aos="fade-up" data-aos-delay="50">
                           
                            <table id="tabel-hukum" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NIDN</th>
                                        <th>NIK/NIP</th>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($hukum as $hukum) { ?>
                                    <tr>
                                        <td><?php echo $hukum->nidn; ?></td>
                                        <td><?php echo $hukum->nik_nip; ?></td>
                                        <td><?php echo $hukum->nama; ?></td>
                                        <td><?php echo $hukum->email; ?></td>

                                    </tr>
                                    <?php $i++; } ?>
                                    
                                </tbody>
                                <div id="detail"></div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        {{-- <script>
            const tbody = document.querySelector('tbody')
    
            let usersData = [];
    
            const loadData = async () => {
                try {
                    const url = await fetch('https://backbone.universitasbumigora.ac.id/api/v1/dosen/get-all');
                    usersData = await url.json();
                    console.log(usersData)
                    loadUserData(usersData);
                } catch (err) {
                    console.log(err)
                }
            }
    
            const loadUserData = (data) => {
                let no = 1;
                const output = data.map((el) => {
                    return `
                    <tr>
                        <td>` + (no++) + `</td>
                        <td>${el.nama_dosen}</td>
                        <td>${el.alamat_email}</td>
                    </tr>
                    `
                }).join('')
                tbody.innerHTML = output;
            }
    
            searchForm.addEventListener('keyup', (e) => {
                const value = e.target.value.toLowerCase();
                const input = usersData.filter((data) => {
                    return (
                        data.name.toLowerCase().includes(value)
                    )
                })
                loadUserData(input)
            })
    
            loadData()
    
        </script> --}}
    </section><!-- End Banner -->
@endsection
