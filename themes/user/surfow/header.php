<?php include("settings.php");   ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <?php
        if(Check::is_routed("home")) {
            Template::title(htmlentities(s("seo/title")));
        } else {
            Template::title(get('title1') . " &mdash; " . get('title2'));
        } ?>
		<?php Template::description(htmlentities(s("seo/description"))); ?>
		<?php Template::keywords(htmlentities(s("seo/keywords"))); ?>
		<?php Template::author("http://wesparklesolutions.com"); ?>
        <?php Template::favicon(htmlentities(s("seo/favicon"))); ?>
		<?php Template::og_title(htmlentities(s("seo/title"))); ?>
		<?php Template::og_image(htmlentities(s("seo/ogimage"))); ?>
		<?php Template::og_site_name(htmlentities(s("generale/name"))); ?>
		<?php Template::og_description(htmlentities(s("seo/description"))); ?>

		<!-- Config -->
        <?php Template::jsconfig(); ?>

		<?php
		if(strtolower(Languages::text_align()) == "right")
		{
			$main_css = "/assets/css/main-rtl.css";
		 ?>
		<link rel="stylesheet" type="text/css" href="//www.fontstatic.com/f=rawy-bold" />
		<?php } else {
			$main_css = "/assets/css/main.css";
		?>
		<link href="//fonts.googleapis.com/css?family=Rajdhani:400,500,700|Anonymous+Pro:400,500,700&subset=latin,latin-ext" rel="stylesheet">
		<?php } ?>


		<!-- css files -->
		<?php Template::css(array(
		"/assets/css/bootstrap.css",
		"/assets/css/colors.css",
		"/assets/css/responsive.css",
		$main_css
		)); ?>

		<!--[if lte IE 8]>
		<?php Template::js("/assets/js/html5shiv.js"); ?>
		<![endif]-->

		<!--[if lte IE 8]>
		<?php Template::css("/assets/css/ie8.css"); ?>
		<![endif]-->
		<!--[if lte IE 9]>
		<?php Template::css("/assets/css/ie9.css"); ?>
		<![endif]-->

		<?php Template::js("/assets/js/jquery.min.js"); ?>

        <?php
		if(Check::is_routed("websites"))
		{
			Template::css("/assets/css/multi-select.css");
            Template::js("/assets/js/jquery.multi-select.js");
		}
		?>

        <!-- Analyse -->
        <?php _s("analyse/code"); ?>

        <?php
        if(Check::is_routed("home"))
        {
            Template::js("/assets/js/jquery.flipCounter.js");
        ?>
    <script type="text/javascript">
    $(document).ready(function() {

        var hits_now = "<?php echo Getdata::howmany("hits"); ?>";

        function update_counter(newend)
        {
            var start = calcul_start(newend);
            var duration = Math.floor(((newend-start)*100)+35000);
            $("#home_counter").flipCounter("startAnimation",{
                end_number: newend,
                duration: duration
            });
        }

        function start_counter(start, end)
        {
            var duration = Math.floor(((end-start)*100)+35000);
            $("#home_counter").flipCounter("startAnimation",{
                start_number: start,
                end_number: end,
                numIntegralDigits: 1,
                numFractionalDigits: 0,
                digitHeight: 55,
                digitWidth: 40,
                imagePath: "<?php _turl(); ?>/assets/img/white-shadow-numbers.png",
                easing: false,
                duration: duration,
                onAnimationStarted: false,
                onAnimationStopped: false,
                onAnimationPaused: false,
                onAnimationResumed: false,
            });
        }

        function calcul_start(number)
        {
            var newnumber = Math.floor(number-((number*30)/100));
            if(newnumber > 1)
            {
                return newnumber;
            }
            else
            {
                return number;
            }
        }

        start_counter(calcul_start(hits_now), hits_now);
        get_new_hits();

        function get_new_hits()
        {
            $.ajax({
                url : "<?php _router("get_hits"); ?>",
                type: "GET",
                success: function(data, textStatus, jqXHR)
                {
                    update_counter(data);
                }
            });
            setTimeout(function(){
                get_new_hits();
            }, 10000);
        }
    });
    </script>
        <?php
        }
        ?>

		<?php
		if(Check::is_routed("websites"))
		{
			Template::css(array(
			"/assets/css/rangeslider.css",
			"/assets/css/rangeslider-html5.css"
			));
			Template::js("/assets/js/ion.rangeSlider.js");
		?>

		<script>
			function count_possible_visitors(seconds)
			{
				var onepointseconds = 60;
				var defpoints = 10000;
				res = Math.floor((onepointseconds/(seconds*<?php _s("nochange/point"); ?>))*defpoints);
				$("#calcul_visitors").html(res);
				$("#calcul_points").html(defpoints);
			}

			function count_possible_visitors_update(seconds)
			{
				var onepointseconds = 60*<?php _s("nochange/point"); ?>;
				var defpoints = 10000;
				res = Math.floor((onepointseconds/(seconds*<?php _s("nochange/point"); ?>))*defpoints);
				$("#calcul_visitors2").html(res);
				$("#calcul_points2").html(defpoints);
			}

			function range_ready_update()
			{
				from_value = $("#seconds_range2").val();
				$("#seconds_range2").ionRangeSlider({
					type: "single",
					min: <?php _s("exchange/minduration"); ?>,
					max: <?php _s("exchange/maxduration"); ?>,
					from: from_value,
					keyboard: true,
					onStart: function (data) {
						count_possible_visitors_update(data["from"]);
					},
					onChange: function (data) {
						count_possible_visitors_update(data["from"]);
					},
					onFinish: function (data) {
						count_possible_visitors_update(data["from"]);
					},
					onUpdate: function (data) {
						count_possible_visitors_update(data["from"]);
					}
				});
				max_value = $("#website_hour_max2").val();
				$("#website_hour_max2").ionRangeSlider({
					type: "single",
					min: 30,
					max: 2000,
					from: max_value,
					keyboard: true
				});
				$('input:radio[name="update_website_limit"]').change(function(){
					if ($(this).is(':checked') && $(this).val() == 'on') {
						$("#website_total2").show();
					} else {
						$("#website_total2").hide();
					}
				});
				$('#update_source_select').change(function(){
					if ($(this).val() == 'custom') {
						$("#update_website_source_link").show();
					} else {
						$('#update_website_source').val('');
						$("#update_website_source_link").hide();
					}
				});
				if ($('#update_source_select').val() == 'custom') {
					$("#update_website_source_link").show();
				} else {
					$('#update_website_source').val('');
					$("#update_website_source_link").hide();
				}
				$("#update_website_form").submit(function(e){
					e.preventDefault();
					ajax_post('update_website_form', 'update_website_alert', 1, window.location);
				});

				<?php if(u("type")=="Bronze" && s("exchange/source")!="yes") { ?>
				$('#disabled_update_content_inside').hide();
				<?php } ?>

				<?php if(s("exchange/ipcheck")!="all") { ?>
				$('#disabled_update_content_inside').hide();
				$('#disabled_update_content_inside3').hide();
				<?php } ?>

                <?php if(u("type")=="Bronze" && s("geotarget/access")!="free") { ?>
				$('#disabled_update_content_inside2').hide();
				<?php } else { ?>
                $('#gettarget-update').multiSelect();
                <?php } ?>
			}


			function range_ready()
			{
				$("#seconds_range").ionRangeSlider({
					type: "single",
					min: <?php _s("exchange/minduration"); ?>,
					max: <?php _s("exchange/maxduration"); ?>,
					from: 6,
					keyboard: true,
					onStart: function (data) {
						count_possible_visitors(data["from"]);
					},
					onChange: function (data) {
						count_possible_visitors(data["from"]);
					},
					onFinish: function (data) {
						count_possible_visitors(data["from"]);
					},
					onUpdate: function (data) {
						count_possible_visitors(data["from"]);
					}
				});
				$("#website_hour_max").ionRangeSlider({
					type: "single",
					min: 30,
					max: 2000,
					from: 200,
					keyboard: true
				});
				$('input:radio[name="website_limit"]').change(function(){
					if ($(this).is(':checked') && $(this).val() == 'on') {
						$("#website_total").show();
					} else {
						$("#website_total").hide();
					}
				});
				$('#source_select').change(function(){
					if ($(this).val() == 'custom') {
						$("#website_source_link").show();
					} else {
						$('#website_source').val('');
						$("#website_source_link").hide();
					}
				});
				$("#website_form").submit(function(e){
					e.preventDefault();
					ajax_post('website_form', 'website_alert', 1, window.location);
				});
				<?php if(u("type")=="Bronze" && s("exchange/source")!="yes") { ?>
				$('#disabled_content_inside').hide();
				<?php } ?>

				<?php if(s("exchange/ipcheck")!="all") { ?>
				$('#disabled_content_inside').hide();
				$('#disabled_content_inside3').hide();
				<?php } ?>

                <?php if(u("type")=="Bronze" && s("geotarget/access")!="free") { ?>
				$('#disabled_content_inside2').hide();
				<?php } else { ?>
                $('#gettarget-select').multiSelect();
                <?php } ?>
			}

			$(document).ready(function(){
				range_ready();
			});
		</script>
		<?php
		}
		?>

        <?php
		if(Check::is_routed("payments"))
		{
			Template::css("/assets/css/plans.css");
			Template::js("/assets/js/plans.js");
		}
		?>
        <?php
        if(Languages::text_align() == "right")
        {
            Template::style("
            body, input, select, textarea, th, tr {
                direction: rtl !important;
                text-align: right !important;
            }
            .menuToggle {
                direction: ltr !important;
            }
            nav {
                direction: ltr !important;
            }
            .close {
                float: left;
            }
            input[type=\"radio\"], input[type=\"checkbox\"] {
                float: right !important;
            }

            label {
                padding-right: 10px;
            }
            span {
                direction: ltr;
            }
            ");
        }
        Template::style(" a { text-decoration: none !important; } ");
        ?>
	</head>
	<?php if(Check::is_routed("home")) { ?>
    <body class="landing">
    <?php } else { ?>
    <body>
    <?php } ?>
    <div id="page-wrapper">
