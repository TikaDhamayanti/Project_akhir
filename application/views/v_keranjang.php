 <!--Navigation section-->
 <div class="container">
     <nav class="biolife-nav">
         <ul>
             <li class="nav-item"><a href="<?= base_url('home') ?>" class="permal-link">Home</a></li>
             <li class="nav-item"><span class="current-page">ShoppingCart</span></li>
         </ul>
     </nav>
 </div>

 <div class="page-contain shopping-cart">

     <!-- Main content -->
     <div id="main-content" class="main-content">
         <div class="container">

             <!--Cart Table-->
             <div class="shopping-cart-container">
                 <div class="row">
                     <div class="col-lg-9 col-md-15 col-sm-12 col-xs-12">
                         <h3 class="box-title">Your cart items</h3>
                         <?php echo form_open('keranjang/edit'); ?>

                         <table class="shop_table cart-form">
                             <tr>
                                 <th class="product-name">Product Name</th>
                                 <th class="product-price">Price</th>
                                 <th class="product-quantity">Quantity</th>
                                 <th class="product-subtotal">Total</th>
                                 <th class="product-subtotal">Action</th>

                             </tr>

                             <?php $i = 1; ?>
                             <?php foreach ($this->cart->contents() as $items) : ?>

                                 <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
                                 <tr class="cart_item">
                                     <td class="product-thumbnail" data-title="Product Name">


                                         <a class="prd-thumb" href="#">
                                             <figure><img width="113" height="113" src="<?= base_url() . '/uploads/' . $items['gambar'] ?>" alt="shipping cart"></figure>
                                         </a>
                                         <a class="prd-name" href="#"><?php echo $items['name']; ?>

                                             <?php if ($this->cart->has_options($items['rowid']) == TRUE) : ?>

                                                 <p>
                                                     <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value) : ?>

                                                         <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                                     <?php endforeach; ?>
                                                 </p>

                                             <?php endif; ?>
                                         </a>

                                     </td>
                                     <td class="product-price" data-title="Price">
                                         <div class="price price-contain">
                                             <ins><span class="price-amount"><span class="currencySymbol">Rp.</span><?php echo $this->cart->format_number($items['price']); ?></span></ins>

                                         </div>
                                     </td>
                                     <td class="product-quantity" data-title="Quantity">
                                         <?php echo form_input(array(
                                                'name' => $i . '[qty]',
                                                'value' => $items['qty'],
                                                'maxlength' => '3',
                                                'size' => '5',
                                                'type' => 'number',
                                                'min' => 1
                                            )); ?>
                                     </td>
                                     <td class="product-subtotal" data-title="Total">
                                         <div class="price price-contain">
                                             <ins><span class="price-amount"><span class="currencySymbol">Rp.</span><?php echo $this->cart->format_number($items['subtotal']); ?></span></ins>
                                         </div>
                                     </td>
                                     <td>
                                         <div class="action">
                                             <a href="<?= base_url('keranjang/hapus_keranjang/' . $items['rowid']) ?>" class="remove"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></a>
                                         </div>
                                     </td>
                                 </tr>
                                 <?php $i++; ?>
                             <?php endforeach; ?>
                             <tr class="cart_item wrap-buttons">
                                 <td class="wrap-btn-control" colspan="4">
                                     <a href="<?= base_url('home') ?>" class="btn back-to-shop">Back to Shop</a>
                                     <button class="btn btn-update" type="submit">update</button>
                                     <a href="<?= base_url('keranjang/hapus_semua_keranjang') ?>" class="btn btn-clear">clear all</a>
                                 </td>
                             </tr>

                         </table>
                         <?= form_close(); ?>
                     </div>
                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                         <div class="shpcart-subtotal-block">
                             <?php
                                $keranjang = $this->cart->contents();
                                $jumlah_item = 0;

                                foreach ($keranjang as $items) {
                                    $jumlah_item = $jumlah_item + $items['qty'];
                                } ?>
                             <div class="subtotal-line">
                                 <b class="stt-name">Total <span class="sub">(<?= $jumlah_item; ?>produk)</span></b>
                                 <span class="stt-price">Rp.<?php echo $this->cart->format_number($this->cart->total()); ?></span>
                             </div>
                             <div class="btn-checkout">
                                 <a href="<?= base_url('keranjang/checkout') ?>" class="btn checkout">Check out</a>
                             </div>
                             <div class="biolife-progress-bar">

                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>