<h2 class="text-flat">إدارة التقارير <span class="text-sm"><?php echo $title; ?></span></h2>
<ul class="breadcrumb pb30">
    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الرئيسية</a></li>
    <li class="active"><?php echo $title; ?></li>
</ul>


<?php
echo '<table id="no-more-tables" style="width:100%;" class="table table-bordered" role="table">
        
        <thead>
        <tr>
            <th width="5%" class="text-right">#</th>
            <th  class="text-right">إسم المدرب</th>
            <th class="text-right">عدد الكورسات</th>
            <th class="text-right">إسم الكورس</th>
            <th class="text-right">عدد المتقدمين</th>
            <th class="text-right">عدد الذكور</th>
            <th class="text-right">عدد الإناث</th>
        </tr>
        </thead>
        <tbody>';
$x = 1;

for($z = 0 ; $z < count($records) ; $z++)
{
    echo '<tr>
          <td rowspan="'.count($records[key($records)]).'"><span class="badge">'.$x.'</span></td>
          <td rowspan="'.count($records[key($records)]).'">'.key($records).'</td>
          <td rowspan="'.count($records[key($records)]).'">'.count($records[key($records)]).'</td>';
         
    for($a = 0 ;$a < count($records[key($records)]) ; )
    {
        
        echo '<td>'.key($records[key($records)]).'</td>
              <td>'.($records[key($records)][key($records[key($records)])][1]->cou+$records[key($records)][key($records[key($records)])][2]->cou).'</td>
              <td>'.$records[key($records)][key($records[key($records)])][1]->cou.'</td>
              <td>'.$records[key($records)][key($records[key($records)])][2]->cou.'</td>
              </tr> ';
        $a++;
        if($a < count($records[key($records)]))
            next($records[key($records)]);
    }
    $x++;
    next($records);
}

echo '</tbody></table>';

?>



