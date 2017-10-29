<h2 class="text-flat">إدارة البيانات الأساسية <span class="text-sm"><?php echo $title; ?></span></h2>
<ul class="breadcrumb pb30">
    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الرئيسية</a></li>
    <li class="active"><?php echo $title; ?></li>
</ul>
<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
    </span>
<div class="well bs-component" >
    <?php if(isset($result)):?>
        <?php echo form_open_multipart('dashboard/updatenews/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>
            <legend ><?php echo $title; ?></legend>

            <?if ($result['news_title'] !=""):?>
            <div class="form-group"  id='show-me' >
                <label for="inputUser" class="col-lg-2 control-label">عنوان الخبر:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>
                    <input type="text" id="title"  value="<?php echo $result['news_title']; ?>" name="title" class="form-control text-right" placeholder="   عنوان الخبر:">
                </div>
            </div>
            <? endif;?>
            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">صور الخبر</label>
                <div class="col-lg-2 input-grup">
                    <input type="number" id="photo_num"  name="photo_num" min="1" max="10" onkeyup="return lood($('#photo_num').val());" class="form-control text-right" placeholder="   عدد الصور" >
                </div>
            </div>
            <div id="optionearea1"></div>
            <?php
            $photo=$get_img;
            if($photo){
                echo '<table class="table table-bordered table-hover table-striped" cellspacing="0" " style="margin-right: 191px; width: 56%;" >
                      <thead>';
                for($x = 0 ; $x < count($photo) ; $x++){
                    if(count($photo) > 0)
                    {
                        $td = '<td style="padding-top: 10%px;">
                               <a  href="'.base_url().'dashboard/delete_photo_news/'.$photo[$x]->id.'/'.$result['id'].'"  class="btn btn-danger btn-xs col-lg-12">
                                حذف <i class="fa fa-trash"></i></a>
                               </td>';
                    }
                    else
                        $td = '';
                    $img = base_url('uploads/images').'/'.$photo[$x]->img;
                    echo '<tr class="">
                          <td class="text-center">
                          <img src="'.$img.'" height="200px" width="200px">
                          </td>
                          '.$td.'
                          </tr>';
                }
                echo '</thead></table>';
            }
            ?>
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">نبذة عن الخبر:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>
                    <textarea type="text" id="content"  name="content" class="form-control text-right" placeholder="نبذة عن الخبر" ><?php echo $result['news_content']; ?></textarea>
                </div>
            </div>
            <div class="form-group" >
                <div class="col-xs-10 col-xs-pull-2">
                    <input type="submit" name="update" value="حفظ" class="btn btn-primary" >
                </div>
            </div>
        </fieldset>
        <?php echo form_close()?>
    <?php else: ?>
        <?php echo form_open_multipart('dashboard/addnews',array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>
            <legend ><?php echo $title; ?></legend>


            <div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">عنوان الخبر:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>
                    <input type="text" id="title"  name="title" class="form-control text-right" placeholder="عنوان الخبر" >
                </div>
            </div>


            <div class="form-group">
                <label for="inputUser" class="col-lg-2 control-label">صور الخبر:</label>
                <div class="col-lg-2 input-grup">
                    <input type="number" id="photo_num"  name="photo_num" min="1" max="10" onkeyup="return lood($('#photo_num').val());" class="form-control text-right" placeholder="  عدد الصور" required>
                </div>
            </div>
            <div id="optionearea1"></div>
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">نبذة عن الخبر:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>
                    <textarea id="content"  name="content" class="form-control text-right" required="required"></textarea>
                </div>
            </div>
            <div class="form-group" >
                <div class="col-xs-10 col-xs-pull-2">
                    <button type="reset" class="btn btn-default">أبدء من جديد ؟</button>
                    <input type="submit"  name="add_news" value="حفظ" class="btn btn-primary" >
                </div>
            </div>
        </fieldset>
        <?php echo form_close()?>
    <?php endif?>
</div>
<?php if(isset($records)&&$records!=null):?>
    <table id="no-more-tables" class="table table-bordered" role="table">
        <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>لوحة التحكم في الإدارة.</p></caption>
        <thead>
        <tr>
            <th width="2%">#</th>
            <th  class="text-right">عنوان الخبر</th>
            <th class="text-right">التفاصيل</th>
            <th  class="text-right">تعليقات الخبر</th>

            <th class="text-right">التحكم</th>
        </tr>
        </thead>
        <tbody>
        <?php $x = 0; ?>
        <?php foreach($records as $record):
            $x++;
            ?>
            <tr>
                <td data-title="#"><span class="badge"><?php echo $x?></span></td>
                <td data-title="عنوان القسم"><?php echo $record->news_title?> </td>
                <td data-title="التفاصيل" class="text-center">
                    <button type="button" class="btn btn-info btn-xs  " data-toggle="modal" data-target="#myModal<?php echo $record->id?>"><i class="fa fa-list"></i> التفاصيل </button>
                </td>
                <td class="text-center">
                    <a  href="<?php echo base_url().'dashboard/comment/'.$record->id?>"  class="btn btn-darkw btn-xs   "><i class="fa fa-comment"></i> التعليقات</a>
                </td>
                <td data-title="التحكم" class="text-center">
                    <a  href="<?php echo base_url().'dashboard/deletenews/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   col-lg-4"><i class="fa fa-trash"></i> حذف</a>
                    <a href="<?php echo base_url().'dashboard/updatenews/'.$record->id?>" class="btn btn-warning btn-xs col-lg-4"><i class="fa fa-pencil"></i> تعديل</a>
                </td>
            </tr>
            <!----------------------------------------------------------------------------------------------------------------------->
            <div class="modal fade" id="myModal<?php echo $record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="gridSystemModalLabel"></h4>
                        </div>
                        <? if($record->news_title !=''):?>
                        <div class="col-sm-3">عنوان الخبر</div>
                        <div class="col-sm-9">
                            <?php  echo $record->news_title ?>
                        </div>
                        <br /><br />
                          <?endif;?>
                        <div class="modal-body">
                            <div class="col-sm-2">صور الخبر</div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div id="myCarousel<?php echo $record->id?>" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner" role="listbox">
                                            <?php
                                            $photo= $images[$record->id];
                                            for($x=0;$x<  sizeof($photo);$x++){
                                                if($x==0){
                                                    $active='active';
                                                }else{
                                                    $active='';
                                                }
                                                $img = base_url('uploads/images').'/'.$photo[$x];
                                                echo '
                                      <div class="item '.$active.'">
                                   <img src="'.$img.'" alt="صور الخبر">
                                        </div>';
                                            }
                                            ?>
                                        </div>
                                        <a class="left carousel-control" href="#myCarousel<?php echo $record->id?>" role="button" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#myCarousel<?php echo $record->id?>" role="button" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                <br/><br />
                            </div>
                            <br />
                            <div class="col-md-3"></div>
                            <div class="col-md-9"></div>
                            <br /><br />
                            <div class="row">
                                <div class="col-sm-4" >نبذة عن الخبر</div>
                                <div class="col-sm-8">
                                    <?php
                                    echo  character_limiter(strip_tags($record->news_content), 50); ?>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            <!----------------------------------------------------------------------------------------------------------------------->
        <?php endforeach ;?>
        </tbody>
    </table>
    <div class="col-xs-12 mt30 text-center">
        <?php echo  $links?>
    </div>
<?php endif;?>
<script>
    function lood(num){
        if(num>0 && num != '')
        {
            var id = num;
            var dataString = 'num=' + id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/dashboard/addnews',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea1").html(html);
                }
            });
            return false;
        }
        else
        {
            $("#photo_num").val('');
            $("#optionearea1").html('');
        }
    }
</script>
