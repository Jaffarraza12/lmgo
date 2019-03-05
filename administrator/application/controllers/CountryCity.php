<?php
class CountryCity extends CI_Controller {

/**=============================================Country Section===============================**/  
   public function CountryProcess()
    {
		$this->load->model("MCountryCity");
		$status = "";
		$error = "";
		 
		$data['en_title'] = $this->input->post('en_title');
		$data['ar_title'] = $this->input->post('ar_title');
	 	$data['status'] ="1";
		$data['smallImage'] = $this->MUtils->doUploadWithCropping('smallFile', 50, 50,"../uploads/flags/");
		$status = "";
		$status = $this->MCountryCity->AddCountry($data);
		if ($status==1){
			$st = 1;
		}
		else{
			$st = 0;
		}
		
		redirect("CountryCity/ViewCountry?st=$st");
    }
	
	public function editCountryProcess()
    {
		$this->load->model("MCountryCity");
		$status = "";
		$error = "";
		 
		$data['en_title'] = $this->input->post('en_title');
		$data['ar_title'] = $this->input->post('ar_title');
		$data['serial'] = $this->input->post('serial');
		$data['smallImage'] = $this->MUtils->doUploadWithCropping('smallFile', 50, 50,"../uploads/flags/");
		$status = "";
		$status = $this->MCountryCity->editCountry($data);
		if ($status==1){
			$st = 1;
		}
		else{
			$st = 0;
		}
		
		redirect("CountryCity/ViewCountry?st=$st");
    }
	
	 public function viewCountry($data='')
	 {
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        $data['breadcrumb_link1'] = "/CountryCity/addCountry";
        $data['breadcrumb_anchor1'] = "Country";
        $data['breadcrumb_link2'] = "/CountryCity/viewCountry";
        $data['breadcrumb_anchor2'] = "Manage Country";

        $data['activeMenu'] = "mnuDirectory";

        //Loading Data for this view
        $this->load->model("MCountryCity");
        $data['countries'] = $this->MCountryCity->getCountries()->result_array();
		
		$data['status'] = intval($this->input->get('st'));
        $data['main_content'] = "Admin/CountryCity/viewCountry";
        $this->load->view("Admin/default.php", $data);
    }
	
	
	
	 public function addCountry($data='')
    {
			$data['type'] = intval($this->input->get('cid'));

			//Load languages and Default Language
			$data['Languages'] = $this->MUtils->getLanguages();
			$data['defaultLang'] = $this->MUtils->getDefaultLanguage();
	
			//BreadCrumb URLs
			$data['breadcrumb_link1'] = "/CountryCity/addCountry";
			$data['breadcrumb_anchor1'] = "Country";
			$data['breadcrumb_link2'] = "/CountryCity/viewCountry";
			$data['breadcrumb_anchor2'] = "Manage Country";
	
			$data['activeMenu'] = "mnuDirectory";
			$this->load->model("MCountryCity");
						
			$data['formAction'] = "CountryProcess";
			$data['pHeading'] = "Add Country";
			$data['main_content'] = "Admin/CountryCity/addCountry";
			$this->load->view("Admin/default.php", $data);
	
    }
	public function editCountry($data='')
    {
			$data['serial'] = intval($this->input->get('cid'));

			//Load languages and Default Language
			$data['Languages'] = $this->MUtils->getLanguages();
			$data['defaultLang'] = $this->MUtils->getDefaultLanguage();
			
			//BreadCrumb URLs
			$data['breadcrumb_link1'] = "/CountryCity/addCountry";
			$data['breadcrumb_anchor1'] = "Country";
			$data['breadcrumb_link2'] = "/CountryCity/editCountry?cid=".$data['serial'];
			$data['breadcrumb_anchor2'] = "Edit Country";
	
			$data['activeMenu'] = "mnuDirectory";
			
			$this->load->model("MCountryCity");
			
			$countryEdit = $this->MCountryCity->viewCountryById($data['serial'])->row_array();
			$data['en_title']=$countryEdit['en_title'];
			$data['ar_title']=$countryEdit['ar_title'];
			$data['flag']=$countryEdit['flag'];
			$data['countryId']=0;
			$data['formAction'] = "editCountryProcess";
			$data['pHeading'] = "Edit Country";
			$data['main_content'] = "Admin/CountryCity/edit";
			$this->load->view("Admin/default.php", $data);
    }
	public function deleteCountry()
    {
        $id = (int)$this->input->get('id');
        $this->load->model("MCountryCity");
        $status = $this->MCountryCity->deleteCountry($id);
		if ($status)
            $this->MUtils->setSuccess("Record Deleted Successfully");
        else
            $this->MUtils->setError("Error occurred while deleting record");
			
		 echo $this->MUtils->getStatus();
      // redirect("CountryCity/ViewCity?st=$st&cid=".$data['cid']);
    }
	
/**============================================= End Country Section===============================**/  	

/**============================================= Start City Section ===============================**/  	
	
	public function addCity($data='')
    {
		$data['type'] = intval($this->input->get('cid'));
		
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/CountryCity/add";
        $data['breadcrumb_anchor1'] = "City";
        $data['breadcrumb_link2'] = "/CountryCity/ViewCountry";
        $data['breadcrumb_anchor2'] = "Manage City";

        $data['activeMenu'] = "mnuDirectory";
        $this->load->model("MCountryCity");
        
        $data['countries'] = $this->MCountryCity->getCountries()->result_array();
		
		$data['formAction'] = "CityProcess";
		$data['pHeading'] = "Add City";
        $data['main_content'] = "Admin/CountryCity/addCountry";
        $this->load->view("Admin/default.php", $data);
    }
	
	public function editCityProcess()
    {
		$this->load->model("MCountryCity");
		$status = "";
		$error = "";
		 
		$data['en_title'] = $this->input->post('en_title');
		$data['ar_title'] = $this->input->post('ar_title');
		$data['serial'] = $this->input->post('serial');
		$data['countryId'] = $this->input->post('countryId');
		$status = "";
		$status = $this->MCountryCity->editCity($data);
		if ($status==1){
			$st = 1;
		}
		else{
			$st = 0;
		}
		redirect("CountryCity/viewCity?st=$st&cid=".$data['countryId']);
    }
	public function CityProcess()
    {
		$this->load->model("MCountryCity");
		$status = "";
		$error = "";
		 
		$data['en_title'] = $this->input->post('en_title');
		$data['ar_title'] = $this->input->post('ar_title');
	 	$data['status'] ="1";
		$data['cid'] =$this->input->post('cid');
		$status = "";
		$status = $this->MCountryCity->AddCity($data);
		if ($status==1){
			$st = 1;
		}
		else{
			$st = 0;
		}
		redirect("CountryCity/ViewCity?st=$st&cid=".$data['cid']);
    }
	
   public function editCity($data='')
    {
			$data['serial'] = intval($this->input->get('cid'));

			//Load languages and Default Language
			$data['Languages'] = $this->MUtils->getLanguages();
			$data['defaultLang'] = $this->MUtils->getDefaultLanguage();
			$this->load->model("MCountryCity");
			
			//$data['countryName']=$this->MCountryCity->countryField($data['serial'],"en_title");
			//BreadCrumb URLs
			$data['breadcrumb_link1'] = "/CountryCity/addCountry";
			$data['breadcrumb_anchor1'] = "Country";
			$data['breadcrumb_link2'] = "/CountryCity/editCity?cid=".$data['serial'];
			$data['breadcrumb_anchor2'] = "Edit City";
	
			$data['activeMenu'] = "mnuDirectory";

			$countryEdit = $this->MCountryCity->viewCityById($data['serial'])->row_array();
			$data['en_title']=$countryEdit['en_title'];
			$data['ar_title']=$countryEdit['ar_title'];
			$data['countryId']=$countryEdit['cid'];
			
			$data['formAction'] = "editCityProcess";
			$data['pHeading'] = "Edit Country";
			$data['main_content'] = "Admin/CountryCity/edit";
			$this->load->view("Admin/default.php", $data);
    }
	
	public function viewCity($data='')
    {
		
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();


		 $this->load->model("MCountryCity");
		$data['cid'] = intval($this->input->get('cid'));
		$data['countryName']=$this->MCountryCity->countryField($data['cid'],"en_title");
		
		        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/CountryCity/viewCity?cid=".$data['cid'];
        $data['breadcrumb_anchor1'] = "Cities";
        $data['breadcrumb_link2'] = "/CountryCity/viewCity?cid=".$data['cid'];
        $data['breadcrumb_anchor2'] = $data['countryName'];

        $data['activeMenu'] = "mnuDirectory";
		
        $data['cities'] = $this->MCountryCity->getCities($data['cid'])->result_array();
		
		$data['status'] = intval($this->input->get('st'));
		
		
        $data['main_content'] = "Admin/CountryCity/viewCity";
        $this->load->view("Admin/default.php", $data);
    }
	
	public function deleteCity()
    {
        $id = (int)$this->input->get('id');
		$data['cid'] = intval($this->input->get('cid'));
        $this->load->model("MCountryCity");
        $status = $this->MCountryCity->deleteCity($id);
		if ($status)
            $this->MUtils->setSuccess("Record Deleted Successfully");
        else
            $this->MUtils->setError("Error occurred while deleting record");
			
		 echo $this->MUtils->getStatus();
      // redirect("CountryCity/ViewCity?st=$st&cid=".$data['cid']);
    }
	
	public function GetCities(){
		
		$country_id = (int)$this->input->get('id');
		$this->load->model('MCountryCity');
		
		$cities = $this->MCountryCity->getCities($country_id)->result();
		$json = array();
		$options = '';
		
		foreach($cities as $city):
			$options.= '<option value="'.$city->city_id.'">'.$city->en_title.'</option>';	
		
		endforeach;
		
		$json['cities'] =$options; 
		
		echo json_encode($json);
		
	}
	
/*============================================================ End city section ====================================*/
}
?>