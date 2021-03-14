<?php
ob_start();
session_start();

require_once '../production/fonksiyon.php';

require_once 'baglan.php';


if (isset($_POST['kullanicikaydet'])) {


    $kullanici_adsoyad = htmlspecialchars($_POST['kullanici_adsoyad']);
    $kullanici_mail = htmlspecialchars($_POST['kullanici_mail']);
    $kullanici_gsm = htmlspecialchars($_POST['kullanici_gsm']);
    $kullanici_password = $_POST['kullanici_password'];
    $kullanici_passwordtwo = $_POST['kullanici_passwordtwo'];


    if ($kullanici_password == $kullanici_passwordtwo) {


        if ($kullanici_password >= 6) {

            $kullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_mail=:kullanici_mail");
            $kullanicisor->execute(array(
                'kullanici_mail' => $kullanici_mail
            ));


            $say = $kullanicisor->rowCount();


            if ($say == 0) {


                $password = md5($kullanici_password);

                $kullanici_yetki = 1;


                $kullanicikaydet = $db->prepare("INSERT INTO kullanici SET 
                
                kullanici_adsoyad=:kullanici_adsoyad,
                kullanici_mail=:kullanici_mail,
                kullanici_gsm=:kullanici_gsm,
                kullanici_password=:kullanici_password,
                kullanici_yetki=:kullanici_yetki        
                ");


                $insert = $kullanicikaydet->execute(array(

                    'kullanici_adsoyad' => $kullanici_adsoyad,
                    'kullanici_mail' => $kullanici_mail,
                    'kullanici_gsm' => $kullanici_gsm,
                    'kullanici_password' => $password,
                    'kullanici_yetki' => $kullanici_yetki

                ));

                if ($insert) {

                    header("Location:../../login.php?durum=ok");
                } else {

                    header("Location:../../register.php?durum=basarisiz");
                }
            } else {


                header("Location:../../register.php?durum=mukerrerkayit");
            }
        } else {

            header("Location:../../register.php?durum=eksiksifre");
        }
    } else {


        header("Location:../../register.php?durum=hatalisifre");
    }
}

if (isset($_POST['kullanicigiris'])) {

    $kullanici_mail = htmlspecialchars($_POST['kullanici_mail']);

    $kullanici_password = md5($_POST['kullanici_password']);


    $kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_mail=:kullanici_mail and kullanici_password=:kullanici_password and kullanici_yetki=:kullanici_yetki and kullanici_durum=:kullanici_durum");

    $kullanicisor->execute(array(

        'kullanici_mail' => $kullanici_mail,
        'kullanici_password' => $kullanici_password,
        'kullanici_yetki' => 1,
        'kullanici_durum' => 1
    ));


    $say = $kullanicisor->rowCount();

    if ($say == 1) {


        echo $_SESSION['userkullanici_mail'] = $kullanici_mail;
        header("Location:../../");
        exit;
    } else {

        header("Location:../../?durum=basarisizgiris");
    }
}






if (isset($_POST['hesabimduzenle'])) {

    $kullanici_id = $_POST['kullanici_id'];
    $kullanici_gsm =htmlspecialchars($_POST['kullanici_gsm']);

   
    $kullanicikaydet = $db->prepare("UPDATE kullanici SET

       kullanici_adsoyad=:kullanici_adsoyad,
       kullanici_gsm=:kullanici_gsm

       WHERE kullanici_id={$_POST['kullanici_id']}");

    $update = $kullanicikaydet->execute(array(

        'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
        'kullanici_gsm' => $kullanici_gsm
    ));


    if ($update) {
       header("Location:../../hesabim.php?durum=ok");
    } else {
        header("Location:../../hesabim.php?durum=no");
    }
}





if (isset($_POST['sliderkaydet'])) {
    $uploads_dir = '../../assets/img/slider';
    @$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
    @$name = $_FILES['slider_resimyol']["name"];

    //resmin isminin benzersiz olması için
    $benzersizsayi1 = rand(20000, 32000);
    $benzersizsayi2 = rand(20000, 32000);
    $benzersizsayi3 = rand(20000, 32000);
    $benzersizsayi4 = rand(20000, 32000);
    $benzersizad = $benzersizsayi1 . $benzersizsayi2 . $benzersizsayi3 . $benzersizsayi4;
    $refimgyol = substr($uploads_dir, 6) . "/" . $benzersizad . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

    $kaydet = $db->prepare("INSERT INTO slider SET
    slider_ad=:slider_ad,
    slider_sozone=:slider_sozone,
    slider_sira=:slider_sira,
    slider_link=:slider_link,
    slider_resimyol=:slider_resimyol
    ");
    $insert = $kaydet->execute(array(
        'slider_ad' => $_POST['slider_ad'],
        'slider_sozone' => $_POST['slider_sozone'],
        'slider_sira' => $_POST['slider_sira'],
        'slider_link' => $_POST['slider_link'],
        'slider_resimyol' => $refimgyol

    ));
    if ($insert) {
        Header("Location:../production/slider.php?durum=ok");
    } else {
        Header("Location:../production/slider.php?durum=no");
    }
}


// Slider Düzenleme Başla


if (isset($_POST['sliderduzenle'])) {


    if ($_FILES['slider_resimyol']["size"] > 0) {


        $uploads_dir = '../../assets/img/slider';
        @$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
        @$name = $_FILES['slider_resimyol']["name"];
        $benzersizsayi1 = rand(20000, 32000);
        $benzersizsayi2 = rand(20000, 32000);
        $benzersizsayi3 = rand(20000, 32000);
        $benzersizsayi4 = rand(20000, 32000);
        $benzersizad = $benzersizsayi1 . $benzersizsayi2 . $benzersizsayi3 . $benzersizsayi4;
        $refimgyol = substr($uploads_dir, 6) . "/" . $benzersizad . $name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

        $duzenle = $db->prepare("UPDATE slider SET
			slider_ad=:ad,
            slider_sozone=:slider_sozone,
			slider_link=:link,
			slider_sira=:sira,
			slider_durum=:durum,
			slider_resimyol=:resimyol	
			WHERE slider_id={$_POST['slider_id']}");
        $update = $duzenle->execute(array(
            'ad' => $_POST['slider_ad'],
            'slider_sozone' => $_POST['slider_sozone'],
            'link' => $_POST['slider_link'],
            'sira' => $_POST['slider_sira'],
            'durum' => $_POST['slider_durum'],
            'resimyol' => $refimgyol,
        ));


        $slider_id = $_POST['slider_id'];

        if ($update) {

            $resimsilunlink = $_POST['slider_resimyol'];
            unlink("../../$resimsilunlink");

            Header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");
        } else {

            Header("Location:../production/slider-duzenle.php?durum=no");
        }
    } else {

        $duzenle = $db->prepare("UPDATE slider SET
			slider_ad=:ad,
            slider_sozone=:slider_sozone,
			slider_link=:link,
			slider_sira=:sira,
			slider_durum=:durum		
			WHERE slider_id={$_POST['slider_id']}");
        $update = $duzenle->execute(array(
            'ad' => $_POST['slider_ad'],
            'slider_sozone' => $_POST['slider_sozone'],
            'link' => $_POST['slider_link'],
            'sira' => $_POST['slider_sira'],
            'durum' => $_POST['slider_durum']
        ));

        $slider_id = $_POST['slider_id'];

        if ($update) {

            Header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");
        } else {

            Header("Location:../production/slider-duzenle.php?durum=no");
        }
    }
}


// Slider Düzenleme Bitiş



if ($_GET['slidersil'] == "ok") {

    $sil = $db->prepare("DELETE from slider where slider_id=:slider_id");
    $kontrol = $sil->execute(array(
        'slider_id' => $_GET['slider_id']
    ));

    if ($kontrol) {

        $resimsilunlink = $_GET['slider_resimyol'];
        unlink("../../$resimsilunlink");

        Header("Location:../production/slider.php?durum=ok");
    } else {

        Header("Location:../production/slider.php?durum=no");
    }
}

if (isset($_POST['admingiris'])) {


    $kullanici_mail = $_POST['kullanici_mail'];
    $kullanici_password = $_POST['kullanici_password'];


    $kullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_mail=:kullanici_mail and kullanici_password=:kullanici_password and kullanici_yetki=:kullanici_yetki");
    $kullanicisor->execute(array(
        'kullanici_mail' => $kullanici_mail,
        'kullanici_password' => $kullanici_password,
        'kullanici_yetki' => 5
    ));

    $say = $kullanicisor->rowCount();

    if ($say == 1) {

        $_SESSION['kullanici_mail'] = $kullanici_mail;
        header("Location:../production/index.php");
        exit;
    } else {

        header("Location:../production/login.php?durum=no");
        exit;
    }
}





if (isset($_POST['genelayarkaydet'])) {


    $ayarkaydet = $db->prepare("UPDATE ayar SET 
    

    /*Tablo güncelleme işlemi kodları */
    
    ayar_title=:ayar_title,
    ayar_description=:ayar_description,
    ayar_keywords=:ayar_keywords,
    ayar_author=:ayar_author
    WHERE ayar_id=0
    ");


    $update = $ayarkaydet->execute(array(
        'ayar_title' => $_POST['ayar_title'],
        'ayar_description' => $_POST['ayar_description'],
        'ayar_keywords' => $_POST['ayar_keywords'],
        'ayar_author' => $_POST['ayar_author']
    ));

    if ($update) {
        header("Location:../production/genel-ayar.php?durum=ok");
    } else {
        header("Location:../production/genel-ayar.php?durum=no");
    }
}




if (isset($_POST['iletisimayarkaydet'])) {


    $ayarkaydet = $db->prepare("UPDATE ayar SET 
    

    /*Tablo güncelleme işlemi kodları */
    
    ayar_tel=:ayar_tel,
    ayar_gsm=:ayar_gsm,
    ayar_faks=:ayar_faks,
    ayar_mail=:ayar_mail,
    ayar_ilce=:ayar_ilce,
    ayar_il=:ayar_il,
    ayar_adres=:ayar_adres,
    ayar_mesai=:ayar_mesai

    WHERE ayar_id=0
    ");


    $update = $ayarkaydet->execute(array(
        'ayar_tel' => $_POST['ayar_tel'],
        'ayar_gsm' => $_POST['ayar_gsm'],
        'ayar_faks' => $_POST['ayar_faks'],
        'ayar_mail' => $_POST['ayar_mail'],
        'ayar_ilce' => $_POST['ayar_ilce'],
        'ayar_il' => $_POST['ayar_il'],
        'ayar_adres' => $_POST['ayar_adres'],
        'ayar_mesai' => $_POST['ayar_mesai']
    ));

    if ($update) {
        header("Location:../production/iletisim-ayarlar.php?durum=ok");
    } else {
        header("Location:../production/iletisim-ayarlar.php?durum=no");
    }
}


if (isset($_POST['apiayarkaydet'])) {


    $ayarkaydet = $db->prepare("UPDATE ayar SET


            ayar_analystic=:ayar_analystic,
            ayar_maps=:ayar_maps,
            ayar_zopim=:ayar_zopim

WHERE ayar_id=0

");

    $update = $ayarkaydet->execute(array(
        'ayar_analystic' => $_POST['ayar_analystic'],
        'ayar_maps' => $_POST['ayar_maps'],
        'ayar_zopim' => $_POST['ayar_zopim']
    ));

    if ($update) {
        header("Location:../production/api-ayarlar.php?durum=ok");
    } else {
        header("Location:../production/api-ayarlar.php?durum=no");
    }
}









if (isset($_POST['sosyalayarkaydet'])) {


    $ayarkaydet = $db->prepare("UPDATE ayar SET 
    

    /*Tablo güncelleme işlemi kodları */
    
    ayar_facebook=:ayar_facebook,
    ayar_twitter=:ayar_twitter,
    ayar_google=:ayar_google,
    ayar_youtube=:ayar_youtube
    WHERE ayar_id=0
    ");


    $update = $ayarkaydet->execute(array(
        'ayar_facebook' => $_POST['ayar_facebook'],
        'ayar_twitter' => $_POST['ayar_twitter'],
        'ayar_google' => $_POST['ayar_google'],
        'ayar_youtube' => $_POST['ayar_youtube']
    ));

    if ($update) {
        header("Location:../production/sosyal-ayarlar.php?durum=ok");
    } else {
        header("Location:../production/sosyal-ayarlar.php?durum=no");
    }
}


if (isset($_POST['smptpayarkaydet'])) {


    $ayarkaydet = $db->prepare("UPDATE ayar SET 
    

    /*Tablo güncelleme işlemi kodları */
    
    ayar_smtphost=:ayar_smtphost,
    ayar_smtpuser=:ayar_smtpuser,
    ayar_smtppassword=:ayar_smtppassword,
    ayar_smptport=:ayar_smptport
    WHERE ayar_id=0
    ");


    $update = $ayarkaydet->execute(array(
        'ayar_smtphost' => $_POST['ayar_smtphost'],
        'ayar_smtpuser' => $_POST['ayar_smtpuser'],
        'ayar_smtppassword' => $_POST['ayar_smtppassword'],
        'ayar_smptport' => $_POST['ayar_smptport']
    ));

    if ($update) {
        header("Location:../production/smtp-ayarlar.php?durum=ok");
    } else {
        header("Location:../production/smtp-ayarlar.php?durum=no");
    }
}




if (isset($_POST['hakkimizdakaydet'])) {

    $hakkimizdakaydet = $db->prepare("UPDATE hakkimizda SET
    hakkimizda_baslik=:hakkimizda_baslik,
    hakkimizda_icerik=:hakkimizda_icerik,
    hakkimizda_vizyon=:hakkimizda_vizyon,
    hakkimizda_misyon=:hakkimizda_misyon
    WHERE hakkimizda_id=0");


    $update = $hakkimizdakaydet->execute(array(
        'hakkimizda_baslik' =>  $_POST['hakkimizda_baslik'],
        'hakkimizda_icerik' =>  $_POST['hakkimizda_icerik'],
        'hakkimizda_vizyon' =>  $_POST['hakkimizda_vizyon'],
        'hakkimizda_misyon' =>  $_POST['hakkimizda_misyon']

    ));

    if ($update) {

        header("Location:../production/hakkimizda.php?durum=ok");
    } else {
        header("Location:../production/hakkimizda.php?durum=NO");
    }
}





if (isset($_POST['kullaniciduzenle'])) {


    $kullanici_id = $_POST['kullanici_id'];

    $kullanicikaydet = $db->prepare("UPDATE kullanici SET

kullanici_tc=:kullanici_tc,
kullanici_adsoyad=:kullanici_adsoyad,
kullanici_durum=:kullanici_durum
WHERE kullanici_id={$_POST['kullanici_id']}");



    $update = $kullanicikaydet->execute(array(

        'kullanici_tc' => $_POST['kullanici_tc'],
        'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
        'kullanici_durum' => $_POST['kullanici_durum']
    ));


    if ($update) {
        Header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=ok");
    } else {
        Header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=no");
    }
}



if ($_GET['kullanicisil'] == "ok") {

    $sil = $db->prepare("DELETE FROM kullanici WHERE kullanici_id=:kullanici_id");

    $kontrol = $sil->execute(array(

        'kullanici_id' => $_GET['kullanici_id']
    ));

    if ($kontrol) {
        header("location:../production/kullanici.php?sil=ok");
    } else {
        header("location:../production/kullanici.php?sil=no");
    }
}






if (isset($_POST['menuduzenle'])) {

    $menu_id = $_POST['menu_id'];

    $menu_seourl = seo($_POST['menu_ad']);


    $ayarkaydet = $db->prepare("UPDATE menu SET
    
    
    menu_ad=:menu_ad,
    menu_detay=:menu_detay,
    menu_url=:menu_url,
    menu_sira=:menu_sira,
    menu_seourl=:menu_seourl,
    menu_durum=:menu_durum
    WHERE menu_id={$_POST['menu_id']}");

    $update = $ayarkaydet->execute(array(

        'menu_ad' => $_POST['menu_ad'],
        'menu_detay' => $_POST['menu_detay'],
        'menu_url' => $_POST['menu_url'],
        'menu_sira' => $_POST['menu_sira'],
        'menu_seourl' => $menu_seourl,
        'menu_durum' => $_POST['menu_durum']



    ));

    if ($update) {
        header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=ok");
    } else {
        header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=no");
    }
}




if ($_GET['menusil'] == "ok") {

    $sil = $db->prepare("DELETE FROM menu WHERE menu_id=:menu_id");

    $kontrol = $sil->execute(array(

        'menu_id' => $_GET['menu_id']
    ));

    if ($kontrol) {
        header("location:../production/menu.php?sil=ok");
    } else {
        header("location:../production/menu.php?sil=no");
    }
}

if (isset($_POST['menukaydet'])) {

    $menu_seourl = seo($_POST['menu_ad']);


    $ayarekle = $db->prepare("INSERT INTO menu SET
    menu_ad=:menu_ad,
    menu_detay=:menu_detay,
    menu_url=:menu_url,
    menu_sira=:menu_sira,
    menu_seourl=:menu_seourl,
    menu_durum=:menu_durum
    ");

    $insert = $ayarekle->execute(array(
        'menu_ad' => $_POST['menu_ad'],
        'menu_detay' => $_POST['menu_detay'],
        'menu_url' => $_POST['menu_url'],
        'menu_sira' => $_POST['menu_sira'],
        'menu_seourl' => $menu_seourl,
        'menu_durum' => $_POST['menu_durum']
    ));

    if ($insert) {
        header("Location:../production/menu.php?durum=ok");
    } else {
        header("Location:../production/menu.php?durum=no");
    }
}




if(isset($_POST['stajyorumyap'])){



    $yorumyap=$db->prepare("INSERT INTO sirketyorum SET

    kullanici_id=:kullanici_id,
    kullanici_mail=:kullanici_mail,
    sirketyorum_ad=:sirketyorum_ad,
    sirketyorum_il=:sirketyorum_il,
    sirketyorum_ilce=:sirketyorum_ilce,
    sirketyorum_detay=:sirketyorum_detay
    ");



$insert=$yorumyap->execute(array(

    'kullanici_id' => $_POST['kullanici_id'],
    'kullanici_mail' => $_POST['kullanici_mail'],
    'sirketyorum_ad' => $_POST['sirketyorum_ad'],
    'sirketyorum_il' => $_POST['sirketyorum_il'],
    'sirketyorum_ilce' => $_POST['sirketyorum_ilce'],
    'sirketyorum_detay' => $_POST['sirketyorum_detay']
));

if($insert){

    header("Location:../../index.php?durum=ok");
}else{
    header("Location:../../index.php?durum=no");

}




}


if(isset($_POST['stajyorumkaydet'])){

$sirketyorum_id=$_POST['sirketyorum_id'];

$yorumguncelle = $db->prepare("UPDATE  sirketyorum SET



sirketyorum_durum=:sirketyorum_durum


WHERE sirketyorum_id={$_POST['sirketyorum_id']}");

$update = $yorumguncelle->execute(array(

'sirketyorum_durum' => $_POST['sirketyorum_durum']
));



if($update){

    header("Location:../production/yorum-duzenle.php?yorum_id=$sirketyorum_id&durum=ok");

}else{
    header("Location:../production/yorum-duzenle.php?yorum_id=$sirketyorum_id&durum=no");

}

}


if($_GET['sirketyorum_sil']== "ok"){



    $kontrol = $db -> prepare("DELETE FROM sirketyorum WHERE sirketyorum_id=:sirketyorum_id");

    $sil=$kontrol->execute(array(

        'sirketyorum_id' => $_GET['sirketyorum_id']
    ));

    if($sil){
        header("location:../production/yorum.php?sil=ok");
    }else{
        header("location:../production/yorum.php?sil=no");
    }
}




if(isset($_POST['yorumkaydet'])){


    $sirketyorum_id =$_POST['sirketyorum_id'];

    $yorumyap=$db->prepare("INSERT INTO yorumlar SET

    kullanici_id=:kullanici_id,
    sirketyorum_id=:sirketyorum_id,
    kullanici_adsoyad=:kullanici_adsoyad,
    yorum_detay=:yorum_detay
   
    ");



$insert=$yorumyap->execute(array(

    'kullanici_id' => $_POST['kullanici_id'],
    'sirketyorum_id' => $_POST['sirketyorum_id'],
    'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
    'yorum_detay' => $_POST['yorum_detay']
   
));

if($insert){

    header("Location:../../sirketyorum-detay.php?id=$sirketyorum_id&durum=ok");
}else{
    header("Location:../../sirketyorum-detay.php?id=$sirketyorum_id&durum=no");

}




}


?>
