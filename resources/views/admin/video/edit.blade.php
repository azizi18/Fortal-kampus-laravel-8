@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ asset('admin/video/proses_edit') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    {{ csrf_field() }}
    <input type="hidden" name="id_video" value="<?php echo $video->id_video; ?>">
    <div class="form-group row">
        <label class="col-sm-3 control-label text-right">Kode Video Youtube</label>
        <div class="col-sm-9">
            <input type="text" name="video" class="form-control" placeholder="Kode Video Youtube"
                value="<?php echo $video->video; ?>" required>
            <small class="text-gray">Contoh: <span class="text-success">https://www.youtube.com/watch?v=</span><strong
                    class="text-danger">IvjxrQ8c4-w</strong>.
                <br>Copy kode <strong class="text-danger">IvjxrQ8c4-w</strong> sebagai kode Youtube.</small>
        </div>
    </div>
    <div class="row form-group">
        <label class="col-md-3 text-right">Urutan</label>
        <div class="col-md-3">
            <input type="number" name="urutan" class="form-control" placeholder="No urut tampil"
                value="{{$video->urutan}}">
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
