<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Gambar Barang : <?= $barang->nama_barang; ?></h3>

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
                        <?=
                        form_open_multipart('admin/gambar/add/' . $barang->id_barang)
                        ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Keterangan Gambar :</label>
                                    <input type="text" class="form-control" name="keterangan_gambar" placeholder="Keterangan Gambar" value="<?= set_value('keterangan_gambar') ?>">
                                    <?= form_error('keterangan_gambar', '<small class="text-danger ">', '</small>'); ?>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Gambar produk</label>
                                    <input type="file" class="form-control" id="preview" name="gambar" value="<?= set_value('gambar') ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group ">
                                    <img src="<?= base_url('uploads/preview.png') ?>" id="gambar_load" width="100px">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                            <a href="<?= base_url('admin/gambar') ?>" class="btn btn-primary btn-sm">Batal</a>
                        </div>
                        <?= form_close(); ?>

                        <hr size="10px">
                        <div class="row text-center">
                            <?php foreach ($gambar as $gbr) : ?>
                                <div class="col-sm-3 mt-3">
                                    <div class="form-group ">
                                        <img src="<?= base_url('assets/gambar/' . $gbr->gambar) ?>" id="gambar_load" width="200px" height="200px">
                                    </div>
                                    <p>Keterangan : <?= $gbr->keterangan_gambar ?></p>
                                    <button data-toggle="modal" data-target="#delete<?= $gbr->id_gambar ?>" class="btn btn-danger btn-xs btn-block"><i class="fas fa-trash"></i> Hapus</button>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>
</div>


<!-- modal delete -->
<?php foreach ($gambar as $gbr) : ?>
    <div class="modal fade" id="delete<?= $gbr->id_gambar ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $gbr->keterangan_gambar; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="form-group ">
                        <img src="<?= base_url('assets/gambar/' . $gbr->gambar) ?>" width="200px" height="200px">
                    </div>
                    <h5>Apakah anda yakin ingin menghapus <?= $gbr->keterangan_gambar; ?> ?</h5>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a href="<?= base_url('admin/gambar/delete/' . $gbr->id_barang . '/' . $gbr->id_gambar) ?>" class="btn btn-primary">Delete</a>
                </div>

            </div>
        </div>
    </div>
<?php endforeach; ?>
<script>
    function gambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#preview').change(function() {
        gambar(this);
    });
</script>