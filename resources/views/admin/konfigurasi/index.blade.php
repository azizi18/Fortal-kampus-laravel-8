@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ asset('admin/konfigurasi/proses') }}" method="post" accept-charset="utf-8">
    {{ csrf_field() }}


    <div class="col-md-6">
        <h3>Basic information:</h3>
        <hr>
        <input type="hidden" name="id_konfigurasi" value="<?php echo $site->id_konfigurasi ?>">
        <div class="form-group">
            <label>Nama Universitas</label>
            <input type="text" name="namaweb" placeholder="Nama organisasi/perusahaan" value="<?php echo $site->namaweb; ?>"
                required class="form-control">
        </div>


        <div class="form-group">
            <label>Singkatan</label>
            <input type="text" name="singkatan" placeholder="ABC" value="<?php echo $site->singkatan; ?>" required
                class="form-control">
        </div>

        <div class="form-group">
            <label>Universitas tagline/motto</label>
            <input type="text" name="tagline" placeholder="Company tagline/motto" value="<?php echo $site->tagline; ?>"
                class="form-control">
        </div>


        <div class="form-group">
            <label>Official email</label>
            <input type="email" name="email" placeholder="youremail@address.com" value="<?php echo $site->email; ?>"
                class="form-control" required>
        </div>


        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" rows="3" class="form-control" placeholder="Alamat perusahaan/organisasi"><?php echo $site->alamat; ?></textarea>
        </div>

        <div class="form-group">
            <label>Telephone</label>
            <input type="text" name="telepon" placeholder="021-000000" value="<?php echo $site->telepon; ?>"
                class="form-control">
        </div>

    
       
            <hr>
            <div class="form-group btn-group">
                <input type="submit" name="submit" value="Save Configuration" class="btn btn-success ">
                <input type="reset" name="reset" value="Reset" class="btn btn-primary ">
            </div>
        </div>
    </div>


    </div>
</form>
