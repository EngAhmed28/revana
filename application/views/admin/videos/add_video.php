<h2 class="text-flat">إدارة الكورسات <span class="text-sm"><?php echo $title; ?></span></h2>
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
        <?php
        $id =$this->uri->segment(3);
        $type =$this->uri->segment(4);
        echo form_open_multipart('dashboard/add_videos/'.$id.'/'.$type,array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>
            <legend ><?php echo $title; ?></legend>
            <?php
            if($get_vid){
                echo '<table class="table table-bordered table-hover table-striped" cellspacing="0" " style="margin-right: 191px; width: 56%;" >
                      <thead>';
                for($x = 0 ; $x < count($get_vid) ; $x++){
                    if(count($get_vid) > 0)
                    {
                        $td = '<td style="padding-top: 10px;">
                               <a  href="'.base_url().'dashboard/delete_videos/'.$get_vid[$x]->id.'/'.$id.'/'.$type.'"  class="btn btn-danger btn-xs col-lg-12">
                                حذف <i class="fa fa-trash"></i></a>                               
                               </td>';
                    }
                    else
                        $td = '';
                    echo '<tr class="">
                          <td >
                          <input type="text" name="old_title"   readonly value="'.$get_vid[$x]->title.'" style="width: 408px;" >
                          
                          </td> </tr>
                          <tr>
                          <td>  <input type="text" name="old_vid"  readonly  value="https://www.youtube.com/embed/'.$get_vid[$x]->vid.'" style="width: 408px;"></td>
                          '.$td.'
                          </tr>';
                }
                echo '</thead></table>';
            }
            ?>


            <div class="form-group">
                <label for="inputUser" class="col-lg-2 control-label">عدد الفيديوهات:</label>
                <div class="col-lg-2 input-grup">
                    <input type="number" id="vid_num"  name="vid_num" min="1" max="10" onkeyup="return lood($('#vid_num').val());" class="form-control text-right" placeholder="  عدد الفيديوهات" required>
                </div>
            </div>
            <div id="optionearea1"></div>

            <div class="form-group" >
                <div class="col-xs-10 col-xs-pull-2">
                    <button type="reset" class="btn btn-default">أبدء من جديد ؟</button>
                    <input type="submit"  name="add_video" value="حفظ" class="btn btn-primary" >
                </div>
            </div>
        </fieldset>
        <?php echo form_close()?>
</div>
<script>
    function lood(num){
        if(num>0 && num != '')
        {
            var id = num;
            var dataString = 'num=' + id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/dashboard/add_videos',
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
            $("#vid_num").val('');
            $("#optionearea1").html('');
        }
    }
</script>
