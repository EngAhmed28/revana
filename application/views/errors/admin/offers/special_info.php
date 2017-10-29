<?php echo form_open_multipart('dashboard/add_offers',array('class'=>"form-horizontal",'role'=>"form" ))?>
<?php

$numtel = $_POST['num'];

if($numtel!=0 && $numtel<=5)
{
    for($i = 1 ; $i <= $numtel ; $i++){
        echo'
                             <div class="form-div">
                                   <label>مميزات '.$i.' :</label>
                                        <input type="text" name="special'.$i.'" class="form-control">
                                    </div><br/><br/><br/>';
    }

}
else
    echo '<div class="alert alert-danger" >
              أقصى عدد 5
              </div>';

?>

<?php echo form_close()?>