<?php

class Contact_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function create_post()
    {

        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'message' => $this->input->post('message')
        );

        return $this->db->insert('postcontacts', $data);
    }
}