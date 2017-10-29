<br />
<ul class="breadcrumb pb2">
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
<div class="col-md-12">
<div class="panel with-nav-tabs panel-default">
<div class="panel-heading">
<ul class="nav nav-tabs">
    <li class="active"><a href="#tab0default" data-toggle="tab">الحجوزات الواردة </a></li>
    <li class=""><a href="#tab1default" data-toggle="tab">الحجوزات الموافق عليها</a></li> 
    <li class=""><a href="#tab2default" data-toggle="tab">الحجوزات المرفوضة </a></li>   
</ul>
</div>
<div class="panel-body">
<div class="tab-content">
<div class="tab-pane fade in active" id="tab0default">
<!--  srart 1   ------------------------------------------------------------------------------------------------>
<?php   if(isset($received_reservation)&&$received_reservation!=null):?>
<table class="table table-bordered table-hover table-striped hidden-print" style="direction: rtl;">
				<thead>
    		      <tr> 
                    <th width=""><center>المسلسل</center> </th>
                    <th width=""><center>رقم الحجز</center></th>
                    <th width=""><center>إسم طالب الحجز</center></th>
                    <th width=""><center>الكورس</center></th>
                    <th width=""><center>الإجراء</center> </th>
                    <th width=""><center>التفاصيل</center> </th>
                    </tr>    
    		   </thead>    
    	   	<tbody>       
     <?php $count=1;foreach($received_reservation as $row):?>               
      <tr>
         <td><center><?php echo $count++;?></center></td>
         <td> <?php echo $row->sessions_reserve_id_pk?> </td>
         <td> <?php echo $row->sessions_reserve_name ?></td>
         <td> <?php  if(isset($all_session[$row->sessions_id_fk]->sessions_name) && $all_session[$row->sessions_id_fk]->sessions_name!=null){ echo $all_session[$row->sessions_id_fk]->sessions_name;} ?></td>
         <td>
            <a data-toggle="tooltip" data-placement="bottom" title="موافقة"
               href="<?php echo base_url().'dashboard/reservation_approved/1/'.$row->sessions_reserve_id_pk?>" class="btn btn-success btn-xs   "> 
               <i class="fa fa-check"></i></a>
              
               <a data-toggle="tooltip" data-placement="bottom" title="مرفوض"
               href="<?php echo base_url().'dashboard/reservation_approved/2/'.$row->sessions_reserve_id_pk?>" class="btn btn-danger btn-xs   "> 
              <i class="fa fa-times" aria-hidden="true"></i></a>

         </td>
         <td> 
         <button type="button" class="btn btn-sm btn-info " data-toggle="modal" data-target="#myMooodal<?php echo $row->sessions_reserve_id_pk?>">
         <span class="glyphicon glyphicon-plus"></span> التفاصيل </button>
         </td>
      </tr>
<?php endforeach;?>
</tbody>
</table>         
<?php else :?>
 <div class="alert alert-danger" >
    لا يوجد حجزوت واردة
          </div>
<?php endif ;?>                    
<!---  end  1   ------------------------------------------------------------------------------------------------> 
</div>                                                                                   
<!--------------------------------------------------------------------------------------------------------------->                   
<!--------------------------------------------------------------------------------------------------------------->
<div class="tab-pane fade" id="tab1default">
<!--  srart 2   ------------------------------------------------------------------------------------------------>
   <?php   if(isset($accept_reservation)&&$accept_reservation!=null):?>
<table class="table table-bordered table-hover table-striped hidden-print" style="direction: rtl;">
				<thead>
    		      <tr> 
                    <th width=""><center>المسلسل</center> </th>
                    <th width=""><center>رقم الحجز</center></th>
                    <th width=""><center>إسم طالب الحجز</center></th>
                    <th width=""><center>الكورس</center></th>
                    <th width=""><center>الإجراء</center> </th>
                    <th width=""><center>التفاصيل</center> </th>
                    </tr>    
    		   </thead>    
    	   	<tbody>       
     <?php $count=1;foreach($accept_reservation as $row):?>               
      <tr>
         <td><center><?php echo $count++;?></center></td>
         <td> <?php echo $row->sessions_reserve_id_pk?> </td>
         <td> <?php echo $row->sessions_reserve_name ?></td>
         <td> <?php  if(isset($all_session[$row->sessions_id_fk]->sessions_name) && $all_session[$row->sessions_id_fk]->sessions_name!=null){ echo $all_session[$row->sessions_id_fk]->sessions_name;} ?></td>
         <td>
           <a data-toggle="tooltip" data-placement="bottom" title="مرفوض"
               href="<?php echo base_url().'dashboard/reservation_approved/2/'.$row->sessions_reserve_id_pk?>" class="btn btn-danger btn-xs   "> 
              <i class="fa fa-times" aria-hidden="true"></i></a>
              
               <a data-toggle="tooltip" data-placement="bottom" title="تحويل"
               href="<?php echo base_url().'dashboard/reservation_approved/0/'.$row->sessions_reserve_id_pk?>" class="btn btn-info btn-xs   "> 
              <i class="fa fa-repeat" aria-hidden="true"></i></a>

         </td>
         <td> 
         <button type="button" class="btn btn-sm btn-info " data-toggle="modal" data-target="#myMooodal<?php echo $row->sessions_reserve_id_pk?>">
         <span class="glyphicon glyphicon-plus"></span> التفاصيل </button>
         </td>
      </tr>
<?php endforeach;?>
</tbody>
</table>         
<?php else :?>
 <div class="alert alert-danger" >
     لا يوجد حجز موافق عليها
          </div>
<?php endif ;?>               
<!---  end  2   ------------------------------------------------------------------------------------------------> 
</div>
<!--------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------->

<div class="tab-pane fade" id="tab2default">
<!--  srart 3   ------------------------------------------------------------------------------------------------>
<?php   if(isset($refused_reservation)&&$refused_reservation!=null):?>
<table class="table table-bordered table-hover table-striped hidden-print" style="direction: rtl;">
				<thead>
    		      <tr> 
                    <th width=""><center>المسلسل</center> </th>
                    <th width=""><center>رقم الحجز</center></th>
                    <th width=""><center>إسم طالب الحجز</center></th>
                    <th width=""><center>الكورس</center></th>
                    <th width=""><center>الإجراء</center> </th>
                    <th width=""><center>التفاصيل</center> </th>
                    </tr>    
    		   </thead>    
    	   	<tbody>       
     <?php $count=1;foreach($refused_reservation as $row):?>               
      <tr>
         <td><center><?php echo $count++;?></center></td>
         <td> <?php echo $row->sessions_reserve_id_pk?> </td>
         <td> <?php echo $row->sessions_reserve_name ?></td>
         <td> <?php  if(isset($all_session[$row->sessions_id_fk]->sessions_name) && $all_session[$row->sessions_id_fk]->sessions_name!=null){ echo $all_session[$row->sessions_id_fk]->sessions_name;} ?></td>
         <td>
            <a data-toggle="tooltip" data-placement="bottom" title="موافقة"
               href="<?php echo base_url().'dashboard/reservation_approved/1/'.$row->sessions_reserve_id_pk?>" class="btn btn-success btn-xs   "> 
               <i class="fa fa-check"></i></a>
              
                <a data-toggle="tooltip" data-placement="bottom" title="تحويل"
               href="<?php echo base_url().'dashboard/reservation_approved/0/'.$row->sessions_reserve_id_pk?>" class="btn btn-info btn-xs   "> 
              <i class="fa fa-repeat" aria-hidden="true"></i></a>

         </td>
         <td> 
         <button type="button" class="btn btn-sm btn-info " data-toggle="modal" data-target="#myMooodal<?php echo $row->sessions_reserve_id_pk?>">
         <span class="glyphicon glyphicon-plus"></span> التفاصيل </button>
         </td>
      </tr>
<?php endforeach;?>
</tbody>
</table>         
<?php else :?>
 <div class="alert alert-danger" >
  
          </div>
<?php endif ;?>   
<!---  end  3   ------------------------------------------------------------------------------------------------> 

</div>
<!---  end Tabs ----------------------------------------------------------------------------------------------------->                  
                    </div>
                </div>
            </div>
        </div>
<!---  end All ----------------------------------------------------------------------------------------------------->                  
    
    <?php if(isset($all_reservation)&& $all_reservation!=null):?>
    <?php foreach($all_reservation as $record):?>   
           <div class="modal fade" id="myMooodal<?php echo $record->sessions_reserve_id_pk?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:850px">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">تفاصيل الحجز</h5>
             </div>
  <div class="modal-body">
                                <div class="col-sm-3">الإسم </div>
                                <div class="col-sm-9"><?php echo $record->sessions_reserve_name; ?></div>
                                <br />
                                <div class="col-sm-3">النوع  </div>
                                <div class="col-sm-9"><?php echo $record->gender; ?></div>
                                <br />
                                  <div class="col-sm-3">إسم الكورس  </div>
                                <div class="col-sm-9"><?php if(isset($all_session[$record->sessions_id_fk]->sessions_name) && $all_session[$record->sessions_id_fk]->sessions_name!=null){ echo $all_session[$record->sessions_id_fk]->sessions_name;} ?></div>
                                <br />
                                
                                
                                <div class="col-sm-3">الجنسية   </div>
                                <div class="col-sm-9"><?php echo $record->nationality; ?></div>
                                <br />
                                <div class="col-sm-3">الإيميل </div>
                                <div class="col-sm-9"><?php echo $record->sessions_reserve_email; ?></div>
                                <br />
                            
                               <div class="col-sm-3">رقم التليفون  </div>
                                <div class="col-sm-9"><?php echo $record->sessions_reserve_phone; ?></div>
                                <br />
                            
                               <div class="col-sm-3">العنوان   </div>
                                <div class="col-sm-9"><?php echo $record->sessions_reserve_address; ?></div>
                                <br />
                            
                             <div class="col-sm-3">المهنة   </div>
                                <div class="col-sm-9"><?php echo $record->sessions_reserve_work; ?></div>
                                <br />
                            
                             <div class="col-sm-3">جهة العمل   </div>
                                <div class="col-sm-9"><?php echo $record->sessions_reserve_work_at; ?></div>
                                <br />
                            
                             <div class="col-sm-3">ملاحظات   </div>
                                <div class="col-sm-9"><?php echo $record->sessions_reserve_notes; ?></div>
                                <br />
                            
                            
                            
                            
                            
                            
                            </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
       
      </div>
    </div>
  </div>
</div>

<?php endforeach?> 
<?php endif?>       
       