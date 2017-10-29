<style>
.tab-content li {
	width:100% !important;
}

</style>
<div class="r-about">
    <div class="container">
        <div class="col-xs-12">
            <h3 class="text-center"> مؤسسة بلا حدود التدريبية  </h3>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs text-center" role="tablist">
                <li role="presentation" class="active">
                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                        <span> <i class="fa fa-user-circle" aria-hidden="true"></i></span>من نحن </a>
                </li>
                <li role="presentation">
                    <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                        <span> <i class="fa fa-reply-all" aria-hidden="true"></i> </span> الاهداف </a>
                </li>
                <li role="presentation">
                    <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">
					<span> <i class="fa fa-envelope-square" aria-hidden="true"></i></span> الرسالة</a>
                </li>
                <li role="presentation">
                    <a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"> 
					<span> <i class="fa fa-eye" aria-hidden="true"></i>
                        </span> رؤيتنا </a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <?php if(isset($about)&& $about!=null):?>
                    <?php foreach($about as $record): ?>
                    <div class="col-sm-8 col-xs-12">
                        <p><?php echo ($record->content) ?></p>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <div class="col-sm-4 hidden-xs">
                        <img src="<?php echo base_url() ?>asisst/web_asset/img/logo1.png" alt="" class="center-block">
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="profile">
                    <div class="col-sm-8 col-xs-12">
                        <ul class="r-course-help">
                            <?php if(isset($goals)&& $goals!=null):?>

                            <?php foreach ($goals as $record): ?>
                            <li> <span> <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                                     </span><?php echo ($record->content) ?>
                            </li>
                           <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="col-sm-4 hidden-xs">
                        <img src="<?php echo base_url() ?>asisst/web_asset/img/asd.png" alt="" class="center-block">
                    </div>

                </div>
                <div role="tabpanel" class="tab-pane" id="messages">
                    <?php if(isset($message)&& $message!=null):?>
                    <?php foreach($message as $record): ?>
                        <div class="col-sm-8 col-xs-12">
                            <p><?php echo ($record->content) ?></p>
                        </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <div class="col-sm-4 hidden-xs">
                        <img src="<?php echo base_url() ?>asisst/web_asset/img/iconSMS.png" alt="" class="center-block">
                    </div>

                </div>
                <div role="tabpanel" class="tab-pane" id="settings">
                    <?php if(isset($visions)&& $visions!=null):?>

                    <?php foreach($visions as $record): ?>
                        <div class="col-sm-8 col-xs-12">
                            <p><?php echo ($record->content) ?></p>
                        </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <div class="col-sm-4 hidden-xs">
                        <img src="<?php echo base_url() ?>asisst/web_asset/img/vision.png" alt="" class="center-block">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 r-sevices-center">
            <?php if(!empty($benifits)):
            foreach ($benifits as $row):
            ?>
                <div class="col-sm-4 text-center">
                    <div class="r-serv">
                        <?php  echo'<img src="'. base_url('uploads/images').'/'. $row->img.'" width="100" height="100">' ?>
                        <h4><?php echo $row->title ?> </h4>
                        <p class="text-center"><?php echo ($row->content) ?> </p>
                    </div>
                </div>

            <?php endforeach; ?>
            <?php endif; ?>

        </div>
        <!--<div class="col-xs-12 r-services-train">
            <h3> <span><i class="fa fa-users" aria-hidden="true"></i></span> طاقم التدريب </h3>
            <div id="owl-demo13" class="owl-carousel owl-theme">
                <div class="item text-center">
                    <img src="<?php /*echo base_url() */?>asisst/web_asset/img/boss.png" alt="">
                    <h5>دكتور / احمد محمد </h5>
                    <p> دكتور تنمية بشريه وموارد </p>
                </div>
                <div class="item">
                    <img src="<?php /*echo base_url() */?>asisst/web_asset/img/boy.png" alt="">
                    <h5>دكتور / احمد محمد </h5>
                    <p> دكتور تنمية بشريه وموارد </p>
                </div>
                <div class="item">
                    <img src="<?php /*echo base_url() */?>asisst/web_asset/img/student%20(1).png" alt="">
                    <h5>دكتور / احمد محمد </h5>
                    <p> دكتور تنمية بشريه وموارد </p>
                </div>
                <div class="item">
                    <img src="<?php /*echo base_url() */?>asisst/web_asset/img/boss.png" alt="">
                    <h5>دكتور / احمد محمد </h5>
                    <p> دكتور تنمية بشريه وموارد </p>
                </div>
                <div class="item">
                    <img src="<?php /*echo base_url() */?>asisst/web_asset/img/boy.png" alt="">
                    <h5>دكتور / احمد محمد </h5>
                    <p> دكتور تنمية بشريه وموارد </p>
                </div>
                <div class="item">
                    <img src="<?php /*echo base_url() */?>asisst/web_asset/img/student%20(1).png" alt="">
                    <h5>دكتور / احمد محمد </h5>
                    <p> دكتور تنمية بشريه وموارد </p>
                </div>
                <div class="item">
                    <img src="<?php /*echo base_url() */?>asisst/web_asset/img/boss.png" alt="">
                    <h5>دكتور / احمد محمد </h5>
                    <p> دكتور تنمية بشريه وموارد </p>
                </div>
            </div>

        </div>-->
    </div>
</div>







