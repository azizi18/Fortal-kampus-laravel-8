@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ asset('admin/gambar-struktur/proses_edit') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    {{ csrf_field() }}
    <input type="hidden" name="id_gambar" value="<?php echo $gambar->id_gambar; ?>">
    <div class="row form-group">
        <label class="col-md-3 text-right">Upload gambar</label>
        <div class="col-md-9">
            <input type="file" name="gambar" class="form-control" placeholder="Upload gambar" >
            <small>Gambar saat ini:
                <br><?php if($gambar->gambar!="") { ?>
                <img src="{{ asset('assets/upload/image/thumbs/' . $gambar->gambar) }}" class="img img-thumbnail"
                    width="80">
                <?php } ?>
            </small>
        </div>
    </div>
    <div class="row form-group">
        <label class="col-md-3 text-right">Urutan</label>
        <div class="col-md-3">
            <input type="number" name="urutan" class="form-control" placeholder="No urut tampil"
                value="{{$gambar->urutan}}">
            <small>Urutan tampil</small>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-3 control-label text-right"></label>
        <div class="col-sm-9">
            <div class="form-group pull-right btn-group">
                <input type="submit" name="submit" class="btn btn-primary " value="Simpan Data">
                <input type="reset" name="reset" class="btn btn-success " value="Reset">
                <a href="{{ asset('admin/video') }}" class="btn btn-danger">Kembali</a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</form>
