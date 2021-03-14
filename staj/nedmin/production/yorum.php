<?php
error_reporting(E_ALL & ~E_NOTICE);


include 'header.php';

//Belirli veriyi seçme işlemi

$yorumsor = $db->prepare("SELECT * FROM sirketyorum ");
$yorumsor->execute();

?>


<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Menü Listeleme <small>,

                                <?php

                                if ($_GET['durum'] == "ok") { ?>

                                    <b style="color:green;">İşlem Başarılı...</b>

                                <?php } elseif ($_GET['durum'] == "no") { ?>

                                    <b style="color:red;">İşlem Başarısız...</b>

                                <?php }

                                ?>


                            </small></h2>

                        <div class="clearfix"></div>
                        <div align="right">
                            <a href="menu-ekle.php"><button class="btn btn-success  btn-xs">Yeni Ekle</button></a>
                        </div>
                    </div>
                    <div class="x_content">


                        <!-- Div İçerik Başlangıç -->

                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Şirket Ad</th>
                                    <th>Şirket İl</th>
                                    <th>Şirket İlçe</th>
                                    
                                    <th>Yorum Durum</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>





                                <?php
                                $say = 0;
                                while ($yorumcek = $yorumsor->fetch(PDO::FETCH_ASSOC)) {
                                    $say++; ?>


                                    <tr>
                                        <td><?php echo $say; ?></td>
                                        <td><?php echo $yorumcek['sirketyorum_ad'] ?></td>
                                        <td><?php echo $yorumcek['sirketyorum_il'] ?></td>
                                        <td><?php echo $yorumcek['sirketyorum_ilce'] ?></td>
                                      
                                        <td>
                                            <center>
                                                <?php

                                                if ($yorumcek['sirketyorum_durum'] == 1) { ?>

                                                    <button class="btn btn-success btn-xs">Aktif</button>

                                                <?php } else { ?>

                                                    <button class="btn btn-danger btn-xs">Pasif</button>


                                                <?php  } ?>


                                            </center>





                                        </td>
                                        <td>
                                            <center> <a href="yorum-duzenle.php?sirketyorum_id=<?php echo $yorumcek['sirketyorum_id'] ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center>
                                        </td>
                                        <td>
                                            <center><a href="../netting/islem.php?sirketyorum_id=<?php echo $yorumcek['sirketyorum_id']; ?>&sirketyorum_sil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center>
                                        </td>
                                    </tr>



                                <?php } ?>



                            </tbody>
                        </table>

                        <!-- Div İçerik Bitişi -->


                    </div>
                </div>
            </div>
        </div>




    </div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>