<?php
class Advertise extends CI_Controller {

	 public function viewAdvertise($data='')
	 {
		$data['userid'] = intval($this->input->get('userid'));
		if($data['userid']==0){
			redirect("Users/viewUsers");
		}
        $data['breadcrumb_link1'] = "/Advertise/viewAdvertise";
        $data['breadcrumb_anchor1'] = "Advertisement";
        $data['breadcrumb_link2'] = "/Advertise/viewAdvertise";
        $data['breadcrumb_anchor2'] = "Manage Advertisement";

        $data['activeMenu'] = "mnuDirectory";

        //Loading Data for this view
        $this->load->model("MAdvertise");
        $data['advertise'] = $this->MAdvertise->getAdvertise()->result_array();
		
		
		 $this->load->model("MUsers");
		$data['username'] = $this->MUsers->userField($data['userid'],"name");
		
        $data['main_content'] = "Admin/Advertise/viewAdvertise";
        $this->load->view("Admin/default.php", $data);
    }
}
?>