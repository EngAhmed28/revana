
<ul class="breadcrumb pb30">
    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> التقارير</a></li>
    <li class="active"><?php echo $title; ?></li>
</ul>
<span id="message">
<?php
if(isset($_SESSION['message']))

    echo $_SESSION['message'];

unset($_SESSION['message']);
?>
    </span>


<?php if(isset($records)&&$records!=null):?>
    <table id="no-more-tables" class="table table-bordered" role="table">
   
        <thead>
        <tr>
            <th width="2%">#</th>
          <!--  <th  class="text-center">إسم الدورة</th>-->
            <th  class="text-center">إسم الكورس</th>
            <th  class="text-center">عدد الساعات</th>
            <th  class="text-center">التكلفة</th>
            <th  width="10%" class="text-right">التفاصيل</th>
        </tr>
        </thead>
        <tbody>
        
       
        <?php 
        $x = 1;
        foreach($records as $record):?>
            <tr>
                <td data-title="#"><span class="badge"><?php echo $x++;?></span></td>
               <!-- <td><?php echo $record->course_name?></td>-->
                <td data-title=""> <p class="text-center"><?php echo $record->sessions_name?>
                    </p> </td>
                    
                <td><?php echo $record->sessions_time ?> ساعة </td>
                
                <td><?php echo $record->sessions_cost?> جنية </td>    
                
                <td class="text-right">
                    <button type="button" class="btn btn-info btn-xs col-lg-12" data-toggle="modal" data-target="#myModal<?php echo $record->sessions_id_pk?>"><i class="fa fa-list"></i> عرض </button>
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

