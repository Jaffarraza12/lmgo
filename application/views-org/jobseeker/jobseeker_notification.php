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
			<h2></h2>			
			
			<?php if( sizeof($listing) > 0 ) : ?>
			
			<ul class="job_listings">
			
			<?php foreach ( $listing as $rec ): ?>
			
				<?php echo $rec; ?>
			
			<?php endforeach; ?>
			
			</ul>
			
			<?php else : ?>
			
			<h2>No Notification</h2>	
						
			<?php endif; ?>
		</div>
		
	
	</div>
</div>
</div>
</div>