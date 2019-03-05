<div class="footer-cta">
				<div class="container">
					<h2>Got A Question? Get In Touch</h2>
					<p>We're here to help. Check out our FAQs, send us an email or call us at 1 800 555 5555</p>
					<p><a href="<?php echo base_url('index.php/common/home/contact'); ?>" class="button button-white">Contact Now</a></p>
				</div>
			</div>
			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="footer-widgets">
					<div class="container">
						<div class="row">
							<aside id="text-2" class="footer-widget widget_text col-md-3 col-sm-6 col-xs-12">
								<div class="textwidget">
									<!-- <embed src="<?php echo base_url( 'uploads/sites/15/2013/09/jobify-main.svg' ); ?>" type="image/svg+xml"/> -->
									<img src="<?php echo base_url(); ?>uploads/logo.png" width="" height="" alt=""/>
									<br></br>
									Subscribe to our newsletter
									<form id="pmc_mailchimp" action="#" method="post">
										<div>
											<label for="pmc_email">Enter your email</label><br/>
											<input name="pmc_email" id="pmc_email" type="text" placeholder="Email Address"/>
										</div>
										<div>
											<input type="hidden" name="redirect" value=""/>
											<input type="hidden" name="action" value="pmc_signup"/>
											<input type="hidden" name="pmc_list_id" value="d65b1b9005"/>
											<input type="submit" value="Sign Up"/>
										</div>
									</form>
									<br></br><br></br>									
								</div>
							</aside>
							<aside id="pages-2" class="footer-widget widget_pages col-md-3 col-sm-6 col-xs-12">
								<h3 class="footer-widget-title">Site Map</h3>	
								<?php 
								$sitemap = $this->db->query("SELECT * FROM content WHERE type='Sitemap' AND status='1'")->result();								
								
								?>
								<ul>
									<?php foreach( $sitemap as $href ): ?>
									<li class="page_item page-item-1719"><a href="#"><?php echo $href->tag; ?></a></li>
									<?php endforeach; ?>
								</ul>
							</aside>
							<aside id="recent-posts-2" class="footer-widget widget_recent_entries col-md-3 col-sm-6 col-xs-12">
								<h3 class="footer-widget-title">Recent News Articles</h3>
								<?php 
								$article = $this->db->query("SELECT * FROM content WHERE type='Articles' AND status='1' ORDER BY contentid DESC LIMIT 3")->result();								
								
								?>
								<ul>
									<?php foreach( $article as $art ): ?>
									<li>
										<a href="#"><?php echo $art->tag; ?></a>
										<span class="post-date"><?php echo date('M d, Y', $art->sts); ?></span>
									</li>									
									<?php endforeach; ?>
								</ul>
							</aside>
							<aside id="text-3" class="footer-widget widget_text col-md-3 col-sm-6 col-xs-12">
								<h3 class="footer-widget-title">Tipshrc Offices</h3>
								<div class="textwidget">Tipshrc Inc.
									555 Madison Avenue, Suite F-2
									Manhattan, New York 10282
									<br></br>
									Tipshrc Inc Canada.
									545 Younge St, Suite 11
									Toronto, Ontario M4K 6F4
								</div>
							</aside>
						</div>
					</div>
				</div>
				<div class="copyright">
					<div class="container">
						<div class="site-info">&copy; 2015 &mdash; All Rights Reserved</div>
						<a href="#top" class="btt"><i class="icon-up-circled"></i></a>
						<div class="footer-social">
							<a href="http://facebook.com/astoundify"><span class="screen-reader-text">Facebook</span></a>
							<a href="http://twitter.com/astoundify"><span class="screen-reader-text">Twitter</span></a>
							<a href="https://plus.google.com/"><span class="screen-reader-text">Google Plus</span></a>
							<a href="http://instagram.com/"><span class="screen-reader-text">Instagram</span></a>
							<a href="https://pinterest.com/"><span class="screen-reader-text">Pinterest</span></a>
							<a href="https://vimeo.com/astoundify"><span class="screen-reader-text">Vimeo</span></a>
							<a href="http://www.linkedin.com/"><span class="screen-reader-text">LinkedIn</span></a>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<!--<div id="login-modal-wrap" class="modal-login modal">
			<h2 class="modal-title">Login</h2>
			<form name="loginform" id="loginform" action="" method="post">
				<p class="login-username">
					<label for="user_login">Username</label>
					<input type="text" name="log" id="user_login" class="input" value="" size="20"/>
				</p>
				<p class="login-password">
					<label for="user_pass">Password</label>
					<input type="password" name="pwd" id="user_pass" class="input" value="" size="20"/>
				</p>
				<p class="has-account">
					<i class="icon-help-circled"></i> 
					<a href="<?php echo base_url( 'index.php/common/home/forgot_password' ); ?>">Forgot Password?</a>
				</p>
				<p class="login-remember">
					<label>
						<input name="rememberme" type="checkbox" id="rememberme" value="forever" checked="checked"/> Remember Me
					</label>
				</p>
				<p class="login-submit">
					<input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="Sign In"/>
					<input type="hidden" name="redirect_to" value=""/>
				</p>
			</form>
		</div>
		 <div id="register-modal-wrap" class="modal-register modal">
			<h2 class="modal-title">Sign Up</h2>
			<form action="" method="post" id="register-form" class="job-manager-form" enctype="multipart/form-data">
				<fieldset class="fieldset-">
					<label for="">Username</label>
					<div class="field">
						<input type="text" class="input-text" name="nicename" id="nicename" placeholder="" value="" maxlength="" required />
					</div>
				</fieldset>
				<fieldset class="fieldset-">
					<label for="">Email Address</label>
					<div class="field">
						<input type="text" class="input-text" name="email" id="email" placeholder="email@example.com" value="" maxlength="" required />
					</div>
				</fieldset>
				<fieldset class="fieldset-">
					<label for="">Password</label>
					<div class="field">
						<input type="password" class="input-text" name="password" id="password" placeholder="" value="" maxlength="" required />
					</div>
				</fieldset>
				<fieldset class="fieldset-">
					<label for="">About You</label>
					<div class="field">
						<select name="role" id="role" required>
							<option value="none">&mdash;Select&mdash;</option>
							<option value="employer">I&#039;m an employer looking to hire</option>
							<option value="candidate">I&#039;m a candidate looking for a job</option>
						</select>
					</div>
				</fieldset>
				<p class="has-account" id="login-modal">
					<i class="icon-help-circled"></i> Already have an account? <a href="<?php echo base_url( 'index.php/common/home/login' ); ?>">Login</a>
				</p>
				<p class="register-submit">
					<input type="hidden" id="_wpnonce" name="_wpnonce" value="3ce606e932"/><input type="hidden" name="_wp_http_referer" value="//"/>	<input type="hidden" name="job_manager_form" value="register"/>
					<input type="submit" name="submit_register" class="button button-medium" value="Register"/>
				</p>
			</form>
		</div> -->
<link rel='stylesheet' id='soliloquy-lite-style-css' href='<?php echo base_url(); ?>assets/plugins/soliloquy-lite/assets/css/soliloquy.css' type='text/css' media='all'/>
<link rel='stylesheet' id='soliloquy-liteclassic-theme-css' href='<?php echo base_url(); ?>assets/plugins/soliloquy-lite/themes/classic/style.css' type='text/css' media='all'/>
<script type='text/javascript'>var wc_add_to_cart_params={"ajax_url":"\/jobify\/wp-admin\/admin-ajax.php","ajax_loader_url":"\/\/demo.astoundify.com\/jobify\/wp-content\/plugins\/woocommerce\/assets\/images\/ajax-loader@2x.gif","i18n_view_cart":"View Cart","cart_url":"https:\/\/demo.astoundify.com\/jobify\/cart\/","is_cart":"","cart_redirect_after_add":"yes"};var wc_add_to_cart_params={"ajax_url":"\/jobify\/wp-admin\/admin-ajax.php","ajax_loader_url":"\/\/demo.astoundify.com\/jobify\/wp-content\/plugins\/woocommerce\/assets\/images\/ajax-loader@2x.gif","i18n_view_cart":"View Cart","cart_url":"https:\/\/demo.astoundify.com\/jobify\/cart\/","is_cart":"","cart_redirect_after_add":"yes"};</script>
<script src="<?php echo base_url(); ?>assets/plugins/woocommerce/assets/js/frontend%2c_add-to-cart.min.js%2cqver%3d%3d2.2.11%2bjquery-blockui%2c_jquery.blockUI.min.js%2cqver%3d%3d2.60.pagespeed.jc.U01RrgLWwD.js"></script><script>eval(mod_pagespeed_bxqawpxQSz);</script>
<script>eval(mod_pagespeed_GtfaYOspyn);</script>
<script type='text/javascript'>var woocommerce_params={"ajax_url":"\/jobify\/wp-admin\/admin-ajax.php","ajax_loader_url":"\/\/demo.astoundify.com\/jobify\/wp-content\/plugins\/woocommerce\/assets\/images\/ajax-loader@2x.gif"};var woocommerce_params={"ajax_url":"\/jobify\/wp-admin\/admin-ajax.php","ajax_loader_url":"\/\/demo.astoundify.com\/jobify\/wp-content\/plugins\/woocommerce\/assets\/images\/ajax-loader@2x.gif"};</script>
<script src="<?php echo base_url(); ?>assets/plugins/woocommerce/assets/js/frontend%2c_woocommerce.min.js%2cqver%3d%3d2.2.11%2bjquery-cookie%2c_jquery.cookie.min.js%2cqver%3d%3d1.3.1.pagespeed.jc.KsUKzyPDfH.js"></script><script>eval(mod_pagespeed_Axog9aA5Gz);</script>
<script>eval(mod_pagespeed_cxFMOCIhaO);</script>
<script type='text/javascript'>var wc_cart_fragments_params={"ajax_url":"\/jobify\/wp-admin\/admin-ajax.php","fragment_name":"wc_fragments"};var wc_cart_fragments_params={"ajax_url":"\/jobify\/wp-admin\/admin-ajax.php","fragment_name":"wc_fragments"};</script>
<script src="//demo.astoundify.com/jobify/wp-content,_plugins,_woocommerce,_assets,_js,_frontend,_cart-fragments.min.js,qver==2.2.11+wp-includes,_js,_comment-reply.min.js,qver==4.1.1.pagespeed.jc.bizookD4xW.js"></script>
<script>eval(mod_pagespeed_7jit2d_28Q);</script>
<script>eval(mod_pagespeed_2qGILfjP4E);</script>
<script type='text/javascript'>var jobifySettings={"ajaxurl":"https:\/\/demo.astoundify.com\/jobify\/wp-admin\/admin-ajax.php","archiveurl":"https:\/\/demo.astoundify.com\/jobify\/jobs\/","i18n":[],"pages":{"is_widget_home":true,"is_job":false,"is_resume":false,"is_testimonials":false},"widgets":{"jobify_widget_map":{"animate":0},"jobify_widget_jobs":{"animate":0},"jobify_widget_stats":{"animate":1},"jobify_widget_companies":{"animate":0},"jobify_widget_testimonials":{"animate":1},"jobify_widget_video":{"animate":1},"jobify_widget_slider":{"animate":0},"jobify_widget_price_table_wc":{"animate":0},"jobify_widget_callout":{"animate":0},"jobify_widget_blog_posts":{"animate":0}}};</script>
<!-- <script src="https://demo.astoundify.com/jobify/wp-content/themes,_jobify,_js,_jobify.min.js,qver==20140416+plugins,_soliloquy-lite,_assets,_js,_soliloquy.js,qver==2.2.0.pagespeed.jc.63OQwEsT-J.js"></script><script>eval(mod_pagespeed_OlVmBla$B_);</script> -->
<script src="<?php echo base_url(); ?>assets/themes/jobify/js/jobify.min.js,qver=20140416.pagespeed.jm.ivGGNNsETq.js"></script>
<!-- <script>eval(mod_pagespeed_OlVmBla$B_);</script> -->
<script type='text/javascript' src='<?php echo base_url(); ?>assets/javascript/devicepx-jetpackc9e4.js?ver=201509'></script>
<!-- <script>eval(mod_pagespeed_8fSk6jm7iD);</script> -->
<script type="text/javascript">if(typeof soliloquy_slider==='undefined'||false===soliloquy_slider){soliloquy_slider={};}jQuery('#soliloquy-container-2383').css('height',Math.round(jQuery('#soliloquy-container-2383').width()/(980/554)));jQuery(window).load(function(){var $=jQuery;var soliloquy_container_2383=$('#soliloquy-container-2383'),soliloquy_2383=$('#soliloquy-2383');soliloquy_slider['2383']=soliloquy_2383.soliloquy({slideSelector:'.soliloquy-item',speed:600,pause:7000,auto:1,useCSS:0,keyboard:true,adaptiveHeight:1,adaptiveHeightSpeed:400,infiniteLoop:1,mode:'fade',pager:1,controls:1,nextText:'',prevText:'',startText:'',stopText:'',onSliderLoad:function(currentIndex){soliloquy_container_2383.find('.soliloquy-active-slide').removeClass('soliloquy-active-slide');soliloquy_container_2383.css({'height':'auto','background-image':'none'});if(soliloquy_container_2383.find('.soliloquy-slider li').size()>1){soliloquy_container_2383.find('.soliloquy-controls').fadeTo(300,1);}soliloquy_2383.find('.soliloquy-item:not(.soliloquy-clone):eq('+currentIndex+')').addClass('soliloquy-active-slide');soliloquy_container_2383.find('.soliloquy-clone').find('*').removeAttr('id');},onSlideBefore:function(element,oldIndex,newIndex){soliloquy_container_2383.find('.soliloquy-active-slide').removeClass('soliloquy-active-slide');$(element).addClass('soliloquy-active-slide');},onSlideAfter:function(element,oldIndex,newIndex){},});});</script>
<script type="text/javascript">window.NREUM||(NREUM={});NREUM.info={"beacon":"beacon-5.newrelic.com","licenseKey":"e20a3d19de","applicationID":"3778624","transactionName":"NQBaN0JUCEMDBkRZCQxKeQBEXAleTQ9fUg8EHA==","queueTime":0,"applicationTime":803,"ttGuid":"","agentToken":"","atts":"GUdNQQpOGxxABBIKHR8Y","errorBeacon":"bam.nr-data.net","agent":"js-agent.newrelic.com\/nr-476.min.js"}</script>

</body>
</html>