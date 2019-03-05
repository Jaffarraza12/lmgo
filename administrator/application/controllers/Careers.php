<?php

class Careers extends CI_Controller {

    //Show the view for adding new career
    public function Add()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Careers/View";
        $data['breadcrumb_anchor1'] = "Careers";
        $data['breadcrumb_link2'] = "/Careers/Add";
        $data['breadcrumb_anchor2'] = "Add New Career";

        $data['activeMenu'] = "mnuCareers";

        $data['main_content'] = "Admin/Careers/add";
        $this->load->view('Admin/default.php', $data);

    }

    //Show the view to edit career
    public function Edit()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //Loading Data for this view
        $this->load->model("MCareer");
        $data['recId'] = (int)$this->input->get("id");
        $careers = $this->MCareer->viewWhyById($data['recId'])->result();
        //seperate data according to languages in different arrays
        $data['view'] = $this->MUtils->arrangeDataAccordingToLanguage($careers, $data);

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Careers/View";
        $data['breadcrumb_anchor1'] = "Careers";
        $data['breadcrumb_link2'] = "/Careers/Edit?id=" + $data['recId'];
        $data['breadcrumb_anchor2'] = "Edit Career";

        $data['activeMenu'] = "mnuCareers";

        $data['main_content'] = "Admin/Careers/edit";
        $this->load->view('Admin/default.php', $data);

    }

    //Add new career in the database
    public function AddCareer()
    {

        //Load languages and Default Language
        $languages = $this->MUtils->getLanguages();
        $data['Languages'] = $languages;
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //Configure upload.
        $this->upload->initialize(array(
            "upload_path"   => "uploads/",
            "allowed_types" => "gif|jpg|png"
        ));

            foreach ($languages as $lang)
            {
                $data['title_' . $lang->code] = $this->input->post('title_' . $lang->code);
                $data['long_desc_' . $lang->code] = $this->input->post('long_desc_' . $lang->code);
            }


        $defaultCode = $languages[$data['defaultLang']]->code;
        $status = "";
        if ( isset($_POST['title_' . $defaultCode] ) )
        {
            $this->load->model("MCareer");

            $status = $this->MCareer->addCareer($data);
        }

            $data['status'] = $status;
            $data['statusCode'] = 1;


        $this->View($data);
    }

    //Edit Career in database
    public function EditCareer()
    {

        //Load languages and Default Language
        $languages = $this->MUtils->getLanguages();
        $data['Languages'] = $languages;
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();


        $data['id'] = (int)$this->input->get('id');
            foreach ($languages as $lang)
            {
                $data['title_' . $lang->code] = $this->input->post('title_' . $lang->code);
                $data['long_desc_' . $lang->code] = $this->input->post('long_desc_' . $lang->code);
                $data['cd_id_' . $lang->code] = $this->input->post('cd_id_' . $lang->code);
            }

        $defaultCode = $languages[$data['defaultLang']]->code;
        $status = "";
        if ( isset($_POST['title_' . $defaultCode] ) )
        {
            $this->load->model("MCareer");
            $status = $this->MCareer->editCareer($data);
        }

            $data['status'] = $status;
            $data['statusCode'] = 1;

        $this->View($data);
    }

    //Show all the careers on 1 page..
    public function View($data='')
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //Loading Data for this view
        $this->load->model("MCareer");
        $why = $this->MCareer->view()->result();
        //seperate data according to languages in different arrays
        $data['view'] = $this->MUtils->arrangeDataAccordingToLanguage($why, $data);

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Careers/View";
        $data['breadcrumb_anchor1'] = "Careers";
        $data['breadcrumb_link2'] = "";
        $data['breadcrumb_anchor2'] = "";

        $data['activeMenu'] = "mnuCareers";

        $data['main_content'] = "Admin/Careers/view";
        $this->load->view("Admin/default.php", $data);
    }

    //Delete Service
    public function Delete()
    {
        $id = (int) $this->input->get('id');

        $this->load->model("MCareer");
        $status = $this->MCareer->deleteWhy($id);

        if ($status)
            $this->MUtils->setSuccess("Record Deleted Successfully");
        else
            $this->MUtils->setError("Error occurred while deleting record");

        echo $this->MUtils->getStatus();
    }

    //Show all the careers on 1 page..
    public function ViewResume($data='')
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //Loading Data for this view
        $this->load->model("MCareer");
        $why = $this->MCareer->view()->result();
        //seperate data according to languages in different arrays
        $data['view'] = $this->MUtils->arrangeDataAccordingToLanguage($why, $data);

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Careers/View";
        $data['breadcrumb_anchor1'] = "Careers";
        $data['breadcrumb_link2'] = "/Careers/ViewResume";
        $data['breadcrumb_anchor2'] = "Resume Received";

        $this->load->model("MCareer");
        $result = $this->MCareer->viewResume();

        $data['view'] = $result->result();

        $data['activeMenu'] = "mnuCareers";

        $data['main_content'] = "Admin/Careers/viewResume";
        $this->load->view("Admin/default.php", $data);
    }

    //Delete Contact
    public function DeleteResume()
    {
        $id = (int) $this->input->get('id');

        $this->load->model("MCareer");
        $status = $this->MCareer->deleteResume($id);

        if ($status)
            $this->MUtils->setSuccess("Record Deleted Successfully");
        else
            $this->MUtils->setError("Error occurred while deleting record");

        echo $this->MUtils->getStatus();
    }

}