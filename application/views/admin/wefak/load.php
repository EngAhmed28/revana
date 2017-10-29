<?php

echo '<table id="no-more-tables" style="width:100%;" class="table table-bordered" role="table">
        
        <thead>
        <tr>
            <!--th width="2%" class="text-center">
            <input type="checkbox" id="all" name="all" value="1" style="float: center" class="all" ></th-->
            <th width="5%" class="text-right">#</th>
            <th  class="text-right">إسم الطالب الملتحق بالكورس</th>
            <th class="text-right">رقم الجوال</th>
            <th class="text-right">النوع</th>
        </tr>
        </thead>
        <tbody>'; 
$x = 1;
foreach($records as $record)
{
    $gender = '';
    if($record->gender == 1)
        $gender = 'ذكر';
    else
        $gender = 'أنثى';
    echo '<tr>
          <!--td>
          <input type="checkbox" value="'.$record->sessions_reserve_id_pk.'" id="check" style="float: center;"  name="check[]" class="cc">
          </td-->  
          <td><span class="badge">'.$x.'</span></td>
          <td class="text-left">'.$record->sessions_reserve_name.'</td>
          <td>'.$record->sessions_reserve_phone.'</td>
          <td>'.$gender.'</td>
          </tr> ';
    $x++;
}

echo '</tbody></table>';

?>

