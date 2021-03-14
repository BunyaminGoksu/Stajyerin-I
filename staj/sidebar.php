


<?php
$sirketyorumsora=$db->prepare("SELECT * FROM sirketyorum order by sirketyorum_zaman DESC limit 3");
$sirketyorumsora->execute(); 

?>

<div class="single-blog-page">
    <!-- recent start -->
    <div class="left-blog">
        <h4>recent post</h4>
        
        <?php
        while($sirketyorumceka=$sirketyorumsora->fetch(PDO::FETCH_ASSOC)){

        ?>
            <!-- start single post -->
            <div class="recent-single-post">
                <div class="post-img">
                   
                      <h6><?php echo $sirketyorumceka['sirketyorum_ad'] ?></h6>
                   
                </div>
                <div class="pst-content">
                    <p> <?php echo substr($sirketyorumceka['sirketyorum_detay'],0,75) ?><a  style="color: rgb(16, 163, 242);" href="sirketyorum-detay.php?id=<?php echo $sirketyorumceka['sirketyorum_id'] ?>">...Devamını oku</a></p>
                </div>
            </div>
            <!-- End single post -->
      <?php  } ?>
          
            
       
    </div>
    <!-- recent end -->
</div>