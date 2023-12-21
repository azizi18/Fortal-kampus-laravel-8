
    
<div class="row">

    <div class="col-md-8">
        <form action="{{ asset('admin/teknologipangan/cari') }}" method="get" accept-charset="utf-8">
            <br>
            <div class="input-group">
                <input type="text" name="keywords" class="form-control"
                    placeholder="Ketik kata kunci pencarian data.." value="<?php if (isset($_GET['keywords'])) {
                        echo strip_tags($_GET['keywords']);
                    } ?>" >
                <span class="input-group-btn btn-flat">
                    <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
                    <a href="{{ asset('admin/teknologipangan/tambah') }}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Tambah Baru</a>
                    </span>
                    
            </div>
            <div class="col-md-6 text-left">
                
            </div>
        </form>
    </div>
   
</div>

<div class="clearfix">
    <hr>
</div>
<p class="mx-1">
    @include('admin/teknologipangan/tambah-import')
   
    </p>
   
<form action="{{ asset('admin/teknologipangan/proses') }}" method="post" accept-charset="utf-8">
    {{ csrf_field() }}

    <div class="clearfix">
        <hr>
    </div>
    <div class="table-responsive mailbox-messages">
        <table id="example1" class="display table table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
                <tr class="bg-info">
                    <th width="5%" class="text-center">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i
                                    class="far fa-square"></i>
                            </button>
                           
                        </div>
                    </th>
                    <th width="10%">NIDN</th>
                    <th width="10%">NIK/NIP</th>
                    <th width="15%">Nama</th>
                    <th width="15%">Email</th>
                    <th width="5%">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php $i=1; foreach($teknopang as $teknopang) { ?>

                <tr class="odd gradeX">
                    <td class="text-center">
                        <div class="icheck-primary">
                            <input type="checkbox" name="id_tp[]" value="<?php echo $teknopang->id_tp; ?>"
                                id="check<?php echo $i; ?>">
                            <label for="check<?php echo $i; ?>"></label>
                        </div>
                    </td>
                    <td><?php echo $teknopang->nidn; ?></td>
                    <td><?php echo $teknopang->nik_nip; ?></td>
                    <td><?php echo $teknopang->nama; ?></td>
                    <td><?php echo $teknopang->email; ?></td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ asset('admin/teknologipangan/edit/' . $teknopang->id_tp) }}"
                                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                            <a href="{{ asset('admin/teknologipangan/delete/' . $teknopang->id_tp) }}"
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
