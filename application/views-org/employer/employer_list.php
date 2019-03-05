<div id="main" class="site-main">
<header class="page-header">
<h1 class="page-title"><?php echo $heading; ?></h1>
</header>
<div id="primary" class="content-area">
<div id="content" class="container" role="main">
<div class="entry-content">
<div class="job_listings">
<form  action="<?php echo $formAction; ?>" method="get">
	<div class="search_jobs">
		<div class="search_keywords" style="width:82%;">
			<label for="search_keywords">Keywords</label>
			<input type="text" name="search_keywords" id="search_keywords" placeholder="Keywords" value="<?php echo $this->input->get('search_keywords'); ?>"/>
		</div>	
		<div class="search_submit">
			<input type="submit" name="submit" value="Search" />
		</div>
	</div>	
	
</form>
<noscript>Your browser does not support JavaScript, or it is disabled. JavaScript must be enabled in order to view listings.</noscript>
<ul class="job_listings">
<?php 
foreach ( $jobs as $job ) :	
?>
<li id="job_listing-8" class="post-8 job_listing type-job_listing status-publish has-post-thumbnail hentry job-type-part-time job_position_featured">
	<div class="row">
		<a href="#" class="job_listing-link">
			<div class="logo col-sm-2 col-md-1 col-lg-1">
				<a href="<?php echo base_url( 'index.php/common/home/company_details/' . $job->employer_id ); ?>" target="_blank">
					<img class="company_logo" src="<?php echo base_url();?>uploads/employer/<?php echo $job->logo; ?>" alt="Amazon"/>
				</a>	
			</div>
			<div class="position col-xs-12 col-sm-10 col-md-6 col-lg-5">
				<a href="<?php echo base_url( 'index.php/common/home/company_details/' . $job->employer_id ); ?>" target="_blank">
					<h3><?php echo $job->account_name; ?></h3>
				</a>
				<div class="company">
					<strong></strong> 
				</div>
			</div>
		</a>
	</div>
</li>

<?php endforeach; ?>
</ul>

<a class="load_more_jobs" href="#" style="display:none;">
	<strong>Load more listings</strong>
</a>
</div>	
</div>
</div>
</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script>
$("#searchWaqar").click(function(){

	var search_keywords = $("#search_keywords").val();
	var country_id = $("#country_id").val();
	var category_id = $("#category_id").val();

	
	if($("#job_type_freelance").prop('checked') == true){	    
		var job_type_freelance = $("#job_type_freelance").val();
	}

	if($("#job_type_full-time").prop('checked') == true){	    
		var job_type_full_time = $("#job_type_full-time").val();
	}

	if($("#job_type_internship").prop('checked') == true){	    
		var job_type_internship = $("#job_type_internship").val();
	}

	if($("#job_type_part-time").prop('checked') == true){	    
		var job_type_part_time = $("#job_type_part-time").val();
	}

	if($("#job_type_temporary").prop('checked') == true){	    
		var job_type_temporary = $("#job_type_temporary").val();
	}

	$.ajax({
        type: 'POST',
        url: '<?php echo base_url()?>index.php/common/home/do_search',
        data: { search_keywords:search_keywords, country_id:country_id, category_id:category_id, job_type_freelance:job_type_freelance, job_type_full_time:job_type_full_time, job_type_internship:job_type_internship, job_type_part_time:job_type_part_time, job_type_temporary:job_type_temporary },
        success:function(response){
           //$($child_id).html(response);
           //$('#loading').hide();
            alert(response);
        }
   });
	
});
</script>
