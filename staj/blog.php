<?php
require_once 'header.php';


$sirketyorumsor=$db->prepare("SELECT * FROM sirketyorum");
$sirketyorumsor->execute();



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
                                    
                                </div>
                                <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                                    <h2 class="title3">Stajyerlerin Yorumlarını İnceleyin</h2>
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
                            <div class="single-blog-page">
                                <!-- search option start -->
                                <form action="#">
                                    <div class="search-option">
                                        <input type="text" placeholder="Search...">
                                        <button class="button" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                                <!-- search option end -->
                            </div>
                            <?php require_once 'sidebar.php' ?>
                         

                         
                        </div>
                    </div>
                    <!-- End left sidebar -->
                 
                 
                
                    <!-- Start single blog -->
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <div class="row">
                        <?php
                 
                 while($sirketyorumcek=$sirketyorumsor->fetch(PDO::FETCH_ASSOC)){?>
                            <div class="col-md-10 col-sm-12 col-xs-12">
                           
                                
                                <div class="single-blog">
                                    <div class="single-blog-img">
                                     
                                    </div>
                                   
                                   
                                    <div class="blog-meta">
                                        
                                        <span class="date-type">
                                            <i class="fa fa-calendar"></i><?php echo $sirketyorumcek['sirketyorum_zaman'] ?>
                                        </span>
                                    </div>
                                    <div class="blog-text">
                                        <h4>
                                            <a href="#"><?php echo $sirketyorumcek['sirketyorum_ad'] ?></a>
                                        </h4>
                                        <p>
                                            <?php echo $sirketyorumcek['sirketyorum_detay'] ?>
                                        </p>
                                    </div>
                                    <span>
                                        <a href="sirketyorum-detay.php?id=<?php echo $sirketyorumcek['sirketyorum_id']?>" class="ready-btn">Devamını Oku</a>
                                    </span>
                                </div>
                            </div>
                           <?php } ?>
                            
                            <!-- End single blog -->
                            <div class="blog-pagination">
                                <ul class="pagination">
                                    <li><a href="#">&lt;</a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">&gt;</a></li>
                                </ul>
                            </div>
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