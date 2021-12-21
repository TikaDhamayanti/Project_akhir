  <!-- Page Contain -->
  <div class="page-contain">

      <!-- Main content -->
      <div id="main-content" class="main-content">

          <!--Block 01: Main slide-->
          <div class="main-slide block-slider">
              <ul class="biolife-carousel nav-none-on-mobile" data-slick='{"arrows": true, "dots": false, "slidesMargin": 0, "slidesToShow": 1, "infinite": true, "speed": 800}'>
                  <li>
                      <div class="container-fluid">
                          <div class="text-content">
                              <img src="<?= base_url('assets/user/') ?>images/home-03/bnr.png">

                          </div>
                      </div>
                  </li>
                  <li>
                      <div class="container-fluid">
                          <div class="text-content">
                              <img src="<?= base_url('assets/user/') ?>images/home-03/banner1.jpg" height="200">

                          </div>
                      </div>
                  </li>

              </ul>
          </div>

          <!--Block 03: Product Tab-->
          <div class="product-tab z-index-20 sm-margin-top-193px xs-margin-top-30px">
              <div class="container">
                  <div class="biolife-title-box">
                      <span class="subtitle">All the best item for You</span>
                      <h3 class="main-title">Our Products</h3>
                  </div>
                  <div class="biolife-tab biolife-tab-contain sm-margin-top-34px">

                      <div class="tab-content">
                          <div id="tab01_1st" class="tab-contain active">
                              <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile eq-height-contain" data-slick='{"rows":2 ,"arrows":true,"dots":false,"infinite":true,"speed":400,"slidesMargin":10,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":25 }},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":15}}]}'>
                                  <?php foreach ($barang as $brg) : ?>
                                      <li class="product-item">
                                          <div class="contain-product layout-default">
                                              <div class="product-thumb">
                                                  <div class="link-to-product">
                                                      <img src="<?= base_url() . '/uploads/' . $brg->gambar; ?>" width="270" height="270" class="product-thumnail">
                                                  </div>
                                              </div>
                                              <div class="info">
                                                  <b class="categories"><?= $brg->nama_kategori ?></b>
                                                  <h4 class="product-title">
                                                      <div class="pr-name"><?= $brg->nama_barang ?></div>
                                                  </h4>
                                                  <div class="price ">
                                                      <ins><span class="price-amount"><span class="currencySymbol">Rp.</span><?= number_format($brg->harga); ?></span></ins>
                                                  </div>
                                                  <div class="slide-down-box">
                                                      <p class="message"><?= $brg->keterangan ?></p>
                                                      <div class="buttons">
                                                          <a href="<?= base_url('home/tambah_ke_keranjang/' . $brg->id_barang) ?>" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                                          <a class="btn compare-btn" href="<?= base_url('home/detail_barang/' . $brg->id_barang) ?>"><i class="biolife-icon icon-search"></i></a>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </li>
                                  <?php endforeach; ?>
                              </ul>
                          </div>

                          </li>
                          </ul>
                      </div>


                  </div>
              </div>
          </div>
      </div>
  </div>