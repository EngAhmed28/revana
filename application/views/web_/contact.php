<section class="contact">
    <div class="container">
        <div class="col-xs-12">
            <h2 class="text-center"><span><i class="fa fa-phone" aria-hidden="true"></i>
                                        </span> للتواصل معنا </h2>
            <?php echo form_open('Contact_web',array('class'=>'form-horizontal','id'=>'addgroupform'))?>
            <div class="col-md-8 col-sm-7 wow fadeIn" data-wow-duration="1.5s" style="visibility: visible; animation-duration: 1.5s; animation-name: fadeIn;">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="first_name" id="exampleInputEmail1" placeholder=" الاسم الاول">                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="second_name" id="exampleInputEmail1" placeholder="الاسم الثاني">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="البريد الالكتروني">                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" type="number" name="phone" id="exampleInputEmail1" placeholder=" رقم التليفون">                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group sec">
                        <textarea class="form-control" name="content" placeholder=" أترك رسالتك "></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <input class="btn btn-info" type="submit" name="send" value="إرسل" />
                </div>
            </div>

            <div class="col-md-4 col-sm-5 r-side">
                <div class="col-xs-12  wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="col-xs-2">
                        <img src="<?php echo base_url() ?>asisst/web_asset/img/maps-and-flags.png" alt="" class="contact-img">
                    </div>
                    <div class="col-xs-10">
                        <p> عنوان المدينة
                            <br> اسم الشارع المراد</p>
                    </div>
                </div>
                <div class="col-xs-12 wow fadeInUp" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                    <div class="col-xs-2">
                        <img src="<?php echo base_url() ?>asisst/web_asset/img/mobile-phone.png" alt="" class="contact-img">
                    </div>
                    <div class="col-xs-10">
                        <p class="p-contact"> 0114789161 - 0546584832</p>
                    </div>

                </div>
                <div class="col-xs-12 wow fadeInUp" data-wow-delay="1s" style="visibility: visible; animation-delay: 1s; animation-name: fadeInUp;">
                    <div class="col-xs-2">
                        <img src="<?php echo base_url() ?>asisst/web_asset/img/gmail.png" alt="" class="contact-img">
                    </div>
                    <div class="col-xs-10">
                        <p class="p-contact"> info@beluhodoud.com </p>
                    </div>

                </div>
                <div class="col-xs-12 wow fadeInUp" data-wow-delay="1.5s" style="visibility: visible; animation-delay: 1.5s; animation-name: fadeInUp;">
                    <div class="col-xs-2">
                        <img src="<?php echo base_url() ?>asisst/web_asset/img/facebook.png" alt="" class="contact-img">
                    </div>
                    <div class="col-xs-10">
                        <p class="p-contact">صفحتنا على فيسبوك بلا حدود  </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>