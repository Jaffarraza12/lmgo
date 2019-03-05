<?php

class JobType extends CI_Controller {

    //Show the view for adding new news
    public function Add()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();


        $this->load->model("MJobType");

        //$data['categories'] = $this->MCategories->MainCategories()->result_array();
        //$data['categoryarranged'] = $this->MCategories->Categoryarrange();

        if($this->input->post('name') )
        {

            $dat['name'] =  $this->input->post('name');
            $status = $this->MJobType->addJobtype($dat);
            if($status){
                $data['status'] = "New Job Type Added Successfully";
                $data['statusCode'] = 1;
            } else {
                $data['status'] = "Error While adding Job Types";
                $data['statusCode'] = 0;
            }
            $this->View($data);
            exit(0);
        }

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/JobType/View";
        $data['breadcrumb_anchor1'] = "Job Type";
        $data['breadcrumb_link2'] = "/JobType/Add";
        $data['breadcrumb_anchor2'] = "Add New Job Type";
        $data['activeMenu'] = "mnuJobs";
        $data['main_content'] = "Admin/JobType/add";
        $this->load->view('Admin/default.php', $data);


    }

    //Show the view to edit news
    public function Edit()
    {
        //Load languages and Default Language
        $job_type_id = (int)$this->input->get('id');
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
        $this->load->model("MJobType");


        $jobtype = $this->MJobType->GetJobTypeById($job_type_id)->row();
        $data['jobtype']= $jobtype;

        if ($job_type_id) {

            if ($this->input->post('Submit')) {
               $dat['name'] = $this->input->post('name');
               $status = $this->MJobType->editJobtype($dat,$job_type_id);

                if ($status) {
                    $data['status'] = "Job Type Has Been Modified !";
                    $data['statusCode'] = 1;
                } else {
                    $data['status'] = "Error While Modifying Job Types";
                    $data['statusCode'] = 0;
                }
                $this->View($data);
                exit(0);
            }

            //BreadCrumb URLs
            $data['breadcrumb_link1'] = "/JobType/View";
            $data['breadcrumb_anchor1'] = "Job Type";
            $data['breadcrumb_link2'] = "/JobType/Add";
            $data['breadcrumb_anchor2'] = "Add New Job Type";
            $data['activeMenu'] = "mnuJobs";
            $data['main_content'] = "Admin/JobType/edit";
            $this->load->view('Admin/default.php', $data);
        }
    }

    //Add new news in the database
    public function AddJob()
    {
        //Load languages and Default Language
        $languages = $this->MUtils->getLanguages();
        $data['Languages'] = $languages;
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Ads/Edit";
        $data['breadcrumb_anchor1'] = "Ads";
        $data['breadcrumb_link2'] = "/Ads/Add";
        $data['breadcrumb_anchor2'] = "Add Ads";
		
        $data['activeMenu'] = "mnuJobs";
		
        $data['smallImage'] = $this->MUtils->doUploadWithCropping('smallFile', 70, 92);
        //$data['largeImage'] = $this->MUtils->doUpload('largeFile',0 ,0, false);
        //$data['sliderImage'] = $this->MUtils->doUpload('sliderFile', 1920, 530, true);
        $data['seo_url'] = $this->input->post('seo_url');
		
	
        foreach ($languages as $lang)
        {
            $data['title_' . $lang->code] = $this->input->post('title_' . $lang->code);
		    $data['description_' . $lang->code] = $this->input->post('editor_' . $lang->code);
            
        }
		
		
		$data['job_type_id'] = $this->input->post("job_type_id");
		$data['category_id'] = $this->input->post("category_id");
		$data['employer_id'] = $this->input->post("employer_id");
		$data['country_id'] = $this->input->post("country_id");
		$data['city_id'] = $this->input->post("city_id");
		
        $defaultCode = $languages[0]->code;
    	$status = "";
		$attributes = $this->input->post("attribute");
		
        
		if ( isset($_POST['title_' . $defaultCode] ) )
        {
         
		   $this->load->model("MJobs");
		   $status = $this->MJobs->AddJob($data,$attributes);
        }

        if ($status==1)
        {
            $data['status'] = "New Job Added Successfully.";
            $data['statusCode'] = 1;
        }
        else
        {
            $data['status'] = "Error occurred while adding new job.";
            $data['statusCode'] = 0;
        }
        $this->View($data);
    }

    //Edit news dat in database
    public function EditJob()
    {
        //Load languages and Default Language
        $languages = $this->MUtils->getLanguages();
        $data['Languages'] = $languages;
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Jobs/View";
        $data['breadcrumb_anchor1'] = "Ads";
        $data['breadcrumb_link2'] = "/Jobs/Edit/".$this->input->post("job_id");
        $data['breadcrumb_anchor2'] = "Jobs Edit";

        $data['activeMenu'] = "mnuJobs";



        foreach ($languages as $lang)
        {
            $data['title_' . $lang->code] = $this->input->post('title_' . $lang->code);
            $data['description_' . $lang->code] = $this->input->post('editor_' . $lang->code);

        }

        $data['job_id'] = $this->input->post("job_id");
        $data['job_type_id'] = $this->input->post("job_type_id");
        $data['category_id'] = $this->input->post("category_id");
        $data['employer_id'] = $this->input->post("employer_id");
        $data['country_id'] = $this->input->post("country_id");
        $data['city_id'] = $this->input->post("city_id");

        $defaultCode = $languages[0]->code;
        $status = "";
        $attributes = $this->input->post("attribute");


        if ( isset($_POST['title_' . $defaultCode] ) )
        {

            $this->load->model("MJobs");
            $status = $this->MJobs->EditJob($data,$attributes);
        }

        if ($status==1)
        {
            $data['status'] = " Job Modified Successfully.";
            $data['statusCode'] = 1;
        }
        else
        {
            $data['status'] = "Error occurred while adding new job.";
            $data['statusCode'] = 0;
        }
        $this->View($data);

    }

    //Show all the news on 1 page..
    public function View($data='')
    {
		
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        $this->load->model("MJobType");
        $data['Attributes'] = $this->MJobType->GetAll()->result();
        //seperate data according to languages in different arrays

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/JobType/View";
        $data['breadcrumb_anchor1'] = "Job Types";
        $data['breadcrumb_link2'] = "";
        $data['breadcrumb_anchor2'] = "";
        $data['activeMenu'] = "mnuJobs";
        $data['main_content'] = "Admin/JobType/view";
        $this->load->view("Admin/default.php", $data);
    }


  	public function JobTypeDelete()
	{
		
		$this->load->model('MJobType');
		
		$job_type_id = $this->input->get("id");
		
		$success = $this->MJobType->DeleteJobType($job_type_id);
		
		if($success)
		{
			$json['status'] =  'success';
		}
		echo json_encode($json);
		
		
	}

	

}