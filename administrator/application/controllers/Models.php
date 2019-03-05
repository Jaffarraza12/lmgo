<?php 

class Models extends CI_Controller {

    //Show the view for adding new Model
    public function Add()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
		
		
		$this->load->model("MCategories");
		$this->load->model("MModels");
		
		$data['categories'] = $this->MCategories->MainCategories()->result_array();
		
		
		$options = $this->MCategories->getCategories(1)->result();
		
			if($this->input->post('Submit') )
			{
				
				$dat['name'] =  $this->input->post('name');
				$dat['arname'] =  $this->input->post('arname');
				$dat['catid'] =  $this->input->post('category');
				$status = $this->MModels->addModel($dat);
				$data['status'] = $status;
        	    $data['statusCode'] = 1;
				$this->View($data);
				exit(0);
			} 
		
		$html = "<option value='0'>Select Sub Category</option>";
		
		foreach($options as  $val): 
		
			$html .= '<option value="'.$val->catid.'">'.$val->name.'</option>'; 
		
		endforeach;
		
		$data['subcategories'] = $html;
		

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Models/View";
        $data['breadcrumb_anchor1'] = "Models";
        $data['breadcrumb_link2'] = "/Models/Add";
        $data['breadcrumb_anchor2'] = "Add New Model";

        $data['activeMenu'] = "mnuDirectory";

        $data['main_content'] = "Admin/Models/add";
        $this->load->view('Admin/default.php', $data);

    }

    //Show the view to edit Model
    public function Edit()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
	    $data['modelid'] = (int) $this->input->get("id");
   

        //Loading Data for this view
        $this->load->model("MCategories");
		$this->load->model("MModels");
		$data['categories'] = $this->MCategories->MainCategories()->result_array();
		$modelinfo  = $this->MModels->viewModelById($data['modelid'])->row();
		
			
		if($this->input->post('Submit') )
			{
				
				$dat['name'] =  $this->input->post('name');
				$dat['arname'] =  $this->input->post('arname');
				$dat['catid'] =  $this->input->post('category');
				$dat['modelid'] =  $this->input->post('modelid');
				
				$status = $this->MModels->editModel($dat);
				$data['status'] = $status;
        	    $data['statusCode'] = 1;
				$this->View($data);
				exit(0);
				
			} 
		
		
		$data['pid']=  $modelinfo->pid;
		$data['catid']= $modelinfo->catid;
		$data['name']= $modelinfo->name;
		$data['arname']= $modelinfo->arname;
		
		$options = $this->MCategories->getCategories(6)->result();
		$options2 = $this->MCategories->getCategories($data['pid'])->result();
		
		
		
		$html = "<option value='0'>Select Category</option>";
		
		foreach($options as  $val): 
			$select = ($val->catid== $data['pid']) ? 'selected="selected"' : '';  
			$html .= '<option '.$select.' value="'.$val->catid.'">'.$val->name.'</option>'; 
		
		endforeach;
		$data['subcategories'] = $html;
		
		$html = "<option value='0'>Select Sub Category</option>";
		foreach($options2 as  $val):
			$select = ($val->catid == $data['catid']) ? 'selected="selected"' : '';   
			$html .= '<option '.$select.' value="'.$val->catid.'">'.$val->name.'</option>'; 
		
		endforeach;	
		$data['subcategories2'] = $html;
	
		
        //seperate data according to languages in different arrays
    
        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Models/View";
        $data['breadcrumb_anchor1'] = "Models";
        $data['breadcrumb_link2'] = "/Models/Edit?id=" + $data['modelid'] ;
        $data['breadcrumb_anchor2'] = "Edit Model";

        $data['activeMenu'] = "mnuDirectory";

        $data['main_content'] = "Admin/Models/edit";
        $this->load->view('Admin/default.php', $data);

    }

    //Show all the Models on 1 page..
    public function View($data='')
    {
        //Load languages and Default Language
		$data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        $this->load->model("MModels");
        $data['Models'] = $this->MModels->view()->result();
        //seperate data according to languages in different arrays
        
        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Models/View";
        $data['breadcrumb_anchor1'] = "Models";
        $data['breadcrumb_link2'] = "";
        $data['breadcrumb_anchor2'] = "";

        $data['activeMenu'] = "mnuDirectory";

        $data['main_content'] = "Admin/Models/view";
        $this->load->view("Admin/default.php", $data);
    }

    //Delete Service
    public function Delete()
    {
        $id = (int)$this->input->get('id');

        $this->load->model("MModels");
        $status = $this->MModels->deleteModel($id);

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