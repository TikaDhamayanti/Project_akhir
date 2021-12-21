<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data Gambar Barang</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php
                        if ($this->session->flashdata('pesan')) {
                            echo ' <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i>';
                            echo $this->session->flashdata('pesan');
                            echo '</h5></div>';
                        }
                        ?>
                        <table class="table table-bordered" id="example1">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Cover</th>
                                    <th>Jumlah Barang</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php $no = 1;
                                foreach ($gambar as $gbr) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $gbr->nama_barang ?></td>
                                        <td class="text-center"><img src="<?= base_url() . '/uploads/' . $gbr->gambar; ?>" width="150px"></td>
                                        <td><?= $gbr->total_gambar ?></td>
                                        <td>
                                            <a class="btn btn-success" href="<?= base_url('admin/gambar/add/' . $gbr->id_barang) ?>"><i class="fa fa-plus">Add gambar</i></a>
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