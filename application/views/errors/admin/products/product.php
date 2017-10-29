

<h2 class="text-flat">إدارة البيانات الأساسية. <span class="text-sm"><?php echo $title; ?></span></h2>

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
        <?php echo form_open_multipart('dashboard/update_products/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>
            <legend><?php echo $title; ?></legend>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">اسم المنتج:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>
                    <input type="text" id="product_name"  name="product_name" value="<?php echo $result['product_name'] ?>" class="form-control text-right" placeholder="اسم المنتج" >
                </div>
            </div>


            <div class="form-group" >
                <label for="select" class="col-lg-2 control-label">إختر المجال</label>
                <div class="col-lg-10">
                    <select id="product_field_id_fk" name="product_field_id_fk" class="form-control" >
                        <?foreach($fields as $field):?>
                            <?php $selected="";if($field->id==$result['product_field_id_fk']){$selected="selected";}else{$selected=""; }?>
                            <option value="<?echo $field->id?> " <?php echo $selected;?> > <?echo $field->title?>  </option>
                        <?endforeach?>
                    </select>
                </div>
            </div>


            <div  class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">اسم القسم:</label>
                <div class="col-lg-10 input-grup">
                    <select  name="depart_id_fk" class="form-control">


                        <?php foreach($departments as $department):?>
                            <?php $selected=""; if($department->id == $result['depart_id_fk']){$selected="selected";}else{$selected=""; }?>

                            <option value="<?php echo $department->id?> "  <?php echo $selected ?> ><?php echo $department->title?>  </option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">الصورة/اللوجو:</label>
                <div class="col-lg-10 input-grup">
                    <img src="<?php echo base_url()  ?>uploads/images/<?php echo $result['product_image']?>" height="200px" width="200px">
                    <input type="file" id="product_image" name="product_image" class="form-control text-right" >
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
        <?php echo form_open_multipart('dashboard/add_products',array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>
            <legend><?php echo $title; ?></legend>


            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">اسم المنتج:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>
                    <input type="text" id="product_name"  name="product_name" class="form-control text-right" placeholder="اسم المنتج" required>
                </div>
            </div>

            <div class="form-group" >
                <label for="select" class="col-lg-2 control-label">إختر المجال</label>
                <div class="col-lg-10">
                    <select id="product_field_id_fk" name="product_field_id_fk" class="form-control" required>
                        <option value="">اختر من مجالات الشركة  </option>
                        <?foreach($fields as $field):?>
                            <option value="<?php echo $field->id?> "><?php echo $field->title?>  </option>
                        <?endforeach?>
                    </select>
                </div>
            </div>

            <div  class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">اسم القسم:</label>
                <div class="col-lg-10 input-grup">
                    <select  name="depart_id_fk" class="form-control">
                        <option>اختر اسم القسم</option>

                        <?php foreach($departments as $department):?>
                            <option value="<?php echo $department->id?> "   ><?php echo $department->title?>  </option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">الصورة/اللوجو:</label>
                <div class="col-lg-10 input-grup">
                    <input type="file" id="product_image" name="product_image" class="form-control text-right" required>
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">تفاصيل المنتج:</label>
                <div class="col-lg-2 input-grup">
                    <input type="number" id="pro_details"  name="pro_details" min="1" max="5" onkeyup="return lood($('#pro_details').val(),'#optionearea1','pro_details');" class="form-control text-right" placeholder="   أقصى عدد 5" required>
                </div>
            </div>
            <div id="optionearea1"></div>

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
            <th >#</th>
            <th  class="text-center">اسم المنتج</th>
            <th >التحكم</th>
            <th  class="text-center">المقاطع</th>

            <th  class="text-center">حالة المنتج</th>

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
                <td ><?php echo $record->product_name?></td>

                <td data-title="التحكم" class="text-center">
                    <a href="<?php echo base_url().'dashboard/update_products/'.$record->id?>" class="btn btn-warning btn-xs col-lg-5"><i class="fa fa-pencil"></i> تعديل</a>
                    <a  href="<?php echo base_url().'dashboard/delete_products/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   col-lg-5"><i class="fa fa-trash"></i> حذف</a>
                </td>
                
                <td>
                   
                    <a href="<?php echo base_url().'dashboard/product_part_details/'.$record->id?>"  class="btn btn-warning btn-xs col-lg-5"><i class="fa fa-pencil"></i>  تعديل المقاطع </a>
                    <a href="<?php echo base_url().'dashboard/add_product_part/'.$record->id?>"  class="btn btn-success btn-xs col-lg-5 "><i class="fa fa-pencil"></i>  اضافة المقاطع </a>

                </td>
                <td data-title="" class="text-center">
                    <a href="<?php echo base_url().'dashboard/suspend_products/'.$record->id.'/'.$class?>" class="btn btn-<?php echo $class ?> btn-xs col-lg-6"><?php echo $title ?> </a>
                </td>
            </tr>
        <?php endforeach ;?>
        </tbody>
    </table>
    <div class="col-xs-12 mt30 text-center">
        <?php echo  $links?>
    </div>

<?php endif;?>













<script>
    function lood(num,div,page){
        var cleer = '#' + page;
        if(num != 0)
        {
            var id = num;
            var dataString = 'num=' + id + '&page=' + page;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/dashboard/add_products',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $(div).html(html);
                }
            });

            return false;
        }
        else
        {
            $(cleer).val('');
            $(div).html('');
            return false;
        }
    }
</script>