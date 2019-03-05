<?php
class Search   {

	 
	function  LiCategory($categories,$elem,$num,$language)
	{
	
		$num = $num +1 ; 
		$title = ($language == 'arabic') ?  'الفئات' : 'Categories';
		$html = '<ol id="search360" class="cmajx'.$num.'">
                                <label>
                                    <select id="category" name="'.$elem.'" class="mc" data-value="'.$num.'">
                                        <option value="">'.$title .'</option>';
                                        foreach($categories as $cat){
										$catname = ($language=='arabic') ? $cat['arname'] : $cat['name'];  
                                       	$html .= '<option value="'.$cat['catid'].'">'.$catname.'</option>';
                                       }
                                    $html .="</select>
                                </label>
                        </ol> "	;
		return $html;				
	}
	
	function  LiModel($models,$language='english')
	{
		$title = ($language == 'arabic') ?  'الفئات' : 'Categories' ;
		$html = '<ol id="search360" class="cmajxmodel">
                                <label>
                                    <select id="model" name="model">
                                        <option value="">'.$title .'</option>';
                                        foreach($models as $mod){ 
										$modelname = ($language =='arabic') ? $mod['arname'] : $mod['name'];  
                                       	$html .= '<option value="'.$mod['modelid'].'">'.$modelname .'</option>';
                                       }
                                    $html .="</select>
                                </label>
                        </ol> "	;
		return $html;				
	}
	
	function  LiAttributeSelect($id,$name,$attr = array(),$language)
	{
		
		$CI = new CI_Controller();
		if($id == 7 && !$CI->session->userdata('cityid'))
		{
			return false;
			exit(0);	
		}
		$CI->load->model("Mattribute");
		$atroption = $CI->Mattribute->AttributeOptionsbyID($id)->result();
		if($atroption) {
		$html = ' <ol id="search360">
                     	<span class="attrlabel">'.$name.'</span>
                        <br/>
                     		    <label>
                                    <select name='.$id.' id='.$name.' >
                                        <option value="">'.$name.'</option>';
										foreach($atroption as $val) {
											$optname = ($language == 'english') ? $val->name : $val->arname;
											if(!empty($attr)){
											$select =  ($this->custom_in_array($attr[$id],$val->atopid)) ? 'selected="selected"' : '';
											} else {$select="";} 
											$html .= "<option ".$select." value='".$val->atopid."'>".$optname."</option>";
										}
                         $html.= '</select>
                                </label>
                  </ol>';
		return $html;	
		}
	}
	
	function  LiAttributeCheckbox($id,$name,$attr = array(),$language)
	{
	  
		$CI = new CI_Controller();
		$CI->load->model("Mattribute");
		$atroption = $CI->Mattribute->AttributeOptionsbyID($id)->result();
		if($atroption) {
		$html = ' <ol id="search360">
                     	<span class="attrlabel">'.$name.'</span>
                        <br/>';
							foreach($atroption as $val) {
								$optname = ($language == 'english') ? $val->name : $val->arname;
								if(!empty($attr)){
								$checked =  ($this->custom_in_array($attr[$id],$val->atopid)) ? 'checked="checked"' : '';
								} else {$checked ="";}
								$html .= '<input name="'.$id.'" '.$checked.'  type="checkbox" value="'.$val->atopid.'" /><span id="optext">'.$optname .'</span><br/>';
							}
                         $html.= '</ol>';
		
		return $html;		
		}		
	}
	
	function custom_in_array($data,$val)
	{
		if(in_array($val,$data))
		{
			return true;	
		}
	}
	

}
?>