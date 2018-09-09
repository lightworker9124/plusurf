<?php include("header.php"); ?>
	<div id="admin-body" >
		<div id="header-title"> 
			<a href="<?php _router("admin_home"); ?>" data-original-title="Admin Panel" class="tip-bottom"><i class="fa fa-home"></i> Admin Panel</a>
			<a href="<?php _router("admin_support"); ?>" data-original-title="Support" class="tip-bottom"><i class="fa fa-support"></i> Support</a>
		</div>
		<div id="admin-content" >
		<div class="row" >
		<div class="col-md-12 main panel panel-default">
		<div class="panel-body" >
			<h1 class="page-header"><i class="fa fa-support" ></i> Support</h1>
			<hr>
			<h3><i class="fa fa-support" ></i>  How to get PayPal Api username, password and signature information <small><a target="_blank" href="http://www.putler.com/support/faq/how-to-get-paypal-api-username-password-and-signature-information/" >Read more...</a></small></h3>
			<div><p>You'll need to create an API username for PayPal that's
			different from your shopping cart's username. You can access PayPal
			via API only if you have a PayPal Premier / Business / Website
			Payments Pro account.</p>
			<p>Follow these steps:</p>
			<ol>
			<li>Log in to your PayPal Business account <a href="https://www.paypal.com/signin/" target="_target" >Here</a>.<br></li>
			<li>Click the My Account tab.<br></li>
			<li>Click the Profile tab. If you haven't already done so, you need
			to verify your account before requesting API credentials.<br></li>
			<li>Click Request API credentials under Account
			information.<br></li>
			<li>Click Set up PayPal API credentials and permissions under
			Option 1.<br></li>
			<li>Click Request API Credentials.<br></li>
			<li>Click Request API signature.<br></li>
			<li>Click Agree and Submit.<br></li>
			<li>Copy and paste the API username, password, and signature into
			<a href="<?php _router("admin_settings"); ?>#payment" >Paypal payment settings</a><br></li>
			<li>Complete the process by following your shopping cart's final
			steps.</li>
			</ol>
			</p></div>
			<hr>
			<h3><i class="fa fa-support" ></i>  How to setup Payza <small><a target="_blank" href="https://www.payza.com/" >Signup/login</a></small></h3>
		    <div><ul>
			<li>First need to create a business account on payza <a href="https://secure.payza.com/signup" target="_blank"> Here</a></li>
			<li>In your business profile:
			<ol><li>Login to your Payza account.</li>
			<li>Click on “Business”.</li>
			<li>Under “Business”, click on “IPN Integration”.</li>
			<li>Click on the blue "Set up your IPN now"   button.</li>
			<li>Enter your Transaction PIN and click on “Access”.</li>
			<li>Click on the “Edit” icon for the respective business profile. </li>
			<li>Enter the information:
			<ol><li>For IPN Status, select “Enabled”.</li>
			<li>For IPN Version, Select "IPN V2"</li>
			<li>For Alert URL, enter <?php _router("payza_payment_process"); ?></li>
			</ol></li>
			<li>Click on “Update” button.</li>
			</ol></li>
			<li>The email address associated with your Payza account </li>
			</ul></div>
			<hr>
			<h3><i class="fa fa-support" ></i>  How to get Google RECaptcha Site Keys (Public & Private) <small><a target="_blank" href="http://www.aspsnippets.com/Articles/Get-Google-RECaptcha-Site-Key-Public-Key-and-Secret-Key-Private-Key.aspx" >Read more...</a></small></h3>
				<font size="2"><font face="Arial">In order to integrate the Google RECaptcha to the website, one has to register the website with Google and then generate the required Site Key i.e. Public Key and Secret Key i.e. Private Key.</font></font>
			<div >
				<b><u><font size="2"><font face="Arial">1. Visit the Google RECaptcha Website.</font></font></u></b></div>
			<div >
				<font size="2"><font face="Arial">You need to first visit the Google RECaptcha Website using the following URL and then click the Get <u>reCAPTCHA</u> button as shown below.</font></font>
				</div>
			<div >
				<a href="http://www.google.com/recaptcha/intro/index.html" target="_blank">Google RECaptcha Website</a>
				</div>
			<div >
				<b><u><font size="2"><font face="Arial">2. Register your Website</font></font></u></b>
				</div>
			<div >
				<font size="2"><font face="Arial">The next step is to register the Website in which you need to integrate Google RECaptcha API.</font></font>
				</div>
			<div >
				<font size="2"><font face="Arial">You need to provide a Label value and the domain names of the websites for which you want to use the RECaptcha.</font></font>
				</div>
			<div >
				<b><u><font size="2"><font face="Arial">3. Google RECaptcha Site Key (Public Key) and Secret Key (Private Key)</font></font></u></b>
				</div>
			<div >
				<font size="2"><font face="Arial">Once the registration is done you are presented with the Site Key (Public Key) and Secret Key (Private Key) and also the procedure to integrate Google RECaptcha.</font></font>
				</div>
            <hr>
            <h3><i class="fa fa-support" ></i>  Registering application <b>(Facebook <i class="fa fa-facebook" ></i>)</b> </h3>
            <ol>
            <li>
              Go to <a target="_blank" href="https://developers.facebook.com/apps">https://developers.facebook.com/apps</a> and <strong>create a new application</strong> by clicking "Create New App".
            </li>
            <li>
              Fill out any required fields such as the application name and description.
            </li>
            <li>
              Put your website domain in the <strong>Site Url</strong> field.
            </li>
            <li>
              Once you have registered, copy and past the created application credentials (App ID and Secret) into the <a href="<?php echo _router("admin_settings"); ?>#socialauth" >Social Authentication</a>.
            </li>
          </ol>
            <hr>
            <h3><i class="fa fa-support" ></i>  Registering application <b>(Twitter <i class="fa fa-twitter" ></i>)</b> </h3>
            <ol>
              <li>
                Go to <a target="_blank" href="https://dev.twitter.com/apps">https://dev.twitter.com/apps</a> and <strong>create a new application</strong>.
              </li>
              <li>
                Fill out any required fields such as the application name and description.
              </li>
              <li>
                Put your website domain in the <strong>Website</strong> field.
              </li>
              <li>
                Provide this URL as the <strong>Callback URL</strong> for your application: (<em style="color:green;"><?php _router("social_connect"); ?>?hauth.done=Twitter</em>).
              </li>
              <li>
                Once you have registered, copy and past the created application credentials (Consumer Key and Secret) into the <a href="<?php echo _router("admin_settings"); ?>#socialauth" >Social Authentication</a>.
              </li>
            </ol>
            <hr>
            <h3><i class="fa fa-support" ></i>  Registering application <b>(Google <i class="fa fa-google-plus" ></i>)</b> </h3>
            <ol>
          <li>
            Go to <a target="_blank" href="https://code.google.com/apis/console/">https://code.google.com/apis/console/</a> and create a new project.
          </li>
          <li>
            Go to <strong>API Access</strong> under <strong>API Project</strong>. After that click on <strong>Create an OAuth 2.0 client ID</strong> to <strong>create a new application</strong>.
          </li>
          <li>
            A pop-up named <strong>"Create Client ID"</strong> will appear, fill out any required fields such as the application name and description.
          </li>
          <li>
            Click on <strong>Next</strong>.
          </li>
          <li>
            On the popup set <strong>Application type</strong> to <strong>Web application</strong> and switch to advanced settings by clicking on <strong>(more options)</strong>.
          </li>
          <li>
            Provide this URL as the Callback URL for your application: <span style="color:green"><?php _router("social_connect"); ?>?hauth.done=Google</span>
          </li>
          <li>
            Once you have registered, copy and past the created application credentials (Client ID and Secret) into the <a href="<?php echo _router("admin_settings"); ?>#socialauth" >Social Authentication</a>.
          </li>
        </ol>
            <hr>
        </div>
		</div>
		</div>
		</div>
	</div>
<?php include("footer.php"); ?>