<?php echo form_open_multipart('dashboard/add_products',array('class'=>"form-horizontal",'role'=>"form" ))?>
<?php

$numtel = $_POST['num'];

if($numtel!=0 && $numtel<=5)
{
    for($i = 1 ; $i <= $numtel ; $i++){
        echo'<div class="col-sm-2"><br><label>عنوان المقطع '.$i.'</label></div>
             <div class="col-sm-7"><input type="text" name="product_title'.$i.'" class="form-control" style="width: 600px;"  required="required" title="يجب أدخال عنوان المقطع"/></div>
             <br/><br/><br/>';
        echo'<div class="col-sm-2"><br><label>صورة المقطع '.$i.'</label></div>
             <div class="col-sm-7"><input type="file" name="product_images'.$i.'" class="form-control" style="width: 600px;"  required="required" title="يجب أدخال صورة المقطع"/></div>
             <br/><br/><br/>';
        echo'<div class="col-sm-2"><br><label>  تفاصيل المقطع '.$i.'  </label></div>
             <div class="col-sm-7"><textarea  name="product_detail'.$i.'" class="form-control" style="width: 600px;"  required="required" title="يجب أدخال تفاصيل المقطع"></textarea></div>
             <br/><br/><br/>  <br/><br/><br/>';
    }
}
else
    echo '<div class="alert alert-danger" >
              أقصى عدد 5
              </div>';

?>

<?php echo form_close()?>