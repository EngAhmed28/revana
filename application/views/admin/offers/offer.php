<h2 class="text-flat">إدارة العروض <span class="text-sm"><?php echo $title; ?></span></h2>
<ul class="breadcrumb pb30">
    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الرئيسية</a></li>
    <li class="active"><?php echo $title; ?></li>
</ul>
<span id="message">
<?php
if(isset($_SESSION['message']))echo $_SESSION['message']; unset($_SESSION['message']);
?>
</span>
<div class="well bs-component" >

<?php if(isset($result)):?>

    <!-- <form class="form-horizontal">-->
    <?php echo form_open_multipart('dashboard/updateoffer/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>

    <fieldset>
        <legend ><?php echo $title; ?></legend>
        <div class="form-group" >
        <label for="inputUser" class="col-lg-2 control-label">عنوان العرض:</label>
        <div class="col-lg-10 input-grup">
            <i class="fa fa-newspaper-o"></i>

            <input type="text" id="title"  value="<?php echo $result['title']; ?>" name="title" class="form-control text-right" placeholder="   عنوان العرض">

        </div>
        </div>


        <div class="form-group" >
        <label for="inputUser" class="col-lg-2 control-label">صورة العرض:</label>
        <div class="col-lg-10 input-grup">
            <!--i class="fa fa-newspaper-o"></i-->

            <input type="file" id="img" name="img" class="form-control text-right">
            <span class="help-block"></span>

        </div>
        </div>
        <?php if($result['img'] == null){
            ?>
            <?php

        }else{?>
            <div class="form-group" >
            <label for="inputUser" class="col-lg-2 control-label"></label>
            <div class="col-lg-10 input-grup">

                <img src="<?php 
				echo base_url('uploads/images/'.$result['img'].''); ?>" height="200px" width="200px">
                <span class="help-block"></span>

            </div>
            </div>
        <?}?>


   <div class="form-group" >
        <label for="inputUser" class="col-lg-2 control-label">ميزة العرض:</label>
        <div class="col-lg-10 input-grup">
            <i class="fa fa-newspaper-o"></i>

            <input type="text" id="adventage"  value="<?php echo $result['adventage']; ?>" name="adventage" class="form-control text-right" placeholder=" ميزة العرض">

        </div>
        </div>
    <!------------------------------------------------------------- -->
            <div class="form-group" >
        <label for="inputUser" class="col-lg-2 control-label">سعر العرض </label>
        <div class="col-lg-10 input-grup">
            <i class="fa fa-newspaper-o"></i>
            <input type="text" id="price"  name="price"  value="<?php echo $result['price']; ?>" class="form-control text-right" placeholder="سعر العرض "  required="required" />
        </div>
        </div>
            <div class="form-group" >
        <label for="inputUser" class="col-lg-2 control-label">عدد الساعات</label>
        <div class="col-lg-10 input-grup">
            <i class="fa fa-newspaper-o"></i>
            <input type="text" id="hours_number"  name="hours_number" value="<?php echo $result['hours_number']; ?>" class="form-control text-right" placeholder="عدد الساعات" required>
        </div>
        </div>
        <!------------------------------------------------------------- -->



        <div class="form-group" >
        <label for="inputUser" class="col-lg-2 control-label">تفاصيل العرض:</label>
        <div class="col-lg-10 input-grup">
            <i class="fa fa-newspaper-o"></i>
            <textarea  id="content"  name="content" class="form-control text-right" placeholder="   تفاصيل العرض" ><?php echo $result['content']; ?></textarea>
        </div>
        </div>


        <div class="form-group" >
        <div class="col-xs-10 col-xs-pull-2">
            <input type="submit" name="update" value="حفظ" class="btn btn-primary" >
        </div>
        </div>
    </fieldset>
    <!-- </form>-->
    <!-- </form>-->

    <?php echo form_close()?>
<?php else: ?>

    <?php echo form_open_multipart('dashboard/addoffer',array('class'=>"form-horizontal",'role'=>"form" ))?>
    <fieldset>
        <legend ><?php echo $title; ?></legend>
        <div class="form-group" >
        <label for="inputUser" class="col-lg-2 control-label">عنوان العرض:</label>
        <div class="col-lg-10 input-grup">
            <i class="fa fa-newspaper-o"></i>
            <input type="text" id="title"  name="title" class="form-control text-right" placeholder="   عنوان العرض" required>
        </div>
        </div>

        <div class="form-group" >
        <label for="inputUser" class="col-lg-2 control-label">صورة العرض:</label>
        <div class="col-lg-10 input-grup">
            <!--i class="fa fa-newspaper-o"></i-->
            <input type="file" id="img" name="img" class="form-control text-right" required>
            <span class="help-block"></span>
        </div>
        </div>
        
            <div class="form-group" >
        <label for="inputUser" class="col-lg-2 control-label">ميزة العرض</label>
        <div class="col-lg-10 input-grup">
            <i class="fa fa-newspaper-o"></i>
            <input type="text" id="adventage"  name="adventage" class="form-control text-right" placeholder="   ميزة العرض" required>
        </div>
        </div>
        <!------------------------------------------------------------- -->
            <div class="form-group" >
        <label for="inputUser" class="col-lg-2 control-label">سعر العرض </label>
        <div class="col-lg-10 input-grup">
            <i class="fa fa-newspaper-o"></i>
            <input type="text" id="price"  name="price" class="form-control text-right" placeholder="سعر العرض "  required="required" />
        </div>
        </div>
            <div class="form-group" >
        <label for="inputUser" class="col-lg-2 control-label">عدد الساعات</label>
        <div class="col-lg-10 input-grup">
            <i class="fa fa-newspaper-o"></i>
            <input type="text" id="hours_number"  name="hours_number" class="form-control text-right" placeholder="عدد الساعات" required>
        </div>
        </div>
        <!------------------------------------------------------------- -->
        <div class="form-group" >
        <label for="inputUser" class="col-lg-2 control-label">تفاصيل العرض:</label>
        <div class="col-lg-10 input-grup">
            <i class="fa fa-newspaper-o"></i>
            <textarea id="content"  name="content" class="form-control text-right" required="required"></textarea>
        </div>
        </div>
        <div class="form-group" >
        <div class="col-xs-10 col-xs-pull-2">
            <button type="reset" class="btn btn-default">أبدء من جديد ؟</button>
            <input type="submit"  name="add_offer" value="حفظ" class="btn btn-primary" />
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
            <th  class="text-right">عنوان العرض</th>
            <th class="text-right">تاريخ الإضافة</th>
            <th width="20%" class="text-right">التحكم</th>
            <th class="text-right">حالة العرض</th>
            <th class="text-right">تفاصيل العرض</th>
        </tr>
        </thead>
        <tbody>
        <?php $x = 0; ?>
        <?php foreach($records as $record):?>
            <?php
            $x++;
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
                <td data-title="#"><span class="badge"><?php echo $x?></span></td>
                <td data-title="عنوان العرض"><?php echo $record->title?> </td>
                <td  data-title="تاريخ الإضافة"><?php echo date('Y/m/d',$record->date)?></td>

                <td data-title="التحكم" class="text-center">

                    <a href="<?php echo base_url().'dashboard/updateoffer/'.$record->id?>" class="btn btn-warning btn-xs col-lg-5"><i class="fa fa-pencil"></i> تعديل</a>

                    <a  href="<?php echo base_url().'dashboard/deleteoffer/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   col-lg-5"><i class="fa fa-trash"></i> حذف</a>

                </td>

                <td data-title="حالة العرض" class="text-center">

                    <a href="<?php echo base_url().'dashboard/suspendoffer/'.$record->id.'/'.$class?>" class="btn btn-<?php echo $class ?> btn-xs col-lg-5"><?php echo $title ?> </a>

                </td>
                <td >
                    <button type="button" class="btn btn-info btn-xs " data-toggle="modal" data-target="#myModal<?php echo $record->id?>"><i class="fa fa-list"></i> التفاصيل </button>
                </td>
            </tr>
            <div class="modal fade" id="myModal<?php echo $record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">



                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>


                        <h4 class="modal-title" id="gridSystemModalLabel"> تاريخ العرض <?php echo date('Y-m-d', $record->date) ?></h4>

                        <div class="modal-footer">
                            <label>عنوان العرض</label>
                            <p><?php echo $record->title ?> </p>
                        </div>

                       
                        
                        
                           <div class="modal-footer">
                            <label>سعر العرض</label>
                            <p><?php echo $record->price ?> </p>
                        </div>
                        
                           <div class="modal-footer">
                            <label>عدد الساعات</label>
                            <p><?php echo $record->hours_number ?> </p>
                        </div>
                           <div class="modal-footer">
                            <label>ميزة العرض</label>
                            <p><?php echo $record->adventage ?> </p>
                        </div>
                        
                        <div class="modal-footer">
                            <label>تفاصيل العرض</label>
                            <p><?php echo $record->content ?> </p>
                        </div>

 <div class="modal-footer">
                            <img src="<?php echo base_url('uploads/images/'.$record->img)?>" alt="<?php echo base_url('uploads/images/'.$record->img)?>" style="margin-right:50px;" width="400" height="200" >
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



<?php endif;?>
