<section class="mid-nav">
    <div class="container">
        <div class="col-sm-6 col-xs-12">
            <form class="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default"> <i class="fa fa-search" aria-hidden="true"></i> </button>
            </form>
        </div>
        <div class="col-sm-6 col-xs-12">
            <div class="share">
                <!-- AddToAny BEGIN -->
                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                    <a class="a2a_button_facebook"></a>
                    <a class="a2a_button_twitter"></a>
                    <a class="a2a_button_google_plus"></a>
                </div>
                <script async src="https://static.addtoany.com/menu/page.js"></script>
                <!-- AddToAny END -->
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container">
        <div class="col-sm-2">
            <a href="#" id="showmenu" class="wow flash infinite"><i class="fa fa-long-arrow-right " aria-hidden="true"></i> اخفاء / إظهار </a>
            <div class="sidebar">

                <ul class="list-unstyled menu text-center">
                    <p class="text-center header">اختار قسم الكورسات </p>
                    <li><a href="#"><img src="<?php echo base_url() ?>asisst/web_asset/img/menu/care.png"> <p>دورات طبية</p></a></li>
                    <hr>
                    <li><a href="#"><img src="<?php echo base_url() ?>asisst/web_asset/img/menu/earbuds.png"> <p>دورات صحية</p></a></li>
                    <hr>
                    <li><a href="#"><img src="<?php echo base_url() ?>asisst/web_asset/img/menu/engine.png"> <p>دورات هندسية</p></a></li>
                    <hr>
                    <li><a href="#"><img src="<?php echo base_url() ?>asisst/web_asset/img/menu/idea.png"> <p>دورات ريادة</p></a></li>
                    <hr>
                    <li><a href="#"><img src="<?php echo base_url() ?>asisst/web_asset/img/menu/online-shop.png"> <p>تسويق الكترونى</p></a></li>
                    <hr>
                    <li><a href="#"><img src="<?php echo base_url() ?>asisst/web_asset/img/menu/puzzle.png"> <p>دورات فى الفنون</p></a></li>
                    <hr>
                    <li><a href="#"><img src="<?php echo base_url() ?>asisst/web_asset/img/menu/student.png"> <p>كمبيوتر وانترنت</p></a></li>
                    <hr>
                </ul>
            </div>
        </div>
        <div class="col-sm-10 main">
            <div class="col-sm-4">
                <div class="search">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </div>

            <div class="col-sm-4">
                <select class="">
                    <option>اختر</option>
                    <option>أبجدى</option>
                    <option>أحدث</option>
                    <option>أقدم</option>
                    <option>مدة</option>
                </select>


            </div>

            <div class="col-sm-4">
                <div class="well well-sm">
                    <strong>طريقة العرض</strong>
                    <div class="btn-group">
                        <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
							</span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                                class="glyphicon glyphicon-th"></span>Grid</a>
                    </div>
                </div>
            </div>


            <hr class="col-xs-12" style="border-top: 2px solid #fff;">



            <div id="products" class="row list-group">
                <? if(!empty($get_courses)) :
                    foreach ($get_courses as $record):?>
                <div class="col-md-3 col-sm-6 col-xs-12 item">
                    <a href="#" class="la ">
                        <div class="course">
                            <h1 class="header"></h1>
                            <img src="<?php echo base_url() ?>uploads/images/<? echo $record->sessions_img; ?>" style="width: 200px;height: 200px" class="group list-group-image">
                            <div class="details caption">
                                <a href="#"><?php echo word_limiter($record->sessions_name,4) ?></a><br>
                               <!-- <a href="#" class="category"> <?php echo $get_section['course_name'] ?></a>-->
                               <br>
                              

                                <div class="certificate">
                                    <a> <i class="fa fa-certificate" aria-hidden="true"></i> <?php echo $record->sessions_cost ; ?> ريال </a><br>
                                    <a> <i class="fa fa-certificate" aria-hidden="true"></i>  <?php echo $record->sessions_time ; ?> ساعة  </a>
                                </div>
                                <div class="text-center">
                                    <a href="<?php echo base_url() ?>Coursat/single_course/<? echo $record->sessions_id_pk ;?>/1"><button class="btn btn-info">تفاصيل الكورس</button></a>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>
                   <?   endforeach; endif;?>

            </div> <!--end row-->

        </div>
    </div>

</section>





