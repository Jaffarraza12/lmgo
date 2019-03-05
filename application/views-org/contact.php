<div id="main" class="site-main">
	<header class="page-header">
		<h1 class="page-title">Contact</h1>
	</header>
	<div id="primary" class="content-area">
		<div id="content" class="container" role="main">
			<article id="post-1882"
				class="post-1882 page type-page status-publish hentry">
				<div class="entry-content">
					<div style="border:0px solid red; text-align: center;">
					<?php if( $this->session->flashdata('message') == 'Message sent successfully'): ?>
						<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('message'); ?></div>
					<?php endif; ?>
					<?php if($message != ''): ?>
					<div class="alert alert-danger" role="alert"><?php echo $message?></div>
					<?php endif; ?>
					</div>
					<script type='text/javascript'
						src='https://maps.google.com/maps/api/js?sensor=false&amp;ver=4.1.1'></script>
					<div class='content-column one_half'>
						<h3>Mailing Address:</h3>
						<p>We love getting stuff in the mail.</p>
						<p>
							Jobify Inc.<br /> 555 Madison Avenue<br /> Suite F-2 Manhattan<br />
							New York 10282
						</p>
						<h3>Phone:</h3>
						<p>Need to speak with someone?</p>
						<p>
							1 (800) 555-4453<br />
					
					</div>
					<div class='content-column one_half last_column'>
						<div class="pw_map_canvas" id="pw_map_54ece9d71bec9"
							style="height: 400px; width: 100%"></div>
						<script type="text/javascript">var map_pw_map_54ece9d71bec9;function pw_run_map_pw_map_54ece9d71bec9(){var location=new google.maps.LatLng("40.7127837","-74.0059413");var map_options={zoom:15,center:location,scrollwheel:1,disableDefaultUI:0,mapTypeId:google.maps.MapTypeId.ROADMAP}
map_pw_map_54ece9d71bec9=new google.maps.Map(document.getElementById("pw_map_54ece9d71bec9"),map_options);var marker=new google.maps.Marker({position:location,map:map_pw_map_54ece9d71bec9});}
pw_run_map_pw_map_54ece9d71bec9();</script>
					</div>
					<div class='clear_column'></div>
					<h3>Drop Us a Line</h3>
					<div class='gf_browser_unknown gform_wrapper' id='gform_wrapper_4'>
						<form method='post' enctype='multipart/form-data' id='gform_4'
							action='<?php echo base_url( 'index.php/common/home/contact' ); ?>'>
							<div class='gform_body'>
								<ul id='gform_fields_4'
									class='gform_fields top_label description_below'>
									<li id='field_4_1'
										class='gfield               gfield_contains_required'><label
										class='gfield_label' for='input_4_1'>Name<span
											class='gfield_required'>*</span></label>
									<div class='ginput_container'>
											<input name='name' id='name' type='text' value=''
												class='medium' tabindex='1' required="required" />
										</div></li>
									<li id='field_4_4'
										class='gfield               gfield_contains_required'><label
										class='gfield_label' for='input_4_4'>Email<span
											class='gfield_required'>*</span></label>
									<div class='ginput_container'>
											<input name='email' id='email' type="email" value=''
												class='medium' tabindex='2' required="required" />
										</div></li>
									<li id='field_4_3'
										class='gfield               gfield_contains_required'><label
										class='gfield_label' for='input_4_3'>Message<span
											class='gfield_required'>*</span></label>
									<div class='ginput_container'>
											<textarea name='message' id='message'
												class='textarea medium' tabindex='3' rows='10' cols='50' required="required"></textarea>
										</div></li>
								</ul>
							</div>
							<div class='gform_footer top_label'>
								<input type='submit' id='gform_submit_button_4'
									class='gform_button button' value='Submit' tabindex='4'
									onclick='if(window["gf_submitting_4"]){return false;}  window["gf_submitting_4"]=true; ' />
								<input type='hidden' class='gform_hidden' name='is_submit_4'
									value='1' /> <input type='hidden' class='gform_hidden'
									name='gform_submit' value='4' /> <input type='hidden'
									class='gform_hidden' name='gform_unique_id' value='' /> <input
									type='hidden' class='gform_hidden' name='state_4'
									value='WyJbXSIsIjBlZjNkNGYyNmE5YjY3NDlmMDVmNjMwNTYxYjdmYmVmIl0=' />
								<input type='hidden' class='gform_hidden'
									name='gform_target_page_number_4'
									id='gform_target_page_number_4' value='0' /> <input
									type='hidden' class='gform_hidden'
									name='gform_source_page_number_4'
									id='gform_source_page_number_4' value='1' /> <input
									type='hidden' name='gform_field_values' value='' />
							</div>
						</form>
					</div>
					<script type='text/javascript'>jQuery(document).ready(function(){jQuery(document).trigger('gform_post_render',[4,1])});</script>
				</div>
			</article>
			<div class="row">
				<div id="comments" class="comments-area col-md-9 col-md-offset-3"></div>
			</div>
		</div>
		<div class="paginate-links container"></div>
	</div>
</div>