<?php

class Admin extends CI_Controller
{
    public function statisticUser()
    {
        $data['users'] = $this->admin_model->getStatisticUsers();
        $data['pictures'] = $this->admin_model->getStatisticPicture();

        $this->load->view('templates/header');
        $this->load->view('admin/statistic', $data);
        $this->load->view('templates/footer');
    }

    public function listUsers($offset = 0)
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $config['base_url'] = base_url() . 'admin/listUsers';
        $config['total_rows'] = $this->db->count_all('users');
        $config['per_page'] = 10;
        $config['uri_segment'] = 10;
        $config['attributes'] = array('class' => 'pagination-link');

        $this->pagination->initialize($config);

        $data['users'] = $this->admin_model->getListUsers($config['per_page'], $offset);

        $this->load->view('templates/header');
        $this->load->view('admin/listUsers', $data);
        $this->load->view('templates/footer');
    }

    public function userDelete($id)
    {
        $deletedUser = $this->admin_model->delete_user($id);

        if ($deletedUser) {
            redirect('admin/users/list');
        }
    }

    public function userImages($id)
    {
        $data['userImages']= $this->admin_model->get_userImages($id);

            $this->load->view('templates/header');
            $this->load->view('admin/listUsersImages', $data);
            $this->load->view('templates/footer');
    }
}