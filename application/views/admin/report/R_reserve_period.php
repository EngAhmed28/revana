<h2 class="text-flat">إدارة التقارير <span class="text-sm"><?php echo $title; ?></span></h2>
<ul class="breadcrumb pb30">
    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الرئيسية</a></li>
    <li class="active"><?php echo $title; ?></li>
</ul>

<div class="well bs-component"  ="wait 0s, then enter left and hustle 100%">

<?php echo form_open_multipart('dashboard/R_reserve_period',array('class'=>"form-horizontal",'role'=>"form" ))?>


<fieldset>
            <legend  ="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>

<div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> التاريخ من:</label>
                <div class="col-lg-4 input-grup">
                
                
                    <input type="date" id="date_from"  name="date_from" class="form-control text-right"  required/>
                </div>
                <label for="inputUser" class="col-lg-2 control-label"> التاريخ إلى:</label>
                <div class="col-lg-4 input-grup">
                
                
                    <input type="date" id="date_to"  name="date_to" class="form-control text-right"  required/>
                </div>
            </div>
            
            <br />
            
            <div class="form-group"  ="wait 0.3s, then enter bottom and hustle 100%">
                <div class="col-xs-10 col-xs-pull-2">
                    <button class="btn btn-success" onclick="return loadd($('#date_from').val(),$('#date_to').val());" >عرض</button>
                </div>
            </div>
            <br />
            
            <div id="optionearea1" ></div>
            
            </fieldset>
            <?php echo form_close()?>
             </div>

<script>
 function loadd(date_from,date_to){
    
    if(date_from && date_to)
    {
        var dataString = 'date_from=' + date_from + '&date_to=' + date_to ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>/dashboard/R_reserve_period',
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

