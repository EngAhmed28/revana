<?php

if($sessions){
echo '<select id="session_id"  name="session_id"  class="form-control text-right" onchange="return load($(\'#session_id\').val());" required >
                    <option value="">--قم بإختيار الكورس--</option>';

foreach($sessions as $session)
{
    echo '<option value="'.$session->sessions_id_pk.'">'.$session->sessions_name.'</option>';
    
}

echo '</select>';
}

?>

