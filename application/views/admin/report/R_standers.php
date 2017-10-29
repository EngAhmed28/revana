<h2 class="text-flat">إدارة التقارير<span class="text-sm"><?php echo $title; ?></span></h2>

<ul class="breadcrumb pb30">

    <li><a href="#"><i class="fa fa-home"></i> الرئيسية</a></li>



    <li class="active"><?php echo $title; 
    
    
    $arr_type=array("النوع","العمر","الدولة","الجنسية","الحالة الأجتماعية","العمل","التحصيل العلمى","مستوى الجمال","لون العين","لون البشرة","لون الشعر","الطول","الوزن");
    $person_fields = array('gender','age','country','nationality','social_status','qulification','work','beauty_level','eyes_color','skin_color','hair_color','tall','weight');
    ?></li>

</ul>




<?php if(isset($array_tables)&&$array_tables!=null):?>

    <table id="sample_1" class="table table-bordered table-hover table-striped" cellspacing="0"  width="99%" style="margin-right: 6px; direction:rtl;">
        <thead>
        <tr>
            <th width="2%">#</th>

            <th  width="20%" class="text-right">الفئة</th>
            <th width="20%" class="text-right">الفرعى</th>

            <th width="10%" class="text-right">العدد</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $v=1;
        if($v == 1)
        {
            $male = $this->db->query('SELECT count(*) as c FROM persons WHERE gender=1'); 
            $male1 = $male->result();
            $female = $this->db->query('SELECT count(*) as c FROM persons WHERE gender=2'); 
            $female1 = $female->result();
            
            echo '<tr  data-toggle="tooltip" >
                  <td rowspan="2"><span class="badge">'. $v++ .'</span></td>
                  <td rowspan="2" >النوع</td>
                  <td class="ttdd"  data-placement="bottom"  title="إضغط للتفاصيل"
                    data-toggle="modal" data-target="#myodall0">ذكر</td>
                  <td class="ttdd"  data-placement="bottom"  title="إضغط للتفاصيل"
                    data-toggle="modal" data-target="#myodall0">'.$male1[0]->c.'</td>
                  </tr>
                  <tr>
                  <td class="ttdd"  data-placement="bottom"  title="إضغط للتفاصيل"
                    data-toggle="modal" data-target="#myodall1">أنثى</td>
                  <td class="ttdd"  data-placement="bottom"  title="إضغط للتفاصيل"
                    data-toggle="modal" data-target="#myodall1">'.$female1[0]->c.'</td>
                  </tr>';
        }
        foreach($array_tables as  $key=>$value):
        
            ?>
            <tr  data-toggle="tooltip" >
            <td rowspan="<?php echo sizeof($array_tables[$key])?>"><span class="badge"><?php echo $v;$v++ ?></span></td>
            <td rowspan="<?php echo sizeof($array_tables[$key])?>" data-toggle="modal" data-target="#myModal"><?php echo $arr_type[$key]  ;?></td>

            <?php foreach($array_tables[$key] as  $keys=>$value):
                $query = $this->db->query('SELECT count(*) as c FROM persons WHERE '.$person_fields[$key].'='.$keys); 
                $result = $query->result();
                
                ?>

            <?php  if (sizeof($array_tables[$key])!= 0):?>


                <td class="ttdd"  data-placement="bottom"  title="إضغط للتفاصيل"
                    data-toggle="modal" data-target="#myodal<?php echo $keys ?>"
                > <?php echo $array_tables[$key][$keys] ?></td>
                <td class="ttdd" data-placement="bottom"  title="إضغط للتفاصيل"
                    data-toggle="modal" data-target="#myodal<?php echo $keys ?>" >
                    <?php echo $result[0]->c; ?>
                </td>
                </tr>
                
                
             
             
            
             
             

            <?php  endif; ?>

            <?php
        endforeach;
            //endfor;?>

        <?php  endforeach ; ?>
        </tbody></table>



<?php
$query2 = $this->db->query('SELECT * FROM persons WHERE gender=1'); 
                $result2 = $query2->result();
                if($result2){?>
                    
<div class="modal fade" id="myodall0" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:550px">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"  aria-hidden="true">&times;</button>
                <h4 class="modal-title">التفاصيل</h4>
             </div>
             
             <div class="modal-body">
             <table id="" class="table table-bordered table-hover table-striped" cellspacing="0" width="99%" style="margin-right: 6px;">

              <thead>
        <tr>
            <th width="2%">#</th>

            <th  width="20%" class="text-right">الإسم</th>
            <th width="20%" class="text-right">تاريخ التسجيل</th>

            <th width="10%" class="text-right">المدينة</th>
        </tr>
        </thead>
        <tbody>
        
        
        
        
        <?php
        
        for($x = 0 ; $x < count($result2) ; $x++){
            echo '<tr>
                  <td>'.($x+1).'</td>
                  <td>'.$result2[$x]->name.'</td>
                  <td>'.date('Y-m-d',$result2[$x]->regist_date).'</td>
                  <td>'.$result2[$x]->city.'</td>
                  </tr>';
        }
        
        ?>
              

</tbody>
              </table>
             
             </div>
             
                    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" >إغلاق</button>
      </div>
    </div>
  </div>
</div>                    
                    
                <?php }
                
                $query2 = $this->db->query('SELECT * FROM persons WHERE gender=2'); 
                $result2 = $query2->result();
                if($result2){ ?>
                    
                    
<div class="modal fade" id="myodall1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:550px">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"  aria-hidden="true">&times;</button>
                <h4 class="modal-title">التفاصيل</h4>
             </div>
             
             <div class="modal-body">
             <table id="" class="table table-bordered table-hover table-striped" cellspacing="0" width="99%" style="margin-right: 6px;">

              <thead>
        <tr>
            <th width="2%">#</th>

            <th  width="20%" class="text-right">الإسم</th>
            <th width="20%" class="text-right">تاريخ التسجيل</th>

            <th width="10%" class="text-right">المدينة</th>
        </tr>
        </thead>
        <tbody>
        
        
        
        
        <?php
        
        for($x = 0 ; $x < count($result2) ; $x++){
            echo '<tr>
                  <td>'.($x+1).'</td>
                  <td>'.$result2[$x]->name.'</td>
                  <td>'.date('Y-m-d',$result2[$x]->regist_date).'</td>
                  <td>'.$result2[$x]->city.'</td>
                  </tr>';
        }
        
        ?>
              

</tbody>
              </table>
             
             </div>
             
                    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" >إغلاق</button>
      </div>
    </div>
  </div>
</div>                     
                    
                    
                    
              <?php      }





        $v=1;
        foreach($array_tables as  $key=>$value){
            foreach($array_tables[$key] as  $keys=>$value){
                
                $query2 = $this->db->query('SELECT * FROM persons WHERE '.$person_fields[$key].'='.$keys); 
                $result2 = $query2->result();
                if($result2){
            ?>

 <div class="modal fade" id="myodal<?php echo $keys ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:550px">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"  aria-hidden="true">&times;</button>
                <h4 class="modal-title">التفاصيل</h4>
             </div>
             
             <div class="modal-body">
             <table id="" class="table table-bordered table-hover table-striped" cellspacing="0" width="99%" style="margin-right: 6px;">

              <thead>
        <tr>
            <th width="2%">#</th>

            <th  width="20%" class="text-right">الإسم</th>
            <th width="20%" class="text-right">تاريخ التسجيل</th>

            <th width="10%" class="text-right">المدينة</th>
        </tr>
        </thead>
        <tbody>
        
        
        
        
        <?php
        
        for($x = 0 ; $x < count($result2) ; $x++){
            echo '<tr>
                  <td>'.($x+1).'</td>
                  <td>'.$result2[$x]->name.'</td>
                  <td>'.date('Y-m-d',$result2[$x]->regist_date).'</td>
                  <td>'.$result2[$x]->city.'</td>
                  </tr>';
        }
        
        ?>
              

</tbody>
              </table>
             
             </div>
             
                    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" >إغلاق</button>
      </div>
    </div>
  </div>
</div>



    


<?php 
}

}
}

endif;?>

<style>
.ttdd { cursor: pointer; cursor: hand; }

</style>