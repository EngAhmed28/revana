
<h2 class="text-flat">إدارة البيانات الأساسية<span class="text-sm"><?php echo $title; ?></span></h2>

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


    <?php if(isset($result)): ?>
        <div class="well bs-component">


    <?php echo form_open_multipart('dashboard/update_said/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>
    <fieldset>

        <legend ><?php echo $title; ?></legend>

        <div  class="form-group" >
            <label for="inputUser" class="col-lg-2 control-label">اسم العميل:</label>
            <div class="col-lg-10 input-grup">
                <select  name="cust_id_fk" class="form-control">
                    <option value="<?php echo $result['cust_id_fk']?>" ><?php echo $result['cust_name']?>  </option>

                    <?php
                    foreach($customers as $customer):

                        if(in_array($customer->cust_id,$sheckeds)){

                            continue;
                        }
                        ?>
                        <?php  if($customer->cust_id == $result['cust_id_fk']){$selected="selected";}else{$selected=""; }?>

                        <option value="<?php echo $customer->cust_id?>" <?php echo $selected; ?>><?php echo $customer->cust_name?>  </option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>

        <div class="form-group"  >


            <label for="inputUser" class="col-lg-2 control-label">عنوان الكلمة:</label>
            <div class="col-lg-10 input-grup">
                <input type="text" id="title"  name="title" class="form-control text-right" value="<?php echo $result['title']; ?>" placeholder="عنوان الكلمة" required>
            </div>
        </div>



        <div class="form-group"  >
            <label for="inputUser" class="col-lg-2 control-label">نبذة مختصرة:</label>
            <div class="col-lg-10 input-grup">
                <i class="fa fa-newspaper-o"></i>
                <textarea type="text" id="content"  name="content" class="form-control text-right" placeholder="نبذة مختصرة" ><?php echo $result['content']; ?></textarea>
            </div>
        </div>


        <div class="col-xs-10 col-xs-pull-2">


            <?php echo'  <input type="submit"  name="update" value="حفظ" class="btn btn-primary" />';?>
        </div>



</div>







</fieldset>


<!-- </form>-->

<?php echo form_close()?>




<?php else: ?>

    <?php echo form_open_multipart('dashboard/add_said',array('class'=>"form-horizontal",'role'=>"form" ))?>
    <fieldset>

        <legend ><?php echo $title; ?></legend>

        <div  class="form-group" >
            <label for="inputUser" class="col-lg-2 control-label">اسم العميل:</label>
            <div class="col-lg-10 input-grup">
                <select  name="cust_id_fk" class="form-control">
                    <option >اختر اسم العميل</option>

                    <?php
                    foreach($customers as $customer):
                        if(in_array($customer->cust_id,$sheckeds)){

                            continue;
                        }
                        ?>
                        <option value="<?php echo $customer->cust_id?>"><?php echo $customer->cust_name?>  </option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>

        <div class="form-group"  >


            <label for="inputUser" class="col-lg-2 control-label">عنوان الكلمة:</label>
            <div class="col-lg-10 input-grup">
                <input type="text" id="title"  name="title" class="form-control text-right" placeholder="عنوان الكلمة" required>
            </div>
        </div>


        <div class="form-group"  >
            <label for="inputUser" class="col-lg-2 control-label">نبذة مختصرة:</label>
            <div class="col-lg-10 input-grup">
                <i class="fa fa-newspaper-o"></i>
                <textarea type="text" id="content"  name="content" class="form-control text-right" placeholder="نبذة مختصرة" ></textarea>
            </div>
        </div>


        <div class="col-xs-10 col-xs-pull-2">

            <button type="reset" class="btn btn-default">أبدء من جديد ؟</button>

            <input type="submit"  name="add" value="حفظ" class="btn btn-primary" >
        </div>




    </fieldset>


    <!-- </form>-->

    <?php echo form_close()?>
<?php endif?>


<?php if(isset($records)&&$records!=null):?>


    <table id="no-more-tables" class="table table-bordered" role="table">

        <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>لوحة التحكم فى الادارة.</p></caption>

        <thead>

        <tr>

            <th  class="text-right">عنوان الموضوع</th>

            <th width="20%" class="text-right">التحكم</th>
            <th width="20%" class="text-right">التفاصيل</th>

        </tr>

        </thead>
        <tbody>
        <?php foreach($records as $record):?>
            <tr>
                <td data-title=""><?php echo word_limiter($record->title,10)?> </td>

                <td data-title="التحكم" class="text-center">


                    <a  href="<?php echo base_url().'dashboard/delete_said/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   col-lg-5"><i class="fa fa-trash"></i> حذف</a>

                    <a href="<?php echo base_url().'dashboard/update_said/'.$record->id?>" class="btn btn-warning btn-xs col-lg-5"><i class="fa fa-pencil"></i> تعديل</a>

                </td>

                <td>                    <button type="button" class="btn btn-info btn-xs col-lg-5" data-toggle="modal" data-target="#myModal<?php echo $record->id ?>"><i class="fa fa-list"></i> عرض </button>
                </td>

            </tr>


            <div class="modal fade" id="myModal<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                <div class="modal-dialog" role="document">

                    <div class="modal-content" style="width:550px">

                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                            <h4 class="modal-title">تفاصيل طالب المساعدة</h4>

                        </div>
                        <div class="row" style="margin-right:10px">

                            <div >
                                <h5>اسم العميل:</h5>
                            </div>

                            <div >

                               <?php echo $record->cust_name?>
                            </div>

                            <div >
                                <h5>عنوان الموضوع:</h5>
                            </div>
                            <div >
                              <?php echo $record->title ?>
                            </div>

                            <div >
                                <h5>تفاصيل الموضوع:</h5>
                            </div>
                            <div>
                            <?php echo $record->content ?>
                            </div>


                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                        </div>

                    </div>

                </div>

            </div>

        <?php endforeach ;?>

        </tbody>

    </table>



<?php endif?>


