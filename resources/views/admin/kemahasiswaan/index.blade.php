<form action="{{ asset('admin/kemahasiswaan/proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}
<p class="btn-group">

  <a href="{{ asset('admin/kemahasiswaan/tambah') }}" class="btn btn-success ">
  <i class="fa fa-plus"></i> Tambah Data</a>
  
</p>

<div class="table-responsive mailbox-messages">
<table id="example1" class="display table table-bordered" cellspacing="0" width="100%">
<thead>
<tr class="bg-info">
    <tr class="bg-dark">
        <th width="5%">
            <div class="mailbox-controls">
                <!-- Check all button -->
               <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
            </div>
        </th>
    <th width="30%">ISI</th>
    <th width="10%">KATEGORI</th>
    <th width="10%">URUTAN</th>
    <th width="10%">ACTION</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($kemahasiswaan as $kemahasiswaan) { ?>

<tr>
    <td class="text-center">
      <div class="icheck-primary">
        <input type="checkbox" name="id_kemahasiswaan" value="{{ $kemahasiswaan->id_kemahasiswaan }}" id="check<?php echo $i ?>">
        <label for="check<?php echo $i ?>"></label>
      </div>
    </td>
    <td><?php echo \Illuminate\Support\Str::limit(strip_tags($kemahasiswaan->isi), 200, $end = '...'); ?>
    </td>
   
    
    <td><?php echo $kemahasiswaan->nama_kategori_kemahasiswaan ?> 
     
    </td>
    <td><?php echo $kemahasiswaan->urutan ?>
    </td>
    <td>
      <div class="btn-group">
        <a href=" {{ asset('kemahasiswaan/kategori/'.$kemahasiswaan->slug_kategori_kemahasiswaan) }}"
          class="btn btn-success btn-sm" target="_blank"><i class="fa fa-eye"></i></a>
        <a href="{{ asset('admin/kemahasiswaan/edit/'.$kemahasiswaan->id_kemahasiswaan) }}" 
          class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
          <a href="{{ asset('admin/kemahasiswaan/delete/'.$kemahasiswaan->id_kemahasiswaan) }}" class="btn btn-danger btn-sm delete-link"><i class="fa fa-trash"></i></a>
        </div>
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>

</form>