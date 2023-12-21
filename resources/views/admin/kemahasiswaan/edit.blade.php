<p class="text-right">
	<a href="{{ asset('admin/kemahasiswaan') }}" class="btn btn-success btn-sm">
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
<form action="{{ asset('admin/kemahasiswaan/edit_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_kemahasiswaan" value="{{ $kemahasiswaan->id_kemahasiswaan}}">



<div class="row form-group">
	<label class="col-md-3 text-right">Kategori Kemahsiswaan</label>
	<div class="col-md-9">
		<select name="id_kategori_kemahasiswaan" class="form-control">
			<?php foreach($kategori_kemahasiswaan as $kategori_kemahasiswaan) { ?>
				<option value="<?php echo $kategori_kemahasiswaan->id_kategori_kemahasiswaan ?>" 
					<?php if($kemahasiswaan->id_kategori_kemahasiswaan==$kategori_kemahasiswaan->id_kategori_kemahasiswaan) { echo "selected"; } ?>
					><?php echo $kategori_kemahasiswaan->nama_kategori_kemahasiswaan ?></option>
				<?php } ?>
			</select>
		</div>
	</div>


	<div class="row form-group">
		<label class="col-md-3 text-right">Isi Kemahsiswaan</label>
		<div class="col-md-9">
			<textarea type="text" id="editor" name="isi" class="form-control" placeholder="Isi Kemahsiswaan"><?php echo $kemahasiswaan->isi ?></textarea>
		</div>
	</div>
	
	<div class="row form-group">
		<label class="col-md-3 text-right">Urutan</label>
		<div class="col-md-9">
			<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $kemahasiswaan->urutan ?>">
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