<div class="row">

    <div class="col-md-6">
        <form action="{{ asset('admin/fasilitas/cari') }}" method="get" accept-charset="utf-8">
            <br>
            <div class="input-group">
                <input type="text" name="keywords" class="form-control"
                    placeholder="Ketik kata kunci pencarian galeri...." value="<?php if (isset($_GET['keywords'])) {
                        echo strip_tags($_GET['keywords']);
                    } ?>" required>
                <span class="input-group-btn btn-flat">
                    <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
                    <a href="{{ asset('admin/fasilitas/tambah') }}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Tambah Baru</a>
                </span>
            </div>
        </form>
    </div>
    <div class="col-md-6 text-left">

    </div>
</div>

<div class="clearfix">
    <hr>
</div>
<form action="{{ asset('admin/fasilitas/proses') }}" method="post" accept-charset="utf-8">
    {{ csrf_field() }}

    <div class="clearfix">
        <hr>
    </div>
    <div class="table-responsive mailbox-messages">
        <table id="example1" class="display table table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
                <tr class="bg-info">
                    <th width="2%" class="text-center">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i
                                    class="far fa-square"></i>
                            </button>
                        </div>
                    </th>
                    <th width="10%">Judul</th>
                    <th width="10%">Gambar</th>
                    <th width="40%">Isi</th>
                    <th width="5%">Urutan</th>
                    <th width="5%">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php $i=1; foreach($fasilitas as $fasilitas) { ?>

                <tr class="odd gradeX">
                    <td class="text-center">
                        <div class="icheck-primary">
                            <input type="checkbox" name="id_fasilitas[]" value="<?php echo $fasilitas->id_fasilitas; ?>"
                                id="check<?php echo $i; ?>">
                            <label for="check<?php echo $i; ?>"></label>
                        </div>
                    </td>
                    
                    <td><?php echo $fasilitas->judul_fasilitas; ?></td>
                    <td><img src="{{ asset('assets/upload/image/thumbs/' . $fasilitas->gambar) }}"
                            class="img img-thumbnail img-fluid"></td>
                    <td><?php echo $fasilitas->isi; ?></td>
                    <td><?php echo $fasilitas->urutan; ?></td>
                    <td>
                        <div class="btn-group">
                            <a href=" {{ url('fasilitas-kampus') }}"
                            class="btn btn-success btn-sm" target="_blank"><i class="fa fa-eye"></i></a>
                            
                            <a href="{{ asset('admin/fasilitas/edit/' . $fasilitas->id_fasilitas) }}"
                                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                            <a href="{{ asset('admin/fasilitas/delete/' . $fasilitas->id_fasilitas) }}"
                                class="btn btn-danger btn-sm delete-link"><i class="fa fa-trash"></i></a>
                        </div>

                    </td>
                </tr>

                <?php $i++; } ?>

            </tbody>
        </table>
    </div>

</form>

<div class="clearfix">
    <hr>
</div>
<div class="pull-right"><?php if (isset($pagin)) {
    echo $pagin;
} ?></div>
