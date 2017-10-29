<?php


if($result22)
{

    echo '<br />
    <div class="alert alert-warning text-center" >
                
                           <h1> ناتج البحث</h1>
                
                              </div>
    <table id="no-more-tables" style="width:100%;" class="table table-bordered" role="table">
        
        <thead>
        <tr>
            <!--th width="2%" class="text-center"><input type="checkbox" id="all" name="all" value="1" style="float: center" ></th-->
            
            <th  class="text-right">الإسم</th>
            <th class="text-right">رقم الجوال</th>
            <th class="text-right">النوع</th>
        </tr>
        </thead>
        <tbody>';
        
    $gender = '';
    if($result22['gender'] == 1)
        $gender = 'ذكر';
    else
        $gender = 'أنثى';
    echo '<tr>
          <!--td>
          <input type="checkbox" value="'.$result22['sessions_reserve_id_pk'].'" id="check" style="float: center;" name="check[]" class="cc"></td-->  
          
          <td class="text-left">'.$result22['sessions_reserve_name'].'</td>
          <td>'.$result22['sessions_reserve_phone'].'</td>
          <td>'.$gender.'</td>
          </tr> ';
    


echo '</tbody></table>';


echo '<div class="form-group"  >
                <label for="select" class="col-lg-2 control-label">إختر اسم الكورس  </label>
                <div class="col-lg-10">
                    <select id="sessions_id_fk" name="sessions_id_fk" class="form-control">';
                       foreach($courses as $session){
                            
                            $dd = array();
                            $rr = array();
                            
                            $this->db->select('*');
                            $array = array('course_id'=>$session->sessions_id_pk,'student_id'=>$result22['sessions_reserve_id_pk'],'confirm'=>1);
                            $this->db->where($array);
                            $q = $this->db->get('course_confirm');
                            $rr = $q->result();
                            
                            
                            $this->db->select('*');
                            $array = array('course_id'=>$session->sessions_id_pk,'student_id'=>$result22['sessions_reserve_id_pk']);
                            $this->db->where($array);
                            $q = $this->db->get('start_end_course');
                            $dd = $q->result();
                            
                            if(! $rr)
                            
                                if(! $dd)
                           {echo '<option value="'.$session->sessions_id_pk.' ">'.$session->sessions_name.'  </option>';}
                           else
                           {
                                $today = strtotime(date("Y/m/d"));
                                if($dd[0]->end_date < $today)
                                   echo '<option value="'.$session->sessions_id_pk.' ">'.$session->sessions_name.'  </option>'; 
                           }
                           
                        }
              echo  '    </select>
                </div>
            </div>
            <br /><br /><br />
            <input type="hidden" name="student_id" value="'.$result22['sessions_reserve_id_pk'].'" />
            <input type="submit"  name="add_confirm" value="حفظ" class="btn btn-primary" >';
}
else
    echo('<div class="alert alert-danger" >
                
                              لا توجد نتائج للبحث.
                
                              </div>')

?>

