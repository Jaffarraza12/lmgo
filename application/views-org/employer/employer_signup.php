<?php if ($type == 'register'): ?>

<div id="main" class="site-main">
<header class="page-header">
<h1 class="page-title"><?php echo $heading; ?></h1>
</header>
<div id="primary" class="content-area">
<div id="content" class="container" role="main">
<article id="post-3019" class="post-3019 page type-page status-publish hentry">
<div class="entry-content">
<div style="border:0px solid red; text-align: center;">
<?php if( $this->session->flashdata('message') == 'Employer Registration Successfull' || $this->session->flashdata('message') == 'Profile Updated Successfully'): ?>
	<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('message'); ?></div>
<?php endif; ?>
<?php if( $this->session->flashdata('message') == 'Employer Already exist'): ?>
	<div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('message'); ?></div>
<?php endif; ?>
<?php echo $message?>
</div>
<form action="<?php echo $formAction; ?>" method="post" id="submit-resume-form" class="job-manager-form" enctype="multipart/form-data">
<fieldset>
<label>Have an account?</label>
<div class="field account-sign-in">
<a class="button" href="<?php echo base_url( 'index.php/common/employer/employer_login' ); ?>">Sign in</a>
If you don&rsquo;t have an account you can create one below by entering your details.
</div>
</fieldset>
<fieldset class="fieldset-candidate_email">
<label for="candidate_email">Company Email ID</label>
<div class="field">
<input type="email" class="input-text" name="candidate_email" id="candidate_email" placeholder="you@yourdomain.com" value="<?php echo set_value('candidate_email'); ?>" maxlength="" />
</div>
</fieldset>
<fieldset class="fieldset-candidate_password">
<label for="candidate_password">Password</label>
<div class="field">
<input type="password" class="input-text" name="candidate_password" id="candidate_password" placeholder="Password" value="<?php echo set_value('candidate_password'); ?>" maxlength="" required />
</div>
</fieldset>
<fieldset class="fieldset-candidate_password">
<label for="candidate_password">Confirm Password</label>
<div class="field">
<input type="password" class="input-text" name="candidate_confirm_password" id="candidate_confirm_password" placeholder="Confirm Password" value="<?php echo set_value('candidate_confirm_password'); ?>"  maxlength="" required />
</div>
</fieldset>
<fieldset class="fieldset-candidate_name">
<label for="candidate_name">Company name</label>
<div class="field">
<input type="text" class="input-text" name="candidate_name" id="candidate_name" placeholder="Company name" value="<?php echo set_value('candidate_name'); ?>" maxlength="" required />
</div>
</fieldset>
<fieldset class="fieldset-candidate_name">
<label for="">Company Phone</label>
<div class="field">
<input type="text" class="input-text" name="phone" id="phone" placeholder="Company Phone" value="<?php echo set_value('phone'); ?>" maxlength="" required />
</div>
</fieldset>
<fieldset class="fieldset-resume_content">
<label for="">Company Description</label>
<div class="field">
<textarea class="wp-editor-area" rows="8" cols="40" name="company_description" id="company_description"><?php echo set_value('company_description'); ?></textarea>
</div>
</fieldset>
<fieldset class="fieldset-resume_file">
<label for="resume_file">Company Logo</label>
<div class="field">
<input type="file" class="input-text" name="logo" id="logo" placeholder=""/>
<small class="description"><br>
* Only .Gif, .Jpeg, .Jpg or .Png files are allowed. <br> 
* File size must be under 1 MB 	</small>	</div>
</fieldset>
<p>
<input type="submit" name="submit_resume" class="button" value="Submit"/>
</p>
</form>
</div>
</article>
<div class="row">
<div id="comments" class="comments-area col-md-9 col-md-offset-3">
</div>
</div>	</div>
<div class="paginate-links container">
</div>
</div>
</div>

<?php else : ?>

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
<?php if( $this->session->flashdata('message') == 'Employer Registration Successfull' || $this->session->flashdata('message') == 'Profile Updated Successfully'): ?>
	<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('message'); ?></div>
<?php endif; ?>
<?php if( $this->session->flashdata('message') == 'Employer Already exist'): ?>
	<div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('message'); ?></div>
<?php endif; ?>
<?php echo $message?>
</div>
<form action="<?php echo $formAction; ?>" method="post" id="submit-resume-form" class="job-manager-form" enctype="multipart/form-data">
<input type="hidden" name="eid" value="<?php echo $loginUser['employer_id']; ?>">
<fieldset class="fieldset-candidate_email">
<label for="candidate_email">Company Email ID</label>
<div class="field">
<input type="email" class="input-text" name="candidate_email" id="candidate_email" placeholder="you@yourdomain.com" value="<?php echo $record->email; ?>" readonly="readonly"  />
</div>
</fieldset>
<fieldset class="fieldset-candidate_password">
<label for="candidate_password">Password</label>
<div class="field">
<input type="password" class="input-text" name="candidate_password" id="candidate_password" placeholder="Password" value="" maxlength="" />
</div>
</fieldset>
<fieldset class="fieldset-candidate_password">
<label for="candidate_password">Confirm Password</label>
<div class="field">
<input type="password" class="input-text" name="candidate_confirm_password" id="candidate_confirm_password" placeholder="Confirm Password" value=""  maxlength="" />
</div>
</fieldset>
<fieldset class="fieldset-candidate_name">
<label for="candidate_name">Company name</label>
<div class="field">
<input type="text" class="input-text" name="candidate_name" id="candidate_name" placeholder="Company name" value="<?php echo $record->account_name; ?>" maxlength="" required />
</div>
</fieldset>
<fieldset class="fieldset-candidate_name">
<label for="">Company Phone</label>
<div class="field">
<input type="text" class="input-text" name="phone" id="phone" placeholder="Company Phone" value="<?php echo $record->account_phone; ?>" maxlength="" />
</div>
</fieldset>
<fieldset class="fieldset-resume_content">
<label for="">Company Description</label>
<div class="field">
<textarea class="wp-editor-area" rows="8" cols="40" name="company_description" id="company_description"><?php echo $record->description; ?></textarea>
</div>
</fieldset>
<fieldset class="fieldset-resume_file">
<label for="resume_file">Company Logo</label>
<div class="field">
<input type="file" class="input-text" name="logo" id="logo" placeholder=""/>
<small class="description"><br>
* Only .Gif, .Jpeg, .Jpg or .Png files are allowed. <br> 
* File size must be under 1 MB 	</small>	
<div style="float: right;  width: 120px;  height: 120px;">
	<img alt="" src="<?php echo base_url( 'uploads/employer/' . $record->logo ); ?>">
</div>
</div>
</fieldset>
<p>
<input type="submit" name="submit_resume" class="button" value="Submit"/>
</p>
</form>
</div>
</article>
<div class="row">
<div id="comments" class="comments-area col-md-9 col-md-offset-3">
</div>
</div>	</div>
<div class="paginate-links container">
</div>
</div>
</div>

<?php endif; ?>




<script type='text/javascript'>var resume_manager_resume_submission={"i18n_navigate":"If you wish to edit the posted details use the \"edit resume\" button instead, otherwise changes may be lost."};</script>
<script src="<?php echo base_url(); ?>assets/plugins/wp-job-manager-resumes%2c_assets%2c_js%2c_resume-submission.min.js%2cqver%3d%3d1.8.0%2bwp-job-manager%2c_assets%2c_js%2c_term-multiselect.min.js%2cqver%3d%3d1.20.1.pagespeed.jc.L7Wrd1QYTk.js"></script><script>eval(mod_pagespeed_x4R3RQoVbh);</script>
<script>eval(mod_pagespeed_C4CYkUWCkx);</script>
<script type='text/javascript' src='<?php echo base_url(); ?>assets/javascript/jquery/ui/sortable.min.js%2cqver%3d1.11.2.pagespeed.jm.zXyyDq8hJ2.js'></script>

	
