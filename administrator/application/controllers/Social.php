<?php

class Social extends CI_Controller {

    //Show the view for adding new Social
    public function Add($data='')
    {
        //Load languages and Default Language
        //$data['Languages'] = $this->MUtils->getLanguages();
        //$data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
		
		
        $data['breadcrumb_link1'] = "/Social/View";
        $data['breadcrumb_anchor1'] = "Social";
        $data['breadcrumb_link2'] = "/Social/Add";
        $data['breadcrumb_anchor2'] = "Add New Social";

        $data['activeMenu'] = "mnuPassword";
        $data['main_content'] = "Admin/Social/insert";
        $this->load->view('Admin/default.php', $data);

    }

    //Show the view to edit page
    public function Edit()
    {
        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Social/View";
        $data['breadcrumb_anchor1'] = "Social";
        $data['breadcrumb_link2'] = "/Social/Edit?id=" . $this->input->get("id");
        $data['breadcrumb_anchor2'] = "Edit Social";
		$this->load->model("MSocial");
		
	
	
		$data['socialid'] = $this->input->get("id");
		
		$socialinfo = $this->MSocial->viewSocialById($data['socialid'])->row_array();
		
		$data['name'] = ($socialinfo['name'] == '') ? '' : $socialinfo['name'];
		$data['link'] = ($socialinfo['link'] == '') ? '' : $socialinfo['link'];
		$data['icon'] = ($socialinfo['icon'] == '') ? '' : $socialinfo['icon'];
		$data['status'] = ($socialinfo['status'] == 0) ? 0 : 1;
		
		

        $data['activeMenu'] = "mnuPassword";

        //Loading Data for this view
       
        
		

        $data['main_content'] = "Admin/social/update";
        $this->load->view('Admin/default.php', $data);

    }

    //Add new page in the database
    public function AddSocial()
    {
        //Load languages and Default Language
		$this->load->model("MSocial");
		$status = "";
		$error = "";
		 
		$data['name'] = $this->input->post('name' );
		$data['link'] = $this->input->post('link' );
		$data['icon'] = $this->MUtils->doUpload('socialicon', 110, 110, false);
		
		
		$status = "";
		$status = $this->MSocial->AddSocial($data);
		if ($status==1)
		{
				$data['status'] = "Social Has Been Added .";
				$data['statusCode'] = 1;
		}
		else
		{
				$data['status'] = "Error occurred while adding new Social.";
				$data['statusCode'] = 0;
		}
			$this->View($data);
		
    }

    //Edit page dat in database
    public function EditSocial()
    {

      	$this->load->model("MSocial");
		$status = "";
		$error = "";
		 
		
		$data['name'] = $this->input->post('name' );
		$data['link'] = $this->input->post('link' );
		$data['socialid'] = $this->input->post('socialid');
		if($_FILES['socialicon']['name'] != "")
		{
			$data['icon'] = $this->MUtils->doUpload('socialicon', 110, 110, false);
		}
		
		$status = "";
		$status = $this->MSocial->EditSocial($data);
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

    //Show all the Social on 1 page..
    public function View($data='')
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Social/View";
        $data['breadcrumb_anchor1'] = "Social";
        $data['breadcrumb_link2'] = "/Social/View";
        $data['breadcrumb_anchor2'] = "Manage Social";

        $data['activeMenu'] = "mnuPassword";

        //Loading Data for this view
        $this->load->model("MSocial");
                //seperate data according to languages in different arrays
        $data['view'] = $this->MSocial->viewSocialNetwork()->result() ;
		

        $data['main_content'] = "Admin/Social/view";
        $this->load->view("Admin/default.php", $data);
    }

    //Delete Page
    public function Delete()
    {
        $id = $this->input->get('id');

        $this->load->model("MSocial");
        $status = $this->MSocial->deleteSocial($id);

        if ($status)
            $this->MUtils->setSuccess("Record Deleted Successfully");
        else
            $this->MUtils->setError("Error occurred while deleting record");

        echo $this->MUtils->getStatus();
    }

}