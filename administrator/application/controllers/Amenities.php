<?php 

class Amenities extends CI_Controller {

    //Show the view for adding new Model
    public function Add()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
		
		
		$this->load->model("MCategories");
		$this->load->model("MAmenities");
		
		$data['categories'] = $this->MCategories->MainCategories()->result_array();
		$data['categoryarranged'] = $this->MCategories->Categoryarrange();
		
			if($this->input->post('Submit') )
			{
				
				$dat['name'] =  $this->input->post('name');
				$dat['arname'] =  $this->input->post('arname');
				$dat['status'] =  $this->input->post('status');
							
				$dat['category'] =  $this->input->post('category');
				
			    $status = $this->MAmenities->addAmenity($dat);
				$this->View($data);
				exit(0);
		
			} 
		
	     //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Amenities/View";
        $data['breadcrumb_anchor1'] = "Amenities";
        $data['breadcrumb_link2'] = "/Amenities/Add";
        $data['breadcrumb_anchor2'] = "Add New Amenity";

        $data['activeMenu'] = "mnuDirectory";
       

        $data['main_content'] = "Admin/Amenities/add";
        $this->load->view('Admin/default.php', $data);

    }

    //Show the view to edit Model
    public function Edit()
    {
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
		
		$data['amid'] = (int)$this->input->get("id");
		
		$this->load->model("MCategories");
		$this->load->model("MAmenities");
		
		$data['categories'] = $this->MCategories->MainCategories()->result_array();
		$data['categoryarranged'] = $this->MCategories->Categoryarrange();
		$data['amenities_info'] = $this->MAmenities->AmenitybyID($data['amid'])->row();
		$data['amenities_categories'] = $this->MAmenities->AmenitiesCategorybyID($data['amid']);
		
		
			if($this->input->post('Submit') )
			{
				$dat['amid'] =  $this->input->post('amid');
				$dat['name'] =  $this->input->post('name');
				$dat['arname'] =  $this->input->post('arname');
				$dat['status'] =  $this->input->post('status');
			
				$dat['category'] =  $this->input->post('category');
				
			    $status = $this->MAmenities->editAmenity($dat);
				$this->View($data);
				exit(0);
				
				
				
			} 
		
	     //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Amenities/View";
        $data['breadcrumb_anchor1'] = "Amenities";
        $data['breadcrumb_link2'] = "/Amenities/Add";
        $data['breadcrumb_anchor2'] = "Edit Amenities";

        $data['activeMenu'] = "mnuDirectory";
       

        $data['main_content'] = "Admin/Amenities/edit";
        $this->load->view('Admin/default.php', $data);

    }

    //Show all the Models on 1 page..
    public function View($data='')
    {
        //Load languages and Default Language
		$data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        $this->load->model("MAmenities");
        $data['Amenities'] = $this->MAmenities->viewAmenities()->result();
        //seperate data according to languages in different arrays
        
        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Amenities/View";
        $data['breadcrumb_anchor1'] = "Amenities";
        $data['breadcrumb_link2'] = "";
        $data['breadcrumb_anchor2'] = "";

        $data['activeMenu'] = "mnuDirectory";
       

        $data['main_content'] = "Admin/Amenities/view";
        $this->load->view("Admin/default.php", $data);
    }

    //Delete Service
    public function Delete()
    {
        $id = (int) $this->input->get('id');

        $this->load->model("MAmenities");
        $status = $this->MAmenities->deleteAmenity($id);

        if ($status)
            $this->MUtils->setSuccess("Record Deleted Successfully");
        else
            $this->MUtils->setError("Error occurred while deleting record");

        echo $this->MUtils->getStatus();
    }

    //Show all the Models on 1 page..
  /*  public function Validate()
    {
      
	  if($this->input->post("name") = "" )
	  {
			//$this->MUtils->setError("Name should not be entered");
		  
	  }
	     
    }*/


}