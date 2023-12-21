<p class="text-right">
    <a href="{{ asset('admin/wakilrektor') }}" class="btn btn-success btn-sm"><i class="fa fa-backward"></i> Kembali</a>
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

<form action="{{ asset('admin/wakilrektor/tambah_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
    {{ csrf_field() }}

    <div class="row form-group">
        <label class="col-md-3 text-right">Status Tampil &amp; Nomor Urut tampil</label>

        <div class="col-md-3">
            <select name="status_staff" class="form-control">
                <option value="Ya">Ya, tampilkan di website</option>
                <option value="Tidak">Tidak, jangan tampilkan di website</option>
            </select>
            <small>Tampilkan di website?</small>
        </div>
        <div class="col-md-3">
            <input type="number" name="urutan" class="form-control" placeholder="No urut tampil"
                value="{{ old('urutan') }}">
            <small class="text-success">Urutan</small>
        </div>
    </div>


    <div class="row form-group">
        <label class="col-md-3 text-right">Nama staff <span class="text-danger">*</span></label>
        <div class="col-md-9">
            <input type="text" name="nama_staff" class="form-control" placeholder="Nama staff"
                value="{{ old('nama_staff') }}" required>
        </div>
    </div>

    <div class="row form-group">
        <label class="col-md-3 text-right">NIK/NIP</label>
        <div class="col-md-9">
            <input type="text" name="nik" class="form-control" placeholder="NIK/NIP" value="{{ old('nik') }}">
        </div>
    </div>
    <div class="row form-group">
        <label class="col-md-3 text-right">Jabatan (Position)</label>
        <div class="col-md-9">
            <input type="text" name="jabatan" class="form-control" placeholder="Jabatan (Position)"
                value="{{ old('jabatan') }}">
        </div>
    </div>


    <div class="row form-group">
        <label class="col-md-3 text-right">Upload gambar/Foto</label>
        <div class="col-md-9">
            <input type="file" name="gambar" class="form-control" required="required" placeholder="Upload gambar">
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
