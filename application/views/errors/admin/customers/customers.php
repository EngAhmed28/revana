
<h2 class="text-flat">إدارة العملاء. <span class="text-sm"><?php echo $title; ?></span></h2>

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
<div class="well bs-component" >
    <?php if(isset($result)):?>
        <!-- <form class="form-horizontal">-->
        <?php echo form_open_multipart('dashboard/update_customers/'.$result['cust_id'],array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>
            <legend><?php echo $title; ?></legend>


            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">اسم المؤسسة و نشاطها:</label>
                <div class="col-lg-10 input-grup">
                    <input type="text" id="comp_name"  name="comp_name" class="form-control text-right" value="<?php echo $result['comp_name']; ?> " required>
                </div>
            </div>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">اسم العميل:</label>
                <div class="col-lg-10 input-grup">
                    <input type="text" id="cust_name"  name="cust_name" value="<?php echo $result['cust_name'] ?>" class="form-control text-right" placeholder="اسم العميل" required>
                </div>
            </div>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">حجم المؤسسة:</label>
                <div class="col-lg-10 input-grup">
        <?php if($result['cust_size']==1): ?>
                    صغير   <input type="radio" name="cust_size" value="1" checked>
                    متوسط      <input type="radio" name="cust_size" value="2">
                    كبير        <input type="radio" name="cust_size" value="3">

    <?php elseif( $result['cust_size']==2): ?>
        صغير   <input type="radio" name="cust_size" value="1" >
        متوسط      <input type="radio" name="cust_size" value="2" checked>
        كبير        <input type="radio" name="cust_size" value="3">
     <?php else: ?>
        صغير   <input type="radio" name="cust_size" value="1" >
        متوسط      <input type="radio" name="cust_size" value="2" >
        كبير        <input type="radio" name="cust_size" value="3" checked>
    <?php endif; ?>
                </div>
            </div>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">جدية العميل :</label>
                <div class="col-lg-10 input-grup">
                    <?php if($result['cust_seri']==1): ?>
                    جاد   <input type="radio" name="cust_seri" value="1" checked>
                    غير جاد       <input type="radio" name="cust_seri" value="2">
                    غير متأكد        <input type="radio" name="cust_seri" value="3">
                    <?php elseif( $result['cust_seri']==2): ?>
                    جاد   <input type="radio" name="cust_seri" value="1">
                    غير جاد       <input type="radio" name="cust_seri" value="2" checked>
                    غير متأكد        <input type="radio" name="cust_seri" value="3">
                    <?php else: ?>

                        جاد   <input type="radio" name="cust_seri" value="1">
                        غير جاد       <input type="radio" name="cust_seri" value="2">
                        غير متأكد        <input type="radio" name="cust_seri" value="3" checked>
                    <?php endif; ?>

                </div>
            </div>

            <div class="form-group" >
                <label for="select" class="col-lg-2 control-label">حالة العميل</label>
                <div class="col-lg-10">
                    <select id="cust_status" name="cust_status" class="form-control" required>
                        <?php if($result['cust_status']==1){ ?>
                        <option value="1" selected>جارى التعامل معه</option>
                        <option value="0">تم انهاء التعامل معه</option>
                            <?php }else{ ?>
                                <option value="0" selected>تم انهاء التعامل معه</option>
                            <option value="1" >جارى التعامل معه</option>

                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">رقم تليفون العميل:</label>
                <div class="col-lg-10 input-grup">
                    <input type="number" id="cust_tele"  name="cust_tele" value="<?php echo $result['cust_tele'] ?>" class="form-control text-right" placeholder="رقم العميل" required>
                </div>
            </div>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">عنوان العميل:</label>
                <div class="col-lg-10 input-grup">
                    <input type="text" id="cust_address"  name="cust_address" value="<?php echo $result['cust_address'] ?>" class="form-control text-right" placeholder="عنوان العميل" required>
                </div>
            </div>
            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">اقسام الشركه:</label>
                <div class="col-lg-10 input-grup">
                    <?php

                    $f=array('','برمجة','تسويق الكترونى','فهرسة','كاميرات');

                    foreach ($res as $r):
                    $arr[]=$r->cust_depart_id;
                    endforeach;

        for($a=1;$a<sizeof($f);$a++){
                    $selected="";if(in_array($a,$arr)){$selected='checked';}?>
 <?php echo $f[$a]; ?>   <input type="checkbox" name="cust_depart_id[]" value="<?php echo $a ?>" <?php echo $selected ?> > <br>

                   <?php } ?>
                </div>
            </div>


            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">التفاصيل:</label>
                <div class="col-lg-10 input-grup">
                    <textarea  id="cust_details"  name="cust_details" class="form-control text-right" placeholder="التفاصيل" required><?php echo $result['cust_details'] ?></textarea>
                </div>
            </div>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">الصورة:</label>
                <div class="col-lg-10 input-grup">
                    <img src="<?php echo base_url()  ?>uploads/images/<?php echo $result['image']?>" height="200px" width="200px">
                    <input type="file" id="image" name="image" class="form-control text-right">
                    <span class="help-block"></span>
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
        <?php echo form_open_multipart('dashboard/add_customers',array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>
            <legend><?php echo $title; ?></legend>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">اسم المؤسسة و نشاطها:</label>
                <div class="col-lg-10 input-grup">
                    <input type="text" id="comp_name"  name="comp_name" class="form-control text-right"  placeholder="اسم المؤسسة و نشاطها" required>
                </div>
            </div>


            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">اسم العميل:</label>
                <div class="col-lg-10 input-grup">
                    <input type="text" id="cust_name"  name="cust_name" class="form-control text-right" placeholder="اسم العميل" required>
                </div>
            </div>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">الصورة/اللوجو:</label>
                <div class="col-lg-10 input-grup">
                    <input type="file" id="image" name="image" class="form-control text-right" required>
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">حجم المؤسسة:</label>
                <div class="col-lg-10 input-grup">

                 صغير   <input type="radio" name="cust_size" value="1">
              متوسط      <input type="radio" name="cust_size" value="2">
            كبير        <input type="radio" name="cust_size" value="3">
                </div>
            </div>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">جدية العميل :</label>
                <div class="col-lg-10 input-grup">

                    جاد   <input type="radio" name="cust_seri" value="1">
                    غير جاد       <input type="radio" name="cust_seri" value="2">
                    غير متأكد        <input type="radio" name="cust_seri" value="3">
                </div>
            </div>

            <div class="form-group" >
                <label for="select" class="col-lg-2 control-label">حالة العميل</label>
                <div class="col-lg-10">
                    <select id="cust_status" name="cust_status" class="form-control" required>
                        <option value="">اختر حالة العميل</option>
                        <option value="1">جارى التعامل معه</option>
                        <option value="0">تم انهاء التعامل معه</option>
                    </select>
                </div>
            </div>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">رقم تليفون العميل:</label>
                <div class="col-lg-10 input-grup">
                    <input type="number" id="cust_tele"  name="cust_tele" class="form-control text-right" placeholder="رقم العميل" required>
                </div>
            </div>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">عنوان العميل:</label>
                <div class="col-lg-10 input-grup">
                    <input type="text" id="cust_address"  name="cust_address" class="form-control text-right" placeholder="عنوان العميل" required>
                </div>
            </div>
            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">اقسام الشركه:</label>
                <div class="col-lg-10 input-grup">
                    برمجة <input type="checkbox" name="cust_depart_id[]" value="1"><br>
            تسويق الكترونى <input type="checkbox" name="cust_depart_id[]" value="2"><br>
                    فهرسة <input type="checkbox" name="cust_depart_id[]" value="3"><br>
                    كاميرات <input type="checkbox" name="cust_depart_id[]" value="4"><br>

                </div>



            </div>


            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">التفاصيل:</label>
                <div class="col-lg-10 input-grup">
                    <textarea  id="cust_details"  name="cust_details" class="form-control text-right" placeholder="التفاصيل" required></textarea>
                </div>
            </div>
            


            <div class="form-group" >
                <div class="col-xs-10 col-xs-pull-2">
                    <button type="reset" class="btn btn-default">إبدأ من جديد ؟</button>
                    <input type="submit"  name="add" value="حفظ" class="btn btn-primary" >
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
            <th  class="text-right">اسم العميل</th>
            <th width="30%" class="text-right">التحكم</th>

        </tr>

        </thead>
        <tbody>
        <?php $serial = 0; ?>
        <?php foreach($records as $record):?>
            <?php
            $serial++;
            ?>
            <tr>
                <td data-title="#"><span class="badge"><?php echo $serial?></span></td>
                <td ><?php echo $record->cust_name?></td>

                <td data-title="التحكم" class="text-center">
                    <a href="<?php echo base_url().'dashboard/update_customers/'.$record->cust_id?>" class="btn btn-warning btn-xs col-lg-3"><i class="fa fa-pencil"></i> تعديل</a>
                    <a  href="<?php echo base_url().'dashboard/delete_customers/'.$record->cust_id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   col-lg-3"><i class="fa fa-trash"></i> حذف</a>
                </td>

            </tr>
        <?php endforeach ;?>
        </tbody>
    </table>


<?php endif;?>

