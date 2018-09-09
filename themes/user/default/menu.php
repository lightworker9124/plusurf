			<header id="header">

				<!-- toggle -->
					<div id="menu-toggle" ></div>

				<!-- Logo -->
				<?php $logo = s("generale/logo"); if(!empty($logo)) { ?>
				<ul>
					<li id="logo" ><a title="<?php _s("generale/name"); ?>" style="text-decoration: none;" href="<?php _router("home"); ?>" ><img class="main-logo" src="<?php _s("generale/logo"); ?>" /></a></li>
				</ul>
				<?php } else { ?>
					<div id="logo" ><h1><a title="<?php _s("generale/name"); ?>" style="text-decoration: none;" href="<?php _router("home"); ?>" ><?php _s("generale/name"); ?></a></h1></div>
				<?php } ?>

				<!-- Nav -->
					<div id="nav">
						<ul>
							<?php if($GLOBALS["check_login"]) { ?>
							<li><a href="<?php _router("browsing"); ?>" ><i class="icon fa-exchange" ></i> <?php _l("browsing"); ?></a></li>
							<li><a href="<?php _router("logout"); ?>" ><i class="icon fa-power-off" ></i> <?php _l("logout"); ?></a></li>
							<?php } else { ?>
							<li><a href="<?php _router("signup"); ?>" ><i class="icon fa-pencil" ></i> <?php _l("signup"); ?></a></li>
							<li><a href="<?php _router("login"); ?>" ><i class="icon fa-key" ></i> <?php _l("login"); ?></a></li>
							<?php } ?>
							<li><a href="<?php _router("howitwork"); ?>" ><i class="icon fa-question-circle" ></i> <?php _l("howitwork"); ?></a></li>
							<li><a href="Javascript::void(0)" onclick="$('#Languages').modal('show');" ><i class="icon fa-language" ></i> <?php _l("languages"); ?></a></li>
						</ul>
					</div>

			</header>
			<div class="nano" id="upmenu" >
				<div id="upmenu-content" class="nano-content" >
				<ul>
					<?php if($GLOBALS["check_login"]) { ?>
					<li><a href="<?php _router("browsing"); ?>" ><i class="icon fa-exchange" ></i> <?php _l("browsing"); ?></a></li>
					<li><a href="<?php _router("dashboard"); ?>" ><i class="icon fa-dashboard" ></i> <?php _l("dashboard"); ?></a></li>
					<li><a href="<?php _router("websites"); ?>" ><i class="icon fa-globe" ></i> <?php _l("my_websites"); ?></a></li>
					<li><a href="<?php _router("referrals"); ?>" ><i class="icon fa-users" ></i> <?php _l("referrals"); ?></a></li>
					<li><a href="<?php _router("payments"); ?>" ><i class="icon fa-shopping-cart" ></i> <?php _l("buy"); ?></a></li>
					<?php
					$pname = u("provider_name");
					if(empty($pname)) { ?>
						<li><a href="<?php _router("settings"); ?>" ><i class="icon fa-gear" ></i> <?php _l("settings"); ?></a></li>
					<?php } ?>
					<li><a href="<?php _router("logout"); ?>" ><i class="icon fa-power-off" ></i> <?php _l("logout"); ?></a></li>
					<?php } else { ?>
					<li><a href="<?php _router("home"); ?>" ><i class="icon fa-home" ></i> <?php _l("home"); ?></a></li>
					<li><a href="<?php _router("signup"); ?>" ><i class="icon fa-pencil" ></i> <?php _l("signup"); ?></a></li>
					<li><a href="<?php _router("login"); ?>" ><i class="icon fa-key" ></i> <?php _l("login"); ?></a></li>
					<?php } ?>
					<li><a href="<?php _router("howitwork"); ?>" ><i class="icon fa-question-circle" ></i> <?php _l("howitwork"); ?></a></li>
					<li><a href="<?php _router("contact"); ?>" ><i class="icon fa-send" ></i> <?php _l("contact"); ?></a></li>
					<li><a onclick="UpMenu._closeMenu();" href="Javascript::void(0)" ><i class="icon fa-arrow-left" ></i> <?php _l("close"); ?></a></li>
				</ul>
				</div>
			</div>
			<div id="go-top" ></div>
			<div id="Languages" class="modal fade" role="dialog">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<div type="button" class="close" data-dismiss="modal">&times;</div>
					<h4 class="modal-title"><?php _l("languages"); ?> <i class="icon fa-globe" ></i></h4>
				  </div>
				  <div class="modal-body">
                                <div class="row" >
        				            <?php
         				           $languages = Languages::info();
          				          if(!empty($languages)) {
          				              foreach($languages as $language) {
           				             if($language["code"] == Languages::current_language())
            				            {
             				               $languages_style = "btn-danger";
             				           }
              				          else
              				          {
               				             $languages_style = "btn-info";
                				        }
             				       ?>
              				      <div style="margin-top: 4px;" class="col-md-6 col-xs-6" >
             				         <a class="btn btn-block <?php echo $languages_style; ?>" href="<?php  _router("change_languge"); ?>?to=<?php echo $language["code"]; ?>"><?php echo $language["name"]; ?></a>
             				       </div>
             				       <?php } } ?>
                                </div>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><?php _l("close"); ?></button>
				  </div>
				</div>

			  </div>
			</div>
