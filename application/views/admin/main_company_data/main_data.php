

<h2 class="text-flat">إدارة البيانات الأساسية<span class="text-sm"><?php echo $title; ?></span></h2>

<ul class="breadcrumb pb30">

    <li><a href="#"><i class="fa fa-home"></i> الرئيسية</a></li>



    <li class="active"><?php echo $title; ?></li>

</ul>

<span id="message">

<?php

if(isset($_SESSION['message']))

    echo $_SESSION['message'];

unset($_SESSION['message']);

?>
    </span>

<div class="well bs-component">

    <?php if(isset($result)): ?>


    <?php echo form_open_multipart('dashboard/update_main_data/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>
    <fieldset>

        <legend ><?php echo $title; ?></legend>
        <div class="mm-page">

            <div class="wrapper ">


                <div id="obj2" class="full-services-section">

                    <div class="fss-frame">

                        <div id="fss-tabs" class="fss-active-0">
                            <ul class="jq-tabs services-tabs">
                                <li class="active">
                                    <a href="#web-traffic">
                        <span class="fss-step-number">
                            <strong><em>1</em></strong>
                        </span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#customer">
                    <span class="fss-step-number">
                        <strong><em>2</em></strong>
                    </span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#customer-value">
                <span class="fss-step-number">
                    <strong><em>3</em></strong>
                </span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#stap4">
            <span class="fss-step-number">
                <strong><em>4</em></strong>
            </span>
                                    </a>
                                </li>
                            </ul>



                            <div class="progress-filler">
    <span class="progress-indicator">
        <span class="progress-active"></span>
    </span>
                            </div>




                            <div class="tabs-content">
                                <div id="web-traffic" class="jq-tab-box clearfix" style="display: none;">
                                    <div class="col-xs-12">
                                        <h4>البيانات الرئيسية</h4>

                                        <div class="form-div">
                                            <label>اسم الشركة :</label>
                                            <input type="text" name="comp_name" value="<?php echo $result['comp_name']; ?>" class="form-control"/>
                                        </div>
                                        <div class="form-div">
                                            <label>عنوان الشركة :</label>
                                            <input type="text" name="comp_address" value="<?php echo $result['comp_address']; ?>" class="form-control"/>
                                        </div>
                                        <div class="form-div">
                                            <label>لوجو الشركة :</label>
                                            <img src="<?php echo base_url('uploads/images/'.$result['comp_logo'].''); ?>" height="200px" width="200px">

                                            <input type="file" name="comp_logo"  class="form-control" />
                                        </div>

                                    </div>


                                </div>
                                <div id="customer" class="jq-tab-box clearfix" style="display: block;">
                                    <div class="col-xs-12">
                                        <h4>وسائل الاتصال</h4>


                                        <div class="form-div">
                                            <label>رقم الهاتف :</label>
                                            <input type="number" id="tele_info"  name="tele_info" min="1" max="5" onkeyup="return lood($('#tele_info').val(),'#optionearea1','tele_info');" class="form-control text-right" placeholder="   أقصى عدد 5" >
                                        </div>
                                        <div id="optionearea1"></div>


                                        <?php

                                        $telephone=unserialize($result['tele_info']);
                                        if($telephone){
                                            echo '<table class="table table-bordered table-hover table-striped" cellspacing="0" " style="margin-right: 191px; width: 56%;" >
                      <thead>';
                                            for($x = 0 ; $x < count($telephone) ; $x++){

                                                if(count($telephone) > 1)
                                                {
                                                    $td = '<td style="padding-top: 10%px;">
                               <a  href="'.base_url().'dashboard/delete/tele_info/'.$result['id'].'/'.$x.'"  class="btn btn-danger btn-xs col-lg-12">
                                حذف <i class="fa fa-trash"></i></a>
                               </td>';
                                                }
                                                else
                                                    $td = '';
                                                echo '<tr class="">
                          <td>
                          <input type="number" name="phone_old'.$x.'" class="form-control" style="width: 500px;" value="'.$telephone[$x].'" title="يجب أدخال رقم للتليفون"/>
                          </td>
                          '.$td.'
                          </tr>';
                                            }
                                            echo '</thead></table>';
                                        }
                                        ?>


                                    </div>
                                </div>
                                <div id="customer-value" class="jq-tab-box clearfix" style="display: none;">
                                    <div class="col-xs-12">
                                        <h4>وسائل الاتصال</h4>

                                        <div class="form-div">
                                            <label>البريد الإلكتروني :</label>
                                            <input type="number" id="email_info"  name="email_info" min="1" max="5" onkeyup="return lood($('#email_info').val(),'#optionearea3','email_info');" class="form-control text-right" placeholder="   أقصى عدد 5" >
                                        </div>
                                        <div id="optionearea3"></div>

                                        <?php

                                        $email=unserialize($result['email_info']);
                                        if($email){
                                            echo '<table class="table table-bordered table-hover table-striped" cellspacing="0" " style="margin-right: 191px; width: 56%;" >
                      <thead>';
                                            for($x = 0 ; $x < count($email) ; $x++){
                                                if(count($email) > 1)
                                                {
                                                    $td = '<td style="padding-top: 10%px;">
                               <a  href="'.base_url().'dashboard/delete/email_info/'.$result['id'].'/'.$x.'"  class="btn btn-danger btn-xs col-lg-12">
                                حذف <i class="fa fa-trash"></i></a>
                               </td>';
                                                }
                                                else
                                                    $td = '';
                                                echo '<tr class="">
                          <td>
                          <input type="email" name="email_old'.$x.'" class="form-control" style="width: 500px;" value="'.$email[$x].'"  title="يجب أدخال الإيميل"/>
                          </td>
                          '.$td.'
                          </tr>';
                                            }
                                            echo '</thead></table>';
                                            ;
                                        }
                                        ?>

                                        <input type="hidden" name="count_phone" value="<?php echo count($telephone) ?>" />
                                        <input type="hidden" name="count_mail" value="<?php echo count($email) ?>" />

                                    </div>
                                </div>
                                <div id="stap4" class="jq-tab-box clearfix" style="display: none;">

                                    <h4>سوشيال ميديا</h4>


                                    <div class="form-div">
                                        <label>فيس بوك:</label>
                                        <input type="text" name="comp_facebook" value="<?php echo $result['comp_facebook']; ?>"  class="form-control"/>
                                    </div>
                                    <div class="form-div">
                                        <label>تويتر:</label>
                                        <input type="text" name="comp_twitter" value="<?php echo $result['comp_twitter']; ?>" class="form-control"/>
                                    </div>
                                    <div class="form-div">
                                        <label>انستجرام:</label>
                                        <input type="text" name="comp_instagram" value="<?php echo $result['comp_instagram']; ?>" class="form-control"/>
                                    </div>
                                    <div class="form-div">
                                        <label>اليوتيوب:</label>
                                        <input type="text" name="comp_youtube" value="<?php echo $result['comp_youtube']; ?>" class="form-control"/>
                                    </div>






                                        <div class="col-xs-10 col-xs-pull-2">


                                            <?php echo'  <input type="submit"  name="update" value="حفظ" class="btn btn-primary" />';?>
                                        </div>



                                </div>



                            </div>
                        </div>
                    </div>


                </div>


            </div>
        </div>




    </fieldset>


    <!-- </form>-->

    <?php echo form_close()?>




    <?php elseif(! $records): ?>

    <?php echo form_open_multipart('dashboard/add_main_data',array('class'=>"form-horizontal",'role'=>"form" ))?>
    <fieldset>

        <legend ><?php echo $title; ?></legend>

        <div class="mm-page">

    <div class="wrapper ">


        <div id="obj2" class="full-services-section">

            <div class="fss-frame">

                <div id="fss-tabs" class="fss-active-0">
                    <ul class="jq-tabs services-tabs">
                        <li class="active">
                            <a href="#web-traffic">
                        <span class="fss-step-number">
                            <strong><em>1</em></strong>
                        </span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#customer">
                    <span class="fss-step-number">
                        <strong><em>2</em></strong>
                    </span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#customer-value">
                <span class="fss-step-number">
                    <strong><em>3</em></strong>
                </span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#stap4">
            <span class="fss-step-number">
                <strong><em>4</em></strong>
            </span>
                            </a>
                        </li>
                    </ul>



                    <div class="progress-filler">
    <span class="progress-indicator">
        <span class="progress-active"></span>
    </span>
                    </div>




                    <div class="tabs-content">
                        <div id="web-traffic" class="jq-tab-box clearfix" style="display: none;">
                            <div class="col-xs-12">
                                <h4>البيانات الرئيسية</h4>

                                    <div class="form-div">
                                        <label>اسم الشركة :</label>
                                        <input type="text" name="comp_name" class="form-control" required/>
                                    </div>
                                    <div class="form-div">
                                        <label>عنوان الشركة :</label>
                                        <input type="text" name="comp_address"  class="form-control" required/>
                                    </div>
                                    <div class="form-div">
                                        <label>لوجو الشركة :</label>
                                        <input type="file" name="comp_logo" class="form-control" required/>
                                    </div>

                            </div>


                        </div>
                        <div id="customer" class="jq-tab-box clearfix" style="display: block;">
                            <div class="col-xs-12">
                                <h4>وسائل الاتصال</h4>


                                    <div class="form-div">
                                        <label>رقم الهاتف :</label>
                                        <input type="number" id="tele_info"  name="tele_info" min="1" max="5" onkeyup="return lood($('#tele_info').val(),'#optionearea1','tele_info');" class="form-control text-right" placeholder="   أقصى عدد 5" required>
                                    </div>
                                <div id="optionearea1"></div>



                            </div>
                        </div>
                        <div id="customer-value" class="jq-tab-box clearfix" style="display: none;">
                            <div class="col-xs-12">
                                <h4>وسائل الاتصال</h4>

                                <div class="form-div">
                                    <label>البريد الإلكتروني :</label>
                                    <input type="number" id="email_info"  name="email_info" min="1" max="5" onkeyup="return lood($('#email_info').val(),'#optionearea3','email_info');" class="form-control text-right" placeholder="   أقصى عدد 5" required>
                                </div>
                                <div id="optionearea3"></div>


                            </div>
                        </div>
                        <div id="stap4" class="jq-tab-box clearfix" style="display: none;">

                                <h4>سوشيال ميديا</h4>


                                    <div class="form-div">
                                        <label>فيس بوك:</label>
                                        <input type="text" name="comp_facebook" class="form-control" required />
                                    </div>
                                    <div class="form-div">
                                        <label>تويتر:</label>
                                        <input type="text" name="comp_twitter" class="form-control" required/>
                                    </div>
                                    <div class="form-div">
                                        <label>انستجرام:</label>
                                        <input type="text" name="comp_instagram" class="form-control" required/>
                                    </div>
                                    <div class="form-div">
                                        <label>اليوتيوب:</label>
                                        <input type="text" name="comp_youtube" class="form-control" required/>
                                    </div>



                            <div class="col-xs-10 col-xs-pull-2">

                                <button type="reset" class="btn btn-default">أبدء من جديد ؟</button>

                                <input type="submit"  name="add" value="حفظ" class="btn btn-primary" >
                            </div>
                        </div>



                    </div>
                </div>
            </div>


        </div>


    </div>
</div>


    </fieldset>


        <!-- </form>-->

        <?php echo form_close()?>


    <?php else: ?>

        <table id="no-more-tables" class="table table-bordered" role="table">

            <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>لوحة التحكم فى الادارة.</p></caption>

            <thead>

            <tr>

                <th  class="text-right">اسم الشركة</th>

                <th width="20%" class="text-right">التحكم</th>

            </tr>

            </thead>
            <tbody>
            <?php foreach($records as $record):?>
                <tr>
                    <td data-title=""><?php echo word_limiter($record->comp_name,10)?> </td>

                    <td data-title="التحكم" class="text-center">

                        <button type="button" class="btn btn-info btn-xs col-lg-5" data-toggle="modal" data-target="#myModal"><i class="fa fa-list"></i> عرض </button>

                        <a href="<?php echo base_url().'dashboard/update_main_data/'.$record->id?>" class="btn btn-warning btn-xs col-lg-5"><i class="fa fa-pencil"></i> تعديل</a>

                    </td>

                </tr>


            <?php endforeach ;?>

            </tbody>

        </table>



    <?php endif?>

</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <table id="" class="table table-bordered table-hover table-striped" cellspacing="0" width="99%" style="margin-right: 6px;">
                        <tr>
                            <td>اسم الشركة </td>
                            <td><?php echo $record->comp_name ?></td>
                        </tr>

                        <tr>
                            <td>اللوجو</td>
                            <td  style="width: 76%;"><img src="<?php echo base_url('uploads/images/'.$record->comp_logo.''); ?>" width="15%"/></td>
                        </tr>
                        <tr>
                            <td>العنوان</td>
                            <td><?php echo $record->comp_address ?></td>
                        </tr>

                        <tr>
                            <td><h5>ارقام التليفون</h5></td>
                            <td>
                                <?php
                                $phones = unserialize($record->tele_info);
                                for($x = 0 ; $x < count($phones) ; $x++)
                                    echo '<h5>'.$phones[$x].'</h5>';
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td><h5>الايميلات</h5></td>
                            <td>
                                <?php
                                $emails = unserialize($record->email_info);
                                for($x = 0 ; $x < count($emails) ; $x++)
                                    echo '<h5>'.$emails[$x].'</h5>';
                                ?>
                            </td>
                        </tr>


                        <tr>
                            <td>رابط الفيسبوك</td>
                            <td><?php echo $record->comp_facebook ?></td>
                        </tr>
                        <tr>
                            <td>رابط تويتر</td>
                            <td><?php echo $record->comp_twitter ?></td>
                        </tr>
                        <tr>
                            <td>رابط انستجرام</td>
                            <td><?php echo $record->comp_instagram ?></td>
                        </tr>
                        <tr>
                            <td>رابط اليوتيوب</td>
                            <td><?php echo $record->comp_youtube ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<script>
    function lood(num,div,page){
        var cleer = '#' + page;
        if(num != 0)
        {
            var id = num;
            var dataString = 'num=' + id + '&page=' + page;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/dashboard/add_main_data',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $(div).html(html);
                }
            });

            return false;
        }
        else
        {
            $(cleer).val('');
            $(div).html('');
            return false;
        }
    }
</script>

