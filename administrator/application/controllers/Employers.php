<?php
class Employers extends CI_Controller {

/**=============================================Country Section===============================**/  
   public function CountryProcess()
    {
		$this->load->model("MCountryCity");
		$status = "";
		$error = "";
		 
		$data['en_title'] = $this->input->post('en_title');
		$data['ar_title'] = $this->input->post('ar_title');
	 	$data['status'] ="1";
		$data['smallImage'] = $this->MUtils->doUploadWithCropping('smallFile', 50, 50,"../uploads/flags/");
		$status = "";
		$status = $this->MCountryCity->AddCountry($data);
		if ($status==1){
			$st = 1;
		}
		else{
			$st = 0;
		}
		
		redirect("CountryCity/ViewCountry?st=$st");
    }
	
	public function editCountryProcess()
    {
		$this->load->model("MCountryCity");
		$status = "";
		$error = "";
		 
		$data['en_title'] = $this->input->post('en_title');
		$data['ar_title'] = $this->input->post('ar_title');
		$data['serial'] = $this->input->post('serial');
		$data['smallImage'] = $this->MUtils->doUploadWithCropping('smallFile', 50, 50,"../uploads/flags/");
		$status = "";
		$status = $this->MCountryCity->editCountry($data);
		if ($status==1){
			$st = 1;
		}
		else{
			$st = 0;
		}
		
		redirect("CountryCity/ViewCountry?st=$st");
    }
	
	 public function viewUsers($data='')
	 {

        $data['breadcrumb_link1'] = "/Users/viewUsers";
        $data['breadcrumb_anchor1'] = "Users";
        $data['breadcrumb_link2'] = "/Users/viewUsers";
        $data['breadcrumb_anchor2'] = "Manage Users";

        $data['activeMenu'] = "mnuDirectory";

        //Loading Data for this view
        $this->load->model("MUsers");
        $data['users'] = $this->MUsers->getUsers()->result_array();
		
        $data['main_content'] = "Admin/Users/viewUsers";
        $this->load->view("Admin/default.php", $data);
    }
	
	public function viewUsersInfo($userid){
		
		 $data['breadcrumb_link1'] = "/Users/viewUsers";
        $data['breadcrumb_anchor1'] = "Users";
        $data['breadcrumb_link2'] = "/Users/viewUsers";
        $data['breadcrumb_anchor2'] = "Manage Users";

        $data['activeMenu'] = "mnuDirectory";
		if($userid){ 
			$data['userid'] = $userid;
		} else {
			$data['userid'] = $this->input->get('id');
		}
        //Loading Data for this view
        $this->load->model("MUsers");
		$this->load->model("MCountryCity");
        $data['users'] = $this->MUsers->getUserbyID($data['userid'])->row();
		$data['countries'] = $this->MCountryCity->getCountries()->result();
		
        $data['main_content'] = "Admin/Users/viewUsersInfo";
        $this->load->view("Admin/default.php", $data);
		 
		 
	}
	public function EditUser(){
		//print_r($this->input->post());
		if($this->input->post('Submit')) {
			$dat['firstname'] =  $this->input->post('firstname');
			$dat['lastname'] =  $this->input->post('lastname');
			$dat['email'] =  $this->input->post('email');
			$dat['gender'] =  $this->input->post('gender');
			$dat['contact'] =  $this->input->post('contact');
			$dat['cover'] =  $this->input->post('cover');
			$dat['dob'] =  $this->input->post('dob');
			$dat['country'] =  $this->input->post('country');
			$dat['limit'] =  $this->input->post('limit');
			$userid = $this->input->post('userid');
			$this->load->model("MUsers");
			$save=$this->MUsers->UpdateUserlimit($dat,$userid);
			if($save){
				$data['status'] = "User limit has been changed!.";
            	$data['statusCode'] = 1;
			} else {
				$data['status'] = "Something went wrong!.";
            	$data['statusCode'] = 0;
			}
			$this->viewUsers($data);
		}
	
	}
	
	
	
	 public function addCountry($data='')
    {
			$data['type'] = intval($this->input->get('cid'));

			//Load languages and Default Language
			$data['Languages'] = $this->MUtils->getLanguages();
			$data['defaultLang'] = $this->MUtils->getDefaultLanguage();
	
			//BreadCrumb URLs
			$data['breadcrumb_link1'] = "/CountryCity/addCountry";
			$data['breadcrumb_anchor1'] = "Country";
			$data['breadcrumb_link2'] = "/CountryCity/viewCountry";
			$data['breadcrumb_anchor2'] = "Manage Country";
	
			$data['activeMenu'] = "mnuDirectory";
			$this->load->model("MCountryCity");
						
			$data['formAction'] = "CountryProcess";
			$data['pHeading'] = "Add Country";
			$data['main_content'] = "Admin/CountryCity/addCountry";
			$this->load->view("Admin/default.php", $data);
	
    }
	public function editCountry($data='')
    {
			$data['serial'] = intval($this->input->get('cid'));

			//Load languages and Default Language
			$data['Languages'] = $this->MUtils->getLanguages();
			$data['defaultLang'] = $this->MUtils->getDefaultLanguage();
			
			//BreadCrumb URLs
			$data['breadcrumb_link1'] = "/CountryCity/addCountry";
			$data['breadcrumb_anchor1'] = "Country";
			$data['breadcrumb_link2'] = "/CountryCity/editCountry?cid=".$data['serial'];
			$data['breadcrumb_anchor2'] = "Edit Country";
	
			$data['activeMenu'] = "mnuDirectory";
			
			$this->load->model("MCountryCity");
			
			$countryEdit = $this->MCountryCity->viewCountryById($data['serial'])->row_array();
			$data['en_title']=$countryEdit['en_title'];
			$data['ar_title']=$countryEdit['ar_title'];
			$data['flag']=$countryEdit['flag'];
			$data['countryId']=0;
			$data['formAction'] = "editCountryProcess";
			$data['pHeading'] = "Edit Country";
			$data['main_content'] = "Admin/CountryCity/edit";
			$this->load->view("Admin/default.php", $data);
    }
	public function deleteCountry()
    {
        $id = $this->input->get('id');
        $this->load->model("MCountryCity");
        $status = $this->MCountryCity->deleteCountry($id);
		if ($status)
            $this->MUtils->setSuccess("Record Deleted Successfully");
        else
            $this->MUtils->setError("Error occurred while deleting record");
			
		 echo $this->MUtils->getStatus();
      // redirect("CountryCity/ViewCity?st=$st&cid=".$data['cid']);
    }
	
	
	
/**============================================= End Country Section===============================**/  	
	 function deleteUser($id){
		$id = $this->input->get('id');
        $this->load->model("MUsers");
    	if($this->MUsers->DeleteUserbyID($id))
		{ 
			$json['status']=1;
		} else{
			$json['msg']='Something Went Worng';
			
		}
		echo json_encode($json);
	 
	}

}
?>