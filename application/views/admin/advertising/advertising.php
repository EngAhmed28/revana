

<h2 class="text-flat">إدارة الإعلانات الخارجية<span class="text-sm"><?php echo $title; ?></span></h2>

<ul class="breadcrumb pb30">

    <li><a href="#"><i class="fa fa-home"></i> الرئيسية</a></li>



    <li class="active"><?php echo $title; ?></li>

</ul>

<span id="message">

<?php

if(isset($_SESSION['message']))

    echo $_SESSION['message'];

unset($_SESSION['message']);

?>
    </span>

<div class="well bs-component"   >

    <?php if(isset($result)):?>

        <?php echo form_open_multipart('dashboard/updateadver/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>

        <fieldset>

            <legend   ><?php echo $title; ?></legend>

<div class="form-group"    >
            <label for="inputUser" class="col-lg-2 control-label">صورة الإعلان</label>

            <div class="col-lg-10 input-grup">

                <input type="file" name="image" class="form-control text-right" placeholder="صورة الإعلان">

                  <span class="help-block">لعدم تغيير الصورة  لا تختار اى شىء </span>

              </div>

            <div class="col-md-3 col-sm-6 col-xs-12"    >

                <div class="imgContent">

                    <img src="<?php echo base_url('uploads/thumbs/'.$result['image'])?>" alt="صورة الإعلان" class="img-rounded" width="10" height="10">

                    <span class="title">صورة الإعلان</span>

                </div>

            </div>
</div>
            <div class="form-group" >
                <label for="select" class="col-lg-2 control-label">عرض الإعلان</label>
                <div class="col-lg-10">
                    <select id="view" name="view" class="form-control">

                 <?php
                            if($result['view_id'] ==1){
                   echo'  
                          <option value="1">يمين الصفحة</option>
                          <option value="2">يسار الصفحة</option>
                          <option value="3">أعلى الصفحة</option>
                          <option value="4">إعلان داخلي</option>
                          <option value="5">يسار أعلي(slider)</option>
                          <option value="6">يسار أسفل(slider)</option>';

   }elseif($result['view_id'] ==2){
                      echo'                       
                          <option value="2">يسار الصفحة</option>
                          <option value="3">أعلى الصفحة</option>
                          <option value="4">إعلان داخلي</option>
                          <option value="5">يسار أعلي(slider)</option>
                          <option value="6">يسار أسفل(slider)</option>
                          <option value="1">يمين الصفحة</option>';


   }elseif($result['view_id'] ==3){
           echo'         <option value="3">أعلى الصفحة</option>
                          <option value="4">إعلان داخلي</option>
                          <option value="5">يسار أعلي(slider)</option>
                          <option value="6">يسار أسفل(slider)</option>
                          <option value="1">يمين الصفحة</option>
                          <option value="2">يسار الصفحة</option>';

   }elseif($result['view_id'] ==4){
           echo'          <option value="4">إعلان داخلي</option>
                          <option value="5">يسار أعلي(slider)</option>
                          <option value="6">يسار أسفل(slider)</option>
                          <option value="1">يمين الصفحة</option>
                          <option value="2">يسار الصفحة</option>
                          <option value="3">أعلى الصفحة</option>';


   }elseif($result['view_id'] ==5){
                  echo'         
                          <option value="5">يسار أعلي(slider)</option>
                          <option value="6">يسار أسفل(slider)</option>
                          <option value="1">يمين الصفحة</option>
                          <option value="2">يسار الصفحة</option>
                          <option value="3">أعلى الصفحة</option>
                           <option value="4">إعلان داخلي</option>';



   }elseif($result['view_id'] ==6){

                         echo'         
                          <option value="6">يسار أسفل(slider)</option>
                          <option value="1">يمين الصفحة</option>
                          <option value="2">يسار الصفحة</option>
                          <option value="3">أعلى الصفحة</option>
                           <option value="4">إعلان داخلي</option>
                            <option value="5">يسار أعلي(slider)</option>';

   }else{
       echo' <option value="0">إختر العرض</option>
                          <option value="1">يمين الصفحة</option>
                          <option value="2">يسار الصفحة</option>
                          <option value="3">أعلى الصفحة</option>
                          <option value="4">إعلان داخلي</option>
                          <option value="5">يسار أعلي(slider)</option>
                          <option value="6">يسار أسفل(slider)</option>';

   }
          ?>
                    </select>
                </div>
            </div>
             <div class="form-group " >
             <div class="col-lg-12 input-grup" >
                 <label for="inputUser" class="col-lg-2 control-label">مدة الإعلان:</label>
            <div class="col-lg-1 input-grup">
                 <label for="inputUser" class=" control-label">من</label>
            </div>
            <div class="col-lg-3 input-grup">
         <input type="date" id="from"  name="from"  value="<?php echo date("Y-m-d",$result['from']); ?>" class="form-control text-right" placeholder="" required="required" />

            </div>
            <div class="col-lg-1 input-grup">
                 <label for="inputUser" class=" control-label">إلي</label>
            </div>
            <div class="col-lg-3 input-grup">
                <input type="date" id="to"  name="to" value="<?php echo date("Y-m-d",$result['to']); ?>"  class="form-control text-right" placeholder="" required="required" />
            </div>
            </div>
        </div>
            <div class="form-group"    >

                <div class="col-xs-10 col-xs-pull-2">

                    <input type="submit" name="update_adver" value="حفظ" class="btn btn-primary" >
                </div>

            </div>

        </fieldset>


        <?php echo form_close()?>

    <?php else: ?>

        <?php echo form_open_multipart('dashboard/addadver',array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>

            <legend   ><?php echo $title; ?></legend>
           <div class="form-group"   >
            <label for="inputUser" class="col-lg-2 control-label">صورة الإعلان</label>
            <div class="col-lg-10 input-grup">
                <input type="file" name="img" class="form-control text-right" placeholder="صورة الإعلان" required>
            </div>
           </div>
            <div class="form-group" >
                <label for="select" class="col-lg-2 control-label">عرض الإعلان</label>
                <div class="col-lg-10">
                    <select id="view" name="view" class="form-control">
                          <option value="0">إختر العرض</option>
                          <option value="1">يمين الصفحة</option>
                          <option value="2">يسار الصفحة</option>
                          <option value="3">أعلى الصفحة</option>
                          <option value="4">إعلان داخلي</option>
                          <option value="5">يسار أعلي(slider)</option>
                          <option value="6">يسار أسفل(slider)</option>
                    </select>
                </div>
            </div>
          <div class="form-group " >

             <div class="col-lg-12 input-grup" >
                 <label for="inputUser" class="col-lg-2 control-label">مدة الإعلان:</label>
            <div class="col-lg-1 input-grup">
                 <label for="inputUser" class=" control-label">من</label>
            </div>
            <div class="col-lg-3 input-grup">
                <input type="date" id="from"  name="from" class="form-control text-right" placeholder="من" required>
            </div>
            <div class="col-lg-1 input-grup">
                 <label for="inputUser" class=" control-label">إلي</label>
            </div>
            <div class="col-lg-3 input-grup">
                <input type="date" id="to"  name="to" class="form-control text-right" placeholder="إلي" required>
            </div>
            </div>
        </div>

            <div class="form-group"    >

                <div class="col-xs-10 col-xs-pull-2">

                    <button type="reset" class="btn btn-default">أبدء من جديد ؟</button>

                    <input type="submit"  name="add_adver" value="حفظ" class="btn btn-primary" >
                </div>

            </div>

        </fieldset>


        <!-- </form>-->

        <?php echo form_close()?>

    <?php endif?>
</div>


<?php if(isset($array_tables)&&$array_tables!=null):?>

<table id="sample_1" class="table table-bordered table-hover table-striped" cellspacing="0"  width="99%" style="margin-right: 6px; direction:rtl;">
<thead>
<tr>
<th width="2%">#</th>

            <th  width="20%" class="text-right">مكان الإعلان</th>
             <th width="10%" class="text-right">من تاريخ</th>
             <th width="10%" class="text-right">إلي تاريخ</th>
             <th width="20%" class="text-right">الإجراء</th>
               <th width="10%" class="text-right">التفاصيل</th>

</tr>
</thead>
<tbody>
<?php
$v=1;
  foreach($array_tables as  $key=>$value):
     if($key == 1){
        $title ='يمين الصفحة';
     }elseif($key ==2){
         $title='يسار الصفحة';
     }elseif($key ==3){
         $title='أعلى الصفحة';
     }elseif($key ==4){
         $title='إعلان داخلي';
     }elseif($key ==5){
         $title='يسار أعلي(slider)';
     } elseif($key ==6){
         $title='يسار أسفل(slider)';
     }



 ?>
 <tr>
     <td rowspan="<?php echo sizeof($array_tables[$key])?>"><?php echo $v;$v++ ?></td>
     <td rowspan="<?php echo sizeof($array_tables[$key])?>" data-toggle="modal" data-target="#myModal"><?php echo $title ;?></td>

 <?php foreach($array_tables[$key] as  $keys=>$value): ?>

<?php  if (sizeof($array_tables[$key])!= 0):

    $from =  date("Y-m-d", $value->from);
        $to =  date("Y-m-d", $value->to);

    ?>


         <td> <?php echo $from ?></td>
         <td> <?php echo  $to ?></td>
          <td data-title="التحكم" class="text-center">
                    <a href="<?php echo base_url().'dashboard/updateadver/'.$value->id?>" class="btn btn-warning btn-xs col-lg-5"><i class="fa fa-pencil"></i> تعديل</a>

                    <a  href="<?php echo base_url().'dashboard/deleteadver/'.$value->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   col-lg-5"><i class="fa fa-trash"></i> حذف</a>

                </td>
                <td >
                    <button type="button" class="btn btn-info btn-xs " data-toggle="modal" data-target="#myModal<?php echo $value->id?>"><i class="fa fa-list"></i> التفاصيل </button>
              </td>
  </tr>
<div class="modal fade" id="myModal<?php echo $value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <div class="modal-dialog" role="document">
    <div class="modal-content">



        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>


        <h4 class="modal-title" id="gridSystemModalLabel"></h4>

        <div class="modal-footer"><img src="<?php echo base_url('uploads/images/'.$value->image)?>" alt="<?php echo base_url('uploads/images/'.$value->image)?>" style="margin-right:50px;" width="400" height="200" ></div>


      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<?php  endif; ?>

 <?php
 endforeach;?>

<?php  endforeach ; ?>
</tbody></table>
    <div class="col-xs-12 mt30 text-center">
<?php echo  $links?>
    </div>

<?php endif;?>
