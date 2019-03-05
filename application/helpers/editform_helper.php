<?php
class EditForm  {

	function  LiCategory($category,$c)
	{
		
		$html = '<li class=""><div class="control-group" >
					<label class="control-label"  for="c" style="display:none;" >Main Category</label>
					<div class="controls">
						     <select class="required" id="catid" name="catid"   placeholder="category" >
							 	<option value="">Category</option> ';
							     foreach($category as $cat){
                                		
                                     $html .= '<option  value="'.$cat['catid'].'">'.$cat['name'].'</option>';
                                     }
                  		  $html .= '</select>
             		 </div>
				</div></li>';
		return $html;				
	}
	
	
	function  LiModel($category,$c)
	{
		
		$html = '<li class=""><div class="control-group" >
					<label class="control-label"  for="c" style="display:none;" >Main Category</label>
					<div class="controls">
						     <select class="required lomer" id="modelid" name="model"   placeholder="category" >
							 <option value="">Model</option> ';
                               foreach($category as $cat){
                                		// $select = ($cat['catid'] == $addinfo->parentid) ? 'selected="selected"' : '' ;  
                                     $html .= '<option  value="'.$cat['catid'].'">'.$cat['name'].'</option>';
                                     }
                  		  $html .= '</select>
             		 </div>
				</div></li>';
		return $html;				
	}
	
	
	

	

}
?>