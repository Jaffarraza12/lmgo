<?php

class Contact extends CI_Controller {


    //Show all the contact queries on 1 page..
    public function View($data='')
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Contact/View";
        $data['breadcrumb_anchor1'] = "Contact Queries";
        $data['breadcrumb_link2'] = "";
        $data['breadcrumb_anchor2'] = "";

        $data['activeMenu'] = "mnuContact";

        //Loading Data for this view
        $this->load->model("MContact");
        $data['view'] = $this->MContact->viewContact()->result();

        $data['main_content'] = "Admin/Contact/view";
        $this->load->view("Admin/default.php", $data);
    }

    //Update Email Status
    public function Update()
    {
        $id = (int) $this->input->get('id');

        $this->load->model("MContact");
        $status = $this->MContact->updateContact($id);

        if ($status)
            $this->MUtils->setSuccess("Record Updated Successfully");
        else
            $this->MUtils->setError("Error occurred while updating record");

        echo $this->MUtils->getStatus();
    }

    //set status to unread
    public function Unread()
    {
        $id = (int)$this->input->get('id');

        $this->load->model("MContact");
        $status = $this->MContact->unread($id);

        if ($status)
            $this->MUtils->setSuccess("Record Updated Successfully");
        else
            $this->MUtils->setError("Error occurred while updating record");

        echo $this->MUtils->getStatus();
    }

    //Delete Contact
    public function Delete()
    {
        $id = (int)$this->input->get('id');

        $this->load->model("MContact");
        $status = $this->MContact->deleteContact($id);

        if ($status)
            $this->MUtils->setSuccess("Record Deleted Successfully");
        else
            $this->MUtils->setError("Error occurred while deleting record");

        echo $this->MUtils->getStatus();
    }

}