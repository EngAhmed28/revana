<h2 class="text-flat">إدارة الرسائل <span class="text-sm"><?php echo $title; ?></span></h2>


<ul class="breadcrumb pb30">


    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الرئيسية</a></li>


    <li><a href="#">إدارة الرسائل</a></li>


    <li class="active"><?php echo $title; ?></li>


</ul>


<div class="col-md-12 col-sm-12 col-xs-12 ">


    <div class="row text-right" >


        


        


        <h2 class="text-right">


            <div class="col-md-3">


            <a  data-toggle="tooltip" data-placement="top" title="التاريخ">:التاريخ</a></div>


            <div class="col-md-8"> <?php echo date("a h:i:s - ",$result['date_s']). date(" y/m/d  ",$result['date']) ?></div>


            


        </h2>


        


        <h2 class="text-right">


<div class="col-md-3">


            <a  data-toggle="tooltip" data-placement="top" title="الإسم">:الإسم</a></div>


            <div class="col-md-8"><?php echo $result['first_name']?> <?php echo $result['second_name']?> </div>


        </h2>


        


        <h2 class="text-right">


<div class="col-md-3">


            <a  data-toggle="tooltip" data-placement="top" title="الإيميل">:الإيميل</a></div>


            <div class="col-md-8"><?php echo $result['email']?> </div>


        </h2>




        <h2 class="text-right">

            <br><br><br><br>

<div class="col-md-3">


            <a  data-toggle="tooltip" data-placement="top" title="عنوان المحتوي">:الموضوع</a></div>


            <div class="col-md-8"> <p> <?php echo $result["content"]?> </p> </div>


        </h2>


        


        </div>


        <br /><hr /><br />

    <br><br><br><br>

    

    


    


</div>





<div class="row  text-center">





<a href="<?php echo base_url().'dashboard/contact'?>" class="btn btn-primary btn-xs col-lg-12"><i class="fa fa-reply"></i> الرجوع للرسائل الواردة</a>


</div>