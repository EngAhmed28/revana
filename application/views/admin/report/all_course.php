<h2 class="text-flat">إدارة التقارير<span class="text-sm"><?php echo $title; ?></span></h2>

<ul class="breadcrumb pb30">

    <li><a href="#"><i class="fa fa-home"></i> الرئيسية</a></li>



    <li class="active"><?php echo $title; ?></li>

</ul>




<?php if(isset($array_tables)&&$array_tables!=null):?>

<table id="sample_1" class="table table-bordered table-hover table-striped" cellspacing="0"  width="99%" style="margin-right: 6px; direction:rtl;">
<thead> 
<tr>
<th width="2%">#</th>

            <th  width="20%" class="text-right">الدورة</th>
             <th width="15%" class="text-right">الكورس</th>

</tr>
</thead>
<tbody>
<?php  
$v=1;
  foreach($array_tables as  $key=>$value):
 ?>
 <tr>
     <td rowspan="<?php echo sizeof($array_tables[$key])?>"><?php echo $v;$v++ ?></td>
     <td rowspan="<?php echo sizeof($array_tables[$key])?>" data-toggle="modal" data-target="#myModal"><?php echo $key ;?></td>
                    
 <?php foreach($array_tables[$key] as  $keys=>$value): ?>

<?php  if (sizeof($array_tables[$key])!= 0):?>


         <td> <?php echo $array_tables[$key][$keys] ?></td>
  </tr>

<?php  endif; ?>

 <?php 
 endforeach;?>
 
<?php  endforeach ; ?>
</tbody></table>
    <div class="col-xs-12 mt30 text-center">
<?php echo  $links?>
    </div>

<?php endif;?>

