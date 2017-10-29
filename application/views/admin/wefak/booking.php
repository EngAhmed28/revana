<h2 class="text-flat">إدارة الدورات والكورسات <span class="text-sm"><?php echo $title; ?></span></h2>
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

<div class="well bs-component"  >
    <?php if(isset($result)):?>
        <?php echo form_open_multipart('dashboard/update_booking/'.$result['id'].'/'.$student['sessions_reserve_id_pk'],array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>
            <legend  ><?php echo $title; ?></legend>

            <?php




    echo '<table id="no-more-tables" style="width:100%;" class="table table-bordered" role="table">
        
        <thead>
        <tr>
            <!--th width="2%" class="text-center"><input type="checkbox" id="all" name="all" value="1" style="float: center" ></th-->
            
            <th  class="text-right">الإسم</th>
            <th class="text-right">رقم الجوال</th>
            <th class="text-right">النوع</th>
        </tr>
        </thead>
        <tbody>';
        
    $gender = '';
    if($student['gender'] == 1)
        $gender = 'ذكر';
    else
        $gender = 'أنثى';
    echo '<tr>
          <!--td>
          <input type="checkbox" value="'.$student['sessions_reserve_id_pk'].'" id="check" style="float: center;" name="check[]" class="cc"></td-->  
          
          <td class="text-left">'.$student['sessions_reserve_name'].'</td>
          <td>'.$student['sessions_reserve_phone'].'</td>
          <td>'.$gender.'</td>
          </tr> ';
    


echo '</tbody></table>';


echo '<div class="form-group"  >
                <label for="select" class="col-lg-2 control-label">إختر اسم الكورس  </label>
                <div class="col-lg-10">
                    <select id="sessions_id_fk" name="sessions_id_fk" class="form-control">
                    <option value="'.$result2['sessions_id_pk'].' ">'.$result2['sessions_name'].'  </option>';
                       foreach($courses as $session){
                            
                            $dd = array();
                            $rr = array();
                            
                            $this->db->select('*');
                            $array = array('course_id'=>$session->sessions_id_pk,'student_id'=>$student['sessions_reserve_id_pk'],'confirm'=>1);
                            $this->db->where($array);
                            $q = $this->db->get('course_confirm');
                            $rr = $q->result();
                            
                            
                            $this->db->select('*');
                            $array = array('course_id'=>$session->sessions_id_pk,'student_id'=>$student['sessions_reserve_id_pk']);
                            $this->db->where($array);
                            $q = $this->db->get('start_end_course');
                            $dd = $q->result();
                            
                            if(! $rr)
                            
                                if(! $dd)
                           {echo '<option value="'.$session->sessions_id_pk.' ">'.$session->sessions_name.'  </option>';}
                           else
                           {
                                $today = strtotime(date("Y/m/d"));
                                if($dd[0]->end_date < $today)
                                   echo '<option value="'.$session->sessions_id_pk.' ">'.$session->sessions_name.'  </option>'; 
                           }
                           
                        }
              echo  '    </select>
                </div>
            </div>
            <br /><br /><br />
            <input type="hidden" name="student_id" value="'.$student['sessions_reserve_id_pk'].'" />';


?>



            <div class="form-group"  >
                <div class="col-xs-10 col-xs-pull-2">
                    <input type="submit" name="update" value="حفظ" class="btn btn-primary" >
                </div>
            </div>

        </fieldset>

        <?php echo form_close()?>


    <?php else: ?>
        <?php echo form_open_multipart('dashboard/booking',array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>
            <legend  ><?php echo $title; ?></legend>

            
            
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label"> رقم الهوية الوطنية :</label>
                <div class="col-lg-10 input-grup">

                    <input type="number" id="number"  name="number" class="form-control text-right" placeholder="  رقم الهوية الوطنية" required/>
                </div>
            </div>
            

            <div class="form-group"  >
                <div class="col-xs-10 col-xs-pull-2">
                    <button class="btn btn-success" onclick="return search($('#number').val());" >بحث</button>
                </div>
            </div>
            
            
            <div id="operation"></div>
            
             

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
            <th  class="text-right">إسم الكورس</th>
            <th  class="text-center">الإسم </th>
            <th  class="text-center">الإيميل </th>
            <th  class="text-center">الهاتف </th>
            <th  class="text-center">العنوان </th>
            <th  width="20%" class="text-right">التحكم</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        $x = 1;
        foreach($records as $record):?>
            <tr>
                <td data-title="#"><span class="badge"><?php echo $x++;?></span></td>
                <td > <?php echo $record->sessions_name?> </td>

                <td data-title=""> <p class="text-center"><?php echo $record->sessions_reserve_name?></p> </td>
                <td data-title=""> <p class="text-center"><?php echo $record->sessions_reserve_email?></p> </td>
                <td data-title=""> <p class="text-center"><?php echo $record->sessions_reserve_phone?></p> </td>
                <td data-title=""> <p class="text-center"><?php echo $record->sessions_reserve_address?></p> </td>
                
                <td data-title="التحكم" class="text-center">
                    <a href="<?php echo base_url().'dashboard/update_booking/'.$record->id.'/'.$record->sessions_reserve_id_pk?>" class="btn btn-warning btn-xs col-lg-5"><i class="fa fa-pencil-square"></i> تعديل</a>
                    <a  href="<?php echo base_url().'dashboard/delete_booking/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   col-lg-5"><i class="fa fa-trash"></i> حذف</a>
                </td>
            </tr>
        <?php endforeach ;?>
        </tbody>
    </table>
<?php endif;?>





<script>

 function search(number){

    if(number != ''){
        var dataString = 'id=' + number ;

        $.ajax({

            type:'post',

            url: '<?php echo base_url() ?>/dashboard/booking',

            data:dataString,

            dataType: 'html',

            cache:false,

            success: function(html){

             $('#operation').html(html);

            } 

        });

    

        return false;

        }
    else{
        $('#operation').html('');
    }
 }

</script>