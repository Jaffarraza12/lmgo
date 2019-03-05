<?php 


if($sliders) { ?>
<div class="banner">

<?php  if($sliders['data']['slider1_img']){
	echo '<img class="slides" src="'.base_url().'uploads/'.$sliders['data']['slider1_img'].'" alt="shop" title="shop" id="wows1_0"/>';
 } ?>
 
<?php  if($sliders['data']['slider2_img']){
	echo '<img class="slides" src="'.base_url().'uploads/'.$sliders['data']['slider2_img'].'" alt="shop" title="shop" id="wows1_0"/>';
 } ?>
 
 
 <?php  if($sliders['data']['slider3_img']){
	echo '<img class="slides" src="'.base_url().'uploads/'.$sliders['data']['slider3_img'].'" alt="shop" title="shop" id="wows1_0"/>';
 } ?>
 
 
  <?php  if($sliders['data']['slider4_img']){
	echo '<img class="slides" src="'.base_url().'uploads/'.$sliders['data']['slider4_img'].'" alt="shop" title="shop" id="wows1_0"/>';
 } ?>
</div>
<div class="shade"></div>
<?php } ?>