<?php include("header.php"); ?>
<?php include("menu.php"); ?>
	<?php Template::js(array(
	"/assets/js/jquery-ui.min.js",
	"/assets/js/jquery.popupwindow.js",
	"/assets/js/jquery.progress.js"
	));
	if(s("exchange/openmode")=="popup")
	{
		Template::js("/assets/js/jquery.popupwindow.js");
	}
	else
	{
		Template::js("/assets/js/jquery.newtabwindow.js");
	}
	?>
    <script>
      $(function() {
		function progress(duration) {
			if($("#realtime_progress").length > 0){        
				$("#realtime_progress").progressbar({value: 0});
				$("#realtime_progress").progressbar('destroy');
				var iNow = new Date().setTime(new Date().getTime() + 0 * 1000);
				var iEnd = new Date().setTime(new Date().getTime() + duration * 1000);
				$("#realtime_progress").anim_progressbar({start: iNow, finish: iEnd, interval: 100});
			}
		}
        
        
		function browsing(win, datapost)
		{
			var closed = false;
			exchange = getCookie('exchange<?php echo Encryption::decode(get("sid")); ?>');
			if(exchange == 'no' )
			{
				$.ajax({
					url : "<?php _router("exchange_process", array("uid" => get("uid"), "sid" => get("sid"))); ?>",
					type: "POST",
					data : datapost,
					success: function(res)
					{
                        var data = res[0];
						var time   = Math.floor(data["duration"])*1000;
						var duration = Math.floor(data["duration"]);
						var url    = data["url"];
						var browse = data["browse"];
						var points = data["points"];

						win = win;
						if(data["open_status"] == false)
						{
							setCookie('exchange<?php echo Encryption::decode(get("sid")); ?>', 'yes');
							win.close();
						}
						win.location = url;
						progress(duration);
						countdown("realtime_progress_counter", duration);
						$("#realtime_url").html(data["show_url"]);
						$("#realtime_points").html(points);
						if(win || !win.closed)
						{
							window.setTimeout(function(){
								closed = true;
								if (win || !win.closed) {
									newdatapost = 'browse='+browse;
									browsing(win, newdatapost);
								}else{
									closed = false;
								}
							}, time);
						}
					},
					error: function(jqXHR, textStatus, errorThrown)
					{
						$('#exchange_alert').html('<b>'+app_network_error+'</b>');
					}
				});
			}
			var checkopen = setInterval(function() {
				if (!win || win.closed) {
					if(!closed)
					{
						$("#realtime_progress").children('.progress-bar').css('width', '0%');
						setCookie('exchange<?php echo Encryption::decode(get("sid")); ?>', 'yes');
                        clear_session('<?php _get("sid"); ?>', '<?php _router("browsing_process", array("uid" => get("uid"), "sid" => get("sid"))); ?>', false);
						window.location = "<?php _router("browsing_process", array("uid" => get("uid"), "sid" => get("sid"))); ?>";
						clearInterval(checkopen);
					}
				}
			}, 500);

			<?php if($_SESSION['switcher']=="manual_") { ?>
			var checkfocus = setInterval(function(){
			if(win)
			{
				var focused = win.document.hasFocus();
				if(!focused)
				{
					setCookie('exchange<?php echo Encryption::decode(get("sid")); ?>', 'yes');
					win.close();
                    clear_session('<?php _get("sid"); ?>', '<?php _router("browsing_process", array("uid" => get("uid"), "sid" => get("sid"))); ?>', true);
					clearInterval(checkfocus);
				}
			}
			}, 500);
			<?php } ?>
			$('#StopBrowsing').on('click', function(event) {
                setCookie('exchange<?php echo Encryption::decode(get("sid")); ?>', 'yes');
                win.close();
                clear_session('<?php _get("sid"); ?>', '<?php _router("browsing_process", array("uid" => get("uid"), "sid" => get("sid"))); ?>', true);
			});
		}
		
        $('#Browsing').on('click', function(event) {
          event.preventDefault();
		  exchange = getCookie('exchange<?php echo Encryption::decode(get("sid")); ?>');
		  $('#exchange_alert').html('<div class="alert alert-danger" ><b style="color: white" ><?php _l("browsing_hint"); ?></b></div>');
              var win = $.popupWindow('<?php _router("browsing_process", array("uid" => get("uid"), "sid" => get("sid"))); ?>?start=true', {
			  name: 'plusurf_browsing',
			  scrollbars:  true,
			  width: screen.width,
              height: screen.height,
              center: 'screen',
			  onLoad: function() {
				  if(exchange == 'yes' || exchange == '' || exchange == null)
				  {
					setCookie('exchange<?php echo Encryption::decode(get("sid")); ?>', 'no');
					browsing(win, '');
				    $('#Browsing').hide();
				    $('#StopBrowsing').show();
				  }
              }
          });
        });
      });
	  $(document).ready(function() {
		  exchange = getCookie('exchange<?php echo Encryption::decode(get("sid")); ?>');
		  if(exchange == 'no')
		  {
			  $('#Browsing').hide();
			  $('#exchange_alert').html("<div class=\"alert alert-info fg-white\" ><?php _l("browsing_start_hint"); ?> <a href='javascript::void(0)' class=\"btn btn-primary\" id='Refresh'><?php _l("refresh"); ?></a></div>");
		  }
		  $('#Refresh').on('click', function(event) {
			  <?php if(s("exchange/openmode")=="popup") { ?>
			  win = window.open("", 'plusurf_browsing');
			  win.close();
			  <?php } ?>
			  setCookie('exchange<?php echo Encryption::decode(get("sid")); ?>', 'yes');
			  window.location = "<?php _router("browsing_process", array("uid" => get("uid"), "sid" => get("sid"))); ?>";
		  });
	  });
    </script>
            <header>
                <h2><?php _l("traffic_exchange"); ?></h2>
			</header>
			<section  class="wrapper style5">
				<div class="content container">
					<div style="margin-top: 50px; text-align: <?php echo Languages::text_align(); ?>" >
                    <center>
                    <?php _s("ads/header"); ?>
						<div id="exchange_alert"></div>
						<a href="javascript::void(0)" id="Browsing" class="btn btn-primary btn-lg" ><i class="fa fa-exchange" ></i> <?php _l("start_browsing"); ?> <i class="fa fa-exchange" ></i></a>
						<a href="javascript::void(0)" id="StopBrowsing" style="display: none;" class="btn btn-danger btn-lg" ><i class="fa fa-exchange" ></i> <?php _l("stop_browsing"); ?> <i class="fa fa-exchange" ></i></a>
						<br>
						<small style="font-size: 0.7em;" id="realtime_url" >-</small><br>
						<div id="realtime_progress" style="height: 15px;" class="progress progress-striped active">
							<div class="progress-bar" style="display: none; width: 100%; font-size: 1em;"><div style="margin-top: 4px;" id="realtime_progress_counter" ></div></div>
						</div>
						<br>
						<div class="row" >
							<div class="12u 12u(mobile)" >
								<div class="panel panel-default">
								  <div class="panel-heading">
									<h3 class="panel-title"><i class="icon fa-save" ></i> <?php _l("points"); ?></h3>
								  </div>
								  <div style="height: 94.3px; background: #21b2a6; color: #fff;" class="panel-body">
								   <center><h2 class="fg-white" id="realtime_points" style="word-wrap: break-word;" >
									<?php 
									$points = u($_SESSION['switcher']."points");
									$expl = explode(".", $points);
									if($points > 0)
									{
										echo $expl[0];
										if(!empty($expl[1]))
										{
											echo "<i style='font-size: 0.5em' >.".$expl[1]."</i>";
										}
									}
									else
									{
										echo "0";
									}
									?>
								   </h2></center>
								  </div>
								</div>
							</div>
						</div>
                    <?php _s("ads/footer"); ?>
                    </center>
					</div>
				</div>
			</section>
<?php include("footer.php"); ?>