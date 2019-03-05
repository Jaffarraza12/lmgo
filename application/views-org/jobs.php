<div id="main" class="site-main">
<header class="page-header">
<h1 class="page-title">All Jobs</h1>
</header>
<div id="primary" class="content-area">
<div id="content" class="container" role="main">
<div class="entry-content">
<div class="job_listings">
<form  action="<?php echo $formAction; ?>" method="get">
	<div class="search_jobs">
		<div class="search_keywords" style="width: 30%;">
			<label for="search_keywords">Keywords</label>
			<input type="text" name="search_keywords" id="search_keywords" placeholder="Keywords" value="<?php echo $this->input->get('search_keywords'); ?>"/>
		</div>
		<div class="search_location" style="width: 30%; margin-bottom: 5px;">
			<label for="search_location">Job Type</label>
			<select name='job_type_id' id='job_type_id' class='postform'>
				<option value=''>Job Type</option>
				<?php foreach ( $job_types as $jt ): ?>
				<option value="<?php echo $jt->job_type_id; ?>" <?php echo ( $jt->job_type_id == $this->input->get('job_type_id') ) ? 'selected="selected"' : ''; ?> ><?php echo $jt->name; ?></option>
				<?php endforeach; ?>
			</select>
		</div>		
		<div class="search_location" style="width: 30%; margin-bottom: 5px;" onchange="getCity('#country_id', '#city_id');">
			<label for="search_location">Country</label>
			<select name='country_id' id='country_id' class='postform'>
				<option value=''>Country</option>
				<?php foreach ( $country as $ctry ): ?>
				<option value="<?php echo $ctry->country_id; ?>" <?php echo ( $ctry->country_id == $this->input->get('country_id') ) ? 'selected="selected"' : ''; ?> ><?php echo $ctry->en_title; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<br>		
		<div class="search_location" style="width: 30%; margin-bottom: 5px;">
			<label for="search_location">City</label>
			<select name='city_id' id='city_id' class='postform'>	
				<option value=''>City</option>
			</select>
		</div>		
		<div class="search_location" style="width: 30%; margin-bottom: 5px;">
			<label for="search_categories">Category</label>
			<select name='category_id' id='category_id' class='postform'>
				<option value=''>Category</option>
				<?php foreach ( $category as $cat ): ?>
				<option value="<?php echo $cat->category_id; ?>" <?php echo ( $cat->category_id == $this->input->get('category_id') ) ? 'selected="selected"' : ''; ?> ><?php echo $cat->name; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="search_location" style="width: 30%; margin-bottom: 5px;">
			<label for="search_categories">Specialization</label>
			<select name='spe_id' id='spe_id' class='postform'>
				<option value=''>Specialization</option>
				<?php foreach ( $spe as $sp ): ?>
				<option value="<?php echo $sp->user_special_id; ?>" <?php echo ( $sp->user_special_id == $this->input->get('spe_id') ) ? 'selected="selected"' : ''; ?> ><?php echo $sp->name; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<br>
		<div class="search_location" style="width: 30%; margin-bottom: 5px;">
			<label for="search_categories">Education Level</label>
			<select name='edu_id' id='edu_id' class='postform'>
				<option value=''>Education Level</option>
				<?php foreach ( $edu_level as $edu ): ?>
				<option value="<?php echo $edu->attribute_option_id; ?>" <?php echo ( $edu->attribute_option_id == $this->input->get('edu_id') ) ? 'selected="selected"' : ''; ?> ><?php echo $edu->name; ?></option>
				<?php endforeach; ?>
			</select>
		</div>	
		<div class="search_location" style="width: 30%; margin-bottom: 5px;">
			<label for="search_categories">Experience Level</label>
			<select name='exp_id' id='exp_id' class='postform'>
				<option value=''>Experience Level</option>
				<?php foreach ( $exp_level as $exp ): ?>
				<option value="<?php echo $exp->attribute_option_id; ?>" <?php echo ( $exp->attribute_option_id == $this->input->get('exp_id') ) ? 'selected="selected"' : ''; ?> ><?php echo $exp->name; ?></option>
				<?php endforeach; ?>
			</select>
		</div>		
		<div class="search_location" style="width: 30%; margin-bottom: 5px;">
			<label for="search_categories">Min Salary</label>
			<select name='min_salary' id='min_salary' class='postform'>
				<option value=''>Salary</option>
				<?php foreach ( $salary as $sal ): ?>
				<option value="<?php echo $sal->attribute_option_id; ?>" <?php echo ( $sal->attribute_option_id == $this->input->get('min_salary') ) ? 'selected="selected"' : ''; ?> ><?php echo $sal->name; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<br>
		<!-- <div class="search_location" style="width: 47%; margin-bottom: 5px;">
			<label for="search_categories">Max Salary</label>
			<select name='max_salary' id='max_salary' class='postform'>
				<option value=''>Max Salary</option>
				<?php foreach ( $salary as $msal ): ?>
				<option value="<?php echo $msal->attribute_option_id; ?>" <?php echo ( $msal->attribute_option_id == $this->input->get('max_salary') ) ? 'selected="selected"' : ''; ?> ><?php echo $msal->name; ?></option>
				<?php endforeach; ?>
			</select>
		</div>	
		<br> -->
		<div class="search_submit" style="margin-right: 44%;">
			<input type="submit" name="submit" value="Search" />
		</div>
	</div>
	<!-- <ul class="job_types" id="job_types">
        <?php foreach($job_types as $type){ ?>
            <li><label for="job_type_<?php echo $type->name ?>" class="<?php echo $type->name ?>"><input type="checkbox" class="fcheck" name="filter_job_type[]" value="<?php echo $type->job_type_id ?>" checked='checked' id="job_type_<?php echo $type->name ?>" /> <?php echo $type->name ?></label></li>
        <?php } ?>
    </ul> -->
</form>
<noscript>Your browser does not support JavaScript, or it is disabled. JavaScript must be enabled in order to view listings.</noscript>
<ul class="job_listings" id="WaqarDiv">
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

<div class="paginate-links container"><?php echo $links; ?></div>

<a class="load_more_jobs" href="#" style="display:none;">
	<strong>Load more listings</strong>
</a>
</div>	
</div>
</div>
</div>
</div>
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script> -->
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://cdn.jsdelivr.net/jquery.mixitup/latest/jquery.mixitup.min.js"></script>
<script>
//On document ready:

$(function(){

	// Instantiate MixItUp:

	$('#WaqarDiv').mixItUp();

});




function getCity($parent_id, $child_id)
{	
	var cid = $($parent_id).val();	

	$.ajax({
        type: 'POST',
        url: '<?php echo base_url()?>index.php/common/jobseeker/city_by_country',
        data: { country_id:cid },
        success:function(response){
           $($child_id).html(response);           
        }
   });
	
}

</script>
