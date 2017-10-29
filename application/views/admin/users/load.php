<?php echo form_open_multipart('dashboard/add_news',array('class'=>"form-horizontal",'role'=>"form" ));


if($_POST['num'] && $_POST['id'] == ''){

        echo'

            <label for="select" class="col-lg-2 control-label">قم بإختيار الإسم</label>

            
            
            <div class="col-lg-10">

                <select id="vounter_id" name="vounter_id" class="form-control" required>
                
                <option value="">--قم بإختيار الإسم--</option>';


            foreach($result as $record):
            
                echo '<option value="'.$record->id.'">'.$record->name.'</option>';
                        
            endforeach;
                   

      echo '  </select>

            </div><br />
            ';
            }

if($_POST['num'] && $_POST['id']){
    
    echo'

            <label for="select" class="col-lg-2 control-label">قم بإختيار الإسم</label>

            
            
            <div class="col-lg-10">

                <select id="vounter_id" name="vounter_id" class="form-control" required>
                
                <option value="'.$_POST['id'].'">'.$result22[0]->name.'</option>';


            foreach($result as $record):
            
                echo '<option value="'.$record->id.'">'.$record->name.'</option>';
                        
            endforeach;
                   

      echo '  </select>

            </div><br />
            ';
    
    }


 echo form_close();
 
 ?>