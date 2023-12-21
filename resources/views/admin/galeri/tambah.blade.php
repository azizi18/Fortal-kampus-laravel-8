<p class="text-right">
    <a href="{{ asset('admin/galeri') }}" class="btn btn-success btn-sm"><i class="fa fa-backward"></i> Kembali</a>
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

<form action="{{ asset('admin/galeri/tambah_proses') }}" method="post" enctype="multipart/form-data"
    accept-charset="utf-8">
    {{ csrf_field() }}

    <div class="row form-group">
        <label class="col-md-3 text-right">Upload gambar</label>
        <div class="col-md-9">
            <input type="file" name="gambar" class="form-control" required="required" placeholder="Upload gambar">
        </div>
    </div>

    <div class="row form-group">
        <label class="col-md-3 text-right">Judul galeri</label>
        <div class="col-md-9">
            <input type="text" name="judul_galeri" class="form-control" placeholder="Judul galeri"
                value="{{ old('judul_galeri') }}">
        </div>
    </div>
    <div class="row form-group">
        <label class="col-md-3 text-right">Judul 2</label>
        <div class="col-md-9">
            <input type="text" name="motto" class="form-control" placeholder="Motto"
                value="{{ old('motto') }}">
        </div>
    </div>

    <div class="row form-group">
        <label class="col-md-3 text-right">Status Text dan Urutan</label>
      
        <div class="col-md-3">
            <select name="status_text" class="form-control">
                <option value="Ya">Ya, tampilkan</option>
                <option value="Tidak">Tidak, jangan tampilkan teks</option>
            </select>
            <small>Tampilkan teks?</small>
        </div>
        <div class="col-md-3">
            <input type="number" name="urutan" class="form-control" placeholder="No urut tampil"
                value="{{ old('urutan') }}">
            <small class="text-success">Urutan</small>
        </div>
    </div>

    <div class="row form-group">
        <label class="col-md-3 text-right">Deskripsi galeri</label>
        <div class="col-md-9">
            <textarea name="isi" id="isi" class="form-control" id="kontenku" placeholder="Isi galeri">{{ old('isi') }}</textarea>
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
