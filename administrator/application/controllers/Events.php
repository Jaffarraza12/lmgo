<?php

class Events extends CI_Controller {

    //Show the view for adding new event
    public function Add()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Events/View";
        $data['breadcrumb_anchor1'] = "Events";
        $data['breadcrumb_link2'] = "/Events/Add";
        $data['breadcrumb_anchor2'] = "Add Event";

        $data['header_js']  = array('https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false');

        $data['activeMenu'] = "mnuEvents";

        $data['main_content'] = "Admin/Events/add";
        $this->load->view('Admin/default.php', $data);

    }

    //Show the view to edit events
    public function Edit()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Events/View";
        $data['breadcrumb_anchor1'] = "Events";
        $data['breadcrumb_link2'] = "/Events/Edit?id=" . (int)$this->input->get("id");
        $data['breadcrumb_anchor2'] = "Edit Events";

        $data['header_js']  = array('https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false');

        $data['activeMenu'] = "mnuEvents";

        //Loading Data for this view
        $this->load->model("MEvents");
        $data['recId'] = (int) $this->input->get("id");
        $services = $this->MEvents->viewEventById($data['recId'])->result();
        //seperate data according to languages in different arrays
        $data['view'] = $this->MUtils->arrangeDataAccordingToLanguage($services, $data);

        $data['main_content'] = "Admin/Events/edit";
        $this->load->view('Admin/default.php', $data);

    }

    //Add new event in the database
    public function AddEvent()
    {
        //Load languages and Default Language
        $languages = $this->MUtils->getLanguages();
        $data['Languages'] = $languages;
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Events/Edit";
        $data['breadcrumb_anchor1'] = "Events";
        $data['breadcrumb_link2'] = "/Events/Add";
        $data['breadcrumb_anchor2'] = "Add Event";

        $data['activeMenu'] = "mnuEvents";

        $data['smallImage'] = $this->MUtils->doUpload('smallFile', 70, 92, false);
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
        $data['latitude'] = $this->input->post("latitude");
        $data['longitude'] = $this->input->post("longitude");

        $defaultCode = $languages[$data['defaultLang']]->code;
        $status = "";
        if ( isset($_POST['title_' . $defaultCode] ) )
        {
            $this->load->model("MEvents");

            $status = $this->MEvents->addEvent($data);
        }

        if ($status==1)
        {
            $data['status'] = "New Event Added Successfully.";
            $data['statusCode'] = 1;
        }
        else
        {
            $data['status'] = "Error occurred while adding new Event.";
            $data['statusCode'] = 0;
        }
        $this->View($data);
    }

    //Edit event dat in database
    public function EditEvent()
    {

        //Load languages and Default Language
        $languages = $this->MUtils->getLanguages();
        $data['Languages'] = $languages;
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        $data['smallImage'] = $this->MUtils->doUpload('smallFile', 725, 353, false);
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
        $data['latitude'] = $this->input->post("latitude");
        $data['longitude'] = $this->input->post("longitude");

        $status = "";
        $defaultCode = $languages[$data['defaultLang']]->code;
        if ( isset($_POST['title_' . $defaultCode] ) )
        {
            $this->load->model("MEvents");
            $status = $this->MEvents->editEvent($data);
        }


        if ($status==1)
        {
            $data['status'] = "Event Updated Successfully.";
            $data['statusCode'] = 1;
        }
        else
        {
            $data['status'] = "Error occurred while adding event.";
            $data['statusCode'] = 0;
        }

        $this->View($data);
    }

    //Show all the events on 1 page..
    public function View($data='')
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //Loading Data for this view
        $this->load->model("MEvents");
        $services = $this->MEvents->viewEvents()->result();
        //seperate data according to languages in different arrays
        $data['view'] = $this->MUtils->arrangeDataAccordingToLanguage($services, $data);

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Events/View";
        $data['breadcrumb_anchor1'] = "Events";
        $data['breadcrumb_link2'] = "/Events/View";
        $data['breadcrumb_anchor2'] = "Manage Events";

        $data['activeMenu'] = "mnuEvents";

        $data['main_content'] = "Admin/Events/view";
        $this->load->view("Admin/default.php", $data);
    }

    //Delete Event
    public function Delete()
    {
        $id = (int)$this->input->get('id');

        $this->load->model("MEvents");
        $status = $this->MEvents->deleteEvent($id);

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

        $this->load->model("MEvents");
        $status = $this->MEvents->setStatus($id);

        if ($status)
            $this->MUtils->setSuccess("Record Updated Successfully");
        else
            $this->MUtils->setError("Error occurred while updating record");

        echo $this->MUtils->getStatus();
    }

}