
<?php if(isset($records)&&$records!=null):?>



    <table id="no-more-tables" class="table table-bordered" role="table">

        <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>لوحة التحكم في تفاصيل المنتجات.</p></caption><br>
        <caption class="text-center text-success">   اسم المنتج  :<?php echo $products['product_name'] ?></p></caption>

        <thead>

        <tr>
            <th width="2%">#</th>
            <th  class="text-center">عنوان المقطع</th>
            <th width="30%" class="text-center">التحكم</th>
            <th width="30%" class="text-center">التفاصيل</th>

        </tr>

        </thead>
        <tbody>
        <?php $serial = 0; ?>
        <?php foreach($records as $record):?>

            <tr>
                <td data-title="#"><span class="badge"><?php echo $serial?></span></td>
                <td ><?php echo $record->product_title?></td>

                <td data-title="التحكم" class="text-center">
                    <a href="<?php echo base_url().'dashboard/update_product_part/'.$record->id?>" class="btn btn-warning btn-xs col-lg-3"><i class="fa fa-pencil"></i> تعديل</a>
                    <a  href="<?php echo base_url().'dashboard/delete_products_part/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   col-lg-3"><i class="fa fa-trash"></i> حذف</a>
                </td>
                <td>

                    <button type="button" class="btn btn-info btn-xs col-lg-5" data-toggle="modal" data-target="#myModal<?php echo $record->id?>"><i class="fa fa-list"></i> عرض </button>

                </td>


            </tr>
            <div class="modal fade" id="myModal<?php echo $record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="gridSystemModalLabel"></h4>
                        </div>
                        <br />
                        <div class="col-sm-3" style="font-size: 16px;">اسم المنتج</div>
                        <div class="col-sm-9"  style="font-size: 16px;">
                          <h4><?php echo $products['product_name']?></h4>
                        </div>
                        <br /><br />
                        <div class="col-sm-3" style="font-size: 16px;">عنوان المقطع</div>
                        <div class="col-sm-9"  style="font-size: 16px;">
                            <?php echo $record->product_title ?>
                        </div>
                        <br /><br />

                        <div class="modal-body">
                            <?php  if(isset($record->product_images)&&$record->product_images!=null): ?>
                                <div class="col-sm-2" style="font-size: 16px;">صور المقطع</div>
                                <div class="col-sm-10">
                                    <img src="<?php echo base_url()  ?>uploads/images/<?php echo $record->product_images?>" height="200px" width="200px">
                                    <br/><br />
                                </div>
                            <?php endif;?>
                            <br />
                            <div class="col-md-3" style="font-size: 16px;"></div>
                            <div class="col-md-9"></div>
                            <br /><br />
                            <div class="row">
                                <div class="col-sm-4" style="font-size: 16px;">تفاصيل المقطع</div>
                                <div class="col-sm-8">
                                    <?php echo $record->product_detail?>
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
    <div class="col-xs-12 mt30 text-center">
        <?php echo  $links?>
    </div>

<?php endif;?>
