<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_login
{
    protected $ci;
    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('M_auth');
    }

    public function login($email, $password)
    {
        $cek = $this->ci->M_auth->login_admin($email, $password);
        if ($cek) {
            $email = $cek->email;
            $username = $cek->username;
            $role_id = $cek->role_id;

            $this->ci->session->set_userdata('email', $email);
            $this->ci->session->set_userdata('username', $username);
            $this->ci->session->set_userdata('role_id', $role_id);
            redirect('admin/admin');
        } else {
            $this->ci->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
            Email atau password salah </div>');
        }
    }

    public function proteksi_halaman()
    {
        if ($this->ci->session->userdata('email') == '') {
            $this->ci->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
            Anda belum login. </div>');
            redirect('admin/auth/login_admin');
        }
    }

    public function logout()
    {
        $this->ci->session->unset_userdata('email');
        $this->ci->session->unset_userdata('username');
        $this->ci->session->unset_userdata('role_id');
        $this->ci->session->set_flashdata('error', '<div class="alert alert-success" role="alert">
            Anda berhasil logout. </div>');
        redirect('admin/auth/login_admin');
    }
}
