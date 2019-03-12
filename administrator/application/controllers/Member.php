<?php

class Member extends CI_Controller {

    //Show the view for adding new pages
    public function Index()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Voice";
        $data['breadcrumb_anchor1'] = "Voice";

        $sql = "select * from member order by id asc";
        $page_content = $this->db->query($sql)->result();



        $data['page_content'] = $page_content;
        $data['main_content'] = "Admin/Member/view";
        
        $this->load->view('Admin/default.php', $data);
    }

    public function Add()
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Member/View";
        $data['breadcrumb_anchor1'] = "Member";
        $data['breadcrumb_link2'] = "/Member/Add";
        $data['breadcrumb_anchor2'] = "Add Member";

        $data['activeMenu'] = "mnuNews";

        $data['main_content'] = "Admin/Member/add";
        $this->load->view('Admin/default.php', $data);

    }

    public function AddMember()
    {
        //Load languages and Default Language
        $languages = $this->MUtils->getLanguages();
        $data['Languages'] = $languages;
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();

        $data['activeMenu'] = "mnuNews";




        if($this->input->post('name') =="" || empty($this->input->post('name'))){
            $data['error']['title'] = 'Name Should not be empty.';
        }

        $member['name'] = $this->input->post('name');
        $member['program'] = $this->input->post('program');
        $member['card_number'] = $this->input->post('card_number');
        $member['month'] = $this->input->post('month');
        $member['year'] = $this->input->post('year');
        $member['image'] = $this->MUtils->doUploadPath('img', 'certificate',400,400);

        if($data['error']){
            $data['breadcrumb_link1'] = "/Member/View";
            $data['breadcrumb_anchor1'] = "Member";
            $data['breadcrumb_link2'] = "/Member/Add";
            $data['breadcrumb_anchor2'] = "Add Member";
            $data['activeMenu'] = "mnuNews";
            $data['main_content'] = "Admin/Member/add";
            $this->load->view('Admin/default.php', array_merge($data,$member));

        } else {
            $this->load->model('mmember');
            $this->mmember->add($member);
            redirect(base_url().'index.php/Member');

        }



    }

    //Show the view to edit page
    public function Edit($id)
    {
        //Load languages and Default Language
        $data['Languages'] = $this->MUtils->getLanguages();
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
         $sql = "select * from `member` where  id= '".(int)$this->input->get('id')."' order by id asc";
        $data['record'] = $this->db->query($sql)->row();

        //BreadCrumb URLs
        $data['breadcrumb_link1'] = "/Member/View";
        $data['breadcrumb_anchor1'] = "Member";
        $data['breadcrumb_link2'] = "/Member/Add";
        $data['breadcrumb_anchor2'] = "Add Member";

        $data['activeMenu'] = "mnuNews";

        $data['main_content'] = "Admin/Member/edit";
        $this->load->view('Admin/default.php', $data);
    }

    public function EditMember()
    {
        //Load languages and Default Language
        $member['id'] = $this->input->post('id');
        $languages = $this->MUtils->getLanguages();
        $data['Languages'] = $languages;
        $data['defaultLang'] = $this->MUtils->getDefaultLanguage();
        $data['activeMenu'] = "mnuNews";
        $member['name'] = $this->input->post('name');
        $member['program'] = $this->input->post('program');
        $member['card_number'] = $this->input->post('card_number');
        $member['month'] = $this->input->post('month');
        $member['year'] = $this->input->post('year');
        $member['image'] = $this->MUtils->doUploadPath('img', 'certificate',400,400);
        if($data['error']){
            $data['breadcrumb_link1'] = "/Member/View";
            $data['breadcrumb_anchor1'] = "Member";
            $data['breadcrumb_link2'] = "/Member/Edit?id= '".(int)$this->input->get('id')."'";
            $data['breadcrumb_anchor2'] = "Edit Member";
            $data['activeMenu'] = "mnuNews";
            $data['main_content'] = "Admin/Member/edit";
            $this->load->view('Admin/default.php', $data);

        } else {
            $this->load->model('mmember');
            $this->mmember->edit($member);
            redirect(base_url().'index.php/Member');

        }



    }

    //Delete Page
    public function Delete()
    {
        $json = array();
        if((int)$this->input->get('id')) {
            $this->db->where('id', $this->input->get('id'));
            if ($this->db->delete('member')) {
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