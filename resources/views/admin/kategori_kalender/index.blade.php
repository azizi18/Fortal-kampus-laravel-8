<p>
@include('admin/kategori_kalender/tambah')
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

<?php $i=1; foreach($kategori_kalender as $kategori_kalender) { ?>

<tr>
    <td class="text-center"><?php echo $i ?></td>
    <td><?php echo $kategori_kalender->nama_kategori_kalender ?></td>
    <td><?php echo $kategori_kalender->slug_kategori_kalender ?></td>
    
    <td><?php echo $kategori_kalender->urutan ?></td>
    <td>
      <div class="btn-group">
      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Edit<?php echo $kategori_kalender->id_kategori_kalender ?>">
    <i class="fa fa-edit"></i> Edit
</button>
      <a href="{{ asset('admin/kategori_kalender/delete/'.$kategori_kalender->id_kategori_kalender) }}" class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i> Hapus</a>
      </div>
      @include('admin/kategori_kalender/edit')
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>