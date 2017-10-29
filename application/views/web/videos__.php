<? $this->load->view('web/requires/header'); ?>

<div class="r-video">
    <div class="container">
        <h3 class="text-center">
            <span> <i class="fa fa-video-camera" aria-hidden="true"></i>
            </span>  فيديوهات دورات مؤسسة بلا حدود </h3>
        <? if(!empty($get_courses)) :
            foreach ($get_courses as $record):?>
        <div class="col-xs-12 r-video-center">
            <h5><a href="">
  <span><i class="fa fa-angle-double-left" aria-hidden="true"></i></span> دوره <?echo $record->sessions_name; ?>   </a></h5>
          <?if(!empty($get_videos[$record->sessions_id_pk])):
                    foreach ($get_videos[$record->sessions_id_pk] as $row):?>
            <div class="col-sm-4">
                <iframe width="100%" height="190" src="https://www.youtube.com/embed/<? echo $row->vid;?>" frameborder="0" allowfullscreen></iframe>
                <h4 class="text-center"><? echo $row->title;?></h4>
            </div>
             <? endforeach; endif;?>
        </div> <h5></h5>
            <?   endforeach; endif;?>

    </div>
</div>
<?
$this->load->view('web/requires/footer2');
?>