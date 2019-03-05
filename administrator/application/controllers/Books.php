<?php

class Pages extends CI_Controller {

    //Show differnet types for page
    public function all()
    {
        $query = 'SELECT bk.id, bk.name, bk.filename, bk.category_id, bc.name AS category FROM books bk INNER JOIN books_categories bc ON bk.category_id = bc.id';

        $page_content = $this->db->query('SELECT * FROM books INNER JOIN');

        $data['page_content'] = $page_content;
        $data['main_content'] = "Admin/Books/All";
        
        // $this->load->view('Admin/default.php', $data);

        print_r($data);
    }
    public function add()
    {
        $page_content = $this->db->query('SELECT * FROM books');

        $data['page_content'] = $page_content;
        $data['main_content'] = "Admin/Pages/add";
        
        $this->load->view('Admin/default.php', $data);
    }
    public function edit()
    {
        $page_content = $this->db->query('SELECT * FROM books');

        $data['page_content'] = $page_content;
        $data['main_content'] = "Admin/Pages/add";
        
        $this->load->view('Admin/default.php', $data);
    }
    public function del()
    {
        $page_content = $this->db->query('SELECT * FROM books');

        $data['page_content'] = $page_content;
        $data['main_content'] = "Admin/Pages/add";
        
        $this->load->view('Admin/default.php', $data);
    }

}