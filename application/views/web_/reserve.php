
   <?php echo form_open_multipart('Reserve/',array('class'=>"form-horizontal",'role'=>"form" ))?>
     
<section class="reserve container">
    <header>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <br><br>
            <p class="text-center">المملكه العربيةٌ السعوديةٌ<br>
                معهد حاسوب بلاحدود للتدريبٌ<br>
                تحت إشراف المؤسسة العامة للتدريبٌ التقنى والمهنى <br> رقم الرخصة 33329363222 </p>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12 text-center">
            <img src="<?php echo base_url() ?>asisst/web_asset/img/logo.jpg" width="100" height="100">
            <p>نموذج طلب التسجيلٌ</p>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12 text-center">
            <img src="<?php echo base_url() ?>asisst/web_asset/img/boss.png" width="120" height="100">
            <p>صورة المتدرب</p>
        </div>
        <hr class="col-xs-12">
        <div class="clearfix"></div>

    </header>

<span id="message">
<?php
if(isset($_SESSION['message']))

    echo $_SESSION['message'];

unset($_SESSION['message']);
?>
    </span>


    <div class="trainer-details col-xs-12">
        <h4>بيانات المتدرب</h4>
        <table class="table table-striped table-bordered">
            <tr>
                <td>اسم المتدرب</td>
                <td><input type="text" name="sessions_reserve_name" class="form-control"></td>
                <td>رقم الهوية</td>
                <td><input type="text" name="number" class="form-control"></td>
            </tr>

            <tr>
                <td>مصدر / تاريخٌ الهويةٌ</td>
                <td><input type="text" name="place_of_number" class="form-control"></td>
                <td>المؤهل</td>
                <td><input type="text" name="sessions_reserve_qualification" class="form-control"></td>
            </tr>

            <tr>
                <td>مكان / تاريخٌ الميلٌاد</td>
                <td><input type="text" name="sessions_reserve_barth_place" class="form-control"></td>
                <td>رقم الهاتف</td>
                <td><input type="text" name="sessions_reserve_phone" class="form-control"></td>
            </tr>

        </table>
    </div>


    <div class="program-details col-xs-12">
        <h4>بياٌنات البرنامج ( دبلومة / برنامج تدريبٌي / دورة تأهيلٌيةٌ / دورة تطويرٌيةٌ )</h4>
        <table class="table table-striped table-bordered">
            <tr>
                <td>مسمى البرنامج</td>
                <td> <select id="sessions_id_fk" name="sessions_id_fk" class="form-control" >
                        <option  value="0">إختر  الكورس</option>
                        <?php foreach($sessions as $session):?>
                        
                            <option value="<?php echo $session->sessions_id_pk?> "><?php  echo $session->sessions_name?>  </option>
                        <?php endforeach?>
                    </select></td>
                <td>نوع البرنامج</td>
                <td>&nbsp &nbsp(دورة تأهيلية)&nbsp&nbsp&nbsp</td>
            </tr>

            
        </table>
    </div>



    <div class="contract-details col-xs-12">
        <h4>بياٌنات تاريخٌ ومقر عقد البرنامج</h4>
        <table class="table table-striped table-bordered ">
            <tr>
                <td>المدينٌة /المحافظة</td>
                <td>المدينة المنورة</td>
                <td>المقر</td>
                <td>الحي الأزهري شارع المنذر بن محمد</td>
            </tr>


        </table>
    </div>




    <div class="instructions col-xs-12">
        <h4>تعليمٌات وأنظمة المنشأة التدريبٌيةٌ</h4>
        <div class="box">
            <h5>يلتزم المتدرب / المتدربة بأنظمة وتعليمات المنشأة التدريبية التالية : (يرجى القراءاة جيداّ )</h5>
            <ol>
                <li>الإلتزام بالمواعيد المحددة للدورة.</li>
                <li>الإلتزام بالسلوكيات الحميدة و الأخلاق الحسنة مع المتدربين والمدربين. </li>
                <li>لا يحق للمتدرب سحب أى مبالغ مالية بعد مرور أسبوع من تاريخ سند القبض المسلم منه الأصل الى المتدرب.</li>
                <li> اذا طلب المتدرب سحب المبالغ المالية قبل مرور أسبوع يخصم منه مبلغ 200 ريال مائتان ريال رسوم التسجيل والقبول.</li>
                <li>لا يحق للمتدرب دخول الإختبارات النهائية إلا بعد تسديد كامل الرسوم المتفق عليها سواء كانت نقداّ أو أقساط .</li>
                <li>فى حالة الطلاب المسجلين على دفعتين واللذين يتأخرون عن تسديد الرسوم فى موعدها يحاسب على أنه مسجل بأقساط .</li>
                <li>الطلاب الذين انتهت دوراتهم منذ فترة ولم يتقدموا لدخول الإختبارات ويرغبون فى حضور مراجعة البرامج عليهم تسديد رسوم المراجعة المفق عليها وهى 100 ريال عن كل مادة يرغب بمراجعتها .</li>
                <li>بعد إجتياز الطالب الإختبارات النهائية يتم إصدار الشهادة بعد أخذ رقمها وتريخ اعتمادها من المؤسسة العامة للتريب التقنى و المهنى وذلك خلا أسبوع من اظهار النتائج من قبل إدارة التدريب الأهلى .</li>
                <li>اذا انتهت مدة الدورة وتقدم الطالب للإختبار ورسب بالدورة ويرغب بالمراجعة عليه تسديد مبلغ 100 ريال عن كل مادة يرغب بمراجعتها ويحق له دخول الاختبار مجانا دون تسديد رسوم مراجعة اذا رغب فى ذلك .</li>
            </ol>
            <div class="alert alert-info" role="alert"> ملاحظة : ( لا يحق للمنشأة تحصيل أى مبالغ مالية من المتدربين مقابل إختبارات المؤسسة لأن أجور الإختبارات تقر من المؤسسة وليس من المنشأة )</div>

        </div>
    </div>

    <div class="instru-training col-xs-12">
        <h4>تعليمٌات وأنظمة التدريبٌ فى المؤسسة</h4>
        <div class="box">
            <h5>يلتزم كلا من المتدرب / المنشأة  التدريبية بتعليمات وأنظمة المؤسسة فى التدريب :</h5>
            <h5>أولاّ: تعليمات الدورات التأهيلية </h5>
            <ol>
                <li>يشترط لإعتماد المسجلين فى الدورة التأهيلية رفعها للمؤسسة فى موعد لايتجاوز خمسة عشر يومإ من بدء الدورة .</li>
                <li> إذا تجاوز المتدرب نسبة الغياب المقررة وهى 20 % من إجمالى ساعات الدورة التأهيلية يطوى قيده .</li>
                <li> يمنح المتدرب فى نهاية الدورة شهادة بعد حصولة فى الإختبار النهائى المطلوب للدورة من قبل المؤسسة على 60 % من درجة الإختبار .</li>
                <li>يحق للمتدرب فى الدورة التأهيلية فى حال رسوبه أو غيابه عن الإختبار طلب إعادة الإختبار بعد مضى مدة لا تقل عن خمسة عشر يومأ من تاريخ الإختبار , وهذا ينطبق أيضاَ على من يرغب تحسين تقديره حيث تلغى النتيجة والشهادة السابقة وتعتمد النتيجة الجديدة .</li>
                <li>يتم تسديد رسوم إعادة الإختبارات بإيداع مبلغ وقدره 50 خمسون ريالاَ عن كل محاولة إعادة للإختبار وذلك فى الحساب الخاص بالمؤسسة العامة للتدريب التقنى والمهنى .</li>

            </ol>
            <div class="alert alert-danger" role="alert">للمزيد من تعليمات التدريب يرجى زيارةموقع الإدارة العامة للتدريب الأهلى : http://pt.tvtc.gov.sa</div>
        </div>
    </div>
      <br /><br />   <br /><br /> <br /><br />
    <div class="eqrar col-xs-12">
<center>
   <input type="submit"  name="add_sessions_reserve" value="حفظ طلب الحجز" class="btn btn-primary" >
</center>
</div>
<!--
    <div class="eqrar col-xs-12">
        <h4>( إقرار المتدرب )</h4>
        <div class="box">
            <h5>أوافق على جميع الأنظمة الخاصة بالمنشأة التدريبية و أنظمة و تعليمات المؤسسة العامة للتدريب التقنى والمهنى</h5>
            <table class="table table-bordered">
                <tr>
                    <td>اسم المتدرب</td>
                    <td><input type="text" name="" class="form-control"></td>
                    <td>التوقيع</td>
                    <td><input type="text" name="" class="form-control"></td>
                    <td>التاريخ</td>
                    <td><input type="text" name="" class="form-control"></td>
                </tr>
                <tr>
                    <td>من أين تعرفت على المعهد </td>
                    <td><div class="checkbox">
                            <label>
                                <input type="checkbox"> جرائد اعلانية
                            </label>
                        </div></td>
                    <td><div class="checkbox">
                            <label>
                                <input type="checkbox">المواقع الإلكترونية للمعهد
                            </label>
                        </div></td>
                    <td><div class="checkbox">
                            <label>
                                <input type="checkbox">أحد طلاب المعهد
                            </label>
                        </div></td>
                    <td><div class="checkbox">
                            <label>
                                <input type="checkbox"> مواقع أخرى
                            </label>
                        </div></td>
                    <td><input type="text" name="" class="form-control" placeholder="اذكرها"></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="bottom col-xs-12">
        <table class="table-bordered table">
            <tr>
                <td>اسم مدقق البيانات</td>
                <td><input type="text" name="" class="form-control"></td>
                <td> التوقيع </td>
                <td><input type="text" name="" class="form-control"></td>
            </tr>
            <tr>
                <td>اسم مديرٌ المنشأة التدريبٌ ةٌ</td>
                <td><label>أحمد بن أسعد خليل</label></td>
                <td> التوقيع والختم </td>
                <td><input type="text" name="" class="form-control"></td>
            </tr>
        </table>
    </div>
-->
</section>
    <?php echo form_close()?>
