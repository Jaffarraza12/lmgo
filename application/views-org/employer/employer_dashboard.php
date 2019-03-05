<div id="main" class="site-main">
<header class="page-header">
<h1 class="page-title"><?php echo $heading; ?></h1>
<div class="loginUser">Logged in as: <strong><?php echo $loginUser['email']; ?></strong></div>
</header>
<div id="primary" class="content-area">
<div id="content" class="container" role="main">
	<div class="recent-jobs  has-spotlight col-lg-4 col-md-4 col-sm-12" style="margin: 50px 0px;">
	
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
			<h2>Posted Jobs</h2>			
			<?php if ( sizeof($record) == 0 ): ?>
				
			<h2>No Record Found</h2>
			
			<?php else: ?>
			
			<ul class="job_listings">
			<?php foreach ( $record as $r ) : ?>
			<li id="job_listing-8" class="post-8 job_listing type-job_listing status-publish has-post-thumbnail hentry job-type-part-time job_position_featured">
				<div class="row">			
					<div class="position col-xs-12 col-sm-10 col-md-6 col-lg-5">
						<h3><?php echo $r->title; ?></h3>						
					</div>
					<div class="location col-xs-12 col-md-5 col-lg-4"><?php echo $r->city_name; ?></div>
					<ul class="meta col-lg-3">							
						<li class="job-type"><a href="<?php echo base_url('index.php/common/employer/view_candidates/' . $r->job_id ); ?>">View Candidates</a></li>
						<li class="date"><date style="display: block"><?php echo date('d M Y', $r->sts); ?></date></li>
					</ul>
				</div>
			</li>
			<?php endforeach; ?>
			</ul>
			<?php endif; ?>
		</div>
		
	
	</div>
</div>
</div>
</div>