<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $q = $this->uri->segment(1, "home");

        $data = array();
        
        $slide_sql = "select image from slideshow order by id asc";
        $data['slideshow'] = $this->db->query($slide_sql)->result();

        $this->load->model('MPage');
        $page_content = $this->MPage->view($q);

        $config = new Config();
        $data['config'] = $config;

        if (strtolower($q) == 'news' ||
            strtolower($q) == 'activities') {

            $page_no = $this->input->get('p');
            $page_no--;
            if (!$page_no) {
                $page_no = 0;
            }

            $grid_row = 2;
            $grid_col = 3;
            $grid_item_per_page = $grid_row * $grid_col;
            $data['total_pages'] = ceil(count($page_content) / $grid_item_per_page);
            $data['q'] = $q;

            $page_content_new = [];
            $startFrom = $page_no * $grid_item_per_page;
            $endTo = $startFrom + $grid_item_per_page;
            for ($i = $startFrom; ($i < $endTo && $i < count($page_content)); $i++){ $page_content_new[] = $page_content[$i]; }

            $data['page'] = 'common/grid';
            $data['page_content'] = $page_content_new;

        } elseif (strtolower($q) == 'books') {

            $data['page'] = 'common/books';
            $data['page_content'] = $page_content;

        } else {

            $recent_news = $this->MPage->view("News");
            $data['recent_news'] = $recent_news;

            $data['page'] = 'common/page';
            $data['page_content'] = $page_content[0];

        }

        $template = array(
            'common/header',
            'home',
            'common/footer',
        );

        $config->render($template, $data);
    }

    public function get()
    {
        $q = $this->uri->segment(2);

        $this->load->helper('url');

        if ($q === FALSE)
        {
            redirect('/', 'refresh');
        }

        $this->load->model('MPage');
        $page_content = $this->MPage->viewById($this->MUtils->StringPrepare($q));

        $data = array();

        $config = new Config();
        $data['config'] = $config;
        $data['page'] = 'common/page';
        $data['page_content'] = $page_content;

        $template = array(
            'common/header',
            'home',
            'common/footer',
        );

        $config->render($template, $data);
    }

    public function only()
    {
        $q = $this->uri->segment(2);

        $this->load->helper('url');

        if ($q === FALSE)
        {
            redirect('/', 'refresh');
        }

        $this->load->model('MPage');
        $page_content = $this->MPage->viewById($this->MUtils->StringPrepare($q));

        $data = array();

        $config = new Config();
        $data['config'] = $config;
        $data['page'] = 'common/page';
        $data['page_content'] = $page_content;

        $template = [
            'modal',
        ];

        $config->render($template, $data);
    }
}
