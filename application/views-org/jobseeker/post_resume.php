<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>  

  
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.tokenize.css">
<script src="<?php echo base_url(); ?>assets/javascript/jquery.tokenize.js"></script>  
 
 
  <script>
  $(function() {    
    $( ".datepicker2" ).datepicker({
  	  dateFormat: "yy-mm-dd",
  	  changeYear: true,
  	  changeMonth: true,
  	  yearRange: "-60:+0"
  });
  });
  
  </script>

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
<?php if( $this->session->flashdata('message') == 'User Registration Successfull' || $this->session->flashdata('message') == 'Profile Updated Successfully'): ?>
	<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('message'); ?></div>
<?php endif; ?>


<?php if( !empty( $message ) ): ?>
	<div class="alert alert-danger" role="alert"><?php echo $message; ?></div>
<?php endif; ?>

</div>
<form action="<?php echo $formAction; ?>" method="post" id="submit-resume-form" class="job-manager-form" enctype="multipart/form-data">
<fieldset>
<label>Have an account?</label>
<div class="field account-sign-in">
<a class="button" href="<?php echo base_url( 'index.php/common/jobseeker/jobseeker_login' ); ?>">Sign in</a>
If you don&rsquo;t have an account you can create one below by entering your details.
</div>
</fieldset>
<fieldset class="fieldset-candidate_email">
<label for="candidate_email">Email <sup>*</sup></label><span id="loading3" style="float: right; display: none;"><i class="fa fa-refresh fa-spin"></i></span><span id="userMsg"  style="float: right;"></span>
<div class="field">
<input type="text" class="input-text" name="email" id="email" placeholder="you@yourdomain.com" value="<?php echo set_value('email'); ?>" maxlength="" required onblur="validateUser();" />
</div>
</fieldset>
<fieldset class="fieldset-candidate_password">
<label for="candidate_password">Password <sup>*</sup></label>
<div class="field">
<input type="password" class="input-text" name="pwd" id="pwd" placeholder="Password" value="<?php echo set_value('pwd'); ?>" maxlength="" required />
</div>
</fieldset>
<fieldset class="fieldset-candidate_password">
<label for="candidate_password">Confirm Password <sup>*</sup></label>
<div class="field">
<input type="password" class="input-text" name="conf_pwd" id="conf_pwd" placeholder="Confirm Password" value="<?php echo set_value('conf_pwd'); ?>" maxlength="" required />
</div>
</fieldset>
<fieldset class="fieldset-candidate_name">
<label for="candidate_name">First name <sup>*</sup></label>
<div class="field">
<input type="text" class="input-text" name="firstname" id="firstname" placeholder="First Name" value="<?php echo set_value('firstname'); ?>" maxlength="" required />
</div>
</fieldset>
<fieldset class="fieldset-candidate_name">
<label for="candidate_name">Last name <sup>*</sup></label>
<div class="field">
<input type="text" class="input-text" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo set_value('lastname'); ?>" maxlength="" required />
</div>
</fieldset>
<fieldset class="fieldset-candidate_name">
<label for="candidate_name">Cell # <sup>*</sup></label>
<div class="field">
<input type="text" class="input-text" name="cell" id="cell" placeholder="Cell #" value="<?php echo set_value('cell'); ?>" maxlength="" required />
</div>
</fieldset>
<fieldset class="fieldset-candidate_name">
<label for="candidate_name">Date of Birth <sup>*</sup></label>
<div class="field">
<input type="text" class="input-text datepicker2" name="dob" placeholder="" value="<?php echo set_value('dob');?>" />
</div>
</fieldset>
<!-- <fieldset class="fieldset-candidate_name">
<label for="candidate_name">Gender</label>
<div class="field">
<input type="radio" class="input-text" name="candidate_gender" id="candidate_gender" value="Male" checked="checked" /> Male
<input type="radio" class="input-text" name="candidate_gender" id="candidate_gender" value="Female" /> Female
</div>
</fieldset> -->
<fieldset class="fieldset-resume_content">
<label for="resume_content">Address</label>
<div class="field">
<textarea class="wp-editor-area" rows="8" cols="40" name="address" id="address"><?php echo set_value('address'); ?></textarea>
</div>
</fieldset>
<fieldset class="fieldset-resume_category">
<label>Country</label>
<div class="field">
<select name='country_id' id='country_id' class='job-manager-category-dropdown ' onchange="getCity('#country_id', '#city_id');">
	<option value="">Select Country</option>	
	<?php foreach ( $country as $ctry ): ?>
	<?php if( set_value('country_id') != '' ): ?>
	<option value="<?php echo $ctry->country_id; ?>" <?php echo ( $ctry->country_id == set_value('country_id') ) ? 'selected="selected"' : ''; ?> ><?php echo $ctry->en_title; ?></option>
	<?php endif; ?>
	<option value="<?php echo $ctry->country_id; ?>"><?php echo $ctry->en_title; ?></option>
	<?php endforeach; ?>
</select>
</div>
</fieldset>
<fieldset class="fieldset-resume_category">
<label for="">City / State</label><span id="loading" style="float: right; display: none;"><i class="fa fa-refresh fa-spin"></i></span>
<div class="field">
<select name='city_id' id='city_id' class='job-manager-category-dropdown '>
<option value="<?php echo set_value('city_id'); ?>"></option>
</select>
</div>
</fieldset>
<fieldset class="fieldset-resume_category">
<label for="">Current location</label>
<div class="field">
<select name='country_current_id' id='country_current_id' class='job-manager-category-dropdown '>
	<option value="">Select Current Location</option>
	<?php foreach ( $country as $ctry ): ?>
	<?php if( set_value('country_current_id') != '' ): ?>
	<option value="<?php echo $ctry->country_id; ?>" <?php echo ( $ctry->country_id == set_value('country_current_id') ) ? 'selected="selected"' : ''; ?> ><?php echo $ctry->en_title; ?></option>
	<?php endif; ?>
	<option value="<?php echo $ctry->country_id; ?>"><?php echo $ctry->en_title; ?></option>
	<?php endforeach; ?>
</select>
</div>
</fieldset>
<fieldset class="fieldset-resume_category">
<label for="resume_category">Employment Status</label>
<div class="field">
<select name='employer_status' id='employer_status' class='job-manager-category-dropdown '>
	<option value="">Select Employment Status</option>
	<?php foreach( $employmentStatus as $value ): ?>
	<?php if( set_value('employer_status') != '' ): ?>
	<option value="<?php echo $value; ?>" <?php echo ( $value == set_value('employer_status') ) ? 'selected="selected"' : ''; ?> ><?php echo $value; ?></option>
	<?php endif; ?>
	<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
	<?php endforeach; ?>
</select>
</div>
</fieldset>
<fieldset class="fieldset-candidate_name">
<label for="candidate_name">Notice Period</label>
<div class="field">
<select name='notice_period' id='notice_period' class='job-manager-category-dropdown '>
	<option value="">Select Notice Period</option>
	<?php foreach( $noticePeriod as $key ): ?>
	<?php if( set_value('notice_period') != '' ): ?>
	<option value="<?php echo $key; ?>" <?php echo ( $key == set_value('notice_period') ) ? 'selected="selected"' : ''; ?> ><?php echo $key; ?></option>
	<?php endif; ?>
	<option value="<?php echo $key; ?>"><?php echo $key; ?></option>
	<?php endforeach; ?>
</select>
</div>
</fieldset>
<fieldset class="fieldset-resume_category">
<label for="resume_category">Desired Job Type</label>
<div class="field">
<select name='job_type_id' id='job_type_id' class='job-manager-category-dropdown '>
	<option value="">Select Desired Job Type</option>
	<?php foreach ( $jobTypes as $jobT ): ?>
	<?php if( set_value('job_type_id') != '' ): ?>
	<option value="<?php echo $jobT->job_type_id; ?>" <?php echo ( $jobT->job_type_id == set_value('job_type_id') ) ? 'selected="selected"' : ''; ?> ><?php echo $jobT->name; ?></option>
	<?php endif; ?>
	<option value="<?php echo $jobT->job_type_id; ?>"><?php echo $jobT->name; ?></option>
	<?php endforeach; ?>
</select>
</div>
</fieldset>
<fieldset class="fieldset-resume_category">
<label for="resume_category">Current Industry</label>
<div class="field">
<select name='category_id' id='category_id' class='job-manager-category-dropdown ' onchange="subTypes('#category_id', '#tokenize');">
	<option value="">Select Current Industry</option>
	<?php foreach ( $category as $cat ): ?>
	<?php if( set_value('category_id') != '' ): ?>
	<option value="<?php echo $cat->category_id; ?>" <?php echo ( $cat->category_id == set_value('category_id') ) ? 'selected="selected"' : ''; ?> ><?php echo $cat->name; ?></option>
	<?php endif; ?>
	<option value="<?php echo $cat->category_id; ?>"><?php echo $cat->name; ?></option>
	<?php endforeach; ?>
</select>
</div>
</fieldset>
<fieldset class="fieldset-resume_category">
<label for="resume_category">Specialties</label><span id="loading2" style="float: right; display: none;"><i class="fa fa-refresh fa-spin"></i></span>
<div class="field">
<style>
.Tokenize{
width: 100%;
}
</style>
<select name='special_id[]' id="tokenize" multiple="multiple" class="tokenize-sample" class='job-manager-category-dropdown '>
</select>
<script type="text/javascript">
    $('#tokenize').tokenize();
</script>
</div>
</fieldset>
<fieldset class="fieldset-resume_category">
<label for="resume_category">Target Industry</label>
<div class="field">
<select name='target_category_id' id='target_category_id' class='job-manager-category-dropdown '>
	<option value="">Select Target Industry</option>
	<?php foreach ( $category as $cat ): ?>
	<?php if( set_value('target_category_id') != '' ): ?>
	<option value="<?php echo $cat->category_id; ?>" <?php echo ( $cat->category_id == set_value('target_category_id') ) ? 'selected="selected"' : ''; ?> ><?php echo $cat->name; ?></option>
	<?php endif; ?>
	<option value="<?php echo $cat->category_id; ?>"><?php echo $cat->name; ?></option>
	<?php endforeach; ?>
</select>
</div>
</fieldset>
<!-- <fieldset class="fieldset-resume_category">
<label for="resume_category">Functional Area</label>
<div class="field">
<select name='functional_area' id='functional_area' class='job-manager-category-dropdown '>
<option class="level-0" value="1">Full Time</option>
<option class="level-0" value="2">Part Time</option>
</select>
</div>
</fieldset> -->
<fieldset class="fieldset-resume_category">
<label for="resume_category">Target Jobs</label>
<div class="field">
<select name='target_job_type' id='target_job_type' class='tokenize-sample job-manager-category-dropdown'>
	<option value="">Select Target Job</option>
	<?php foreach ( $jobTypes as $jobT ): ?>
	<?php if( set_value('target_job_type') != '' ): ?>
	<option value="<?php echo $jobT->job_type_id; ?>" <?php echo ( $jobT->job_type_id == set_value('target_job_type') ) ? 'selected="selected"' : ''; ?> ><?php echo $jobT->name; ?></option>
	<?php endif; ?>
	<option value="<?php echo $jobT->job_type_id; ?>"><?php echo $jobT->name; ?></option>
	<?php endforeach; ?>
</select>
</div>
</fieldset>
<!-- <fieldset class="fieldset-resume_category">
<label for="resume_category">Target Country</label>
<div class="field">
<select name='target_country_id' id='target_country_id' class='job-manager-category-dropdown ' onchange="getCity('#target_country_id', '#target_city_id');">
	<option value="">Select Target Country</option>
	<?php foreach ( $country as $ctry ): ?>
	<option value="<?php echo $ctry->country_id; ?>"><?php echo $ctry->en_title; ?></option>
	<?php endforeach; ?>
</select>
</div>
</fieldset>
<fieldset class="fieldset-resume_category">
<label for="resume_category">Target City / State</label><span id="loading" style="float: right; display: none;"><i class="fa fa-refresh fa-spin"></i></span>
<div class="field">
<select name='target_city_id' id='target_city_id' class='job-manager-category-dropdown '>
	<option value="">Select Target City</option>
</select>
</div>
</fieldset> -->
<!-- <fieldset class="fieldset-resume_category">
<label for="resume_category">Acceptable Relocation</label>
<div class="field">
<select name='acceptable_relocation' id='acceptable_relocation' class='job-manager-category-dropdown '>
<option class="level-0" value="236">Business Management</option>
<option class="level-0" value="232">Designer</option>
<option class="level-0" value="233">Developer</option>
<option class="level-0" value="231">Finance</option>
<option class="level-0" value="237">Marketing</option>
<option class="level-0" value="238">Support</option>
</select>
</div>
</fieldset> -->
<fieldset class="fieldset-candidate_education">
<label for="candidate_education">Education <small>(optional)</small></label>
<div class="field">
<a href="#" class="resume-manager-add-row" id="addEdu" data-row="<?php echo $educationBox; ?>">+ Add Education</a>
</div>
</fieldset>
<fieldset class="fieldset-candidate_experience">
<label for="candidate_experience">Experience <small>(optional)</small></label>
<div class="field">
<a href="#" class="resume-manager-add-row" id="addExp" data-row="<?php echo $experienceBox; ?>">+ Add Experience</a>
</div>
</fieldset>
<!-- <fieldset class="fieldset-resume_category">
<label for="resume_category">Technical Skills <small>(optional)</small></label>
<div class="field">
<select name='skills[]' id='skills' class='job-manager-category-dropdown ' multiple='multiple' data-placeholder='Choose a skill&hellip;'>
<option class="level-0" value="236">Business Management</option>
<option class="level-0" value="232">Designer</option>
<option class="level-0" value="233">Developer</option>
<option class="level-0" value="231">Finance</option>
<option class="level-0" value="237">Marketing</option>
<option class="level-0" value="238">Support</option>
</select>
</div>
</fieldset> -->
<!-- <fieldset class="fieldset-resume_content">
<label for="resume_content">Covering Letter</label>
<div class="field">
<div id="wp-resume_content-wrap" class="wp-core-ui wp-editor-wrap html-active">
<div id="wp-resume_content-editor-container" class="wp-editor-container">
<textarea class="wp-editor-area" rows="8" cols="40" name="cover_letter" id="cover_letter"></textarea>
</div>
</div>
</div>
</fieldset> -->
<!-- <fieldset class="fieldset-candidate_photo">
<label for="candidate_photo">How do you know about us? <small>(optional)</small></label>
<div class="field">
<input type="radio" class="input-text" name="about_us" value="Search Engine" checked="checked"/> Search Engine <br>
<input type="radio" class="input-text" name="about_us" value="Referred by Someone" /> Referred by Someone <br>
<input type="radio" class="input-text" name="about_us" value="Our Staff" /> Our Staff <br>
<input type="radio" class="input-text" name="about_us" value="Our Project" /> Our Project <br>
<input type="radio" class="input-text" name="about_us" value="Emailer" /> Emailer
</div>
</fieldset> -->
<fieldset class="fieldset-resume_file">
<label for="resume_file">Attach Your Resume</label>
<div class="field">
<input type="file" class="input-text" name="resume_file" id="resume_file" placeholder=""/>
<small class="description"><br>
* Only .doc, .docx or .pdf files are allowed. <br> 
* File size must be under 1 MB 	</small>	</div>
</fieldset>
<fieldset class="fieldset-candidate_photo">
<label for="candidate_photo">Upload Your Picture</label>
<div class="field">
<input type="file" class="input-text" name="photo" id="photo" placeholder=""/>
<small class="description"><br>
* Only .Gif, .Jpg or .Png files are allowed. <br> 
* File size must be under 1 MB 	</small>	
</div>
</fieldset>
<!-- <fieldset class="fieldset-candidate_name">
<label for="candidate_name">Your Linkedin URL <small>(optional)</small></label>
<div class="field">
<input type="text" class="input-text" name="candidate_linkedin" id="candidate_linkedin" placeholder="Your Linkedin URL" value="" maxlength="" />
</div>
</fieldset> -->
<p>
<input type="submit" name="submit_resume" class="button" value="Submit"/>
</p>
</form>
</div>
</article>
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
<?php if( $this->session->flashdata('message') == 'User Registration Successfull' || $this->session->flashdata('message') == 'Profile Updated Successfully'): ?>
	<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('message'); ?></div>
<?php endif; ?>
<?php if( $this->session->flashdata('message') == 'User Already exist'): ?>
	<div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('message'); ?></div>
<?php endif; ?>
<?php echo $message?>
</div>
<form action="<?php echo $formAction; ?>" method="post" id="submit-resume-form" class="job-manager-form" enctype="multipart/form-data">
<fieldset class="fieldset-candidate_email">
<label for="candidate_email">Email</label>
<div class="field">
<input type="text" class="input-text" name="email" id="email" placeholder="you@yourdomain.com" value="<?php echo $record->email; ?>" maxlength="" readonly="readonly" />
</div>
</fieldset>
<fieldset class="fieldset-candidate_password">
<label for="candidate_password">Password</label>
<div class="field">
<input type="password" class="input-text" name="pwd" id="pwd" placeholder="Password" maxlength="" />
</div>
</fieldset>
<fieldset class="fieldset-candidate_password">
<label for="candidate_password">Confirm Password</label>
<div class="field">
<input type="password" class="input-text" name="conf_pwd" id="conf_pwd" placeholder="Confirm Password" maxlength="" />
</div>
</fieldset>
<fieldset class="fieldset-candidate_name">
<label for="candidate_name">First name</label>
<div class="field">
<input type="text" class="input-text" name="firstname" id="firstname" placeholder="First Name" value="<?php echo $record->firstname; ?>" maxlength="" required />
</div>
</fieldset>
<fieldset class="fieldset-candidate_name">
<label for="candidate_name">Last name</label>
<div class="field">
<input type="text" class="input-text" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo $record->lastname; ?>" maxlength="" required />
</div>
</fieldset>
<fieldset class="fieldset-candidate_name">
<label for="candidate_name">Cell #</label>
<div class="field">
<input type="text" class="input-text" name="cell" id="cell" placeholder="Cell #" value="<?php echo $record->cell; ?>" maxlength="" required />
</div>
</fieldset>
<fieldset class="fieldset-candidate_name">
<label for="candidate_name">Date of Birth</label>
<div class="field">
<input type="text" class="input-text datepicker2" name="dob" value="<?php echo date('Y-m-d', $record->dob); ?>" />
</div>
</fieldset>
<!-- <fieldset class="fieldset-candidate_name">
<label for="candidate_name">Gender</label>
<div class="field">
<input type="radio" class="input-text" name="candidate_gender" id="candidate_gender" value="Male" checked="checked" /> Male
<input type="radio" class="input-text" name="candidate_gender" id="candidate_gender" value="Female" /> Female
</div>
</fieldset> -->
<fieldset class="fieldset-resume_content">
<label for="resume_content">Address</label>
<div class="field">
<textarea class="wp-editor-area" rows="8" cols="40" name="address" id="address"><?php echo $record->address; ?></textarea>
</div>
</fieldset>
<fieldset class="fieldset-resume_category">
<label>Country</label>
<div class="field">
<select name='country_id' id='country_id' class='job-manager-category-dropdown ' onchange="getCity('#country_id', '#city_id');">
	<option value="">Select Country</option>
	<?php foreach ( $country as $ctry ): ?>
	<option value="<?php echo $ctry->country_id; ?>" <?php echo ( $record->country_id == $ctry->country_id ) ? 'selected="selected"' : ''; ?> ><?php echo $ctry->en_title; ?></option>
	<?php endforeach; ?>
</select>
</div>
</fieldset>
<fieldset class="fieldset-resume_category">
<label for="">City / State</label><span id="loading" style="float: right; display: none;"><i class="fa fa-refresh fa-spin"></i></span>
<div class="field">
<select name='city_id' id='city_id' class='job-manager-category-dropdown '>
<option value="<?php echo $record->city_id; ?>"><?php echo  $userCity->en_title;?></option>
</select>
</div>
</fieldset>
<fieldset class="fieldset-resume_category">
<label for="">Current location</label>
<div class="field">
<select name='country_current_id' id='country_current_id' class='job-manager-category-dropdown '>
	<option value="">Select Current Location</option>
	<?php foreach ( $country as $ctry ): ?>
	<option value="<?php echo $ctry->country_id; ?>" <?php echo ( $record->country_current_id == $ctry->country_id ) ? 'selected="selected"' : ''; ?> ><?php echo $ctry->en_title; ?></option>
	<?php endforeach; ?>
</select>
</div>
</fieldset>
<fieldset class="fieldset-resume_category">
<label for="resume_category">Employment Status</label>
<div class="field">
<select name='employer_status' id='employer_status' class='job-manager-category-dropdown '>
<option value="">Select Employment Status</option>
<?php foreach( $employmentStatus as $value ): ?>
<option value="<?php echo $value; ?>" <?php echo  ( $record->employer_status == $value ) ? 'selected="selected"' : ''; ?> ><?php echo $value; ?></option>
<?php endforeach; ?>
</select>
</div>
</fieldset>
<fieldset class="fieldset-candidate_name">
<label for="candidate_name">Notice Period</label>
<div class="field">
<select name='notice_period' id='notice_period' class='job-manager-category-dropdown '>
<option value="">Select Notice Period</option>
<?php foreach( $noticePeriod as $key ): ?>
<option value="<?php echo $key; ?>" <?php echo  ( $record->notice_period == $key ) ? 'selected="selected"' : ''; ?> ><?php echo $key; ?></option>
<?php endforeach; ?>
</select>
</div>
</fieldset>
<fieldset class="fieldset-resume_category">
<label for="resume_category">Desired Job Type</label>
<div class="field">
<select name='job_type_id' id='job_type_id' class='job-manager-category-dropdown '>
	<option value="">Select Desired Job Type</option>
	<?php foreach ( $jobTypes as $jobT ): ?>
	<option value="<?php echo $jobT->job_type_id; ?>" <?php echo ( $userDetail->job_type_id == $jobT->job_type_id ) ? 'selected="selected"' : ''; ?> ><?php echo $jobT->name; ?></option>
	<?php endforeach; ?>
</select>
</div>
</fieldset>
<fieldset class="fieldset-resume_category">
<label for="resume_category">Current Industry</label>
<div class="field">
<select name='category_id' id='category_id' class='job-manager-category-dropdown ' onchange="subTypes('#category_id', '#tokenize');">
	<option value="">Select Current Industry</option>
	<?php foreach ( $category as $cat ): ?>
	<option value="<?php echo $cat->category_id; ?>" <?php echo ( $userDetail->category_id == $cat->category_id ) ? 'selected="selected"' : ''; ?> ><?php echo $cat->name; ?></option>
	<?php endforeach; ?>
</select>
</div>
</fieldset>
<fieldset class="fieldset-resume_category">
<label for="resume_category">Specialties</label><span id="loading2" style="float: right; display: none;"><i class="fa fa-refresh fa-spin"></i></span>
<div class="field">
<style>
.Tokenize{
width: 100%;
}
</style>
<select name='special_id[]' id="tokenize" multiple="multiple" class="tokenize-sample" class='job-manager-category-dropdown '>
</select>
<script type="text/javascript">
    $('#tokenize').tokenize();
</script>
</div>
</fieldset>
<fieldset class="fieldset-resume_category">
<label for="resume_category">Target Industry</label>
<div class="field">
<select name='target_category_id' id='target_category_id' class='job-manager-category-dropdown '>
	<option value="">Select Target Industry</option>
	<?php foreach ( $category as $cat ): ?>
	<option value="<?php echo $cat->category_id; ?>" <?php echo ( $userDetail->target_category_id == $cat->category_id ) ? 'selected="selected"' : ''; ?> ><?php echo $cat->name; ?></option>
	<?php endforeach; ?>
</select>
</div>
</fieldset>
<!-- <fieldset class="fieldset-resume_category">
<label for="resume_category">Functional Area</label>
<div class="field">
<select name='functional_area' id='functional_area' class='job-manager-category-dropdown '>
<option class="level-0" value="1">Full Time</option>
<option class="level-0" value="2">Part Time</option>
</select>
</div>
</fieldset> -->
<fieldset class="fieldset-resume_category">
<label for="resume_category">Target Jobs</label>
<div class="field">
<select name='target_job_type' id='target_job_type' class='tokenize-sample job-manager-category-dropdown'>
	<option value="">Select Target Job</option>
	<?php foreach ( $jobTypes as $jobT ): ?>
	<option value="<?php echo $jobT->job_type_id; ?>" <?php echo ( $userDetail->target_job_type == $jobT->job_type_id ) ? 'selected="selected"' : ''; ?> ><?php echo $jobT->name; ?></option>
	<?php endforeach; ?>
</select>
</div>
</fieldset>
<!-- <fieldset class="fieldset-resume_category">
<label for="resume_category">Target Country</label>
<div class="field">
<select name='target_country_id' id='target_country_id' class='job-manager-category-dropdown ' onchange="getCity('#target_country_id', '#target_city_id');">
	<option value="">Select Target Country</option>
	<?php foreach ( $country as $ctry ): ?>
	<option value="<?php echo $ctry->country_id; ?>" <?php echo ( $userDetail->target_country_id == $ctry->country_id ) ? 'selected="selected"' : ''; ?> ><?php echo $ctry->en_title; ?></option>
	<?php endforeach; ?>
</select>
</div>
</fieldset>
<fieldset class="fieldset-resume_category">
<label for="resume_category">Target City / State</label><span id="loading" style="float: right; display: none;"><i class="fa fa-refresh fa-spin"></i></span>
<div class="field">
<select name='target_city_id' id='target_city_id' class='job-manager-category-dropdown '>
	<option value="">Select Target City</option>
</select>
</div>
</fieldset> -->
<!-- <fieldset class="fieldset-resume_category">
<label for="resume_category">Acceptable Relocation</label>
<div class="field">
<select name='acceptable_relocation' id='acceptable_relocation' class='job-manager-category-dropdown '>
<option class="level-0" value="236">Business Management</option>
<option class="level-0" value="232">Designer</option>
<option class="level-0" value="233">Developer</option>
<option class="level-0" value="231">Finance</option>
<option class="level-0" value="237">Marketing</option>
<option class="level-0" value="238">Support</option>
</select>
</div>
</fieldset> -->
<fieldset class="fieldset-candidate_education">
<label for="candidate_education">Education <small>(optional)</small></label>
<div class="field">
<?php echo $userEdu; ?>
<a href="#" class="resume-manager-add-row" id="addEdu" data-row="<?php echo $educationBox; ?>">+ Add Education</a>
</div>
</fieldset>
<fieldset class="fieldset-candidate_experience">
<label for="candidate_experience">Experience <small>(optional)</small></label>
<div class="field">
<?php echo $userExp; ?>
<a href="#" class="resume-manager-add-row" id="addExp" data-row="<?php echo $experienceBox; ?>">+ Add Experience</a>
</div>
</fieldset>
<!-- <fieldset class="fieldset-resume_category">
<label for="resume_category">Technical Skills <small>(optional)</small></label>
<div class="field">
<select name='skills[]' id='skills' class='job-manager-category-dropdown ' multiple='multiple' data-placeholder='Choose a skill&hellip;'>
<option class="level-0" value="236">Business Management</option>
<option class="level-0" value="232">Designer</option>
<option class="level-0" value="233">Developer</option>
<option class="level-0" value="231">Finance</option>
<option class="level-0" value="237">Marketing</option>
<option class="level-0" value="238">Support</option>
</select>
</div>
</fieldset> -->
<!-- <fieldset class="fieldset-resume_content">
<label for="resume_content">Covering Letter</label>
<div class="field">
<div id="wp-resume_content-wrap" class="wp-core-ui wp-editor-wrap html-active">
<div id="wp-resume_content-editor-container" class="wp-editor-container">
<textarea class="wp-editor-area" rows="8" cols="40" name="cover_letter" id="cover_letter"></textarea>
</div>
</div>
</div>
</fieldset> -->
<!-- <fieldset class="fieldset-candidate_photo">
<label for="candidate_photo">How do you know about us? <small>(optional)</small></label>
<div class="field">
<input type="radio" class="input-text" name="about_us" value="Search Engine" checked="checked"/> Search Engine <br>
<input type="radio" class="input-text" name="about_us" value="Referred by Someone" /> Referred by Someone <br>
<input type="radio" class="input-text" name="about_us" value="Our Staff" /> Our Staff <br>
<input type="radio" class="input-text" name="about_us" value="Our Project" /> Our Project <br>
<input type="radio" class="input-text" name="about_us" value="Emailer" /> Emailer
</div>
</fieldset> -->
<fieldset class="fieldset-resume_file">
<label for="resume_file">Attach Your Resume</label>
<div class="field">
<input type="file" class="input-text" name="resume_file" id="resume_file" placeholder=""/>
<small class="description"><br>
* Only .doc, .docx or .pdf files are allowed. <br> 
* File size must be under 1 MB 	</small>	</div>
</fieldset>
<fieldset class="fieldset-candidate_photo">
<label for="candidate_photo">Upload Your Picture</label>
<div class="field">
<input type="file" class="input-text" name="photo" id="photo" placeholder=""/>
<small class="description"><br>
* Only .Gif, .Jpg or .Png files are allowed. <br> 
* File size must be under 1 MB 	</small>	
</div>
</fieldset>
<!-- <fieldset class="fieldset-candidate_name">
<label for="candidate_name">Your Linkedin URL <small>(optional)</small></label>
<div class="field">
<input type="text" class="input-text" name="candidate_linkedin" id="candidate_linkedin" placeholder="Your Linkedin URL" value="" maxlength="" />
</div>
</fieldset> -->
<p>
<input type="submit" name="submit_resume" class="button" value="Submit"/>
</p>
</form>
</div>
</article>
</div>
</div>
</div>

<?php endif; ?>


<script type='text/javascript'>var resume_manager_resume_submission={"i18n_navigate":"If you wish to edit the posted details use the \"edit resume\" button instead, otherwise changes may be lost."};</script>
<script src="<?php echo base_url(); ?>assets/plugins/wp-job-manager-resumes%2c_assets%2c_js%2c_resume-submission.min.js%2cqver%3d%3d1.8.0%2bwp-job-manager%2c_assets%2c_js%2c_term-multiselect.min.js%2cqver%3d%3d1.20.1.pagespeed.jc.L7Wrd1QYTk.js"></script>
<script>eval(mod_pagespeed_x4R3RQoVbh);</script> <script>eval(mod_pagespeed_C4CYkUWCkx);</script>


<script type="text/javascript">
function getCity($parent_id, $child_id)
{	
	var cid = $($parent_id).val();
	$('#loading').show();

	$.ajax({
        type: 'POST',
        url: '<?php echo base_url()?>index.php/common/jobseeker/city_by_country',
        data: { country_id:cid },
        success:function(response){
           $($child_id).html(response);
           $('#loading').hide();
        }
   });
	
}

function subTypes($parent_id, $child_id)
{	
	var pid = $($parent_id).val();
	$('#loading2').show();

	$.ajax({
        type: 'POST',
        url: '<?php echo base_url()?>index.php/common/jobseeker/sub_category',
        data: { cat_id:pid },
        success:function(response){
           $($child_id).html(response);
           $('#loading2').hide();
        }
   });
	
}
$("#addEdu").click(function(){


	window.setTimeout(function() { 
	
	    $( ".datepicker2" ).datepicker({
	    	  dateFormat: "yy-mm-dd",
	    	  changeYear: true,
	    	  changeMonth: true,
	    	  yearRange: "-60:+0"
	    });

	 }, 1000); // 1000ms
	
});
$("#addExp").click(function(){


	window.setTimeout(function() { 
	
	    $( ".datepicker2" ).datepicker({
	    	  dateFormat: "yy-mm-dd",
	    	  changeYear: true,
	    	  changeMonth: true,
	    	  yearRange: "-60:+0"
	    });

	 }, 1000); // 1000ms
	
});


function validateUser()
{	
	var email = $("#email").val();
	$('#userMsg').html('');
	$('#loading3').show();	

	$.ajax({
        type: 'POST',
        url: '<?php echo base_url()?>index.php/common/jobseeker/validateUser',
        data: { email:email },
        success:function(response){
           $('#userMsg').html(response);           
           $('#loading3').hide();
        }
   });
}

$(".TokenSearch").keypress(function (evt) {
	//Deterime where our character code is coming from within the event
	var charCode = evt.charCode || evt.keyCode;
	if (charCode  == 13) { //Enter key's keycode
	return false;
	}
	});
</script>






<!-- <script type='text/javascript' src='<?php echo base_url(); ?>assets/javascript/jquery/ui/sortable.min.js%2cqver%3d1.11.2.pagespeed.jm.zXyyDq8hJ2.js'></script> -->

	
