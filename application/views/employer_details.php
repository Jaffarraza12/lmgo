<div id="main" class="site-main">
	<header class="page-header">
		<h1 class="page-title">Jobs at <?php echo $details[0]->employer_name; ?></h1>
		<h2 class="page-subtitle">
			<strong><?php echo $postedJobs; ?> Job Available</strong>
		</h2>
	</header>
	<div id="primary" class="content-area">
		<div id="content" class="container" role="main">
			<div class="company-profile row">
				<div class="company-profile-jobs col-md-10 col-sm-8 col-xs-12">
					<div class="job_listings">
						<ul class="job_listings">

<?php foreach ( $details as $jobs ): ?>

							<li id="job_listing-3364"
								class="post-3364 job_listing type-job_listing status-publish hentry job-type-full-time">
								<div class="row">
									<a href="#"
										class="job_listing-link">
										<div class="logo col-sm-2 col-md-1 col-lg-1">
											<img class="company_logo"
												src="<?php echo base_url( 'uploads/employer/' . $jobs->logo ); ?>"
												alt="<?php echo $jobs->employer_name;?>" />
										</div>
										<div class="position col-xs-12 col-sm-10 col-md-6 col-lg-5">
											<h3>Graphic/Web Designer</h3>
											<div class="company">
												<strong><?php echo $jobs->employer_name;?></strong>
											</div>
										</div>
										<div class="location col-xs-12 col-md-5 col-lg-4"><?php echo $jobs->city_name; ?></div>
										<ul class="meta col-lg-2">
											<?php if( $jobs->job_typ == 'Part Time' ) : ?>
												<li class="job-type part-time"><?php echo $jobs->job_typ; ?></li>
											<?php elseif( $jobs->job_typ == 'Full Time' ) : ?>
												<li class="job-type full-time"><?php echo $jobs->job_typ; ?></li>
											<?php elseif( $jobs->job_typ == 'Internship' ) : ?>
												<li class="job-type part-time"><?php echo $jobs->job_typ; ?></li>
											<?php elseif( $jobs->job_typ == 'Contract' ) : ?>
												<li class="job-type part-time"><?php echo $jobs->job_typ; ?></li>
											<?php elseif( $jobs->job_typ == 'Temporary' ) : ?>
												<li class="job-type temporary"><?php echo $jobs->job_typ; ?></li>
											<?php elseif( $jobs->job_typ == 'time to time' ) : ?>
												<li class="job-type part-time"><?php echo $jobs->job_typ; ?></li>
											<?php endif; ?>
											<li class="date"><date>Posted on <?php echo date('d M Y', $jobs->sts); ?></date></li>
										</ul>
									</a>
								</div>
							</li>
<?php endforeach; ?>

						</ul>
					</div>
					<div class="job-overview-content row">
					<div itemprop="description" class="job-overview col-md-12 col-sm-12">
						<h2>Company Description</h2>
						<p style="width: 920px !important;overflow: hidden;"><?php echo $details[0]->description; ?></p>								
					</div>					
				</div>
				</div>				
				<div
					class="company-profile-info job-meta col-md-2 col-sm-4 col-xs-4">
					<article class="job_listing-widget default-widget">
						<img class="company_logo"
							src="<?php echo base_url( 'uploads/employer/' . $details[0]->logo ); ?>"
							alt="<?php echo $details[0]->employer_name; ?>" />
					</article>
					<article class="job_listing-widget default-widget">
<!-- 						<h3 class="job_listing-widget-title">Company Details</h3> -->
						<ul class="company-social">
							<li><a href="#" itemprop="url"> <i class="icon-link"></i> Website
							</a></li>
						</ul>
					</article>

				</div>
			</div>
		</div>
		<div class="paginate-links container"></div>
	</div>
</div>