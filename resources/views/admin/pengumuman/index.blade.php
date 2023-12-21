<div class="row">

    <div class="col-md-6">
        <form action="{{ asset('admin/pengumuman/cari') }}" method="get" accept-charset="utf-8">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" name="keywords" class="form-control" placeholder="Ketik kata kunci..."
                    value="<?php if (isset($_GET['keywords'])) {
                        echo strip_tags($_GET['keywords']);
                    } ?>" required>
                <span class="input-group-btn btn-flat">
                    <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
                    <?php if(Request::segment(3)=="jenis_pengumuman") { ?>
                    <a href="{{ asset('admin/pengumuman/tambah?jenis_pengumuman=' . Request::segment(4)) }}"
                        class="btn btn-success">
                        <i class="fa fa-plus"></i> Tambah Baru</a>
                    <?php }else{ ?>
                    <a href="{{ asset('admin/pengumuman/tambah') }}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Tambah Baru</a>
                    <?php } ?>
                </span>
            </div>
        </form>
    </div>
    <div class="col-md-6 text-left">
        {{ $pengumuman->links() }}
    </div>
</div>

<div class="clearfix">
    <hr>
</div>

<form action="{{ asset('admin/pengumuman/proses') }}" method="post" accept-charset="utf-8">
    <input type="hidden" name="pengalihan" value="<?php echo url()->full(); ?>">
    <?php $site = DB::table('konfigurasi')->first(); ?>
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12">

            <div class="input-group">

                </span>
            </div>
        </div>
    </div>
    <div class="table-responsive mailbox-messages">
        <table class="display table table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr class="bg-dark">
                    <th width="5%">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i
                                    class="far fa-square"></i>
                            </button>
                        </div>
                    </th>
                  
                    <th width="40%">JUDUL</th>
                    <?php if(Request::segment(3)=="jenis_pengumuman") { ?>
                        <?php }else{ ?>
                        <th width="15%">KATEGORI</th>
                        <?php } ?>
                    <th width="10%">AUTHOR</th>
                    <th width="10%">STATUS</th>
                    <th width="15%">ACTION</th>
                </tr>
            </thead>
            <tbody>

                <?php $i=1; foreach($pengumuman as $pengumuman) { ?>

                <tr>
                    <td class="text-center">
                        <div class="icheck-primary">
                            <input type="checkbox" name="id_pengumuman[]" value="{{ $pengumuman->id_pengumuman }}"
                                id="check<?php echo $i; ?>">
                            <label for="check<?php echo $i; ?>"></label>
                        </div>
                    </td>
                  
                    <td>
                        <a href="{{ asset('admin/pengumuman/edit/' . $pengumuman->id_pengumuman) }}">
                            <?php echo $pengumuman->judul_pengumuman; ?> <sup><i class="fa fa-pencil"></i></sup>
                        </a>
                        <small>
                            <br>Posted: <?php echo date('d M Y H:i: s', strtotime($pengumuman->tanggal_post)); ?>
                            <br>Published: <?php echo date('d M Y H:i: s', strtotime($pengumuman->tanggal_publish)); ?>
                            <?php if($pengumuman->jenis_pengumuman=="Promo") { ?>
                            <br>Promo: <span class="text-danger"><strong><?php echo date('d M Y', strtotime($pengumuman->tanggal_mulai)); ?> s/d
                                    <?php echo date('d M Y ', strtotime($pengumuman->tanggal_selesai)); ?></strong></span>
                            <?php } ?>
                            <br>Urutan: <?php echo $pengumuman->urutan; ?>
                            <br>Tgl posting: <?php echo date('d-m-Y', strtotime($pengumuman->tanggal_publish)); ?>
                            <br>Jenis: <a
                                href="{{ asset('admin/pengumuman/jenis_pengumuman/' . $pengumuman->jenis_pengumuman) }}">
                                <?php echo $pengumuman->jenis_pengumuman; ?><sup><i class="fa fa-link"></i></sup>
                            </a>
                        </small>
                    </td>
                    <?php if(Request::segment(3)=="jenis_pengumuman") {}else{ ?>
                        <td>
                            <a href="{{ asset('admin/pengumuman/kategori/' . $pengumuman->id_kategori) }}">
                                <?php echo $pengumuman->nama_kategori; ?><sup><i class="fa fa-link"></i></sup>
                            </a>
                        </td>
                        <?php } ?>
                    <td><?php if(Request::segment(3)=="jenis_pengumuman") {echo $pengumuman->nama; }else{ ?>
                        <a href="{{ asset('admin/pengumuman/author/' . $pengumuman->id_user) }}">
                            <?php echo $pengumuman->nama; ?><sup><i class="fa fa-link"></i></sup>
                        </a>
                        <?php } ?>
                    </td>
                    <td><a href="{{ asset('admin/pengumuman/status_pengumuman/'.$pengumuman->status_pengumuman) }}">
                        <small class="badge <?php if($pengumuman->status_pengumuman=="Publish") { echo 'badge-success'; }else{ echo 'badge-warning'; } ?> btn-block">
                          <i class="fa <?php if($pengumuman->status_pengumuman=="Publish") { echo 'fa-check-circle'; }else{ echo 'fa-times'; } ?>"></i> <?php echo $pengumuman->status_pengumuman ?></small>
                      </a></td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ url('pengumuman') }}"
                                class="btn btn-success btn-sm" target="_blank"><i class="fa fa-eye"></i></a>

                            <a href="{{ asset('admin/pengumuman/edit/' . $pengumuman->id_pengumuman) }}"
                                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                            <a href="{{ asset('admin/pengumuman/delete/' . $pengumuman->id_pengumuman) }}"
                                class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </td>
                </tr>

                <?php $i++; } ?>

            </tbody>
        </table>
    </div>
</form>
