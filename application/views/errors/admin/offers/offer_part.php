

<h2 class="text-flat">إدارة منتجات الشركة. <span class="text-sm"><?php echo $title; ?></span></h2>

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
        <?php echo form_open_multipart('dashboard/update_offers_part/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>
            <legend><?php echo $title; ?></legend>

           

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">عنوان المقطع:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>
                    <input type="text" id="off_title"  name="off_title" value="<?php echo $result['off_title'] ?>" class="form-control text-right" placeholder="عنوان المقطع" required>
                </div>
            </div>



            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">تفاصيل المقطع:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>
                    <textarea type="text" id="off_content"  name="off_content" class="form-control text-right" placeholder="تفاصيل المقطع" required><?php echo $result['off_content'] ?></textarea>
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
        <?php echo form_open_multipart('dashboard/add_offers_part',array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>
            <legend><?php echo $title; ?></legend>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">اسم المنتج:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>

                    <input type="text" id=""  name="" value="<?php echo $offers['off_title'] ?>" class="form-control text-right" placeholder="اسم المنتج" readonly>

                </div>
            </div>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">عنوان المقطع:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>
                    <input type="text" id="off_title"  name="off_title" class="form-control text-right" placeholder="عنوان المقطع" required>
                </div>
            </div>



            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">تفاصيل المقطع:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>
                    <textarea type="text" id="off_content"  name="off_content" class="form-control text-right" placeholder="تفاصيل المقطع" required></textarea>
                </div>
            </div>



            <div class="form-group" >
                <div class="col-xs-10 col-xs-pull-2">
                    <input type="hidden"  name="comp_off_id_fk" value="<?php echo $offers['id'] ?>" class="btn btn-primary" >

                    <button type="reset" class="btn btn-default">إبدأ من جديد ؟</button>
                    <input type="submit"  name="add" value="حفظ" class="btn btn-primary" >
                </div>
            </div>
        </fieldset>
        <!-- </form>-->
        <?php echo form_close()?>
    <?php endif?>
</div>














<script>
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