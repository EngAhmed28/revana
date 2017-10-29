<section class="offers-page">
<div class="container">

    <div class="col-xs-12 r-center-offer">
        <h4>تمتع بأفضل العروض مع معهد بلا حدود</h4>
     
     
  
     
       <?php if(isset($all_offers)&&$all_offers!=null): ?>
       <?php foreach($all_offers as $row): ?>
        <div class="col-md-3 col-sm-6 col-xs-12 r-center-offer-one">
            <div class="sep">
                <div class="imagechange-3d image-hover hover">
                    <div class="imagechange-3d-inner">
                        <div class="imgchange-1">
                            <img src="<?php echo base_url().'uploads/images/'.$row->img ?>" alt=""/>
                            <h3><?php echo $row->title?> </h3>
                            <h5 class="text-center"><?php echo $row->adventage?></h5>
                            
                        </div>
                        <div class="imgchange-2">
                            <h3> <?php echo $row->title?> </h3>
                            <p> <?php echo strip_tags(word_limiter($row->content,5))?> </p>
                            <h4><span> <i class="fa fa-money" aria-hidden="true"></i>
                </span> <?php echo $row->price?> </h4>
                            <h4><span> <i class="fa fa-calendar" aria-hidden="true"></i>
                </span> <?php echo date("Y-m-d",$row->date)?> </h4>

                            <h4><span> <i class="fa fa-clock-o" aria-hidden="true"></i>
                </span> <?php echo $row->hours_number?>   </h4>
                           <a href="<?php  echo base_url().'offers/offer_details/'.$row->id ?>">
                            <button class="btn"  type="submit"> للحجز والاستفسار </button>
                           </a>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach ?>
        <?php else: ?>
<div class="alert alert-danger" >
      لا يوجد عروض مضافة
          </div>
        <?php endif?>



    </div>
</div>
</section>



