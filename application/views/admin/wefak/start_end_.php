<h2 class="text-flat">إدارة الدورات والكورسات <span class="text-sm"><?php echo $title; ?></span></h2>
<ul class="breadcrumb pb30">
    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الرئيسية</a></li>
    <li class="active"><?php echo $title; ?></li>
</ul>
<!--span id="message">
<?php
/*
if(isset($_SESSION['message']))

    echo $_SESSION['message'];

unset($_SESSION['message']);
*/
?>
    </span-->

<div class="well "  ="wait 0s, then enter left and hustle 100%">
    <?php if(isset($result)):?>
        <?php echo form_open_multipart('dashboard/update_start_end/'.$result[0]->group_id,array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>
            <legend  ="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>

            
            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> إسم الكورس:</label>
                <div class="col-lg-10 input-grup">

                    <select id="course_id"  name="course_id"  class="form-control text-right" onchange="return load($('#course_id').val(),<?php echo $result[0]->sessions_id_pk; ?>,<?php echo $result[0]->group_id; ?>);" required >
                    <option value="<?php echo $result[0]->sessions_id_pk ?>"><?php echo $result[0]->sessions_name ?></option>
                    
                    <?php
                    
                    /*if($course)
                        foreach($course as $cources)
                            echo '<option value="'.$cources->sessions_id_pk.'">'.$cources->sessions_name.'</option>';
                    */
                    ?>
                    </select>
                </div>
            </div>
            
            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> إسم المدرب:</label>
                <div class="col-lg-10 input-grup">

                    <select id="trainer_id"  name="trainer_id"  class="form-control text-right" required >
                    <option value="">قم بإختيار المدرب</option>
                    
                    <?php
                    
                    if($trainer)
                        foreach($trainer as $train)
                        {
                            $select = '';
                            
                            if($result[0]->trainer_id == $train->id)
                                $select = 'selected';
                            else
                                $select = '';
                            
                            echo '<option value="'.$train->id.'" '.$select.'>'.$train->name.'</option>';
                            }
                    
                    ?>
                    </select>
                </div>
            </div>

                
            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> تاريخ البداية:</label>
                <div class="col-lg-4 input-grup">
                
                
                    <input type="date" id="popupDatepicker" value="<?php echo $result[0]->hijri_start_date ?>" name="start_date" class="form-control text-right"  required/>
                </div>
                <label for="inputUser" class="col-lg-2 control-label"> تاريخ النهاية:</label>
                <div class="col-lg-4 input-grup">
                
                
                    <input type="date" id="popupDatepicker2" value="<?php echo $result[0]->hijri_end_date ?>" name="end_date" class="form-control text-right"  required/>
                </div>
            </div>

           
            

            <div class="col-lg-2 input-grup"></div>
            <div id="optionearea1" class="col-lg-10">
            
            <?php

echo '<table id="no-more-tables" style="width:100%;" class="table table-bordered" role="table">
        
        <thead>
        <tr>
            <th width="5%" class="text-right">#</th>
            <th  class="text-right">إسم الطالب الملتحق بالكورس</th>
            <th class="text-right">رقم الجوال</th>
            <th class="text-right">النوع</th>
        </tr>
        </thead>
        <tbody>';
$x = 1;
foreach($result as $record)
{
    $gender = '';
    if($record->gender == 1)
        $gender = 'ذكر';
    else
        $gender = 'أنثى';
    echo '<tr>
          <td><span class="badge">'.$x.'</span></td>
          <td class="text-left">'.$record->sessions_reserve_name.'</td>
          <td>'.$record->sessions_reserve_phone.'</td>
          <td>'.$gender.'</td>
          </tr> ';
    $x++;
}

echo '</tbody></table>';

?>
            </div>
            

            <div class="form-group"  ="wait 0.3s, then enter bottom and hustle 100%">
                <div class="col-xs-10 col-xs-pull-2">
                    <input type="submit" name="update" value="حفظ" 
                    
                    onclick="startDate = ($('#popupDatepicker').val());
                        endDate = ($('#popupDatepicker2').val());
                        if (startDate >= endDate){
                        alert('لا يجب أن يكون تاريخ البداية بعد تاريخ النهاية أو مساو له');
                        return false;};"
                        
                    class="btn btn-primary" >
                </div>
            </div>

        </fieldset>

        <?php echo form_close()?>


    <?php else: ?>
        <?php echo form_open_multipart('dashboard/start_end',array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>
            <legend  ="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>


            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> إسم الكورس:</label>
                <div class="col-lg-10 input-grup">

                    <select id="course_id"  name="course_id"  class="form-control text-right" onchange="return load($('#course_id').val());" required >
                    <option value="">قم بإختيار الكورس</option>
                    
                    <?php
                    
                    if($course)
                        foreach($course as $cources)
                            echo '<option value="'.$cources->sessions_id_pk.'">'.$cources->sessions_name.'</option>';
                    
                    ?>
                    </select>
                </div>
            </div>
            
            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> إسم المدرب:</label>
                <div class="col-lg-10 input-grup">

                    <select id="trainer_id"  name="trainer_id"  class="form-control text-right" required >
                    <option value="">قم بإختيار المدرب</option>
                    
                    <?php
                    
                    if($trainer)
                        foreach($trainer as $train)
                            echo '<option value="'.$train->id.'">'.$train->name.'</option>';
                    
                    ?>
                    </select>
                </div>
            </div>

                
            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> تاريخ البداية:</label>
                <div class="col-lg-4 input-grup">
                
                
                    <input type="text" id="popupDatepicker"  name="start_date" class="form-control text-right"  required />
                </div>
                <label for="inputUser" class="col-lg-2 control-label"> تاريخ النهاية:</label>
                <div class="col-lg-4 input-grup">
                
                
                    <input type="text" id="popupDatepicker2"  name="end_date" class="form-control text-right"  required />
                </div>
            </div>

            <div id="optionearea1" ></div>

<br />
            <div class="form-group"  ="wait 0.3s, then enter bottom and hustle 100%">
                <div class="col-xs-10 col-xs-pull-2">
                    <input type="submit"  name="add" value="حفظ" 
                    
                    onclick="/*if($('#course_id').val()){
                        checked = $('.cc:checked').length;
                        if(!checked) {
                        alert('يجب على الأقل إختيار إسم طالب واحد');
                        return false;}
                        };*/
                        startDate = ($('#popupDatepicker').val());
                        endDate = ($('#popupDatepicker2').val());
                        if (startDate >= endDate){
                        alert('لا يجب أن يكون تاريخ البداية بعد تاريخ النهاية أو مساو له');
                        return false;};"
                    
                     class="btn btn-primary" >
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
            <th  class="text-center">تاريخ البداية</th>
            <th  class="text-center">تاريخ النهاية</th>
            <th  width="40%" class="text-right">التحكم</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        $x = 0;
        foreach($records as $record):
        $x++;
        ?>
            <tr>
                <td data-title="#"><span class="badge"><?php echo $x?></span></td>
                <td data-title=""> <p class="text-center"><?php echo $record->sessions_name?>
                <td data-title=""> <p class="text-center"><?php echo date('Y/m/d',$record->start_date)?>
                <td data-title=""> <p class="text-center"><?php echo date('Y/m/d',$record->end_date)?>
                    </p> </td>
                <td data-title="التحكم" class="text-center">
                    <button type="button" class="btn btn-info btn-xs col-lg-4" data-toggle="modal" data-target="#myModal<?php echo $record->group_id?>"><i class="fa fa-list"></i> التفاصيل </button>
                    <a href="<?php echo base_url().'dashboard/update_start_end/'.$record->group_id?>" class="btn btn-warning btn-xs col-lg-3"><i class="fa fa-pencil-square"></i> تعديل</a>
                    <a  href="<?php echo base_url().'dashboard/delete_start_end/'.$record->group_id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   col-lg-3"><i class="fa fa-trash"></i> حذف</a>
                </td>
            </tr>
            
        <?php endforeach ;?>

        </tbody>
    </table>
    
<?php 

        foreach($records as $record):
        $data_s = '';

        ?>
        <form method="post" action="update_certification/<?php echo $record->group_id ?>">
   <div class="modal fade" id="myModal<?php echo $record->group_id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="gridSystemModalLabel">أسماء الملتحقين بكورس <?php echo $record->sessions_name ?></h4>
                        </div>
                        <br /> 
                        <div class="modal-body">    
        
       <?php

echo '<table id="no-more-tables" style="width:100%;" class="table table-bordered" role="table">
        
        <thead>
        <tr>
            <th width="5%" class="text-right">#</th>
            <th  class="text-right">إسم الطالب الملتحق بالكورس</th>
            <th class="text-right"> تسجيل رقم الشهادة</th>
        </tr>
        </thead>
        <tbody>';
        
        $this->db->select('*,sessions_reserve.sessions_reserve_name'); 
        $this->db->join('sessions_reserve','start_end_course.student_id=sessions_reserve.sessions_reserve_id_pk','left');
        $query = $this->db->get_where('start_end_course', array('group_id'=>$record->group_id));
        $data_s = $query->result();
        
        
$x = 1;
foreach($data_s as $ds)
{
    echo '<tr>
          <td><span class="badge">'.$x.'</span></td>
          <td class="text-left">'.$ds->sessions_reserve_name.'</td>
          <td class="text-left"><input type="text" name="cer'.$record->id.'" class="form-control" value="'.$record->certificate_id.'" /></td>
          </tr> ';
    $x++;
}

echo '</tbody></table>';

?> 
        
        
        </div>
                        <div class="modal-footer">
                        
                            <button type="submit" class="btn btn-primary">حفظ</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
        </div>
        </form>

<?php endforeach ;?>
<?php endif;?>

<script>

        $(document).on('click','.all',function(){
    
        
        if(this.checked){
            $('.cc').each(function(){
                this.checked = true;
            });

        }else{

             $('.cc').each(function(){
                this.checked = false;

            });
        }
    });


    $(document).on('click','.cc',function(){

        if($('.cc:checked').length == $('.cc').length){
            $('#all').prop('checked',true);
        }else{
            $('#all').prop('checked',false);
        }
    });

 
</script>

<script>
 function load(num,id,group){
    if(num != id){
    if(num)
    {
        var dataString = 'num=' + num ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>/dashboard/start_end',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
             $("#optionearea1").html(html);
            } 
        });
    
        return false; 
        } 
        else
        {
            
            $("#optionearea1").html('');
        }
        }
        else
        {
            var dataString = 'group_id=' + group ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>/dashboard/start_end',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
             $("#optionearea1").html(html);
            } 
        });
    
        return false; 
        }
 }
</script>




	