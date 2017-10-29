<?php  $this->load->view('web/requires/header'); ?>

<?php if(isset($_SESSION["is_loggedin"]) && $_SESSION["is_loggedin"] == true):?>
   <?php  if(!empty($get_courses)) :?>
<div class="r-video">
    <div class="container">
        <h3 class="text-center">
            <span> <i class="fa fa-video-camera" aria-hidden="true"></i>
            </span>  فيديوهات دورات مؤسسة بلا حدود </h3>
     
         <?php    foreach ($get_courses as $record):?>
        <div class="col-xs-12 r-video-center">
            <h5><a href="">
  <span><i class="fa fa-angle-double-left" aria-hidden="true"></i></span> دوره <?php echo $record->sessions_name; ?>   </a></h5>
          <?php if(!empty($get_videos[$record->sessions_id_pk])):
                    foreach ($get_videos[$record->sessions_id_pk] as $row):?>
            <div class="col-sm-4">
                <iframe width="100%" height="190" src="https://www.youtube.com/embed/<?php  echo $row->vid;?>" frameborder="0" allowfullscreen></iframe>
                <h4 class="text-center"><?php  echo $row->title;?></h4>
            </div>
             <?php  endforeach; endif;?>
        </div> <h5></h5>
            <?php    endforeach; ?>

    </div>
</div>
<?php else:?>
<br />
<div class="alert alert-danger" >
   لم يتم إضافة فديوهات بعد
          </div>

<br /><br /><br />

<?php endif;?>
<?php else:?>
<br />
<div class="alert alert-danger" >
 يجب التسجيل بالموقع لتمكن من مشاهدة الفيديوهات
          </div>
<br /><br /><br />


<?php endif;?>

<?php 
$this->load->view('web/requires/footer');
?>