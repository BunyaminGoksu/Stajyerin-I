<?php
error_reporting(E_ALL & ~E_NOTICE);

require_once 'nedmin/netting/baglan.php ';
require_once 'nedmin/production/fonksiyon.php';


$ayarsor = $db->prepare("SELECT * FROM ayar where ayar_id=:ayar_id");
$ayarsor->execute(array(
    'ayar_id' => 0
));

$ayarcek = $ayarsor->fetch(PDO::FETCH_ASSOC);



$menusor = $db->prepare("SELECT * FROM menu where menu_durum=:durum order by menu_sira ASC limit 5");
$menusor->execute(array(
    'durum' => 1
));


$kullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_mail=:kullanici_mail");
$kullanicisor->execute(array(
    'kullanici_mail' => $_SESSION['userkullanici_mail']
));
$say = $kullanicisor->rowCount();
$kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);





?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo $ayarcek['ayar_title']; ?></title>
    <meta content="<?php echo $ayarcek['ayar_description']; ?>" name="description">
    <meta content="<?php echo $ayarcek['ayar_keywords']; ?>" name="keywords">
    <meta content="<?php echo $ayarcek['ayar_author']; ?>" name="author">


    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/vendor/nivo-slider/css/nivo-slider.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
 <!-- CK Editör -->
 <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
 <script src="nedmin/production/ckeditor/ckeditor.js"></script>
    <!-- =======================================================
  * Template Name: eBusiness - v2.2.1
  * Template URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body data-spy="scroll" data-target="#navbar-example">

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex">

            <div class="logo mr-auto">
                <h1 class="text-light"><a href="index.php"><span>S</span>tajyerin</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!--  <a href="index.php"><img src="img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="index.php">Anasayfa</a></li>
                    <li><a href="hakkimizda.php">Hakkımızda</a></li>


                    <?php while ($menucek = $menusor->fetch(PDO::FETCH_ASSOC)) { ?>
                        <li><a href="
                    
                    <?php
                        if (!empty($menucek['menu_url'])) {

                            echo $menucek['menu_url'];
                        } else {

                            echo 'sayfa-' . seo($menucek['menu_ad']);
                        }
                    ?>
                    
                    
                    "><?php echo $menucek['menu_ad'] ?></a></li>




                    <?php } ?>

                    <?php

                    if (!isset($_SESSION['userkullanici_mail'])) { ?>

                        <li><a href="login.php"><button style="font-size:15px; font-weight: 700; padding: 7px;  text-align: center;  margin-top:-5px; margin-left:40px; " type="button" class="btn btn-outline-success btn-lg">Giriş Yap</button></a></li>


                        <li><a href="register.php"><button style="font-size:15px; font-weight: 700; padding: 7px;  text-align: center;  margin-top:-5px; " type="button" class="btn btn-outline-danger btn-lg">Kayıt Ol</button></a></li>



                    <?php  } else { ?>
                        <li><a href="sirketyorumekle.php">Yorum Yap</a></li>

                        <li><a href="hesabim.php"><button style="font-size:13px; font-weight: 700; padding: 7px;  text-align: center;  margin-top:-5px; " type="button" class="btn btn-outline-success "><i class="fa fa-address-book"> </i> Hesap Bilgilerim</button></a></li>

                        <li><a href="logout.php"><button style="font-size:13px; font-weight: 700; padding: 7px;  text-align: right;  margin-top:-5px; " type="button" class="btn btn-outline-danger"><i class="fa fa-sign-out"></i>Güvenli Çıkış</button></a></li>


                    <?php   }   ?>





                </ul>

            </nav>
            <!-- .nav-menu -->

        </div>
    </header>
    <!-- End Header -->