<h2 class="text-flat">إدارة الدورات والكورسات <span class="text-sm"><?php echo $title; ?></span></h2>
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

<div class="well bs-component"  ="wait 0s, then enter left and hustle 100%">
    <?php if(isset($result)):?>
        <?php echo form_open_multipart('dashboard/update_Course/'.$result['course_id_pk'],array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>
            <legend  ="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>




            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> كود الدورة:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-key"></i>
                    <input type="text" id="course_code"  name="course_code" value="<?php echo $result['course_code']?>" class="form-control text-right" placeholder="   كود الدورة" required readonly/>
                </div>
            </div>

            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> إسم الدورة:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-wordpress"></i>
                    <input type="text" id="course_name"  name="course_name" value="<?php echo $result['course_name']?>"  class="form-control text-right" placeholder="   إسم الدورة" required/>
                </div>
            </div>

            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> تفاصيل الدورة:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-list"></i>
                    <textarea id="course_details" name="course_details" value="<?php echo $result['course_details']?>"  class="form-control text-right" placeholder="   تفاصيل الدورة" required><?php echo $result['course_details']?>  </textarea>
                </div>
            </div>


            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> صورة الدورة:</label>
                <div class="col-lg-10 input-grup">
                    <img src="<?php echo base_url() ?>/uploads/thumbs/<?php echo $result['course_img']; ?> "  />
                    <input  type="file" name="course_img"   class="form-control text-right"  id="exampleInputFile"/>
                </div>

            </div>


            <div class="form-group"  ="wait 0.3s, then enter bottom and hustle 100%">
                <div class="col-xs-10 col-xs-pull-2">
                    <input type="submit" name="update" value="حفظ" class="btn btn-primary" >
                </div>
            </div>

        </fieldset>

        <?php echo form_close()?>


    <?php else: ?>
        <?php echo form_open_multipart('dashboard/add_course',array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>
            <legend  ="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>



            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> كود الدورة:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-key"></i>
                    <input type="text" id="course_code"  name="course_code" value="<?php echo rand(10,10000); ?> " class="form-control text-right" placeholder="   كود الدورة" required readonly/>
                </div>
            </div>

            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> إسم الدورة:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-wordpress"></i>
                    <input type="text" id="course_name"  name="course_name" class="form-control text-right" placeholder="   إسم الدورة" required/>
                </div>
            </div>

            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> تفاصيل الدورة:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-list"></i>
                    <textarea id="course_details" name="course_details"  class="form-control text-right" placeholder="   تفاصيل الدورة" required>  </textarea>
                </div>
            </div>


            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> صورة الدورة:</label>
                <div class="col-lg-10 input-grup">
                    <input type="file" id="course_img"  name="course_img" class="form-control text-right" placeholder="   صورة الدورة" required/>
                </div>
            </div>


            <div class="form-group"  ="wait 0.3s, then enter bottom and hustle 100%">
                <div class="col-xs-10 col-xs-pull-2">
                    <button type="reset" class="btn btn-default">إبدأ من جديد ؟</button>
                    <input type="submit"  name="add_course" value="حفظ" class="btn btn-primary" >
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


            <th  class="text-center">إسم الدورة</th>


            <th  width="40%" class="text-right">التحكم</th>

        </tr>

        </thead>

        <tbody>

        <?php
        $x = 1;

        foreach($records as $record):?>



            <tr>

                <td data-title="#"><span class="badge"><?php echo $x++?></span></td>
                <td data-title=""> <p class="text-center"><?php echo $record->course_name?>
                    </p> </td>


                <td data-title="التحكم" class="text-center">

                    <a href="<?php echo base_url().'dashboard/add_videos/'.$record->course_id_pk.'/1'?>" class="btn btn-success btn-xs col-lg-3"> إضافة فيديو</a>

                    <button type="button" class="btn btn-info btn-xs col-lg-3" data-toggle="modal" data-target="#myModal<?php echo $record->course_id_pk?>"><i class="fa fa-list"></i> التفاصيل </button>

                    <a href="<?php echo base_url().'dashboard/update_Course/'.$record->course_id_pk?>" class="btn btn-warning btn-xs col-lg-3"><i class="fa fa-pencil"></i> تعديل</a>

                    <a  href="<?php echo base_url().'dashboard/delete_Course/'.$record->course_id_pk?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   col-lg-3"><i class="fa fa-trash"></i> حذف</a>
                </td>


            </tr>
            <div class="modal fade" id="myModal<?php echo $record->course_id_pk?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="gridSystemModalLabel">تفاصيل الدوارات التدريبة</h4>
                        </div>
                        <br />
                        <div class="col-sm-3" style="font-size: 16px;">اسم الدورة</div>
                        <div class="col-sm-9"  style="font-size: 16px;">
                            <?php echo $record->course_name?>
                        </div>
                        <br /><br />
                        <div class="col-sm-3" style="font-size: 16px;">كود الدورة</div>
                        <div class="col-sm-9"  style="font-size: 16px;">
                            <?php echo $record->course_code?>
                        </div>
                        <br /><br />

                        <div class="modal-body">
                            <div class="col-sm-2" style="font-size: 16px;">صور الدورة</div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="carousel-inner" role="listbox">';
                                        <img src="<?php echo base_url().'/uploads/thumbs/'.$record->course_img ?>"  />

                                    </div>

                                </div>

                                <br/><br />
                            </div>

                            <br />
                            <div class="col-md-3" style="font-size: 16px;"></div>
                            <div class="col-md-9"></div>
                            <br /><br />
                            <div class="row">
                                <div class="col-sm-4" style="font-size: 16px;">تفاصيل الدورة</div>
                                <div class="col-sm-8">
                                    <?php echo $record->course_details?>
                                </div>
                            </div>

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