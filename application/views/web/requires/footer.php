


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

<section class="footer-parlex text-center">
    <div class="parlex9-back">
      <div class="w-container">
      <h4>تابع أخر المستجدات على مواقع السوشيال ميديا</h4>
        <div class="wrap">
          <div class="footer-social">
            <div class="fotter-social-wrap">
              <a href="https://www.facebook.com/"><img class="fotter-social" src="<?php echo base_url() ?>asisst/web_asset/img/social/Facebook.png" alt="52dd249c929b601f5400054c_Facebook.png"></a>
              <a href="https://www.twitter.com/"><img class="fotter-social" src="<?php echo base_url() ?>asisst/web_asset/img/social/Twitter.png" alt="52dd24f2929b601f54000551_Twitter.png"></a>
              <a href="https://plus.google.com/"><img class="fotter-social" src="<?php echo base_url() ?>asisst/web_asset/img/social/Google-plus.png" alt="52dd26a55b54031d540005af_Google-plus.png"></a>
              <a href="https://www.blogger.com/"><img class="fotter-social" src="<?php echo base_url() ?>asisst/web_asset/img/social/Blogger.png" alt="52de52e7b6d2171f78000414_Blogger.png"></a>
              <a href="https://www.digg.com/"><img class="fotter-social" src="<?php echo base_url() ?>asisst/web_asset/img/social/Digg.png" alt="52de53174702a71e780003c3_Digg.png"></a>
              <a href="https://www.pinterest.com/"><img class="fotter-social" src="<?php echo base_url() ?>asisst/web_asset/img/social/Pinterest.png" alt="52de533c5d3566c1430003e9_Pinterest.png"></a>
              <a href="https://www.flicker.com/"><img class="fotter-social" src="<?php echo base_url() ?>asisst/web_asset/img/social/Flickr.png" alt="52de535f1b42bfc24300049e_Flickr.png"></a>
              <a href="https://www.vimeo.com/"><img class="fotter-social" src="<?php echo base_url() ?>asisst/web_asset/img/social/Vimeo.png" alt="52de537cb6d2171f7800041c_Vimeo.png"></a>
              <a href="https://www.myspace.com/"><img class="fotter-social" src="<?php echo base_url() ?>asisst/web_asset/img/social/Myspace.png" alt="52de53954702a71e780003c5_Myspace.png"></a>
              <a href="https://www.stumbleupon.com/"><img class="fotter-social" src="<?php echo base_url() ?>asisst/web_asset/img/social/Stumbleupn.png" alt="52de53c0b6d2171f7800041e_Stumbleupn.png"></a>
              <a href="https://www.tumblr.com/"><img class="fotter-social" src="<?php echo base_url() ?>asisst/web_asset/img/social/Tumblr.png" alt="52de54021b42bfc2430004a3_Tumblr.png"></a>
              <a href="https://www.youtube.com/"><img class="fotter-social" src="<?php echo base_url() ?>asisst/web_asset/img/social/Youtube.png" alt="52de54495d3566c14300040a_Youtube.png"></a>
            </div>
          </div>
          <div>
            <div class="fotter-text">
              <p class="copyright-area">تابع أخر المستجدات على مواقع السوشيال ميديا <a href="https://carinotech.com" title="Carino Technologies" target="_blank">ريفانا</a></p></div>
          </div>
        </div>
      </div>
    </div>
  </section>


<footer class="footer-distributed col-xs-12">
    <?php foreach ($this->footer as $record): ?>

    <div class="footer-left col-md-3 col-sm-6 col-xs-12">

        <?php  echo'<img src="'. base_url('uploads/images').'/'. $record->comp_logo.'"  class="logo" >' ?>

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
            <li><a href="<?php echo base_url().'about'?>">عن ريفانا</a></li>
            <li><a href="<?php echo base_url().'offers'?>">العروض</a></li>
             <li><a href="<?php echo base_url().'gallery'?>">مكتبة الصور</a></li>
            <li><a href="<?php echo base_url().'contact_web'?>">اتصل بنا</a></li>
        </ul>
    </div>

    <div class="footer-right col-md-3 col-sm-6 col-xs-12">

        <p class="footer-company-about" style="color: white;">
            <span>عن ريفانا</span>
              <?php if(isset( $this->about_us) &&  $this->about_us!=null):
        foreach( $this->about_us as $one_row):?>
          <?php  echo 
          strip_tags(word_limiter($one_row->content,45))
           ?>
          </p>
<?php endforeach;endif;?>


    </div>
<?php endforeach; ?>
</footer>

<div class="copyright">
    <div class="container">

        <div class="col-md-5 col-xs-12">
            <ul class="bottom_ul">
             <li><a href="<?php echo base_url().'web'?>">الرئيسية</a></li>
            <li><a href="<?php echo base_url().'about'?>">عن ريفانا</a></li>
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
<script src="<?php echo base_url() ?>asisst/web_asset/js/bootstrap-hover-tabs.js"></script>


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
