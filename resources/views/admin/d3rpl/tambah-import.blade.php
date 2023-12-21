<button class="btn btn-info" data-toggle="modal" data-target="#Tambah">
	<i class="bi bi-file-earmark-spreadsheet"></i> Import Excel
</button>
<span>
	<a href="{{asset('templeate-data.xlsx')}}" class="btn btn-outline-secondary" target="blank"><i class="bi bi-download"></i> Download Templeate Excel
	  </a>
  </span>
  
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
	<h4 class="modal-title" id="myModalLabel">Import data?</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
    
<form action="{{ asset('admin/d3rpl/import') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}

<div class="form-group row">
	<label class="col-md-3 text-right">Import Data Dosen</label>
	<div class="col-md-9">
		<input type="file" name="file" required="required">
		 
	</div>
</div>


<div class="form-group row">
	<label class="col-md-3 text-right"></label>
	<div class="col-md-9">
<div class="btn-group">
<input type="submit" name="submit" class="btn btn-success " value="Simpan Data">
<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
</div>
</div>
</div>
<div class="clearfix"></div>

</form>

</div>
</div>
</div>
</div>
