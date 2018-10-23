<?php
class UploadImage extends CI_Controller {
    public function index(){
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $this->load->view('templates/header');
        $this->load->view('images/upload');
        $this->load->view('templates/footer');
    }

    public function upload(){
        $config['upload_path']='./assets/images/posts';
        $config['allowed_types']='gif|jpg|png';
        $config['max_size']='2048';
        $config['max_width']='700';
        $config['max_height']='700';

        $this->load->library('upload',$config);

        if(!$this->upload->do_upload()){
            $post_image='noimage.jpg';
        }
        else{
//            $data=array('error'=>$this->upload->data());
            $post_image=$_FILES['userfile']['name'];
        }

        $this->images_model->upload_image($post_image);

        redirect('viewImage');
    }

    public function delete($id){
        $this->images_model->delete_image($id);
        $this->session->set_flashdata('post_deleted','You are post has been deleted ');

        redirect('viewImage');
    }
}