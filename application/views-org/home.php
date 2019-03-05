	<script>
/*
 * This example enables Sign In by loading the Maps API with the signed_in
 * parameter set to true. For example:
 *
 * https://maps.googleapis.com/maps/api/js?signed_in=true&v=3.exp
 *
 */

function initialize() {
 var locations = [<?php echo $MapQuery; ?>];
  var mapOptions = {
    zoom: 4,
    scrollwheel: false,
    center: {lat: 26.3302826, lng: 69.9235848}
  };
  var map = new google.maps.Map(document.getElementById('job_listing-map-canvas'), mapOptions);


  var infowindow = new google.maps.InfoWindow();

  var marker, i;

  for (i = 0; i < locations.length; i++) {  
    marker = new google.maps.Marker({
      position: new google.maps.LatLng(locations[i][1], locations[i][2]),
      map: map,
      icon: '<?php echo base_url('uploads/marker.png')?>'
    });

    google.maps.event.addListener(marker, 'click', (function(marker, i) {
      return function() {
        infowindow.setContent(locations[i][0]);
        infowindow.open(map, marker);
      }
    })(marker, i));
  }
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>    
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
								<h3 class="homepage-widget-title">Recent Jobs</h3>
								<div class="job_listings" data-location="" data-keywords="" data-show_filters="false" data-show_pagination="false" data-per_page="5" data-orderby="featured" data-order="DESC" data-categories="">
									<form class="job_filters">
										<ul class="job_types" style="border-width:1px;">
                                            <?php foreach($job_types as $type){ ?>
                                                <li><label for="job_type_<?php echo $type->name ?>" class="<?php echo $type->name ?>"><input type="checkbox" class="fcheck" name="filter_job_type[]" value="<?php echo $type->job_type_id ?>" checked='checked' id="job_type_<?php echo $type->name ?>" /> <?php echo $type->name ?></label></li>
                                            <?php } ?>
                                    	</ul>
										<input type="hidden" name="filter_job_type[]" value=""/>
										<div style="clear: both;height: 10px;" class="clear"></div>
									</form>
									<ul class="job_listings">
										<?php 
										foreach ( $jobs as $job ) :	
										?>
										<li id="job_listing-8" class="post-8 job_listing type-job_listing status-publish has-post-thumbnail hentry job-type-part-time job_position_featured" data-longitude="<?php echo $job->longitube; ?>" data-latitude="<?php echo $job->latitude; ?>" data-title="<?php echo $job->title; ?> at <?php echo $job->employer_name; ?>" data-href="<?php echo base_url( 'index.php/common/home/jobs_details/' . $job->job_id ); ?>">
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
									<a class="load_more_jobs" href="index.php/common/home/jobs"><strong>Load more listings</strong></a>
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
                <?php if($employers){ ?>
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
                                        <?php foreach($employers as $employer){?>
                                            <div class="company-slider-item">
                                                <a href="<?php echo base_url('index.php/common/home/company_details/'.$employer->employer_id) ?>" class="avatar-link">
                                                    <img width="1" height="1" src="<?php echo base_url().'/uploads/employer/'.$employer->logo ?>" class="avatar wp-post-image" alt="campaignify-logo-big"/>
                                                </a>
                                            </div>

                                        <?php } ?>
									</div>
									<div class="fix"></div>
								</div>
							</div>
						</div>
					</div>
				</section>
                <?php } ?>

                <?php if(testomonials) { ?>
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
									 <?php $i=0;
                                     foreach($testomonials as $test  ) { ?>
                                        <blockquote id="quote-<?php echo $test->testo_id  ?>" class="individual-testimonial quote <?php echo ($i == 0 ) ? 'first' : '' ?>">
											<p><?php echo $test->message ?></p>
											<cite class="individual-testimonial-author">
												<img alt='' src='<?php echo base_url().'uploads/testomonials/'.$test->picture  ?>' class='avatar avatar-70 photo' height='70' width='70'/>
												<cite class="author" itemprop="author" itemscope itemtype="http://schema.org/Person">
													<span itemprop="name"><?php echo $test->name  ?></span>
												</cite>
											</cite>
										</blockquote>
                                     <?php ++$i; } ?>

									</div>
									<div class="fix"></div>
								</div>
							</div>
						</div>
					</div>
				</section>
                <?php } ?>


					</div>
				</div>
			</div>
			
