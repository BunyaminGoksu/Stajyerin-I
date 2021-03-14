 
 
 <!-- ======= Slider Section ======= -->
 
 <?php
 
 $slidersor=$db->prepare("SELECT * FROM slider");
 $slidersor->execute();
 
 ?>
 
 <div id="home" class="slider-area">
        <div class="bend niceties preview-2">
            <div id="ensign-nivoslider" class="slides">

            <?php while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)){    ?>
             
                <img src="<?php echo $slidercek['slider_resimyol'] ?>" alt="" title="#slider-direction-1" />
               <?php } ?>
            </div>

            <!-- direction 1 -->
            <div id="slider-direction-1" class="slider-direction slider-one">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="slider-content">
                                <!-- layer 1 -->
                                <div class="layer-1-1 hidden-xs wow animate__slideInDown animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
                                    <h2 class="title1">Staj Yerleri Hakkında Bilgi</h2>
                                </div>
                                <!-- layer 2 -->
                                <div class="layer-1-2 wow animate__fadeIn animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
                                    <h1 class="title2">Kariyer basamaklarını emin adımlarla AT!</h1>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           

            <!-- direction 3 -->
           
        </div>
    </div>
    <!-- End Slider -->