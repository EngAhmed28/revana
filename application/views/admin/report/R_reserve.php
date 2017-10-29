<h2 class="text-flat">إدارة التقارير <span class="text-sm"><?php echo $title; ?></span></h2>
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


<?php if(isset($records)&&$records!=null):?>
    <table id="no-more-tables" class="table table-bordered" role="table">
        <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>تقرير الحجوزات.</p></caption>
        <thead>
        <tr>
            <th width="2%">#</th>
            <th  class="text-center">الإسم</th>
            <th  class="text-center">إسم الكورس</th>
            <th  class="text-center">حالة الحجز</th>
            
        </tr>
        </thead>
        <tbody>
        
       
        <?php 
        $x = 0;
        foreach($records as $record):
        $x++;
        
        if($record->session_reserve_confirm == 1)
            $status = '<b  class="btn btn-success btn-xs   "> <i class="fa fa-check"></i> تم التأكيد </b>';
        else
            $status = '<b  class="btn btn-warning btn-xs   "> <i class="fa fa-info"></i> لم يؤكد </b>';
            
        if($record->sessions_reserve_notes !='')
            $note = $record->sessions_reserve_notes;
        else
            $note = 'لا يوجد';
        ?>
            <tr data-toggle="tooltip" data-placement="bottom" title="إضغط للتفاصيل">
                <td><span class="badge"><?php echo $x?></span></td>
                <td data-toggle="modal" data-target="#myModall<?php echo $record->sessions_id_pk ?>"><?php echo $record->sessions_reserve_name?></td>
                <td data-toggle="modal" data-target="#myModal<?php echo $record->sessions_id_pk ?>"> <p class="text-center"><?php echo $record->sessions_name?>
                    </p> </td>
                <td> <p class="text-center"><?php echo $status?>
                    </p> </td>
                
            </tr>
            <div class="modal fade" id="myModall<?php echo $record->sessions_id_pk?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="gridSystemModalLabel">تفاصيل الطالب</h4>
                        </div>
                        <br />
                        <div class="modal-body">
                        
                        <div class="row">
                        <div class="col-sm-3" style="font-size: 16px;">:الإسم</div>
                        <div class="col-sm-9"  style="font-size: 16px;">
                            <?php echo $record->sessions_reserve_name?>
                        </div>
                        </div>
                        <br />

                        <div class="row">
                            <div class="col-sm-3" style="font-size: 16px;">الإيميل</div>
                            <div class="col-sm-9"  style="font-size: 16px;">
                               <?php echo $record->sessions_reserve_email; ?>
                                </div>
                                </div>
                                
                            <br/>
                            <div class="row">
                            <div class="col-sm-3" style="font-size: 16px;">:الجوال</div>
                            <div class="col-sm-9"  style="font-size: 16px;">
                                <?php echo $record->sessions_reserve_phone?>  
                            </div>
                            </div>
                            <br />
                            <div class="row">
                            <div class="col-sm-3" style="font-size: 16px;">:العنوان</div>
                            <div class="col-sm-9"  style="font-size: 16px;">
                                <p> <?php echo $record->sessions_reserve_address ?>  </p>
                            </div>
                            </div>
                            <br />
                            <div class="row">
                            <div class="col-sm-3" style="font-size: 16px;">:المهنة</div>
                            <div class="col-sm-9"  style="font-size: 16px;">
                                <p> <?php echo $record-> sessions_reserve_work?> </p>
                            </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-sm-3" style="font-size: 16px;">:جهه العمل</div>
                                <div class="col-sm-9"  style="font-size: 16px;">
                                    <?php echo $record->sessions_reserve_work_at?>
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-sm-3" style="font-size: 16px;">:ملاحظات</div>
                                <div class="col-sm-9"  style="font-size: 16px;">
                                    <?php echo $note; ?>
                                </div>
                            </div>
                            

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            
            
            
            
            
            
            <div class="modal fade" id="myModal<?php echo $record->sessions_id_pk?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="gridSystemModalLabel">تفاصيل الكورس</h4>
                        </div>
                        <br />
                        <div class="modal-body">
                        
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


<style>
td { cursor: pointer; cursor: hand; }

</style>