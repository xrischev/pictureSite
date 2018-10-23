<?php

class Admin_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getStatisticUsers()
    {

//        $query=$this->db->get_where('upload_images',array('slug'=>$slug));
//        return $query->row_array();
        $query = $this->db->query('SELECT * FROM users ORDER BY created_at DESC LIMIT 5');

//        $query = $this->db->query('SELECT * FROM users ORDER BY countPicture DESC');

        return $query->result_array();
    }

    public function getStatisticPicture()
    {
        $query = $this->db->query('SELECT * FROM upload_images ORDER BY created_at DESC LIMIT 5');
//        $query = $this->db->query('SELECT * FROM users ORDER BY countPicture DESC');
        return $query->result_array();
    }

    public function getListUsers($limit = FALSE, $offset = FALSE)
    {
        if ($limit) {
            $this->db->limit($limit, $offset);
        }

//        $query=$this->db->get_where('upload_images',array('slug'=>$slug));
//        return $query->row_array();

        $this->db->order_by('users.created_at', 'DESC');
        $query = $this->db->get('users');

//        $query = $this->db->query('SELECT * FROM users ORDER BY countPicture DESC');

        return $query->result_array();
    }

    public function delete_user($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
        return true;
    }

    public function get_userImages($id){
        $query = $this->db->get_where('upload_images', array('user_id' => $id));

        return $query->result_array();
    }
}