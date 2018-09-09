<?php include("header.php"); ?>
<?php include("menu.php"); ?>
            <header>
                <h2><?php _l("traffic_exchange"); ?></h2>
			</header>
			<section  class="wrapper style5">
				<div class="content container">
					<div style="margin-top: 50px; text-align: <?php echo Languages::text_align(); ?>" >
                    <?php _s("ads/header"); ?>
					<div class="row">
						<div class="12u">
							<ul class="actions">
								<li><a href="<?php _router("browsing"); ?>?add=new" class="btn btn-success" ><i class="fa fa-exchange" ></i> <?php echo l("add")." +"; ?></a></li>
								<li><a href="Javascript::void(0)" class="btn btn-info" ><?php _get("sessions_count"); ?> / <?php _u("session_slots"); ?></a></li>
							</ul>
						</div>
					</div>
					<?php include("alerts.php"); ?>
					  <div style="text-align: <?php echo Languages::text_align(); ?>" class="table-responsive">
						<table class="table table-striped">
						  <thead>
							<tr>
                              <th><?php _l("web_address"); ?></th>	
                              <th><?php _l("run"); ?></th>
							  <th class="no-phone" ><?php _l("status"); ?></th>
							  <th><?php _l("delete"); ?></th>
							</tr>
						  </thead>
						  <tbody>
						  <?php 
						  $sessions = get("sessions");
						  if(!empty($sessions))
						  {
							  foreach($sessions as $session)
							  { 
						  ?>
							<tr id="session_<?php echo $session["id"]; ?>" >
							  <td>
							  <div id="hide_<?php echo $session["id"]; ?>" ><a class="btn btn-primary" onclick="$('#hide_<?php echo $session["id"]; ?>').hide(); $('#show_<?php echo $session["id"]; ?>').show();" href="Javascript::void(0)" ><i class="icon fa-link" ></i></a></div>
                              <div class="input-group" id="show_<?php echo $session["id"]; ?>" style="display: none;">
                                  <input class="form-control" onclick="this.select();" value="<?php _router("browsing_process", array(
                                  "uid" => Encryption::encode(u("id")),
                                  "sid" => Encryption::encode($session["id"])
                                  )); ?>" type="text" />
                                  <span class="input-group-btn" ><a class="btn btn-default" onclick="$('#show_<?php echo $session["id"]; ?>').hide(); $('#hide_<?php echo $session["id"]; ?>').show();" href="Javascript::void(0)" ><i class="icon fa-close" ></i></a></span>
                              </div>
							  </td>
							  <td>
							  <?php if(!Exchange::is_active($session["id"])) { ?>
							  <a class="btn btn-success" href="<?php _router("browsing_process", array(
                              "uid" => Encryption::encode(u("id")),
                              "sid" => Encryption::encode($session["id"])
                              )); ?>" ><i class="icon fa-play" ></i> <span class="no-phone" ><?php _l("start_browsing"); ?></span></a>
							  <?php } else { ?>
							  <a class="btn btn-default" onclick="clear_session('<?php echo Encryption::encode($session["id"]); ?>', '<?php _router("browsing"); ?>', true)" href="Javascript::void(0);" ><i class="icon fa-pause" ></i>  <?php _l("cancel"); ?></a>
							  <?php } ?>
							  </td>
                              <td class="no-phone" >
							  <?php if(Exchange::is_active($session["id"])) { ?>
							  <a href="Javascript::void(0);"  data-original-title="<?php _l("run"); ?>: <?php _l("yes"); ?>" class="tip-top" ><i class="icon fa-exchange" ></i></a>
							  <?php } else { ?>
							  <a href="Javascript::void(0);"  data-original-title="<?php _l("run"); ?>: <?php _l("no"); ?>" class="tip-top" ><i class="icon fa-exchange" ></i></a>
							  <?php } ?>
							  </td>
							  <td><a class="btn btn-danger" onclick="delete_session(<?php echo $session["id"]; ?>, '<?php _router("browsing"); ?>', 'session_<?php echo $session["id"]; ?>')" href="Javascript::void(0)" ><i class="icon fa-trash" ></i></a></td>
							</tr>
						  <?php 
							  }
						  }
						  ?>
						  </tbody>
						</table>
					  </div>
					  
					  <ul class="pagination" >
						<?php _get("pagination"); ?>
					  </ul>
                    <?php _s("ads/footer"); ?>
					</div>
				</div>
			</section>
<?php include("footer.php"); ?>