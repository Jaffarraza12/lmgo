<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MajalatAjman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->helper('url');
        redirect(base_url() . 'MajalatAjman/EditorialBoard?lang_id=1', 'refresh');
    }

    public function EditorialBoard()
    {
        $lang_id = $this->input->get('lang_id');

        //Load languages and Default Language
        $languages = $this->MUtils->getLanguages();
        $data['Languages'] = $languages;

        $data['defaultLang'] = $lang_id;
        if ($lang_id === FALSE) {
            $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
        }

        $config = new Config();
        $data['config'] = $config;

        $this->load->model('MPage');
        $all_content = $this->MPage->viewByIdLang(28);

        $data['page'] = 'common/page';

        foreach ($all_content as $value) {
            if ($value->languageid == $data['defaultLang']) { $data['page_content'] = $value; }
        }

        $template = array(
            'common/header',
            'home',
            'common/footer',
        );

        $config->render($template, $data);
    }

    public function IntroductionObjectives()
    {
        $lang_id = $this->input->get('lang_id');

        //Load languages and Default Language
        $languages = $this->MUtils->getLanguages();
        $data['Languages'] = $languages;

        $data['defaultLang'] = $lang_id;
        if ($lang_id === FALSE) {
            $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
        }

        $config = new Config();
        $data['config'] = $config;

        $this->load->model('MPage');
        $all_content = $this->MPage->viewByIdLang(29);

        $data['page'] = 'common/page';

        foreach ($all_content as $value) {
            if ($value->languageid == $data['defaultLang']) {
                $data['page_content'] = $value;
            }
        }

        $template = array(
            'common/header',
            'home',
            'common/footer',
        );

        $config->render($template, $data);
    }

    public function PublishingRules()
    {
        $lang_id = $this->input->get('lang_id');

        //Load languages and Default Language
        $languages = $this->MUtils->getLanguages();
        $data['Languages'] = $languages;

        $data['defaultLang'] = $lang_id;
        if ($lang_id === FALSE) {
            $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
        }

        $config = new Config();
        $data['config'] = $config;

        $this->load->model('MPage');
        $all_content = $this->MPage->viewByIdLang(30);

        $data['page'] = 'common/page';

        foreach ($all_content as $value) {
            if ($value->languageid == $data['defaultLang']) {
                $data['page_content'] = $value;
            }
        }

        $template = array(
            'common/header',
            'home',
            'common/footer',
        );

        $config->render($template, $data);
    }

    public function Abstracts()
    {
        $lang_id = $this->input->get('lang_id');

        //Load languages and Default Language
        $languages = $this->MUtils->getLanguages();
        $data['Languages'] = $languages;

        $data['defaultLang'] = $lang_id;
        if ($lang_id === FALSE) {
            $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
        }

        $config = new Config();
        $data['config'] = $config;

        $this->load->model('MPage');
        $all_content = $this->MPage->viewByIdLang(31);

        $data['page'] = 'common/page';

        foreach ($all_content as $value) {
            if ($value->languageid == $data['defaultLang']) {
                $data['page_content'] = $value;
            }
        }

        $template = array(
            'common/header',
            'home',
            'common/footer',
        );

        $config->render($template, $data);
    }

    public function switchLanguage()
    {
    }
}