<?php
class Comments extends CI_Controller {
    public function create($image_id){
        $data['image']=$this->images_model->get_image($image_id);

        $this->form_validation->set_rules('body','Body','required');

        if($this->form_validation->run()===FALSE){
            $this->load->view('templates/header');
            $this->load->view('templates/footer');
        }
        else{
            $this->comment_model->create_comment($image_id);
            redirect('image/'.$image_id);
        }
    }

    public function view($id){
        $data['comments'] = $this->comment_model->get_comments($id);

        if($data['comments']){
            $this->load->view('templates/header');
            $this->load->view('admin/comments',$data);
            $this->load->view('templates/footer');
        }
    }

    public function delete($id){
        $deletedComment = $this->comment_model->delete_comment($id);

        if($deletedComment){
            redirect('viewImage/');
        }
    }
}