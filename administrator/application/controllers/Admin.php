<?php

class Admin extends CI_Controller {

    public function index()
    {
        $data['main_content'] = "Admin/dashboard";

        $this->load->model("MUsers");

        $this->load->view("admin/default.php", $data);
    }

    function LoginPage($data)
    {
        $this->load->view("Admin/login.php", $data);
    }

    function Login()
    {
        $this->load->model("MUsers");

        $data['username'] = $this->input->post("txtUsername");
        $data['password'] = $this->input->post("txtPassword");

        $status = $this->MUsers->authenticate($data);


        if (is_object($status))
        {
            $user = $status->result();
			$this->session->set_userdata('adminId', 1);
            $this->session->set_userdata('userId', $user[0]->id);
            $this->session->set_userdata('logged_in', "true");
            redirect("Pages/View?q=News");
        }
        else
        {
            $data['statusCode'] = 0;
            $data['status'] = 'Invalid username or password';
            $this->LoginPage($data);
        }


    }

    function Logout()
    {
        $this->session->unset_userdata('adminId');
        $this->session->set_userdata('userId', -1);
        $this->session->set_userdata('logged_in', "false");
        redirect("");
    }

}