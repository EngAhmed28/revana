<h2 class="text-flat">إدارة المستخدمين <span class="text-sm"><?php echo $title; ?></span></h2>
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
        <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>بيانات المستخدمين.</p></caption>
        <thead>
        <tr>
            <th width="2%">#</th>
            <th  class="text-center">الإسم</th>
            <th  class="text-center">الدور الوظيفي</th>
            
        </tr>
        </thead>
        <tbody>
        
       
        <?php 
        $x = 0;
        foreach($records as $record):
        $x++;
        
        if($record->type == 1)
            $status = '<b  class="btn btn-danger btn-xs  col-lg-12 "> <i class="fa fa-user"></i> Admin </b>';
        elseif($record->type == 2)
            $status = '<b  class="btn btn-warning btn-xs  col-lg-12 "> <i class="fa fa-users"></i> رئيس فريق </b>';
        else
            $status = '<b  class="btn btn-success btn-xs col-lg-12 "> <i class="fa fa-thumbs-up"></i> متطوع </b>';
            
        ?>
            <tr data-toggle="tooltip" data-placement="bottom" title="إضغط للتفاصيل">
                <td data-toggle="modal" data-target="#myModal<?php echo $record->user_id	 ?>"><span class="badge"><?php echo $x?></span></td>
                <td data-toggle="modal" data-target="#myModal<?php echo $record->user_id	 ?>"><?php echo $record->user_name?></td>
                <td data-toggle="modal" data-target="#myModal<?php echo $record->user_id	 ?>"> <?php echo $status?></td>
              </tr>
              <div class="modal fade" id="myModal<?php echo $record->user_id	 ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">

    <div class="modal-content" style="width:550px">

             <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title">تفاصيل المستخدم</h4>

             </div>

             

             <div class="row" style="margin-right:10px">

                                                           <div class="col-md-4">

                                                            <h5>إسم العضو:</h5>

                                                           </div>

                                                 <div class="col-sm-8">

                              <h5><?php echo $record->user_name?></h5>

                           </div>

                      </div>

                     <div class="row" style="margin-right:10px">

                                                           <div class="col-md-4">

                                                            <h5>إسم المستخدم:</h5>

                                                           </div>

                                                 <div class="col-sm-8">

                              <h5><?php echo $record->user_username?></h5>

                           </div>

                      </div>

             <div class="row" style="margin-right:10px">

                            <div class="col-md-4">

                                  <h5>البريد الألكتروني:</h5>

                             </div>

                            <div class="col-sm-8">

                               <h5><?php echo $record->user_email ?></h5>

                          </div>

                      </div>

                <div class="row" style="margin-right:10px">

                                    <div class="col-md-4">

                                          <h5>رقم التليفون</h5>

                                       </div>

                                      <div class="col-sm-8">

                                           <h5><?php echo $record->user_phone ?></h5>

                                      </div>

                                 </div>

                                 

                <div class="row" style="margin-right:10px">

                                    <div class="col-md-4">

                                          <h5>الصورة الشخصية:</h5>

                                       </div>

                                      <div class="col-sm-8">

                                   <img width="100" height="100" src="<?php echo base_url('uploads/thumbs/'.$record->user_photo)?>"/>

                                      </div>

                                 </div>

                    <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>

      </div>

    </div>

  </div>

</div>  
            
            
        <?php endforeach ;?>

        </tbody>
    </table>
<?php endif;?>


<style>
td { cursor: pointer; cursor: hand; }

</style>