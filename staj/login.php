<?php
error_reporting(E_ALL & ~E_NOTICE);

require_once 'header.php' ?>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<br><br><br><br><br><br>
<div class="container-fluid">



    <form action="nedmin/netting/islem.php" method="POST" style="padding-left: 300px;" class="container">


<br><br><br><br><br><br>
        <div class="container-page">
            <div class="col-md-6">
                <?php

                if ($_GET['durum'] == "hatalisifre") { ?>
                    <div class="alert alert-danger">
                        <strong>Hata!</strong>Girdiğiniz Şifreler Eşleşmiyor.
                    </div>
                <?php  } elseif ($_GET['durum'] == "eksiksifre") { ?>
                    <div class="alert alert-danger">
                        <strong>Hata!</strong>Şifreniz Minimum 6 Karakter Uzunluğunda olmalıdır.
                    </div>

                <?php } elseif ($_GET['durum'] == "mukerrerkayit") { ?>
                    <div class="alert alert-danger">
                        <strong>Hata!</strong>Bu Kullanıcı Daha Önce Kaydedilmiş.
                    </div>

                <?php } elseif ($_GET['durum'] == "basarisiz") { ?>
                    <div class="alert alert-danger">
                        <strong>Hata!</strong>Kayıt Yapılamadı.Sistem Yöneticisine Başvurunuz
                    </div>

                <?php } ?> 





                <div style="border:2px dotted #7F7F7F; padding-left:15px; ">
                    <h3 class="dark-grey" style="font-size:30px;">Kullanıcı Giriş Ekranı</h3>
                    <p style="font-size: 15px;"></p>
                    <br><br>
                </div>


                <br>

               

                <div class="form-group col-lg-10">

                    <input type="email" name="kullanici_mail" required="" class="form-control" id="username" placeholder="E-mailinizi Giriniz">
                </div>


                <div class="form-group col-lg-10">

                    <input type="password" name="kullanici_password" required="" class="form-control" id="password" placeholder="Şifrenizi Giriniz...">
                </div>

               
                   <br> <br><br><br><br><br>


                    <button type="submit" name="kullanicigiris" class="btn btn-danger">Giriş Yap</button>

                </div>









            </div>





        </div>

    </form>
</div>
<?php require_once 'footer.php' ?>