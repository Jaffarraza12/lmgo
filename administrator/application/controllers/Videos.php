<?php

class Videos extends CI_Controller {

    //Show the view for adding new news
    public function Add()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Videos/View";
        $data['breadcrumb_anchor1'] = "Videos";
        $data['breadcrumb_link2'] = "/Videos/Add";
        $data['breadcrumb_anchor2'] = "Add Videos";

        $data['activeMenu'] = "mnuVideos";

        $data['main_content'] = "Admin/Videos/add";
        $this->load->view('Admin/default.php', $data);

    }

    //Show the view to edit news
    public function Edit()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Videos/View";
        $data['breadcrumb_anchor1'] = "Videos";
        $data['breadcrumb_link2'] = "/Videos/Edit?id=" . (int)$this->input->get("id");
        $data['breadcrumb_anchor2'] = "Edit Videos";

        $data['activeMenu'] = "mnuVideos";

        //Loading Data for this view
        $this->load->model("MVideos");

        $data['recId'] = (int)$this->input->get("id");
        $data['record']= $this->MVideos->viewById($data['recId'])->row();

        $data['main_content'] = "Admin/Videos/edit";
        $this->load->view('Admin/default.php', $data);

    }

    public function AddVideos()
    {
        //Load languages and Default Language
        $languages = $this->MUtils->getLanguages();
        $data['Languages'] = $languages;
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Videos/Edit";
        $data['breadcrumb_anchor1'] = "Videos";
        $data['breadcrumb_link2'] = "/Videos/Add";
        $data['breadcrumb_anchor2'] = "Add Videos";

        $data['activeMenu'] = "mnuVideos";

       // $data['smallImage'] = $this->MUtils->doUploadWithCropping('smallFile', 70, 92);
        //$data['largeImage'] = $this->MUtils->doUpload('largeFile',0 ,0, false);
        //$data['sliderImage'] = $this->MUtils->doUpload('sliderFile', 1920, 530, true);
        $dat['title'] = $this->input->post('title');
        $dat['link'] = $this->input->post('link');
        $dat['status'] = $this->input->post('status');


        $defaultCode = $languages[$data['defaultLang']]->code;
        $status = "";
        if ( isset($_POST) )
        {
            $this->load->model("MVideos");
            $status = $this->MVideos->addVideos($dat);
        }

        if ($status==1)
        {
            $data['status'] = "New Videos Added Successfully.";
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
    public function EditVideos()
    {

        //Load languages and Default Language
        $languages = $this->MUtils->getLanguages();
        $data['Languages'] = $languages;
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        $data['smallImage'] = $this->MUtils->doUploadWithCropping('smallFile', 70, 92);
        //$data['largeImage'] = $this->MUtils->doUpload('largeFile', 0, 0, false);
        //$data['sliderImage'] = $this->MUtils->doUpload('sliderFile', 1920, 530, true);

        $dat['id'] = $this->input->post('id');
        $dat['title'] = $this->input->post('title');
        $dat['link'] = $this->input->post('link');
        $dat['status'] = $this->input->post('status');


        $data['date'] = $this->input->post("date");

        $status = "";
        $defaultCode = $languages[$data['defaultLang']]->code;
        if ( isset($_POST ) )
        {
            $this->load->model("MVideos");
            $status = $this->MVideos->editVideos($dat);
        }


        if ($status==1)
        {
            $data['status'] = "Videos Updated Successfully.";
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
        $this->load->model("MVideos");
        $data['records']= $this->MVideos->view()->result();
        //seperate data according to languages in different arrays

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Videos/View";
        $data['breadcrumb_anchor1'] = "Videos";
        $data['breadcrumb_link2'] = "/Videos/View";
        $data['breadcrumb_anchor2'] = "Manage Videos";

        $data['activeMenu'] = "mnuVideos";

        $data['main_content'] = "Admin/Videos/view";
        $this->load->view("Admin/default.php", $data);
    }

    //Delete Videos
    public function Delete()
    {
        $id = (int)$this->input->get('id');

        $this->load->model("MVideos");
        $status = $this->MVideos->deleteVideos($id);

        if ($status)
            $this->MUtils->setSuccess("Record Deleted Successfully");
        else
            $this->MUtils->setError("Error occurred while deleting record");

        echo $this->MUtils->getStatus();
    }

    //Update Status


}