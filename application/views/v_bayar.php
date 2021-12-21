<div class="order-summary sm-margin-bottom-80px" style="width: 500px; margin-left : 380px; margin-top: 50px;">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"> <b> No. Rekening Laperpool</b></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form>
                                <div class="card-body">
                                    <h5>Transfer ke rekening ini sebesar :</h5>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <h1 class="text-primary">Rp.<?= number_format($pesanan->total_bayar) ?></h1>
                                </div>
                                <table class="table">
                                    <tr>
                                        <th>Bank</th>
                                        <th>No. Rekening</th>
                                        <th>Atas nama</th>
                                    </tr>
                                    <tbody>
                                        <?php foreach ($rekening as $rkg) : ?>
                                            <tr>
                                                <td><?= $rkg->nama_bank ?></td>
                                                <td><?= $rkg->no_rekening ?></td>
                                                <td><?= $rkg->atas_nama ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
    </section>

</div>
<div class="order-summary sm-margin-bottom-80px" style="width: 500px; margin-left : 380px; margin-top: 30px;">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><?= $title ?></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <?= form_open_multipart('pesanan/bayar/' . $pesanan->id_transaksi) ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Atas Nama</label>
                                    <input type="text" class="form-control" placeholder="Atas Nama" name="atas_nama" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama Bank</label>
                                    <input type="text" class="form-control" placeholder="Nama Bank" name="nama_bank" required>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Rekening</label>
                                    <input type="text" class="form-control" placeholder="Nomor rekening" name="no_rek" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Bukti Pembayaran</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" name="bukti_bayar" required>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <?= form_close() ?>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
    </section>

</div>