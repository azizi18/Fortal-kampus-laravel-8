<form action="{{ asset('admin/download/proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}
<p class="btn-group">

  <a href="{{ asset('admin/download/tambah') }}" class="btn btn-success ">
  <i class="fa fa-plus"></i> Tambah File</a>
  
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
    <th width="35%">Judul Download</th>
    <th width="20%">KATEGORI</th>
    <th width="10%">URUTAN</th>
    <th width="5%">ACTION</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($download as $download) { ?>

<tr>
    <td class="text-center">
      <div class="icheck-primary">
        <input type="checkbox" name="id_download" value="{{ $download->id_download }}" id="check<?php echo $i ?>">
        <label for="check<?php echo $i ?>"></label>
      </div>
    </td>
    <td><?php echo $download->judul_download ?>
      <br>
      <br><small>
      File :<br> 
      <?php echo $download->file ?> 
      </small>

    </td>
   
    <td><?php echo $download->nama_kategori_download ?> 
    </td>
  <td><?php echo $download->urutan; ?></td>
   
    <td>
      <div class="btn-group">
        <a href="{{ asset('admin/download/edit/'.$download->id_download) }}" 
          class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
          <a href="{{ asset('admin/download/delete/'.$download->id_download) }}" class="btn btn-danger btn-sm delete-link"><i class="fa fa-trash"></i></a>
        </div>
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>

</form>