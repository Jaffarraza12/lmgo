<?php
class Config  {


	function Render($template,$data = array())
	{
		
		$CI = new CI_Controller();

		foreach($template as $temp)
		{
			$CI->load->view($temp,$data);
			
		}
	}
	

}


?>