	<div id="admin-header" >
			<ul >
				<li class="logo right" ><a href="<?php _router("admin_home"); ?>" ><img src="<?php _turl(); ?>/img/logo/small-logo.png" class="logo" /></a></li>
				<li><a href="Javascript:void(0)" class="toggle"></a></li>
				<li><a target="_blank" href="<?php _router("home"); ?>" ><i class="fa fa-eye" ></i> <span class="menu-text" >Show website</span></a></li>
				<li><a href="<?php _router("admin_account"); ?>" ><i class="fa fa-gear" ></i> <span class="menu-text" >My Account</span></a></li>
				<li><a href="<?php _router("admin_admins"); ?>" ><i class="fa fa-user" ></i> <span class="menu-text" >Admins</span></a></li>
				<li><a href="<?php _router("admin_logout"); ?>" ><i class="fa fa-power-off" ></i> <span class="menu-text" >Logout</span></a></li>
			</ul>
	</div>

	<div id="admin-sidebar" class="nano" >
		<div id="admin-menu" class="nano-content" >
			<ul >
				<li><a href="<?php _router("admin_home"); ?>" ><i class="fa fa-dashboard" ></i> <span class="menu-text" >Dashboard</span></a></li>
				<li><a href="<?php _router("admin_settings"); ?>" ><i class="fa fa-gears" ></i> <span class="menu-text" >Settings</span></a></li>
                <li><a href="<?php _router("admin_search"); ?>" ><i class="fa fa-search" ></i> <span class="menu-text" >Smart Search</span></a></li>
				<li><a href="<?php _router("admin_last_websites"); ?>" ><i class="fa fa-globe" ></i> <span class="menu-text" >Last Websites</span></a></li>
				<li><a href="<?php _router("admin_reported_websites"); ?>" ><i class="fa fa-flag" ></i> <span class="menu-text" >Reported Websites</span></a></li>
				<li><a href="<?php _router("admin_users"); ?>" ><i class="fa fa-users" ></i> <span class="menu-text" >Users</span></a></li>
				<li><a href="<?php _router("admin_payments"); ?>" ><i class="fa fa-shopping-cart" ></i> <span class="menu-text" >Payments</span></a></li>
				<li><a href="<?php _router("admin_withdrawals"); ?>" ><i class="fa fa-bank" ></i> <span class="menu-text" >Withdrawals</span></a></li>
				<li><a href="<?php _router("admin_currencies"); ?>" ><i class="fa fa-money" ></i> <span class="menu-text" >Currencies</span></a></li>
				<li><a href="<?php _router("admin_plans"); ?>" ><i class="fa fa-list" ></i> <span class="menu-text" >Plans</span></a></li>
				<li><a href="<?php _router("admin_extensions"); ?>" ><i class="fa fa-chrome" ></i> <span class="menu-text" >Extensions</span></a></li>
				<li><a href="<?php _router("admin_newsletteres"); ?>" ><i class="fa fa-newspaper-o" ></i> <span class="menu-text" >Newsletters</span></a></li>
				<li><a href="<?php _router("admin_referrals"); ?>" ><i class="fa fa-share" ></i> <span class="menu-text" >Referrals</span></a></li>
				<li><a href="<?php _router("admin_pages"); ?>" ><i class="fa fa-table" ></i> <span class="menu-text" >Pages</span></a></li>
				<li><a href="<?php _router("admin_logout"); ?>" ><i class="fa fa-power-off" ></i> <span class="menu-text" >Logout</span></a></li>
				<li><a href="<?php _router("admin_support"); ?>" ><i class="fa fa-support" ></i> <span class="menu-text" >Support</span></a></li>
				<li class="resize" ><a href="Javascript:void(0)" >  <span style="padding-right: 2px;" class="menu-text fa fa-arrow-left" ></span> <span style="padding-left: 2px;" class="fa fa-arrow-right" ></span></a></li>
			</ul>
		</div>
	</div>
