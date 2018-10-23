<?php
class Posts extends CI_Controller {
    public function index(){
        $data['title']='latestPost' ;
        $this->load->view('templates/header');
        $this->load->view('index/images',$data);
        $this->load->view('templates/footer');
    }
}