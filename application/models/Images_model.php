<?php

class Images_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function upload_image($post_image)
    {
        //check picture are more from 10

        $userId = $this->session->userdata('user_id');
        $countPicture = $this->db->get_where('upload_images', array('user_id' => $userId))->result_array();

        if (count($countPicture) == 9) {
            return false;
        }

        $user = $this->db->get_where('users', array('id' => $userId))->result_array();
        $count = $user[0]['countPicture'];
        $userName = $user[0]['userName'];


        $data = array(
            'countPicture' => $count + 1
        );

        $this->db->where('id', $userId);
        $this->db->update('users', $data);


        $data = array(
            'upload_image' => $post_image,
            'user_id' => $this->session->userdata('user_id'),
            'userName' => $userName
        );

        return $this->db->insert('upload_images', $data);
    }

    public function view_images($limit = FALSE, $offset = FALSE)
    {
        if ($limit) {
            $this->db->limit($limit, $offset);
        }

//        $query=$this->db->get_where('upload_images',array('slug'=>$slug));
//        return $query->row_array();

        $this->db->order_by('upload_images.created_at', 'DESC');
        $query = $this->db->get('upload_images');
        return $query->result_array();
    }

    public function get_image($id)
    {
        $query = $this->db->get_where('upload_images', array('id' => $id));

        return $query->row_array();
    }

    public function delete_image($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('upload_images');
        return true;
    }
}