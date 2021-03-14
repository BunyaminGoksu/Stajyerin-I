<?php
require_once 'header.php';


?>

<body data-spy="scroll" data-target="#navbar-example">



    <main id="main">

        <!-- ======= Blog Header ======= -->
        <div class="header-bg page-area">
            <div class="home-overly"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="slider-content text-center">
                            <div class="header-bottom">
                                <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
                                    <h1 class="title2">Yorumların</h1>
                                </div>
                                <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                                    <h2 class="title3">Staj Yaptığın Şirket Hakında ki Yorumların</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Blog Header -->

        <!-- ======= Blog Page ======= -->
        <div class="blog-page area-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="page-head-blog">
                            
                           
                           
                           
                           
                        </div>
                    </div>
                    <!-- End left sidebar -->
                    <!-- Start single blog -->

                    <form action="nedmin/netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">


                        <h2 text-align="center">Staj Hakkında Bilgiler</h2>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Şirket Adı<span class="required">*</span>
                            </label>
                            <div class="col-md-15 col-sm-15 col-xs-12">
                                <input type="text" id="first-name" required="required" name="sirketyorum_ad" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-10 col-sm-10 col-xs-12" for="first-name">Şirketin Bulunduğu İl<span class="required">*</span>
                            </label>
                            <div class="col-md-15 col-sm-15 col-xs-12">
                                <input type="text" id="first-name" required="required" name="sirketyorum_il" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-10 col-sm-10 col-xs-12" for="first-name">Şirketin Bulunduğu İlçe<span class="required">*</span>
                            </label>
                            <div class="col-md-15 col-sm-15 col-xs-12">
                                <input type="text" id="first-name" required="required" name="sirketyorum_ilce" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>



                        <!-- Ck Editör Başlangıç -->

                        <div class="form-group">
                            <label class="control-label col-md-10 col-sm-10 col-xs-12" for="first-name">Şirket Hakkında ki Düşüncelerin <span class="required">*</span>
                            </label>
                            <div class="col-md-15 col-sm-15 col-xs-12">

                                <textarea class="ckeditor" id="editor1" name="sirketyorum_detay"></textarea>
                            </div>
                        </div>

                        <script type="text/javascript">
                            CKEDITOR.replace('editor1',

                                {

                                    filebrowserBrowseUrl: 'ckfinder/ckfinder.html',

                                    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?type=Images',

                                    filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?type=Flash',

                                    filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

                                    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

                                    filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

                                    forcePasteAsPlainText: true

                                }

                            );
                        </script>

                        <!-- Ck Editör Bitiş -->
                        <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">
                        <input type="hidden" name="kullanici_mail" value="<?php echo $kullanicicek['kullanici_mail'] ?>">

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" name="stajyorumyap" class="btn btn-success">Yorum Yap</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        </div>
        </div><!-- End Blog Page -->

    </main><!-- End #main -->
    <?php

    require_once 'footer.php';

    ?>

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/appear/jquery.appear.js"></script>
    <script src="assets/vendor/knob/jquery.knob.js"></script>
    <script src="assets/vendor/parallax/parallax.js"></script>
    <script src="assets/vendor/wow/wow.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/nivo-slider/js/jquery.nivo.slider.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>