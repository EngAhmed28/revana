

<style>
    body {font-family: "Lato", sans-serif;}

    ul.tab {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #f1f1f1;
    }

    /* Float the list items side by side */
    ul.tab li {float: left;}

    /* Style the links inside the list items */
    ul.tab li a {
        display: inline-block;
        color: black;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        transition: 0.3s;
        font-size: 17px;
    }

    /* Change background color of links on hover */
    ul.tab li a:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    ul.tab li a:focus, .active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border-top: none;
    }
</style>

<h2 class="text-flat">إدارة الدورات والكورسات <span class="text-sm"><?php echo $title; ?></span></h2>

<ul class="breadcrumb pb30">

    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الرئيسية</a></li>



    <li style="color: gray;"><?php echo $title; ?></li>

</ul>


<ul style="float: right" class="tab">
    <li ><a href="javascript:void(0)" class="tablinks " onclick="openCity(event, 'Paris')"><caption class="text-right text-success"><i class="fa fa-thumbs-up fa-fw"></i>طلبات الحجز المؤكدة</p></caption></a></li>

    <li class=""><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'London')"> <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>طلبات حجز الكورسات.</p></caption></a></li>

</ul>

<div id="London" class="tabcontent" style="display:block">

    <?php if(isset($records)&&$records!=null):?>



        <table id="no-more-tables" class="table table-bordered" role="table">



            <thead>

            <tr>

                <th width="2%">#</th>
                <th  class="text-right">اسم الكورس</th>

                <th  class="text-right">الاسم</th>
                <th  class="text-right">التليفون</th>

                <th  class="text-right">العنوان</th>

                <th  class="text-right">الأيميل</th>

                <th  width="30%" class="text-right">التحكم</th>

            </tr>

            </thead>

            <tbody>

            <?php 
            $serial = 0;
            foreach($records as $record):
            $serial++;
            ?>

        

                <tr>

                    <td data-title="#"><span class="badge"><?php echo $serial?></span></td>
                    <td > <?php echo $record->sessions_name?> </td>
                    <td > <?php echo $record->sessions_reserve_name?> </td>
                    <td > <?php echo $record->sessions_reserve_phone?> </td>
                    <td > <?php echo $record->sessions_reserve_address?> </td>
                    <td > <?php echo $record->sessions_reserve_email?> </td>



                    <td data-title="التحكم" class="text-center">


                        <a  href="<?php echo base_url().'dashboard/delete_Sessions_reserve/'.$record->sessions_reserve_id_pk?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs col-lg-5"><i class="fa fa-trash"></i> حذف</a>
                        <a  href="<?php echo base_url().'dashboard/confirm_sessions/'.$record->sessions_reserve_id_pk?>"  class="btn btn-success btn-xs   col-lg-5"><i class="fa fa-check"></i> تاكيد</a>
                    </td>

                </tr>

            <?php endforeach ;?>

            </tbody>

        </table>



    <?php else:?>
<br><br><br>
        <h3 class="text-right text-success">لا يوجد طلبات حجز.</p></h3>

    <?php endif;?>
</div>

<div id="Paris" class="tabcontent">

    <?php if(isset($selects)):?>



        <table id="no-more-tables" class="table table-bordered" role="table">


            <thead>

            <tr>

                <th width="2%">#</th>
                <th  class="text-right">اسم الكورس</th>

                <th  class="text-right">الاسم</th>
                <th  class="text-right">التليفون</th>

                <th  class="text-right">العنوان</th>

                <th  class="text-right">الأيميل</th>

                <th  width="30%" class="text-right">التحكم</th>

            </tr>

            </thead>

            <tbody>

            <?php 
            $serial = 0;
            foreach($selects as $select):
            $serial++;
            ?>



                <tr>

                    <td data-title="#"><span class="badge"><?php echo $serial?></span></td>
                    <td > <?php echo $select->sessions_name?> </td>
                    <td > <?php echo $select->sessions_reserve_name?> </td>
                    <td > <?php echo $select->sessions_reserve_phone?> </td>
                    <td > <?php echo $select->sessions_reserve_address?> </td>
                    <td > <?php echo $select->sessions_reserve_email?> </td>



                    <td data-title="التحكم" class="text-center">

                        <a href="<?php echo base_url().'dashboard/update_Sessions_reserve/'.$select->sessions_reserve_id_pk?>" class="btn btn-warning btn-xs col-lg-5"><i class="fa fa-pencil"></i> تعديل</a>

                        <a  href="<?php echo base_url().'dashboard/delete_Sessions_reserve/'.$select->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs col-lg-5"><i class="fa fa-trash"></i> حذف</a>
                    </td>

                </tr>

            <?php endforeach ;?>

            </tbody>

        </table>


    <?php endif;?>


</div>


<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>






