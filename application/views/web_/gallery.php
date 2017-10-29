<section class="gallery" id="thumbnails">
    <div class="container">
        <h4>مكتبة صور معهد بلا حدود</h4>
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