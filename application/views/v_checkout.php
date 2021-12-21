 <div class="container">
     <nav class="biolife-nav">
         <ul>
             <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
             <li class="nav-item"><span class="current-page">ShoppingCart</span></li>
         </ul>
     </nav>
 </div>

 <div class="page-contain checkout">

     <!-- Main content -->
     <div id="main-content" class="main-content">
         <div class="container sm-margin-top-20px">
             <div class="row">

                 <!--Order Summary-->
                 <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 sm-padding-top-48px sm-margin-bottom-0 xs-margin-bottom-15px">
                     <div class="order-summary sm-margin-bottom-80px">
                         <div class="title-block">
                             <h3 class="title">Your Order</h3>
                             <h6>Date : <?= date('d - m - Y') ?></h6>
                         </div>
                         <div class="title-block">
                         </div>

                         <?php
                            $keranjang = $this->cart->contents();
                            $jumlah_item = 0;

                            foreach ($keranjang as $items) {
                                $jumlah_item = $jumlah_item + $items['qty'];
                            } ?>
                         <div class="cart-list-box short-type">
                             <span class="number"><?= $jumlah_item; ?>Produk</span>
                             <ul class="cart-list">
                                 <?php $i = 1; ?>
                                 <?php foreach ($this->cart->contents() as $items) : ?>
                                     <li class="cart-elem">
                                         <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
                                         <div class="cart-item">
                                             <div class="product-thumb">
                                                 <a class="prd-thumb" href="#">
                                                     <figure><img src="<?= base_url() . '/uploads/' . $items['gambar'] ?>" width="113" height="113" alt="shop-cart"></figure>
                                                 </a>
                                             </div>
                                             <div class="info">
                                                 <span class="txt-quantity"><?= $items['qty'] ?></span>
                                                 <a href="#" class="pr-name"><?= $items['name'] ?>
                                                     <?php if ($this->cart->has_options($items['rowid']) == TRUE) : ?>

                                                         <p>
                                                             <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value) : ?>

                                                                 <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                                             <?php endforeach; ?>
                                                         </p>

                                                     <?php endif; ?>
                                                 </a>
                                                 <div class="price price-contain">
                                                     <ins><span class="price-amount"><span class="currencySymbol">Rp.</span><?= $this->cart->format_number($items['price']); ?></span></ins>

                                                 </div>
                                             </div>
                                         </div>
                                     <?php endforeach; ?>
                                     </li>
                             </ul>
                             <ul class="subtotal">
                                 <li>
                                     <div class="subtotal-line">
                                         <b class="stt-name">Total</b>
                                         <span class="stt-price">Rp.<?php echo $this->cart->format_number($this->cart->total()); ?></span>
                                     </div>
                                 </li>
                                 <li>
                                     <?php $delivery = 5000 ?>
                                     <div class="subtotal-line">
                                         <b class="stt-name">Delivery</b>
                                         <span class="stt-price">Rp.<?= $delivery ?></span>
                                     </div>
                                 </li>
                                 <?php $total = $this->cart->total();  ?>
                                 <li>
                                     <?php $bayar = $total + $delivery; ?>
                                     <div class="subtotal-line">
                                         <b class="stt-name">Total Bayar</b>
                                         <span class="stt-price">Rp.<?= $bayar  ?></span>
                                     </div>
                                 </li>

                             </ul>

                         </div>
                     </div>
                 </div>

                 <!--checkout progress box-->
                 <div class="col-lg-7 col-md-7 col-sm-10 col-xs-12 sm-padding-top-48px sm-margin-bottom-0 xs-margin-bottom-15px">
                     <div class="order-summary sm-margin-bottom-80px">
                         <div class="checkout-progress-wrap">
                             <ul class="steps">
                                 <li class="step 1st">
                                     <div class="checkout-act active">
                                         <h3 class="title-box"><span class="number">1</span>Atur Alamat Pengiriman</h3>
                                         <div class="box-content">
                                             <div class="login-on-checkout">
                                                 <?= form_open('keranjang/checkout') ?>
                                                 <?php $no_order = date('Ymd') . strtoupper(random_string('alnum', 8)) ?>
                                                 <div class="row ">
                                                     <div class="form-group">
                                                         <label>Nama Penerima</label>
                                                         <input type="text" class="form-control" name="atas_nama" placeholder="Nama Penerima">
                                                         <?= form_error('atas_nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Nomor Telepon</label>
                                                         <input type="text" class="form-control" name="no_telepon" placeholder="Nomor Telepon">
                                                         <?= form_error('no_telepon', '<small class="text-danger pl-3">', '</small>'); ?>
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Alamat lengkap</label>
                                                         <textarea name="alamat" id="" cols="50" rows="5" placeholder="Nama jalan, No. rumah, Kode pos"></textarea>
                                                         <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                                     </div>
                                                     <div class="form-group col-sm-6">
                                                         <label>Nama Kota</label>
                                                         <input type="text" class="form-control" name="kota" placeholder="Jakarta Barat" readonly>
                                                     </div>

                                                     <!-- simpan transaksi -->
                                                     <div class="hidden">
                                                         <input type="text" class="form-control" name="no_order" value="<?= $no_order ?>">
                                                         <input type="text" class="form-control" name="ongkir" value="<?= $delivery ?>">
                                                         <input type="text" class="form-control" name="total" value="<?= $total ?>">
                                                         <input type="text" class="form-control" name="total_bayar" value="<?= $bayar ?>">
                                                         <?php foreach ($this->cart->contents() as $items) : ?>
                                                             <input type="text" name="qty" value="<?= $items['qty'] ?>" hidden>
                                                         <?php endforeach; ?>
                                                     </div>
                                                 </div>

                                             </div>
                                         </div>
                                     </div>
                                 </li>
                                 <div>
                                     <a href="<?= base_url('keranjang') ?>" class="btn btn-danger btn-sm" style="margin-left: 240px;">Back to Shop</a>
                                     <button type="submit" class="btn btn-primary" style="margin-left: 10px;">Payment</button>
                                 </div>

                                 <?= form_close(); ?>
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>
         </div>