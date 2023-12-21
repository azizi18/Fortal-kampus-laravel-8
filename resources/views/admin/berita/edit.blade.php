<p class="text-right">
    <a href="{{ asset('admin/berita') }}" class="btn btn-success btn-sm">
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

<form action="{{ asset('admin/berita/edit_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
    {{ csrf_field() }}
    <input type="hidden" name="id_berita" value="{{ $berita->id_berita }}">
    <div class="row form-group">
        <label class="col-md-3 text-right">Status Berita &amp; Nomor Urut tampil</label>

        <div class="col-md-3">
            <select name="status_berita" class="form-control select2">
               
                <option value="Publish">Publikasikan</option>
                <option value="Draft" <?php if($berita->status_berita=="Draft") { echo "selected"; } ?>>Simpan sebagai draft</option>
              </select>
            <small>Tampilkan di website?</small>
        </div>
        <div class="col-md-3">
            <input type="number" name="urutan" class="form-control" placeholder="No urut tampil"
                value="{{ $berita->urutan }}">
            <small class="text-success">Urutan</small>
        </div>
    </div>
    <div class="row form-group">
        <label class="col-md-3 text-right">Judul atau Nama</label>
        <div class="col-md-6">
            <input type="text" name="judul_berita" class="form-control" placeholder="Judul berita/profil/layanan"
                required="required" value="<?php echo $berita->judul_berita; ?>">
        </div>
    </div>
    <?php if($berita->jenis_berita!='Berita') { ?>
    <input type="hidden" name="jenis_berita" value="<?php echo $berita->jenis_berita; ?>">
    <input type="hidden" name="id_kategori" value="0">
    <?php }else{ ?>
    <div class="row form-group">
        <label class="col-md-3 text-right">Kategori</label>
        <div class="col-md-6">
            <select name="id_kategori" class="form-control select2">
                <?php foreach($kategori as $kategori) { ?>
                <option value="<?php echo $kategori->id_kategori; ?>" <?php if ($berita->id_kategori == $kategori->id_kategori) {
                    echo 'selected';
                } ?>>
                    <?php echo $kategori->nama_kategori; ?></option>
                <?php } ?>
            </select>
            <small class="text-success">Kategori</small>
        </div>
    </div>
    <input type="hidden" name="jenis_berita" value="Berita">
    <?php } ?>

   
    <div class="row form-group">
        <label class="col-md-3 text-right">Isi berita</label>
        <div class="col-md-9">
            <textarea name="isi" class="form-control" id="editor" placeholder="Isi berita" placeholder="Isi berita"><?php echo $berita->isi; ?></textarea>
        </div>
    </div>


    <div class="row form-group">
        <label class="col-md-3 text-right"> Tanggal Publish</label>


        <div class="col-md-2">
            <input type="text" name="tanggal_publish" class="form-control tanggal" placeholder="Tanggal publikasi"
                value="<?php if (isset($_POST['tanggal_publish'])) {
                    echo old('tanggal_publish');
                } else {
                    echo date('Y-m-d', strtotime($berita->tanggal_publish));
                } ?>" data-date-format="dd-mm-yyyy">
        </div>
    
    </div>
   


    <div class="row form-group">
        <label class="col-md-3 text-right"></label>
        <div class="col-md-9">
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-success ">
                    <i class="fa fa-save"></i> Simpan Data
                </button>
                <input type="reset" name="reset" class="btn btn-info " value="Reset">
            </div>

        </div>

    </div>
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
