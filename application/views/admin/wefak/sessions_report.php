<span id="message">

<?php

if(isset($_SESSION['message']))

    echo $_SESSION['message'];

unset($_SESSION['message']);

?>
    </span>
<?php if(isset($records)&&$records!=null):?>



    <table id="no-more-tables" class="table table-bordered" role="table">

        <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>طلبات حجز الكورسات.</p></caption>

        <thead>

        <tr>

            <th width="2%">#</th>
            <th  class="text-right">اسم الكورس</th>

            <th  class="text-right">عدد المتقدمين</th>


        </tr>

        </thead>

        <tbody>

        <?php foreach($records as $record):?>

            <tr>
                <td data-title="#"><span class="badge"><?php echo $record->sessions_reserve_id_pk?></span></td>
                <td > <?php echo $record->sessions_name?> </td>

                <td > <?php echo $record->count_all('sessions_reserve_name');?> </td>

            </tr>

        <?php endforeach ;?>

        </tbody>

    </table>


<?php endif;?>
