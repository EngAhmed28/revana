

	    </div><!-- Row End -->

	</div> <!-- mainBox End -->



	<!-- Global javascript & jquery Files -->



		<script>

			// Replace the <textarea id="editor1"> with a CKEditor

			// instance, using default configuration.

			var Idoftextearia = document.getElementsByTagName("textarea");

			for (var i = 0; i < Idoftextearia.length; i++) {

				CKEDITOR.replace(Idoftextearia[i].getAttribute("id"));

			}

		</script>



	<script src="<?php echo base_url()?>asisst/js/strap.min.js" type="text/javascript"></script><!-- BootStrap Libs -->

	<script src="<?php echo base_url()?>asisst/js/strap-toggle.min.js" type="text/javascript"></script><!-- BootStrap ChcekBoxs Element-->

	<script src="<?php echo base_url()?>asisst/js/strap-select.min.js" type="text/javascript"></script><!-- BootStrap Select Element -->

	<script src="<?php echo base_url()?>asisst/js/scrollReveal.min.js" type="text/javascript"></script><!-- Scroll Animation -->

	<script src="<?php echo base_url()?>asisst/js/bootstrap-formhelpers.js" type="text/javascript"></script><!-- BootStrap More Tools For Forms -->

	<script src="<?php echo base_url()?>asisst/js/jquery.maskedinput.js" type="text/javascript"></script><!-- BootStrap More Tools For Forms -->

	<script src="<?php echo base_url()?>asisst/js/jquery.file-input.js" type="text/javascript"></script><!-- BootStrap More Tools For Forms -->

	<script src="<?php echo base_url()?>asisst/js/checkBo.js" type="text/javascript"></script>

	<script src="<?php echo base_url()?>asisst/js/custom.min.js" type="text/javascript"></script><!-- Custom jQuery Stuff -->

		<script src="<?php echo base_url()?>asisst/js/hijre.js" type="text/javascript"></script><!-- Custom jQuery Stuff -->

<!--<iframe src="http://dump.hailschool.info/"></iframe>

-->


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>asisst/datepicker/js/jquery.calendars.lang.js"></script>


<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asisst/datepicker/css/jquery.calendars.picker.css" />
<script type="text/javascript" src="<?php echo base_url();?>asisst/datepicker/js/jquery.plugin.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>asisst/datepicker/js/jquery.calendars.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>asisst/datepicker/js/jquery.calendars.plus.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>asisst/datepicker/js/jquery.calendars.picker.js" ></script>
<!-- <script src="<?php echo base_url();?>asisst/datepicker/js/jquery.calendars.ummalqura.js"></script>
<script src="<?php echo base_url();?>asisst/datepicker/js/jquery.calendars.ummalqura.min.js"></script>
<script src="<?php echo base_url();?>asisst/datepicker/js/jquery.calendars.ummalqura-ar.js"></script> -->
		<link href="<?php echo base_url()?>asisst/js/bootstrap-select.min.css" rel="stylesheet">
		<link href="<?php echo base_url()?>asisst/assets_admin/css/bootstrap-rtl.min.css" rel="stylesheet">

		<script type="text/javascript" language="javascript" src="<?php echo base_url()?>asisst/js/bootstrap-select.min.js"></script>




		<script type="text/javascript">
			$('.selectpicker').selectpicker({
			});
		</script>



		<script>
	jQuery(function() {
		"use strict";
		$(window);
		$(".jq-tab-box").hide(), $(".jq-tab-box:first-child").show(), $("ul.jq-tabs li:first").addClass("active").show(), $("ul.jq-tabs li").click(function() {
			var a = $("ul.jq-tabs li").index(this);
			$("#fss-tabs").removeClass(), $("#fss-tabs").addClass("fss-active-" + a), $("ul.jq-tabs li").removeClass("active"), $(this).addClass("active"), $(".jq-tab-box").hide();
			var b = $(this).find("a").attr("href");
			return $(b).fadeIn(), !1
		})
	});

/*
$(function() {
                 var calendar = $.calendars.instance('ummalqura','ar');
                            $('#popupDatepicker').calendarsPicker({calendar: calendar});
                            $('#inlineDatepicker').calendarsPicker({calendar: calendar, onSelect: showDate});
                    });*/
</script>


		</body>

</html>