<?php

class Menu extends CI_Controller {

    //Shows Add Image
    public function Add()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/News/View";
        $data['breadcrumb_anchor1'] = "News";
        $data['breadcrumb_link2'] = "/News/Add";
        $data['breadcrumb_anchor2'] = "Add News";

        $data['activeMenu'] = "mnuNews";
        $this->load->model('malbum');
        $albums = $this->load->model('malbum');
        $languages = $this->MUtils->getLanguages();
        $pages = $this->MContent->viewByType('page')->result();
        $news = $this->MContent->viewByType('news')->result();
        $albums = $this->malbum->GetAll()->result();
        $data['menu'] = array();
        foreach ($languages as $lang){
           //pages
            foreach($pages as $page){
                $data['menu'][$lang->code]['PAGES'][] = array(
                     'cid' => $page->cid,
                     'title' => $page->title,
                     'link' => $page->tag,
                     'slag' => 'page/'.$page->cid
                );
            }
            //news
            foreach($news as $page){
                $data['menu'][$lang->code]['NEWS'][] = array(
                     'cid' => $page->cid,
                     'title' => $page->title,
                     'link' => $page->tag,
                     'slag' => 'get/'.$page->cid

                );
            }

            //news
            foreach($albums as $album){
                $data['menu'][$lang->code]['ALBUMS'][] = array(
                    'cid' => $album->album_id,
                    'title' => $album->name,
                    'link' => 'gallery/'.$album->album_id,
                );
            }
        }



        $data['main_content'] = "Admin/Menu/add";
        $this->load->view('Admin/default.php', $data);
    }

  //Show edit view
    public function Edit()
    {
        //Load languages and Default Language
        $this->load->model("MMenu");
        $this->load->model("MSetting");
        $languages = $this->MUtils->getLanguages();
        $data['Languages'] = $languages;
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
        $data['defaultCode'] = $languages[$data['defaultLang']]->code;

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Media/View";
        $data['breadcrumb_anchor1'] = "Media";
        $data['breadcrumb_link2'] = "/Media/Edit?id=" . (int)$this->input->get('id');
        $data['breadcrumb_anchor2'] = "Edit Media";

        $data['activeMenu'] = "mnuMedia";


        $id = (int)$this->input->get('id');

        $row_menu = $this->MMenu->viewById($id)->result();
        $data['view'] = $this->MUtils->arrangeDataAccordingToLanguage($row_menu, $data);
        $data['menu_id'] = $id;
        $data['menu'] = array();
        $data['site_url'] =  $URL = $this->MSetting->GetByKey('site_url','site_url')->row()->value;;
        $data['activeMenu'] = "mnuNews";
        $this->load->model('malbum');
        $albums = $this->load->model('malbum');
        $languages = $this->MUtils->getLanguages();
        $pages = $this->MContent->viewByType('page')->result();
        $news = $this->MContent->viewByType('news')->result();
        $albums = $this->malbum->GetAll()->result();
        $data['menu'] = array();
        foreach ($languages as $lang){
            //pages
            foreach($pages as $page){
                $data['menu'][$lang->code]['PAGES'][] = array(
                    'cid' => $page->cid,
                    'title' => $page->title,
                    'link' => $page->tag,
                    'slag' => 'page/'.$page->cid
                );
            }
            //news
            foreach($news as $page){
                $data['menu'][$lang->code]['NEWS'][] = array(
                    'cid' => $page->cid,
                    'title' => $page->title,
                    'link' => $page->tag,
                    'slag' => 'get/'.$page->cid

                );
            }

            //news
            foreach($albums as $album){
                $data['menu'][$lang->code]['ALBUMS'][] = array(
                    'cid' => $album->album_id,
                    'title' => $album->name,
                    'link' => 'gallery/'.$album->album_id,
                );
            }
        }



        $data['main_content'] = "Admin/Menu/edit";
        $this->load->view("Admin/default.php", $data);
    }

    //Shows all logo on 1 screen
    public function View($data=array())
    {
        $this->load->model("MMenu");
        $this->load->model("MSetting");
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
           //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Menu/View";
        $data['breadcrumb_anchor1'] = "Menu";
        $data['breadcrumb_anchor2'] = "Manage Album";
        $data['menu'] =array();

        foreach($data['Languages'] as $lang){
            $data['menu'][$lang->code][] = json_decode($this->MSetting->GetByKey('menu',$lang->code)->row()->value);
        }


        $data['menu_new'] =array();
        foreach($data['Languages'] as $lang){
            foreach($this->MMenu->viewByType('code',$lang->code)->result() as $row){
                $data['menu_new'][$lang->code][] = array(
                    'id' => $row->id,
                    'title' => $row->title,
                    'group_id' => $row->group_id,
                    'link' => $row->link,
                    'language' => $row->code,
                );

            }

        }

        $data['activeMenu'] = "mnuMedia";

        $data['main_content'] = "Admin/Menu/view";
        $this->load->view("Admin/default.php", $data);
    }


    // Add New logo in db
    public function AddMenu()
    {
        //Load languages and Default Language
        $this->load->model("MMenu");
        $this->load->model("MSetting");

        $languages = $this->MUtils->getLanguages();
        $data = array();
        $arg = array();
        foreach($languages as $lang){
            $data['title'] = $this->input->post('title_' . $lang->code);
            $URL = $this->MSetting->GetByKey('site_url','site_url')->row()->value;
            if($this->input->post('link_' . $lang->code) != "custom"){
                $data['link'] = $URL.'/'.$this->input->post('link_' . $lang->code);
            } else {
                $data['link'] = $URL.'/'.$this->input->post('custom_' . $lang->code);
            }
            $data['code'] = $lang->code;
            $arg[] = array(
                'title' =>$data['title'],
                'link' => $data['link'],
                'code' => $data['code']
            );
        }
        $status = $this->MMenu->add($arg);

        if ($status==1)
        {
            $data['status'] = "New Menu Added Successfully.";
            $data['statusCode'] = 1;
        }
        $this->view();
    }

    // Add New logo in db
    public function EditMenu()
    {
        //Load languages and Default Language
        $this->load->model("MMenu");
        $this->load->model("MSetting");
        $id = (int)$this->input->get('id');

        $languages = $this->MUtils->getLanguages();
        $data = array();
        foreach($languages as $lang){
            $data['title'] = $this->input->post('title_' . $lang->code);
            $URL = $this->MSetting->GetByKey('site_url','site_url')->row()->value;
            if($this->input->post('link_' . $lang->code) != "custom"){
               $data['link'] = $URL.'/'.$this->input->post('link_' . $lang->code);

            } else {
                $data['link'] = $URL.'/'.$this->input->post('custom_' . $lang->code);
            }
            $data['code'] = $lang->code;
            $status =  $this->MMenu->Edit($data,$id);

        }
        if ($status==1)
        {
            $data['status'] = "New Menu Added Successfully.";
            $data['statusCode'] = 1;
        }
        $this->view();


    }

    // Delete logo from db.
    public function Delete()
    {
        $id = (int) $this->input->get('id');
        $sql = " DELETE FROM `menu_item` WHERE group_id = '".$id."'  ";
        $this->db->query($sql);
        redirect($_SERVER['HTTP_REFERER']);
    }
	

    //Sort Media
    public function Sort()
    {
        $ids = $this->input->post('data');

        $this->load->model("MMedia");
        $status = $this->MMedia->sortMedia($ids);

    }

    public function Save(){
        $menu = $this->input->post('menu');

        $lang = $this->input->post('lang');
        $this->db->where('code','menu');
        $this->db->where('key',$lang);
        $this->db->update('setting',[
            'value'=> $menu,
            'mts'=> 'NOW()',

            ]);

    }

}


?>