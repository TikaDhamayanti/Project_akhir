   <!-- HEADER -->
   <header id="header" class="header-area style-01 layout-03">
       <div class="header-top bg-main hidden-xs">
           <div class="container">
               <div class="top-bar left">
                   <ul class="horizontal-menu">
                       <li><a href="#" class="login-link"><i class="biolife-icon icon-login"></i><?= $this->session->userdata('nama'); ?></a></li>
                   </ul>
               </div>
               <div class="top-bar right">
                   <ul class="horizontal-menu">
                       <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>laperpool@gmail.com</a></li>
                       <li><a href="#">Delivery around city West Jakarta Only Rp.5000</a></li>
                   </ul>
               </div>
           </div>
       </div>
       <div class="header-middle biolife-sticky-object ">
           <div class="container">
               <div class="row">
                   <div class="col-lg-3 col-md-2 col-md-6 col-xs-6">
                       <a href="<?= base_url('home') ?>" class="biolife-logo"><img src="<?= base_url('assets/') ?>logo.png" width="150" style="margin-left: 50px"></a>
                   </div>
                   <div class="col-lg-5 col-md-5 hidden-sm hidden-xs">
                       <div class="primary-menu">
                           <ul class="menu biolife-menu clone-main-menu clone-primary-menu text-center " id="primary-menu" data-menuname="main menu">
                               <li class="menu-item"><a href="<?= base_url('home') ?>">Home</a></li>
                               <li class="menu-item"><a href="<?= base_url('home/shop') ?>">Shop</a></li>
                               <?php $kategori = $this->M_home->get_all_data_kategori() ?>
                               <li class="menu-item menu-item-has-children has-child">
                                   <a href="#" class="menu-name" data-title="Products">Products</a>
                                   <ul class="sub-menu">
                                       <?php foreach ($kategori as $ktg) : ?>
                                           <li class="menu-item"><a href="<?= base_url('home/kategori/' . $ktg->id_kategori) ?>"><?= $ktg->nama_kategori ?></a></li>
                                       <?php endforeach ?>
                                   </ul>
                               </li>
                               <li class="menu-item"><a href="<?= base_url('pesanan/') ?>">My Order</a></li>
                               <li class="menu-item menu-item-has-children has-child">
                                   <a href="#" class="menu-name" data-title="Products">Profile</a>
                                   <ul class="sub-menu">
                                       <li class="menu-item"><a href="<?= base_url('member/logout') ?>">Log out</a></li>
                                   </ul>
                               </li>

                           </ul>
                       </div>
                   </div>
                   <div class="col-lg-4 col-md-4 col-md-5 col-xs-5">
                       <div class="biolife-cart-info">
                           <div class="mobile-search">
                               <a href="javascript:void(0)" class="open-searchbox"><i class="biolife-icon icon-search"></i></a>
                               <div class="mobile-search-content">
                                   <?= form_open('home/cari/') ?>
                                   <a href="#" class="btn-close"><span class="biolife-icon icon-close-menu"></span></a>
                                   <input type="text" name="nama_barang" class="input-text" value="" placeholder="Search here...">
                                   <button type="submit" class="btn-submit">go</button>
                                   <?php form_close() ?>
                               </div>
                           </div>

                           <div class="minicart-block">
                               <?php
                                $keranjang = $this->cart->contents();
                                $jumlah_item = 0;

                                foreach ($keranjang as $items) {
                                    $jumlah_item = $jumlah_item + $items['qty'];
                                } ?>
                               <div class="minicart-contain">
                                   <a href="javascript:void(0)" class="link-to">
                                       <span class="icon-qty-combine">
                                           <i class="icon-cart-mini biolife-icon"></i>
                                           <span class="qty"><?= $jumlah_item; ?></span>
                                       </span>
                                       <span class="title">My Cart -</span>
                                       <span class="sub-total">Rp.<?= number_format($this->cart->total()); ?></span>
                                   </a>
                                   <div class="cart-content">
                                       <div class="cart-inner">
                                           <ul class="products">
                                               <?php foreach ($keranjang as $items) : ?>
                                                   <li>
                                                       <div class="minicart-item">
                                                           <div class="thumb">
                                                               ><img src="<?= base_url('uploads/' . $items['gambar']) ?>" width="90" height="90">
                                                           </div>
                                                           <div class="left-info">
                                                               <div class="product-title">
                                                                   <div class="product-name"><?= $items['name'] ?></div>
                                                               </div>
                                                               <div class="price">
                                                                   <ins><span class="price-amount"><span class="currencySymbol">Rp.</span><?= number_format($items['subtotal']) ?></span></ins>
                                                               </div>
                                                               <div class="qty">
                                                                   <label for="cart[id127][qty]">Qty:</label>
                                                                   <input type="number" class="input-qty" value="<?= $items['qty'] ?>" disabled>
                                                               </div>
                                                           </div>
                                                           <div class="action">
                                                               <!-- <a href="<?= base_url('keranjang/edit/') ?>" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> -->
                                                               <a href="<?= base_url('keranjang/hapus_keranjang/' . $items['rowid']) ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                           </div>
                                                       </div>
                                                   </li>
                                               <?php endforeach; ?>
                                           </ul>
                                           <p class="btn-control">
                                               <a href="<?= base_url('keranjang') ?>" class="btn view-cart">view cart</a>
                                               <a href="<?= base_url('keranjang/checkout') ?>" class="btn">checkout</a>
                                           </p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="mobile-menu-toggle">
                               <a class="btn-toggle" data-object="open-mobile-menu" href="javascript:void(0)">
                                   <span></span>
                                   <span></span>
                                   <span></span>
                               </a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <div class="header-bottom hidden-sm hidden-xs">
           <div class="container">
               <div class="row">
                   <div class="col-lg-3 col-md-4">
                       <div class="vertical-menu vertical-category-block">
                           <div class="block-title">
                               <span class="menu-icon">
                                   <span class="line-1"></span>
                                   <span class="line-2"></span>
                                   <span class="line-3"></span>
                               </span>
                               <span class="menu-title">All departments</span>
                               <span class="angle" data-tgleclass="fa fa-caret-down"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                           </div>
                           <div class="wrap-menu">
                               <ul class="menu clone-main-menu">
                                   <?php foreach ($kategori as $ktg) : ?>
                                       <li class="menu-item"><a href="<?= base_url('home/kategori/' . $ktg->id_kategori) ?>" class="menu-title"><?= $ktg->nama_kategori ?></a></li>
                                   <?php endforeach ?>
                               </ul>
                           </div>
                       </div>
                   </div>
                   <div class="col-lg-9 col-md-8 padding-top-2px">
                       <div class="header-search-bar layout-01">
                           <form action="#" class="form-search" name="desktop-seacrh" method="get">
                               <input type="text" name="s" class="input-text" value="" placeholder="Search here...">
                               <button type="submit" class="btn-submit"><i class="biolife-icon icon-search"></i></button>
                           </form>
                       </div>
                       <div class="live-info">
                           <p class="telephone"><i class="fa fa-phone" aria-hidden="true"></i><b class="phone-number">(+900) 123 456 7891</b></p>
                           <p class="working-time">Mon-Fri: 8:30am-8:30pm; Sat-Sun: 9:30am-10:30pm</p>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </header>