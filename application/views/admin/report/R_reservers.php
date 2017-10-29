<h2 class="text-flat">إدارة التقارير <span class="text-sm"><?php echo $title; ?></span></h2>
<ul class="breadcrumb pb30">
    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الرئيسية</a></li>
    <li class="active"><?php echo $title; ?></li>
</ul>

<div class="well bs-component"  ="wait 0s, then enter left and hustle 100%">

<?php echo form_open_multipart('dashboard/R_reservers',array('class'=>"form-horizontal",'role'=>"form" ))?>


<fieldset>
            <legend  ="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>


                   
                <?php
echo '<table id="no-more-tables" style="width:100%;" class="table table-bordered" role="table">
        
        <thead>
        <tr>
            <th width="5%" class="text-right">#</th>
            <th  class="text-right">إسم المتدرب</th>
            <th class="text-right">عدد الكورسات التي تم الإشتراك بها</th>
            <th class="text-right">النوع</th>
            <th class="text-right">الكورسات</th>
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
          <td rowspan="'.count($records2[$record->sessions_reserve_id_pk]).'"><span class="badge">'.$x.'</span></td>
          <td rowspan="'.count($records2[$record->sessions_reserve_id_pk]).'" class="text-left">'.$record->sessions_reserve_name.'</td>
          <td rowspan="'.count($records2[$record->sessions_reserve_id_pk]).'">'.count($records2[$record->sessions_reserve_id_pk]).'</td>
          <td rowspan="'.count($records2[$record->sessions_reserve_id_pk]).'">'.$gender.'</td>';
    if($records2)
    {
        for($z = 0 ; $z < count($records2[$record->sessions_reserve_id_pk]) ; $z++)
            echo '<td>'.$records2[$record->sessions_reserve_id_pk][$z]->sessions_name.'</td>
              </tr> ';
    }
    else    
        echo '<td>لا يوجد</td>
              </tr> ';
    $x++;
}

echo '</tbody></table>';

?>

            
            
            </fieldset>
            <?php echo form_close()?>
             </div>



