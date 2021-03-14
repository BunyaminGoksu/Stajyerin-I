<?php require_once 'header.php'; ?>

<?php require_once 'slider.php'; ?>
<main id="main">



    <!-- ======= Services Section ======= -->
    <div id="services" class="services-area area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline services-head text-center">
                        <h2>Yapabilecekleriniz</h2>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <!-- Start Left services -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="about-move">
                        <div class="services-details">
                            <div class="single-services">
                                <a class="services-icon" href="#">
                                    <i class="fa fa-code"></i>
                                </a>
                                <h4>Expert Coder</h4>
                                <p>
                                   Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus nemo, ducimus provident perferendis a soluta facilis alias explicabo numquam, saepe quod nisi ut quasi obcaecati temporibus. Nisi voluptatibus provident eos?
                                </p>
                            </div>
                        </div>
                        <!-- end about-details -->
                    </div>
                </div>
                
                
               
                <div class="col-md-4 col-sm-4 col-xs-12">   
                    <!-- end col-md-4 -->
                    <div class=" about-move">
                        <div class="services-details">
                            <div class="single-services">
                                <a class="services-icon" href="#">
                                    <i class="fa fa-bar-chart"></i>
                                </a>
                                <h4>Yorum</h4>
                                <p>
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus reiciendis cumque, cum distinctio quas obcaecati? Autem, nihil. Tenetur vitae deleniti adipisci amet eveniet at quis! Exercitationem non reiciendis alias autem?
                                </p>
                            </div>
                        </div>
                        <!-- end about-details -->
                    </div>
                </div>
                <!-- End Left services -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <!-- end col-md-4 -->
                    <div class=" about-move">
                        <div class="services-details">
                            <div class="single-services">
                                <a class="services-icon" href="#">
                                    <i class="fa fa-ticket"></i>
                                </a>
                                <h4>24/7 Support</h4>
                                <p>
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe quis similique necessitatibus alias quisquam dolorum labore in ipsum maxime error maiores iste, sapiente placeat cupiditate unde fugiat ipsa eaque reprehenderit!
                                </p>
                            </div>
                        </div>
                        <!-- end about-details -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Services Section -->










    <!-- ======= Testimonials Section ======= -->
    <div class="testimonials-area">
        <div class="testi-inner area-padding">
            <div class="testi-overly"></div>
            <div class="container ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <!-- Start testimonials Start -->
                        <div class="testimonial-content text-center">
                            <a class="quate" href="#"><i class="fa fa-quote-right"></i></a>
                            <!-- start testimonial carousel -->
                            <div class="owl-carousel testimonial-carousel">
                                <div class="single-testi">
                                    <div class="testi-text">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar luctus est eget congue.<br>consectetur adipiscing elit. Sed pulvinar luctus est eget congue.
                                        </p>
                                        <h6>Boby</h6>
                                    </div>
                                </div>
                                <!-- End single item -->
                                <div class="single-testi">
                                    <div class="testi-text">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar luctus est eget congue.<br>consectetur adipiscing elit. Sed pulvinar luctus est eget congue.
                                        </p>
                                        <h6>Jhon</h6>
                                    </div>
                                </div>
                                <!-- End single item -->
                                <div class="single-testi">
                                    <div class="testi-text">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar luctus est eget congue.<br>consectetur adipiscing elit. Sed pulvinar luctus est eget congue.
                                        </p>
                                        <h6>Fleming</h6>
                                    </div>
                                </div>
                                <!-- End single item -->
                            </div>
                        </div>
                        <!-- End testimonials end -->
                    </div>
                    <!-- End Right Feature -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonials Section -->

    <!-- ======= Blog Section ======= -->
    <div id="blog" class="blog-area">
        <div class="blog-inner area-padding">
            <div class="blog-overly"></div>
            <div class="container ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center">
                            <h2>Son Gönderiler</h2>
                        </div>
                    </div>
                </div>
                <div class="row">

                <?php
                $sirketyorumsora=$db->prepare("SELECT * FROM sirketyorum order by sirketyorum_zaman DESC limit 3");
                $sirketyorumsora->execute(); 
                
                
                while($sirketyorumceka=$sirketyorumsora->fetch(PDO::FETCH_ASSOC)){

              
                ?>


                    <!-- Start Left Blog -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="single-blog">
                            <div class="single-blog-img">
                                <a href="blog.php">
                                  
                                </a>
                            </div>
                            <div class="blog-meta">
                               
                                <span class="date-type">
                                    <i class="fa fa-calendar"></i><?php echo $sirketyorumceka['sirketyorum_zaman'] ?>
                                </span>
                            </div>
                            <div class="blog-text">
                                <h4>
                                    <a href="blog.html"><?php echo $sirketyorumceka['sirketyorum_ad'] ?></a>
                                </h4>
                                <p>
                                   <?php echo substr($sirketyorumceka['sirketyorum_detay'],0,200) ?>
                                </p>
                            </div>
                            <span>
                                <a href="sirketyorum-detay.php?id=<?php echo $sirketyorumceka['sirketyorum_id'] ?>" class="ready-btn">Devamını Oku</a>
                            </span>
                        </div>
                        <!-- Start single blog -->
                    </div>
                    <!-- End Left Blog-->
                   <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Section -->

    <!-- ======= Suscribe Section ======= -->
    <div class="suscribe-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
                    <div class="suscribe-text text-center">
                        <h3>Stajyerine Hoş geldiniz.</h3>
                        <a class="sus-btn" href="register.php">Kayıt Ol</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Suscribe Section -->



</main>
<!-- End #main -->



<?php require_once 'footer.php';  ?>-->


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