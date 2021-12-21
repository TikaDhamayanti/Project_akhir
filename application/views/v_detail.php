<div class="page-contain single-product">
    <div class="container">

        <!-- Main content -->
        <div id="main-content" class="main-content" style="margin-top: 100px;">

            <!-- summary info -->
            <div class="sumary-product single-layout">
                <div class="media">
                    <ul class="biolife-carousel slider-for" data-slick='{"arrows":false,"dots":false,"slidesMargin":30,"slidesToShow":1,"slidesToScroll":1,"fade":true,"asNavFor":".slider-nav"}'>

                        <?php foreach ($gambar as $gbr) : ?>
                            <li><img src="<?= base_url('assets/gambar/' . $gbr->gambar) ?>" alt="" width="300" height="300"></li>
                        <?php endforeach; ?>
                    </ul>
                    <ul class="biolife-carousel slider-nav" data-slick='{"arrows":false,"dots":false,"centerMode":false,"focusOnSelect":true,"slidesMargin":10,"slidesToShow":4,"slidesToScroll":1,"asNavFor":".slider-for"}'>
                        <?php foreach ($gambar as $gbr) : ?>
                            <li><img src="<?= base_url('assets/gambar/' . $gbr->gambar) ?>" alt="" width="500" height="500"></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="product-attribute">
                    <h3 class="title"><?= $barang->nama_barang ?></h3>
                    <p class="excerpt"><?= $barang->keterangan ?></p>
                    <div class="price">
                        <ins><span class="price-amount"><span class="currencySymbol">Rp.</span><?= number_format($barang->harga) ?></ins>
                    </div>
                    <div class="action-form ">
                        <div class="buttons">
                            <a href="<?= base_url('home/tambah_ke_keranjang/' . $barang->id_barang) ?>" class="btn add-to-cart-btn">add to cart</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>