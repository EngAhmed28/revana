

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
        <?php echo form_open_multipart('dashboard/update_offers/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>
            <legend><?php echo $title; ?></legend>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">اسم العرض:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>
                    <input type="text" id="off_title"  name="off_title" value="<?php echo $result['off_title'] ?>" class="form-control text-right" placeholder="اسم العرض" >
                </div>
            </div>


            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">الصورة/اللوجو:</label>
                <div class="col-lg-10 input-grup">
                    <img src="<?php echo base_url()  ?>uploads/images/<?php echo $result['off_img']?>" height="200px" width="200px">
                    <input type="file" id="off_img" name="off_img" class="form-control text-right" >
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">نوع العرض:</label>
                <div class="col-lg-10 input-grup">
                    <select id="select1" name="off_type" class="form-control">
                        <?php if($result['off_type']==1): ?>
                        <option value="1" selected>خاص بمنتج</option>
                        <option value="0">عام</option>
                        <?php else: ?>
                            <option value="0" selected>عام</option>
                            <option value="1" >خاص بمنتج</option>
                        <?php endif; ?>

                    </select>
                </div>
            </div>

            <?php if($result['off_type']==1) :?>

            <div id="" class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">اسم المنتج:</label>
                <div class="col-lg-10 input-grup">
                    <select  name="product_id_fk" class="form-control">
                        <option>اختر اسم المنتج</option>


                        <?php foreach($products as $product):?>
                            <?php $selected="";if($product->id==$result['product_id_fk']){$selected="selected";}else{$selected=""; }?>

                            <option value="<?php echo $product->id?> " <?php echo $selected ?> > <?php echo $product->product_name?>  </option>

                        <?php endforeach;?>

                    </select>
                </div>
            </div>
<?php endif; ?>


            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">مميزات العرض:</label>
                <div class="col-lg-2 input-grup">
                    <input type="number" id="special_info"  name="special_info" min="1" max="5" onkeyup="return lood($('#special_info').val(),'#optionearea3','special_info');" class="form-control text-right" placeholder="   أقصى عدد 5" >
                </div>
            </div>
            <div id="optionearea3"></div>


            <?php

            $special=unserialize($result['special_info']);
            if($special){
                echo '<table class="table table-bordered table-hover table-striped" cellspacing="0" " style="margin-right: 191px; width: 56%;" >
                      <thead>';
                for($x = 0 ; $x < count($special) ; $x++){

                    if(count($special) > 1)
                    {
                        $td = '<td style="padding-top: 10%px;">
                               <a  href="'.base_url().'dashboard/delete_special/special_info/'.$result['id'].'/'.$x.'"  class="btn btn-danger btn-xs col-lg-12">
                                حذف <i class="fa fa-trash"></i></a>
                               </td>';
                    }
                    else
                        $td = '';
                    echo '<tr class="">
                          <td>
                          <input type="text" name="special_old'.$x.'" class="form-control" style="width: 500px;" value="'.$special[$x].'" title="يجب أدخال مميزات العرض"/>
                          </td>
                          '.$td.'
                          </tr>';
                }
                echo '</thead></table>';
            }
            ?>

            <input type="hidden" name="count_special" value="<?php echo count($special) ?>" />

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
        <?php echo form_open_multipart('dashboard/add_offers',array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>
            <legend><?php echo $title; ?></legend>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">نوع العرض:</label>
                <div class="col-lg-10 input-grup">
            <select id="select1" name="off_type" class="form-control">
                <option> اختر نوع العرض</option>
                <option value="0">عام</option>
                <option value="1">خاص بمنتج</option>
            </select>
                </div>
            </div>

            <div id="select2" class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">اسم المنتج:</label>
                <div class="col-lg-10 input-grup">
            <select  name="product_id_fk" class="form-control">
                <option>اختر اسم المنتج</option>

                <?php foreach($products as $product):

                 
                    ?>

                    <option value="<?php echo $product->id?> "><?php echo $product->product_name?>  </option>

                <?php endforeach;?>

            </select>
                </div>
            </div>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">اسم العرض:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>
                    <input type="text" id="off_title"  name="off_title" class="form-control text-right" placeholder="اسم العرض" required>
                </div>
            </div>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">الصورة/اللوجو:</label>
                <div class="col-lg-10 input-grup">
                    <input type="file" id="off_img" name="off_img" class="form-control text-right" required>
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">تفاصيل العرض:</label>
                <div class="col-lg-2 input-grup">
                    <input type="number" id="off_details"  name="off_details" min="1" max="5" onkeyup="return lood($('#off_details').val(),'#optionearea1','off_details');" class="form-control text-right" placeholder="   أقصى عدد 5" required>
                </div>
            </div>
            <div id="optionearea1"></div>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">مميزات العرض:</label>
                <div class="col-lg-2 input-grup">
                        <input type="number" id="special_info"  name="special_info" min="1" max="5" onkeyup="return lood($('#special_info').val(),'#optionearea3','special_info');" class="form-control text-right" placeholder="   أقصى عدد 5" required>
                </div>
            </div>
                    <div id="optionearea3"></div>




            <div class="form-group" >
                <div class="col-xs-10 col-xs-pull-2">
                    <button type="reset" class="btn btn-default">إبدأ من جديد ؟</button>
                    <input type="submit"  name="add" value="حفظ" class="btn btn-primary" >
                </div>
            </div>
        </fieldset>
        <!-- </form>-->
        <?php echo form_close()?>
        </div>
    <?php endif?>



<?php if(isset($records)&&$records!=null):?>



    <table id="no-more-tables" class="table table-bordered" role="table">

        <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>لوحة التحكم في الإدارة.</p></caption>

        <thead>

        <tr>
            <th >#</th>
            <th  class="text-center">اسم العرض</th>
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
                <td ><?php echo $record->off_title?></td>

                <td data-title="التحكم" class="text-center">
                    <a href="<?php echo base_url().'dashboard/update_offers/'.$record->id?>" class="btn btn-warning btn-xs col-lg-5"><i class="fa fa-pencil"></i> تعديل</a>
                    <a  href="<?php echo base_url().'dashboard/delete_offers/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   col-lg-5"><i class="fa fa-trash"></i> حذف</a>
                </td>

                <td>

                    <a href="<?php echo base_url().'dashboard/offers_part_details/'.$record->id?>"  class="btn btn-warning btn-xs col-lg-5"><i class="fa fa-pencil"></i>  تعديل المقاطع </a>
                    <a href="<?php echo base_url().'dashboard/add_offers_part/'.$record->id?>"  class="btn btn-success btn-xs col-lg-5 "><i class="fa fa-pencil"></i>  اضافة المقاطع </a>

                </td>
                <td data-title="" class="text-center">
                    <a href="<?php echo base_url().'dashboard/suspend_offers/'.$record->id.'/'.$class?>" class="btn btn-<?php echo $class ?> btn-xs col-lg-6"><?php echo $title ?> </a>
                </td>
            </tr>
        <?php endforeach ;?>
        </tbody>
    </table>
    <div class="col-xs-12 mt30 text-center">
        <?php echo  $links?>
    </div>

<?php endif;?>







<style>#select2{
        display: none;
    }</style>





<script>

    $("#select1").change(function(){
        if($(this).val() == 1){
            $("#select2").show();
        }else{
            $("#select2").hide();
        }

    });

    function lood(num,div,page){
        var cleer = '#' + page;
        if(num != 0)
        {
            var id = num;
            var dataString = 'num=' + id + '&page=' + page;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/dashboard/add_offers',
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