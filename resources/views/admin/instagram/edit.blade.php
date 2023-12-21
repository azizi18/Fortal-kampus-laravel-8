<p class="text-right">
    <a href="{{ asset('admin/instagram') }}" class="btn btn-success btn-sm">
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

<form action="{{ asset('admin/instagram/edit_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
    {{ csrf_field() }}
    <input type="hidden" name="id_instagram" value="{{ $instagram->id_instagram }}">
    <div class="row form-group">
        <label class="col-md-3 text-right"> Nomor Urut tampil</label>

        <div class="col-md-3">
            <input type="number" name="urutan" class="form-control" placeholder="No urut tampil"
                value="<?php echo $instagram->urutan; ?>">
            <small>Urutan tampil</small>
        </div>
    </div>
    <div class="row form-group">
        <label class="col-md-3 text-right">Upload gambar Instagram</label>
        <div class="col-md-3">
            <input type="file" name="gambar" class="form-control" placeholder="Upload gambar">
        </div>

      
    </div>

    <div class="row form-group">
        <label class="col-md-3 text-right">Link Instagram</label>
        <div class="col-md-6">
            <input type="url" name="link" class="form-control" placeholder="https://www.instagram.com/"
                required="required" value="<?php echo $instagram->link; ?>">
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
