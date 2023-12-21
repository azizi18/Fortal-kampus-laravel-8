<p class="text-right">
    <a href="{{ asset('admin/instagram') }}" class="btn btn-success btn-sm"><i class="fa fa-backward"></i> Kembali</a>
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

<form action="{{ asset('admin/instagram/tambah_proses') }}" method="post" enctype="multipart/form-data"
    accept-charset="utf-8">
    {{ csrf_field() }}

    <div class="row form-group">
        <label class="col-md-3 text-right">Nomor Urut tampil</label>

        <div class="col-md-3">
            <input type="number" name="urutan" class="form-control" placeholder="No urut tampil"
                value="{{ old('urutan') }}">
            <small class="text-success">Urutan</small>
        </div>
    </div>

    <div class="row form-group">
        <label class="col-md-3 text-right">Upload gambar/Foto Instagram</label>
        <div class="col-md-9">
            <input type="file" name="gambar" class="form-control" 
                placeholder="Upload instagram">
        </div>
    </div>

    <div class="row form-group">
        <label class="col-md-3 text-right">Link Instagram<span class="text-danger">*</span></label>
        <div class="col-md-9">
            <input type="text" name="link" class="form-control" placeholder="Link Instagram" required="required"
                value="{{ old('link') }}" required>
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
