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
        <?php echo form_open_multipart('dashboard/update_Sessions_reserve/'.$result['sessions_reserve_id_pk'],array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>
            <legend  ><?php echo $title; ?></legend>


            <div class="form-group">
                <label for="select" class="col-lg-2 control-label">إختر إسم الكورس  </label>
                <div class="col-lg-10">
                    <select id="sessions_id_fk" name="sessions_id_fk" class="selectpicker form-control" data-live-search="true" style="width:100%;">
                        <?php foreach($sessions as $session):
                        $select = '';
                        if($session->sessions_id_pk == $result['sessions_id_fk'])
                            $select = 'selected';
                        ?>
                            <option value="<?php  echo $session->sessions_id_pk?> " <?php echo $select ?>><?php echo $session->sessions_name?>  </option>
                        <?php endforeach?>
                    </select>
                </div>
            </div>

            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label"> الإسم :</label>
                <div class="col-lg-10 input-grup">

                    <input type="text" id="sessions_reserve_name"  name="sessions_reserve_name"  value="<?php echo $result['sessions_reserve_name']?>" class="form-control text-right" placeholder="   الاسم" required/>
                </div>
            </div>
            
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label"> النوع :</label>
                <div class="col-lg-10 input-grup">
                
                <?php $male = ''; $female ='';
                
                if($result['gender'] == 2) $male = 'checked'; else $female = 'checked';
                //var_dump($male,$female);  ?>

                     ذكر &emsp;&emsp;&emsp;&emsp;<input type="radio" name="gender" value="2" <?php echo $male ?> required>
                      أنثى <input type="radio" name="gender" value="1" <?php echo $female ?> required> 
                </div>
            </div>
            
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label"> الجنسية :</label>
                <div class="col-lg-10 input-grup">

                    <input type="text" id="nationality" value="<?php echo $result['nationality']?>" name="nationality"  class="form-control text-right" placeholder="  الجنسية" required/>
                </div>
            </div>
            
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label"> رقم الهوية الوطنية :</label>
                <div class="col-lg-10 input-grup">

                    <input type="number" id="number"  name="number" onkeyup="return search($('#number').val());" value="<?php echo $result['number']?>" class="form-control text-right" placeholder="  رقم الهوية الوطنية" required/>
                </div>
            </div>
            
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label"> </label>
                <div class="col-lg-10 input-grup">
            <div id="operation"></div>
            
              </div>
            </div>

            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label"> الإيميل:</label>
                <div class="col-lg-10 input-grup">
                    <input type="text" id="sessions_reserve_email"  name="sessions_reserve_email" value="<?php echo $result['sessions_reserve_email']?>" class="form-control text-right" placeholder="   الايميل" required/>
                </div>
            </div>

            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label"> رقم التليفون:</label>
                <div class="col-lg-10 input-grup">
                    <input type="number" id="sessions_reserve_phone"  name="sessions_reserve_phone" value="<?php echo $result['sessions_reserve_phone']?>" class="form-control text-right" placeholder="   رقم التليفون" required/>
                </div>
            </div>

            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label"> العنوان:</label>
                <div class="col-lg-10 input-grup">
                    <input type="text" id="sessions_reserve_address"  name="sessions_reserve_address" value="<?php echo $result['sessions_reserve_address']?>" class="form-control text-right" placeholder="   العنوان" required/>
                </div>
            </div>


            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label"> المهنة:</label>
                <div class="col-lg-10 input-grup">
                    <input id="sessions_reserve_work" name="sessions_reserve_work"  value="<?php echo $result['sessions_reserve_work']?>" class="form-control text-right" placeholder="   المهنة" required/>
                </div>
            </div>

            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label"> جهة العمل:</label>
                <div class="col-lg-10 input-grup">
                    <input type="text" id="sessions_reserve_work_at"  name="sessions_reserve_work_at" value="<?php echo $result['sessions_reserve_work_at']?>" class="form-control text-right" placeholder="   جهة العمل" required/>
                </div>
            </div>


            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label"> ملاحظات:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-sticky-note"></i>
                    <textarea id="sessions_reserve_notes" name="sessions_reserve_notes" value="<?php echo $result['sessions_reserve_notes']?>"  class="form-control text-right" placeholder="   ملاحظات" required> <?php echo $result['sessions_reserve_notes']?> </textarea>
                </div>
            </div>

            <div class="form-group"  >
                <div class="col-xs-10 col-xs-pull-2">
                    <input type="submit" name="update" value="حفظ" class="btn btn-primary" >
                </div>
            </div>

        </fieldset>

        <?php echo form_close()?>


    <?php else: ?>
        <?php echo form_open_multipart('dashboard/add_sessions_reserve',array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>
            <legend  ><?php echo $title; ?></legend>


            <div class="form-group">
                <label for="select" class="col-lg-2 control-label">إختر اسم الكورس  </label>
                <div class="col-lg-10">
                    <select id="sessions_id_fk" name="sessions_id_fk" class="selectpicker form-control" data-live-search="true" style="width:100%;">
                        <option style="text-align: right;" value="0">إختر  الكورس</option>
                        <?php foreach($sessions as $session):?>
                        
                            <option style="text-align: right;" value="<?php echo $session->sessions_id_pk?> "><?php  echo $session->sessions_name?>  </option>
                        <?php endforeach?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="inputUser" class="col-lg-2 control-label"> الإسم :</label>
                <div class="col-lg-10 input-grup">

                    <input type="text" id="sessions_reserve_name"  name="sessions_reserve_name"  class="form-control text-right" placeholder="  الإسم" required/>
                </div>
            </div>
            
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label"> النوع :</label>
                <div class="col-lg-10 input-grup">

                     ذكر &emsp;&emsp;&emsp;&emsp;<input type="radio" name="gender" value="2" required>
                      أنثى <input type="radio" name="gender" value="1" required> 
                </div>
            </div>
            
             <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label"> الجنسية :</label>
                <div class="col-lg-10 input-grup">

                    <input type="text" id="nationality"  name="nationality"  class="form-control text-right" placeholder="  الجنسية" required/>
                </div>
            </div>
            
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label"> رقم الهوية الوطنية :</label>
                <div class="col-lg-10 input-grup">

                    <input type="number" id="number"  name="number" onkeyup="return search($('#number').val());" class="form-control text-right" placeholder="  رقم الهوية الوطنية" required/>
                </div>
            </div>
            
            
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label"> </label>
                <div class="col-lg-10 input-grup">
            <div id="operation"></div>
            
              </div>
            </div>

            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label"> الإيميل:</label>
                <div class="col-lg-10 input-grup">
                    <input type="text" id="sessions_reserve_email"  name="sessions_reserve_email" class="form-control text-right" placeholder="  الإيميل" required/>
                </div>
            </div>

            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label"> رقم التليفون:</label>
                <div class="col-lg-10 input-grup">
                    <input type="number" id="sessions_reserve_phone"  name="sessions_reserve_phone" class="form-control text-right" placeholder="        رقم التليفون" required/>
                </div>
            </div>

            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label"> العنوان:</label>
                <div class="col-lg-10 input-grup">
                    <input type="text" id="sessions_reserve_address"  name="sessions_reserve_address" class="form-control text-right" placeholder=" العنوان" required/>
                </div>
            </div>


            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label"> المهنة:</label>
                <div class="col-lg-10 input-grup">
                    <input id="sessions_reserve_work" name="sessions_reserve_work"  class="form-control text-right" placeholder="        المهنة" required/>
                </div>
            </div>

            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label"> جهة العمل:</label>
                <div class="col-lg-10 input-grup">
                    <input type="text" id="sessions_reserve_work_at"  name="sessions_reserve_work_at" class="form-control text-right" placeholder=" جهة العمل" required/>
                </div>
            </div>


            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label"> ملاحظات:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-sticky-note"></i>
                    <textarea id="sessions_reserve_notes" name="sessions_reserve_notes"  class="form-control text-right" placeholder="   ملاحظات" required>  </textarea>
                </div>
            </div>


            <div class="form-group"  >
                <div class="col-xs-10 col-xs-pull-2">
                    <button type="reset" class="btn btn-default">إبدأ من جديد ؟</button>
                    <input type="submit"  name="add_sessions_reserve" value="حفظ" class="btn btn-primary" >
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
            <th  class="text-center">الإسم </th>
            <th  class="text-right">إسم الكورس</th>
            <th  class="text-center">الإيميل </th>
            <th  class="text-center">الهاتف </th>
            <th  class="text-center">العنوان </th>
            <th  class="text-center">الملاحظات </th>
            <th  width="20%" class="text-right">التحكم</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        $x = 1;
        foreach($records as $record):?>
            <tr>
                <td data-title="#"><span class="badge"><?php echo $x++;?></span></td>
                

                <td data-title=""> <p class="text-center"><?php echo $record->sessions_reserve_name?></p> </td>
                <td data-title=""> <p class="text-center"> <?php echo $record->sessions_name?> </p></td>
                <td data-title=""> <p class="text-center"><?php echo $record->sessions_reserve_email?></p> </td>
                <td data-title=""> <p class="text-center"><?php echo $record->sessions_reserve_phone?></p> </td>
                <td data-title=""> <p class="text-center"><?php echo $record->sessions_reserve_address?></p> </td>
                <td data-title=""> <p class="text-center"><?php if($record->sessions_reserve_notes) echo word_limiter($record->sessions_reserve_notes,5); else echo 'لا يوجد';?></p> </td>
                <td data-title="التحكم" class="text-center">
                    <a href="<?php echo base_url().'dashboard/update_Sessions_reserve/'.$record->sessions_reserve_id_pk?>" class="btn btn-warning btn-xs col-lg-5"><i class="fa fa-pencil-square"></i> تعديل</a>
                    <a  href="<?php echo base_url().'dashboard/delete_reserve/'.$record->sessions_reserve_id_pk?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   col-lg-5"><i class="fa fa-trash"></i> حذف</a>
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

            url: '<?php echo base_url() ?>/dashboard/add_sessions_reserve',

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
<style>

.bootstrap-select{
    width: 100% !important;
}

</style>
