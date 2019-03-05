<?php

class Clients extends CI_Controller {


    public function View()
    {
        $this->load->model("MClients");
        $data['images'] = $this->MClients->loadImages()->result();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Clients/View";
        $data['breadcrumb_anchor1'] = "Clients";
        $data['breadcrumb_link2'] = "";
        $data['breadcrumb_anchor2'] = "";

        $data['activeMenu'] = "mnuClients";

        $data['main_content'] = "Admin/Clients/view";
        $this->load->view("Admin/default.php", $data);
    }

    public function Arrange()
    {
        $this->load->model("MClients");
        $data['images'] = $this->MClients->loadImages()->result();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Clients/Arrange";
        $data['breadcrumb_anchor1'] = "Arrange Clients";
        $data['breadcrumb_link2'] = "";
        $data['breadcrumb_anchor2'] = "";

        $data['activeMenu'] = "mnuClients";

        $data['main_content'] = "Admin/Clients/arrange";
        $this->load->view("Admin/default.php", $data);
    }

    // Add New logo in db
    public function AddWork()
    {
        //Load languages and Default Language
        $languages = $this->MUtils->getLanguages();
        $data['Languages'] = $languages;
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        $data['image'] = $this->MUtils->doUpload('file', 168, 78, false);

        $this->load->model("MClients");
        $returnId = $this->MClients->AddClient($data);

        if ($returnId > 0)
            $this->MUtils->setSuccess($returnId . ":" . $data['image']);
        else
            $this->MUtils->setError("Erorr ocucred");

        echo $this->MUtils->getStatus();
    }

    // Delete logo from db.
    public function Delete()
    {
        $id = (int) $this->input->get('id');
        $this->load->model("MClients");
        $status = $this->MClients->deleteClient($id);

        if ($status)
            $this->MUtils->setSuccess("Client Deleted Successfully");
        else
            $this->MUtils->setError("Error occurred while deleting client");

        echo $this->MUtils->getStatus();
    }

    //Sort Position
    public function Sort()
    {
        $ids = $this->input->post('data');

        $this->load->model("MClients");
        $status = $this->MClients->sortClients($ids);

    }

}


?>