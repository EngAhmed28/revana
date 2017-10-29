



<h2 class="text-flat">إدارة المدربين <span class="text-sm"><?php echo $title; ?></span></h2>



<ul class="breadcrumb pb30">



    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الرئيسية</a></li>







    <li class="active"><?php echo $title; ?></li>



</ul>



<span id="message">



<?php



if(isset($_SESSION['message']))



    echo $_SESSION['message'];



unset($_SESSION['message']);



?>

    </span>



<div class="well bs-component"  ="wait 0s, then enter left and hustle 100%">



    <?php if(isset($result)):?>



        <!-- <form class="form-horizontal">-->

        <?php echo form_open_multipart('dashboard/update_trainers/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>



        <fieldset>



            <legend  ="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>





            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">

                <label for="inputUser" class="col-lg-2 control-label">الاسم :</label>

                <div class="col-lg-10 input-grup">
  
               


                    <input type="text" id="name"  name="name" value="<?php echo $result['name'];?>" class="form-control text-right" placeholder="الاسم" >



                </div>

            </div>







            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">

                <label for="inputUser" class="col-lg-2 control-label">الصورة الشخصية:</label>

                <div class="col-lg-10 input-grup">
              

      <input type="file" id="photo" name="photo" class="form-control text-right"  accept="image/gif, image/jpeg, image/PNG" >

                    <span class="help-block"></span>

                </div>
                
              <center> <img src="<?php echo base_url().'uploads/files/'.$result['img'].'' ?>" width="20%" /> </center> 

            </div>


         <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">

                <label for="inputUser" class="col-lg-2 control-label">الإيميل :</label>

                <div class="col-lg-10 input-grup">

              
     <input type="email" id="email"  name="email" value="<?php echo $result['email'];?>" class="form-control text-right" placeholder="الايميل" >

      

                </div>

            </div>


                <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">

                <label for="inputUser" class="col-lg-2 control-label">رقم الجوال :</label>

                <div class="col-lg-10 input-grup">

              
     <input type="number" id="phone"  name="phone" value="<?php echo $result['phone'];?>" class="form-control text-right" placeholder="رقم الجوال" >

      

                </div>

            </div>

           <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">

                <label for="inputUser" class="col-lg-2 control-label">العنوان :</label>

                <div class="col-lg-10 input-grup">

              
     <input type="text" id="address"  name="address" value="<?php echo $result['address'];?>" class="form-control text-right" placeholder="العنوان" >

      

                </div>

            </div>

            <div id="optionearea1"></div>



            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">

                <label for="inputUser" class="col-lg-2 control-label">السيرة الذاتية</label>

           

                    

                      <div class="col-lg-10 input-grup">

                    <i class="fa fa-newspaper-o"></i>

                    <textarea type="text" id="cv"  name="cv"  class="form-control text-right" placeholder="سيرتك الذاتية">
                    
                  <?php echo $result['cv'];?>
                    </textarea>

                </div>
                </div>

            
     <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">

                <label for="inputUser" class="col-lg-2 control-label">الملف المرفق:</label>

                <div class="col-lg-10 input-grup">
              

      <input type="file" id="attached_file" name="attached_file" class="form-control text-right"  accept="application/pdf" >

                    <span class="help-block"></span>

      <center><a href="<?php echo base_url().'dashboard/downloads/'.$result['pdf'].''?>"><?php echo $result['pdf'];?></a> </center>

                </div>
                

            </div>







            <div class="form-group"  ="wait 0.3s, then enter bottom and hustle 100%">



                <div class="col-xs-10 col-xs-pull-2">



                    <input type="submit" name="update" value="حفظ" class="btn btn-primary" >

                </div>



            </div>



        </fieldset>



        <!-- </form>-->







        <!-- </form>-->



        <?php echo form_close()?>



    <?php else: ?>



        <?php echo form_open_multipart('dashboard/trainers',array('class'=>"form-horizontal",'role'=>"form" ))?>

        <fieldset>



            <legend  ="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>









            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">

                <label for="inputUser" class="col-lg-2 control-label">الاسم :</label>

                <div class="col-lg-10 input-grup">
  
               


                    <input type="text" id="name"  name="name" class="form-control text-right" placeholder="الاسم" required>



                </div>

            </div>







            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">

                <label for="inputUser" class="col-lg-2 control-label">الصورة الشخصية:</label>

                <div class="col-lg-10 input-grup">
              

      <input type="file" id="photo" name="photo" class="form-control text-right" required accept="image/gif, image/jpeg, image/PNG" >

                    <span class="help-block"></span>

                </div>

            </div>


         <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">

                <label for="inputUser" class="col-lg-2 control-label">الإيميل :</label>

                <div class="col-lg-10 input-grup">

              
     <input type="email" id="email"  name="email" class="form-control text-right" placeholder="الايميل" required>

      

                </div>

            </div>


                <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">

                <label for="inputUser" class="col-lg-2 control-label">رقم الجوال :</label>

                <div class="col-lg-10 input-grup">

              
     <input type="number" id="phone"  name="phone" class="form-control text-right" placeholder="رقم الجوال" required>

      

                </div>

            </div>

           <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">

                <label for="inputUser" class="col-lg-2 control-label">العنوان :</label>

                <div class="col-lg-10 input-grup">

              
     <input type="text" id="address"  name="address" class="form-control text-right" placeholder="العنوان" required>

      

                </div>

            </div>

            <div id="optionearea1"></div>



            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">

                <label for="inputUser" class="col-lg-2 control-label">السيرة الذاتية</label>

           

                    

                      <div class="col-lg-10 input-grup">

                    <i class="fa fa-newspaper-o"></i>

                    <textarea type="text" id="cv"  name="cv" class="form-control text-right" placeholder="سيرتك الذاتية"></textarea>

                </div>
                </div>

            
     <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">

                <label for="inputUser" class="col-lg-2 control-label">الملف المرفق:</label>

                <div class="col-lg-10 input-grup">
              

      <input type="file" id="attached_file" name="attached_file" class="form-control text-right" required accept="application/pdf" >

                    <span class="help-block"></span>

                </div>

            </div>








            <div class="form-group"  ="wait 0.3s, then enter bottom and hustle 100%">



                <div class="col-xs-10 col-xs-pull-2">



                    <button type="reset" class="btn btn-default">إبدأ من جديد ؟</button>



                    <input type="submit"  name="add_trainer" value="حفظ" class="btn btn-primary" >

                </div>



            </div>



        </fieldset>



        <!-- </form>-->



        <?php echo form_close()?>



    <?php endif?>

</div>







<?php if(isset($records)&&$records!=null):?>







    <table id="no-more-tables" class="table table-bordered" role="table">



        <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>لوحة التحكم في الإدارة.</p></caption>



        <thead>



        <tr>



            <th width="2%">#</th>



            <th  class="text-right">أسم المدرب</th>

            

            <th  class="text-right">رقم الجوال</th>



        

            <th width="30%" class="text-right">الإجراء</th>

            <th width="30%" class="text-right">التفاصيل</th>
            

            <th width="15%" class="text-right">حالة المدرب</th>

            

   



        </tr>



        </thead>

        <tbody>

        <?php $serial = 0; ?>

        <?php foreach($records as $record):?>

        <?php 

            $serial++; 

            if($record->suspend == 1)

            {

                $class = 'success';

                $title = 'نشط';

            }

            else

            {

                $class = 'danger';

                $title = 'غير نشط';

            }

        ?>

            <tr>

                <td data-title="#"><span class="badge"><?php echo $serial?></span></td>

                <td ><?php echo $record->name?></td>

    

                <td ><?php echo $record->phone?></td>

                <td data-title="التحكم" class="text-center" >

                

                 

                    <a href="<?php echo base_url().'dashboard/update_trainers/'.$record->id?>" class="btn btn-warning btn-xs col-lg-3"><i class="fa fa-pencil"></i> تعديل</a>



                    <a  href="<?php echo base_url().'dashboard/delete_trainer/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   col-lg-3"><i class="fa fa-trash"></i> حذف</a>



                </td>

                <td class="text-center">
                   <button type="button" class="btn btn-info btn-xs col-lg-4" data-toggle="modal" data-target="#myModal<?php echo $record->id?>"><i class="fa fa-list"></i> التفاصيل </button>


                </td>

                <td class="text-center">



                    <a href="<?php echo base_url().'dashboard/suspend_trainer/'.$record->id.'/'.$class?>" class="btn btn-<?php echo $class ?> btn-xs col-lg-6"><?php echo $title ?> </a>



                </td>

                

      



            </tr>

            

            <div class="modal fade" id="myModal<?php echo $record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

 <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="gridSystemModalLabel">بيانات المدرب</h4>

      </div>

      <br />
<div class="modal-body">
  <div class="row">
        <div class="col-sm-4" style="font-size: 16px;"> : إسم المدرب </div>

          <div class="col-sm-8"  style="font-size: 16px;">

            <?php echo $record->name?>

          </div>
          </div>

      <br />
      <div class="row">
     <div class="col-sm-4" style="font-size: 16px;"> : الصورة الشخصية </div>
      <div class="col-sm-8"  style="font-size: 16px;">
        <?php

  $img = base_url('uploads/files').'/'.$record->img;

    echo '

     <img src="'.$img.'" alt="الصورة الشخصية" width="50%">

    ';?>
    </div>
</div>
        <br />
        <div class="row">
        <div class="col-sm-4" style="font-size: 16px;"> : الإيميل </div>

          <div class="col-sm-8"  style="font-size: 16px;">

            <?php echo $record->email?>

          </div>
          </div>
            <br />
        <div class="row">
        <div class="col-sm-4" style="font-size: 16px;"> : رقم الجوال </div>

          <div class="col-sm-8"  style="font-size: 16px;">

            <?php echo $record->phone?>

          </div>
          </div>
      <br />
        <div class="row">
        <div class="col-sm-4" style="font-size: 16px;">  : العنوان</div>

          <div class="col-sm-8"  style="font-size: 16px;">

            <?php echo $record->address?>

          </div>
          </div>
        <br />
        <div class="row">
        <div class="col-sm-4" style="font-size: 16px;"> : السيرة الذاتية </div>

          <div class="col-sm-8"  style="font-size: 16px;">

            <?php echo $record->cv?>

          </div>
          </div>
              <br />
        <div class="row">
        <div class="col-sm-4" style="font-size: 16px;"> : الملف المرفق </div>

          <div class="col-sm-8"  style="font-size: 16px;">

            <a href="<?php echo base_url().'dashboard/downloads/'.$record->pdf.''?>"><?php echo $record->pdf?></a>

          </div>
          </div>
</div>
      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>

      </div>

    </div><!-- /.modal-content -->

  </div><!-- /.modal-dialog -->

</div>



        <?php endforeach ;?>



        </tbody>



    </table>



    <div class="col-xs-12 mt30 text-center">



        <?php echo  $links?>

    </div>



<?php endif;?>



<script>

 function lood(num){

    if(num>0 && num != '')

    {

        var id = num;

        var dataString = 'num=' + id ;

        $.ajax({

            type:'post',

            url: '<?php echo base_url() ?>/dashboard/add_news',

            data:dataString,

            dataType: 'html',

            cache:false,

            success: function(html){

             $("#optionearea1").html(html);

            } 

        });

    

        return false; 

        }

        else

        {

            $("#photo_num").val('');

            $("#optionearea1").html('');

        } 

 }

</script>



<style>

          .carousel-inner > .item > img,

          .carousel-inner > .item > a > img {

              width: 70%;

              margin: auto;

          }

</style>