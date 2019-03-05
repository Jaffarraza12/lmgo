<?php

class Album extends CI_Controller {

    //Show the view for adding new news
    public function Add()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();


        $this->load->model("malbum");

        //$data['categories'] = $this->MCategories->MainCategories()->result_array();
        //$data['categoryarranged'] = $this->MCategories->Categoryarrange();

        if($this->input->post('name') )
        {
            $dat['name'] =  ($this->input->post('name'));
            $dat['heading'] =  ($this->input->post('heading'));
            $dat['description'] =  ($this->input->post('description'));
            $dat['sts'] =  time();
            $dat['mts'] =  time();

            $status = $this->malbum->add($dat);
            if($status){
                $data['status'] = "New Album Added Successfully";
                $data['statusCode'] = 1;
            } else {
                $data['status'] = "Error While adding Degree";
                $data['statusCode'] = 0;
            }
            $this->View($data);
            exit(0);
        }

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Album/View";
        $data['breadcrumb_anchor1'] = "Album";
        $data['breadcrumb_link2'] = "/Album/Add";
        $data['breadcrumb_anchor2'] = "Add New Album";
        $data['activeMenu'] = "mnuDirectory";
        $data['main_content'] = "Admin/Album/add";
        $this->load->view('Admin/default.php', $data);


    }

    //Show the view to edit news
    public function Edit()
    {
        //Load languages and Default Language
        $degree_id = (int)$this->input->get('id');
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
        $this->load->model("malbum");


        $album = $this->malbum->GetById($degree_id)->row();
        $data['album']= $album;

        if ($degree_id) {
            if ($this->input->post('name')) {
               $dat['name'] = $this->input->post('name');
               $dat['heading'] =  $this->input->post('heading');
               $dat['description'] =  $this->input->post('description');
               $dat['sts'] =  time();
               $dat['mts'] =  time();
               $status = $this->malbum->edit($dat,$degree_id);

                if ($status) {
                    $data['status'] = "Album Has Been Modified !";
                    $data['statusCode'] = 1;
                } else {
                    $data['status'] = "Error While Modifying Degree";
                    $data['statusCode'] = 0;
                }
                $this->View($data);
                exit(0);
            }


            //BreadCrumb URLs
            $data['breadcrumb_link1'] = "/Album/View";
            $data['breadcrumb_anchor1'] = "Album";
            $data['breadcrumb_link2'] = "/Album/Add";
            $data['breadcrumb_anchor2'] = "Add New Album";
            $data['activeMenu'] = "mnuDirectory";
            $data['main_content'] = "Admin/Album/edit";
            $this->load->view('Admin/default.php', $data);
        }
    }

     //Show all the news on 1 page..
    public function View($data='')
    {
		
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        $this->load->model("malbum");
        $data['results'] = $this->malbum->GetAll()->result();
        //seperate data according to languages in different arrays

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Album/View";
        $data['breadcrumb_anchor1'] = "Album ";
        $data['breadcrumb_link2'] = "";
        $data['breadcrumb_anchor2'] = "";
        $data['activeMenu'] = "mnuDirectory";
        $data['main_content'] = "Admin/Album/view";
        $this->load->view("Admin/default.php", $data);
    }


  	public function Delete()
	{
		
		$this->load->model('malbum');
		
		$degree_id = $this->input->get("id");
		
		$success = $this->malbum->Delete($degree_id);
		
		if($success)
		{
			$json['status'] =  'success';
		}
		echo json_encode($json);
		
		
	}

	

}