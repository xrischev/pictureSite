<?php
class Contacts extends CI_Controller {
    public function index(){
        $this->load->view('templates/header');
        $this->load->view('contacts');
        $this->load->view('templates/footer');
    }

    public function create(){
        $this->load->library('email');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $message = $this->input->post('message');

//SMTP & mail configuration
        $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => '',
            'smtp_pass' => '',
            'mailtype'  => 'html',
            'charset'   => 'utf-8'
        );
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");

//Email content
        $htmlContent = '<h1>Sending email via SMTP server</h1>';
        $htmlContent .= '<p>This email has sent via SMTP server from CodeIgniter application.</p>';

        $this->email->to('example');
        $this->email->from($email,$name);
        $this->email->subject($message);
        $this->email->message($htmlContent);

//Send email
        $this->email->send();

        $this->contact_model->create_post();

        redirect('/');
    }
}