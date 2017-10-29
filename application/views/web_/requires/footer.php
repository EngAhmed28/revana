


<section class="logos text-center">
    <div class="container">
        <h4 class="title">شركاء نجاح المسيرة المهنية</h4>
        <div id="owl-demo1" class="owl-carousel owl-theme">
            <?php if(isset($this->customers)&& $this->customers!=null):?>
            <?php foreach ($this->customers as $record): ?>
            <div class="item">
               <?php echo' <img src="'. base_url('uploads/images').'/'. $record->img.'" class="img-responsive " title="" />' ?>
            </div>
<?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>



<footer class="footer-distributed col-xs-12">
    <?php foreach ($this->footer as $record): ?>

    <div class="footer-left col-md-3 col-sm-6 col-xs-12">

        <?php  echo'<img src="'. base_url('uploads/images').'/'. $record->comp_logo.'"  class="logo" >' ?>
   <p class="footer-links">
  <a href="<?php echo base_url().'web'?>">الرئيسية</a>
            ·
            <a href="<?php echo base_url().'about'?>">عن بلا حدود</a>
            ·
            <a href="<?php echo base_url().'gallery'?>">مكتبة الصور</a>
            ·
            <a href="<?php echo base_url().'offers'?>"> عروضنا</a>
            ·
            <a href="<?php echo base_url().'contact_web'?>">اتصل بنا</a>
     
          <p class="footer-company-name">بلا حدود © <?php echo date("Y",time());?></p>
    </div>

    <div class="footer-center col-md-3 col-sm-6 col-xs-12">

        <h4>وسائل الاتصال</h4>
        <div>
            <i class="fa fa-map-marker"></i>
            <p><?php echo $record->comp_address ?></p>
        </div>

        <div>
            <i class="fa fa-phone"></i>
            <p><?php
                $tele=unserialize($record->tele_info);
                for($x = 0 ; $x < count($tele) ; $x++){
                    echo $tele[$x].'<br>';
                }?></p>
        </div>

        <div>
            <i class="fa fa-envelope"></i>
 <p><a href="mailto:support@company.com"><?php

         $email=unserialize($record->email_info);
         for($x = 0 ; $x < count($email) ; $x++){

             echo $email[$x].'<br>';

         }?>
     </a></p>
        </div>

    </div>

    <div class="links col-md-3 col-sm-6 col-xs-12">
        <h4>روابط هامة</h4>
        <ul >
            <li><a href="<?php echo base_url().'web'?>">الرئيسية</a></li>
            <li><a href="<?php echo base_url().'about'?>">عن بلا حدود </a></li>
            <li><a href="<?php echo base_url().'offers'?>">العروض</a></li>
             <li><a href="<?php echo base_url().'gallery'?>">مكتبة الصور</a></li>
            <li><a href="<?php echo base_url().'contact_web'?>">اتصل بنا</a></li>
        </ul>
    </div>

    <div class="footer-right col-md-3 col-sm-6 col-xs-12">

        <p class="footer-company-about" style="color: white;">
            <span>عن بلا حدود</span>
              <?php if(isset( $this->about_us) &&  $this->about_us!=null):
        foreach( $this->about_us as $one_row):?>
          <?php  echo 
          strip_tags(word_limiter($one_row->content,45))
           ?>
          </p>
<?php endforeach;endif;?>
        <div class="footer-icons">

            <a href="<?php echo $record->comp_facebook ?>"><i class="fa fa-facebook"></i></a>
            <a href="<?php echo $record->comp_twitter ?>"><i class="fa fa-twitter"></i></a>
            <a href="<?php echo $record->comp_instagram ?>"><i class="fa fa-instagram"></i></a>
            <a href="<?php echo $record->comp_youtube ?>"><i class="fa fa-youtube"></i></a>

        </div>

    </div>
<?php endforeach; ?>
</footer>

<div class="copyright">
    <div class="container">

        <div class="col-md-5 col-xs-12">
            <ul class="bottom_ul">
             <li><a href="<?php echo base_url().'web'?>">الرئيسية</a></li>
            <li><a href="<?php echo base_url().'about'?>">عن بلا حدود </a></li>
            <li><a href="<?php echo base_url().'offers'?>">العروض</a></li>
             <li><a href="<?php echo base_url().'gallery'?>">مكتبة الصور</a></li>
            <li><a href="<?php echo base_url().'contact_web'?>">اتصل بنا</a></li>

            </ul>
        </div>
        <div class="col-md-7 col-xs-12">
      <a href="https://alatheertech.com/">
      <p>© 2017  جميع الحقوق محفوظة لشركة الأثير تك لتكنولوجيا المعلومات  </p>
        
      </a>
      
            
        </div>

    </div>
</div>




<script type="text/javascript" src="<?php echo base_url() ?>asisst/web_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url() ?>asisst/web_asset/js/bootstrap-arabic.min.js"></script>
<script src="<?php echo base_url() ?>asisst/web_asset/js/jquery.easing.min.js"></script>
<script src="<?php echo base_url() ?>asisst/web_asset/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url() ?>asisst/web_asset/js/custom.js"></script>
<script src="<?php echo base_url() ?>asisst/web_asset/js/wow.min.js"></script>
<script src="<?php echo base_url() ?>asisst/web_asset/js/jquery.lightbox-0.5.min.js"></script>


<script type="text/javascript">

                                      $(document).ready(function() {
                                        $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
                                        $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
                                      });

                                    </script>
<script>
    new WOW().init();
</script>

<script type="text/javascript">
    $(function() {
        $('#thumbnails a').lightBox();
    });
</script>
</body>
</html>
