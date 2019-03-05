<?php

class Jobs extends CI_Controller {

    //Show the view for adding new news
    public function Add()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
		$this->load->model('MJobType');
		$this->load->model('MEmployer');
		$this->load->model('MCountryCity');
		$this->load->model('MCategories');
		$this->load->model('MAttribute');

		$data['jobtypes'] = $this->MJobType->GetAll()->result();
		$data['employers'] = $this->MEmployer->GetAll()->result();
		$data['countries'] = $this->MCountryCity->getCountries()->result();
		$data['categories'] = $this->MCategories->viewCategories()->result();
		$data['attributes']= $this->MAttribute->viewAttribute()->result();
		foreach($data['attributes'] as $attribute):

			$attribute_options = $this->MAttribute->AttributeOptionsbyID($attribute->attribute_id)->result();
			foreach($attribute_options as $option):
				$data['attribute_option'][$attribute->attribute_id][] = array(
						'attribute_option_id' => $option->attribute_option_id,
						'name' => $option->name,
						'type' => $option->type,
					);
			endforeach;

		endforeach;


        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Jobs/View";
        $data['breadcrumb_anchor1'] = "Jobs";
        $data['breadcrumb_link2'] = "/Jobs/Add";
        $data['breadcrumb_anchor2'] = "Jobs Ads";

        $data['activeMenu'] = "mnuJobs";

        $data['main_content'] = "Admin/Jobs/add";
        $this->load->view('Admin/default.php', $data);

    }

    //Show the view to edit news
    public function Edit()
    {
        //Load languages and Default Language
        $job_id = (int) $this->input->get('id');

        if($job_id) {

        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        $this->load->model('MJobs');
        $this->load->model('MJobType');
        $this->load->model('MEmployer');
        $this->load->model('MCountryCity');
        $this->load->model('MCategories');
        $this->load->model('MAttribute');

        $jobinfo = $this->MJobs->GetJob($job_id)->row();
        $data['jobtypes'] = $this->MJobType->GetAll()->result();
        $data['employers'] = $this->MEmployer->GetAll()->result();
        $data['countries'] = $this->MCountryCity->getCountries()->result();
        $data['cities'] = $this->MCountryCity->getCities($jobinfo->country_id)->result();
        $data['categories'] = $this->MCategories->viewCategories()->result();
        $data['attributes']= $this->MAttribute->viewAttribute()->result();
        $job_attributes = $this->MJobs->GetJobAttribute($job_id)->result();
        foreach($data['attributes'] as $attribute):

            $attribute_options = $this->MAttribute->AttributeOptionsbyID($attribute->attribute_id)->result();
            foreach($attribute_options as $option):
                $data['attribute_option'][$attribute->attribute_id][] = array(
                    'attribute_option_id' => $option->attribute_option_id,
                    'name' => $option->name,
                    'type' => $option->type,
                );
            endforeach;

        endforeach;

        foreach($job_attributes as $jobatt):
            $data['attribute_info'][$jobatt->attribute_id] = array(
                    'value' => $jobatt->value,
                    'attribute_option_id' => $jobatt->attribute_option_id,
            );

        endforeach;
        $data['jobinfo'] = $jobinfo;


            //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Jobs/View";
        $data['breadcrumb_anchor1'] = "Jobs";
        $data['breadcrumb_link2'] = "/Jobs/Edit";
        $data['breadcrumb_anchor2'] = "Jobs Ads";

        $data['activeMenu'] = "mnuJobs";

        $data['main_content'] = "Admin/Jobs/edit";
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
        $data['latitude'] = $this->input->post("latitude");
        $data['longitude'] = $this->input->post("longitude");

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
        $data['latitude'] = $this->input->post("latitude");
        $data['longitude'] = $this->input->post("longitude");


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
		$this->load->library('paging');
		$this->load->model("Mjobs");
		
        
		$page = (int) $this->input->get('page');
		$employer_id = (int) $this->input->get('userid');
		
		
		$perpage = 15;
		$data['view'] = $this->Mjobs->getAllJobs($page,$perpage,0,$userid)->result();
		
		$limitquery = $this->Mjobs->getAllJobs($page,$perpage,1,$userid);
		
		if($userid)
		{
			$url4pageing = 'index.php/Ads/View?userid='.$userid;	
		} else {
			$url4pageing= 'index.php/Ads/View?userid=0';	
		}
		$data['paging'] = $this->paging->pagingforquery($limitquery,$perpage,$page,$url4pageing,''); 

        //Loading Data for this view
        

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Jobs/View";
        $data['breadcrumb_anchor1'] = "Jobs";
        $data['breadcrumb_link2'] = "/Jobs/View";
        $data['breadcrumb_anchor2'] = "Manage Jobs";

        $data['activeMenu'] = "mnuJobs";

        $data['main_content'] = "Admin/Jobs/view";
        $this->load->view("Admin/default.php", $data);
    }


  	public function JobDelete()
	{
		
		$this->load->model('MJobs');
		
		$job_id = $this->input->get("id");
		
		$success = $this->MJobs->DeleteJob($job_id);
		
		if($success)
		{
			$json['status'] =  'success';
		}
		echo json_encode($json);
		
		
	}

    //Update Status
    public function Status()
    {
        $data = $this->input->post('id');
		$status = $this->input->post('status');
		
		
		$this->load->model('Madd');
		$json = array();
		
		$update = $this->Madd->UpdateStatus($data,$status);
		
		if($update)
		{
			$json['success'] = 'done';
		} else {
			$json['error'] = 'Something went wrong!';
		}
		
		echo json_encode($json);
        
    }
	
	

}