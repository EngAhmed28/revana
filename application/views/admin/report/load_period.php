<?php
//var_dump('dsdgfsdfsd');die;
echo '<table id="no-more-tables" style="width:100%;" class="table table-bordered" role="table">
        
        <thead>
        <tr>
            <th width="5%" class="text-right">#</th>
            <th  class="text-right">إسم الكورس</th>
            <th class="text-right">إجمالي عدد المتقدمين</th>
            <th class="text-right">أعداد الذكور</th>
            <th class="text-right">أعداد الإناث</th>
        </tr>
        </thead>
        <tbody>';
$x = 1;
foreach($records as $record)
{
    echo '<tr>
          <td><span class="badge">'.$x.'</span></td>
          <td class="text-left">'.key($record).'</td>
          <td>'.$record[1]->COUNT('sessions_reserve.gender')+$record[2]->COUNT('sessions_reserve.gender').'</td>
          <td>'.$record[1]->COUNT('sessions_reserve.gender').'</td>
          <td>'.$record[2]->COUNT('sessions_reserve.gender').'</td>
          </tr> ';
    $x++;
}

echo '</tbody></table>';

?>

