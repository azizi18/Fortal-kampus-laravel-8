<p class="text-right">
    <a href="{{ asset('admin/akuntansi') }}" class="btn btn-success btn-sm">
        <i class="fa fa-backward"></i> Kembali
    </a>
</p>
<hr>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ asset('admin/akuntansi/edit_proses') }}" method="post" enctype="multipart/form-data"
    accept-charset="utf-8">
    {{ csrf_field() }}
    <input type="hidden" name="id_aku" value="{{ $akuntansi->id_aku}}">
    <div class="row form-group">
        <label class="col-md-3 text-right">Nidn</label>
        <div class="col-md-6">
            <input type="text" name="nidn" class="form-control" placeholder="NIDN"
                required="required" value="<?php echo$akuntansi->nidn; ?>">
        </div>
    </div>
    <div class="row form-group">
        <label class="col-md-3 text-right">NIK/NIP</label>
        <div class="col-md-6">
            <input type="text" name="nik_nip" class="form-control" placeholder="NIK/NIP"
                required="required" value="<?php echo $akuntansi->nik_nip; ?>">
        </div>
    </div>

    <div class="row form-group">
        <label class="col-md-3 text-right">Nama</label>
        <div class="col-md-6">
            <input type="text" name="nama" class="form-control" placeholder="Nama"
                required="required" value="<?php echo $akuntansi->nama; ?>">
        </div>
    </div>  

    <div class="row form-group">
        <label class="col-md-3 text-right">Email</label>
        <div class="col-md-6">
            <input type="email" name="email" class="form-control" placeholder="Email"
                required="required" value="<?php echo $akuntansi->email; ?>">
        </div>
    </div>

    <div class="row form-group">
        <label class="col-md-3 text-right"></label>
        <div class="col-md-9">
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-success ">
                    <i class="fa fa-save"></i> Simpan Data
                </button>
                <input type="reset" name="reset" class="btn btn-info " value="Reset">
            </div>

        </div>

    </div>
