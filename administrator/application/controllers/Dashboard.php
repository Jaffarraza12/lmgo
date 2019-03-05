
<?php

class Dashboard extends CI_Controller {

    //Show differnet types for page
    public function View()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
		
		$this->load->model("mdashboard");
		
		$data['reportformonth'] =$this->mdashboard->GetAdsbyMonth(4,date('Y'));
		$data['reportforuser'] =$this->mdashboard->GetAdsbyUser(5);
		$data['reportforemirate'] =$this->mdashboard->GetAdsbyEmirates();
		

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Pages/View";
        $data['breadcrumb_anchor1'] = "Pages";
        $data['breadcrumb_link2'] = "/Pages/Add";
        $data['breadcrumb_anchor2'] = "Add New Page";

        $data['activeMenu'] = "mnuPages";
        $data['main_content'] = "Admin/Dashboard/dashboard";
        $this->load->view('Admin/default.php', $data);
    }


}