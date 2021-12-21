<div class="page-contain single-product">
    <div class="container">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="product-tabs single-layout biolife-tab-contain" style="margin-top: 50px;">
                <div class="tab-head">
                    <ul class="tabs">
                        <li class="tab-element active"><a href="#tab_1st" class="tab-link">Ordered Products</a></li>
                        <li class="tab-element"><a href="#tab_2nd" class="tab-link">On Process</a></li>
                        <li class="tab-element"><a href="#tab_3rd" class="tab-link">Shipping & Delivery</a></li>
                        <li class="tab-element"><a href="#tab_4th" class="tab-link">Products Received</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div id="tab_1st" class="tab-contain desc-tab active">
                        <div class="col-md-12">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table text-center" style="font-size: 20px;">
                                    <thead>
                                        <tr>
                                            <th style="width: 20px">No. Order</th>
                                            <th style="width: 70px">Tanggal Order</th>
                                            <th style="width: 70px">Total Harga</th>
                                            <th style="width: 40px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($belum_bayar as $value) : ?>
                                            <tr>
                                                <td><?= $value->no_order ?></td>
                                                <td><?= $value->tanggal_order ?></td>
                                                <td>
                                                    Rp.<?= number_format($value->total_bayar) ?><br>
                                                    <?php if ($value->status_bayar == 0) { ?>
                                                        <span class="badge bg-danger bg-xs">Belum Bayar</span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-warning bg-xs">Sudah Bayar</span><br>
                                                        <span style="color: blue;">Menunggu verifikasi</span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($value->status_bayar == 0) { ?>
                                                        <a href="<?= base_url('pesanan/bayar/' . $value->id_transaksi) ?>" type="button" class="btn btn-primary" style="margin-left: 10px;">Payment</a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="tab_2nd" class="tab-contain addtional-info-tab">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table text-center" style="font-size: 20px;">
                                <thead>
                                    <tr>
                                        <th style="width: 20px">No. Order</th>
                                        <th style="width: 70px">Tanggal Order</th>
                                        <th style="width: 70px">Total Harga</th>
                                        <th style="width: 40px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($diproses as $value) : ?>
                                        <tr>
                                            <td><?= $value->no_order ?></td>
                                            <td><?= $value->tanggal_order ?></td>
                                            <td>
                                                Rp.<?= number_format($value->total_bayar) ?><br>
                                            </td>
                                            <td>
                                                <span class="badge badge-warning">On Process</span><br>
                                            </td>

                                        </tr>
                                    <?php endforeach ?>
                            </table>
                        </div>
                    </div>
                    <div id="tab_3rd" class="tab-contain shipping-delivery-tab">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table text-center" style="font-size: 20px;">
                                <thead>
                                    <tr>
                                        <th style="width: 20px">No. Order</th>
                                        <th style="width: 70px">Tanggal Order</th>
                                        <th style="width: 70px">Total Harga</th>
                                        <th style="width: 40px">Action</th>
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
                                                    <button data-toggle="modal" data-target="#diterima<?= $value->id_transaksi ?>" class="btn btn-success">Diterima</button>
                                                <?php } ?>
                                            </td>

                                        </tr>
                                    <?php endforeach ?>
                            </table>
                        </div>
                    </div>
                    <div id="tab_4th" class="tab-contain review-tab">
                        <div class="container">
                            <div class="card-body">
                                <table class="table text-center" style="font-size: 20px;">
                                    <thead>
                                        <tr>
                                            <th style="width: 20px">No. Order</th>
                                            <th style="width: 70px">Tanggal Order</th>
                                            <th style="width: 70px">Total Harga</th>
                                            <th style="width: 40px">Action</th>
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
                                                        <span class="badge badge-warning">Delivered</span><br>
                                                    <?php } ?>
                                                </td>

                                            </tr>
                                        <?php endforeach ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php foreach ($dikirim as $value) : ?>
    <div class="modal fade" id="diterima<?= $value->id_transaksi ?>">
        <div class="modal-dialog">
            <div class="modal-content bg-primary">
                <div class="modal-header">
                    <h4 class="modal-title">Primary Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Apakah pesanan sudah diterima?</h4>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('pesanan/diterima/' . $value->id_transaksi) ?>" type="button" class="btn btn-outline-light">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach ?>