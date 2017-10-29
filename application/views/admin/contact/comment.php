
<h2 class="text-flat">إدارة التقارير  <span class="text-sm"><?php echo $title; ?></span></h2>

<ul class="breadcrumb pb30">

    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الرئيسية</a></li>



    <li class="active"><?php echo $title; ?></li>

</ul>





<table id="no-more-tables" class="table table-bordered" role="table">

    <thead>
    <tr>
        <th  class="text-center">م </th>
        <th  class="text-center">الاسم</th>
        <th  class="text-center">التعليق</th>
        <th width="" class="text-center">حالة النشر</th>

    </tr>
    </thead>
    <tbody>
    <?php
    $serial = 0;

    foreach($records as $record):

        if($record->suspend == 1)
        {
            $types = 'success';
            $title = 'نشط';
            $image ='fa fa-check';
        }
        else
        {
            $types = 'danger';
            $title = 'غير نشط';
            $image ='fa fa-times';
        }
        $serial++;
        ?>


        <tr>
            <td data-title="#"><span class="badge"><?php echo $serial ?></span></td>

            <td><?php echo $record->name ?></td>
            <td >
                <button type="button" class="btn btn-info btn-xs " data-toggle="modal" data-target="#myModal<?php echo $record->id?>"><i class="fa fa-list"></i> التفاصيل </button>
            </td>
            <td>
                <div class="">
                    <a data-toggle="tooltip" data-placement="bottom"  href="<?php echo base_url().'dashboard/suspend_urgents/'.$record->id.'/'.$types.'/'?>" class="btn btn-<?php echo $types ?> btn-xs   "> <i class="<?php echo $image;?>"></i></a>
                </div>

            </td>

        </tr>
        <div class="modal fade" id="myModal<?php echo $record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">



                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>


                    <h4 class="modal-title" id="gridSystemModalLabel"><?php echo date('Y-m-d', $record->date) ?></h4>

                    <div class="modal-footer">
                        <label>الاسم</label>
                        <p><?php echo $record->name ?> </p>
                    </div>
                    <div class="modal-footer">
                        <label>البريد الالكترونى</label>
                        <p><?php echo $record->email ?> </p>
                    </div>
                    <div class="modal-footer">
                        <label>الهاتف</label>
                        <p><?php echo $record->phone ?> </p>
                    </div>
                    <div class="modal-footer">
                        <label>محتوى التعليق</label>
                        <p><?php echo $record->message ?> </p>
                    </div>


                    <div class="modal-footer">

                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <?php


    endforeach;?>
    </tbody>
</table>
<div class="col-xs-12 mt30 text-center">
    <?php // echo  $links?>
</div>
