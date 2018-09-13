<?php include("header.php"); ?>
	<div id="admin-body" >
		<div id="header-title">
			<a href="<?php _router("admin_home"); ?>" data-original-title="Admin Panel" class="tip-bottom"><i class="fa fa-home"></i> Admin Panel</a>
			<a href="<?php _router("admin_settings"); ?>" data-original-title="Settings" class="tip-bottom"><i class="fa fa-gears"></i> Settings</a>
		</div>
		<div id="admin-content" >
		<div class="row" >
		<div class="col-md-12 main panel panel-default">
		<div class="panel-body" >
			<h1 class="page-header"><i class="fa fa-gears" ></i> Settings</h1>
			<div id="header-title">
				<a href="<?php _router("admin_settings"); ?>#" data-original-title="Generale" class="tip-top"><i class="fa fa-gear"></i> Generale</a>
                <a href="<?php _router("admin_settings"); ?>#analyse" data-original-title="Analyse" class="tip-top"><i class="fa fa-eye"></i> Analyse</a>
                <a href="<?php _router("admin_settings"); ?>#socialauth" data-original-title="Social Authentication" class="tip-top"><i class="fa fa-facebook"></i> Authentication</a>
                <a href="<?php _router("admin_settings"); ?>#seo" data-original-title="SEO" class="tip-top"><i class="fa fa-search"></i> SEO</a>
                <a href="<?php _router("admin_settings"); ?>#ads" data-original-title="Ads" class="tip-top"><i class="fa fa-money"></i> Ads</a>
                <a href="<?php _router("admin_settings"); ?>#lists" data-original-title="Blacklist" class="tip-top"><i class="fa fa-list"></i> Blacklist</a>
                <a href="<?php _router("admin_settings"); ?>#geo" data-original-title="Geo" class="tip-top"><i class="fa fa-map"></i> Geo</a>
				<a href="<?php _router("admin_settings"); ?>#exchange" data-original-title="Exchange" class="tip-top"><i class="fa fa-exchange"></i> Exchange</a>
				<a href="<?php _router("admin_settings"); ?>#payment" data-original-title="Payment" class="tip-top"><i class="fa fa-money"></i> Payment</a>
				<a href="<?php _router("admin_settings"); ?>#mail" data-original-title="Mail" class="tip-top"><i class="fa fa-gear"></i> Mail</a>
			    <a href="<?php _router("admin_settings"); ?>#default" data-original-title="Values" class="tip-top"><i class="fa fa-gear"></i> Values</a>
				<a href="<?php _router("admin_settings"); ?>#recaptcha" data-original-title="Recaptcha" class="tip-top"><i class="fa fa-gear"></i> Recaptcha</a>
				<a href="<?php _router("admin_settings"); ?>#social" data-original-title="Social" class="tip-top"><i class="fa fa-gear"></i> Social</a>
			</div>
			<form id="settings_form_generale" action="<?php _router("admin_settings"); ?>" method="post" >
			<h3 id="generale" > » General</h3>
				<div class="form-group">
				  <label class="control-label" >Site name</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("generale/name")); ?>" name="update_name" placeholder="Site name.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >Logo URL</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("generale/logo")); ?>"  name="update_logo" placeholder="Logo URL.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >Default Language</label>
				  <select class="form-control" name="update_language" >
				  <?php Template::options(get("languages"), s("generale/language")); ?>
				  </select>
				</div>
				<div class="form-group">
				  <label class="control-label" >Default Template</label>
				  <select class="form-control" name="update_template" >
				  <?php Template::options(get("templates"), s("generale/template")); ?>
				  </select>
				</div>
				<div class="form-group">
				  <label class="control-label" >Default Admin template</label>
				  <select class="form-control" name="update_admin_template" >
				  <?php Template::options(get("admin_templates"), s("generale/admin_template")); ?>
				  </select>
				</div>
				<div class="form-group">
				  <label class="control-label" >Default Currency</label>
				  <select class="form-control" name="update_currency" >
				  <?php Template::options(get("currency"), s("generale/currency")); ?>
				  </select>
				</div>
				<div id="website_confirmation" ></div>
				<div class="form-group">
				  <label class="control-label" >Auto confirm referrals</label>
				  <select class="form-control" name="update_auto_confirm_referrals" >
				  <?php $rf = s("generale/auto_confirm_referrals");
				  if($rf == "1") { $refselect = "yes"; } else { $refselect = "no"; }
				  Template::options(array("yes" => "Yes", "no" => "No"), $refselect); ?>
				  </select>
				</div>

				<div class="form-group">
				  <label class="control-label" >Auto confirm websites</label>
				  <select class="form-control" name="update_auto_confirm_websites" >
				  <?php $wb = s("generale/auto_confirm_websites");
				  if($wb == "1") { $wbselect = "yes"; } else { $wbselect = "no"; }
				  Template::options(array("yes" => "Yes", "no" => "No"), $wbselect); ?>
				  </select>
				</div>
				<br><input type="submit" value="Update Now !" class="btn btn-success" /><br><br>
				<?php if($_POST["update_name"]) { include("alerts.php"); } ?>
				<div id="settings_alert_generale" ></div>
				<hr id="analyse">
			</form>

            <form id="settings_form_analyse" action="<?php _router("admin_settings"); ?>" method="post" >
			<h3 id="generale" > » Google Analyse code</h3>
				<div class="form-group">
				  <label class="control-label" >Analyse Code</label>
				  <textarea style="height: 180px;" class="form-control" name="update_google_code" placeholder="google analyse code..." type="text"><?php
                  echo html_entity_decode(s("analyse/code"));
				   ?></textarea>
				</div>
                <br><input type="submit" value="Update Now !" class="btn btn-success" /><br><br>
				<?php if($_POST["update_google_code"]) { include("alerts.php"); } ?>
                <div id="settings_alert_analyse" ></div>
				<hr id="socialauth">
			</form>

            <form id="settings_form_socialauth" action="<?php _router("admin_settings"); ?>" method="post" >
			<h3 id="socialauth" > » Social Authentication</h3>
                <!-- Facebook -->
                <h3 style="color: #4A67A0;"  >  <i class="fa fa-facebook" ></i> Facebook </h3>
                <div class="form-group">
				  <label class="control-label" >Callback URL</label>
				  <input onclick="this.select();" class="form-control" value="<?php _router("social_connect"); ?>?hauth.done=Facebook" />
                </div>
				<div class="form-group">
				  <label class="control-label" >App ID</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("socialauth/facebook/id")); ?>"  name="facebook_id" placeholder="Facebook App ID.."  type="text">
				</div>
                <div class="form-group">
				  <label class="control-label" >App Secret</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("socialauth/facebook/secret")); ?>"  name="facebook_secret" placeholder="Facebook App Secret.."  type="text">
				</div>
                <!-- Twitter -->
                <h3 style="color: #1DA3F2;"  >  <i class="fa fa-twitter" ></i> Twitter </h3>
                <div class="form-group">
				  <label class="control-label" >Callback URL</label>
				  <input onclick="this.select();" class="form-control" value="<?php _router("social_connect"); ?>?hauth.done=Twitter" />
                </div>
				<div class="form-group">
				  <label class="control-label" >App Key</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("socialauth/twitter/key")); ?>"  name="twitter_key" placeholder="Twitter App Key.."  type="text">
				</div>
                <div class="form-group">
				  <label class="control-label" >App Secret</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("socialauth/twitter/secret")); ?>"  name="twitter_secret" placeholder="Twitter App Secret.."  type="text">
				</div>
                <!-- Google -->
                <h3 style="color: #D73A32;"  >  <i class="fa fa-google-plus" ></i> Google </h3>
                <div class="form-group">
				  <label class="control-label" >Callback URL</label>
				  <input onclick="this.select();" class="form-control" value="<?php _router("social_connect"); ?>?hauth.done=Google" />
                </div>
				<div class="form-group">
				  <label class="control-label" >App ID</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("socialauth/google/id")); ?>"  name="google_id" placeholder="Google App ID.."  type="text">
				</div>
                <div class="form-group">
				  <label class="control-label" >App Secret</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("socialauth/google/secret")); ?>"  name="google_secret" placeholder="Google App Secret.."  type="text">
				</div>
                <br><input type="submit" value="Update Now !" class="btn btn-success" /><br><br>
				<?php if($_POST["facebook_id"]) { include("alerts.php"); } ?>
                <div id="settings_alert_socialauth" ></div>
				<hr id="seo">
			</form>

            <form id="settings_form_seo" action="<?php _router("admin_settings"); ?>" method="post" >
			<h3 id="seo" > » SEO settings</h3>
				<div class="form-group">
				  <label class="control-label" >Title</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("seo/title")); ?>"  name="seo_title" placeholder="Title.."  type="text">
				</div>
                <div class="form-group">
				  <label class="control-label" >Description</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("seo/description")); ?>"  name="seo_description" placeholder="Description.."  type="text">
				</div>
                <div class="form-group">
				  <label class="control-label" >Keywords</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("seo/keywords")); ?>"  name="seo_keywords" placeholder="Keywords.."  type="text">
				</div>
                <div class="form-group">
				  <label class="control-label" >Og-image</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("seo/ogimage")); ?>"  name="seo_ogimage" placeholder="Og-Image URL.."  type="text">
				</div>
                <hr>
                <div class="form-group">
				  <label class="control-label" >Favicon URL</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("seo/favicon")); ?>"  name="seo_favicon" placeholder="Favicon URL.."  type="text">
				</div>
                <br><input type="submit" value="Update Now !" class="btn btn-success" /><br><br>
				<?php if($_POST["seo_title"]) { include("alerts.php"); } ?>
                <div id="settings_alert_seo" ></div>
				<hr id="ads">
			</form>

            <form id="settings_form_ads" action="<?php _router("admin_settings"); ?>" method="post" >
			<h3 id="ads" > » Ads Settings</h3>
				<div class="form-group">
				  <label class="control-label" >Ads on header</label>
				  <textarea style="height: 180px;" class="form-control" name="ads_header" placeholder="Your Ad Code..." type="text"><?php
                  echo html_entity_decode(s("ads/header"));
				   ?></textarea>
				</div>
                <div class="form-group">
				  <label class="control-label" >Ads on footer</label>
				  <textarea style="height: 180px;" class="form-control" name="ads_footer" placeholder="Your Ad Code..." type="text"><?php
                  echo html_entity_decode(s("ads/footer"));
				   ?></textarea>
				</div>
                <br><input type="submit" value="Update Now !" class="btn btn-success" /><br><br>
				<?php if($_POST["ads_header"]) { include("alerts.php"); } ?>
                <div id="settings_alert_ads" ></div>
				<hr id="lists">
			</form>

			<form id="settings_form_lists" action="<?php _router("admin_settings"); ?>" method="post" >
			<h3 id="lists" > » Black & White list</h3>
				<div class="form-group">
				  <label class="control-label" >Blacklist (Auto Refuse)</label>
				  <textarea style="height: 180px;" class="form-control" name="update_backlist" placeholder="adf.ly...one domain per line..." type="text"><?php
				  $black = s("blacklist/lists");
				  $black_domains = "";
				  if(!empty($black))
				  {
					  foreach($black as $domain)
					  {
						  $black_domains .= $domain."\n";
					  }
				  }
				  echo $black_domains;
				   ?></textarea>
				</div>
				<div class="form-group">
				  <label class="control-label" >Whitelist (Auto accept)</label>
				  <textarea style="height: 180px;" class="form-control" name="update_whitelist" placeholder="youtube.com...one domain per line..."  type="text"><?php
				  $white = s("whitelist/lists");
				  $white_domains = "";
				  if(!empty($white))
				  {
					  foreach($white as $domain)
					  {
						  $white_domains .= $domain."\n";
					  }
				  }
				  echo $white_domains;
				   ?></textarea>
				</div>
				<p>you can control the rest <a href="#website_confirmation" >here</a></p>
				<br><input type="submit" value="Update Now !" class="btn btn-success" /><br><br>
				<?php if($_POST["update_name"]) { include("alerts.php"); } ?>
				<div id="settings_alert_lists" ></div>
				<hr id="geo">
			</form>
            <form id="settings_form_geo" action="<?php _router("admin_settings"); ?>" method="post" >
            <script>
            $(document).ready(function(){
                $('#my-select').multiSelect();
            });
            </script>
			<h3 id="geo" > » Geo Targeting</h3>
				<div class="form-group">
				  <label class="control-label" >Allowed countries</label>
				  <select multiple="multiple" id="my-select" name="allowed_countries[]">
                  <?php
                  $get_countries_allowed = s("geotarget/list");
                  if(!empty($get_countries_allowed) && is_array($get_countries_allowed))
                  {
                      $selected_countries = array_keys($get_countries_allowed);
                  }
                  else
                  {
                      $selected_countries = "ALL";
                  }
                  Template::options(json_decode(BaseModel::$country_list, true), $selected_countries); ?>
                  </select>
				</div>
                <div class="form-group">
				  <label class="control-label" >Enable Geo Targeting to</label>
				  <select class="form-control" name="access_geo">
                  <?php Template::options(array(
                    "free" => "All Users",
                    "pro" => "Only Pro Users"
                  ), s("geotarget/access")); ?>
                  </select>
				</div>
				<br><input type="submit" value="Update Now !" class="btn btn-success" /><br><br>
				<?php if($_POST["update_name"]) { include("alerts.php"); } ?>
				<div id="settings_alert_geo" ></div>
				<hr id="exchange">
			</form>
			<form id="settings_form_exchange" action="<?php _router("admin_settings"); ?>" method="post" >
			<h3> » Exchange</h3>
                <div class="form-group">
				  <label class="control-label" >Open Mode</label>
				  <select class="form-control" name="update_exchange_openmode" >
				  <?php Template::options(array("popup" => "On PopUp", "newtab" => "On NewTab"), s("exchange/openmode")); ?>
				  </select>
				</div>
				<div class="form-group">
				  <label class="control-label" >Require the focus on exchange window</label>
				  <select class="form-control" name="update_exchange_focus" >
				  <?php Template::options(array("yes" => "Yes", "no" => "No"), s("exchange/focus")); ?>
				  </select>
				</div>
				<div class="form-group">
				  <label class="control-label" >Min Duration</label>
				  <input class="form-control" type="number" value="<?php echo html_entity_decode(s("exchange/minduration")); ?>" name="update_exchange_minduration" />
				</div>
				<div class="form-group">
				  <label class="control-label" >Max Duration</label>
				  <input class="form-control" type="number" value="<?php echo html_entity_decode(s("exchange/maxduration")); ?>" name="update_exchange_maxduration" />
				</div>
				<div class="form-group">
				  <label class="control-label" >Traffic source </label>
				  <select class="form-control"  name="update_exchange_source" >
				  <?php Template::options(array("yes" => "Yes (anyone can use custom source)", "no" => "No (only premium accounts can use it)"), s("exchange/source")); ?>
				  </select>
				</div>
				<div class="form-group">
				  <label class="control-label" >1 IP per session / Traffic source</label>
				  <select class="form-control"  name="update_exchange_ipcheck" >
				  <?php Template::options(array("all" => "All Users (anyone must use 1 ip per session)",
												"disabled" => "Disable"
											), s("exchange/ipcheck")); ?>
				  </select>
				  <i style="color:red" >If you disable this function you'll also disable the traffic source function & the extensions will not be required</i>

				</div>
				<div class="form-group">
				  <label class="control-label" >Users gain <small>(How many dollars for each 100 point )</small></label>
				  <input class="form-control" type="text" value="<?php echo html_entity_decode(s("exchange/pointcost")); ?>" name="update_exchange_pointcost" />
				</div>
				<br><input type="submit" value="Update Now !" class="btn btn-success" /><br><br>
				<?php if($_POST["update_exchange_openmode"]) { include("alerts.php"); } ?>
				<div id="settings_alert_exchange" ></div>
				<hr id="payment">
			</form>
			<form id="settings_form_payment" action="<?php _router("admin_settings"); ?>" method="post" >
				<h3> » Payment » 2Checkout</h3>
				<div class="form-group">
					  <label class="control-label" >2Checkout Mode</label>
					  <select class="form-control" name="update_twocheckout_mode" >
					  <?php Template::options(array("sandbox" => "Sandbox", "live" => "Live"), s("payments/twocheckout/mode")); ?>
					  </select>
				</div>
				<div class="form-group">
					  <label class="control-label" >2Checkout Account Number</label>
					  <input class="form-control" value="<?php echo html_entity_decode(s("payments/twocheckout/seller_id")); ?>" name="update_twocheckout_seller_id" placeholder="2Checkout Account Number.."  type="text">
				</div>
				<div class="form-group">
					  <label class="control-label" >2Checkout Public Key</label>
					  <input class="form-control" value="<?php echo html_entity_decode(s("payments/twocheckout/public_key")); ?>" name="update_twocheckout_public_key" placeholder="2Checkout Public Key.."  type="text">
				</div>
				<div class="form-group">
					  <label class="control-label" >2Checkout Private Key</label>
					  <input class="form-control" value="<?php echo html_entity_decode(s("payments/twocheckout/private_key")); ?>" name="update_twocheckout_private_key" placeholder="2Checkout Private Key.."  type="text">
				  </div>
			<h3> » Payment » Stripe</h3>
				<div class="form-group">
				  <label class="control-label" >Stripe Mode</label>
				  <select class="form-control" name="update_stripe_mode" >
				  <?php Template::options(array("off" => "off", "on" => "On"), s("payments/stripe/mode")); ?>
				  </select>
				</div>
				<div class="form-group">
				  <label class="control-label" >Public Key</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("payments/stripe/public_key")); ?>" name="update_stripe_publickey" placeholder="Stripe Public Key.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >Secret Key</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("payments/stripe/secret_key")); ?>" name="update_stripe_secretkey" placeholder="Stripe Secret Key.."  type="text">
				</div>
			<h3> » Payment » Paypal</h3>
				<div class="form-group">
				  <label class="control-label" >Paypal Mode</label>
				  <select class="form-control" name="update_paypal_mode" >
				  <?php Template::options(array("sandbox" => "Sandbox", "live" => "Live"), s("payments/paypal/mode")); ?>
				  </select>
				</div>
				<div class="form-group">
				  <label class="control-label" >Paypal Username</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("payments/paypal/username")); ?>" name="update_paypal_username" placeholder="Paypal Username.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >Paypal Password</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("payments/paypal/password")); ?>" name="update_paypal_password" placeholder="Paypal Password.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >Paypal Signature</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("payments/paypal/signature")); ?>" name="update_paypal_signature" placeholder="Paypal Signature.."  type="text">
				</div>
			<h3> » Payment » Payza</h3>
				<div class="form-group">
				  <label class="control-label" >Alert URL</label>
				  <input class="form-control" style="background-color: #ecf0f1;" onmouseover="this.value = '<?php _router("payza_payment_process"); ?>';" onclick="this.value = '<?php _router("payza_payment_process"); ?>';" value="<?php _router("payza_payment_process"); ?>" type="text" />
				</div>
				<div class="form-group">
				  <label class="control-label" >Payza Mode</label>
				  <select class="form-control" name="update_payza_mode" >
				  <?php Template::options(array("sandbox" => "Sandbox", "live" => "Live"), s("payments/payza/mode")); ?>
				  </select>
				</div>
				<div class="form-group">
				  <label class="control-label" >Payza Email</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("payments/payza/email")); ?>" name="update_payza_email" placeholder="Payza Email.."  type="text">
				</div>
				<br><input type="submit" value="Update Now !" class="btn btn-success" /><br><br>
				<?php if($_POST["update_paypal_mode"]) { include("alerts.php"); } ?>
				<div id="settings_alert_payment" ></div>
				<hr id="mail">
			</form>
			<form id="settings_form_mail" action="<?php _router("admin_settings"); ?>" method="post" >
			<h3> » Mail</h3>
				<div class="form-group">
				  <label class="control-label" >Site email</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("mail/from")); ?>" name="update_email" placeholder="Site email.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >Send email confirmation (new users)</label>
				  <select class="form-control" name="update_email_confirmation" >
				  <?php
				  $mailconf = s("mail/activation");
				  if($mailconf=="1") { $yes_or_no = "yes"; } else { $yes_or_no = "no"; }
				  Template::options(array("yes" => "Yes", "no" => "No" ), $yes_or_no); ?>
				  </select>				</div>
				<div class="form-group">
				  <label class="control-label" >Mail type</label>
				  <select class="form-control" name="update_mail_type" >
				  <?php Template::options(array("mail" => "Mail Function", "smtp" => "SMTP" ), s("mail/type")); ?>
				  </select>
				</div>
				<div class="form-group">
				  <label class="control-label" >SMTP Host</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("mail/smtp/host")); ?>" name="update_smtp_host" placeholder="SMTP Host.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >SMTP Port</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("mail/smtp/port")); ?>" name="update_smtp_port" placeholder="SMTP Port.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >SMTP Auth</label>
				  <select class="form-control" name="update_smtp_auth" >
				  <?php
				  $auth = s("mail/smtp/auth");
				  if($auth == "1")
					  $auth = "yes";
				  else
					  $auth = "no";
				  Template::options(array("yes" => "Yes", "no" => "No" ), $auth); ?>
				  </select>
				</div>
				<div class="form-group">
				  <label class="control-label" >SMTP Username</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("mail/smtp/username")); ?>" name="update_smtp_username" placeholder="SMTP Username.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >SMTP Password</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("mail/smtp/password")); ?>" name="update_smtp_password" placeholder="SMTP Password.."  type="text">
				</div>
				<br><input type="submit" value="Update Now !" class="btn btn-success" /><br><br>
				<?php if($_POST["update_mail_type"]) { include("alerts.php"); } ?>
				<div id="settings_alert_mail" ></div>
				<hr id="default"  >
			</form>
			<form id="settings_form_dvalues" action="<?php _router("admin_settings"); ?>" method="post" >
			<h3> » Default Values <small>for new users</small></h3>
				<div class="form-group">
				  <label class="control-label" >Website slots</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("defaults/website_slots")); ?>" name="update_website_slots" placeholder="Website slots.."  type="number" required>
				</div>
				<div class="form-group">
				  <label class="control-label" >Plusurf Viewer Slots</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("defaults/session_slots")); ?>" name="update_session_slots" placeholder="Plusurf Viewer Slots.."  type="number" required>
				</div>
				<div class="form-group">
				  <label class="control-label" >Traffic Ratio (max 100%)</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("defaults/traffic_ratio")); ?>" name="update_traffic_ratio" placeholder="Traffic Ratio.."  type="number" required>
				</div>
				<div class="form-group">
				  <label class="control-label" >Free Points (for new users)</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("defaults/points")); ?>" name="update_points" placeholder="New users points.."  type="number" required>
				</div>
				<div class="form-group">
				  <label class="control-label" >Earning for each referral (USD)</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("defaults/referrals_points")); ?>" name="update_referrals_points" placeholder="how much you want to give.."  type="text" required>
				</div>
				<div class="form-group">
				  <label class="control-label" >Allow withdrawal</label>
				  <select class="form-control" name="update_referrals_withdrawal_status" >
				  <?php Template::options(array(
				  "yes" => "Yes",
				  "no" => "No",
				  ), s("defaults/withdrawal_status")); ?>
				  </select>
				</div>
				<div class="form-group">
				  <label class="control-label" >Min value to make a withdrawal request (USD)</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("defaults/min_for_withdrawal")); ?>" name="update_referrals_minwithdrawal" placeholder="how much you want to give.."  type="number" required>
				</div>
				<div class="form-group">
				  <label class="control-label" >Default URL </label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("defaults/website")); ?>" name="update_default_url" placeholder="Deafult URL.."  type="text" required>
				</div>
				<i style="color:red">we use this only if the whole points in the system are empty or if none of websites has been added.</i><br>
				<br><input type="submit" value="Update Now !" class="btn btn-success" /><br><br>
				<?php if($_POST["update_traffic_ratio"]) { include("alerts.php"); } ?>
				<div id="settings_alert_dvalue" ></div>
				<hr id="recaptcha" >
			</form>
			<form id="settings_form_recaptcha" action="<?php _router("admin_settings"); ?>" method="post" >
			<h3> » Recaptcha</h3>
				<div class="form-group">
				  <label class="control-label" >Public key</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("recaptcha/publickey")); ?>" name="update_recaptcha_publickey" placeholder="Recaptcha Public key.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >Private key</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("recaptcha/privatekey")); ?>" name="update_recaptcha_privatekey" placeholder="Recaptcha Private key.."  type="text">
				</div>
				<br><input type="submit" value="Update Now !" class="btn btn-success" /><br><br>
				<?php if($_POST["update_recaptcha_publickey"]) { include("alerts.php"); } ?>
				<div id="settings_alert_recaptcha" ></div>
				<hr id="social" >
			</form>
			<form id="settings_form_social" action="<?php _router("admin_settings"); ?>" method="post" >
			<h3> » Social</h3>
				<div class="form-group">
				  <label class="control-label" >Facebook URL</label>
				  <input type="hidden" name="check_social_post" value="true" />
				  <input class="form-control" value="<?php echo html_entity_decode(s("social/facebook")); ?>" name="update_facebook" placeholder="Facebook.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >Twitter URL</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("social/twitter")); ?>" name="update_twitter" placeholder="Twitter.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >Google Plus URL</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("social/google_plus")); ?>" name="update_google_plus" placeholder="Google Plus.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >Pinterest URL</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("social/pinterest")); ?>" name="update_pinterest" placeholder="Pinterest.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >Instagram URL</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("social/instagram")); ?>" name="update_instagram" placeholder="Instagram.."  type="text">
				</div>
				<div class="form-group">
				  <label class="control-label" >Dribbble URL</label>
				  <input class="form-control" value="<?php echo html_entity_decode(s("social/dribbble")); ?>" name="update_dribbble" placeholder="Dribbble.."  type="text">
				</div>
				<br><input type="submit" value="Update Now !" class="btn btn-success" /><br><br>
				<?php if($_POST["check_social_post"]) { include("alerts.php"); } ?>
				<div id="settings_alert_social" ></div>
			</form>
        </div>
		</div>
		</div>
		</div>
	</div>
<?php include("footer.php"); ?>
