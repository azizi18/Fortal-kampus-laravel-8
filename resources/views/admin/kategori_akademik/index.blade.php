<p>
@include('admin/kategori_akademik/tambah')
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

<?php $i=1; foreach($kategori_akademik as $kategori_akademik) { ?>

<tr>
    <td class="text-center"><?php echo $i ?></td>
    <td><?php echo $kategori_akademik->nama_kategori_akademik ?></td>
    <td><?php echo $kategori_akademik->slug_kategori_akademik ?></td>
    
    <td><?php echo $kategori_akademik->urutan ?></td>
    <td>
      <div class="btn-group">
      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Edit<?php echo $kategori_akademik->id_kategori_akademik ?>">
    <i class="fa fa-edit"></i> Edit
</button>
      <a href="{{ asset('admin/kategori_akademik/delete/'.$kategori_akademik->id_kategori_akademik) }}" class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i> Hapus</a>
      </div>
      @include('admin/kategori_akademik/edit')
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>