<div class="content">
    <div class="container-fluid">
        <!-- ./row -->
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Order</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">On Process</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Delivery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Diterima</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No Order</th>
                                            <th>Tanggal Order</th>
                                            <th>Total Bayar</th>
                                            <th width="30%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pesanan as $value) : ?>
                                            <tr>
                                                <td><?= $value->no_order ?></td>
                                                <td><?= $value->tanggal_order ?></td>
                                                <td>
                                                    Rp.<?= number_format($value->total_bayar) ?><br>
                                                    <?php if ($value->status_bayar == 0) { ?>
                                                        <span class=" badge bg-danger">Belum Bayar</span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-warning">Sudah Bayar</span><br>
                                                        <span style="color: blue;">Menunggu verifikasi</span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($value->status_bayar == 1) { ?>
                                                        <button data-toggle="modal" data-target="#pesanan<?= $value->id_transaksi ?>" class="btn btn-success">Bukti Bayar</button>
                                                        <a href="<?= base_url('admin/admin/proses/' . $value->id_transaksi) ?>" type="button" class="btn btn-primary" style="margin-left: 10px;">Proses</a>
                                                </td>
                                            <?php } ?>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No Order</th>
                                            <th>Tanggal Order</th>
                                            <th>Total Bayar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pesanan_proses as $value) : ?>
                                            <tr>
                                                <td><?= $value->no_order ?></td>
                                                <td><?= $value->tanggal_order ?></td>
                                                <td>
                                                    Rp.<?= number_format($value->total_bayar) ?><br>
                                                    <span class=" badge bg-success">On Process</span>
                                                </td>
                                                <td>
                                                    <?php if ($value->status_bayar == 1) { ?>
                                                        <button data-toggle="modal" data-target="#kirim<?= $value->id_transaksi ?>" class="btn btn-primary">Send</button>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No Order</th>
                                            <th>Tanggal Order</th>
                                            <th>Total Bayar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($dikirim as $value) : ?>
                                            <tr>
                                                <td><?= $value->no_order ?></td>
                                                <td><?= $value->tanggal_order ?></td>
                                                <td>
                                                    Rp.<?= number_format($value->total_bayar) ?><br>

                                                </td>
                                                <td>
                                                    <?php if ($value->status_order == 2) { ?>
                                                        <span class=" badge bg-primary">On Delivery</span><br>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No Order</th>
                                            <th>Tanggal Order</th>
                                            <th>Total Bayar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($diterima as $value) : ?>
                                            <tr>
                                                <td><?= $value->no_order ?></td>
                                                <td><?= $value->tanggal_order ?></td>
                                                <td>
                                                    Rp.<?= number_format($value->total_bayar) ?><br>

                                                </td>
                                                <td>
                                                    <?php if ($value->status_order == 3) { ?>
                                                        <span class=" badge bg-primary">received</span><br>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<?php foreach ($pesanan as $value) : ?>
    <div class="modal fade" id="pesanan<?= $value->id_transaksi ?>">
        <div class="modal-dialog">
            <div class="modal-content bg-default">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $value->no_order ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th>Nama Bank</th>
                            <th>:</th>
                            <td><?= $value->nama_bank ?></td>
                        </tr>
                        <tr>
                            <th>Nomor Rekening</th>
                            <th>:</th>
                            <td><?= $value->no_rek ?></td>
                        </tr>
                        <tr>
                            <th>Atas nama</th>
                            <th>:</th>
                            <td><?= $value->atas_nama ?></td>
                        </tr>
                        <tr>
                            <th>Total Bayar</th>
                            <th>:</th>
                            <td>Rp.<?= number_format($value->total_bayar) ?></td>
                        </tr>
                    </table>
                    <img src="<?= base_url('assets/bukti_bayar/' . $value->bukti_bayar) ?>" width="200">
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach ?>


<?php foreach ($pesanan_proses as $value) : ?>
    <div class="modal fade" id="kirim<?= $value->id_transaksi ?>">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $value->no_order ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('admin/admin/kirim/' . $value->id_transaksi) ?>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th>Delivery</th>
                            <th>:</th>
                            <td>Rp.<?= number_format($value->ongkir) ?></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
                <?= form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach ?>