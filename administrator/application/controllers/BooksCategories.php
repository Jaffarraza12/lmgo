<?php

class BooksCategories extends CI_Controller {

    public function index()
    {
        $this->load->helper('url');
        redirect('BooksCategories/all', 'refresh');
    }

    public function all()
    {
        $page_content = $this->db->query('SELECT * FROM books_categories')->result();

        $data['page_content'] = $page_content;
        $data['main_content'] = "Admin/BooksCategories/All";
        
        $this->load->view('Admin/default.php', $data);
    }

    public function add()
    {
        $data['main_content'] = "Admin/BooksCategories/Add";
        
        $this->load->view('Admin/default.php', $data);
    }

    public function addcategory()
    {
        $data['name'] = $this->input->post('name');
        $this->db->insert('books_categories', $data);

        $this->load->helper('url');
        redirect('BooksCategories/all', 'refresh');
    }

    public function edit()
    {
        $page_content = $this->db->query('SELECT * FROM books_categories WHERE id = ' . $this->input->get('id'))->result();

        $data['page_content'] = $page_content[0];
        $data['main_content'] = "Admin/BooksCategories/Edit";
        
        $this->load->view('Admin/default.php', $data);
    }

    public function editcategory()
    {
        $data['name'] = $this->input->post('name');
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('books_categories', $data);

        $this->load->helper('url');
        redirect('BooksCategories/all', 'refresh');
    }

    public function del()
    {
        $this->db->delete('books_categories', ['id' => $this->input->post('id')]);

        $this->load->helper('url');
        redirect('BooksCategories/all', 'refresh');
    }

}