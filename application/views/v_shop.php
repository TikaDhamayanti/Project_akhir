<div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
            <li class="nav-item"><a href="#" class="permal-link">Natural Organic</a></li>
        </ul>
    </nav>
</div>

<div class="page-contain category-page no-sidebar">
    <div class="container">
        <div class="row">

            <!-- Main content -->
            <div id="main-content" class="main-content col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-category grid-style">
                    <div class="row">
                        <ul class="products-list">
                            <?php foreach ($barang as $brg) : ?>
                                <li class="product-item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                    <div class="contain-product layout-default">
                                        <div class="product-thumb">
                                            <a href="#" class="link-to-product">
                                                <img src="<?= base_url() . '/uploads/' . $brg->gambar; ?>" width="250" height="250" class="product-thumnail">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <b class="categories"><?= $brg->nama_kategori ?></b>
                                            <h4 class="product-title"><a href="#" class="pr-name"><?= $brg->nama_barang ?></a></h4>
                                            <div class="price">
                                                <ins><span class="price-amount"><span class="currencySymbol">Rp.</span><?= number_format($brg->harga); ?></span></ins>
                                            </div>
                                            <div class="shipping-info">
                                                <p class="shipping-day"><?= $brg->keterangan ?></p>
                                            </div>
                                            <div class="slide-down-box">
                                                <div class="buttons">
                                                    <a href="<?= base_url('home/tambah_ke_keranjang/' . $brg->id_barang) ?>" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                                    <a href="<?= base_url('home/detail_barang/' . $brg->id_barang) ?>" class="btn compare-btn"><i class="fa fa-search" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>


                </div>

            </div>

        </div>
    </div>
</div>