<div id="main" class="site-main">
<header class="page-header">
<h1 class="page-title"><?php echo $heading; ?></h1>
<div class="loginUser">Logged in as: <strong><?php echo $loginUser['email']; ?></strong></div>
</header>
<div id="primary" class="content-area">
<div id="content" class="container" role="main">
<article id="post-3019" class="post-3019 page type-page status-publish hentry">
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
<div class="entry-content col-lg-8 col-md-8 col-sm-12">
<div style="border:0px solid red; text-align: center;">
<?php 
echo $message;
echo $this->session->flashdata('message'); 
?>
</div>
<form action="<?php echo $formAction; ?>" method="post" id="submit-resume-form" class="job-manager-form" enctype="multipart/form-data">
<fieldset class="fieldset-resume_content">
<label for="">Your Suggestion</label>
<div class="field">
<textarea class="wp-editor-area" rows="8" cols="40" name="suggestion" id="suggestion"></textarea>
</div>
</fieldset>
<p>
<input type="submit" name="submit_resume" class="button" value="Submit"/>
</p>
</form>
</div>
</article>
</div>
</div>
</div>


<script type='text/javascript'>var resume_manager_resume_submission={"i18n_navigate":"If you wish to edit the posted details use the \"edit resume\" button instead, otherwise changes may be lost."};</script>
<script src="<?php echo base_url(); ?>assets/plugins/wp-job-manager-resumes%2c_assets%2c_js%2c_resume-submission.min.js%2cqver%3d%3d1.8.0%2bwp-job-manager%2c_assets%2c_js%2c_term-multiselect.min.js%2cqver%3d%3d1.20.1.pagespeed.jc.L7Wrd1QYTk.js"></script><script>eval(mod_pagespeed_x4R3RQoVbh);</script>
<script>eval(mod_pagespeed_C4CYkUWCkx);</script>
<script type='text/javascript' src='<?php echo base_url(); ?>assets/javascript/jquery/ui/sortable.min.js%2cqver%3d1.11.2.pagespeed.jm.zXyyDq8hJ2.js'></script>

	
