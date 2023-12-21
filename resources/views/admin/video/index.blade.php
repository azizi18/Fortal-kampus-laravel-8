@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<p>
    @include('admin/video/tambah')
</p>
<form action="{{ asset('admin/video/proses') }}" method="post" accept-charset="utf-8">
    {{ csrf_field() }}
    <div class="row">

        <div class="col-md-12">
            <div class="btn-group">
             
                <button type="button" class="btn btn-success " data-toggle="modal" data-target="#Tambah">
                    <i class="fa fa-plus"></i> Tambah Baru
                </button>
            </div>
        </div>
    </div>

    <div class="clearfix">
        <hr>
    </div>
    <div class="table-responsive mailbox-messages">
        <div class="table-responsive mailbox-messages">
            <table id="example1" class="display table table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr class="bg-info">
                        <th width="5%">
                            <div class="mailbox-controls">
                                <!-- Check all button -->
                                <button type="button" class="btn btn-info btn-sm checkbox-toggle"><i
                                        class="far fa-square"></i>
                                </button>
                            </div>
                        </th>
                        <th width="40%">VIDEO</th>
                        <th width="15%">URUTAN</th>
                        <th width="10%">ACTION</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $i=1; foreach($video as $video) { ?>

                    <td class="text-center">
                        <div class="icheck-primary">
                            <input type="checkbox" class="icheckbox_flat-blue " name="id_video[]"
                                value="<?php echo $video->id_video; ?>" id="check<?php echo $i; ?>">
                            <label for="check<?php echo $i; ?>"></label>
                        </div>
                    </td>
                    <td>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item"
                                src="{{ $video->video }}?rel=0" allowfullscreen></iframe>
                        </div>
                        <hr>
                       
                    </td>

                    <td> {{$video->urutan}}</td>
                   
                    <td>
                        <div class="btn-group">
                            <a href=" {{ url('video') }}"
                            class="btn btn-success btn-sm" target="_blank"><i class="fa fa-eye"></i></a>
                            <a href="{{ asset('admin/video/edit/' . $video->id_video) }}"
                                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                            <a href="{{ asset('admin/video/delete/' . $video->id_video) }}"
                                class="btn btn-danger btn-sm  delete-link">
                                <i class="fa fa-trash"></i></a>
                        </div>

                    </td>
                    </tr>

                    <?php $i++; } ?>

                </tbody>
            </table>
        </div>
    </div>
</form>
