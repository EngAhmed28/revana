
<body id="page-top" data-spy="scroll" data-target="" class="flexcroll">
<div class="r-details">
    <div class="container">
        <? if (!empty($course_data)):?>
        <div class="col-xs-12">
            <h3> تفاصيل عن <? echo $course_data['sessions_name']; ?> </h3>
            <div class="col-sm-8">
                <div class="col-xs-12">
                    <h4> <? echo $course_data['sessions_time']; ?> ساعة </h4>
                    <h5 class="r-titel">القسم :<? echo $course_data['course_name']; ?>  </h5>
                    <h5 class="r-titel1">الكورس هيبدا بعد : </h5>
                    <h3> يتم تحديد الميعاد فور اكتمال العدد !</h3>
                </div>
                <div class="col-xs-12 r-second">
                    <div class="col-sm-4">
                        <span><i class="fa fa-money" aria-hidden="true"></i></span> <? echo $course_data['sessions_cost']; ?> دولار
                    </div>
                    <div class="col-sm-4">
                        <span><i class="fa  fa-calendar" aria-hidden="true"></i></span>  <? echo $course_data['sessions_time']; ?>   ساعة
                    </div>
                    <div class="col-sm-4">
                        <span><i class="fa fa-bookmark" aria-hidden="true"></i></span> باللغة العربية
                    </div>

                </div>
                <button class="btn pull-right"> <span><i class="fa fa-angle-double-left" aria-hidden="true"></i></span> تسجيل <span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span></button>
                <div class="col-xs-12 r-three">
                    <h3> نبذه عن <? echo $course_data['sessions_name']; ?> </h3>
                    <p> <? echo $course_data['sessions_details']; ?> </p>
<!--                    <ul>
                        <li>تفاصيل تفاصيل تفاصيل </li>
                        <li>تفاصيل تفاصيل تفاصيل </li>
                        <li>تفاصيل تفاصيل تفاصيل </li>
                        <li>تفاصيل تفاصيل تفاصيل </li>
                    </ul>-->
                </div>

            </div>
            <div class="col-sm-4 r-image">
                <img src="<?php echo base_url() ?>uploads/images/<? echo $course_data['sessions_img']; ?>" alt="" class="center-block">
            </div>
        </div>
        <? endif;?>
    </div>
</div>

