
<body id="page-top" data-spy="scroll" data-target="" class="flexcroll">

<?php if(isset($one_offer)&&$one_offer!=null):?>
    <div class="r-details">
        <div class="container">
            <div class="col-xs-12">
                <h3> تفاصيل عن  <?php echo $one_offer['title']?></h3>
                <div class="col-sm-8">
                    <div class="col-xs-12">
                        <h3> يتم تحديد الميعاد فور اكتمال العدد !</h3>
                    </div>
                    <div class="col-xs-12 r-second">
                        <div class="col-sm-4">
                            <span><i class="fa fa-money" aria-hidden="true"></i></span> <?php echo $one_offer['price']?> ريال سعودى 
                        </div>
                        <div class="col-sm-4">
                            <span><i class="fa  fa-calendar" aria-hidden="true"></i></span> <?php echo $one_offer['hours_number']?> ساعة 
                        </div>
                        <div class="col-sm-4">
                            <span><i class="fa fa-bookmark" aria-hidden="true"></i></span> باللغة العربية
                        </div>

                    </div>
                    
                    <a href="<?php echo base_url().'Reserve/course_reserve'?>">
                    
                     <button class="btn pull-right"> 
                      <span><i class="fa fa-angle-double-left" aria-hidden="true"></i></span> تسجيل <span>
                      <i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                      </button>
                    </a>
                    
                    
                     
                    
                    
                    <div class="col-xs-12 r-three">
                        <h3> ميزات عن <?php echo $one_offer['title'] ?></h3>
                        <p> <?php echo $one_offer['adventage']; ?></p>
                        <h3> تفاصيل عرض  <?php echo $one_offer['title'] ?></h3>
                        <p> <?php echo ($one_offer['content']); ?></p>
                      
                      
                    </div>

                </div>
                <div class="col-sm-4 r-image">
                    <img src="<?php echo base_url().'uploads/images/'.$one_offer["img"] ?>" alt="" class="center-block">
                </div>
            </div>
        </div>
    </div>
    <?php else:?>
    <div class="alert alert-danger" >
     خطأ فى  العرض
          </div>
<?php endif;?>
</body>
