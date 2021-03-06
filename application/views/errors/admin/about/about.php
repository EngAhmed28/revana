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





<div class="well bs-component" >



    <?php if(isset($result)):?>




        <?php echo form_open_multipart('dashboard/updateAbout/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>





        <fieldset>





            <legend ><?php echo $title; ?></legend>








            <div class="form-group"  >


                <label for="inputUser" class="col-lg-2 control-label">عنوان المقطع:</label>


                <div class="col-lg-10 input-grup">


                    <i class="fa fa-newspaper-o"></i>





                    <input type="text" id="title"  value="<?php echo $result['title']; ?>" name="title" class="form-control text-right" placeholder="   عنوان المقطع">





                </div>


            </div>








            <div class="form-group"  >


                <label for="inputUser" class="col-lg-2 control-label">صورة المقطع:</label>


                <div class="col-lg-10 input-grup">






                    <input type="file" id="img" name="img" class="form-control text-right">


                    <span class="help-block"></span>





                </div>


            </div>


            


            <div class="form-group"  >


                <label for="inputUser" class="col-lg-2 control-label"></label>


                <div class="col-lg-10 input-grup">





                    <img src="<?php echo base_url('uploads/images/'.$result['image'].''); ?>" height="200px" width="200px">


                    <span class="help-block"></span>





                </div>


            </div>








            <div class="form-group"  >


                <label for="inputUser" class="col-lg-2 control-label">تفاصيل المقطع:</label>


                <div class="col-lg-10 input-grup">


                    <i class="fa fa-newspaper-o"></i>


                    <textarea type="text" id="content"  name="content" class="form-control text-right" placeholder="   تفاصيل المقطع" ><?php echo $result['content']; ?></textarea>


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





        <?php echo form_open_multipart('dashboard/addabout',array('class'=>"form-horizontal",'role'=>"form" ))?>


        <fieldset>





            <legend ><?php echo $title; ?></legend>








            <div class="form-group"  >


                <label for="inputUser" class="col-lg-2 control-label">عنوان المقطع:</label>


                <div class="col-lg-10 input-grup">


                    <i class="fa fa-newspaper-o"></i>





                    <input type="text" id="title"  name="title" class="form-control text-right" placeholder="   عنوان المقطع" required>





                </div>


            </div>








            <div class="form-group"  >


                <label for="inputUser" class="col-lg-2 control-label">صورة المقطع:</label>


                <div class="col-lg-10 input-grup">


                    <!--i class="fa fa-newspaper-o"></i-->





                    <input type="file" id="img" name="img" class="form-control text-right" required>


                    <span class="help-block"></span>





                </div>


            </div>








            <div class="form-group"  >


                <label for="inputUser" class="col-lg-2 control-label">تفاصيل المقطع:</label>


                <div class="col-lg-10 input-grup">


                    <i class="fa fa-newspaper-o"></i>


                    <textarea id="content"  name="content" class="form-control text-right" required="required"></textarea>


                </div>


            </div>








            <div class="form-group" >





                <div class="col-xs-10 col-xs-pull-2">





                    <button type="reset" class="btn btn-default">أبدء من جديد ؟</button>





                    <input type="submit"  name="add_about" value="حفظ" class="btn btn-primary" >


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





            <th  class="text-right">عنوان المقطع</th>





            <th class="text-right">تاريخ الإضافة</th>





            <th width="15%" class="text-right">التفاصيل</th>


            


            <th class="text-right">التحكم</th>





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


                <td data-title="عنوان المقطع"><?php echo $record->title?> </td>


                <td  data-title="تاريخ الإضافة"><?php echo date("Y-m-d",$record->date )?></td>





                <td data-title="التفاصيل" class="text-center">


                    <button type="button" class="btn btn-info btn-xs  " data-toggle="modal" data-target="#myModal<?php echo $record->id?>"><i class="fa fa-list"></i> التفاصيل </button>







                </td>


                


                <td data-title="التحكم" class="text-center">



                    <a href="<?php echo base_url().'dashboard/suspendAbout/'.$record->id.'/'.$class?>" class="btn btn-<?php echo $class ?> btn-xs col-lg-4"><?php echo $title ?> </a>

                    <a  href="<?php echo base_url().'dashboard/deleteAbout/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   col-lg-4"><i class="fa fa-trash"></i> حذف</a>



                    <a href="<?php echo base_url().'dashboard/updateAbout/'.$record->id?>" class="btn btn-warning btn-xs col-lg-4"><i class="fa fa-pencil"></i> تعديل</a>



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
                        <div class="col-sm-3">عنوان المقطع</div>
                        <div class="col-sm-9"><?php echo $record->title?></div>
                        <br />
                        <div class="modal-body">
                            <div class="col-md-3"> صورة المقطع </div>
                            <div class="col-md-9"><img src="<?php echo base_url('uploads/images/'.$record->image.''); ?>" height="200px" width="200px"> </div>
                            <br /><br /><br />
                            <div class="row">
                                <div class="col-sm-4" >تفاصيل المقطع</div>
                                <div class="col-sm-8">
                                    <?php echo $record->content?>
                                </div>
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





