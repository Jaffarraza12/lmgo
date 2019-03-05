<?php

class Degree extends CI_Controller {

    //Show the view for adding new news
    public function Add()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();


        $this->load->model("MDegree");

        //$data['categories'] = $this->MCategories->MainCategories()->result_array();
        //$data['categoryarranged'] = $this->MCategories->Categoryarrange();

        if($this->input->post('name') )
        {
            $dat['name'] =  $this->input->post('name');
            $status = $this->MDegree->add($dat);

            if($status){
                $data['status'] = "New Degree Added Successfully";
                $data['statusCode'] = 1;
            } else {
                $data['status'] = "Error While adding Degree";
                $data['statusCode'] = 0;
            }
            $this->View($data);
            exit(0);
        }

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Degree/View";
        $data['breadcrumb_anchor1'] = "Degree";
        $data['breadcrumb_link2'] = "/Degree/Add";
        $data['breadcrumb_anchor2'] = "Add New Degree";
        $data['activeMenu'] = "mnuDirectory";
        $data['main_content'] = "Admin/Degree/add";
        $this->load->view('Admin/default.php', $data);


    }

    //Show the view to edit news
    public function Edit()
    {
        //Load languages and Default Language
        $degree_id = (int)$this->input->get('id');
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
        $this->load->model("MDegree");


        $degree = $this->MDegree->GetById($degree_id)->row();
        $data['degree']= $degree;

        if ($degree_id) {

            if ($this->input->post('Submit')) {
               $dat['name'] = $this->input->post('name');
               $status = $this->MDegree->edit($dat,$degree_id);

                if ($status) {
                    $data['status'] = "Degree Has Been Modified !";
                    $data['statusCode'] = 1;
                } else {
                    $data['status'] = "Error While Modifying Degree";
                    $data['statusCode'] = 0;
                }
                $this->View($data);
                exit(0);
            }

            //BreadCrumb URLs
            $data['breadcrumb_link1'] = "/Degree/View";
            $data['breadcrumb_anchor1'] = "Degree";
            $data['breadcrumb_link2'] = "/Degree/Add";
            $data['breadcrumb_anchor2'] = "Add New Degree";
            $data['activeMenu'] = "mnuDirectory";
            $data['main_content'] = "Admin/Degree/edit";
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

        $this->load->model("MDegree");
        $data['degrees'] = $this->MDegree->GetAll()->result();
        //seperate data according to languages in different arrays

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Degree/View";
        $data['breadcrumb_anchor1'] = "Degree";
        $data['breadcrumb_link2'] = "";
        $data['breadcrumb_anchor2'] = "";
        $data['activeMenu'] = "mnuDirectory";
        $data['main_content'] = "Admin/Degree/view";
        $this->load->view("Admin/default.php", $data);
    }


  	public function Delete()
	{
		
		$this->load->model('MDegree');
		
		$degree_id = $this->input->get("id");
		
		$success = $this->MDegree->Delete($degree_id);
		
		if($success)
		{
			$json['status'] =  'success';
		}
		echo json_encode($json);
		
		
	}

	

}