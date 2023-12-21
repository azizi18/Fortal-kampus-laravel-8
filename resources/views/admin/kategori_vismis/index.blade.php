<p>
@include('admin/kategori_vismis/tambah')
</p>

<table class="table table-bordered" id="example1">
<thead>
<tr>
    <th width="5%">NO</th>
    <th width="35%">NAMA KATEGORI</th>
    <th width="25%">SLUG</th>
    <th width="15%">NO URUT</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($kategori_vismis as $kategori_vismis) { ?>

<tr>
    <td class="text-center"><?php echo $i ?></td>
    <td><?php echo $kategori_vismis->nama_kategori_vismis ?></td>
    <td><?php echo $kategori_vismis->slug_kategori_vismis ?></td>
    
    <td><?php echo $kategori_vismis->urutan ?></td>
    <td>
      <div class="btn-group">
      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Edit<?php echo $kategori_vismis->id_kategori_vismis ?>">
    <i class="fa fa-edit"></i> Edit
</button>
      <a href="{{ asset('admin/kategori_vismis/delete/'.$kategori_vismis->id_kategori_vismis) }}" class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i> Hapus</a>
      </div>
      @include('admin/kategori_vismis/edit')
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>