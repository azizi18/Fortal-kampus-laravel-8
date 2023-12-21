<p class="text-right">
    <a href="{{ asset('admin/fasilitas') }}" class="btn btn-success btn-sm">
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

<form action="{{ asset('admin/fasilitas/edit_proses') }}" method="post" enctype="multipart/form-data"
    accept-charset="utf-8">
    {{ csrf_field() }}
    <input type="hidden" name="id_fasilitas" value="{{ $fasilitas->id_fasilitas }}">
    <div class="row form-group">
        <label class="col-md-3 text-right"> Nomor Urut tampil</label>

        <div class="col-md-3">
            <input type="number" name="urutan" class="form-control" placeholder="No urut tampil"
                value="<?php echo $fasilitas->urutan; ?>">
            <small>Urutan tampil</small>
        </div>
    </div>


    <div class="row form-group">
        <label class="col-md-3 text-right">Judul Fasilitas</label>
        <div class="col-md-6">
            <input type="text" name="judul_fasilitas" class="form-control" placeholder="Judul Fasilitas"
                required="required" value="<?php echo $fasilitas->judul_fasilitas; ?>">
        </div>
    </div>
    <div class="row form-group">
        <label class="col-md-3 text-right">Upload gambar Fasilitas</label>
        <div class="col-md-3">
            <input type="file" name="gambar" class="form-control" placeholder="Upload gambar">
        </div>
    </div>

    <div class="row form-group">
        <label class="col-md-3 text-right">Isi Fasilitas</label>
        <div class="col-md-9">
            <textarea name="isi" class="form-control" id="kontenku" placeholder="Isi fasilitas" placeholder="Isi berita"><?php echo $fasilitas->isi; ?></textarea>
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
    <script>
        var options = {
          filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
          filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
          filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
          filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
      </script>
      <script>
        CKEDITOR.replace('editor', options);
    </script>