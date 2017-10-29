
<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
    </span>
    <section>
    <div id="slider" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="parallax-overlay"></div>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
         
         <?php if(isset($slider) &&  $slider!=null ):
          $count=1;foreach($slider as $one_img):
        $actived=""; if($count==1){$actived="active";}?>
         <div class="item <?php echo $actived ?>">
                <img src="<?php echo base_url('uploads/images/'.$one_img->img)?>" alt="...">
                <div class="carousel-caption">
                    <h2 class="wow bounceInDown"><?php echo $one_img->title?></h2>
                    <h4 class="wow bounceInUp"  data-wow-duration="1s" data-wow-delay="0.5s"><?php echo $one_img->content?></h4>
                    <div class="wow bounceInDown" data-wow-duration="1s" data-wow-delay="1s">
                     
                    </div>
                </div>
            </div>
         
         
        <?php $count++;endforeach; else:?>         
            <div class="item active">
                <img src="<?php echo base_url() ?>asisst/web_asset/img/slider/slider4.jpg" alt="...">
                <div class="carousel-caption">
                    <h2 class="wow bounceInDown">للمحترفين فى مجال التسويق الالكترونى</h2>
                    <h4 class="wow bounceInUp"  data-wow-duration="1s" data-wow-delay="0.5s">دورة التسويق الالكترونى المتقدم</h4>
                    <div class="wow bounceInDown" data-wow-duration="1s" data-wow-delay="1s">
                    <!--    <a href="#">تفاصيل الدورة </a>
                  -->  </div>
                </div>
            </div>
            
            <div class="item">
                <img src="<?php echo base_url() ?>asisst/web_asset/img/slider/slider1.jpg" alt="...">
                <div class="carousel-caption">
                    <h2 class="wow bounceInDown">للمحترفين فى مجال التسويق الالكترونى</h2>
                    <h4 class="wow bounceInUp"  data-wow-duration="1s" data-wow-delay="0.5s">دورة التسويق الالكترونى المتقدم</h4>
                    <div class="wow bounceInDown" data-wow-duration="1s" data-wow-delay="1s">
                   <!--     <a href="#">تفاصيل الدورة </a>
                  -->  </div>
                </div>
          <?php endif;?>
            </div>

        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#slider" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#slider" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>

    
    
<!--
<section>
    <div id="slider" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="parallax-overlay"></div>
    
        <div class="carousel-inner" role="listbox">
         
         <?php if(isset($slider) &&  $slider!=null ):
         $actived=""; $count=1;foreach($slider as $one_img):
         if($count==1){$actived="active";}?>
         <div class="item <?php echo $actived ?>">
                <img src="<?php echo base_url('uploads/images/'.$one_img->img)?>" alt="...">
                <div class="carousel-caption">
                    <h2 class="wow bounceInDown"><?php echo $one_img->title?></h2>
                    <h4 class="wow bounceInUp"  data-wow-duration="1s" data-wow-delay="0.5s"><?php echo $one_img->content?></h4>
                    <div class="wow bounceInDown" data-wow-duration="1s" data-wow-delay="1s">
                     
                    </div>
                </div>
            </div>
         
         
        <?php $count++;endforeach; else:?>         
            <div class="item active">
                <img src="<?php echo base_url() ?>asisst/web_asset/img/slider/slider4.jpg" alt="...">
                <div class="carousel-caption">
                    <h2 class="wow bounceInDown">للمحترفين فى مجال التسويق الالكترونى</h2>
                    <h4 class="wow bounceInUp"  data-wow-duration="1s" data-wow-delay="0.5s">دورة التسويق الالكترونى المتقدم</h4>
                    <div class="wow bounceInDown" data-wow-duration="1s" data-wow-delay="1s">
                   </div>
                </div>
            </div>
            
            <div class="item">
                <img src="<?php echo base_url() ?>asisst/web_asset/img/slider/slider1.jpg" alt="...">
                <div class="carousel-caption">
                    <h2 class="wow bounceInDown">للمحترفين فى مجال التسويق الالكترونى</h2>
                    <h4 class="wow bounceInUp"  data-wow-duration="1s" data-wow-delay="0.5s">دورة التسويق الالكترونى المتقدم</h4>
                    <div class="wow bounceInDown" data-wow-duration="1s" data-wow-delay="1s">
              
              </div>
                </div>
          <?php endif;?>
            </div>

        </div>

      
        <a class="left carousel-control" href="#slider" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#slider" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    
</section>
-->



<section class="col-xs-12">
    <h4 class="text-center">أحدث الأخبار معهد بلا حدود</h4>

    <div id="new-slider" class="carousel slide " data-ride="carousel">
        <!-- Indicators -->
        <div class="col-sm-4 no-padding hidden-xs">
            <ol class="carousel-indicators">
                <?php if(isset($news)&& $news!=null):?>

                <?php
                $x=0;
                $aa=0;
                foreach ($news as $new):
                    if ($aa == 0) {
                        $activety = 'active';
                    } else {
                        $activety = '';
                    }
                    ?>
                <li data-target="#new-slider" data-slide-to="<?php echo $x; ?>" class="<?php echo $activety ?>">
                    <p class="text-left"><?php echo $new->news_title ?></p>
                </li>

                <?php
                    $aa++;
                    $x++;
                endforeach; ?>
                <?php endif; ?>
            </ol>
        </div>

        <!-- Wrapper for slides -->
        <div class="col-sm-6  no-padding">
            <div class="carousel-inner" role="listbox">

                <?php if(isset($news)&& $news!=null):?>

                <?php
                $x=0;
                $aa=0;

                foreach ($news as $new):
                    if ($aa == 0) {
                        $activety = 'active';
                    } else {
                        $activety = '';
                    }
                    ?>

                <div class="item <?php echo $activety ?>">
                 <?php  echo'<img src="'. base_url('uploads/images').'/'. $new->img.'" alt="...">' ?>
                    <div class="carousel-caption">
                        <p><a href="<?php echo base_url() ?>web/single_news/<?php echo $new->id ?>"> <?php echo word_limiter(strip_tags($new->news_content),22) ?></a></p>
                    </div>
                </div>

            <?php
            $aa++;
            $x++;
            endforeach; ?>
                <?php  endif; ?>

        </div>

        <!-- Controls -->
        <div class="visible-xs">
            <a class="left carousel-control" href="#new-slider" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#new-slider" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>

    <div class="col-sm-2">
      
     
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            
            
            
                <div class="carousel-inner" role="listbox">
  
                                                         

                <?php /*
$aaa=0;
foreach($this->left as $record):
    if ($aaa == 0) {
        $activetya = ' active';
    } else {
        $activetya = '';
    }*/
    ?>
<?php
$aaa=0;
foreach($this->left as $record):

if ($aaa == 0) {
        $activetya = ' active';
    } else {
        $activetya = '';
    }
    
  
    
?>

<div class="item <?php echo $activetya; ?> ">
   
    <?php
    echo ' <img src="'. base_url('uploads/images').'/'. $record->image.'" width="100%" height="360">';
    ?>

</div>
        
 <?php
 $aaa++;
  endforeach; ?>              
               
                </div>







                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div> 
     
     
     
     
     
     
      
      
      <!--
      
      
        <div id="ann-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox" >
               
                <?php if(isset($this->left)&& $this->left!=null):?>
                <?php
$aa=0;
foreach($this->left as $record):
    if ($aa == 0) {
        $activety = ' active';
    } else {
        $activety = '';
    }
    ?>
    <div class="item <?php echo $activety ?>">
 <?php echo' <a href="'. base_url('uploads/images').'/'. $record->image.'">
 <img src="'. base_url('uploads/images').'/'. $record->image.'" width="100%" height="360">
 
 
 
 </a>';  ?>
    </div>
<?php endforeach; ?>
                    <?php else: ?>
                                <div class="item active">
                                    <a href="<?php echo base_url() ?>asisst/web_asset/img/01433717254.jpg"><img src="<?php echo base_url() ?>asisst/web_asset/img/01433717254.jpg" width="100%" height="360"></a>
                                </div>
                                <div class="item">
                                    <a href="<?php echo base_url() ?>asisst/web_asset/img/YAwTKRP.png"><img src="<?php echo base_url() ?>asisst/web_asset/img/YAwTKRP.png" width="100%" height="360"></a>
                                </div>
                <?php  endif; ?>
            </div>
        </div>

-->
    </div>

</section>


<section class="home col-xs-12" >
    <div id="divider" class="divider">
        <p>
        تعلم معنا ... فإن العلم بلا حدود  <br>
            أكثر من 6000 خريج  <strong></strong> 
        </p>
    </div>
</section>

<div class="r-center">
    <div class="container">
    
    
        <div class="col-xs-12 text-center">
            <h2> مؤسسة  بلا حدود التدريبية  </h2>
            <? if(!empty($about_us)):?>
            <p><? echo
            
            word_limiter( $about_us[0]->content,200);
            ?> </p>
            <? endif;?>
        </div>
      
      
      
      
              <div class="col-xs-12 r-center-offer">
              <div class="col-xs-12">
      <h4 id="heading"> أفضل العروض  </h4>
      </div>
            <? if(!empty($offers)):
            foreach ($offers as $offer):
            ?>
            <div class="col-md-3 col-sm-6 col-xs-12 r-center-offer-one">
                <div class="sep">
                    <div class="imagechange-3d image-hover hover">
                        <div class="imagechange-3d-inner">
                            <div class="imgchange-1">
                                <img src="<?php echo base_url() ?>uploads/images/<? echo $offer->img;?>" alt="">
                                <h3><? echo $offer->title;?>  </h3>
                                <h5 class="text-center"> <? echo $offer->adventage;?> </h5>
                                <h1>20%</h1>
                            </div>
                            <div class="imgchange-2">
                                <h3> <? echo $offer->title;?></h3>
                                <p><? //echo  word_limiter($offer->content,10);?></p>
                                <h4><span> <i class="fa fa-money" aria-hidden="true"></i>
                            </span> <?php echo $offer->price; ?> </h4>
                                
                                <h4><span> <i class="fa fa-clock-o" aria-hidden="true"></i>
                            </span> <?php  echo $offer->hours_number ?> </h4>
                                <h4><span> <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </span> اون لاين </h4>
                                <a href="<?php echo base_url() ?>Coursat/single_course/<? echo $offer->id;?>/2"><button class="btn" type="submit"> للحجز والاستفسار والتفاصيل </button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <? endforeach; endif; ?>


        </div>
       <!-------------------------------------------------------------->
      
      
      <!--  <div class="col-xs-12 r-courses">
            <div id="owl-demo11" class="owl-carousel owl-theme">
                <? if(!empty($home_courses)):
                    foreach ($home_courses as $record):?>
                <div class="item">
                    <img src="<?php echo base_url() ?>uploads/images/<? echo $record->sessions_img;?>" alt="" class="r-center-img">
                    <img src="<?php echo base_url() ?>asisst/web_asset/img/ae623b255e83138caf1a645202f1d988.png" alt="" class="r-center-back">
                    <div class="r-center-text">
                        <h3> <? echo $record->sessions_name;?> </h3>
                        <p><?echo word_limiter($record->sessions_details,10)?> </p>
                        <h5><? echo $record->sessions_cost ;?><span> <i class="fa fa-money" aria-hidden="true"></i></span></h5>
                        <h5>  <? echo $record->sessions_time ;?>  ساعة  <span> <i class="fa fa-clock-o" aria-hidden="true"></i></span> </h5>
                        <div class="col-xs-12">
                            <a href="<?php echo base_url() ?>Course/single_course/<? echo $record->sessions_id_pk ;?>"><button class="btn" type="submit">تفاصيل الكورس </button> </a>
                        </div>
                    </div>
                </div>
                <? endforeach; endif;?>
            </div>
        </div>
-->

        <div class="col-xs-12 r-courses">
        <div class="col-xs-12">
<h4 id="heading"> أحدث الدورات   </h4>
</div>
            <div id="owl-demo11" class="owl-carousel owl-theme">
                <? if(!empty($home_courses)):
                    foreach ($home_courses as $record):
                        if(!empty($record->sessions_id_pk)):?>
<div class="item">
    <img src="<?php echo base_url() ?>uploads/images/<? echo $record->sessions_img;?>" alt="" class="r-center-img">
    <img src="<?php echo base_url() ?>asisst/web_asset/img/ae623b255e83138caf1a645202f1d988.png" alt="" class="r-center-back">
    <div class="r-center-text">
        <h3> <? echo $record->sessions_name;?> </h3>
   
        <h5><? echo $record->sessions_cost ;?><span> <i class="fa fa-money" aria-hidden="true"></i></span></h5>
        <h5>  <? echo $record->sessions_time ;?>  ساعة  <span> <i class="fa fa-clock-o" aria-hidden="true"></i></span> </h5>
        <div class="col-xs-12">
            <a href="<?php echo base_url() ?>Coursat/single_course/<? echo $record->sessions_id_pk ;?>/1"><button class="btn" type="submit">تفاصيل الكورس </button> </a>
        </div>
    </div>
</div>
                <?   endif;  endforeach;  endif; ?>

            </div>
        </div>



        <!-------------------------------------------------------------->

        <div class="col-xs-12 r-center-vedio">
            <div class="col-sm-9 r-center-one">
                <h6 class="text-center"> دورات مؤسسة بلا حدود  </h6>
                <div id="owl-demo12" class="owl-carousel owl-theme">

                    <? if(!empty($all_videos)):
                        for($a=0;$a<sizeof($all_videos);$a++):
                        ?>
                    <div class="item">
                        <iframe src="https://www.youtube.com/embed/<? echo $all_videos[$a][0]->vid; ?>" frameborder="0" allowfullscreen></iframe>
                        <h3 class="text-center"><? echo $all_videos[$a][0]->title; ?></h3>
                    </div>
                    <? endfor; endif;?>
                </div>
            </div>
            <div class="col-sm-3 r-center-social">
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs=timeline&width=270&height=310&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="100%" height="310" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
            </div>
        </div>
    </div>
</div>





<section class="gallery" id="thumbnails">
    <div class="container">
    <div class="col-xs-12">
        <h4 id="heading">مكتبة صور معهد بلا حدود</h4>
        </div>
        <br>
        <ul class="clearfix list-unstyled">
            <?php if(isset($albums)&& $albums!=null):?>

            <?php foreach ($albums as $record): ?>
            <li class="col-md-3 col-sm-6 col-xs-12">
                <a href="<?php echo base_url('uploads/images') ?>/<?php echo $record->img ?>" title="<?php if($record->title==null){echo'لا يوجد عنوان للصوره';}else{echo $record->title;} ?>"><img src="<?php echo base_url('uploads/images') ?>/<?php echo $record->img ?>" alt="turntable" width="100%" height="250"></a>
            </li>
            <?php endforeach; ?>
            <?php endif;?>
        </ul>
    </div>
</section>





<section class="features text-center">
    <div class="container">
    <div class="col-xs-12">
        <h4 class="text-center">اهم ما تقدمه بلا حدود </h4>
</div>
        <?php if(isset($important)&& $important!=null):?>
        <?php foreach ($important as $record): ?>
        <div class="col-md-2 col-sm-3 col-xs-6">
            <div class="box">
                <?php  echo'<img src="'. base_url('uploads/images').'/'. $record->img.'" width="50" height="60">' ?>
                <h6><?php echo strip_tags($record->title) ?></h6>
            </div>
        </div>
<?php endforeach; ?>
        <?php endif;?>
    </div>
</section>







<section class="says text-center">
    <div class="container">
        <h4 class="title">أراء المتدربين لدى معهد بلا حدود</h4>
        <div id="owl-demo2" class="owl-carousel owl-theme">
            <? if(!empty($home_trainers_opinions)):
                foreach ($home_trainers_opinions as $record):
                ?>
            <div class="item">
                <div class="col-xs-5">
                    <img src="<?php echo base_url() ?>uploads/images/<? echo $record->trainer_logo;?>">
                </div>
                <div class="col-xs-7" >
                  
                </div>
               <h6><?php echo $record->trainer_id?></h6>
                <div class="testmonial">
                    <p><? echo $record->trainer_openion;?></p>
                </div>
            </div>
            <?  endforeach; endif;?>
        </div>
    </div>
</section>


<!--
<section class="logos text-center">
  <div class="container">
    <h4 class="title">شركاء نجاح المسيرة المهنية</h4>
    <div id="owl-demo33" class="owl-carousel owl-theme">
      <div class="item">
         <img src="<?php echo base_url() ?>asisst/web_asset/img/logo1.png"  title="">
      </div>
      <div class="item">
         <img src="<?php echo base_url() ?>asisst/web_asset/img/logo1.png"  title="">
      </div>
      <div class="item">
         <img src="<?php echo base_url() ?>asisst/web_asset/img/logo1.png"  title="">
      </div>
      <div class="item">
        <img src="<?php echo base_url() ?>asisst/web_asset/img/logo1.png"  title="">
      </div>
      <div class="item">
         <img src="<?php echo base_url() ?>asisst/web_asset/img/logo1.png"  title="">
      </div>
      <div class="item">
        <img src="<?php echo base_url() ?>asisst/web_asset/img/logo1.png"  title="">
      </div>
      <div class="item">
         <img src="<?php echo base_url() ?>asisst/web_asset/img/logo1.png"  title="">
      </div>
      <div class="item">
          <img src="<?php echo base_url() ?>asisst/web_asset/img/logo1.png"  title="">
      </div>
      <div class="item">
         <img src="<?php echo base_url() ?>asisst/web_asset/img/logo1.png"  title="">
      </div>
      <div class="item">
         <img src="<?php echo base_url() ?>asisst/web_asset/img/logo1.png"  title="">
      </div>
      <div class="item">
         <img src="<?php echo base_url() ?>asisst/web_asset/img/logo1.png"  title="">
      </div>
      <div class="item">
          <img src="<?php echo base_url() ?>asisst/web_asset/img/logo1.png"  title="">
      </div>
      <div class="item">
        <img src="<?php echo base_url() ?>asisst/web_asset/img/logo1.png"  title="">
      </div>
      <div class="item">
          <img src="<?php echo base_url() ?>asisst/web_asset/img/logo1.png"  title="">
      </div>
      <div class="item">
          <img src="<?php echo base_url() ?>asisst/web_asset/img/logo1.png"  title="">
      </div>
      <div class="item">
          <img src="<?php echo base_url() ?>asisst/web_asset/img/logo1.png"  title="">
      </div>
      <div class="item">
         <img src="<?php echo base_url() ?>asisst/web_asset/img/logo1.png"  title="">
      </div>
      <div class="item">
        <img src="<?php echo base_url() ?>asisst/web_asset/img/logo1.png"  title="">
      </div>

    </div>
  </div>
</section>
-->

 


