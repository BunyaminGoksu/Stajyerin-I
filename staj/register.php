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





                <div style="border:2px dotted #7F7F7F; padding:15px; ">
                    <h3 class="dark-grey" style="font-size:30px;">Kullanıcı Kaydı</h3>
                    <p style="font-size: 15px;">Kullanıcı kayıt işlemlerini aşağıda ki form aracılığı ile gerçekleştirebilirsiniz.</p>
                    <br><br>
                </div>


                <br>

                <div class="form-group col-lg-12">

                    <input type="text" name="kullanici_adsoyad" required="" class="form-control" id="" placeholder="Adınızı Soyadınızı Giriniz...">
                </div>


                <div class="form-group col-lg-12">

                    <input type="email" name="kullanici_mail" required="" class="form-control" id="" placeholder="E-mailinizi Giriniz(Kullanıcı Adınız Olacaktır)">
                </div>


                <div class="form-group col-lg-12">

                    <input type="tel" name="kullanici_gsm" required="" class="form-control" id="" placeholder="Telefon Numaranızı Giriniz">
                </div>


                <div class="form-group col-lg-6">

                    <input type="password" name="kullanici_password" required="" class="form-control" id="" placeholder="Şifrenizi Giriniz...">
                </div>

                <div class="form-group col-lg-6">

                    <input type="password" name="kullanici_passwordtwo" required="" class="form-control" id="" placeholder="Şifrenizi Tekrar Giriniz...">
                    <br><br>


                    <button type="submit" name="kullanicikaydet" class="btn btn-danger">Kayıt İşlemini Yap</button>

                </div>









            </div>





        </div>

    </form>
</div>
<?php require_once 'footer.php' ?>