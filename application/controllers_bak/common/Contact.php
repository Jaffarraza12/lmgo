<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Contact extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array();

        $config = new Config();
        $data['config'] = $config;
        $data['page'] = 'common/contact';

        $template = array(
            'common/header',
            'home',
            'common/footer',
        );

        $config->render($template, $data);
    }
}
