<?php echo form_open_multipart('dashboard/add_news',array('class'=>"form-horizontal",'role'=>"form" ))?>
<?php

$numtel = $_POST['num'];
if($numtel>10){
    echo '<div class="alert alert-danger" >
              أقصى عدد 10
              </div>';

}
elseif($numtel<=10)
{
    for($i=1;$i<=$numtel;$i++){
        echo'
        <div class="col-sm-2"><br><label>العنوان '.$i.'</label></div>
        <div class="col-sm-7"><input type="text" name="title'.$i.'" class="form-control" style="width: 600px;"  required="required" title="يجب إدخال العنوان"/></div>
        <br/><br/><br/>
        <div class="col-sm-2"><br><label>الفيديو '.$i.'</label></div>
        <div class="col-sm-7"><input type="text" name="vid'.$i.'" class="form-control" style="width: 600px;"  required="required" title="يجب أدخال رابط الفيديو"/></div>
        <br/><br/><br/>';
    }

}


?>
<?php echo form_close()?>