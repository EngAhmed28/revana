<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>belahdoud</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>asisst/web_asset/css/bootstrap-arabic-theme.min.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>asisst/web_asset/css/bootstrap-arabic.min.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>asisst/web_asset/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>asisst/web_asset/css/font-awesome-animation.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>asisst/web_asset/css/owl.carousel.css" >
	<link rel="stylesheet" href="<?php echo base_url() ?>asisst/web_asset/css/owl.theme.css" >
	<link rel="stylesheet" href="<?php echo base_url() ?>asisst/web_asset/css/animate.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>asisst/web_asset/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>asisst/web_asset/css/responsive.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>asisst/web_asset/css/jquery.lightbox-0.5.css">



</head>

<body id="page-top" data-spy="scroll" data-target="" >
<!-- start bottom button -->
<div class="bottom-button">
	<a id="to-top" class="btn btn-lg btn-inverse page-scroll" href="#page-top"> <span class="sr-only">Toggle to Top Navigation</span> <i class="fa fa-chevron-up"></i> </a>
</div>


<section class="top-nav">
	<div class="container">
		<div class="col-sm-6 col-xs-12">
			<div class="right">
				<ul class="list-unstyled">

				
                <!------------------------------------------------------------------------------------>
					<?php echo form_open('Web_login/check_login',array('role'=>'form'))?>
            	<li class="dropdown account">
 <?php 
if(isset($_SESSION["is_loggedin"]) && $_SESSION["is_loggedin"] == true):?>
                      <li class="logout"><a href="<?php echo base_url('Web_login/logout')?>"><i class="fa fa-power-off"></i> تسجيل الخروج </a></li>
<?php else: ?>
   <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sign-in" aria-hidden="true"></i> الدخول </a>     
    <ul class="dropdown-menu text-center" style="display: none;">  
       <li role="separator" class="divider"></li> 
                    <li><input name="user_name" type="text" id="username" class="form-control" placeholder="إسم المستخدم"/></li>
                    <li><input name="user_pass" type="password" id="password" class="form-control" placeholder="كلمة المرور"/></li>
                    <li><label for="rememberme"> 
                        <input name="rememberme" type="checkbox" id="rememberme" value="forever"/> تذكرنى
                    </label></li>
                    <li>
                    	<button name="login" class="enter" type="submit">دخول</button> 
              
                  </li>
                    <li><p class="register">هل أنت مستخدم جديد؟ <a href="<?php echo base_url().'choose'?>">التسجيل</a> </p></li>
       </ul>       
<?php endif?>
  
             </li>
                <?php echo form_close()?>          
<!------------------------------------------------------------------------------------>
                
                
                
					<li><a href="<?php echo base_url().'choose'?>"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> التسجيل فى الموقع </a></li>
					<li><a href="<?php echo base_url().'reserve'?>"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> التسجيل فى دورة تدريبية </a></li>



					<!--<li><a href="proffessor.html"><i class="fa fa-users" aria-hidden="true"></i> المحاضرين </a></li>-->

				</ul>
			</div>

		</div>
		<div class="col-sm-6 col-xs-12">
			<div class="left">
				<ul class="list-unstyled">

					<li><a href="<?php echo base_url().'contact'?>"><i class="fa fa-phone-square" aria-hidden="true"></i> اتصل بنا: +2 101254411 </a></li>
					<li><a href="<?php echo base_url().'help'?>"><i class="fa fa-question-circle" aria-hidden="true"></i> مساعدة </a></li>
                    
                    
	<li><a href="https://webmail1.hostinger.ae/roundcube/"><i class="fa fa-envelope" aria-hidden="true"></i> دخول الإيميلات </a></li>
                    
                                        


				</ul>
			</div>
		</div>
	</div>
</section>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				<img src="<?php echo base_url() ?>asisst/web_asset/img/logo1.png">
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li id="min-logo"><a href="index.html"><img src="<?php echo base_url() ?>asisst/web_asset/img/logo1.png" ></a></li>
				<li class="active"><a href="<?php echo base_url().'web'?>"><i class="fa fa-home" aria-hidden="true"></i> الرئيسية <span class="sr-only">(current)</span></a></li>
				<li><a href="<?php echo base_url().'about'?>">عن بلا حدود</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">الدورات التدريبية <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<?

						if(!empty($this->all_courses_drop)):
							foreach ($this->all_courses_drop as $record):?>
						<li><a href="<?php echo base_url() ?>Coursat/all_courses/<? echo $record->course_id_pk ;?>"><? echo $record->course_name;?></a></li>
						<? endforeach; endif;?>
					</ul>
				</li>
				<li><a href="<?php echo base_url().'offers'?>" class="offer "><i class="fa fa-bullhorn faa-ring animated" aria-hidden="true"></i> أحدث العروض</a></li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">مقتطفات تدريبية <span class="caret"></span></a>
				<ul class="dropdown-menu">
						<?if(!empty($this->all_courses_drop)):
						foreach ($this->all_courses_drop as $record):?>
						<li><a href="<?php echo base_url() ?>Videos_web/all_videos/<? echo $record->course_id_pk ;?>"><? echo $record->course_name;?></a></li>
						<? endforeach; endif;?>

					</ul>
				</li>
				<li><a href="<?php echo base_url().'gallery'?>">مكتبة الصور</a></li>
				<li><a href="<?php echo base_url().'contact_web'?>">اتصل بنا</a></li>
                
                	<li><a href="<?php echo base_url().'room'?>">بث مباشر </a></li>
              
                    
                
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>





