<?php

$id_number = $_POST['numbers'];

$query2 =$this->db->query('SELECT * FROM `register` WHERE `id_number`='.$id_number);
$arr=array();
foreach ($query2->result() as  $row2) {
    $arr[] =$row2;
}

  if(sizeof($arr) > 0){ ?>
   <div class="alert alert-danger" >
              تأكد من إدخال رقم الهوية الصحيح .. هذ الرقم تم إدخاله من قبل.
              </div>

  <?}else{     ?>
<div class="alert alert-success" >
            رقم الهوية هذا غير موجود
              </div>

 <? } ?>