<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data Barang</h3>

                        <div class="card-tools">
                            <a href="<?= base_url('admin/barang/add') ?>" type="button" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i>Add
                            </a>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php
                        if ($this->session->flashdata('pesan')) {
                            echo ' <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i>';
                            echo $this->session->flashdata('pesan', 'Data berhasil ditambahkan');
                            echo '</h5></div>';
                        }
                        ?>
                        <table class="table table-bordered" id="example1">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Keterangan</th>
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php $no = 1;
                                foreach ($barang as $brg) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><img src="<?= base_url() . '/uploads/' . $brg->gambar; ?>" width="150px"></td>
                                        <td><?= $brg->nama_barang ?></td>
                                        <td><?= $brg->nama_kategori ?></td>
                                        <td><?= $brg->keterangan ?></td>
                                        <td>Rp.<?= number_format($brg->harga) ?></td>
                                        <td>
                                            <a class="btn btn-warning" href="<?= base_url('admin/barang/edit/' . $brg->id_barang)  ?>"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $brg->id_barang ?>"><i class="fa fa-trash"></i></a>

                                        </td>

                                    </tr>

                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>

    </div>

</div>
</div>


<!-- modal delete -->
<?php foreach ($barang as $brg) : ?>
    <div class="modal fade" id="delete<?= $brg->id_barang ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $brg->nama_barang; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h5>Apakah anda yakin ingin menghapus <?= $brg->nama_barang; ?> ?</h5>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a type="submit" href="<?= base_url('admin/barang/delete/' . $brg->id_barang) ?>" class="btn btn-primary">Delete</a>
                </div>

            </div>
        </div>
    </div>
<?php endforeach; ?>


<script>
    function delete_barang(id_barang) {
        swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            },
            function() {
                $.ajax({
                    url: "<?= base_url('admin/barang/delete/') ?>",
                    type: "POST",
                    data: {
                        id: id_barang
                    },
                    success: function() {
                        swal('Data Berhasil dihapus', 'success');
                    },
                    error: function() {
                        swal('Data gagal dihapus', 'error');
                    }
                })
            })
    }
</script>