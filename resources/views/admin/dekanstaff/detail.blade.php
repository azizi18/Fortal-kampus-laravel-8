<p class="text-right">
	<a href="{{ asset('admin/staff/edit/'.$staff->id_staff) }}" class="btn btn-warning btn-sm">
		<i class="fa fa-edit"></i> Edit
	</a>
	<a href="{{ asset('admin/staff') }}" class="btn btn-success btn-sm">
		<i class="fa fa-backward"></i> Kembali
	</a>
</p>
<hr>

<div class="row">
  <div class="col-md-3">
    <!-- Profile Image -->
    <div class="card card-primary card-outline">
      <div class="card-body box-profile">
        <div class="text-center">
          <img class="profile-user-img img-fluid img-circle" src="<?php if($staff->gambar=="") { ?>asset('assets/upload/staff/thumbs/'.$staff->gambar) }}<?php }else{ ?>{{ asset('assets/upload/image/thumbs/'.website('icon')) }}<?php } ?>" alt="{{ $staff->nama_staff }}">
        </div>

        <h3 class="profile-username text-center">{{ $staff->nama_staff }}</h3>

        <p class="text-muted text-center">{{ $staff->jabatan }}</p>

       
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <div class="col-md-9">
    	<div class="card card-primary">
    	<div class="card-header">
                <h3 class="card-title">About Me: {{ $staff->nama_staff }}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
    	<table class="table table-bordered">
    		<thead>
    			<tr>
    				<th width="25%">Nama lengkap</th>
    				<th>{{ $staff->nama_staff }}</th>
    			</tr>
    		</thead>
    		<tbody>
    			<tr>
    				<td>Jabatan</td>
    				<td>{{ $staff->jabatan }}</td>
    			</tr>
    			<tr>
    				<td>Jenis/Kategori</td>
    				<td>{{ $staff->nama_kategori_staff }}</td>
    			</tr>
    			<tr>
    				<td>Pendidikan</td>
    				<td>{{ $staff->nik }}</td>
    			</tr>
    			<tr>
    				<td>Tampil di website?</td>
    				<td>{{ $staff->status_staff }}</td>
    			</tr>
    			
    		</tbody>
    	</table>
</div>
</div>
</div>
    </div>
</div>