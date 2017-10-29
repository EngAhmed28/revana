<h2 class="text-flat">إدارة المتدربين <span class="text-sm"><?php echo $title; ?></span></h2>
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
        <?php echo form_open_multipart('dashboard/update_trainers_openions/'.$result['id_openion'],array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>
            <legend ><?php echo $title; ?></legend>

            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">إسم المتدرب:</label>
                <div class="col-lg-10 input-grup">
                  <!--  <select class="form-control " name="trainer_id" id="trainer_id" >
                        <?php foreach($avilable_trainers as $row):
                            $select='';
                            if($row->id == $result['trainer_id']){
                                 $select ='selected';
                            }
                            ?>

                            <option value="<?php echo $row->id; ?>" <? echo $select;?>><?php echo $row->name; ?></option>
                        <?php endforeach;?>
                    </select> -->
                    
                      <input type="text" id="trainer_id" name="trainer_id" 
                      
                      value="<?php echo $result['trainer_id']; ?>"
                      class="form-control text-right">
                    
                    </div>
            </div>

            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">صورة المتدرب:</label>
                <div class="col-lg-10 input-grup">
                    <!--i class="fa fa-newspaper-o"></i-->
                    <input type="file" id="trainer_logo" name="trainer_logo" class="form-control text-right">
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label"></label>
                <div class="col-lg-10 input-grup">
                    <img src="<?php echo base_url('uploads/images/'.$result['trainer_logo'].''); ?>" height="200px" width="200px">
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">رأى المتدرب:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>
                    <textarea type="text" id="trainer_openion"  name="trainer_openion" class="form-control text-right" placeholder="   تفاصيل المقطع" ><?php echo $result['trainer_openion']; ?></textarea>
                </div>
            </div>
            <div class="form-group" >
                <div class="col-xs-10 col-xs-pull-2">
                    <input type="submit" name="update_trainers_openions" value="حفظ" class="btn btn-primary" >
                </div>
            </div>
        </fieldset>
        <!-- </form>-->
        <!-- </form>-->
        <?php echo form_close()?>
    <?php else: ?>
        <?php echo form_open_multipart('dashboard/add_trainers_openions',array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>
            <legend ><?php echo $title; ?></legend>
           <div class="form-group">
                    <label for="inputUser" class="col-lg-2 control-label">إسم المتدرب</label>
                    <div class="col-lg-10 input-grup">
                      <!--  <select class="form-control " name="trainer_id" id="trainer_id" >
                           <option value="">--إختر إسم المتدرب--</option>
                          <?php foreach($avilable_trainers as $row):?>
                            <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                           <?php endforeach;?>
                        </select>-->
                        
                             <input type="text" id="trainer_id" name="trainer_id" 
                     
                      class="form-control text-right">
                    </div>
                </div>
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">صورة المتدرب:</label>
                <div class="col-lg-10 input-grup">
                    <!--i class="fa fa-newspaper-o"></i-->
                    <input type="file" id="trainer_logo" name="trainer_logo" class="form-control text-right" required="required" />
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">رأى المتدرب:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>
                    <textarea id="trainer_openion"  name="trainer_openion" class="form-control text-right" required="required"></textarea>
                </div>
            </div>
            <div class="form-group" >
                <div class="col-xs-10 col-xs-pull-2">
                    <button type="reset" class="btn btn-default">أبدء من جديد ؟</button>
                    <input type="submit"  name="add_trainers_openions" value="حفظ" class="btn btn-primary" >
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
            <th  class="text-right">إسم المتدرب</th>
            <th class="text-right">تاريخ الإضافة</th>
            <th width="20%" class="text-right">التحكم</th>

        </tr>
        </thead>
        <tbody>
        <?php $x = 0; ?>
        <?php foreach($records as $record): $x++;?>


            <tr>
                <td data-title="#"><span class="badge"><?php echo $x?></span></td>
                <td data-title="إسم العميل"><?php echo $record->trainer_id?> </td>
                <td data-title="تاريخ الإضافة"><?php echo date("Y-m-d",$record->date_openion); ?></td>
                <td data-title="التحكم" class="text-center">
                    <a href="<?php echo base_url().'dashboard/update_trainers_openions/'.$record->id_openion?>" class="btn btn-warning btn-xs col-lg-5"><i class="fa fa-pencil"></i> تعديل</a>
                    <a href="<?php echo base_url().'dashboard/delete_trainers_openions/'.$record->id_openion?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   col-lg-5"><i class="fa fa-trash"></i> حذف</a>
                </td>

            </tr>
        <?php endforeach ;?>
        </tbody>
    </table>
    <div class="col-xs-12 mt30 text-center">

    </div>
<?php endif;?>