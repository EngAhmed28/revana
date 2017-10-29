<section class="register">
    <div class="container">
        <? $gender =$this->uri->segment(3); ?>
        <?php echo form_open('Choose/register/'.$gender,array('class'=>'form-horizontal','id'=>'form'))?>
        <div class="col-sm-6 col-xs-12">
            <div class="form">
                <label>اسم المستخدم :</label>
                <input type="text" name="user_name" class="form-control" required>
            </div>
            <div class="form">
                <label>الرقم السرى :</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <h4>تفاصيل أكثر عنك</h4>
            <hr>
            <div class="form">
                <label>رقم الهوية :</label>
                <input type="number" name="id_number"  id="id_number" onkeyup="return num($('#id_number').val());" class="form-control">
            </div>
            <div id="optioneareazx"></div>
            <div class="form">
                <label>عنوان البريد الالكترونى :</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form">
                <label>الاسم الأول :</label>
                <input type="text" name="first_name" class="form-control">
            </div>
            <div class="form">
                <label>الأسم الأخير :</label>
                <input type="text" name="last_name" class="form-control">
            </div>
            <div class="form">
                <label>المدينة :</label>
                <input type="text" name="city" class="form-control">
            </div>
            <div class="form">
                <label>الدولة :</label>
                <input type="text" name="country" class="form-control">
            </div>

            <div class="form">
                <label>الهاتف :</label>
                <input type="number" name="phone" class="form-control">
            </div>

            <h4>تفاصيل عن الطلب</h4>
            <hr>
            <div class="form">
                <label>اسم البرنامج المطلوب :</label>
                <input type="text" name="program" class="form-control">
            </div>

            <div class="form">
                <div class="radio ">
                    <label>
                        <input type="radio" name="time" id="time" value="1" checked>
                        صباحاَ
                    </label>
                </div>
                <div class="radio ">
                    <label>
                        <input type="radio" name="time" id="time" value="2">
                        مساءاَ
                    </label>
                </div>
            </div>



            <p>الحقول المشار اليها فى هذا النموذج مطلوبة <strong>*</strong></p>
            <div class="form text-center">
                <button class="btn btn-info" type="submit" name="add" value="إرسل">انشاء حساب جديد</button>
            </div>
            <?php echo form_close()?>
        </div>
        <div class="col-sm-6 col-xs-12">
            <img src="<?php echo base_url() ?>asisst/web_asset/img/1480322997writer 2 (1).png" width="100%">

            <img src="<?php echo base_url() ?>asisst/web_asset/img/business-women.png" width="100%">

        </div>
    </div><!-- end container-->
</section>
<script>


    function num(numbers)
    {
        if(numbers)
        {
            var dataString = 'numbers=' + numbers;

            $.ajax({

                type:'post',
                url: '<?php echo base_url() ?>/choose/register',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#optioneareazx').html(html);
                }
            });
            return false;
        }
        else
        {
            $('#optioneareazx').html('');
            return false;
        }

    }
</script>