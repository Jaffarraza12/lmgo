<?php

class Owners extends CI_Controller {

    //Show the view for adding new Owners
    public function Add($data='')
    {
        //Load languages and Default Language
        //$data['Languages'] = $this->MUtils->getLanguages();
        //$data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
		
		$data['name'] = ($data['name'] == '') ? '' : $data['name'];
		$data['username'] = ($data['username'] == '') ? '' : $data['username'];
		$data['email'] = ($data['email'] == '') ? '' : $data['email'];
		
        $data['breadcrumb_link1'] = "/Owners/View";
        $data['breadcrumb_anchor1'] = "Owners";
        $data['breadcrumb_link2'] = "/Owners/Add";
        $data['breadcrumb_anchor2'] = "Add New Owner";

        $data['activeMenu'] = "mnuDirectory";
        $data['main_content'] = "Admin/Owners/add";
        $this->load->view('Admin/default.php', $data);

    }

    //Show the view to edit page
    public function Edit($error='', $ownerid=0)
    {
        //BreadCrumb URLs
		
		$ownerid = ($ownerid != 0) ? $ownerid   : (int)$this->input->get("id");
	    $data['breadcrumb_link1'] = "/Owners/View";
        $data['breadcrumb_anchor1'] = "Owners";
        $data['breadcrumb_link2'] = "/Owners/Edit?id=" . $ownerid;
        $data['breadcrumb_anchor2'] = "Edit Owner";
		$this->load->model("MOwners");
		$this->load->model("MCategories");
		
		if($error!="")
		{
			$data['status'] = $error['status'];
			$data['statusCode'] = $error['statusCode'];			
		}
			
		
		$data['categories'] = $this->MCategories->MainCategories()->result_array();
		
		$data['shopowners'] = $this->MCategories->ShopOwners($ownerid);
	
		$data['shoparranged'] = $this->MCategories->Shoparrange();
		
		$data['ownerid'] = $ownerid;
		
		
		$ownerinfo = $this->MOwners->viewOwnersById($ownerid)->row_array();
		
		$data['name'] = ($ownerinfo['name'] == '') ? '' : $ownerinfo['name'];
		$data['username'] = ($ownerinfo['username'] == '' ) ? '' : $ownerinfo['username'];
		$data['email'] = ( $ownerinfo['email'] == '' ) ? '' : $ownerinfo['email'];
		
			
	
        $data['activeMenu'] = "mnuDirectory";

        //Loading Data for this view
       
        
		

        $data['main_content'] = "Admin/Owners/edit";
        $this->load->view('Admin/default.php', $data);

    }
	
	

    //Add new page in the database
    public function AddOwner()
    {
        //Load languages and Default Language
		$this->load->model("MOwners");
		$status = "";
		$error = "";
		 
		$data['name'] = $this->input->post('name' );
		$data['username'] = $this->input->post('username');
		$data['password'] = md5($this->input->post('password'));
		$data['email'] = $this->input->post('email');
		$data['category'] = $this->input->post('category');
		
		
		 
		if($this->MOwners->checkfield('username',$this->input->post('username')) > 0)
		{
			 $data['status'] = "Username already exit!"; 
			 $data['statusCode'] = 0;
			 $this->Add($data);	

					
		} elseif ($this->MOwners->checkfield('email',$this->input->post('email')) > 0)
		{
			 $data['status'] = "Email already exit!"; 
			 $data['statusCode'] = 0;
			 $this->Add($data);	
			 
		} else {
			$status = "";
			$status = $this->MOwners->addOwner($data);
			if ($status==1)
			{
				$data['status'] = "Owner Has Been Added Successfully.";
				$data['statusCode'] = 1;
			}
			else
			{
				$data['status'] = "Error occurred while adding new Owner.";
				$data['statusCode'] = 0;
			}
			$this->View($data);
		}
    }

    //Edit page dat in database
    public function EditOwner()
    {

      	$this->load->model("MOwners");
		$status = "";
		$error = "";
		 
		$data['name'] = $this->input->post('name' );
		$data['username'] = $this->input->post('username');
		if($this->input->post('password')!="")
		{ $data['password'] = md5($this->input->post('password')); }
		$data['email'] = $this->input->post('email');
		$data['ownerid'] = $this->input->post('ownerid');
		$data['category'] = $this->input->post('category');
		
		
		 
		if($this->MOwners->checkfield('username',$this->input->post('username')) > 1)
		{
			 $error['status'] = "Username already exit!"; 
			 $error['statusCode'] = 0;
			 $this->Edit($error,$data['ownerid']);	

					
		} elseif ($this->MOwners->checkfield('email',$this->input->post('email')) > 1)
		{
			 $error['status'] = "Email already exit!"; 
			 $error['statusCode'] = 0;
			 $this->Edit($error,$data['ownerid']);	
			 
		} else
		{
			
			
			
			 foreach($data['category'] as $val)
			 {
				
				if($this->MOwners->CheckOwnerShop($val,$data['ownerid']) != 'NOB')
				{
						
				 $error['status'] = $this->MOwners->CheckOwnerShop($val,$data['ownerid']); 
				 $error['statusCode'] = 0;
				 $this->Edit($error,$data['ownerid']);
				
					
				}	 
			}
		if($error == "")
		{
			$status = "";
			$status = $this->MOwners->editOwner($data);
			if ($status==1)
			{
				$data['status'] = "Shop Has Been Added Successfully.";
				$data['statusCode'] = 1;
			}
			else
			{
				$data['status'] = "Error occurred while adding new Shop.";
				$data['statusCode'] = 0;
			}
			$this->View($data);
		}
		}
		
    }

    //Show all the Owners on 1 page..
    public function View($data='')
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Owners/View";
        $data['breadcrumb_anchor1'] = "Owners";
        $data['breadcrumb_link2'] = "/Owners/View";
        $data['breadcrumb_anchor2'] = "Manage Owners";

        $data['activeMenu'] = "mnuDirectory";

        //Loading Data for this view
        $this->load->model("MOwners");
                //seperate data according to languages in different arrays
        $data['view'] = $this->MOwners->viewOwners()->result() ;
		

        $data['main_content'] = "Admin/Owners/view";
        $this->load->view("Admin/default.php", $data);
    }

    //Delete Page
    public function Delete()
    {
        $id = (int)$this->input->get('id');

        $this->load->model("MOwners");
        $status = $this->MOwners->deleteOwners($id);

        if ($status)
            $this->MUtils->setSuccess("Record Deleted Successfully");
        else
            $this->MUtils->setError("Error occurred while deleting record");

        echo $this->MUtils->getStatus();
    }

}