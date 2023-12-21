<p>
@include('admin/kategori_kemahasiswaan/tambah')
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

<?php $i=1; foreach($kategori_kemahasiswaan as $kategori_kemahasiswaan) { ?>

<tr>
    <td class="text-center"><?php echo $i ?></td>
    <td><?php echo $kategori_kemahasiswaan->nama_kategori_kemahasiswaan ?></td>
    <td><?php echo $kategori_kemahasiswaan->slug_kategori_kemahasiswaan?></td>
    
    <td><?php echo $kategori_kemahasiswaan->urutan ?></td>
    <td>
      <div class="btn-group">
      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Edit<?php echo $kategori_kemahasiswaan->id_kategori_kemahasiswaan?>">
    <i class="fa fa-edit"></i> Edit
</button>
      <a href="{{ asset('admin/kategori_kemahasiswaan/delete/'.$kategori_kemahasiswaan->id_kategori_kemahasiswaan) }}" class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i> Hapus</a>
      </div>
      @include('admin/kategori_kemahasiswaan/edit')
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>