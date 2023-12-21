<p class="text-right">
	<a href="{{ asset('admin/akademik') }}" class="btn btn-success btn-sm">
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

<form action="{{ asset('admin/akademik/tambah_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}


<div class="row form-group">
<label class="col-md-3 text-right">Kategori Akademik</label>
<div class="col-md-9">
<select name="id_kategori_akademik" class="form-control">

	<?php foreach($kategori_akademik as $kategori_akademik) { ?>
	<option value="<?php echo $kategori_akademik->id_kategori_akademik ?>"><?php echo $kategori_akademik->nama_kategori_akademik ?></option>
	<?php } ?>

</select>
</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Isi Akademik</label>
	<div class="col-sm-9">
		<textarea type="text" id="editor" name="isi" class="form-control" placeholder="Isi Kalender Akademik"
			value="{{ old('isi') }}" required></textarea>
		   
	</div>
</div>
<div class="row form-group">
	<label class="col-md-3 text-right">Urutan</label>
	<div class="col-md-9">
	<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="{{ old('urutan') }}">
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