<p class="text-right">
	<a href="{{ asset('admin/kalender') }}" class="btn btn-success btn-sm">
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
<form action="{{ asset('admin/kalender/edit_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_kalender" value="{{ $kalender->id_kalender }}">


<div class="row form-group">
	<label class="col-md-3 text-right">Kategori Kalender</label>
	<div class="col-md-9">
		<select name="id_kategori_kalender" class="form-control">
			<?php foreach($kategori_kalender as $kategori_kalender) { ?>
				<option value="<?php echo $kategori_kalender->id_kategori_kalender ?>" 
					<?php if($kalender->id_kategori_kalender==$kategori_kalender->id_kategori_kalender) { echo "selected"; } ?>
					><?php echo $kategori_kalender->nama_kategori_kalender ?></option>
				<?php } ?>
			</select>
		</div>
	</div>


	<div class="row form-group">
		<label class="col-md-3 text-right">Isi Kalender</label>
		<div class="col-md-9">
			<textarea type="text" id="editor" name="isi" class="form-control" placeholder="Isi Kalender"><?php echo $kalender->isi ?></textarea>
		</div>
	</div>
	<div class="row form-group">
		<label class="col-md-3 text-right">Urutan</label>
		<div class="col-md-9">
			<input type="number" name="urutan" class="form-control" placeholder="urutan" value="<?php echo $kalender->urutan ?>">
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