<?php
if($students){
echo '<table id="no-more-tables" style="width:100%;" class="table table-bordered" role="table">
        
        <thead>
        <tr>
            <th  class="text-right">الفئة</th>
            <th class="text-right">إسم المتقدم/المتقدمة</th>
            <th class="text-right">رقم الجوال</th>
        </tr>
        </thead>
        <tbody>';

for($x = 1 ; $x <= count($students) ; $x++)
 {
    if($x == 1)
        $gender = 'الذكور';
    if($x == 2)
        $gender = 'الإناث';
            
    if(isset($students[$x]))
    {   
        echo '<tr>
              <td rowspan="'.count($students[$x]).'"><span class="badge">'.$gender.'</span></td>';
        for($z = 0 ; $z < Count($students[$x]) ; $z++)
        {
            echo '<td>'.$students[$x][$z]->sessions_reserve_name.'</td>
                  <td>'.$students[$x][$z]->sessions_reserve_phone.'</td>
                  </tr> ';
        }
    } 
    else
    {
        if($x == 1)
        {
            $x++;
            
            echo '<tr>
                  <td><span class="badge">'.$gender.'</span></td> 
                  <td>لا يوجد</td> 
                  <td>لا يوجد</td>
                  </tr>';
                  
            if($x == 1)
                $gender = 'الذكور';
            if($x == 2)
                $gender = 'الإناث';
                    
            if(isset($students[$x]))
            {   
                echo '<tr>
                      <td rowspan="'.count($students[$x]).'"><span class="badge">'.$gender.'</span></td>';
                for($z = 0 ; $z < Count($students[$x]) ; $z++)
                {
                    echo '<td>'.$students[$x][$z]->sessions_reserve_name.'</td>
                          <td>'.$students[$x][$z]->sessions_reserve_phone.'</td>
                          </tr> ';
                }
            } 
        }
        else
        {
            echo '<tr>
                  <td><span class="badge">'.$gender.'</span></td> 
                  <td>لا يوجد</td> 
                  <td>لا يوجد</td>
                  </tr>';
        }
    }  
 }

echo '</tbody></table>';
}
else
    echo '</br><div class="alert alert-danger text-center"><h6>لا توجد بيانات</h6></div>';

?>

