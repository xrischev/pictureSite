<?php
class Images extends CI_Controller {
    public function index($offset=0){
        $config['base_url']=base_url().'viewImage';
        $config['total_rows']=$this->db->count_all('upload_images');
        $config['per_page']=10;
        $config['uri_segment']=10;
        $config['attributes']=array('class'=>'pagination-link');

        $this->pagination->initialize($config);

        $data['title']='Images' ;
        $data['posts']=$this->images_model->view_images($config['per_page'],$offset);

        $this->load->view('templates/header');
        $this->load->view('images/view',$data);
        $this->load->view('templates/footer');
    }
    public function view($id=NULL){
        $data['image']=$this->images_model->get_image($id);
        $post_id=$data['image']['id'];
        $data['comments']=$this->comment_model->get_comments($post_id);

        if(empty($data['image'])){
            show_404();
        }

        $this->load->view('templates/header');
        $this->load->view('images/singleView',$data);
        $this->load->view('templates/footer');
    }
}