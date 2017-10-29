<h2 class="text-flat">إدارة التقارير<span class="text-sm"><?php echo $title; ?></span></h2>
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

        <?php echo form_open_multipart('dashboard/R_reserve_details',array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>
            <legend  ="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>
<div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> إسم الدورة:</label>
                <div class="col-lg-10 input-grup">

                    <select id="course_id"  name="course_id"  class="form-control text-right" onchange="return loadd($('#course_id').val());" required >
                    <option value="">--قم بإختيار الدورة--</option>
                    
                    <?php
                    
                    if($courses)
                        foreach($courses as $course) 
                            echo '<option value="'.$course->course_id_pk.'" >'.$course->course_name.'</option>';
                         
                    ?>
                    </select>
                </div>
            </div>
            
            <div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> إسم الكورس:</label>
                <div id="optionearea1" class="col-lg-10 input-grup">

                    <select id="session_id"  name="session_id"  class="form-control text-right" required >
                    <option value="">--قم بإختيار الكورس--</option>
                    
                    
                    </select>
                </div>
            </div>
            <div id="optionearea2"></div>
            

            <!--div class="form-group"  ="wait 0.3s, then enter bottom and hustle 100%">
                <div class="col-xs-10 col-xs-pull-2">
                    <button  class="btn btn-success">عرض</button>
                </div>
            </div-->

        </fieldset>
        <?php echo form_close()?>
   
</div>




<script>
 function loadd(course_id){
    
    if(course_id)
    {
        var dataString = 'course_id=' + course_id  ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>/dashboard/R_reserve_details',
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
            $("#optionearea1").html('<select id="session_id"  name="session_id"  class="form-control text-right" required ><option value="">--قم بإختيار الكورس--</option></select>');
            $("#optionearea2").html('');
        }
        
 }
</script>

<script>
 function load(session_id){
    
    if(session_id)
    {
        var dataString = 'session_id=' + session_id  ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>/dashboard/R_reserve_details',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
             $("#optionearea2").html(html);
            } 
        });
    
        return false; 
         
        }
        else
        {
            $("#optionearea2").html('');
        }
        
 }
</script>