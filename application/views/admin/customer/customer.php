<h2 class="text-flat">إدارة العملاء <span class="text-sm"><?php echo $title; ?></span></h2>
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
        <?php echo form_open_multipart('dashboard/update_customer/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>
            <legend ><?php echo $title; ?></legend>
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">إسم العميل:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>
                    <input type="text" id="name"  value="<?php echo $result['name']; ?>" name="name" class="form-control text-right" placeholder="إسم الموظف">
                </div>
            </div>
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">صورة:</label>
                <div class="col-lg-10 input-grup">
                    <input type="file" id="img" name="img" class="form-control text-right">
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label"></label>
                <div class="col-lg-10 input-grup">
                    <img src="<?php echo base_url('uploads/images/'.$result['img'].''); ?>" height="200px" width="200px">
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group" >
                <div class="col-xs-10 col-xs-pull-2">
                    <input type="submit" name="update" value="حفظ" class="btn btn-primary" >
                </div>
            </div>
        </fieldset>
        <?php echo form_close()?>
    <?php else: ?>
        <?php echo form_open_multipart('dashboard/add_customer',array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>
            <legend ><?php echo $title; ?></legend>
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">إسم العميل:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>
                    <input type="text" id="name"   name="name" class="form-control text-right" placeholder="إسم العميل" />
                </div>
            </div>
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">صورة:</label>
                <div class="col-lg-10 input-grup">
                    <input type="file" id="img" name="img" class="form-control text-right"/>
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group" >
                <div class="col-xs-10 col-xs-pull-2">
                    <button type="reset" class="btn btn-default">أبدء من جديد ؟</button>
                    <input type="submit"  name="add_customer" value="حفظ" class="btn btn-primary" />
                </div>
            </div>
        </fieldset>
        <?php echo form_close()?>
    <?php endif?>
</div>
<?php if(isset($records)&&$records!=null):?>
    <table id="no-more-tables" class="table table-bordered" role="table">
        <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>لوحة التحكم في الإدارة.</p></caption>
        <thead>
        <tr>
            <th width="2%">#</th>
            <th  class="text-right">إسم العميل</th>
            <th width="15%" class="text-right">التفاصيل</th>
            <th class="text-right">التحكم</th>
        </tr>
        </thead>
        <tbody>
        <?php $x = 0; ?>
        <?php foreach($records as $record):
            $x++;
            ?>
            <tr>
                <td data-title="#"><span class="badge"><?php echo $x?></span></td>
                <td data-title="إسم العميل"><?php echo $record->name?> </td>
                <td data-title="التفاصيل" class="text-center">
                    <button type="button" class="btn btn-info btn-xs  " data-toggle="modal" data-target="#myModal<?php echo $record->id?>"><i class="fa fa-list"></i> التفاصيل </button>
                </td>
                <td data-title="التحكم" class="text-center">
                    <a  href="<?php echo base_url().'dashboard/delete_customer/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   col-lg-5"><i class="fa fa-trash"></i> حذف</a>
                    <a href="<?php echo base_url().'dashboard/update_customer/'.$record->id?>" class="btn btn-warning btn-xs col-lg-5"><i class="fa fa-pencil"></i> تعديل</a>
                </td>
            </tr>
            <!----------------------------------------------------------------------------------------------------------------------->
            <div class="modal fade" id="myModal<?php echo $record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="gridSystemModalLabel"></h4>
                        </div>
                        <br />
                        <div class="col-sm-3">إسم العميل</div>
                        <div class="col-sm-9"><?php echo $record->name?></div>
                        <br />
                        <div class="modal-body">
                            <div class="col-md-3"> صورة العميل </div>
                            <div class="col-md-9"><img src="<?php echo base_url('uploads/images/'.$record->img.''); ?>" height="200px" width="200px"> </div>
                            <br /><br /><br />
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            <!----------------------------------------------------------------------------------------------------------------------->
        <?php endforeach ;?>
        </tbody>
    </table>
    <div class="col-xs-12 mt30 text-center">
        <?php echo  $links?>
    </div>
<?php endif;?>