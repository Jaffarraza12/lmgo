	    
	<div id="main" class="site-main">
		<div id="primary" class="content-area">
			<div id="content" class="homepage-content" role="main">
				<section id="filters jobify_widget_map-5" class="homepage-widget filters jobify_widget_map">
					<div class="job_listing-map-wrapper">
						<div class="job_listing-map">
							<div id="job_listing-map-canvas"></div>
						</div>
					</div>
 <script>jQuery(document).on('ready',function($){new cLocator.Stage('job_listing',jobifyMapSettings);});</script>
					<div class="job_listings">
						<form action="<?php echo $formAction; ?>" method="get">
							<div class="search_jobs">
								<div class="search_keywords">
									<label for="search_keywords">Keywords</label>
									<input type="text" name="search_keywords" id="search_keywords" placeholder="Keywords" value=""/>
								</div>
								<div class="search_location">
									<label for="search_location">Location</label>
									<select name='country_id' id='country_id' class='postform'>
										<option value=''>Select Location</option>
										<?php foreach ( $country as $ctry ): ?>
										<option value="<?php echo $ctry->country_id; ?>"><?php echo $ctry->en_title; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="search_location">
									<label for="search_categories">Category</label>
									<select name='category_id' id='search_categories' class='postform'>
										<option value=''>Any category</option>
										<?php foreach ( $category as $cat ): ?>
										<option value="<?php echo $cat->category_id; ?>"><?php echo $cat->name; ?></option>
										<?php endforeach; ?>
									</select>
								</div>								
								<div class="search_submit">
									<input type="submit" name="submit" value="Search"/>
								</div>	
							</div>
						</form>
<noscript>Your browser does not support JavaScript, or it is disabled. JavaScript must be enabled in order to view listings.</noscript>
						<ul class="job_listings"></ul>
						<a class="load_more_jobs" href="#" style="display:none;">
							<strong>Load more listings</strong>
						</a>
					</div>
				</section>
				<section id="jobify_widget_jobs-3" class="homepage-widget jobify_widget_jobs">
					<div class="container">
						<div class="row">
							<div class="recent-jobs  has-spotlight col-lg-12 col-md-12 col-sm-12">
								<h3 class="homepage-widget-title">Job Seekers</h3>
								<div class="job_listings" data-location="" data-keywords="" data-show_filters="false" data-show_pagination="false" data-per_page="5" data-orderby="featured" data-order="DESC" data-categories="">
									<!-- <form class="job_filters">
										<ul class="job_types" style="border-width:1px;">
                                            <?php foreach($job_types as $type){ ?>
                                                <li><label for="job_type_<?php echo $type->name ?>" class="<?php echo $type->name ?>"><input type="checkbox" class="fcheck" name="filter_job_type[]" value="<?php echo $type->job_type_id ?>" checked='checked' id="job_type_<?php echo $type->name ?>" /> <?php echo $type->name ?></label></li>
                                            <?php } ?>
                                    	</ul>
										<input type="hidden" name="filter_job_type[]" value=""/>
										<div style="clear: both;height: 10px;" class="clear"></div>
									</form> -->
									<ul class="job_listings">
										<?php 
										foreach ( $jobs as $job ) :	
										?>
										<li id="job_listing-8" class="post-8 job_listing type-job_listing status-publish has-post-thumbnail hentry job-type-part-time job_position_featured">
											<div class="row">
												<a href="#" class="job_listing-link">
													<div class="logo col-sm-2 col-md-1 col-lg-1">
													<?php if( $job->file != '' && $job->type == 'pic') : ?>
														<img class="company_logo" src="<?php echo base_url();?>uploads/users/<?php echo $job->file; ?>" alt="<?php echo $job->firstname. ' ' . $job->lastname; ?>"/>
													<?php elseif( $job->file == '' || $job->type == 'pic') : ?>
														<img class="company_logo" src="<?php echo base_url();?>uploads/users/logo.png" alt="<?php echo $job->firstname. ' ' . $job->lastname; ?>"/>
													<?php endif; ?>	
													</div>
													<div class="position col-xs-12 col-sm-10 col-md-6 col-lg-5">
														<h3><?php echo $job->firstname. ' ' . $job->lastname; ?></h3>
														<div class="company">
															<strong><?php echo $job->employer_status; ?></strong> 
														</div>
													</div>
													<div class="location col-xs-12 col-md-5 col-lg-4"><?php echo $job->country_name. ', ' .$job->city_name; ?></div>
													<ul class="meta col-lg-2">			
														<li class="job-type part-time"><?php echo $job->category_name; ?></li>			
													</ul>
												</a>
											</div>
										</li>
										
										<?php endforeach; ?>
									</ul>
									<a class="load_more_jobs" href="<?php echo base_url( 'index.php/common/jobseeker/getJobseeker' ); ?>" style="display: block;"><strong>Load more listings</strong></a>
								</div>
							</div>
							<!-- <div class="job-spotlight col-lg-4 col-md-6 col-sm-12">
								<h3 class="homepage-widget-title">Job Spotlight</h3>
								<div class="single-job-spotlight">
									<div class="single-job-spotlight-feature-image">
									<a href="job/product-designer/index.html" rel="bookmark">
										<img width="900" height="349" src="uploads/sites/15/2013/07/900x349xdropbox-featured.jpg.pagespeed.ic.JdxXzg5mvY.jpg" class="attachment-content-job-featured wp-post-image" alt="dropbox-featured"/>
									</a>
									</div>
									<div class="single-job-spotlight-content">
										<p>
											<a href="job/product-designer/index.html" rel="bookmark">Product Designer</a>
										</p>
										<div class="single-job-spotlight-actions">
											<div class="action">
												<span class="job-location">
													<i class="icon-location"></i> San Francisco
												</span>
											</div>
											<div class="action">
												<span class="job-type full-time">Full Time</span>
											</div>
										</div>
										<p>The web is a giant place, and Dropbox is working to make the gap between computers and the internet much</p>
									</div>
								</div>	
							</div> -->
						</div>
					</div>
				</section>
				<section id="jobify_widget_stats-2" class="homepage-widget jobify_widget_stats">
					<div class="container">
						<h3 class="homepage-widget-title">Tipshrc Site Stats</h3>
						<p class="homepage-widget-description">
							Here we list our site stats and how many people we've helped find a job and companies have
						found recruits. It's a pretty awesome stats area!
						</p>
						<ul class="job-stats row showing-5">
							<li class="job-stat col-md-2 col-sm-6 col-xs-12">
								<strong><?php echo $postedJobs; ?></strong>
								Jobs Posted
							</li>
							<li class="job-stat col-md-2 col-sm-6 col-xs-12">
								<strong><?php echo $resumePosted; ?></strong>
								Resumes Posted
							</li>
							<li class="job-stat col-md-2 col-sm-6 col-xs-12">
								<strong><?php echo $jobFilled; ?></strong>
								Job Filled
							</li>
							<li class="job-stat col-md-2 col-sm-6 col-xs-12">
								<strong><?php echo $company; ?></strong>
								Companies
							</li>
							<li class="job-stat col-md-2 col-sm-6 col-xs-12">
								<strong><?php echo $members; ?></strong>
								Members
							</li>
						</ul>
					</div>
				</section>
				<section id="jobify_widget_companies-3" class="homepage-widget jobify_widget_companies">
					<div class="container">
						<h3 class="homepage-widget-title">Companies We&#8217;ve Helped</h3>
						<p class="homepage-widget-description">
							Some of the companies we've helped recruit excellent applicants over the years.
						</p>
						<div class="company-slider-wrap">
							<div class="company-slider">
								<div class="testimonials component effect-fade">
									<div class="testimonials-list">										
										<div class="company-slider-item">
											<a href="#" class="avatar-link">
												<img width="1" height="1" src="<?php echo base_url('uploads/sites/15/2013/07/classify-logo-big.svg'); ?>" class="avatar wp-post-image" alt="classify-logo-big"/>
											</a>
										</div>
										<div class="company-slider-item">
											<a href="#" class="avatar-link">
												<img width="1" height="1" src="<?php echo base_url('uploads/sites/15/2013/07/campaignify-logo-big.svg'); ?>" class="avatar wp-post-image" alt="campaignify-logo-big"/>
											</a>
										</div>
										<div class="company-slider-item">
											<a href="#" class="avatar-link">
												<img width="1" height="1" src="<?php echo base_url('uploads/sites/15/2013/07/fundify-logo-big.svg'); ?>" class="avatar wp-post-image" alt="fundify-logo-big"/>
											</a>
										</div>
										<div class="company-slider-item">
											<a href="#" class="avatar-link">
												<img width="1" height="1" src="<?php echo base_url('uploads/sites/15/2013/07/marketify-logo-big.svg'); ?>" class="avatar wp-post-image" alt="marketify-logo-big"/>
											</a>
										</div>
										<div class="company-slider-item">
											<a href="#" class="avatar-link">
												<img width="1" height="1" src="<?php echo base_url('uploads/sites/15/2013/12/astoundify-logo-big.svg'); ?>" class="avatar wp-post-image" alt="astoundify-logo-big"/>
											</a>
										</div>
									</div>
									<div class="fix"></div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section id="jobify_widget_testimonials-2" class="homepage-widget jobify_widget_testimonials">
					<div class="container">
						<h3 class="homepage-widget-title">Kind Words From Happy Campers</h3>
						<p class="homepage-widget-description">
							What other people thought about the service provided by Tipshrc
						</p>
						<div class="testimonial-slider-wrap animated">
							<div class="testimonial-slider">
								<div class="testimonials component effect-fade">
									<div class="testimonials-list">
										<blockquote id="quote-1793" class="individual-testimonial quote first">
											<p>I&#8217;m incredibly pleased with Tipshrc&#8217;s service. They offer quality candidates &amp; super quick support, they have turned me into a big fan.</p>
											<cite class="individual-testimonial-author">
												<img alt='' src='https://secure.gravatar.com/avatar/048c615183b42a20ec81b90af7ab221d?s=70&amp;d=&amp;r=G' class='avatar avatar-70 photo' height='70' width='70'/> 
												<cite class="author" itemprop="author" itemscope itemtype="http://schema.org/Person">
													<span itemprop="name">Chris Christoff</span>
												</cite>
											</cite>
										</blockquote>
										<blockquote id="quote-1759" class="individual-testimonial quote">
											<p>Without Tipshrc i&#8217;d be homeless, they found me a job and got me sorted out quickly with everything! Can&#8217;t quite believe the service level that they offer!</p>
											<cite class="individual-testimonial-author">
												<img alt='' src='https://secure.gravatar.com/avatar/02cdeec360274d7d9f1aa85761f95dc8?s=70&amp;d=&amp;r=G' class='avatar avatar-70 photo' height='70' width='70'/>
												<cite class="author" itemprop="author" itemscope itemtype="http://schema.org/Person">
													<span itemprop="name">Jake Caputo</span>
												</cite>
											</cite>
										</blockquote>
										<blockquote id="quote-1712" class="individual-testimonial quote">
											<p>Excellent service offering a personal touch, if I had an issue they were no longer than a phone call away and were always quick to respond.</p>
											<cite class="individual-testimonial-author">
												<img alt='' src='https://secure.gravatar.com/avatar/56d26f0578dcec875d7a4b177c51d7f9?s=70&amp;d=&amp;r=G' class='avatar avatar-70 photo' height='70' width='70'/>
												<cite class="author" itemprop="author" itemscope itemtype="http://schema.org/Person">
													<span itemprop="name">Spencer Finnell</span>
												</cite>
											</cite>
										</blockquote>
										<blockquote id="quote-1713" class="individual-testimonial quote">
											<p>Tipshrc offer an amazing service and I couldn&#8217;t be happier! They are dedicated to helping recruiters find great candidates, wonderful service!</p>
											<cite class="individual-testimonial-author">
												<img alt='' src='https://secure.gravatar.com/avatar/7f10262d7382d44fd5b9c2e18d8a7a41?s=70&amp;d=&amp;r=G' class='avatar avatar-70 photo' height='70' width='70'/>
												<cite class="author" itemprop="author" itemscope itemtype="http://schema.org/Person">
													<span itemprop="name">Adam Pickering</span>
												</cite>
											</cite>
										</blockquote>
										<blockquote id="quote-1714" class="individual-testimonial quote">
											<p>If I didn&#8217;t find Tipshrc I&#8217;m pretty sure i&#8217;d be no where, they helped me find a job in less than 2 days and the job is amazing, �amazing service!</p>
											<cite class="individual-testimonial-author">
												<img alt='' src='https://secure.gravatar.com/avatar/7bfd46317c04e0f1798588b56658e16e?s=70&amp;d=&amp;r=G' class='avatar avatar-70 photo' height='70' width='70'/>
												<cite class="author" itemprop="author" itemscope itemtype="http://schema.org/Person">
													<span itemprop="name">Liam McKay</span>
												</cite>
											</cite>
										</blockquote>
										<blockquote id="quote-1715" class="individual-testimonial quote last">
											<p>Wow just Wow! Tipshrc is an excellent service that offers personal one to one help finding a job and they know how to please, i&#8217;d use them again!</p>
											<cite class="individual-testimonial-author">
												<img alt='' src='https://secure.gravatar.com/avatar/112d306fd6d7f05bb47e5c5019a70aa5?s=70&amp;d=&amp;r=G' class='avatar avatar-70 photo' height='70' width='70'/>
												<cite class="author" itemprop="author" itemscope itemtype="http://schema.org/Person">
													<span itemprop="name">Jason Schuller</span>
												</cite>
											</cite>
										</blockquote>
									</div>
									<div class="fix"></div>
								</div>
							</div>
						</div>
					</div>
				</section>
<script type="text/javascript">
//$(".fcheck").click(function() {   
	
    /* if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } */

    /* if(this.checked == false) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = false;                        
        });
    } */
//});


</script>
				<!-- <section id="jobify_widget_video-2" class="homepage-widget jobify_widget_video">
					<div class="container">
						<div class="video-description">
							<h3 class="homepage-widget-title">How It All Works</h3>
							<p class="homepage-widget-description">
								<p>The expression day job is often used for a job one works in to make ends meet while performing low-paying (or non-paying) work in their preferred vocation. Archetypical examples of this are the woman who works as a waitress (her day job) while she tries to become an actress, and the professional athlete who works as a laborer in the off season because he is currently only able to make the roster of a semi-professional team.</p>
								<p>While many people do hold a full-time occupation, "day job" specifically refers to those who hold the position solely to pay living expenses so they can pursue, through low paying entry work, the job they really want (which may also be during the day).</p>
								<p>
									<a href="#" class="button-secondary">Learn More</a>
								</p>
							</p>
						</div>
						<div class="video-preview animated">
							<iframe width="680" height="383" src="https://www.youtube.com/embed/FG0fTKAqZ5g?feature=oembed" frameborder="0" allowfullscreen></iframe>
						</div>
					</div>
				</section> -->
				<!-- <section id="jobify_widget_slider-3" class="homepage-widget jobify_widget_slider">
					<div id="soliloquy-container-2383" class="soliloquy-container soliloquy-transition-fade  soliloquy-theme-classic" style="max-width:980px;max-height:554px;">
						<ul id="soliloquy-2383" class="soliloquy-slider soliloquy-slides soliloquy-wrap soliloquy-clear">
							<li class="soliloquy-item soliloquy-item-1 soliloquy-image-slide" draggable="false" style="list-style:none">
								<div class="soliloquy-image-wrap">
									<a href="#">
										<img id="soliloquy-image-1795" class="soliloquy-image soliloquy-image-1" src="uploads/sites/15/2013/07/Jobify-App-Slide-Two.png" alt="Manage Your Job Postings"/>
									</a>
								</div>
								<div class="soliloquy-caption-wrap">
									<div class="soliloquy-caption">
										<div class="soliloquy-caption-inside">
											<h2 class="soliloquy-caption-title">Manage Your Job Postings</h2>
											<p>A job is a regular activity performed in exchange for payment. A person usually begins a job by becoming an employee, volunteering, or starting a business. The duration of a job may range from an hour (in the case of odd jobs) to a lifetime (in the case of some judges). If a person is trained for a certain type of job, they may have a profession. The series of jobs a person holds in their life is their career.</p>
											<p>
												<a href="http://themeforest.net/item/jobify-job-board-wordpress-theme/5247604?ref=Astoundify" class="button-secondary">Download Now</a>
											</p>
										</div>
									</div>								
								</div>
							</li>
							<li class="soliloquy-item soliloquy-item-2 soliloquy-image-slide" draggable="false" style="list-style:none">
								<div class="soliloquy-image-wrap">
									<a href="#">
										<img id="soliloquy-image-1779" class="soliloquy-image soliloquy-image-2" src="uploads/sites/15/2013/07/Jobify-App-Slide-One.png" alt="Job Searching Just Got Easy"/>
									</a>
								</div>
								<div class="soliloquy-caption-wrap">
									<div class="soliloquy-caption">
										<div class="soliloquy-caption-inside">
											<h2 class="soliloquy-caption-title">Job Searching Just Got Easy</h2>
											<p>The expression day job is often used for a job one works in to make ends meet while performing low-paying (or non-paying) work in their preferred vocation. Archetypical examples of this are the woman who works as a waitress (her day job) while she tries to become an actress, and the professional athlete who works as a laborer in the off season because he is currently only able to make the roster of a semi-professional team.</p>
											<p>
												<a href="http://themeforest.net/item/jobify-job-board-wordpress-theme/5247604?ref=Astoundify" class="button-secondary">Download Now</a>
											</p>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
<noscript><style type="text/css">#soliloquy-container-2383{opacity:1}</style></noscript>	
<style>#jobify_widget_slider-3{background-image:url(https://demo.astoundify.com/jobify-darker/wp-content/uploads/sites/16/2013/07/xApp-Slider-BG.jpg.pagespeed.ic.D38R57rwiN.jpg);background-size:cover}</style>
				</section> -->
				<!-- <section id="jobify_widget_price_table_wc-3" class="homepage-widget jobify_widget_price_table_wc">
					<div class="container">
						<h3 class="homepage-widget-title">Job Plans &amp; Pricing</h3>
							<p class="homepage-widget-description">Great exposure for your job opening. Trusted by companies big and small around the globe.</p>
							<div class="row pricing-table-wrapper" data-columns>
								<div class="pricing-table-widget-wrapper">
									<div class="pricing-table-widget">
										<div class="pricing-table-widget-title">Start Up</div>
										<div class="pricing-table-widget-description">
											<h2><span class="amount">&#36;29</span></h2>
											<p>
												<span class="rcp_level_duration">
												<span class="amount">&#36;29</span> for 1 job listed for 30 days</span>
											</p>
											<p>
												One Time Fee<br/>
												Allows 1 Job Posting<br/>
												Non-Highlighted Post
											</p>
											<p>
												<a href="index4e39.html?add-to-cart=2536" class="button-secondary">Add to Cart</a>
											</p>
										</div>
									</div>
								</div>
								<div class="pricing-table-widget-wrapper">
									<div class="pricing-table-widget">
										<div class="pricing-table-widget-title">Enterprise</div>
										<div class="pricing-table-widget-description">
											<h2><span class="amount">&#36;89</span></h2>
											<p>
												<span class="rcp_level_duration">
												<span class="amount">&#36;89</span> for 5 jobs listed for 90 days</span>
											</p>
											<p>
												One Time Fee<br/>
												Allows 5 Job Postings<br/>
												Job Highlighted<br/>
												Job Post Posted For 90 Days<br/>
												Spotlighted Company Post
											</p>
											<p>
												<a href="index93ec.html?add-to-cart=2534" class="button-secondary">Add to Cart</a>
											</p>
										</div>
									</div>
								</div>
								<div class="pricing-table-widget-wrapper">
									<div class="pricing-table-widget">
										<div class="pricing-table-widget-title">Company</div>
										<div class="pricing-table-widget-description">
											<h2><span class="amount">&#36;59</span></h2>
											<p>
												<span class="rcp_level_duration">
												<span class="amount">&#36;59</span> for 2 jobs listed for 30 days</span>
											</p>
											<p>
												One Time Fee<br/>
												Allows 2 Job Postings<br/>
												Highlighted Job Post<br/>
												Posted For 30 Days
											</p>
											<p>
												<a href="index60d0.html?add-to-cart=2535" class="button-secondary">Add to Cart</a>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section> -->
					<section id="jobify_widget_callout-2" class="homepage-widget jobify_widget_callout">
						<div class="callout container">
							<div class="callout-description">
								<p>We give you 30 days free post job access, so you can take some time to find the best plan for you. Start your free trial today, no credit card is required.</p>
							</div>
							<div class="callout-action">
								<a href="<?php echo base_url( 'index.php/common/employer' ); ?>" class="button">POST A JOB NOW!</a>
							</div>
						</div>
					</section>
					<!-- <section id="jobify_widget_price_table_wc-4" class="homepage-widget jobify_widget_price_table_wc">
						<div class="container">
							<h3 class="homepage-widget-title">Resume Plans &amp; Pricing</h3>
							<p class="homepage-widget-description">Post your resume on our site and get maximum exposure for your resume.</p>
							<div class="row pricing-table-wrapper" data-columns>
								<div class="pricing-table-widget-wrapper">
									<div class="pricing-table-widget">
										<div class="pricing-table-widget-title">Intern Package</div>
										<div class="pricing-table-widget-description">
											<h2><span class="amount">&#36;39</span></h2>
											<p>
												<span class="rcp_level_duration">
												<span class="amount">&#36;39</span> for 1 job listed for 60 days</span>
											</p>
											<p>
												One Time Fee<br/>
												Allows 1 Resume Posting<br/>
												Non-Highlighted Post
											</p>
											<p>
												<a href="indexab6a.html?add-to-cart=4224" class="button-secondary">Add to Cart</a>
											</p>
										</div>
									</div>
									</div>
									<div class="pricing-table-widget-wrapper">
										<div class="pricing-table-widget">
											<div class="pricing-table-widget-title">Elite Package</div>
											<div class="pricing-table-widget-description">
												<h2><span class="amount">&#36;199</span></h2>
												<p>
													<span class="rcp_level_duration">
													<span class="amount">&#36;199</span> for 1 job listed for 365 days</span>
												</p>
												<p>
													One Time Fee<br/>
													Posted For One Year<br/>
													Allows 1 Resume Posting<br/>
													Featured Highlighted Resume<br/>
													Visible To All Employers
												</p>
												<p>
													<a href="indexffb7.html?add-to-cart=4228" class="button-secondary">Add to Cart</a>
												</p>
											</div>
										</div>
									</div>
									<div class="pricing-table-widget-wrapper">
										<div class="pricing-table-widget">
											<div class="pricing-table-widget-title">Professional Package</div>
											<div class="pricing-table-widget-description">
												<h2><span class="amount">&#36;79</span></h2>
												<p>
													<span class="rcp_level_duration">
													<span class="amount">&#36;79</span> for 1 job listed for 190 days</span>
												</p>
												<p>
													One Time Fee<br/>
													Shown For 190 Days<br/>
													Allows 1 Resume Posting<br/>
													Featured Highlighted Resume
												</p>
												<p>
													<a href="indexd0f6.html?add-to-cart=4225" class="button-secondary">Add to Cart</a>
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section> -->
						<!-- <section id="jobify_widget_blog_posts-2" class="homepage-widget jobify_widget_blog_posts">
							<div class="container">
								<h3 class="homepage-widget-title">Recent News Articles</h3>
								<p class="homepage-widget-description">Fresh job related news content posted each day.</p>
								<div class="content-grid row">
									<article id="post-1862" class="post-1862 post type-post status-publish format-standard has-post-thumbnail hentry category-developement category-news category-uncategorized col-md-4 col-sm-12">
										<header class="entry-header">
											<a href="canada-adds-12500-jobs-in-modest-july-rebound-which-is-a-good-sign/index.html" rel="bookmark" class="featured-image"><span class="overlay"><i class="icon-plus"></i></span> <img width="400" height="200" src="uploads/sites/15/2013/07/400x200xStocksy_txp298923c8NG0000_Medium_52139-400x200.jpg.pagespeed.ic.3tPQGhCbKf.jpg" class="attachment-content-grid wp-post-image" alt="Woman Shopping at the Open Market"/></a>
											<h1 class="entry-title">
												<a href="canada-adds-12500-jobs-in-modest-july-rebound-which-is-a-good-sign/index.html" rel="bookmark">Canada adds 12,500 jobs in modest July rebound, good times ahead?</a>
											</h1>
											<div class="entry-meta">
												July 22, 2013	<span class="comments-link">
												|
												<a href="canada-adds-12500-jobs-in-modest-july-rebound-which-is-a-good-sign/index.html#comments" title="Comment on Canada adds 12,500 jobs in modest July rebound, good times ahead?">3 Comments</a>	</span>
											</div>
										</header>
										<div class="entry">
											<div class="entry-summary">
												<p>A job is a regular activity performed in exchange for payment. A person usually begins a job by becoming an employee, volunteering, or starting a business. The duration of a job may range from an hour (in the case of odd jobs) to a lifetime (in the case of some judges). If a person is</p>
												<p><a href="canada-adds-12500-jobs-in-modest-july-rebound-which-is-a-good-sign/index.html" rel="bookmark" class="button button-medium">Continue Reading</a></p>
											</div>
										</div>
									</article>
									<article id="post-1863" class="post-1863 post type-post status-publish format-standard has-post-thumbnail hentry category-developement category-news category-uncategorized col-md-4 col-sm-12">
										<header class="entry-header">
											<a href="middle-class-jobs-are-being-replaced-by-burger-flipping-retail-sales-low-pay-jobs-4/index.html" rel="bookmark" class="featured-image"><span class="overlay"><i class="icon-plus"></i></span> <img width="400" height="200" src="uploads/sites/15/2013/07/400x200xStocksy_txp7eacb532l60000_Medium_30583-400x200.jpg.pagespeed.ic.-43hCdJar0.jpg" class="attachment-content-grid wp-post-image" alt="Stocksy_txp7eacb532l60000_Medium_30583"/></a>
											<h1 class="entry-title">
												<a href="middle-class-jobs-are-being-replaced-by-burger-flipping-retail-sales-low-pay-jobs-4/index.html" rel="bookmark">Middle Class jobs are being replaced by burger-flipping, retail sales, low-pay jobs</a>
											</h1>
											<div class="entry-meta">
												July 22, 2013	<span class="comments-link">
												|
												<a href="middle-class-jobs-are-being-replaced-by-burger-flipping-retail-sales-low-pay-jobs-4/index.html#respond" title="Comment on Middle Class jobs are being replaced by burger-flipping, retail sales, low-pay jobs">0 Comments</a>	</span>
											</div>
										</header>
										<div class="entry">
											<div class="entry-summary">
												<p>A job is a regular activity performed in exchange for payment. A person usually begins a job by becoming an employee, volunteering, or starting a business. The duration of a job may range from an hour (in the case of odd jobs) to a lifetime (in the case of some judges). If a person is</p>
												<p><a href="middle-class-jobs-are-being-replaced-by-burger-flipping-retail-sales-low-pay-jobs-4/index.html" rel="bookmark" class="button button-medium">Continue Reading</a></p>
											</div>
										</div>
									</article>
									<article id="post-1864" class="post-1864 post type-post status-publish format-standard has-post-thumbnail hentry category-developement category-news category-uncategorized col-md-4 col-sm-12">
										<header class="entry-header">
											<a href="fitness-industry-leading-the-charge-on-hiring-in-the-uk-and-ireland/index.html" rel="bookmark" class="featured-image"><span class="overlay"><i class="icon-plus"></i></span> <img width="400" height="200" src="uploads/sites/15/2013/07/400x200xStocksy_txp15d4e891770000_Medium_28012-400x200.jpg.pagespeed.ic.Xu4TOMlkb8.jpg" class="attachment-content-grid wp-post-image" alt="Stocksy_txp15d4e891770000_Medium_28012"/></a>
											<h1 class="entry-title">
												<a href="fitness-industry-leading-the-charge-on-hiring-in-the-uk-and-ireland/index.html" rel="bookmark">Fitness industry leading the charge on hiring in the UK and Ireland</a>
											</h1>
											<div class="entry-meta">
												July 22, 2013	<span class="comments-link">
												|
												<a href="fitness-industry-leading-the-charge-on-hiring-in-the-uk-and-ireland/index.html#comments" title="Comment on Fitness industry leading the charge on hiring in the UK and Ireland">1 Comment</a>	</span>
											</div>
										</header>
										<div class="entry">
											<div class="entry-summary">
												<p>A job is a regular activity performed in exchange for payment. A person usually begins a job by becoming an employee, volunteering, or starting a business. The duration of a job may range from an hour (in the case of odd jobs) to a lifetime (in the case of some judges). If a person is</p>
												<p><a href="fitness-industry-leading-the-charge-on-hiring-in-the-uk-and-ireland/index.html" rel="bookmark" class="button button-medium">Continue Reading</a></p>
											</div>
										</div>
									</article>
								</div>
							</div>
						</section> -->
					</div>
				</div>
			</div>
			
