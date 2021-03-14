<?php

require_once 'header.php';

$sirketyorumsor = $db->prepare("SELECT * FROM sirketyorum where sirketyorum_id=:id");
$sirketyorumsor->execute(array(
  'id' => $_GET['id']
));
$sirketyorumcek = $sirketyorumsor->fetch(PDO::FETCH_ASSOC);


$yorumsor =$db->prepare("SELECT * FROM yorumlar where sirketyorum_id=:id ");
$yorumsor->execute(array(
  'id' =>  $_GET['id']


));
$say = $yorumsor->rowCount();

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
                <?php require_once 'sidebar.php' ?>
              </div>


            </div>
          </div>
          <!-- End left sidebar -->
          <!-- Start single blog -->
          <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <!-- single-blog start -->
                <article class="blog-post-wrapper">
                  <div class="post-thumbnail">
                    <img src="assets/img/blog/6.jpg" alt="" />
                  </div>
                  <div class="post-information">
                    <h2><?php echo $sirketyorumcek['sirketyorum_ad'] ?></h2>
                    <div class="entry-meta">
                      <span class="author-meta"><i class="fa fa-user"></i><?php echo $sirketyorumcek['kullanici_mail'] ?></span>
                      <span><i class="fa fa-clock-o"></i> <?php echo $sirketyorumcek['sirketyorum_zaman'] ?></span>


                    
                  
                      <span><i class="fa fa-comments-o"></i><?php echo $say ?>Yorum</span>
                    </div>
                    <div class="entry-content">
                      <p><?php echo $sirketyorumcek['sirketyorum_detay'] ?></p>
                    </div>
                  </div>
                </article>
                <div class="clear"></div>
                <div class="single-post-comments">
                  <div class="comments-area">
                    <div class="comments-heading">
                      <h4>Yorum(<?php echo $say ?>)</h3>
                    </div>
                    <div class="comments-list">
                      <ul>
                      <?php while($yorumcek=$yorumsor->fetch(PDO::FETCH_ASSOC)){?>
                        <li class="threaded-comments">
                          <div class="comments-details">
                            <div class="comments-list-img">
                              <img src="assets/img/blog/b02.jpg" alt="post-author">
                            </div>
                            <div class="comments-content-wrap">
                              <span>
                                <b><?php echo $yorumcek['kullanici_adsoyad'] ?></b>
                                
                                <span class="post-time"><?php echo $yorumcek['yorum_zaman'] ?></span>
                               
                              </span>
                              
                              <p><?php echo $yorumcek['yorum_detay'] ?></p>
                            </div>
                          </div>
                        </li>
<?php } ?>

                      </ul>
                    </div>
                  </div>


                  <div class="comment-respond">
                    <h3 class="comment-reply-title">Yorum Yap</h3>




                    <form action="nedmin/netting/islem.php" method="POST">
                      <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12 comment-form-comment">

                          <textarea id="message-box" cols="30" rows="10" name="yorum_detay"></textarea>


                          <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">
                          
                          <input type="hidden" name="sirketyorum_id" value="<?php echo $sirketyorumcek['sirketyorum_id'] ?>">

                          <input type="hidden" name="kullanici_adsoyad" value="<?php echo $kullanicicek['kullanici_adsoyad'] ?>">




                          <button type="submit" name="yorumkaydet" class="btn btn-primary">Yorum Yap</button>

                        </div>
                      </div>
                    </form>





                  </div>
                </div>
                <!-- single-blog end -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Blog Page -->

  </main><!-- End #main -->

  <?php require_once 'footer.php' ?>