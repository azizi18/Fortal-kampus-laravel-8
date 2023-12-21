<p class="text-right">
	<a href="{{ asset('admin/visi_misi') }}" class="btn btn-success btn-sm">
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
<form action="{{ asset('admin/visi_misi/edit_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_vismis" value="{{ $vismis->id_vismis}}">
<div class="row form-group">
	<label class="col-md-3 text-right">Kategori Visi Misi</label>
	<div class="col-md-9">
		<select name="id_kategori_vismis" class="form-control">
			<?php foreach($kategori_vismis as $kategori_vismis) { ?>
				<option value="<?php echo $kategori_vismis->id_kategori_vismis ?>" 
					<?php if($vismis->id_kategori_vismis==$kategori_vismis->id_kategori_vismis) { echo "selected"; } ?>
					><?php echo $kategori_vismis->nama_kategori_vismis ?></option>
				<?php } ?>
			</select>
		</div>
	</div>

<div class="row form-group">
	<label class="col-md-3 text-right">Urutan</label>
	<div class="col-md-3">
		<input type="number" name="urutan" class="form-control" placeholder="No urut tampil"
			value="<?php echo $vismis->urutan; ?>">
		<small>Urutan tampil</small>
	</div>
</div>
	<div class="row form-group">
		<label class="col-md-3 text-right">Isi Visi Misi</label>
		<div class="col-md-9">
			<textarea type="text" id="editor" name="isi" class="form-control" placeholder="Isi Visi Misi"><?php echo $vismis->isi ?></textarea>
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


  
    