
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>



<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  
  <script>
  $(function() {
	 $( "#datepicker" ).datepicker({
    	  dateFormat: "yy-mm-dd"
    });

    $("#submit-job-form").keypress(function(e) {
  	  //Enter key  	  
  	  if (e.which == 13) {
  	    return false;
  	  }
  	});
    
  });
  
  </script>
  
  
<script type="text/javascript">

     $(function () {
         var lat = 30.375321,
             lng = 69.34511599999996,
             latlng = new google.maps.LatLng(lat, lng),
             //image = 'http://www.google.com/intl/en_us/mapfiles/ms/micons/ltblue-dot.png';
             image = '<?php echo base_url('uploads/marker.png')?>';

         //zoomControl: true,
         //zoomControlOptions: google.maps.ZoomControlStyle.LARGE,

         var mapOptions = {
             center: new google.maps.LatLng(lat, lng),
             zoom: 5,
             mapTypeId: google.maps.MapTypeId.ROADMAP,
             panControl: true,
             panControlOptions: {
                 position: google.maps.ControlPosition.TOP_RIGHT
             },
             zoomControl: true,
             zoomControlOptions: {
                 style: google.maps.ZoomControlStyle.LARGE,
                 position: google.maps.ControlPosition.TOP_left
             }
         },
         map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions),
             marker = new google.maps.Marker({
                 position: latlng,
                 map: map,
                 icon: image
             });

         var input = document.getElementById('searchTextField');
         var autocomplete = new google.maps.places.Autocomplete(input, {
             types: ["geocode"]
         });

         autocomplete.bindTo('bounds', map);
         var infowindow = new google.maps.InfoWindow();

         google.maps.event.addListener(autocomplete, 'place_changed', function (event) {
             infowindow.close();
             var place = autocomplete.getPlace();
             if (place.geometry.viewport) {
                 map.fitBounds(place.geometry.viewport);
             } else {
                 map.setCenter(place.geometry.location);
                 map.setZoom(17);
             }

             moveMarker(place.name, place.geometry.location);
             $('.MapLat').val(place.geometry.location.lat());
             $('.MapLon').val(place.geometry.location.lng());
         });
         google.maps.event.addListener(map, 'click', function (event) {
             $('.MapLat').val(event.latLng.lat());
             $('.MapLon').val(event.latLng.lng());
             infowindow.close();
                     var geocoder = new google.maps.Geocoder();
                     geocoder.geocode({
                         "latLng":event.latLng
                     }, function (results, status) {
                         console.log(results, status);
                         if (status == google.maps.GeocoderStatus.OK) {
                             console.log(results);
                             var lat = results[0].geometry.location.lat(),
                                 lng = results[0].geometry.location.lng(),
                                 placeName = results[0].address_components[0].long_name,
                                 latlng = new google.maps.LatLng(lat, lng);

                             moveMarker(placeName, latlng);
                             $("#searchTextField").val(results[0].formatted_address);
                         }
                     });
         });
        
         function moveMarker(placeName, latlng) {
             marker.setIcon(image);
             marker.setPosition(latlng);
             infowindow.setContent(placeName);
             //infowindow.open(map, marker);
         }
     });
</script>
<div id="main" class="site-main">
<header class="page-header">
<h1 class="page-title"><?php echo $heading; ?></h1>
<div class="loginUser">Logged in as: <strong><?php echo $loginUser['email']; ?></strong></div>
</header>
<div id="primary" class="content-area">
<div id="content" class="container" role="main">
<article id="post-14" class="post-14 page type-page status-publish hentry">
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
<?php if( $this->session->flashdata('message') == 'Job posted Successfully'): ?>
	<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('message'); ?></div>
<?php endif; ?>
<?php if( $this->session->flashdata('message') == 'Employer Already exist'): ?>
	<div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('message'); ?></div>
<?php endif; ?>
<?php echo $message?>
</div>
<form action="<?php echo $formAction; ?>" method="post" id="submit-job-form" class="job-manager-form" enctype="multipart/form-data">
<fieldset class="fieldset-job_title">
<label for="job_title">Title</label>
<div class="field required-field">
<input type="text" class="input-text" name="title" id="title" placeholder="Title" value="" maxlength="" required />
</div>
</fieldset>
<fieldset class="fieldset-job_type">
<label for="job_type">Job type</label>
<div class="field required-field">
<select name='job_type_id' id='job_type_id' class='postform' required="required">
	<option value="">Select Job Type</option>
	<?php foreach ( $job_type as $jt ): ?>
	<option value="<?php echo $jt->job_type_id; ?>"><?php echo $jt->name; ?></option>
	<?php endforeach; ?>
</select>
</div>
</fieldset>
<fieldset class="fieldset-job_region">
<label for="job_region">Country</label>
<div class="field required-field">
<select name='country_id' id='country_id' class='postform' onchange="getCity();" required="required">
	<option value="">Select Country</option>
	<?php foreach ( $country as $ctry ): ?>
	<option value="<?php echo $ctry->country_id; ?>"><?php echo $ctry->en_title; ?></option>
	<?php endforeach; ?>
</select>
</div>
</fieldset>
<fieldset class="fieldset-job_region">
<label for="job_region">City / State</label><span id="loading" style="float: right; display: none;"><i class="fa fa-refresh fa-spin"></i></span>
<div class="field required-field">
<select name='city_id' id='city_id' class='postform' required="required">
	<option value="">Select City</option>
</select>
</div>
</fieldset>
<fieldset class="fieldset-job_region">
<label for="job_region">Category</label>
<div class="field required-field">
<select name='category_id' id='category_id' class='postform' required="required">
	<option value="">Select Category</option>
	<?php foreach ( $category as $cat ): ?>
	<option value="<?php echo $cat->category_id; ?>"><?php echo $cat->name; ?></option>
	<?php endforeach; ?>
</select>
</div>
</fieldset>
<fieldset class="fieldset-application">
<label for="application">Description</label>
<div class="field required-field">
<textarea name='description' id='description' class='textarea medium' tabindex='3' rows='10' cols='50' required="required"></textarea>
</div>
</fieldset>
<fieldset class="fieldset-application">
<label for="application">Validity Date</label>
<div class="field required-field">
<input type="text" class="input-text" name="validity" id="datepicker" value="" />
</div>
</fieldset>



        <?php foreach($attributes as $attribute) { ?>
        <fieldset>
            <label for="application"><?php echo $attribute->name ?></label>
            <?php if($attribute->type == 'TEXTBOX') { ?>
                <div class="field required-field">
                    <input type="text" value="" name="attribute[<?php echo $attribute->attribute_id ?>]" size="16" class="input-text">
                </div>
            <?php } else if($attribute->type == 'SELECT') { ?>
                <div class="field required-field">
                        <select name="attribute[<?php echo $attribute->attribute_id ?>]" placeholder="Please select status" class="m-wrap popovers" data-original-title="Status" data-content="Please select attribute Option" data-trigger="hover">
            			<?php foreach($attribute_option[$attribute->attribute_id] as $option) {?>
                        		<option value="<?php echo $option['attribute_option_id'] ?>"><?php echo $option['name']?></option>
                        <?php } ?>
                    </select>
                </div>
            <?php } ?>
        </fieldset>
      	<?php } ?> 



<fieldset class="fieldset-application">
<label for="application">Address</label>
<div class="field required-field">
<input type="text" class="input-text" name="lattudee" id="searchTextField" value="" maxlength="" />
<input name="lattude" class="MapLat" value="" type="hidden" placeholder="Latitude">
<input name="lngtude" class="MapLon" value="" type="hidden" placeholder="Longitude">
</div>
</fieldset>
<fieldset>
<div id="map_canvas" style="height: 350px;width: 500px;margin: 0.6em;"></div>
</fieldset>
<!-- <fieldset class="fieldset-application">
<label for="application">latitude</label>
<div class="field required-field">
<input type="text" class="input-text" name="lattude" id="lattude" value="" maxlength="" />
</div>
</fieldset>
<fieldset class="fieldset-application">
<label for="application">longitude</label>
<div class="field required-field">
<input type="text" class="input-text" name="lngtude" id="lngtude" value="" maxlength="" />
</div>
</fieldset> -->
<p>
<input type="submit" name="submit_job" class="button" value="Submit"/>
</p>
</form>


<script type="text/javascript">
function getCity()
{	
	var cid = $('#country_id').val();
	$('#loading').show();

	$.ajax({
        type: 'POST',
        url: '<?php echo base_url()?>/index.php/common/employer/city_by_country',
        data: { country_id:cid },
        success:function(response){
           $('#city_id').html(response);
           $('#loading').hide();
        }
   });
	
}
</script>
</div>
</article>
</div>
</div>
</div>