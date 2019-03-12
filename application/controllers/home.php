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
        $q = $this->uri->segment(1, 25);
        $this->load->model('Msetting');
        $this->load->model('MMenu');
        $this->Msetting->increment();
        $data = array();


        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
        //BreadCrumb URLs
        $data['menu'] =array();

        foreach($data['Languages'] as $lang){
            $data['menu'][$lang->code][] = json_decode($this->Msetting->GetByKeyCode('menu',$lang->code)->row()->value);
        }




        // $q = $this->input->get('q');


        $data['visitor'] = $this->Msetting->getbyKey('visitor');
        $data['lang'] = $this->input->get('lang');
        if (!$data['lang'] ) {
            $data['lang'] = $this->MUtils->getDefaultLanguage();
        } else {
            $data['language'] = $data['lang'];

        }



        $this->load->model('MPage');
        
        $page_content = $this->MPage->view($q);

        $slide_sql = "select image from slideshow order by id asc";
        $data['slideshow'] = $this->db->query($slide_sql)->result();

        $recent_news = $this->MPage->view("News");
        $news = array();
        foreach ($recent_news as $key => $value) {
            if ($value->languageid == $data['lang']) {
                $news[$key] = $value;
            }
        }


        $data['recent_news'] = $news;

        $activities = $this->MPage->view("Activities");
        $data['activities'] = $activities;


        $articles = "select * from album ORDER BY album_id DESC ";
        $data['articles'] = $this->db->query($articles)->result();

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
            $data['type'] = $page_content[0]->type;

        } elseif (strtolower($q) == 'books') {

            $all_content = [];
            foreach ($page_content as $key => $value) {
                if ($value->languageid == $data['lang']) {
                    $all_content[$key] = $value;
                }
            }
            $page_content = $all_content;

            $data['page'] = 'common/books';
            $data['page_content'] = $page_content;
            $data['type'] = "books";

        } elseif (strtolower($q) == 'videos') {

            $slide_sql = "select * from `videos`";
            $data['videos'] = $this->db->query($slide_sql)->result();

            $data['page'] = 'common/videos';
            $data['page_content'] = $page_content;
            $data['type'] = "page";

        } elseif (strtolower($q) == 'member') {



            if($_POST){
                extract($_POST);
                $data['number'] = $number;
                $slide_sql = "select * from `member` WHERE  `card_number` = '".$number."'";
                $result = $this->db->query($slide_sql);
                if( $result->num_rows() ) {
                    $data['member'] = $result->row();
                } else {
                    $data['error'] = 'Sorry Card Number Not Found!';

                }

            }
            $data['page'] = 'common/member';
            $data['page_content'] = $page_content;
            $data['type'] = "page";

        } elseif (strtolower($q) == 'videos') {

            $slide_sql = "select * from `videos`";
            $data['videos'] = $this->db->query($slide_sql)->result();

            $data['page'] = 'common/videos';
            $data['page_content'] = $page_content;
            $data['type'] = "page";

        } elseif (strtolower($q) == 'voice-gallery') {

            $sql = "select * from voice_gallery order by id desc";
            $data['voices'] = $this->db->query($sql)->result();
            $data['page'] = 'common/voice-gallery';
            $data['page_content'] = $page_content;
            $data['type'] = "page";

        }elseif (strtolower($q) == 'videos') {

            $slide_sql = "select * from `videos`";
            $data['videos'] = $this->db->query($slide_sql)->result();

            $data['page'] = 'common/videos';
            $data['page_content'] = $page_content;
            $data['type'] = "page";

        } elseif (strtolower($q) == 'contact') {


            $data['page'] = 'common/contact';
            $data['page_content'] = $page_content;
            $data['type'] = "page";

        }


        else {

            $page_content = $this->MPage->viewByTerm($q);


            foreach ($page_content as $key => $value) {
                if ($value->languageid == $data['lang']) {
                    $page_content = $value;
                }
            }

            if ($page_content == []) {
                $this->load->helper('url');
                redirect(base_url().'home', 'refresh');
            }

            $data['page'] = 'common/page';
            $data['page_content'] = $page_content;
            $data['type'] = "page";

        }

        $template = array(
            'common/header',
            'home',
            'common/footer',
        );

        $config->render($template, $data);
        // echo json_encode($data['page_content']);
    }

    public function get()
    {

        $q = $this->uri->segment(2, 25);
        // $q = $this->input->get('q');

        $data = array();
        $this->load->model('Msetting');

        $articles = "select * from album ORDER BY album_id DESC ";
        $data['articles'] = $this->db->query($articles)->result();



        $this->Msetting->increment();
        $data['visitor'] = $this->Msetting->getbyKey('visitor');
        $data['lang'] = $this->input->get('lang');
        if (!$data['lang'] ) {
            $data['lang'] = $this->MUtils->getDefaultLanguage();
        } else {
            $data['language'] = $data['lang'];
        }
        $this->load->model('MPage');


        // $page_content = $this->MPage->viewById($this->MUtils->StringPrepare($q));
        $page_content = $this->MPage->viewById($q);

        foreach ($page_content as $key => $value) {
            if ($value->languageid == $data['lang']) {
                $page_content = $value;
            }
        }

        $slide_sql = "SELECT image FROM slideshow ORDER BY id ASC";
        $data['slideshow'] = $this->db->query($slide_sql)->result();

        $recent_news = $this->MPage->view("News");
        $news = array();
        foreach ($recent_news as $key => $value) {
            if ($value->languageid == $data['lang']) {
                $news[$key] = $value;
            }
        }
        $data['recent_news'] = $news;


        $activities = $this->MPage->view("Activities");
        $data['activities'] = $activities;

        $config = new Config();

        $data['config'] = $config;
        $data['page'] = 'common/page';
        $data['page_content'] = $page_content;
        $data['type'] = $page_content->type;

        $template = array(
            'common/header',
            'home',
            'common/footer',
        );

        $config->render($template, $data);
        // echo json_encode($data['page_content']);
    }

    public function gallery()
    {

        $q = (int)$this->uri->segment(2, 25);
        // $q = $this->input->get('q');


        $this->load->model('Msetting');
        $this->Msetting->increment();
        $data = array();


        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
        //BreadCrumb URLs
        $data['menu'] =array();

        foreach($data['Languages'] as $lang){
            $data['menu'][$lang->code][] = json_decode($this->Msetting->GetByKeyCode('menu',$lang->code)->row()->value);
        }

        $this->Msetting->increment();
        $data['visitor'] = $this->Msetting->getbyKey('visitor');

        $this->load->model('MPage');
        $data['lang'] = $this->input->get('lang');
        if (!$data['lang'] ) {
            $data['lang'] = $this->MUtils->getDefaultLanguage();
        } else {
            $data['language'] = $data['lang'];
        }


        $articles = "select * from album  ORDER BY album_id DESC";
        $data['articles'] = $this->db->query($articles)->result();




        // $page_content = $this->MPage->viewById($this->MUtils->StringPrepare($q));
        $page_content = $this->MPage->viewById($q);

        foreach ($page_content as $key => $value) {
            if ($value->languageid == $data['lang']) {
                $page_content = $value;
            }
        }

        $gallery = " SELECT *  FROM gallery WHERE album_id = '".$q."'  ";
        $data['galleries'] = $this->db->query($gallery)->result();


        $albums = " SELECT *  FROM album ";
        $data['albums'] = $this->db->query($albums)->result();


        $album = " SELECT *  FROM album WHERE  album_id = '".$q."'   ";
        $data['album'] = $this->db->query($album)->row();



        $recent_news = $this->MPage->view("News");
        $news = array();
        foreach ($recent_news as $key => $value) {
            if ($value->languageid == $data['lang']) {
                $news[$key] = $value;
            }
        }


        $data['gallery_id'] = $q;
        $data['recent_news'] = $news;
        $activities = $this->MPage->view("Activities");
        $data['activities'] = $activities;

        $articles = "select * from album ";
        $data['articles'] = $this->db->query($articles)->result();

        $config = new Config();

        $data['config'] = $config;
        $data['page'] = 'common/gallery';
        $data['page_content'] = $page_content;
        $data['type'] = $page_content->type;

        $template = array(
            'common/header',
            'home',
            'common/footer',
        );

        $config->render($template, $data);
        // echo json_encode($data['page_content']);
    }

    public function only()
    {
        $q = $this->uri->segment(2, 25);
        // $q = $this->input->get('q');

        $data = array();

        $data['lang'] = $this->input->get('lang');
        if (!$data['lang']) {
            $data['lang'] = $this->MUtils->getDefaultLanguage();
        }

        $this->load->model('MPage');

        $page_content = $this->MPage->viewById($this->MUtils->StringPrepare($q));

        $slide_sql = "select image from slideshow order by id asc";
        $data['slideshow'] = $this->db->query($slide_sql)->result();

        $recent_news = $this->MPage->view("News");
        $data['recent_news'] = $recent_news;

        $activities = $this->MPage->view("Activities");
        $data['activities'] = $activities;

        $config = new Config();
        $data['config'] = $config;
        $data['page'] = 'common/page';
        $data['page_content'] = $page_content[0];
        $data['type'] = $page_content[0]->type;

        $template = [
            'modal'
        ];

        $config->render($template, $data);
    }

    public function majalatAjman()
    {
        $q = $this->uri->segment(2, "editorialboard");
        // $q = $this->input->get('q');

        $data = array();

        $this->load->model('Msetting');

        $this->Msetting->increment();
        $data['visitor'] = $this->Msetting->getbyKey('visitor');
        $this->load->model('MPage');
        $config = new Config();
        $data['config'] = $config;

        $data['lang'] = $this->input->get('lang');
        if (!$data['lang']) {
            $data['lang'] = $this->MUtils->getDefaultLanguage();
        }

        if (strtolower($q) == "abstracts") {

            $all_content = $this->MPage->view("Abstracts");

            $page_content = [];
            foreach ($all_content as $key => $value) {
                if ($value->languageid == $data['lang']) {
                    $page_content[$key] = $value;
                }
            }

            $data['heading'] = 'إصدارات مجلة عجمان للدراسات والبحوث';
            $data['page'] = 'common/table';
            $data['type'] = "abstracts";
    
        } else {

            // $page_content = $this->MPage->viewById($this->MUtils->StringPrepare($q));
            $page_content = $this->MPage->viewByTerm($q);

            foreach ($page_content as $key => $value) {
                if ($value->languageid == $data['lang']) {
                    $page_content = $value;
                }
            }

            $data['page'] = 'common/page';
            $data['type'] = "reporting";
        }

        if ($page_content == []) {
            $this->load->helper('url');
            redirect(base_url().'home', 'refresh');
        }

        $slide_sql = "SELECT image FROM slideshow ORDER BY id ASC";
        $data['slideshow'] = $this->db->query($slide_sql)->result();

        $recent_news = $this->MPage->view("News");
        $data['recent_news'] = $recent_news;

        $activities = $this->MPage->view("Activities");
        $data['activities'] = $activities;

        $data['page_content'] = $page_content;

        $template = array(
            'common/header',
            'home',
            'common/footer',
        );

        $config->render($template, $data);
    }

    public function clanguage()
    {

        $lang = $this->input->get('lang');

        if ($lang == 1 || $lang == null) { $lang = 2; }
        else { $lang = 1; }


        redirect(base_url().$this->input->get('url').'?lang=' . $lang, 'refresh');
    }
}
