                    <section class="wrapper style1 special">
						<div class="inner" style="margin-top: 30px;">
							<header class="major">
                            <h1 style="font-size: 50px;" ><?php _l("buy"); ?> <i class="fa fa-shopping-cart" ></i></h1>
                            </header>
                            <ul class="features">
								<li class="icon fa-check">
                                <a style="cursor: pointer; text-decoration: none;" title="<?php _l("upgrade_now"); ?>" href="<?php _router("payments"); ?>?upgrade=true"  >
									<h3><?php _l("upgrade_now"); ?></h3>
                                </a>
								</li>
                                <li class="icon fa-signal">
                                <a style="cursor: pointer; text-decoration: none;" title="<?php _l("buy_traffic_now"); ?>" href="<?php _router("payments"); ?>?traffic=true"  >
									<h3><?php _l("buy_traffic_now"); ?></h3>
                                </a>
								</li>
                                <li class="icon fa-globe">
                                <a style="cursor: pointer; text-decoration: none;" title="<?php _l("buy_extra_websites"); ?>" href="<?php _router("payments"); ?>?websites=true"  >
									<h3><?php _l("buy_extra_websites"); ?></h3>
                                </a>
								</li>
                                <li class="icon fa-exchange">
                                <a style="cursor: pointer; text-decoration: none;" title="<?php _l("buy_extra_sessions"); ?>" href="<?php _router("payments"); ?>?sessions=true"  >
									<h3><?php _l("buy_extra_sessions"); ?></h3>
                                </a>
								</li>
							</ul>
                        </div>
                    </section>