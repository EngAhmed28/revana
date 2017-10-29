

<h2 class="text-flat">إدارة موظفين الشركة <span class="text-sm"><?php echo $title; ?></span></h2>

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
        <?php echo form_open_multipart('dashboard/update_employee/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>

        <fieldset>

            <legend ><?php echo $title; ?></legend>





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

            <div  class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">المسمى الوظيفي:</label>
                <div class="col-lg-10 input-grup">
                    <select  name="job_title_id_fk" class="form-control">
                        <?php foreach($jobs as $job):?>
                            <?php $selected=""; if($department->id == $result['depart_id_fk']){$selected="selected";}else{$selected=""; }?>

                            <option value="<?php echo $job->id?> "   <?php echo $selected ?>  ><?php echo $job->title_job?>  </option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">الأسم:</label>
                <div class="col-lg-10 input-grup">
                    <input type="text" id="name"  name="name" class="form-control text-right" value="<?php echo $result['name']; ?> " placeholder="الأسم" required>
                </div>
            </div>

          

            <div class="form-group" >
                <label for="select" class="col-lg-2 control-label">فئة الموظف</label>
                <div class="col-lg-10">
                    <select id="employee_type" name="employee_type" class="form-control" required>
                        <?php if($result['employee_type']==1){ ?>
                            <option value="1" selected>موظف</option>
                            <option value="0">أدارة</option>
                        <?php }else{ ?>
                            <option value="0" selected>أدارة</option>
                            <option value="1" >موظف</option>

                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">العنوان:</label>
                <div class="col-lg-10 input-grup">
                    <input type="text" id="address"  name="address" value="<?php echo $result['address']; ?> " class="form-control text-right" placeholder="العنوان" required>
                </div>
            </div>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">التليفون:</label>
                <div class="col-lg-10 input-grup">
                    <input type="text" id="telephone"  name="telephone" value="<?php echo $result['telephone']; ?> " class="form-control text-right"  required>
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

        <?php echo form_open_multipart('dashboard/add_employee',array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>

            <legend ><?php echo $title; ?></legend>

            <div  class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">اسم القسم:</label>
                <div class="col-lg-10 input-grup">
                    <select  name="depart_id_fk" class="form-control">
                        <option>اختر اسم القسم</option>
                        <?php foreach($departments as $department):?>
                            <option value="<?php echo $department->id?> "><?php echo $department->title?>  </option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div  class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">المسمى الوظيفي:</label>
                <div class="col-lg-10 input-grup">
                    <select  name="job_title_id_fk" class="form-control">
                        <option>اختر المسمى الوظيفي</option>
                        <?php foreach($jobs as $job):?>
                            <option value="<?php echo $job->id?> "><?php echo $job->title_job?>  </option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">الأسم:</label>
                <div class="col-lg-10 input-grup">
                    <input type="text" id="name"  name="name" class="form-control text-right" placeholder="الأسم" required>
                </div>
            </div>

        


            <div class="form-group" >
                <label for="select" class="col-lg-2 control-label">فئة الموظف</label>
                <div class="col-lg-10">
                    <select id="employee_type" name="employee_type" class="form-control" required>
                        <option value="">اختر فئة الموظف</option>
                        <option value="1">موظف</option>
                        <option value="0">أدارة</option>
                    </select>
                </div>
            </div>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">العنوان:</label>
                <div class="col-lg-10 input-grup">
                    <input type="text" id="address"  name="address" class="form-control text-right" placeholder="العنوان" required>
                </div>
            </div>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">التليفون:</label>
                <div class="col-lg-10 input-grup">
                    <input type="number" id="telephone"  name="telephone" class="form-control text-right" placeholder="التليفون" required>
                </div>
            </div>

            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">الصورة:</label>
                <div class="col-lg-10 input-grup">
                    <input type="file" id="image" name="image" class="form-control text-right" required>
                    <span class="help-block"></span>
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
            <th  class="text-right">اسم الموظف</th>
            <th width="15%" class="text-right">التفاصيل</th>

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
                <td ><?php echo $record->name?></td>
                <td data-title="التفاصيل" class="text-center">
                    <button type="button" class="btn btn-info btn-xs  " data-toggle="modal" data-target="#myModal<?php echo $record->id?>"><i class="fa fa-list"></i> التفاصيل </button>
                </td>
                <td data-title="التحكم" class="text-center">
                    <a href="<?php echo base_url().'dashboard/update_employee/'.$record->id?>" class="btn btn-warning btn-xs col-lg-3"><i class="fa fa-pencil"></i> تعديل</a>
                    <a  href="<?php echo base_url().'dashboard/delete_employee/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   col-lg-3"><i class="fa fa-trash"></i> حذف</a>
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
                        <div class="col-sm-3">اسم الموظف</div>
                        <div class="col-sm-9"><?php echo $record->name?></div>
                        <br />
                        <div class="modal-body">
                            <div class="col-md-3"> صورة الموظف </div>
                            <div class="col-md-9"><img src="<?php echo base_url('uploads/images/'.$record->image.''); ?>" height="200px" width="200px"> </div>


                        </div>
                        <br /><br /><br /><br /><br /><br />
                        <div class="row">
                            <div class="col-sm-3" >العنوان</div>
                            <div class="col-sm-9">
                                <?php echo $record->address?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4" >التليفون</div>
                            <div class="col-sm-8">
                                <?php echo $record->telephone?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4" >الفئة</div>
                            <div class="col-sm-8">
                                <?php if($record->employee_type ==1){ ?>
                                    موظف

                                <?php }else{ ?>
                                   أدارة

                                <?php } ?>
                            </div>
                        </div>

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


