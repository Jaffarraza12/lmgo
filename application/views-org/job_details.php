<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<div id="main" class="site-main">
	<div id="primary" class="content-area">
		<div class="page-header">
			<h1 class="page-title"><?php echo $job->title; ?></h1>
			<h2 class="page-subtitle">
				<ul>
					<?php if( $job->job_typ == 'Part Time' ) : ?>
						<li class="job-type part-time"><?php echo $job->job_typ; ?></li>
					<?php elseif( $job->job_typ == 'Full Time' ) : ?>
						<li class="job-type full-time"><?php echo $job->job_typ; ?></li>
					<?php elseif( $job->job_typ == 'Internship' ) : ?>
						<li class="job-type part-time"><?php echo $job->job_typ; ?></li>
					<?php elseif( $job->job_typ == 'Contract' ) : ?>
						<li class="job-type part-time"><?php echo $job->job_typ; ?></li>
					<?php elseif( $job->job_typ == 'Temporary' ) : ?>
						<li class="job-type temporary"><?php echo $job->job_typ; ?></li>
					<?php elseif( $job->job_typ == 'time to time' ) : ?>
						<li class="job-type part-time"><?php echo $job->job_typ; ?></li>
					<?php endif; ?>
					<li class="job-company"><a href="<?php echo base_url( 'index.php/common/home/company_details/' . $job->employer_id ); ?>" target="_blank"><?php echo $job->employer_name; ?></a></li>
					<li class="job-location"><i class="icon-location"></i> <a
						class="google_map_link"
						href="http://maps.google.com/maps?q=%3Ca+href%3D%22https%3A%2F%2Fdemo.astoundify.com%2Fjobify%2Fjob-region%2Fsan-francisco%2F%22+rel%3D%22tag%22%3ESan+Francisco%3C%2Fa%3E&amp;zoom=14&amp;size=512x512&amp;maptype=roadmap&amp;sensor=false"
						target="_blank"><a href="#" rel="tag"><?php echo $job->city_name; ?></a></a></li>
					<li class="job-date-posted"><i class="icon-calendar"></i> Posted on <date><?php echo date('d M Y', $job->sts); ?></date></li>
				</ul>
			</h2>
		</div>
		<div id="content" class="container" role="main">
			<article id="post-8"
				class="post-8 job_listing type-job_listing status-publish has-post-thumbnail hentry">
				<div class="entry-content">
				<div style="border:0px solid red; text-align: center;">
				<?php if( $this->session->flashdata('message') == 'Applied for job successfully'): ?>
					<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('message'); ?></div>
				<?php endif; ?>
				<?php if( $this->session->flashdata('message') == 'Already Applied for this job'): ?>
					<div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('message'); ?></div>
				<?php endif; ?>
				<?php if( $this->session->flashdata('message') == 'Invalid File type'): ?>
					<div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('message'); ?></div>
				<?php endif; ?>
				</div>
					<div class="single_job_listing" itemscope
						itemtype="http://schema.org/JobPosting">
						<meta itemprop="title" content="<?php echo $job->title; ?>" />
						<div class="job-meta-top row">
							<div class="col-md-3 col-sm-6 col-xs-12">
								<aside class="job_listing-widget-top default-widget">
									<a href="<?php echo base_url( 'index.php/common/home/company_details/' . $job->employer_id ); ?>" target="_blank"><img
										class="company_logo"
										src="<?php echo base_url( 'uploads/employer/' . $job->logo ); ?>"
										alt="<?php echo $job->employer_name; ?>" /></a>
								</aside>
							</div>
							
							<div class="col-md-5 col-sm-6 col-xs-12">
								<aside class="job_listing-widget-top default-widget">
									<h3 class="job_listing-widget-title-top">Job Category</h3>
									<div class="job_listing-categories">
										<?php echo $category; ?>
																					
										
									</div>
								</aside>
								<!-- <aside class="job_listing-widget-top default-widget">
									<h3 class="job_listing-widget-title-top">Share Job Posting</h3>
									<div class="sharedaddy sd-sharing-enabled">
										<div
											class="robots-nocontent sd-block sd-social sd-social-icon sd-sharing">
											<h3 class="sd-title">Share this:</h3>
											<div class="sd-content">
												<ul>
													<li class="share-facebook"><a rel="nofollow"
														data-shared="sharing-facebook-8"
														class="share-facebook sd-button share-icon no-text"
														href="index5a58.html?share=facebook" target="_blank"
														title="Share on Facebook"><span></span><span
															class="sharing-screen-reader-text">Share on Facebook
																(Opens in new window)</span></a></li>
													<li class="share-twitter"><a rel="nofollow"
														data-shared="sharing-twitter-8"
														class="share-twitter sd-button share-icon no-text"
														href="index9a7b.html?share=twitter" target="_blank"
														title="Click to share on Twitter"><span></span><span
															class="sharing-screen-reader-text">Click to share on
																Twitter (Opens in new window)</span></a></li>
													<li class="share-google-plus-1"><a rel="nofollow"
														data-shared="sharing-google-8"
														class="share-google-plus-1 sd-button share-icon no-text"
														href="index386f.html?share=google-plus-1" target="_blank"
														title="Click to share on Google+"><span></span><span
															class="sharing-screen-reader-text">Click to share on
																Google+ (Opens in new window)</span></a></li>
													<li class="share-linkedin"><a rel="nofollow"
														data-shared="sharing-linkedin-8"
														class="share-linkedin sd-button share-icon no-text"
														href="index9f21.html?share=linkedin" target="_blank"
														title="Click to share on LinkedIn"><span></span><span
															class="sharing-screen-reader-text">Click to share on
																LinkedIn (Opens in new window)</span></a></li>
													<li class="share-email"><a rel="nofollow" data-shared=""
														class="share-email sd-button share-icon no-text"
														href="index3081.html?share=email" target="_blank"
														title="Click to email this to a friend"><span></span><span
															class="sharing-screen-reader-text">Click to email this to
																a friend (Opens in new window)</span></a></li>
													<li class="share-end"></li>
												</ul>
											</div>
										</div>
									</div>
								</aside> -->
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<aside class="job_listing-widget-top default-widget">
									<h3 class="job_listing-widget-title-top">Company Details</h3>
									<ul class="company-social">
										<li><a href="#" target="_blank"
											itemprop="url"> <i class="icon-link"></i> Website
										</a></li>
										<!-- <li><a href="http://twitter.com/Amazon"> <i
												class="icon-twitter"></i> Twitter
										</a></li> -->
									</ul>
								</aside>
								<aside class="job_listing-widget-top default-widget">
									<div class="job_application application">
										<!-- <input class="apply-with-linkedin" type="button"
											value="Apply with LinkedIn" /> <input type="button"
											class="application_button button" value="Apply for job" /> -->
											<?php 
											$login_jobseeker = $this->session->userdata('jobseeker');
											if ( empty( $login_jobseeker ) ) : ?> 
											<input type="button"
											class="button" value="Apply for job" onclick="window.location.href='<?php echo base_url( 'index.php/common/jobseeker/jobseeker_login' ); ?>'" />
											<?php else : ?>						
											<!-- <input type="button"
											class="application_button button" value="Apply for job" onclick="apply_for_job();" /> -->
											<input type="button"
											class="application_button button" value="Apply for job" /> 
											<div id="loading" style="border: 0px solid red; position: relative; float: left; width: 225px; height: 55px; margin: -53px 0px; text-align: center; background: #fff; opacity: 0.9; line-height: 55px; display: none;">
												<i class="fa fa-refresh fa-spin"></i>
											</div>
											<?php endif; ?>
										<div class="application_details">
											<div class='gf_browser_unknown gform_wrapper'
												id='gform_wrapper_1'>
												<a id='gf_1' name='gf_1' class='gform_anchor'></a>
												<form method='post' enctype='multipart/form-data'
													id='gform_1'
													action='<?php echo $applyFormAction; ?>'>
													<div class='gform_heading'>
														<h3 class='gform_title'>Apply</h3>
													</div>
													<div class='gform_body'>
														<ul id='gform_fields_1'
															class='gform_fields top_label description_below'>
															<li id='field_1_5' class='gfield'><label
																class='gfield_label' for='input_1_5'>Upload Resume</label>
															<!-- <div class='ginput_container'>
																	<div id='gform_multifile_upload_1_5'
																		data-settings='{&quot;runtimes&quot;:&quot;html5,flash,html4&quot;,&quot;browse_button&quot;:&quot;gform_browse_button_1_5&quot;,&quot;container&quot;:&quot;gform_multifile_upload_1_5&quot;,&quot;drop_element&quot;:&quot;gform_drag_drop_area_1_5&quot;,&quot;filelist&quot;:&quot;gform_preview_1_5&quot;,&quot;unique_names&quot;:true,&quot;file_data_name&quot;:&quot;file&quot;,&quot;url&quot;:&quot;https:\/\/demo.astoundify.com\/jobify\/?gf_page=upload&quot;,&quot;flash_swf_url&quot;:&quot;https:\/\/demo.astoundify.com\/jobify\/wp-includes\/js\/plupload\/plupload.flash.swf&quot;,&quot;silverlight_xap_url&quot;:&quot;https:\/\/demo.astoundify.com\/jobify\/wp-includes\/js\/plupload\/plupload.silverlight.xap&quot;,&quot;filters&quot;:{&quot;mime_types&quot;:[{&quot;title&quot;:&quot;Allowed Files&quot;,&quot;extensions&quot;:&quot;pdf,doc,jpg,gif&quot;}],&quot;max_file_size&quot;:&quot;2097152b&quot;},&quot;multipart&quot;:true,&quot;urlstream_upload&quot;:false,&quot;multipart_params&quot;:{&quot;form_id&quot;:1,&quot;field_id&quot;:5},&quot;gf_vars&quot;:{&quot;max_files&quot;:&quot;5&quot;,&quot;message_id&quot;:&quot;gform_multifile_messages_1_5&quot;,&quot;disallowed_extensions&quot;:[&quot;php&quot;,&quot;asp&quot;,&quot;exe&quot;,&quot;com&quot;,&quot;htaccess&quot;,&quot;phtml&quot;,&quot;php3&quot;,&quot;php4&quot;,&quot;php5&quot;,&quot;php6&quot;]}}'
																		class='gform_fileupload_multifile'>
																		<div id='gform_drag_drop_area_1_5'
																			class='gform_drop_area'>
																			<span class='gform_drop_instructions'>Drop files here
																				or </span><input id='gform_browse_button_1_5'
																				type='button' value='Select files'
																				class='button gform_button_select_files' />
																		</div>
																	</div>
																	<div class='validation_message'>
																		<ul id='gform_multifile_messages_1_5'></ul>
																	</div>
																</div> -->
																<fieldset class="fieldset-resume_file">
																<div class="field">
																<input type="file" class="input-text" name="resume_file" id="resume_file" placeholder="" required="required"/></div>
																</fieldset>
																<div id='gform_preview_1_5'></div>
																<div class='gfield_description'>Upload your resume,
																	accepted formats are pdf, doc & docx</div></li>															
														</ul>
													</div>
													<div class='gform_footer top_label'>
														<!-- <input type='submit' id='gform_submit_button_1'
															class='gform_button button' value='Apply for Job'
															tabindex='4'
															onclick='if(window["gf_submitting_1"]){return false;}  window["gf_submitting_1"]=true; ' /><input
															type='hidden' name='gform_ajax'
															value='form_id=1&amp;title=1&amp;description=&amp;tabindex=1' /> -->
															
															<input type='submit' id='gform_submit_button_1'
															class='gform_button button' value='Apply for Job'
															tabindex='4' />
														 <input type="hidden" id="jobId" name="jobId" value="<?php echo $this->uri->segment(4); ?>">
														 <input type="hidden" id="pageUrl" name="pageUrl" value="<?php echo base_url('index.php/'.uri_string()); ?>">
													</div>
												</form>
											</div>
											<!-- <iframe style='display: none; width: 0px; height: 0px;'
												src='about:blank' name='gform_ajax_frame_1'
												id='gform_ajax_frame_1'></iframe> 
											<script type='text/javascript'>jQuery(document).ready(function($){gformInitSpinner(1,'../../wp-content/plugins/gravityforms/images/spinner.gif');jQuery('#gform_ajax_frame_1').load(function(){var contents=jQuery(this).contents().find('*').html();var is_postback=contents.indexOf('GF_AJAX_POSTBACK')>=0;if(!is_postback){return;}var form_content=jQuery(this).contents().find('#gform_wrapper_1');var is_redirect=contents.indexOf('gformRedirect(){')>=0;var is_form=!(form_content.length<=0||is_redirect);if(is_form){jQuery('#gform_wrapper_1').html(form_content.html());jQuery(document).scrollTop(jQuery('#gform_wrapper_1').offset().top);if(window['gformInitDatepicker']){gformInitDatepicker();}if(window['gformInitPriceFields']){gformInitPriceFields();}var current_page=jQuery('#gform_source_page_number_1').val();gformInitSpinner(1,'../../wp-content/plugins/gravityforms/images/spinner.gif');jQuery(document).trigger('gform_page_loaded',[1,current_page]);window['gf_submitting_1']=false;}else if(!is_redirect){var confirmation_content=jQuery(this).contents().find('#gforms_confirmation_message').html();if(!confirmation_content){confirmation_content=contents;}setTimeout(function(){jQuery('#gform_wrapper_1').replaceWith('<'+'div id=\'gforms_confirmation_message\' class=\'gform_confirmation_message_1\''+'>'+confirmation_content+'<'+'/div'+'>');jQuery(document).scrollTop(jQuery('#gforms_confirmation_message').offset().top);jQuery(document).trigger('gform_confirmation_loaded',[1]);window['gf_submitting_1']=false;},50);}else{jQuery('#gform_1').append(contents);if(window['gformRedirect']){gformRedirect();}}jQuery(document).trigger('gform_post_render',[1,current_page]);});});</script>
											<script type='text/javascript'>jQuery(document).ready(function(){jQuery(document).trigger('gform_post_render',[1,1])});</script> -->
										</div>
										<script src="../../../../platform.linkedin.com/in.js"
											type="text/javascript">
	api_key: 752c7t24gziyy8</script>
										<form method="post" class="apply-with-linkedin-details"
											style="display: none">
											<div class="apply-with-linkedin-profile">
												<img src="#" />
												<h2 class="profile-name"></h2>
												<strong class="profile-headline"></strong> <em
													class="profile-location"></em>
												<dl>
													<dt class="profile-current-positions">Current</dt>
													<dd class="profile-current-positions">
														<ul></ul>
													</dd>
													<dt class="profile-past-positions">Past</dt>
													<dd class="profile-past-positions">
														<ul></ul>
													</dd>
													<dt class="profile-educations">Education</dt>
													<dd class="profile-educations">
														<ul></ul>
													</dd>
													<dt class="profile-email">Email</dt>
													<dd class="profile-email"></dd>
													<dt class="apply-with-linkedin-cover-letter">
														<label for="apply-with-linkedin-cover-letter">Cover letter
															(optional)</label>
													</dt>
													<dd class="apply-with-linkedin-cover-letter">
														<textarea name="apply-with-linkedin-cover-letter"
															id="apply-with-linkedin-cover-letter">To whom it may concern,

I am very interested in the Design Technologist position at Amazon. I believe my skills and work experience make me an ideal candidate for this role. I look forward to speaking with you soon about this position. Thank you for your consideration.

Best regards, </textarea>
													</dd>
												</dl>
												<p class="apply-with-linkedin-submit">
													<input type="submit" name="apply-with-linkedin-submit"
														value="Submit Application" /> Clicking submit will submit
													your full profile to <strong>Amazon</strong>. <input
														type="hidden" name="apply-with-linkedin-profile-data"
														id="apply-with-linkedin-profile-data" /> <input
														type="hidden" name="apply-with-linkedin-job-id" value="8" />
												</p>
											</div>
										</form>
									</div>
									<!-- <div class="job-manager-form wp-job-manager-bookmarks-form">
										<div>
											<a class="bookmark-notice"
												href="<?php //echo base_url( 'index.php/common/home/login' ); ?>">Login to bookmark this Job</a>
										</div>
									</div> -->
								</aside>
							</div>
						</div>
						<div class="job-overview-content row">
							<div itemprop="description" class="job-overview col-md-12 col-sm-12">
								<h2>Job Details</h2>
								<ul class="job_specification">
								<?php foreach( $attribute as $attr ): ?>
								
									<li><?php echo '<div><strong>' . $attr->attribute_name. ': </strong></div>' . $attr->value;?></li>
								
								<?php endforeach; ?>
								</ul>								
							</div>
							<div itemprop="description" class="job-overview col-md-12 col-sm-12">
								<h2>Job Description</h2>
								<?php echo $job->description; ?>								
							</div>
						</div>
					</div>
					<!-- <div class="related-jobs">
						<h2>Related Jobs</h2>
						<ul class="job_listings related">
							<li id="job_listing-3346"
								class="post-3346 job_listing type-job_listing status-publish hentry job-type-full-time"
								data-longitude="-79.0203732" data-latitude="43.8508553"
								data-title="Web Designer at Creative Niche Inc"
								data-href="../web-designer/index.html">
								<div class="row">
									<a href="../web-designer/index.html" class="job_listing-link">
										<div class="logo col-sm-2 col-md-1 col-lg-1">
											<img class="company_logo"
												src="../../wp-content/uploads/sites/15/2014/03/xCN_Centre.jpg.pagespeed.ic._Awxnj_4ra.jpg"
												alt="Creative Niche Inc" />
										</div>
										<div class="position col-xs-12 col-sm-10 col-md-6 col-lg-5">
											<h3>Web Designer</h3>
											<div class="company">
												<strong>Creative Niche Inc</strong>
											</div>
										</div>
										<div class="location col-xs-12 col-md-5 col-lg-4">
											<a href="../../job-region/ontario/index.html" rel="tag">Ontario</a>
										</div>
										<ul class="meta col-lg-2">
											<li class="job-type full-time">Full Time</li>
											<li class="date"><date>Posted 12 months ago</date></li>
										</ul>
									</a>
								</div>
							</li>
						</ul>
					</div> -->
					
					<div class="related-jobs">
						<h2>Related Jobs</h2>
						<ul class="job_listings related">
						<?php 
						foreach ( $relatedJob as $job ) :	
						?>
							<li id="job_listing-3348" class="post-3348 job_listing type-job_listing status-publish hentry job-type-full-time" data-longitude="-79.6441198" data-latitude="43.5890452" data-title="Web Developer at 5th Business Inc" data-href="../web-developer/index.html">
								<div class="row">
									<a href="<?php echo base_url( 'index.php/common/home/jobs_details/' . $job->job_id ); ?>" class="job_listing-link">
										<div class="logo col-sm-2 col-md-1 col-lg-1">
											<img class="company_logo" src="<?php echo base_url();?>uploads/employer/<?php echo $job->logo; ?>" alt="<?php echo $job->employer_name; ?>"/>
										</div>
										<div class="position col-xs-12 col-sm-10 col-md-6 col-lg-5">
											<h3><?php echo $job->title; ?></h3>
											<div class="company">
												<strong>
													<a href="<?php echo base_url( 'index.php/common/home/company_details/' . $job->employer_id ); ?>">
														<?php echo $job->employer_name; ?>
													</a>
												</strong> 
											</div>
										</div>
										<div class="location col-xs-12 col-md-5 col-lg-4"><?php echo $job->city_name; ?></div>
										<ul class="meta col-lg-2">
										<?php if( $job->job_typ == 'Part Time' ) : ?>
											<li class="mix part-time job-type"><?php echo $job->job_typ; ?></li>
										<?php elseif( $job->job_typ == 'Full Time' ) : ?>
											<li class="mix full-time job-type"><?php echo $job->job_typ; ?></li>
										<?php elseif( $job->job_typ == 'Internship' ) : ?>
											<li class="mix internship job-type"><?php echo $job->job_typ; ?></li>
										<?php elseif( $job->job_typ == 'Contract' ) : ?>
											<li class="mix contract job-type"><?php echo $job->job_typ; ?></li>
										<?php elseif( $job->job_typ == 'Temporary' ) : ?>
											<li class="mix temporary job-type"><?php echo $job->job_typ; ?></li>
										<?php elseif( $job->job_typ == 'time to time' ) : ?>
											<li class="mix time_to_time job-type"><?php echo $job->job_typ; ?></li>
										<?php endif; ?>
											<li class="date"><date><?php echo date('d M Y', $job->sts); ?></date></li>
										</ul>
									</a>
								</div>
							</li>
						<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</article>
		</div>
		<div class="paginate-links container"></div>
	</div>
</div>
<script type="text/javascript">
function apply_for_job()
{	
	var jobId = $("#jobId").val();
	$('#loading').show();

	$.ajax({
        type: 'POST',
        url: '<?php echo base_url()?>index.php/common/jobseeker/apply_for_job',
        data: { jobId:jobId },
        success:function(response){

            if(response == 'Applied for job successfully') {
                var msg = '<div class="alert alert-success" role="alert">Applied for job successfully</div>'
            }
            else if(response == 'Already Applied for this job') {
            	var msg = '<div class="alert alert-danger" role="alert">Already Applied for this job</div>'
            }
           $("#msg").html(msg);
           $('#loading').hide();
        }
   });
	
}
</script>