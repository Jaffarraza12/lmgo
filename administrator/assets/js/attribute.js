 $(document).ready(function() {
	 
	$(document).on("click",".addoop",function(e){
		
	 var html = '<div class="fluid-row" style="clear:both;"><div class="control-group" style="float:left;"><label class="control-label"> Name</label><div class="controls"><input name="attrname[]" type="text" placeholder="Name" class="m-wrap small" /></div></div><div class="control-group" style="float:left;"><label class="control-label">Arabic Name</label><div class="controls"><input name="attrarname[]" type="text" placeholder="arname" class="m-wrap small" /></div></div><div class="control-group"><label class="control-label">Value</label><div class="controls"><input  name="attrvalue[]"  type="text" placeholder="value" class="m-wrap small" /></div></div></div>';
	 
	 $(".DAM").append(html);
	 
	 });
	 
	 
	 $("#range").change(function(){
		 	var val = $(this).val();
			
				if(val  == "SELECT")
				{
					$(".attoption").fadeIn();	
				} else {
					$(".attoption").fadeOut();
					
				}
		 
		 
		 });
	 
});