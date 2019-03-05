<?php

class Testomonial extends CI_Controller {

    //Show the view for adding new news
    public function Add()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();


        $this->load->model("MTestomonial");

        //$data['categories'] = $this->MCategories->MainCategories()->result_array();
        //$data['categoryarranged'] = $this->MCategories->Categoryarrange();

        if($this->input->post('name') )
        {
            $dat['name'] =  $this->input->post('name');
            $dat['message'] =  $this->input->post('message');
            $dat['pic'] = $this->MUtils->doUploadWithCropping('pic', 70, 70 ,'../uploads/testomonials/');
            $dat['status'] = $this->input->post('status');

            $status = $this->MTestomonial->add($dat);


            if($status){
                $data['status'] = "New Testomonial Added Successfully";
                $data['statusCode'] = 1;
            } else {
                $data['status'] = "Error While adding Testomonial";
                $data['statusCode'] = 0;
            }
            $this->View($data);
            exit(0);
        }

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Testomonial/View";
        $data['breadcrumb_anchor1'] = "Testomonial";
        $data['breadcrumb_link2'] = "/Testomonial/Add";
        $data['breadcrumb_anchor2'] = "Add New Testomonial";
        $data['activeMenu'] = "mnuDirectory";
        $data['main_content'] = "Admin/Testomonial/add";
        $this->load->view('Admin/default.php', $data);


    }

    //Show the view to edit news
    public function Edit()
    {
        //Load languages and Default Language
        $testo_id = (int)$this->input->get('id');
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
        $this->load->model("MTestomonial");


        $testomonial = $this->MTestomonial->GetById($testo_id)->row();
        $data['testomonial']= $testomonial;

        if ($testo_id) {

            if ($this->input->post('Submit')) {
                  $dat['name'] = $this->input->post('name');
                $dat['message'] = $this->input->post('message');
                if ( $_FILES['pic']['name']) {
                $dat['pic'] = $this->MUtils->doUploadWithCropping('pic', 70, 70, '../uploads/testomonials/');
                }

                $dat['status'] = $this->input->post('status');
                $status = $this->MTestomonial->edit($dat,$testo_id);

                if ($status) {
                    $data['status'] = "Testomonial Has Been Modified !";
                    $data['statusCode'] = 1;
                } else {
                    $data['status'] = "Error While Modifying Testomonial";
                    $data['statusCode'] = 0;
                }
                $this->View($data);
            }

            //BreadCrumb URLs
            $data['breadcrumb_link1'] = "/Testomonial/View";
            $data['breadcrumb_anchor1'] = "Testomonial";
            $data['breadcrumb_link2'] = "/Testomonial/Edit";
            $data['breadcrumb_anchor2'] = "Edit this Testomonial";
            $data['activeMenu'] = "mnuDirectory";
            $data['main_content'] = "Admin/Testomonial/edit";
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

        $this->load->model("MTestomonial");
        $data['testomonials'] = $this->MTestomonial->GetAll()->result();
        //seperate data according to languages in different arrays

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Testomonial/View";
        $data['breadcrumb_anchor1'] = "Testomonial";
        $data['breadcrumb_link2'] = "";
        $data['breadcrumb_anchor2'] = "";
        $data['activeMenu'] = "mnuDirectory";
        $data['main_content'] = "Admin/Testomonial/view";
        $this->load->view("Admin/default.php", $data);
    }


  	public function Delete()
	{
		
		$this->load->model('MTestomonial');
		
		$testo_id = $this->input->get("id");
		
		$success = $this->MTestomonial->Delete($testo_id);
		
		if($success)
		{
			$json['status'] =  'success';
		}
		echo json_encode($json);
		
		
	}

	

}