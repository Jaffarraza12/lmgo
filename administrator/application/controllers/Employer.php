<?php

class Employer extends CI_Controller {

    //Show the view for adding new event
    //Show all the Employer on 1 page..
    public function View($data='')
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //Loading Data for this view
        $this->load->model("MEmployer");
        $data['employers'] = $this->MEmployer->GetAll()->result();
        //seperate data according to languages in different arrays
        $data['view'] = $this->MUtils->arrangeDataAccordingToLanguage($services, $data);

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Employer/View";
        $data['breadcrumb_anchor1'] = "Employer";
        $data['breadcrumb_link2'] = "/Employer/View";
        $data['breadcrumb_anchor2'] = "Manage Employer";

        $data['activeMenu'] = "mnuEvents";

        $data['main_content'] = "Admin/Employer/view";
        $this->load->view("Admin/default.php", $data);
    }

    public function Add()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Employer/View";
        $data['breadcrumb_anchor1'] = "Employer";
        $data['breadcrumb_link2'] = "/Employer/Add";
        $data['breadcrumb_anchor2'] = "Add Event";

        $data['activeMenu'] = "mnuEvents";

        $data['main_content'] = "Admin/Employer/add";
        $this->load->view('Admin/default.php', $data);

    }

    //Show the view to edit Employer
    public function Edit()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Employer/View";
        $data['breadcrumb_anchor1'] = "Employer";
        $data['breadcrumb_link2'] = "/Employer/Edit?id=" . (int)$this->input->get("id");
        $data['breadcrumb_anchor2'] = "Edit Employer";
        $data['activeMenu'] = "mnuEvents";
        //Loading Data for this view
        $this->load->model("MEmployer");
        $data['employer_id'] = (int) $this->input->get("id");
        $data['employer'] = $this->MEmployer->GetbyId($data['employer_id'])->row();
        //seperate data according to languages in different arrays
        $data['view'] = $this->MUtils->arrangeDataAccordingToLanguage($services, $data);

        $data['main_content'] = "Admin/Employer/edit";
        $this->load->view('Admin/default.php', $data);

    }

    //Add new event in the database
    public function AddEmployer()
    {
        //Load languages and Default Language
        $languages = $this->MUtils->getLanguages();
        $data['Languages'] = $languages;
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Employer/Edit";
        $data['breadcrumb_anchor1'] = "Employer";
        $data['breadcrumb_link2'] = "/Employer/Add";
        $data['breadcrumb_anchor2'] = "Add Event";

        $data['activeMenu'] = "mnuEvents";



        foreach ($languages as $lang)
        {
            $data['name_' . $lang->code] = $this->input->post('name_' . $lang->code);
            $data['account_name_' . $lang->code] = $this->input->post('account_name_' . $lang->code);
            $data['account_description_' . $lang->code] = $this->input->post('editor2_' . $lang->code);
            $data['description_' . $lang->code] = $this->input->post('editor_' . $lang->code);
        }

        //$data['latitude'] = $this->input->post("latitude");
        //$data['longitude'] = $this->input->post("longitude");

        $data['logo'] = $this->MUtils->doUploadWithCropping('logo', 100, 100 ,'../uploads/employer/');

        $data['email'] = $this->input->post("email");
        $data['password'] = $this->input->post("password");
        $data['account_phone'] = $this->input->post("account_contact");

        $defaultCode = $languages[$data['defaultLang']]->code;
        $status = "";
        $this->load->model("MEmployer");

        $status = $this->MEmployer->addEmployer($data);


        if ($status==1)
        {
            $data['status'] = "New Employer Added Successfully.";
            $data['statusCode'] = 1;
        }
        else
        {
            $data['status'] = "Error occurred while adding new Employer.";
            $data['statusCode'] = 0;
        }
        $this->View($data);
    }

    //Edit event dat in database
    public function EditEmployer        ()
    {

        //Load languages and Default Language
        $languages = $this->MUtils->getLanguages();
        $data['Languages'] = $languages;
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Employer/Edit";
        $data['breadcrumb_anchor1'] = "Employer";
        $data['breadcrumb_link2'] = "/Employer/Add";
        $data['breadcrumb_anchor2'] = "Add Event";

        $data['activeMenu'] = "mnuEvents";



        foreach ($languages as $lang)
        {
            $data['name_' . $lang->code] = $this->input->post('name_' . $lang->code);
            $data['account_name_' . $lang->code] = $this->input->post('account_name_' . $lang->code);
            $data['account_description_' . $lang->code] = $this->input->post('editor2_' . $lang->code);
            $data['description_' . $lang->code] = $this->input->post('editor_' . $lang->code);
        }

        //$data['latitude'] = $this->input->post("latitude");
        //$data['longitude'] = $this->input->post("longitude");
        if($_FILES['logo']['name']){
            $data['logo'] = $this->MUtils->doUploadWithCropping('logo', 100, 100 ,'../uploads/employer/');

        }
        $data['email'] = $this->input->post("email");
        $data['password'] = $this->input->post("password");
        $data['account_phone'] = $this->input->post("account_contact");
        $data['employer_id'] = $this->input->post("employer_id");


        $defaultCode = $languages[$data['defaultLang']]->code;
        $status = "";
        $this->load->model("MEmployer");

        $status = $this->MEmployer->editEmployer($data);


        if ($status==1)
        {
            $data['status'] = "Employer Modefied Successfully.";
            $data['statusCode'] = 1;
        }
        else
        {
            $data['status'] = "Error occurred while modefying new Employer.";
            $data['statusCode'] = 0;
        }
        $this->View($data);
    }



    //Delete Event
    public function Delete()
    {
        $id = (int)$this->input->get('id');

        $this->load->model("MEmployer");
        $status = $this->MEmployer->deleteEvent($id);

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

        $this->load->model("MEmployer");
        $status = $this->MEmployer->setStatus($id);

        if ($status)
            $this->MUtils->setSuccess("Record Updated Successfully");
        else
            $this->MUtils->setError("Error occurred while updating record");

        echo $this->MUtils->getStatus();
    }

}