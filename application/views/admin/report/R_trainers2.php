<h2 class="text-flat">إدارة التقارير <span class="text-sm"><?php echo $title; ?></span></h2>
<ul class="breadcrumb pb30">
    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الرئيسية</a></li>
    <li class="active"><?php echo $title; ?></li>
</ul>



<?php if(isset($records)&&$records!=null):?>
    <table id="no-more-tables" class="table table-bordered" role="table">
        <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>تقرير المدربين.</p></caption>
        <thead>
        <tr>
            <th width="2%">#</th>
            <th  class="text-center">الدورات</th>
            <th  class="text-center">الكورسات</th>
            <th  class="text-center">المدربين</th>
        </tr>
        </thead>
        <tbody>
        
       
        <?php 
        $x = 1;
        current($records);
        $count = 0;
        for($a = 1 ; $a < count($records[key($records)]) ; )
        {
            if($records[key($records)][$a] != 0)
                $count = $count + $records[key($records)][$a];
            else
                $count++;
            $a = $a + 2;
        }
        //var_dump(($count));
        for($z = 0 ; $z < count($records) ; $z++){?>
            <tr>
                <td rowspan="<?php echo $count ?>"><span class="badge"><?php echo $x++;?></span></td>
                <td rowspan="<?php echo $count//((count($records[key($records)])/2)+$count)//count($records[key($records)])/2 ?>"><?php echo key($records)?></td>
                <?php 
                for($a = 0 ; $a < count($records[key($records)]) ; )
                {
                    $data = array();
                    $this->db->select('start_end_course.*,trainers.name');
                    $this->db->group_by(array("trainer_id", "course_id"));
                    $this->db->join('trainers','trainers.id=start_end_course.trainer_id','right'); 
                    $this->db->where('course_id',$records[key($records)][$a]->sessions_id_pk);
                    $this->db->from('start_end_course');
                    $query = $this->db->get();
                    if ($query->num_rows() > 0) {
                        foreach ($query->result() as $row) {
                           $data[]=$row;
                           
                            }
                        }
                    echo '<td rowspan="'.count($data).'"> <p class="text-center">'.$records[key($records)][$a]->sessions_name.'
                    </p> </td>';
                 
                 if(count($data) !=0)
                 {
                 for($w = 0 ;$w < count($data) ; $w++)
                    echo '<td>'.$data[$w]->name.'</td></tr> ';
                 }
                 else
              echo  '<td>لا يوجد</td> </tr>'; 
                
            
            $a = $a+2;
                }
                
                
        
        next($records);
        }?>

        </tbody>
    </table>

<?php endif;?>

