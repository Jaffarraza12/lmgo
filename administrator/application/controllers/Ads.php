<?php

class Ads extends CI_Controller {

    //Show the view for adding new news
    public function Add()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Ads/View";
        $data['breadcrumb_anchor1'] = "Ads";
        $data['breadcrumb_link2'] = "/Ads/Add";
        $data['breadcrumb_anchor2'] = "Add Ads";

        $data['activeMenu'] = "mnuNews";

        $data['main_content'] = "Admin/Ads/add";
        $this->load->view('Admin/default.php', $data);

    }

    //Show the view to edit news
    public function Edit()
    {
        //Load languages and Default Language
		$this->load->model("Madd");
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/News/View";
        $data['breadcrumb_anchor1'] = "News";
        $data['breadcrumb_link2'] = "/News/Edit?id=" . (int)$this->input->get("id");
        $data['breadcrumb_anchor2'] = "Edit News";

        $data['activeMenu'] = "mnuNews";

        //Loading Data for this view
       
        $data['advertiseid'] = (int)$this->input->get("id");
        $data['add_info']= $this->Madd->getAddDetail($data['advertiseid'])->row();
        $data['main_content'] = "Admin/Ads/edit";
        $this->load->view('Admin/default.php', $data);

    }

    //Add new news in the database
    public function AddAds()
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

        $data['activeMenu'] = "mnuNews";

        $data['smallImage'] = $this->MUtils->doUploadWithCropping('smallFile', 70, 92);
        //$data['largeImage'] = $this->MUtils->doUpload('largeFile',0 ,0, false);
        //$data['sliderImage'] = $this->MUtils->doUpload('sliderFile', 1920, 530, true);
        $data['seo_url'] = $this->input->post('seo_url');


        foreach ($languages as $lang)
        {
            $data['title_' . $lang->code] = $this->input->post('title_' . $lang->code);
            $data['sub_title_' . $lang->code] = "";
            $data['short_desc_' . $lang->code] = $this->input->post('short_desc_' . $lang->code);
            $data['editor_' . $lang->code] = $this->input->post('editor_' . $lang->code);
            $data['meta_title_' . $lang->code] = $this->input->post('meta_title_' . $lang->code);
            $data['meta_keywords_' . $lang->code] = $this->input->post('meta_keywords_' . $lang->code);
            $data['meta_desc_' . $lang->code] = $this->input->post('meta_desc_' . $lang->code);
        }

        $data['date'] = $this->input->post("date");

        $defaultCode = $languages[$data['defaultLang']]->code;
        $status = "";
        if ( isset($_POST['title_' . $defaultCode] ) )
        {
            $this->load->model("MNews");

            $status = $this->MNews->addNews($data);
        }

        if ($status==1)
        {
            $data['status'] = "New News Added Successfully.";
            $data['statusCode'] = 1;
        }
        else
        {
            $data['status'] = "Error occurred while adding new news.";
            $data['statusCode'] = 0;
        }
        $this->View($data);
    }

    //Edit news dat in database
    public function EditAds()
    {

        //Load languages and Default Language
        $languages = $this->MUtils->getLanguages();
        $data['Languages'] = $languages;
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        $data['smallImage'] = $this->MUtils->doUploadWithCropping('smallFile', 70, 92);
        //$data['largeImage'] = $this->MUtils->doUpload('largeFile', 0, 0, false);
        //$data['sliderImage'] = $this->MUtils->doUpload('sliderFile', 1920, 530, true);
        $data['seo_url'] = $this->input->post('seo_url');

        $data['id'] = $this->input->post('cid');
        foreach ($languages as $lang)
        {
            $data['title_' . $lang->code] = $this->input->post('title_' . $lang->code);
            $data['sub_title_' . $lang->code] = "";
            $data['short_desc_' . $lang->code] = $this->input->post('short_desc_' . $lang->code);
            $data['editor_' . $lang->code] = $this->input->post('editor_' . $lang->code);
            $data['meta_title_' . $lang->code] = $this->input->post('meta_title_' . $lang->code);
            $data['meta_keywords_' . $lang->code] = $this->input->post('meta_keywords_' . $lang->code);
            $data['meta_desc_' . $lang->code] = $this->input->post('meta_desc_' . $lang->code);
            $data['cd_id_' . $lang->code] = $this->input->post('cd_id_' . $lang->code);
        }

        $data['date'] = $this->input->post("date");

        $status = "";
        $defaultCode = $languages[$data['defaultLang']]->code;
        if ( isset($_POST['title_' . $defaultCode] ) )
        {
            $this->load->model("MNews");
            $status = $this->MNews->editNews($data);
        }


        if ($status==1)
        {
            $data['status'] = "Ads Updated Successfully.";
            $data['statusCode'] = 1;
        }
        else
        {
            $data['status'] = "Error occurred while adding news.";
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
		$this->load->model("Madd");
        
		
		$page = (int) $this->input->get('page');
		$userid = (int) $this->input->get('userid');
		
		
		$perpage = 15;
		$data['view'] = $this->Madd->getAllAds($page,$perpage,0,$userid)->result();
		$limitquery = $this->Madd->getAllAds($page,$perpage,1,$userid);
		
		if($userid)
		{
			$url4pageing = 'index.php/Ads/View?userid='.$userid;	
		} else {
			$url4pageing= 'index.php/Ads/View?userid=0';	
		}
		$data['paging'] = $this->paging->pagingforquery($limitquery,$perpage,$page,$url4pageing,''); 

        //Loading Data for this view
        

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Ads/View";
        $data['breadcrumb_anchor1'] = "Ads";
        $data['breadcrumb_link2'] = "/Ads/View";
        $data['breadcrumb_anchor2'] = "Manage Ads";

        $data['activeMenu'] = "mnuNews";

        $data['main_content'] = "Admin/Ads/view";
        $this->load->view("Admin/default.php", $data);
    }

    //Delete News
  	public function addDelete()
	{
		
		$this->load->model('Madd');
		
		$advertiseid = $this->input->get("id");
		
		$success = $this->Madd->DeleteAdd($advertiseid);
		
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
	
	public function Expire($data=''){
	
		
	
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
		$this->load->library('paging');
		$this->load->model("Madd");
        
		
		$page = (int) $this->input->get('page');
		$userid = (int) $this->input->get('userid');
		
		
		$perpage = 15;
		$data['view'] = $this->Madd->getExpireAds($page,$perpage,0,$userid)->result();
		$limitquery = $this->Madd->getExpireAds($page,$perpage,1,$userid);
		
		if($userid)
		{
			$url4pageing = 'index.php/Ads/Expire?userid='.$userid;	
		} else {
			$url4pageing= 'index.php/Ads/Expire?userid=0';	
		}
		$data['paging'] = $this->paging->pagingforquery($limitquery,$perpage,$page,$url4pageing,''); 

        //Loading Data for this view
        

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Ads/View";
        $data['breadcrumb_anchor1'] = "Ads";
        $data['breadcrumb_link2'] = "/Ads/View";
        $data['breadcrumb_anchor2'] = "Manage Ads";

        $data['activeMenu'] = "mnuNews";
		$data['notify'] = true;
		

        $data['main_content'] = "Admin/Ads/view_exp";
        $this->load->view("Admin/default.php", $data);
    }


}