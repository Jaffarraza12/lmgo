<?php

class Groups extends CI_Controller {

    //Show the view for adding new news
    public function Add()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();


        $this->load->model("MGroup");
        $this->load->model("MCategories");
        $this->load->model('MCountryCity');



        $data['categories'] = $this->MCategories->MainCategories()->result();
        $data['countries'] = $this->MCountryCity->getCountries()->result();
        $data['cities'] = $this->MCountryCity->getCities()->result();


        if($this->input->post('group_name') )
        {
            $dat['group_name'] =  $this->input->post('group_name');
            $dat['category_id'] =  $this->input->post('category_id');
            $dat['description'] =  $this->input->post('description');
            $dat['operating'] =  $this->input->post('operating');
            $dat['name'] =  $this->input->post('name');
            $dat['gender'] =  $this->input->post('gender');
            $dat['email'] =  $this->input->post('email');
            $dat['phone'] =  $this->input->post('phone');
            $dat['dob'] = strtotime( $this->input->post('dob') );
            $dat['address'] =  $this->input->post('address');
            $dat['nationality'] =  $this->input->post('nationality');
            $dat['state'] =  $this->input->post('city_id');
            $status = $this->MGroup->add($dat);


            if($status){
                $data['status'] = "New Group Added Successfully";
                $data['statusCode'] = 1;
            } else {
                $data['status'] = "Error While adding Testomonial";
                $data['statusCode'] = 0;
            }
            $this->View($data);
            exit(0);
        }

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Groups/View";
        $data['breadcrumb_anchor1'] = "Group";
        $data['breadcrumb_link2'] = "/Groups/Add";
        $data['breadcrumb_anchor2'] = "Add New Group";
        $data['activeMenu'] = "mnuDirectory";
        $data['main_content'] = "Admin/Group/add";
        $this->load->view('Admin/default.php', $data);


    }

    //Show the view to edit news
    public function Edit()
    {
        //Load languages and Default Language
        $group_id = (int)$this->input->get('id');
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
        $this->load->model("MGroup");
        $this->load->model("MCategories");
        $this->load->model('MCountryCity');


         $group = $this->MGroup->GetById($group_id)->row() ;

        $data['categories'] = $this->MCategories->MainCategories()->result();
        $data['countries'] = $this->MCountryCity->getCountries()->result();
        $data['cities'] = $this->MCountryCity->getCities( $group->nationality )->result();
        $data['group_id'] = $group_id;
        $data['group']= $group;

        if ($group_id) {

            if ($this->input->post('Submit')) {
                $dat['group_name'] =  $this->input->post('group_name');
                $dat['category_id'] =  $this->input->post('category_id');
                $dat['description'] =  $this->input->post('description');
                $dat['operating'] =  $this->input->post('operating');
                $dat['name'] =  $this->input->post('name');
                $dat['gender'] =  $this->input->post('gender');
                $dat['email'] =  $this->input->post('email');
                $dat['phone'] =  $this->input->post('phone');
                $dat['dob'] = strtotime( $this->input->post('dob') );
                $dat['address'] =  $this->input->post('address');
                $dat['nationality'] =  $this->input->post('nationality');
                $dat['state'] =  $this->input->post('city_id');
                $status = $this->MGroup->edit($dat,$group_id);

                if ($status) {
                    $data['status'] = "Group Has Been Modified !";
                    $data['statusCode'] = 1;
                } else {
                    $data['status'] = "Error While Modifying Group";
                    $data['statusCode'] = 0;
                }
                $this->View($data);
            }

            //BreadCrumb URLs
            $data['breadcrumb_link1'] = "/Groups/View";
            $data['breadcrumb_anchor1'] = "Groups";
            $data['breadcrumb_link2'] = "/Groups/Edit";
            $data['breadcrumb_anchor2'] = "Edit this Group";
            $data['activeMenu'] = "mnuDirectory";
            $data['main_content'] = "Admin/Group/edit";
            $this->load->view('Admin/default.php', $data);
        }
    }

    //Add new news in the database


    //Edit news dat in database
    //Show all the news on 1 page..
    public function View($data='')
    {
		
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        $this->load->model("MGroup");
        $data['groups'] = $this->MGroup->GetAll()->result();
        //seperate data according to languages in different arrays

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Groups/View";
        $data['breadcrumb_anchor1'] = "Group";
        $data['breadcrumb_link2'] = "";
        $data['breadcrumb_anchor2'] = "";
        $data['activeMenu'] = "mnuDirectory";
        $data['main_content'] = "Admin/Group/view";
        $this->load->view("Admin/default.php", $data);
    }


  	public function Delete()
	{
		
		$this->load->model('MGroup');
		
		$group_id = $this->input->get("id");
		
		$success = $this->MGroup->Delete($group_id);
		
		if($success)
		{
			$json['status'] =  'success';
		}
		echo json_encode($json);
		
		
	}

	

}