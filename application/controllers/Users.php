<?php
class Users extends CI_Controller {
    public function register(){
        $data['title']='Sign Up';

        $this->form_validation->set_rules('username','Username','required|callback_check_username_exists');
        $this->form_validation->set_rules('email','Email','required|callback_check_email_exists');

        $this->form_validation->set_rules('password','Password','required');

        if($this->form_validation->run()===FALSE){
            $this->load->view('templates/header');
            $this->load->view('user/register',$data);
            $this->load->view('templates/footer');
        }else{
            $enc_password=md5($this->input->post('password'));

            $config['upload_path']='./assets/images/profile';
            $config['allowed_types']='gif|jpg|png';
            $config['max_size']='5000';
            $config['max_width']='2000';
            $config['max_height']='2000';

            $this->session->set_flashdata('user_register','You are now registered and can log in ');

            $this->user_model->register($enc_password);
            redirect('/users/login');
        }
    }

    public function logout(){
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');

        $this->session->set_flashdata('user_loggedout','You are now log out ');

        redirect('users/login');
    }

    public function login(){
        $data['title']='Login Up';

        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');

        if($this->form_validation->run()===FALSE){
            $this->load->view('templates/header');
            $this->load->view('user/login',$data);
            $this->load->view('templates/footer');
        }else{
            $username=$this->input->post('username');
            $password=md5($this->input->post('password'));
            $user_id=$this->user_model->login($username,$password);

            if($user_id){
                $user_data=array(
                    'user_id'=>$user_id,
                    'username'=>$username,
                    'logged_in'=>true,
                    'isAdmin'=> $username === 'admin'
                );

                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('user_loggedin','You are now login ');

                redirect('/viewImage');
            }else{
                $this->session->set_flashdata('login_failed','logig is fail! ');
                redirect('users/login');
            }
        }
    }

    public function check_username_exists($username){
        $this->form_validation->set_message('check_username_exists','That username is taken.Please choose a different one');

        if($this->user_model->check_username_exists($username)){
            return true;
        }else{
            return false;
        }
    }

    public function check_email_exists($email){
        $this->form_validation->set_message('
       check_email_exists','That email is taken.Please choose a different one');

        if($this->user_model->check_email_exists($email)){
            return true;
        }else{
            false;
        }
    }

    public function profile(){

        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }

        $user_id=$this->session->userdata('user_id');

        $data['user']= $this->user_model->get_information_user($user_id);
        $this->load->view('templates/header');
        $this->load->view('user/profile',$data);
        $this->load->view('templates/footer');

    }

    public function all($offset=0){
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }

        $config['base_url']=base_url().'allUsers';
        $config['total_rows']=$this->db->count_all('users');
        $config['per_page']=10;
        $config['uri_segment']=10;
        $config['attributes']=array('class'=>'pagination-link');

        $this->pagination->initialize($config);
        $data['title']='Images' ;
        $data['users'] = $this->user_model->getAllUsers($config['per_page'],$offset);

        $this->load->view('templates/header');
        $this->load->view('user/all',$data);
        $this->load->view('templates/footer');
    }

    public function update(){

        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }

        $this->user_model->update_profile();
        $this->session->set_flashdata('profile_updated','You edited your profile');

        redirect('users/profile');
    }
}