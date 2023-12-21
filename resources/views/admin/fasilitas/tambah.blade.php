<p class="text-right">
    <a href="{{ asset('admin/fasilitas') }}" class="btn btn-success btn-sm"><i class="fa fa-backward"></i> Kembali</a>
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

<form action="{{ asset('admin/fasilitas/tambah_proses') }}" method="post" enctype="multipart/form-data"
    accept-charset="utf-8">
    {{ csrf_field() }}

    <div class="row form-group">
        <label class="col-md-3 text-right"> Nomor Urut tampil</label>

        <div class="col-md-3">
            <input type="number" name="urutan" class="form-control" placeholder="No urut tampil"
                value="{{ old('urutan') }}">
            <small class="text-success">Urutan</small>
        </div>
    </div>
    <div class="row form-group">
        <label class="col-md-3 text-right">judul fasilitas<span class="text-danger">*</span></label>
        <div class="col-md-9">
            <input type="text" name="judul_fasilitas" class="form-control" placeholder="judul fasilitas"
                value="{{ old('judul_fasilitas') }}" required>
        </div>
    </div>
    <div class="row form-group">
        <label class="col-md-3 text-right">Upload gambar/Foto Fasilitas</label>
        <div class="col-md-9">
            <input type="file" name="gambar" class="form-control" required="required"
                placeholder="Upload Fasilitas">
        </div>
    </div>

    <div class="row form-group">
        <label class="col-md-3 text-right">Isi<span class="text-danger">*</span></label>
        <div class="col-md-9">
            <textarea name="isi" class="form-control" id="editor" placeholder="Isi pengumuman">{{ old('isi') }}</textarea>
        </div>
    </div>
   

    <div class="row form-group">
        <label class="col-md-3 text-right"></label>
        <div class="col-md-9">
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-success " value="Simpan Data">
                <input type="reset" name="reset" class="btn btn-info " value="Reset">
            </div>
        </div>
    </div>
</form>
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
