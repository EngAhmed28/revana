<h2 class="text-flat">إدارة التسجيلات  <span class="text-sm"></span></h2>

<div class="tab">
    <button class="tablinks pull-right" onclick="openCity(event, 'male')" id="defaultOpen">رجال </button>
    <button class="tablinks pull-right" onclick="openCity(event, 'female')">نساء</button>

</div>
 <br><br><br><br>
<div id="male" class="tabcontent">
    <div>
        <div class="tab">
            <button class="tablinks pull-right" onclick="openTab(event, 'all_m')" id="default1pen"> التسجيلات الواردة </button>
            <button class="tablinks pull-right" onclick="openTab(event, 'accepted_m')">التسجيلات الموافق عليها</button>
            <button class="tablinks pull-right" onclick="openTab(event, 'refused_m')">التسجيلات المرفوضة</button>
        </div>
        <div id="all_m" class="tabcontent2">
            <? if(empty($records_all)):?>
                <br><br>
                <div class="alert alert-danger" role="alert">
                    <strong>عذرا...!</strong> لا توجد تسجيلات واردة
                </div>
            <? else:?>
            <table id="no-more-tables" class="table table-bordered" role="table">
                <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>التسجيلات الواردة.</p></caption>
                <thead>
                <tr>
                    <th   class="text-right">م</th>
                    <th   class="text-right">رقم الجوال</th>
                    <th  class="text-right">التفاصيل</th>
                    <th   class="text-right">الإجراء</th>
                </tr>
                </thead>
                <tbody><tr>
                <? if (!empty($records_all)):
                $count=0;
                foreach ($records_all as $row):
                $count++;
                ?>
                <td   class="text-right"><? echo $count; ?> </td>
                <td   class="text-right"><? echo $row->phone; ?></td>
                <td  class="text-right"><button type="button" class="btn btn-info btn-xs  " data-toggle="modal" data-target="#myModal<?php echo $row->id?>"><i class="fa fa-list"></i> التفاصيل </button></td>
                <td   class="text-right">
                    <div class="row">
                        <div class="col-md-3">
                            <a data-toggle="tooltip" data-placement="bottom" title="موافقة" href="<?php echo base_url().'dashboard/suspend_app/1/'.$row->id?>" class="btn btn-success btn-xs   "> <i class="fa fa-check"></i></a>
                        </div>
                        <div class="col-md-3">
                            <a data-toggle="tooltip" data-placement="bottom" title="مرفوضة" href="<?php echo base_url().'dashboard/suspend_app/2/'.$row->id?>" class="btn btn-danger btn-xs   "> <i class="fa fa-times"></i></a>
                        </div>

                </td>
                </tr>
                <?
                $gender ='' ;
                if($row->gender ==1){
                    $gender ='ذكر' ;
                }
                elseif ($row->gender ==2){
                      $gender ='أنثي' ;

                }?>
                <!----------------------------------------------------------------------------------------------------------------------->
                <div class="modal fade" id="myModal<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="gridSystemModalLabel"></h4>
                            </div>
                            <div class="modal-body">
                            <div class="col-sm-3">الجنس</div>
                            <div class="col-sm-9"><?php echo $gender; ?></div>
                            <br />
                            <div class="col-sm-3">الإسم الأول</div>
                            <div class="col-sm-9"><?php echo $row->first_name; ?></div>
                            <br />
                            <div class="col-sm-3">الإسم الأخير</div>
                            <div class="col-sm-9"><?php echo $row->last_name; ?></div>
                            <br />
                            <div class="col-sm-3">رقم الهوية</div>
                            <div class="col-sm-9"><?php echo $row->id_number; ?></div>
                            <br />
                            <div class="col-sm-3">الإيميل</div>
                            <div class="col-sm-9"><?php echo $row->email; ?></div>
                            <br />
                            <div class="col-sm-3">المدينة</div>
                            <div class="col-sm-9"><?php echo $row->city; ?></div>
                            <br />
                            <div class="col-sm-3">الدولة</div>
                            <div class="col-sm-9"><?php echo $row->country; ?></div>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                          <!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>
                    <!----------------------------------------------------------------------------------------------------------------------->
                <?  endforeach; endif;?>
                </tbody>
                </table>
            <? endif;?>
            </div>
        <div id="accepted_m" class="tabcontent2">
            <? if(empty($records_acc)):?>
                <br><br>
                <div class="alert alert-danger" role="alert">
                    <strong>عذرا...!</strong> لا توجد تسجيلات موافق عليها
                </div>
            <? else:?>
            <table id="no-more-tables" class="table table-bordered" role="table">
                <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>التسجيلات الموافق عليها.</p></caption>
                <thead>
                <tr>
                    <th   class="text-right">م</th>
                    <th   class="text-right">رقم الجوال</th>
                    <th  class="text-right">التفاصيل</th>
                    <th   class="text-right">الإجراء</th>
                </tr>
                </thead>
                <tbody><tr>
                    <? if (!empty($records_acc)):
                    $count=0;
                    foreach ($records_acc as $row):
                    $count++;
                    ?>
                    <td   class="text-right"><? echo $count; ?> </td>
                    <td   class="text-right"><? echo $row->phone; ?></td>
                    <td  class="text-right"><button type="button" class="btn btn-info btn-xs  " data-toggle="modal" data-target="#myModal<?php echo $row->id?>"><i class="fa fa-list"></i> التفاصيل </button></td>
                    <td   class="text-right">
                        <div class="row">
                            <div class="col-md-3">
                                <a data-toggle="tooltip" data-placement="bottom" title="مرفوضة" href="<?php echo base_url().'dashboard/suspend_app/2/'.$row->id?>" class="btn btn-danger btn-xs   "> <i class="fa fa-times"></i></a>
                            </div>

                    </td>
                </tr>
                <?
                $gender ='' ;
                if($row->gender ==1){
                    $gender ='ذكر' ;
                }
                elseif ($row->gender ==2){
                    $gender ='أنثي' ;

                }?>
                <!----------------------------------------------------------------------------------------------------------------------->
                <div class="modal fade" id="myModal<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="gridSystemModalLabel"></h4>
                            </div>
                            <div class="modal-body">
                                <div class="col-sm-3">الجنس</div>
                                <div class="col-sm-9"><?php echo $gender; ?></div>
                                <br />
                                <div class="col-sm-3">الإسم الأول</div>
                                <div class="col-sm-9"><?php echo $row->first_name; ?></div>
                                <br />
                                <div class="col-sm-3">الإسم الأخير</div>
                                <div class="col-sm-9"><?php echo $row->last_name; ?></div>
                                <br />
                                <div class="col-sm-3">رقم الهوية</div>
                                <div class="col-sm-9"><?php echo $row->id_number; ?></div>
                                <br />
                                <div class="col-sm-3">الإيميل</div>
                                <div class="col-sm-9"><?php echo $row->email; ?></div>
                                <br />
                                <div class="col-sm-3">المدينة</div>
                                <div class="col-sm-9"><?php echo $row->city; ?></div>
                                <br />
                                <div class="col-sm-3">الدولة</div>
                                <div class="col-sm-9"><?php echo $row->country; ?></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                            <!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>
                    <!----------------------------------------------------------------------------------------------------------------------->
                    <?  endforeach; endif;?>
                </tbody>
            </table>
            <? endif;?>
        </div>
        <div id="refused_m" class="tabcontent2">
            <? if(empty($records_ref)):?>
                <br><br>
         <div class="alert alert-danger" role="alert">
                <strong>عذرا...!</strong> لا توجدتسجيلات مرفوضة
            </div>
            <? else:?>
            <table id="no-more-tables" class="table table-bordered" role="table">
                <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>التسجيلات المرفوضة.</p></caption>
                <thead>
                <tr>
                    <th   class="text-right">م</th>
                    <th   class="text-right">رقم الجوال</th>
                    <th  class="text-right">التفاصيل</th>
                    <th   class="text-right">الإجراء</th>
                </tr>
                </thead>
                <tbody><tr>
                    <? if (!empty($records_ref)):
                    $count=0;
                    foreach ($records_ref as $row):
                    $count++;
                    ?>
                    <td   class="text-right"><? echo $count; ?> </td>
                    <td   class="text-right"><? echo $row->phone; ?></td>
                    <td  class="text-right"><button type="button" class="btn btn-info btn-xs  " data-toggle="modal" data-target="#myModal<?php echo $row->id?>"><i class="fa fa-list"></i> التفاصيل </button></td>
                    <td   class="text-right">
                        <div class="row">
                            <div class="col-md-3">
                                <a data-toggle="tooltip" data-placement="bottom" title="موافقة" href="<?php echo base_url().'dashboard/suspend_app/1/'.$row->id?>" class="btn btn-success btn-xs   "> <i class="fa fa-check"></i></a>
                            </div>
                    </td>
                </tr>
                <?
                $gender ='' ;
                if($row->gender ==1){
                    $gender ='ذكر' ;
                }
                elseif ($row->gender ==2){
                    $gender ='أنثي' ;

                }?>
                <!----------------------------------------------------------------------------------------------------------------------->
                <div class="modal fade" id="myModal<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="gridSystemModalLabel"></h4>
                            </div>
                            <div class="modal-body">
                                <div class="col-sm-3">الجنس</div>
                                <div class="col-sm-9"><?php echo $gender; ?></div>
                                <br />
                                <div class="col-sm-3">الإسم الأول</div>
                                <div class="col-sm-9"><?php echo $row->first_name; ?></div>
                                <br />
                                <div class="col-sm-3">الإسم الأخير</div>
                                <div class="col-sm-9"><?php echo $row->last_name; ?></div>
                                <br />
                                <div class="col-sm-3">رقم الهوية</div>
                                <div class="col-sm-9"><?php echo $row->id_number; ?></div>
                                <br />
                                <div class="col-sm-3">الإيميل</div>
                                <div class="col-sm-9"><?php echo $row->email; ?></div>
                                <br />
                                <div class="col-sm-3">المدينة</div>
                                <div class="col-sm-9"><?php echo $row->city; ?></div>
                                <br />
                                <div class="col-sm-3">الدولة</div>
                                <div class="col-sm-9"><?php echo $row->country; ?></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                            <!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>
                    <!----------------------------------------------------------------------------------------------------------------------->
                    <?  endforeach; endif;?>
                </tbody>
            </table>
            <? endif;?>
        </div>

    </div>
</div>


<div id="female" class="tabcontent">
        <div>
            <div class="tab">
                <button class="tablinks pull-right" onclick="openTabs(event, 'all_f')" id="default2pen"> التسجيلات الواردة </button>
                <button class="tablinks pull-right" onclick="openTabs(event, 'accepted_f')">التسجيلات الموافق عليها</button>
                <button class="tablinks pull-right" onclick="openTabs(event, 'refused_f')">التسجيلات المرفوضة</button>
            </div>
            <div id="all_f" class="tabcontent3">
                <? if(empty($records_all_f)):?>
                    <br><br>
                    <div class="alert alert-danger" role="alert">
                        <strong>عذرا...!</strong> لا توجد تسجيلات واردة
                    </div>
                <? else:?>
                    <table id="no-more-tables" class="table table-bordered" role="table">
                        <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>التسجيلات الواردة.</p></caption>
                        <thead>
                        <tr>
                            <th   class="text-right">م</th>
                            <th   class="text-right">رقم الجوال</th>
                            <th  class="text-right">التفاصيل</th>
                            <th   class="text-right">الإجراء</th>
                        </tr>
                        </thead>
                        <tbody><tr>
                            <? if (!empty($records_all_f)):
                            $count=0;
                            foreach ($records_all_f as $row):
                            $count++;
                            ?>
                            <td   class="text-right"><? echo $count; ?> </td>
                            <td   class="text-right"><? echo $row->phone; ?></td>
                            <td  class="text-right"><button type="button" class="btn btn-info btn-xs  " data-toggle="modal" data-target="#myModal<?php echo $row->id?>"><i class="fa fa-list"></i> التفاصيل </button></td>
                            <td   class="text-right">
                                <div class="row">
                                    <div class="col-md-3">
                                        <a data-toggle="tooltip" data-placement="bottom" title="موافقة" href="<?php echo base_url().'dashboard/suspend_app/1/'.$row->id?>" class="btn btn-success btn-xs   "> <i class="fa fa-check"></i></a>
                                    </div>
                                    <div class="col-md-3">
                                        <a data-toggle="tooltip" data-placement="bottom" title="مرفوضة" href="<?php echo base_url().'dashboard/suspend_app/2/'.$row->id?>" class="btn btn-danger btn-xs   "> <i class="fa fa-times"></i></a>
                                    </div>

                            </td>
                        </tr>
                        <?
                        $gender ='' ;
                        if($row->gender ==1){
                            $gender ='ذكر' ;
                        }
                        elseif ($row->gender ==2){
                            $gender ='أنثي' ;

                        }?>
                        <!----------------------------------------------------------------------------------------------------------------------->
                        <div class="modal fade" id="myModal<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="gridSystemModalLabel"></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-sm-3">الجنس</div>
                                        <div class="col-sm-9"><?php echo $gender; ?></div>
                                        <br />
                                        <div class="col-sm-3">الإسم الأول</div>
                                        <div class="col-sm-9"><?php echo $row->first_name; ?></div>
                                        <br />
                                        <div class="col-sm-3">الإسم الأخير</div>
                                        <div class="col-sm-9"><?php echo $row->last_name; ?></div>
                                        <br />
                                        <div class="col-sm-3">رقم الهوية</div>
                                        <div class="col-sm-9"><?php echo $row->id_number; ?></div>
                                        <br />
                                        <div class="col-sm-3">الإيميل</div>
                                        <div class="col-sm-9"><?php echo $row->email; ?></div>
                                        <br />
                                        <div class="col-sm-3">المدينة</div>
                                        <div class="col-sm-9"><?php echo $row->city; ?></div>
                                        <br />
                                        <div class="col-sm-3">الدولة</div>
                                        <div class="col-sm-9"><?php echo $row->country; ?></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                    </div>
                                    <!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>
                            <!----------------------------------------------------------------------------------------------------------------------->
                            <?  endforeach; endif;?>
                        </tbody>
                    </table>
                <? endif;?>
            </div>
            <div id="accepted_f" class="tabcontent3">
                <? if(empty($records_acc_f)):?>
                    <br><br>
                    <div class="alert alert-danger" role="alert">
                        <strong>عذرا...!</strong> لا توجد تسجيلات موافق عليها
                    </div>
                <? else:?>
                    <table id="no-more-tables" class="table table-bordered" role="table">
                        <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>التسجيلات الموافق عليها.</p></caption>
                        <thead>
                        <tr>
                            <th   class="text-right">م</th>
                            <th   class="text-right">رقم الجوال</th>
                            <th  class="text-right">التفاصيل</th>
                            <th   class="text-right">الإجراء</th>
                        </tr>
                        </thead>
                        <tbody><tr>
                            <? if (!empty($records_acc_f)):
                            $count=0;
                            foreach ($records_acc_f as $row):
                            $count++;
                            ?>
                            <td   class="text-right"><? echo $count; ?> </td>
                            <td   class="text-right"><? echo $row->phone; ?></td>
                            <td  class="text-right"><button type="button" class="btn btn-info btn-xs  " data-toggle="modal" data-target="#myModal<?php echo $row->id?>"><i class="fa fa-list"></i> التفاصيل </button></td>
                            <td   class="text-right">
                                <div class="row">
                                    <div class="col-md-3">
                                        <a data-toggle="tooltip" data-placement="bottom" title="مرفوضة" href="<?php echo base_url().'dashboard/suspend_app/2/'.$row->id?>" class="btn btn-danger btn-xs   "> <i class="fa fa-times"></i></a>
                                    </div>

                            </td>
                        </tr>
                        <?
                        $gender ='' ;
                        if($row->gender ==1){
                            $gender ='ذكر' ;
                        }
                        elseif ($row->gender ==2){
                            $gender ='أنثي' ;

                        }?>
                        <!----------------------------------------------------------------------------------------------------------------------->
                        <div class="modal fade" id="myModal<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="gridSystemModalLabel"></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-sm-3">الجنس</div>
                                        <div class="col-sm-9"><?php echo $gender; ?></div>
                                        <br />
                                        <div class="col-sm-3">الإسم الأول</div>
                                        <div class="col-sm-9"><?php echo $row->first_name; ?></div>
                                        <br />
                                        <div class="col-sm-3">الإسم الأخير</div>
                                        <div class="col-sm-9"><?php echo $row->last_name; ?></div>
                                        <br />
                                        <div class="col-sm-3">رقم الهوية</div>
                                        <div class="col-sm-9"><?php echo $row->id_number; ?></div>
                                        <br />
                                        <div class="col-sm-3">الإيميل</div>
                                        <div class="col-sm-9"><?php echo $row->email; ?></div>
                                        <br />
                                        <div class="col-sm-3">المدينة</div>
                                        <div class="col-sm-9"><?php echo $row->city; ?></div>
                                        <br />
                                        <div class="col-sm-3">الدولة</div>
                                        <div class="col-sm-9"><?php echo $row->country; ?></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                    </div>
                                    <!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>
                            <!----------------------------------------------------------------------------------------------------------------------->
                            <?  endforeach; endif;?>
                        </tbody>
                    </table>
                <? endif;?>
            </div>
            <div id="refused_f" class="tabcontent3">
                <? if(empty($records_ref_f)):?>
                    <br><br>
                    <div class="alert alert-danger" role="alert">
                        <strong>عذرا...!</strong> لا توجدتسجيلات مرفوضة
                    </div>
                <? else:?>
                    <table id="no-more-tables" class="table table-bordered" role="table">
                        <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>التسجيلات المرفوضة.</p></caption>
                        <thead>
                        <tr>
                            <th   class="text-right">م</th>
                            <th   class="text-right">رقم الجوال</th>
                            <th  class="text-right">التفاصيل</th>
                            <th   class="text-right">الإجراء</th>
                        </tr>
                        </thead>
                        <tbody><tr>
                            <? if (!empty($records_ref_f)):
                            $count=0;
                            foreach ($records_ref_f as $row):
                            $count++;
                            ?>
                            <td   class="text-right"><? echo $count; ?> </td>
                            <td   class="text-right"><? echo $row->phone; ?></td>
                            <td  class="text-right"><button type="button" class="btn btn-info btn-xs  " data-toggle="modal" data-target="#myModal<?php echo $row->id?>"><i class="fa fa-list"></i> التفاصيل </button></td>
                            <td   class="text-right">
                                <div class="row">
                                    <div class="col-md-3">
                                        <a data-toggle="tooltip" data-placement="bottom" title="موافقة" href="<?php echo base_url().'dashboard/suspend_app/1/'.$row->id?>" class="btn btn-success btn-xs   "> <i class="fa fa-check"></i></a>
                                    </div>
                            </td>
                        </tr>
                        <?
                        $gender ='' ;
                        if($row->gender ==1){
                            $gender ='ذكر' ;
                        }
                        elseif ($row->gender ==2){
                            $gender ='أنثي' ;

                        }?>
                        <!----------------------------------------------------------------------------------------------------------------------->
                        <div class="modal fade" id="myModal<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="gridSystemModalLabel"></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-sm-3">الجنس</div>
                                        <div class="col-sm-9"><?php echo $gender; ?></div>
                                        <br />
                                        <div class="col-sm-3">الإسم الأول</div>
                                        <div class="col-sm-9"><?php echo $row->first_name; ?></div>
                                        <br />
                                        <div class="col-sm-3">الإسم الأخير</div>
                                        <div class="col-sm-9"><?php echo $row->last_name; ?></div>
                                        <br />
                                        <div class="col-sm-3">رقم الهوية</div>
                                        <div class="col-sm-9"><?php echo $row->id_number; ?></div>
                                        <br />
                                        <div class="col-sm-3">الإيميل</div>
                                        <div class="col-sm-9"><?php echo $row->email; ?></div>
                                        <br />
                                        <div class="col-sm-3">المدينة</div>
                                        <div class="col-sm-9"><?php echo $row->city; ?></div>
                                        <br />
                                        <div class="col-sm-3">الدولة</div>
                                        <div class="col-sm-9"><?php echo $row->country; ?></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                    </div>
                                    <!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>
                            <!----------------------------------------------------------------------------------------------------------------------->
                            <?  endforeach; endif;?>
                        </tbody>
                    </table>
                <? endif;?>
            </div>
        </div>
</div>

<style>
    body {font-family: "Lato", sans-serif;}

    /* Style the tab */
    div.tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    div.tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
    }

    /* Change background color of buttons on hover */
    div.tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    div.tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }
</style>
<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>
<!----------------------------------------------->
<script>
    function openTab(avi, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent2");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks2");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabName).style.display = "block";
        avi.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("default1pen").click();
</script>
<!---------------------------------------------------->
<script>
    function openTabs(avs, tab2Name) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent3");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks3");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tab2Name).style.display = "block";
        avs.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("default2pen").click();
</script>

