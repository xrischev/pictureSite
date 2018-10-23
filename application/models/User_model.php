<?php

class User_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function register($enc_password)
    {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $enc_password;


        $data = array(
            'email' => $email,
            'password' => $password,
            'userName' => $username,
        );

        return $this->db->insert('users', $data);
    }

    public function login($username, $password)
    {
        $result = $this->db->query('SELECT * FROM users WHERE username=\'' . $username . '\'AND password=\'' . $password . '\';');

        if ($result->num_rows() == 1) {
            return $result->result_array()[0]['id'];
        } else {
            return false;
        }
    }

    public function get_information_user($user_id)
    {
        $result = $this->db->query('SELECT * FROM users WHERE id=\'' . $user_id . '\';');
        return $result->result_array()[0];
    }

    public function check_username_exists($username)
    {
        $query = $this->db->get_where('users', array('username' => $username));

        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }

    public function check_email_exists($email)
    {
        $query = $this->db->get_where('users', array('email' => $email));

        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllUsers($limit = FALSE, $offset = FALSE)
    {

        if ($limit) {
            $this->db->limit($limit, $offset);
        }

//        $query=$this->db->get_where('upload_images',array('slug'=>$slug));
//        return $query->row_array();


        $this->db->order_by('users.countPicture', 'DESC');
        $query = $this->db->get('users');

//        $query = $this->db->query('SELECT * FROM users ORDER BY countPicture DESC');

        return $query->result_array();
    }

    public function update_profile()
    {
        $data=array(
            'userName'=>$this->input->post('userName'),
            'email'=>$this->input->post('email'),
        );

        $this->db->where('id',$this->input->post('id'));
        return $this->db->update('users',$data);
    }
}