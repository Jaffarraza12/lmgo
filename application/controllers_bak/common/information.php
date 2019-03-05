<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Information extends CI_Controller {

	public function __construct() {
        parent::__construct();      

		
    } 
	 
	public function index()
	{

	  	$data = array();

        $config =  new Config();
        $tag = $this->MUtils->DbPrepare($this->uri->segment(4));
        $data['config'] = $config;
        $content = $this->MContent->viewByTerm($tag)->row() ;

        $data['title'] = $content->title;
        $data['heading'] = $content->title;
        $data['content'] = $content->long_desc;

        $template = array(
			'common/header',
			'information',
			'common/footer'
		);
		
		$config->render($template,$data);
	
	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */