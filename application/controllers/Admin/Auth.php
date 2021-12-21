<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function login_admin()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == true) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->admin_login->login($email, $password);
        }
        $data = array(
            'title' => 'LAPERPOOL|LOGIN'
        );
        $this->load->view('login/header', $data);
        $this->load->view('v_auth', $data);
        $this->load->view('login/footer');
    }

    public function logout()
    {
        $this->admin_login->logout();
    }
}
