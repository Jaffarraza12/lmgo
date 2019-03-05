<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Language extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('language') == 'arabic') {
            $this->session->set_userdata('language', 'english');
        } else {
            $this->session->set_userdata('language', 'arabic');
        }

        if ($_SERVER['HTTP_REFERER'] == 'http://dubazaaro.com/' || $_SERVER['HTTP_REFERER'] == 'http://www.dubazaaro.com/') {
            redirect(base_url());
        } else {
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
