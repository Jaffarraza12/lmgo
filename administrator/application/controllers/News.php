<?php

class News extends CI_Controller {

    //Show the view for adding new news
    public function Add()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/News/View";
        $data['breadcrumb_anchor1'] = "News";
        $data['breadcrumb_link2'] = "/News/Add";
        $data['breadcrumb_anchor2'] = "Add News";

        $data['activeMenu'] = "mnuNews";

        $data['main_content'] = "Admin/News/add";
        $this->load->view('Admin/default.php', $data);

    }

    //Show the view to edit news
    public function Edit()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/News/View";
        $data['breadcrumb_anchor1'] = "News";
        $data['breadcrumb_link2'] = "/News/Edit?id=" . (int)$this->input->get("id");
        $data['breadcrumb_anchor2'] = "Edit News";

        $data['activeMenu'] = "mnuNews";

        //Loading Data for this view
        $this->load->model("MNews");
        $data['recId'] = (int)$this->input->get("id");
        $services = $this->MNews->viewNewsById($data['recId'])->result();
        //seperate data according to languages in different arrays
        $data['view'] = $this->MUtils->arrangeDataAccordingToLanguage($services, $data);

        $data['main_content'] = "Admin/News/edit";
        $this->load->view('Admin/default.php', $data);

    }

    //Add new news in the database
    public function AddNews()
    {
        //Load languages and Default Language
        $languages = $this->MUtils->getLanguages();
        $data['Languages'] = $languages;
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/News/Edit";
        $data['breadcrumb_anchor1'] = "News";
        $data['breadcrumb_link2'] = "/News/Add";
        $data['breadcrumb_anchor2'] = "Add News";

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
    public function EditNews()
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
            $data['status'] = "News Updated Successfully.";
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

        //Loading Data for this view
        $this->load->model("MNews");
        $services = $this->MNews->viewNews()->result();
        //seperate data according to languages in different arrays
        $data['view'] = $this->MUtils->arrangeDataAccordingToLanguage($services, $data);

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/News/View";
        $data['breadcrumb_anchor1'] = "News";
        $data['breadcrumb_link2'] = "/News/View";
        $data['breadcrumb_anchor2'] = "Manage News";

        $data['activeMenu'] = "mnuNews";

        $data['main_content'] = "Admin/News/view";
        $this->load->view("Admin/default.php", $data);
    }

    //Delete News
    public function Delete()
    {
        $id = (int)$this->input->get('id');

        $this->load->model("MNews");
        $status = $this->MNews->deleteNews($id);

        if ($status)
            $this->MUtils->setSuccess("Record Deleted Successfully");
        else
            $this->MUtils->setError("Error occurred while deleting record");

        echo $this->MUtils->getStatus();
    }

    //Update Status
    public function Status()
    {
        $id = (int)$this->input->get('id');

        $this->load->model("MNews");
        $status = $this->MNews->setStatus($id);

        if ($status)
            $this->MUtils->setSuccess("Record Updated Successfully");
        else
            $this->MUtils->setError("Error occurred while updating record");

        echo $this->MUtils->getStatus();
    }

}