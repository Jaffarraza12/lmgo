<?php

class Voice extends CI_Controller {

    //Show the view for adding new pages
    public function Index()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Voice";
        $data['breadcrumb_anchor1'] = "Voice";

        $sql = "select * from voice_gallery order by id asc";
        $page_content = $this->db->query($sql)->result();



        $data['page_content'] = $page_content;
        $data['main_content'] = "Admin/Voice/view";
        
        $this->load->view('Admin/default.php', $data);
    }

    public function Add()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Voice/View";
        $data['breadcrumb_anchor1'] = "Vocie";
        $data['breadcrumb_link2'] = "/Voice/Add";
        $data['breadcrumb_anchor2'] = "Add Voice";

        $data['activeMenu'] = "mnuNews";

        $data['main_content'] = "Admin/Voice/add";
        $this->load->view('Admin/default.php', $data);

    }

    public function AddVoice()
    {
        //Load languages and Default Language
        $languages = $this->MUtils->getLanguages();
        $data['Languages'] = $languages;
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        $data['activeMenu'] = "mnuNews";

        if ($_FILES['audio']['type'] == 'audio/mp3') {
            $ttmp_name = $_FILES["audio"]["tmp_name"];
            $name = time().'.mp3';

            $dir = "./../uploads/audio/";
            if(move_uploaded_file($ttmp_name, "$dir" . "/" . "$name")){
                $voice['audio'] =  $name;
            } else {
                $data['error']['audio'] = 'There are some problem in uploading audio.';
            }
        } else {
            $data['error']['audio'] = 'File Type Should Be MP3 and not empty.';
        }


        if($this->input->post('title') =="" || empty($this->input->post('title'))){
            $data['error']['title'] = 'Title Should not be empty.';
        }


        $voice['image'] = $this->MUtils->doUploadPath('img', 'audio-img',400,400);
        $voice['title'] = $this->input->post('title');
        $voice['author'] = $this->input->post("author");

        if($data['error']){
            $data['breadcrumb_link1'] = "/Voice/View";
            $data['breadcrumb_anchor1'] = "Vocie";
            $data['breadcrumb_link2'] = "/Voice/Add";
            $data['breadcrumb_anchor2'] = "Add Voice";
            $data['activeMenu'] = "mnuNews";
            $data['main_content'] = "Admin/Voice/add";
            $this->load->view('Admin/default.php', array_merge($data,$voice));

        } else {
            $this->load->model('mvoice');
            $this->mvoice->add($voice);
            redirect(base_url().'index.php/Voice');

        }



    }

    //Show the view to edit page
    public function Edit($id)
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
         $sql = "select * from `voice_gallery` where  id= '".(int)$this->input->get('id')."' order by id asc";
        $data['record'] = $this->db->query($sql)->row();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Voice/View";
        $data['breadcrumb_anchor1'] = "Vocie";
        $data['breadcrumb_link2'] = "/Voice/Add";
        $data['breadcrumb_anchor2'] = "Add Voice";

        $data['activeMenu'] = "mnuNews";

        $data['main_content'] = "Admin/Voice/edit";
        $this->load->view('Admin/default.php', $data);
    }

    public function EditVoice()
    {
        //Load languages and Default Language
        $voice['id'] = $this->input->post('id');
        $languages = $this->MUtils->getLanguages();
        $data['Languages'] = $languages;
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
        $data['activeMenu'] = "mnuNews";
        if ($_FILES['audio']['type'] == 'audio/mp3') {
            $ttmp_name = $_FILES["audio"]["tmp_name"];
            $name = time().'.mp3';
            $dir = "./../uploads/audio/";
            if(move_uploaded_file($ttmp_name, "$dir" . "/" . "$name")){
                $voice['audio'] =  $name;
            } else {
                $data['error']['audio'] = 'There are some problem in uploading audio.';
            }
        }
        if($this->input->post('title') =="" || empty($this->input->post('title'))){
            $data['error']['title'] = 'Title Should not be empty.';
        }


        $voice['image'] = $this->MUtils->doUploadPath('img', 'audio-img',400,400);
        $voice['title'] = $this->input->post('title');
        $voice['author'] = $this->input->post("author");

        if($data['error']){
            $data['breadcrumb_link1'] = "/Voice/View";
            $data['breadcrumb_anchor1'] = "Vocie";
            $data['breadcrumb_link2'] = "/Voice/Edit?id= '".(int)$this->input->get('id')."'";
            $data['breadcrumb_anchor2'] = "Edit Voice";
            $data['activeMenu'] = "mnuNews";
            $data['main_content'] = "Admin/Voice/edit";
            $this->load->view('Admin/default.php', $data);

        } else {
            $this->load->model('mvoice');
            $this->mvoice->edit($voice);
            redirect(base_url().'index.php/Voice');

        }



    }

    //Delete Page
    public function Delete()
    {
        $json = array();
        if((int)$this->input->get('id')) {
            $this->db->where('id', $this->input->get('id'));
            if ($this->db->delete('voice_gallery')) {
                $json['status'] = "success";
            } else {
                $json['status'] = "failed";
            }
        } else {
            $json['status'] = "failed";
        }
        echo json_encode( $json );

    }

}