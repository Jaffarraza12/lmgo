<div id="main" class="site-main">
<header class="page-header">
<h1 class="page-title"><?php echo $heading; ?></h1>
<div class="loginUser">Logged in as: <strong><?php echo $loginUser['email']; ?></strong></div>
</header>
<div id="primary" class="content-area">
<div id="content" class="container" role="main">
	<div class="recent-jobs  has-spotlight col-lg-4 col-md-4 col-sm-12" style="margin: 30px 0px;">
	
		<div class="job_listings">			
			<ul class="job_listings">	
				<?php foreach ( $dashboardMenu as $key => $value ) : ?>
				<li id="job_listing-8" class="post-8 job_listing type-job_listing status-publish has-post-thumbnail hentry job-type-part-time job_position_featured">
					<a href="<?php echo $value; ?>"><?php echo $key; ?></a>
				</li>
				<?php endforeach;?>
			</ul>
		</div>
	
	</div>

	<div class="recent-jobs has-spotlight col-lg-8 col-md-8 col-sm-12">
	
		<div class="job_listings">
			<h2></h2>
			<form  action="<?php echo $formAction; ?>" method="get">
			<div class="search_jobs">
				<div class="search_keywords" style="width: 45%;">
					<label for="search_keywords">Keywords</label>
					<input type="text" name="search_keywords" id="search_keywords" placeholder="Keywords" value=""/>
				</div>			
				<div class="search_categories" style="width: 34%;">
					<label for="search_categories">Country</label>
					<select name='country_id' id='country_id' class='postform'>
						<option value=''>Country</option>
						<?php foreach ( $country as $ctry ): ?>
						<option value="<?php echo $ctry->country_id; ?>"><?php echo $ctry->en_title; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="search_submit">
				<input type="submit" name="submit" value="Search"/>
				</div>
				<input type="hidden" name="search_region" class="search_region" value=""/>
			</div>
			</form>
				<ul class="job_listings">
				<?php 
				foreach ( $jobs as $job ) :	
				?>
				<li id="job_listing-8" class="post-8 job_listing type-job_listing status-publish has-post-thumbnail hentry job-type-part-time job_position_featured" data-longitude="<?php echo $job->longitube; ?>" data-latitude="<?php echo $job->latitude; ?>" data-title="<?php echo $job->title; ?> at <?php echo $job->employer_name; ?>" data-href="<?php echo base_url( 'index.php/common/home/jobs_details/' . $job->job_id ); ?>">
					<div class="row">
						<a href="<?php echo base_url( 'index.php/common/home/jobs_details/' . $job->job_id ); ?>" class="job_listing-link">
							<div class="logo col-sm-2 col-md-1 col-lg-1">
								<img class="company_logo" src="<?php echo base_url();?>uploads/sites/15/2013/07/xdrop-box.png.pagespeed.ic.xo6NVwlv7j.png" alt="Amazon"/>	
							</div>
							<div class="position col-xs-12 col-sm-10 col-md-6 col-lg-5">
								<h3><?php echo $job->title; ?></h3>
								<div class="company">
									<strong><?php echo $job->employer_name; ?></strong> 
								</div>
							</div>
							<div class="location col-xs-12 col-md-5 col-lg-4"><?php echo $job->city_name; ?></div>
							<ul class="meta col-lg-2">
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
								<li class="date"><date><?php echo date('d M Y', $job->sts); ?></date></li>
							</ul>
						</a>
					</div>
				</li>
				
				<?php endforeach; ?>
				</ul>
		</div>
		
	
	</div>
</div>
</div>
</div>