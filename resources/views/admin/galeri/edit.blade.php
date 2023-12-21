<p class="text-right">
    <a href="{{ asset('admin/galeri') }}" class="btn btn-success btn-sm">
        <i class="fa fa-backward"></i> Kembali
    </a>
</p>
<hr>
<?php
// Validasi error

// Error upload
if (isset($error)) {
    echo '<div class="alert alert-warning">';
    echo $error;
    echo '</div>';
}

// Form open

?>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ asset('admin/galeri/edit_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
    {{ csrf_field() }}
    <input type="hidden" name="id_galeri" value="{{ $galeri->id_galeri }}">
    <div class="row form-group">
        <label class="col-md-3 text-right">Judul galeri</label>
        <div class="col-md-9">
            <input type="text" name="judul_galeri" class="form-control" placeholder="Judul galeri"
                value="<?php echo $galeri->judul_galeri; ?>">
        </div>
    </div>
    <div class="row form-group">
        <label class="col-md-3 text-right">Judul 2</label>
        <div class="col-md-9">
            <input type="text" name="motto" class="form-control" placeholder="Motto"
                value="<?php echo $galeri->motto; ?>">
        </div>
    </div>

    <div class="row form-group">
        <label class="col-md-3 text-right">Status Text dan Urutan</label>
        <div class="col-md-3">
            <select name="status_text" class="form-control">
                <option value="Ya">Ya, tampilkan</option>
                <option value="Tidak" <?php if ($galeri->status_text == 'Tidak') {
                    echo 'selected';
                } ?>>Tidak, jangan tampilkan teks</option>
            </select>
            <small>Tampilkan teks</small>
        </div>

        <div class="col-md-3">
            <input type="number" name="urutan" class="form-control" placeholder="No urut tampil"
                value="<?php echo $galeri->urutan; ?>">
            <small>Urutan tampil</small>
        </div>
    </div>

    <div class="row form-group">
        <label class="col-md-3 text-right">Upload gambar</label>
        <div class="col-md-9">
            <input type="file" name="gambar" class="form-control" placeholder="Upload gambar">
        </div>
    </div>

    <div class="row form-group">
        <label class="col-md-3 text-right">Deskripsi galeri</label>
        <div class="col-md-9">
            <textarea name="isi" id="isi" class="form-control" id="kontenku" placeholder="Isi galeri"><?php echo $galeri->isi; ?></textarea>
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
