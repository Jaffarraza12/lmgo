<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PageNotFound extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
        parent::__construct();      
        $this->lang->load("common/home",$this->session->userdata("language"));
		$this->lang->load("category/category",$this->session->userdata("language"));
		$this->lang->load("common/search",$this->session->userdata("language"));
		
		
    } 
	 
	public function index()
	{

	  	$data = array();
		$this->load->library('paging');
		
		$this->load->helper("productview");
		$this->load->helper("captcha");
		$this->load->helper("search");
		
		$this->load->model("MCategories");
		$this->load->model('MConfig');
		$this->load->model("MAttribute");
		$this->load->model("MProduct");
		$this->load->model("Mgeo");
		$this->load->model("Madd");
		$tag = $this->MUtils->DbPrepare($this->input->get("tag"));
		$inputid = (int) $this->input->get("id");
		
		
		$data['categories']= $this->MCategories->MainCategories()->result();
		$data['categoryarranged'] = $this->MCategories->Categoryarrange();
		$data['categoryarrangedcount'] = $this->MCategories->categoryarrangecount();
		
		$data['sliders'] = $this->MConfig->getValue(0);
		$data['info_information'] = $this->MPages->viewpagelist('Information')->result();
		$data['info_category'] = $this->MPages->viewpagelist('Categories')->result();
		
		
		$data['proview'] = new ProductView();
		foreach($GLOBALS['language'] as $key=>$val):
			$data[$key] = $val;
		endforeach;
		
		//$load =  new Location();
		$config =  new Config();
		$data['config'] = $config;
		$data['classified_main'] = $this->MCategories->MainCategories()->result_array();
		$data['classified_links'] = $this->MCategories->Categoryarrange();
		$data['cities'] = $this->Mgeo->getCities(221)->result();
		
		
		
		$data['searchhtml'] =  new search();
		
		
		$template = array(
			'common/header',
			'common/404',
			'common/footer'
		);
		
		$config->render($template,$data);
	
	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */