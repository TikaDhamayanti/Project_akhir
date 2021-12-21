    <!-- FOOTER -->
    <footer id="footer" class="footer layout-03">
        <div class="footer-content background-footer-03">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="separator sm-margin-top-70px xs-margin-top-40px"></div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="copy-right-text">
                            <h3><a href="<?= base_url('home') ?>"><strong>Copyright &copy; 2021 Laperpool</a>.</strong></h3>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="payment-methods">
                            <ul>
                                <li><a href="#" class="payment-link"><img src="<?= base_url('assets/user/') ?>images/BCA.jpg" width="60" height="40" alt=""></a></li>
                                <li><a href="#" class="payment-link"><img src="<?= base_url('assets/user/') ?>images/BRI.jpg" width="60" height="40" alt=""></a></li>
                                <li><a href="#" class="payment-link"><img src="<?= base_url('assets/user/') ?>images/BNI.jpg" width="60" height="40" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script>
        window.setTimeout(function() {
            $('.alert').fadeTo(50, 0).slideUp(50, function() {
                $(this).remove();
            });
        }, 3000);
    </script>




    <!-- Scroll Top Button -->
    <a class="btn-scroll-top"><i class="biolife-icon icon-left-arrow"></i></a>

    <script src="<?= base_url('assets/user/') ?>js/jquery-3.4.1.min.js"></script>
    <script src="<?= base_url('assets/user/') ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/user/') ?>js/jquery.countdown.min.js"></script>
    <script src="<?= base_url('assets/user/') ?>js/jquery.nice-select.min.js"></script>
    <script src="<?= base_url('assets/user/') ?>js/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url('assets/user/') ?>js/slick.min.js"></script>
    <script src="<?= base_url('assets/user/') ?>js/biolife.framework.js"></script>
    <script src="<?= base_url('assets/user/') ?>js/functions.js"></script>



    <script src="<?= base_url('template/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('template/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url('template/') ?>plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="<?= base_url('template/') ?>plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('template/') ?>dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('template/') ?>dist/js/demo.js"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
    </body>

    </html>