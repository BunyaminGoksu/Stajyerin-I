<?php  require_once 'header.php' ;




$hakkimizdasor=$db->prepare("SELECT * FROM hakkimizda where hakkimizda_id=:hakkimizda_id");
$hakkimizdasor->execute(array(
    'hakkimizda_id' =>0
));

$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);


?>


  

<div id="about" style="margin-top:30px;" class="about-area area-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center">
                            <h2>Hakkımızda</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                
                    <div  class="col-md-10 col-sm-10 col-xs-12">
                        <div class="well-middle">
                            <div class="single-well">
                                <a href="#">
                                    <h4 class="sec-head"><?php echo $hakkimizdacek['hakkimizda_baslik'] ?></h4>
                                    
                                </a>
                                <p>
                               <?php echo $hakkimizdacek['hakkimizda_icerik'] ?>
                                </p>
                                <hr>

                                <h4 class="sec-head">Vizyonumuz</h4>

                                <p><?php echo $hakkimizdacek['hakkimizda_vizyon'] ?></p>
                                
                                    <hr>

                                <h4 class="sec-head">Mısyonumuz</h4>
                                <p><?php echo $hakkimizdacek['hakkimizda_misyon'] ?></p>
                               
                            </div>
                        </div>
                    </div>
                    <!-- End col-->
                </div>
            </div>
        </div>



        <?php require_once 'footer.php'; ?>