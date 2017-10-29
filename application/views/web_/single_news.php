

<section id="blog" class="container">
  <br>
  <div class="blog">
    <div class="row">
      <div class="col-md-8">
        <?php if(isset($details)&& $details!=null):?>

        <?php foreach ($details as $detail): ?>

        <div class="blog-item">
         <?php echo'<img class="img-responsive img-blog" src="'. base_url('uploads/images').'/'. $detail->img.'" width="100%" alt="" />' ?>
          <div class="row">
            <div class="col-xs-12 col-sm-2 text-right">
              <div class="entry-meta">

                <span id="publish_date"><?php  $a=$detail->date; echo date('Y-m-d',$a) ?></span>
                <!-- <span><i class="fa fa-user"></i><a href="#"> محمد محمد </a> </span>
               <span> <a href="blog-item.html#comments">2 تعليقات </a><i class="fa fa-comment"></i></span>
                <span><a href="#">56 اعجاب</a><i class="fa fa-heart"></i></span>-->
              </div>
            </div>
            <div class="col-xs-12 col-sm-10 blog-content">
              <h3><?php echo $detail->news_title  ?></h3>

              <p><?php echo strip_tags($detail->news_content) ?></p>

            </div>
          </div>
        </div><!--/.blog-item-->
        <?php endforeach; ?>
<?php endif; ?>
      <!--  <div class="media reply_section">
          <div class="pull-left post_reply text-center">
            <a href="#"><img src="<?php /*echo base_url() */?>asisst/web_asset/img/boy.png" class="img-circle" alt="" /></a>
            <ul>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus"></i> </a></li>
            </ul>
          </div>
          <div class="media-body post_reply_content">
            <h3>مديح سمير </h3>
            <p >معهد تدريب قائم على فكر ورؤية ورسالة ذات طابع خاص، حيث يجمع فريق العمل بالأكاديمية بين روح الشباب وخبرة الكبار داخل فريق العمل بالأكاديمية، وتهدف الاكاديمية الى تقديم الخدمات التدريبية المعتادة ولكن بأسلوب عصري حديث، يمزج بين التدريب النظري المطعم بالتطبيقات المهنية والعملية .. فالأكاديمية بالأساس تقوم على تأهيل المتدربين الى سوق العمل بعد تزويدهم بكل ما يحتاجون من المادة العلمية والنظرية التي تثقل معارفهم قبل خوض الجانب العملي والتطبيقي، وتقدم الاكاديمية مجموعة فريدة من البرامج التدريبية المتميزة والحصرية ..</p>
            <p><strong>موقع :</strong> <a href="#">www.shapebootstrap.net</a></p>
          </div>
        </div> -->
        <h1 id="comments_title">صور متعلقة</h1>
          <?php if(isset($allphotos)&& $allphotos!=null):?>

          <?php foreach ($allphotos as $record) :?>
          <div class="col-md-4 col-sm-6 single-img">
       <?php echo'<img  src="'. base_url('uploads/images').'/'. $record->img.'" width="100%" height="250" />' ?>

        </div>

              <?php endforeach; ?>
          <?php endif; ?>
        <div class="clearfix"></div>

        <h1 id="comments_title">التعليقات</h1>
        <?php if(isset($comments)&& $comments!=null):?>

        <?php foreach ($comments as $record) :?>
        <div class="media comment_section">
          <div class="pull-left post_comments">
            <a href="#"><img src="<?php echo base_url() ?>asisst/web_asset/img/avatar3.png" class="img-circle" alt="" /></a>
          </div>
          <div class="media-body post_reply_comments">
            <h3><?php echo $record->name ?></h3>
            <h4><?php echo date('Y-m-d', $record->date); ?>َ</h4>
            <p><?php echo $record->message ?></p>
            <a href="#">رد</a>
          </div>
        </div>

<?php endforeach; ?>
        <?php endif; ?>
<span id="message">

<?php

if(isset($_SESSION['message']))

  echo $_SESSION['message'];

unset($_SESSION['message']);

?>
    </span>

        <div id="contact-page clearfix">
          <div class="status alert alert-success" style="display: none"></div>
          <div class="message_heading">
            <h4>اترك تعليقك</h4>
            <p>تأكد أنك قمت بادخال البيانت صحيحة (*)هذة الحقول مطلوبة</p>
          </div>
          <?php
          $id = $this->uri->segment(3);
          echo form_open_multipart('web/single_news/'.$id,array('class'=>"contact-form",'role'=>"form",'id'=>"main-contact-form" ))?>
           <div class="row">
              <div class="col-sm-5">
                <div class="form-group">
                  <label>الاسم *</label>
                  <input type="text" name="name" class="form-control" required="required">
                </div>
                <div class="form-group">
                  <label>البريد الالكترونى *</label>
                  <input type="email" name="email" class="form-control" required="required">
                </div>
                <div class="form-group">
                  <label>الهاتف *</label>
                  <input type="number" name="phone" class="form-control" required="required">
                </div>

              </div>
              <div class="col-sm-7">
                <div class="form-group">
                  <label>رسالتك *</label>
                  <textarea name="message" id="message" required="required" class="form-control" rows="8"></textarea>
                </div>
                <div class="form-group">
                  <input type="submit"  name="add" value="أرسل الرسالة" class="btn btn-primary btn-lg" />
                </div>
              </div>
            </div>
            <?php echo form_close()?>
        </div><!--/#contact-page-->
      </div><!--/.col-md-8-->

      <aside class="col-md-4 sidebar">
       <!-- <div class="widget ">
          <form role="form">
            <input type="text" class="form-control search_box" autocomplete="off" placeholder="Search Here">
          </form>
        </div>--><!--/.search-->

        <div class="widget categories">
          <h4>أحدث التعليقات</h4>
          <div class="row">
            <div class="col-sm-12">

              <? if(!empty($comments)):
                foreach ($comments as $comment):
                ?>
              <div class="single_comments">
                <img src="<?php echo base_url() ?>asisst/web_asset/img/avatar3.png" alt=""  />
                <p><? echo $comment->message;?> </p>
                <div class="entry-meta small muted">
                  <span>بواسطة  <a href="#"><? echo $comment->name;?> </a><a href="#"></a></span>
                </div>
              </div>
              <?  endforeach; endif;?>
<!--              <div class="single_comments">
                <img src="<?php /*echo base_url() */?>asisst/web_asset/img/avatar3.png" alt=""  />
                <p>معهد تدريب قائم على فكر ورؤية ورسالة ذات طابع خاص، حيث </p>
                <div class="entry-meta small muted">
                  <span>بواسطة  <a href="#">محمد احمد </a><a href="#"></a></span>
                </div>
              </div>
              <div class="single_comments">
                <img src="<?php /*echo base_url() */?>asisst/web_asset/img/avatar3.png" alt=""  />
                <p>معهد تدريب قائم على فكر ورؤية ورسالة ذات طابع خاص، حيث </p>
                <div class="entry-meta small muted">
                  <span>بواسطة  <a href="#">محمد احمد </a><a href="#"></a></span>
                </div>
              </div>-->

            </div>
          </div>
        </div><!--/.recent comments-->



        <!--<div class="widget tags">
          <h3>موضوعات متعلقة</h3>
          <ul class="tag-cloud">
            <li><a class="btn btn-xs btn-info" href="#">متعلقات</a></li>
            <li><a class="btn btn-xs btn-primary" href="#">متعلقات</a></li>
            <li><a class="btn btn-xs btn-primary" href="#">متعلقات</a></li>
            <li><a class="btn btn-xs btn-primary" href="#">متعلقات</a></li>
            <li><a class="btn btn-xs btn-primary" href="#">متعلقات</a></li>
            <li><a class="btn btn-xs btn-primary" href="#">متعلقات</a></li>
            <li><a class="btn btn-xs btn-primary" href="#">متعلقات</a></li>
            <li><a class="btn btn-xs btn-primary" href="#">متعلقات</a></li>
            <li><a class="btn btn-xs btn-primary" href="#">متعلقات</a></li>
            <li><a class="btn btn-xs btn-primary" href="#">متعلقات</a></li>
          </ul>
        </div>
        --><!--/.tags-->

       <!-- <div class="widget blog_gallery">
          <h3>صور حديثة</h3>
          <ul class="sidebar-gallery">
            <li><a href="#"><img src="<?php echo base_url() ?>asisst/web_asset/img/gallery1.png" alt="" /></a></li>
            <li><a href="#"><img src="<?php echo base_url() ?>asisst/web_asset/img/gallery2.png" alt="" /></a></li>
            <li><a href="#"><img src="<?php echo base_url() ?>asisst/web_asset/img/gallery3.png" alt="" /></a></li>
            <li><a href="#"><img src="<?php echo base_url() ?>asisst/web_asset/img/gallery4.png" alt="" /></a></li>
            <li><a href="#"><img src="<?php echo base_url() ?>asisst/web_asset/img/gallery5.png" alt="" /></a></li>
            <li><a href="#"><img src="<?php echo base_url() ?>asisst/web_asset/img/gallery6.png" alt="" /></a></li>
          </ul>
        </div>
        
        --><!--/.blog_gallery-->


      </aside>

    </div><!--/.row-->

  </div><!--/.blog-->

</section><!--/#blog-->





