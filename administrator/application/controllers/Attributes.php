<?php 

class Attributes extends CI_Controller {

    //Show the view for adding new Model
    public function Add()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
		
		
		$this->load->model("MCategories");
		$this->load->model("MAttribute");
		
		//$data['categories'] = $this->MCategories->MainCategories()->result_array();
		//$data['categoryarranged'] = $this->MCategories->Categoryarrange();
		
			if($this->input->post('Submit') )
			{
				
				$dat['name'] =  $this->input->post('name');
				$dat['arname'] =  $this->input->post('arname');
				$dat['arname'] =  $this->input->post('arname');
				$dat['search'] =  $this->input->post('search');
				$dat['type'] =  $this->input->post('type');
				
				
				$dat['primary'] =  $this->input->post('primary');
				
				$dat['attrname'] = $this->input->post('attrname');
				$dat['attrarname'] = $this->input->post('attrarname');
				$dat['attrvalue'] = $this->input->post('attrvalue');
				
				$dat['category'] =  $this->input->post('category');
				
			    $status = $this->MAttribute->addAttribute($dat);
				$this->View($data);
				exit(0);
				
				
				
			} 
		
	     //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Attributes/View";
        $data['breadcrumb_anchor1'] = "Attributes";
        $data['breadcrumb_link2'] = "/Attributes/Add";
        $data['breadcrumb_anchor2'] = "Add New Attribute"; 
		$data['activeMenu'] = "mnuJobs";
       $data['main_content'] = "Admin/Attributes/add";
        $this->load->view('Admin/default.php', $data);

    }

    //Show the view to edit Model
    public function Edit()
    {
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
		
		$data['attributeid'] = (int)$this->input->get("id");
		
		$this->load->model("MCategories");
		$this->load->model("MAttribute");
		
		//$data['categories'] = $this->MCategories->MainCategories()->result_array();
		//$data['categoryarranged'] = $this->MCategories->Categoryarrange();
		$data['attribute_info'] = $this->MAttribute->AttributebyID($data['attributeid'])->row();
		$data['attribute_option'] = $this->MAttribute->AttributeOptionsbyID($data['attributeid'] )->result();
		//$data['attribute_categories'] = $this->MAttribute->AttributeCategorybyID($data['attributeid']);
		
		
			if($this->input->post('Submit') )
			{
				$dat['attributeid'] =  $this->input->post('attributeid');
				$dat['name'] =  $this->input->post('name');
				$dat['arname'] =  $this->input->post('arname');
				$dat['arname'] =  $this->input->post('arname');
				$dat['search'] =  $this->input->post('search');
				$dat['type'] =  $this->input->post('type');
				$dat['primary'] =  $this->input->post('primary');
				
				
				$dat['attrname'] = $this->input->post('attrname');
				$dat['attrarname'] = $this->input->post('attrarname');
				$dat['attrvalue'] = $this->input->post('attrvalue');
				
				$dat['category'] =  $this->input->post('category');
				
			    $status = $this->MAttribute->editAttribute($dat);
				$this->View($data);
				exit(0);
				
				
				
			} 
		
	     //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Attributes/View";
        $data['breadcrumb_anchor1'] = "Attributes";
        $data['breadcrumb_link2'] = "/Attributes/Add";
        $data['breadcrumb_anchor2'] = "Edit Attribute"; 
		$data['activeMenu'] = "mnuJobs";
        $data['main_content'] = "Admin/Attributes/edit";
        $this->load->view('Admin/default.php', $data);

    }

    //Show all the Models on 1 page..
    public function View($data='')
    {
        //Load languages and Default Language
		$data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        $this->load->model("MAttribute");
        $data['Attributes'] = $this->MAttribute->viewAttribute()->result();
        //seperate data according to languages in different arrays
        
        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Attributes/View";
        $data['breadcrumb_anchor1'] = "Attributes";
        $data['breadcrumb_link2'] = "";
        $data['breadcrumb_anchor2'] = ""; 
		$data['activeMenu'] = "mnuJobs";
        $data['main_content'] = "Admin/Attributes/view";
        $this->load->view("Admin/default.php", $data);
    }

    //Delete Service
    public function Delete()
    {
        $id = (int)$this->input->get('id');

        $this->load->model("MAttribute");
        $status = $this->MAttribute->deleteAttribute($id);

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