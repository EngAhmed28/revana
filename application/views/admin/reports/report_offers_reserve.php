<h2 class="text-flat">إدارة التسجيلات  <span class="text-sm"></span></h2>

<div class="tab">
    <button class="tablinks pull-right" onclick="openCity(event, 'offer')" id="defaultOpen">حجوزات العروض </button>
    <button class="tablinks pull-right" onclick="openCity(event, 'course')">حجوزات الكورس</button>
</div>
 <br><br><br><br>
<div id="offer" class="tabcontent">
    <div>
        <div class="tab">
            <button class="tablinks pull-right" onclick="openTab(event, 'all_m')" id="default1pen">  طلبات حجز للعروض الواردة </button>
            <button class="tablinks pull-right" onclick="openTab(event, 'accepted_m')"> طلبات حجز للعروض الموافق عليها</button>
            <button class="tablinks pull-right" onclick="openTab(event, 'refused_m')"> طلبات حجز للعروض المرفوضة</button>
        </div>
        <div id="all_m" class="tabcontent2">
            <? if(empty($records_offers_all)):?>
                <br><br>
                <div class="alert alert-danger" role="alert">
                    <strong>عذرا...!</strong> لا توجد  طلبات حجز للعروض واردة
                </div>
            <? else:?>
            <table id="no-more-tables" class="table table-bordered" role="table">
                <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i> طلبات حجز للعروض الواردة.</p></caption>
                <thead>
                <tr>
                    <th   class="text-right">م</th>
                    <th   class="text-right">رقم الجوال</th>
                    <th  class="text-right">التفاصيل</th>
                    <th   class="text-right">الإجراء</th>
                </tr>
                </thead>
                <tbody><tr>
                <? if (!empty($records_offers_all)):
                $count=0;
                foreach ($records_offers_all as $row):
                $count++;
                ?>
                <td   class="text-right"><? echo $count; ?> </td>
                <td   class="text-right"><? echo $row->offers_reserve_phone; ?></td>
                <td  class="text-right"><button type="button" class="btn btn-info btn-xs  " data-toggle="modal" data-target="#myModal<?php echo $row->id?>"><i class="fa fa-list"></i> التفاصيل </button></td>
                <td   class="text-right">
                    <div class="row">
                        <div class="col-md-3">
                            <a data-toggle="tooltip" data-placement="bottom" title="موافقة" href="<?php echo base_url().'dashboard/suspend_offers_app/1/'.$row->id?>" class="btn btn-success btn-xs   "> <i class="fa fa-check"></i></a>
                        </div>
                        <div class="col-md-3">
                            <a data-toggle="tooltip" data-placement="bottom" title="مرفوضة" href="<?php echo base_url().'dashboard/suspend_offers_app/2/'.$row->id?>" class="btn btn-danger btn-xs   "> <i class="fa fa-times"></i></a>
                        </div>

                </td>
                </tr>
                <!----------------------------------------------------------------------------------------------------------------------->
                <div class="modal fade" id="myModal<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="gridSystemModalLabel"></h4>
                            </div>
                            <div class="modal-body">
                            <div class="col-sm-3">إسم المتدرب</div>
                            <div class="col-sm-9"><?php echo $row->offers_reserve_name; ?></div>
                            <br />
                            <div class="col-sm-3">رقم الهوية</div>
                            <div class="col-sm-9"><?php echo $row->number; ?></div>
                            <br />
                            <div class="col-sm-3">المؤهل</div>
                            <div class="col-sm-9"><?php echo $row->offers_reserve_qualification; ?></div>
                            <br />
                            <div class="col-sm-3">مكان الميلاد</div>
                            <div class="col-sm-9"><?php echo $row->offers_reserve_barth_place; ?></div>
                            <br />
                            <div class="col-sm-3">مصدر الهوية</div>
                            <div class="col-sm-9"><?php echo $row->place_of_number; ?></div>

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
            <? if(empty($records_offers_acc)):?>
                <br><br>
                <div class="alert alert-danger" role="alert">
                    <strong>عذرا...!</strong> لا توجد  طلبات حجز للعروض موافق عليها
                </div>
            <? else:?>
            <table id="no-more-tables" class="table table-bordered" role="table">
                <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i> طلبات حجز للعروض الموافق عليها.</p></caption>
                <thead>
                <tr>
                    <th   class="text-right">م</th>
                    <th   class="text-right">رقم الجوال</th>
                    <th  class="text-right">التفاصيل</th>
                    <th   class="text-right">الإجراء</th>
                </tr>
                </thead>
                <tbody><tr>
                    <? if (!empty($records_offers_acc)):
                    $count=0;
                    foreach ($records_offers_acc as $row):
                    $count++;
                    ?>
                    <td   class="text-right"><? echo $count; ?> </td>
                    <td   class="text-right"><? echo $row->offers_reserve_phone; ?></td>
                    <td  class="text-right"><button type="button" class="btn btn-info btn-xs  " data-toggle="modal" data-target="#myModal<?php echo $row->id?>"><i class="fa fa-list"></i> التفاصيل </button></td>
                    <td   class="text-right">
                        <div class="row">
                            <div class="col-md-3">
                                <a data-toggle="tooltip" data-placement="bottom" title="مرفوضة" href="<?php echo base_url().'dashboard/suspend_offers_app/2/'.$row->id?>" class="btn btn-danger btn-xs   "> <i class="fa fa-times"></i></a>
                            </div>

                    </td>
                </tr>
                <!----------------------------------------------------------------------------------------------------------------------->
                <div class="modal fade" id="myModal<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="gridSystemModalLabel"></h4>
                            </div>
                            <div class="modal-body">
                                <div class="col-sm-3">إسم المتدرب</div>
                                <div class="col-sm-9"><?php echo $row->offers_reserve_name; ?></div>
                                <br />
                                <div class="col-sm-3">رقم الهوية</div>
                                <div class="col-sm-9"><?php echo $row->number; ?></div>
                                <br />
                                <div class="col-sm-3">المؤهل</div>
                                <div class="col-sm-9"><?php echo $row->offers_reserve_qualification; ?></div>
                                <br />
                                <div class="col-sm-3">مكان الميلاد</div>
                                <div class="col-sm-9"><?php echo $row->offers_reserve_barth_place; ?></div>
                                <br />
                                <div class="col-sm-3">مصدر الهوية</div>
                                <div class="col-sm-9"><?php echo $row->place_of_number; ?></div>

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
            <? if(empty($records_offers_ref)):?>
                <br><br>
         <div class="alert alert-danger" role="alert">
                <strong>عذرا...!</strong> لا توجد طلبات حجز للعروض مرفوضة
            </div>
            <? else:?>
            <table id="no-more-tables" class="table table-bordered" role="table">
                <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i> طلبات حجز للعروض المرفوضة.</p></caption>
                <thead>
                <tr>
                    <th   class="text-right">م</th>
                    <th   class="text-right">رقم الجوال</th>
                    <th  class="text-right">التفاصيل</th>
                    <th   class="text-right">الإجراء</th>
                </tr>
                </thead>
                <tbody><tr>
                    <? if (!empty($records_offers_ref)):
                    $count=0;
                    foreach ($records_offers_ref as $row):
                    $count++;
                    ?>
                    <td   class="text-right"><? echo $count; ?> </td>
                    <td   class="text-right"><? echo $row->offers_reserve_phone; ?></td>
                    <td  class="text-right"><button type="button" class="btn btn-info btn-xs  " data-toggle="modal" data-target="#myModal<?php echo $row->id?>"><i class="fa fa-list"></i> التفاصيل </button></td>
                    <td   class="text-right">
                        <div class="row">
                            <div class="col-md-3">
                                <a data-toggle="tooltip" data-placement="bottom" title="موافقة" href="<?php echo base_url().'dashboard/suspend_offers_app/1/'.$row->id?>" class="btn btn-success btn-xs   "> <i class="fa fa-check"></i></a>
                            </div>
                    </td>
                </tr>
                <!----------------------------------------------------------------------------------------------------------------------->
                <div class="modal fade" id="myModal<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="gridSystemModalLabel"></h4>
                            </div>
                            <div class="modal-body">
                                <div class="col-sm-3">إسم المتدرب</div>
                                <div class="col-sm-9"><?php echo $row->offers_reserve_name; ?></div>
                                <br />
                                <div class="col-sm-3">رقم الهوية</div>
                                <div class="col-sm-9"><?php echo $row->number; ?></div>
                                <br />
                                <div class="col-sm-3">المؤهل</div>
                                <div class="col-sm-9"><?php echo $row->offers_reserve_qualification; ?></div>
                                <br />
                                <div class="col-sm-3">مكان الميلاد</div>
                                <div class="col-sm-9"><?php echo $row->offers_reserve_barth_place; ?></div>
                                <br />
                                <div class="col-sm-3">مصدر الهوية</div>
                                <div class="col-sm-9"><?php echo $row->place_of_number; ?></div>

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


<div id="course" class="tabcontent">
        <div>
            <div class="tab">
                <button class="tablinks pull-right" onclick="openTabs(event, 'all_f')" id="default2pen">  طلبات حجز الكورسات الواردة </button>
                <button class="tablinks pull-right" onclick="openTabs(event, 'accepted_f')"> طلبات حجز الكورسات الموافق عليها</button>
                <button class="tablinks pull-right" onclick="openTabs(event, 'refused_f')"> طلبات حجز الكورسات المرفوضة</button>
            </div>
            <div id="all_f" class="tabcontent3">
                <? if(empty($records_courses_all)):?>
                    <br><br>
                    <div class="alert alert-danger" role="alert">
                        <strong>عذرا...!</strong> لا توجد تسجيلات واردة
                    </div>
                <? else:?>
                    <table id="no-more-tables" class="table table-bordered" role="table">
                        <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i> طلبات حجز الكورسات الواردة.</p></caption>
                        <thead>
                        <tr>
                            <th   class="text-right">م</th>
                            <th   class="text-right">رقم الجوال</th>
                            <th  class="text-right">التفاصيل</th>
                            <th   class="text-right">الإجراء</th>
                        </tr>
                        </thead>
                        <tbody><tr>
                            <? if (!empty($records_courses_all)):
                            $count=0;
                            foreach ($records_courses_all as $row):
                            $count++;
                            ?>
                            <td   class="text-right"><? echo $count; ?> </td>
                            <td   class="text-right"><? echo $row->courses_reserve_phone; ?></td>
                            <td  class="text-right"><button type="button" class="btn btn-info btn-xs  " data-toggle="modal" data-target="#myModal<?php echo $row->id?>"><i class="fa fa-list"></i> التفاصيل </button></td>
                            <td   class="text-right">
                                <div class="row">
                                    <div class="col-md-3">
                                        <a data-toggle="tooltip" data-placement="bottom" title="موافقة" href="<?php echo base_url().'dashboard/suspend_courses_app/1/'.$row->id?>" class="btn btn-success btn-xs   "> <i class="fa fa-check"></i></a>
                                    </div>
                                    <div class="col-md-3">
                                        <a data-toggle="tooltip" data-placement="bottom" title="مرفوضة" href="<?php echo base_url().'dashboard/suspend_courses_app/2/'.$row->id?>" class="btn btn-danger btn-xs   "> <i class="fa fa-times"></i></a>
                                    </div>

                            </td>
                        </tr>
                        <!----------------------------------------------------------------------------------------------------------------------->
                        <div class="modal fade" id="myModal<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="gridSystemModalLabel"></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-sm-3">إسم المتدرب</div>
                                        <div class="col-sm-9"><?php echo $row->courses_reserve_name; ?></div>
                                        <br />
                                        <div class="col-sm-3">رقم الهوية</div>
                                        <div class="col-sm-9"><?php echo $row->number; ?></div>
                                        <br />
                                        <div class="col-sm-3">المؤهل</div>
                                        <div class="col-sm-9"><?php echo $row->courses_reserve_qualification; ?></div>
                                        <br />
                                        <div class="col-sm-3">مكان الميلاد</div>
                                        <div class="col-sm-9"><?php echo $row->courses_reserve_barth_place; ?></div>
                                        <br />
                                        <div class="col-sm-3">مصدر الهوية</div>
                                        <div class="col-sm-9"><?php echo $row->place_of_number; ?></div>
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
                <? if(empty($records_courses_acc)):?>
                    <br><br>
                    <div class="alert alert-danger" role="alert">
                        <strong>عذرا...!</strong> لا توجد تسجيلات موافق عليها
                    </div>
                <? else:?>
                    <table id="no-more-tables" class="table table-bordered" role="table">
                        <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i> طلبات حجز الكورسات الموافق عليها.</p></caption>
                        <thead>
                        <tr>
                            <th   class="text-right">م</th>
                            <th   class="text-right">رقم الجوال</th>
                            <th  class="text-right">التفاصيل</th>
                            <th   class="text-right">الإجراء</th>
                        </tr>
                        </thead>
                        <tbody><tr>
                            <? if (!empty($records_courses_acc)):
                            $count=0;
                            foreach ($records_courses_acc as $row):
                            $count++;
                            ?>
                            <td   class="text-right"><? echo $count; ?> </td>
                            <td   class="text-right"><? echo $row->courses_reserve_phone; ?></td>
                            <td  class="text-right"><button type="button" class="btn btn-info btn-xs  " data-toggle="modal" data-target="#myModal<?php echo $row->id?>"><i class="fa fa-list"></i> التفاصيل </button></td>
                            <td   class="text-right">
                                <div class="row">
                                    <div class="col-md-3">
                                        <a data-toggle="tooltip" data-placement="bottom" title="مرفوضة" href="<?php echo base_url().'dashboard/suspend_courses_app/2/'.$row->id?>" class="btn btn-danger btn-xs   "> <i class="fa fa-times"></i></a>
                                    </div>

                            </td>
                        </tr>
                        <!----------------------------------------------------------------------------------------------------------------------->
                        <div class="modal fade" id="myModal<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="gridSystemModalLabel"></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-sm-3">إسم المتدرب</div>
                                        <div class="col-sm-9"><?php echo $row->courses_reserve_name; ?></div>
                                        <br />
                                        <div class="col-sm-3">رقم الهوية</div>
                                        <div class="col-sm-9"><?php echo $row->number; ?></div>
                                        <br />
                                        <div class="col-sm-3">المؤهل</div>
                                        <div class="col-sm-9"><?php echo $row->courses_reserve_qualification; ?></div>
                                        <br />
                                        <div class="col-sm-3">مكان الميلاد</div>
                                        <div class="col-sm-9"><?php echo $row->courses_reserve_barth_place; ?></div>
                                        <br />
                                        <div class="col-sm-3">مصدر الهوية</div>
                                        <div class="col-sm-9"><?php echo $row->place_of_number; ?></div>
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
                <? if(empty($records_courses_ref)):?>
                    <br><br>
                    <div class="alert alert-danger" role="alert">
                        <strong>عذرا...!</strong> لا توجدتسجيلات مرفوضة
                    </div>
                <? else:?>
                    <table id="no-more-tables" class="table table-bordered" role="table">
                        <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i> طلبات حجز الكورسات المرفوضة.</p></caption>
                        <thead>
                        <tr>
                            <th   class="text-right">م</th>
                            <th   class="text-right">رقم الجوال</th>
                            <th  class="text-right">التفاصيل</th>
                            <th   class="text-right">الإجراء</th>
                        </tr>
                        </thead>
                        <tbody><tr>
                            <? if (!empty($records_courses_ref)):
                            $count=0;
                            foreach ($records_courses_ref as $row):
                            $count++;
                            ?>
                            <td   class="text-right"><? echo $count; ?> </td>
                            <td   class="text-right"><? echo $row->courses_reserve_phone; ?></td>
                            <td  class="text-right"><button type="button" class="btn btn-info btn-xs  " data-toggle="modal" data-target="#myModal<?php echo $row->id?>"><i class="fa fa-list"></i> التفاصيل </button></td>
                            <td   class="text-right">
                                <div class="row">
                                    <div class="col-md-3">
                                        <a data-toggle="tooltip" data-placement="bottom" title="موافقة" href="<?php echo base_url().'dashboard/suspend_courses_app/1/'.$row->id?>" class="btn btn-success btn-xs   "> <i class="fa fa-check"></i></a>
                                    </div>
                            </td>
                        </tr>

                        <!----------------------------------------------------------------------------------------------------------------------->
                        <div class="modal fade" id="myModal<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="gridSystemModalLabel"></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-sm-3">إسم المتدرب</div>
                                        <div class="col-sm-9"><?php echo $row->courses_reserve_name; ?></div>
                                        <br />
                                        <div class="col-sm-3">رقم الهوية</div>
                                        <div class="col-sm-9"><?php echo $row->number; ?></div>
                                        <br />
                                        <div class="col-sm-3">المؤهل</div>
                                        <div class="col-sm-9"><?php echo $row->courses_reserve_qualification; ?></div>
                                        <br />
                                        <div class="col-sm-3">مكان الميلاد</div>
                                        <div class="col-sm-9"><?php echo $row->courses_reserve_barth_place; ?></div>
                                        <br />
                                        <div class="col-sm-3">مصدر الهوية</div>
                                        <div class="col-sm-9"><?php echo $row->place_of_number; ?></div>
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

