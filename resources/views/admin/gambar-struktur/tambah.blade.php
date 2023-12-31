<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title" id="myModalLabel">Tambah data?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ asset('admin/gambar-struktur/tambah') }}" enctype="multipart/form-data" method="post"
                    accept-charset="utf-8">
                    {{ csrf_field() }}
                 

                    <div class="row form-group">
                        <label class="col-md-3 text-right">Upload gambar</label>
                        <div class="col-md-9">
                            <input type="file" name="gambar" class="form-control" required="required" placeholder="Upload gambar">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-md-3 text-right">Nomor Urut tampil</label>
                
                        <div class="col-md-3">
                            <input type="number" name="urutan" class="form-control" placeholder="No urut tampil"
                                value="{{ old('urutan') }}">
                            <small class="text-success">Urutan</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 control-label text-right"></label>
                        <div class="col-sm-9">
                            <div class="form-group pull-right btn-group">
                                <input type="submit" name="submit" class="btn btn-primary " value="Simpan Data">
                                <input type="reset" name="reset" class="btn btn-success " value="Reset">
                                <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
