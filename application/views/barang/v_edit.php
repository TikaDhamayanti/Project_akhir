<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Data Barang</h3>

                    </div>
                    <div class="card-body" id="edit_barang">
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
                        form_open_multipart('admin/barang/edit/' . $barang->id_barang)
                        ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" value="<?= $barang->nama_barang ?>">
                                    <?= form_error('nama_barang', '<small class="text-danger ">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="id_kategori" id="kategori" class="form-control">
                                        <option value="<?= $barang->id_kategori ?>"><?= $barang->nama_kategori ?></option>
                                        <?php
                                        foreach ($kategori as $ktg) : ?>
                                            <option value="<?= $ktg->id_kategori ?>"><?= $ktg->nama_kategori ?></option>
                                            <?= form_error('id_kategori', '<small class="text-danger ">', '</small>'); ?>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga" value="<?= $barang->harga ?>" id="nama">
                                    <?= form_error('harga', '<small class="text-danger ">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" class="form-control" cols="10" rows="5"><?= $barang->keterangan ?></textarea>
                                    <?= form_error('keterangan', '<small class="text-danger ">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Edit Gambar</label>
                                    <input type="file" class="form-control" id="preview" name="gambar">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group ">
                                    <img src="<?= base_url('uploads/' . $barang->gambar) ?>" id="gambar_load" width="100px">
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                            <a href="<?= base_url('barang') ?>" class="btn btn-success btn-sm">Batal</a>
                        </div>

                    </div>
                    <?= form_close() ?>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
    </div>
</div>
</div>
</div>

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