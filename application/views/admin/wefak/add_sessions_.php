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

<div class="well "  ="wait 0s, then enter left and hustle 100%">
    <?php if(isset($result)):?>
        <?php echo form_open_multipart('dashboard/update_Sessions/'.$result['sessions_id_pk'],array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>
            <legend  ="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>

            <div class="form-group"  ="wait 0.3s, then enter bottom and hustle 100%">
                <label for="select" class="col-lg-2 control-label">إختر اسم الدورة  </label>
                <div class="col-lg-10">
                    <select id="course_id_fk" name="course_id_fk" class="form-control">
                        <option  value="<?echo $result['course_id_fk'] ?>"><?echo $result['course_id_fk'] ?></option>

                        <?foreach($Courses as $Course):?>
                            <option value="<?echo $Course->course_id_pk?> "><?echo $Course->course_name?>  </option>
                        <?endforeach?>
                    </select>
                </div>
            </div>

            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> إسم الكورس:</label>
                <div class="col-lg-10 input-grup">
                <i class="fa fa-wordpress"></i>
                    <input type="text" id="sessions_name"  name="sessions_name" value="<?php echo $result['sessions_name']?>" class="form-control text-right" placeholder="      إسم الكورس" required/>
                </div>
            </div>

            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> تكلفة الكورس:</label>
                <div class="col-lg-10 input-grup">

                    <input type="number" id="sessions_cost"  name="sessions_cost" value="<?php echo $result['sessions_cost']?>" class="form-control text-right" placeholder="         تكلفة الكورس" required/>
                </div>
            </div>

            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> عدد الساعات:</label>
                <div class="col-lg-10 input-grup">

                    <input type="number" id="sessions_time"  name="sessions_time" value="<?php echo $result['sessions_time']?>" class="form-control text-right" placeholder="         عدد الساعات" required/>
                </div>
            </div>

            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> نبذة عن الكورس:</label>
                <div class="col-lg-10 input-grup">
                <i class="fa fa-list-alt"></i>
                    <input type="text" id="sessions_word"  name="sessions_word" value="<?php echo $result['sessions_word']?>" class="form-control text-right" placeholder="   نبذة عن الكورس" required/>
                </div>
            </div>


            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> تفاصيل الكورس:</label>
                <div class="col-lg-10 input-grup">
                <i class="fa fa-list"></i>
                    <textarea id="sessions_details" name="sessions_details"  class="form-control text-right" placeholder="   تفاصيل الكورس" required><?php echo $result['sessions_details']?>  </textarea>
                </div>
            </div>

            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> ما يحصل عليه المتدرب:</label>
                <div class="col-lg-10 input-grup">
                <i class="fa fa-thumbs-up"></i>
                    <input type="text" id="sessions_goals"  name="sessions_goals" value="<?php echo $result['sessions_name']?>" class="form-control text-right" placeholder="   ما يحصل عليه المتدرب" required/>
                </div>
            </div>

            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> صورة الدورة:</label>
                <div class="col-lg-10 input-grup">
                    <img src="<?php echo base_url() ?>/uploads/thumbs/<?php echo $result['sessions_img']; ?> "  />
                    <input  type="file" name="sessions_img"   class="form-control text-right"  id="exampleInputFile"/>
                </div>
            </div>

            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> الفئات المستهدفة:</label>
                <div class="col-lg-10 input-grup">
                <i class="fa fa-diamond"></i>
                    <input type="text" id="sessions_for"  name="sessions_for"  value="<?php echo $result['sessions_for']?>" class="form-control text-right" placeholder="   الفئات المستهدفة" required/>
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
        <?php echo form_open_multipart('dashboard/add_sessions',array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>
            <legend  ="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>


            <div class="form-group"  ="wait 0.3s, then enter bottom and hustle 100%">
                <label for="select" class="col-lg-2 control-label">إختر اسم الدورة  </label>
                <div class="col-lg-10">

                    <select id="course_id_fk" name="course_id_fk" class="form-control">
                        <?foreach($Courses as $Course):?>
                            <option value="<?echo $Course->course_id_pk?> "><?echo $Course->course_name?>  </option>
                        <?endforeach?>
                    </select>
                </div>
            </div>

            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> إسم الكورس:</label>
                <div class="col-lg-10 input-grup">
                <i class="fa fa-wordpress"></i>

                    <input type="text" id="sessions_name"  name="sessions_name"  class="form-control text-right" placeholder="   إسم الكورس" required/>
                </div>
            </div>

            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> تكلفة الكورس:</label>
                <div class="col-lg-10 input-grup">


                    <input type="number" id="sessions_cost"  name="sessions_cost" class="form-control text-right" placeholder="          تكلفة الكورس " required/>
                </div>
            </div>

            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> عدد الساعات:</label>
                <div class="col-lg-10 input-grup">

                    <input type="number" id="sessions_time"  name="sessions_time" class="form-control text-right" placeholder="          عدد الساعات" required/>
                </div>
            </div>

            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> نبذة عن الكورس:</label>

                <div class="col-lg-10 input-grup">
                <i class="fa fa-list-alt"></i>
                    <input type="text" id="sessions_word"  name="sessions_word" class="form-control text-right" placeholder="   نبذة عن الكورس" required/>
                </div>
            </div>


            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> تفاصيل الكورس:</label>
                <div class="col-lg-10 input-grup">
                <i class="fa fa-list"></i>
                    <textarea id="sessions_details" name="sessions_details"  class="form-control text-right" placeholder="   تفاصيل الكورس" required>  </textarea>
                </div>
            </div>

            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> ما يحصل عليه المتدرب:</label>
                <div class="col-lg-10 input-grup">
                <i class="fa fa-thumbs-up"></i>
                    <input type="text" id="sessions_goals"  name="sessions_goals" class="form-control text-right" placeholder="   ما يحصل عليه المتدرب" required/>
                </div>
            </div>



            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> صورة الدورة:</label>
                <div class="col-lg-10 input-grup">
                    <input type="file" id="sessions_img"  name="sessions_img" class="form-control text-right" placeholder="   صورة الدورة" required/>
                </div>
            </div>

            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> الفئات المستهدفة:</label>
                <div class="col-lg-10 input-grup">
                <i class="fa fa-diamond"></i>
                    <input type="text" id="sessions_for"  name="sessions_for" class="form-control text-right" placeholder="   الفئات المستهدفة" required/>
                </div>
            </div>

            <div class="form-group"  ="wait 0.3s, then enter bottom and hustle 100%">
                <div class="col-xs-10 col-xs-pull-2">
                    <button type="reset" class="btn btn-default">إبدأ من جديد ؟</button>
                    <input type="submit"  name="add_sessions" value="حفظ" class="btn btn-primary" >
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
            <th  class="text-center">إسم الكورس</th>
            <th  width="40%" class="text-right">التحكم</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $x = 1;
        foreach($records as $record):?>
            <tr>
                <td data-title="#"><span class="badge"><?php echo $x++?></span></td>
                <td data-title=""> <p class="text-center"><?php echo $record->sessions_name?>
                    </p> </td>
                <td data-title="التحكم" class="text-center">
                    <a href="<?php echo base_url().'dashboard/add_videos/'.$record->sessions_id_pk.'/2'?>" class="btn btn-success btn-xs col-lg-3"> إضافة فيديو</a>
                    <button type="button" class="btn btn-info btn-xs col-lg-3" data-toggle="modal" data-target="#myModal<?php echo $record->sessions_id_pk?>"><i class="fa fa-list"></i> التفاصيل </button>
                    <a href="<?php echo base_url().'dashboard/update_Sessions/'.$record->sessions_id_pk?>" class="btn btn-warning btn-xs col-lg-3"><i class="fa fa-pencil-square"></i> تعديل</a>
                    <a  href="<?php echo base_url().'dashboard/delete_Sessions/'.$record->sessions_id_pk?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   col-lg-3"><i class="fa fa-trash"></i> حذف</a>
                </td>
            </tr>
            <div class="modal fade" id="myModal<?php echo $record->sessions_id_pk?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="gridSystemModalLabel">تفاصيل الدوارات التدريبة</h4>
                        </div>
                        <br />
                        <div class="modal-body">
                        <div class="row">
                        <div class="col-sm-3" style="font-size: 16px;">:إسم الدورة</div>
                        <div class="col-sm-9"  style="font-size: 16px;">
                            <?php echo $record->course_name?>
                        </div>
                        </div>
                        <br />
                        <div class="row">
                        <div class="col-sm-3" style="font-size: 16px;">:إسم الكورس</div>
                        <div class="col-sm-9"  style="font-size: 16px;">
                            <?php echo $record->sessions_name?>
                        </div>
                        </div>
                        <br />

                        <div class="row">
                            <div class="col-sm-3" style="font-size: 16px;">:صورة الكورس</div>
                            <div class="col-sm-9"  style="font-size: 16px;">


                                        <img src="<?php echo base_url() ?>/uploads/thumbs/<?php echo $record->sessions_img; ?> "  />


                                </div>
                                </div>

                            <br/>
                            <div class="row">
                            <div class="col-sm-3" style="font-size: 16px;">:تكلفة الكورس</div>
                            <div class="col-sm-9"  style="font-size: 16px;">
                                <?php echo $record->sessions_cost?> جنية
                            </div>
                            </div>
                            <br />
                            <div class="row">
                            <div class="col-sm-3" style="font-size: 16px;">:مدة الكورس</div>
                            <div class="col-sm-9"  style="font-size: 16px;">
                                <p> <?php echo $record->sessions_time ?> ساعة </p>
                            </div>
                            </div>
                            <br />
                            <div class="row">
                            <div class="col-sm-3" style="font-size: 16px;">:شهادة الكورس</div>
                            <div class="col-sm-9"  style="font-size: 16px;">
                                <p> <?php echo $record-> sessions_goals?> </p>
                            </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-sm-3" style="font-size: 16px;">:نبذة عن الكورس</div>
                                <div class="col-sm-9"  style="font-size: 16px;">
                                    <?php echo $record->sessions_word?>
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-sm-3" style="font-size: 16px;">:تفاصيل الكورس</div>
                                <div class="col-sm-9"  style="font-size: 16px;">
                                    <?php echo $record->sessions_details?>
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-sm-3" style="font-size: 16px;">:المستهدفين</div>
                                <div class="col-sm-9"  style="font-size: 16px;">
                                    <?php echo $record->sessions_for?>
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

