<?php
class Comment_model extends CI_Model {
    public function __construct(){
        $this->load->database();
    }

    public function create_comment($image_id){
        $data=array(
            'image_id'=>$image_id,
            'body'=>$this->input->post('body')
        );

        return $this->db->insert('comments',$data);
    }

    public function get_comments($imageId){
        $result = $this->db->query('SELECT * FROM comments WHERE image_id=\'' . $imageId . '\';');
        return $result->result_array();
    }

    public function delete_comment($id){
        $this->db->where('id', $id);
        $this->db->delete('comments');

        return true;
    }
}