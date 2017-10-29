<h2 class="text-flat">إدارة البيانات الأساسية <span class="text-sm"><?php echo $title; ?></span></h2>

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

<div class="well bs-component" "wait 0s, then enter left and hustle 100%">

<?php if(isset($result)):?>

    <!-- <form class="form-horizontal">-->
    <?php echo form_open_multipart('dashboard/update_message/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>

    <fieldset>

        <legend "wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>




        <div class="form-group" "wait 0.6s, then enter bottom and hustle 100%">
        <label for="inputUser" class="col-lg-2 control-label">تفاصيل المقطع:</label>
        <div class="col-lg-10 input-grup">
            <i class="fa fa-newspaper-o"></i>
            <textarea type="text" id="content"  name="content" class="form-control text-right" placeholder="   تفاصيل المقطع" ><?php echo $result['content']; ?></textarea>
        </div>
        </div>



        <div class="form-group" "wait 0.3s, then enter bottom and hustle 100%">

        <div class="col-xs-10 col-xs-pull-2">

            <input type="submit" name="update" value="حفظ" class="btn btn-primary" >
        </div>

        </div>

    </fieldset>

    <!-- </form>-->



    <!-- </form>-->
    </div>

    <?php echo form_close()?>

<?php elseif(! $records): ?>

    <?php echo form_open_multipart('dashboard/add_message',array('class'=>"form-horizontal",'role'=>"form" ))?>
    <fieldset>

        <legend "wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>




        <div class="form-group" "wait 0.6s, then enter bottom and hustle 100%">
        <label for="inputUser" class="col-lg-2 control-label">تفاصيل المقطع:</label>
        <div class="col-lg-10 input-grup">
            <i class="fa fa-newspaper-o"></i>
            <textarea id="content"  name="content" class="form-control text-right" required="required"></textarea>
        </div>
        </div>


        <div class="form-group" "wait 0.3s, then enter bottom and hustle 100%">

        <div class="col-xs-10 col-xs-pull-2">

            <button type="reset" class="btn btn-default">أبدء من جديد ؟</button>

            <input type="submit"  name="add_message" value="حفظ" class="btn btn-primary" >
        </div>

        </div>

    </fieldset>


    <!-- </form>-->
    </div>

    <?php echo form_close()?>
<?php else: ?>

    <?php if(isset($records)&&$records!=null):?>



        <table id="no-more-tables" class="table table-bordered" role="table">

            <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>لوحة التحكم في الإدارة.</p></caption>

            <thead>

            <tr>

                <th width="2%">#</th>


                <th class="text-right">تاريخ الإضافة</th>

                <th width="20%" class="text-right">التحكم</th>

                <th class="text-right">حالة المقطع</th>
                <th class="text-right">تفاصيل المقطع</th>

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
                    <td  data-title="تاريخ الإضافة"><?php echo date('Y/m/d',$record->date)?></td>

                    <td data-title="التحكم" class="text-center">

                        <a href="<?php echo base_url().'dashboard/update_message/'.$record->id?>" class="btn btn-warning btn-xs col-lg-5"><i class="fa fa-pencil"></i> تعديل</a>

                        <a  href="<?php echo base_url().'dashboard/delete_message/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   col-lg-5"><i class="fa fa-trash"></i> حذف</a>

                    </td>

                    <td data-title="حالة المقطع" class="text-center">

                        <a href="<?php echo base_url().'dashboard/suspend_message/'.$record->id.'/'.$class?>" class="btn btn-<?php echo $class ?> btn-xs col-lg-5"><?php echo $title ?> </a>

                    </td>
                    <td >
                        <button type="button" class="btn btn-info btn-xs " data-toggle="modal" data-target="#myModal<?php echo $record->id?>"><i class="fa fa-list"></i> التفاصيل </button>
                    </td>
                </tr>
                <div class="modal fade" id="myModal<?php echo $record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">



                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>


                            <h4 class="modal-title" id="gridSystemModalLabel"><?php echo date('Y-m-d', $record->date) ?></h4>



                            <div class="modal-footer">
                                <label>تفاصيل المقطع</label>
                                <p><?php echo $record->content ?> </p>
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

    </div>
<?php endif?>



