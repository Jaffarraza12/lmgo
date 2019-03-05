<?php

class Categories extends CI_Controller {

    //Show the view for adding new Categories
    public function Add($data='')
    {
        //Load languages and Default Language
        //$data['Languages'] = $this->MUtils->getLanguages();
        //$data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
		$this->load->model("MCategories");
		
		$data['categories'] = $this->MCategories->MainCategories()->result_array();
		
		$options = $this->MCategories->getCategories(1)->result();
	
		$html = "<option value='0'>Select Sub Category</option>";
		
		foreach($options as  $val): 
		
			$html .= '<option value="'.$val->catid.'">'.$val->name.'</option>'; 
		
		endforeach;
		
		$data['subcategories'] = $html;
		
        $data['breadcrumb_link1'] = "/Categories/View";
        $data['breadcrumb_anchor1'] = "Categories";
        $data['breadcrumb_link2'] = "/Categories/Add";
        $data['breadcrumb_anchor2'] = "Add New Categorie";

        $data['activeMenu'] = "mnuDirectory";
        $data['main_content'] = "Admin/Categories/add";
        $this->load->view('Admin/default.php', $data);

    }

    //Show the view to edit page
    public function Edit()
    {
        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Categories/View";
        $data['breadcrumb_anchor1'] = "Categories";
        $data['breadcrumb_link2'] = "/Categories/Edit?id=" .(int)$this->input->get("id");
        $data['breadcrumb_anchor2'] = "Edit Categorie";
		$this->load->model("MCategories");
		$data['category_id'] = (int) $this->input->get("id");
		
		
		$categorieinfo = $this->MCategories->viewCategoryById($data['category_id'])->row_array();
		$data['categories'] = $this->MCategories->MainCategories()->result_array();
		$options = $this->MCategories->getCategories($categorieinfo['parentid'])->result();
	
		$html = "<option value='0'>Select Sub Category</option>";

		
		$data['name'] = $categorieinfo['name'];
		$data['pid'] = $categorieinfo['pid'];
		$data['activeMenu'] = "mnuDirectory";
        $data['main_content'] = "Admin/Categories/edit";
        $this->load->view('Admin/default.php', $data);

    }
	

    public function AddCategories()
    {
        //Load languages and Default Language
		$this->load->model("MCategories");
		$status = "";
		$error = "";
		 
		$data['name'] = $this->input->post('name');
		$data['pid'] =  (int) $this->input->post('pid');


        $status = $this->MCategories->addCategorie($data);
		if ($status==1)
		{
				$data['status'] = "Category Has Been Added Successfully.";
				$data['statusCode'] = 1;
		}
		else
		{
				$data['status'] = "Error occurred while adding new Category.";
				$data['statusCode'] = 0;
		}
		
		$this->View($data);
		
    }

    //Edit page dat in database
    public function EditCategories()
    {
		
      	$this->load->model("MCategories");
		$status = "";
		$error = "";
	
		 
		$data['name'] = $this->input->post('name');
		$data['pid'] = $this->input->post('pid');
		$data['category_id'] = $this->input->post('category_id');
		
		
		
		$status = "";
		$status = $this->MCategories->editCategorie($data);	
		if ($status==1)
		{
				$data['status'] = "Category Has Been Modified!.";
				$data['statusCode'] = 1;
		}
		else
		{
				$data['status'] = "Error occurred in Modifying Category!";
				$data['statusCode'] = 0;
		}
		$this->View($data);
		
    }

    //Show all the Categories on 1 page..
    public function View($data='')
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Categories/View";
        $data['breadcrumb_anchor1'] = "Categories";
        $data['breadcrumb_link2'] = "/Categories/View";
        $data['breadcrumb_anchor2'] = "Manage Categories";

        $data['activeMenu'] = "mnuDirectory";

        //Loading Data for this view
        $this->load->model("MCategories");
                //seperate data according to languages in different arrays
        $data['view'] = $this->MCategories->viewCategories()->result() ;
		

        $data['main_content'] = "Admin/Categories/view";
        $this->load->view("Admin/default.php", $data);
    }
	
	
	public function getCategories()
	{
		$this->load->model("MCategories");
		
		
		$catid = (int) $this->input->get('id');
		
		$options = $this->MCategories->getCategories($catid)->result();
	
		$json = array();
		
		$html = "";

		foreach($options as  $val):


			$html .= '<option value="'.$val->catid.'">'.$val->name.'</option>';

		endforeach;

		$json['categories'] = $html;
		
		$json['status'] = "success";
		
		echo json_encode($json);	
		
	}

    //Delete Page
    public function Delete()
    {
        $id = (int) $this->input->get('id');

        $this->load->model("MCategories");
        $status = $this->MCategories->deleteCategory($id);

        if ($status)
            $this->MUtils->setSuccess("Record Deleted Successfully");
        else
            $this->MUtils->setError("Error occurred while deleting record");

        echo $this->MUtils->getStatus();
    }

}