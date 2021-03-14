<?php  require_once 'header.php' ;






$menusor=$db->prepare("SELECT * FROM menu where menu_seourl=:sef");
$menusor->execute(array(
    'sef' => $_GET['sef']
));

$menucek=$menusor->fetch(PDO::FETCH_ASSOC);


?>


  

<div id="about" style="margin-top:30px;" class="about-area area-padding">
            <div class="container">
                
                <div class="row">
                
                    <div  class="col-md-10 col-sm-10 col-xs-12">
                        <div class="well-middle">
                            <div class="single-well">
                                <a href="#">
                                    <h4 class="sec-head"><?php echo $menucek['menu_ad'] ?></h4>
                                    
                                </a>
                               <div class="page-content">

                               <p>
                                   <?php echo $menucek['menu_detay'] ?>
                               </p>


                               </div>
                            
                               
                               
                            </div>
                        </div>
                    </div>
                    <!-- End col-->
                </div>
            </div>
        </div>



        <?php require_once 'footer.php'; ?>