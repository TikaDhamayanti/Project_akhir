<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pelanggan_login
{
    protected $ci;
    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('M_auth');
    }

    public function login($email, $password)
    {
        $cek = $this->ci->M_auth->login_pelanggan($email, $password);
        if ($cek) {
            $email = $cek->email;
            $nama = $cek->nama;
            $role_id = $cek->role_id;
            $id_pelanggan = $cek->id_pelanggan;

            $this->ci->session->set_userdata('email', $email);
            $this->ci->session->set_userdata('nama', $nama);
            $this->ci->session->set_userdata('role_id', $role_id);
            $this->ci->session->set_userdata('id_pelanggan', $id_pelanggan);
            redirect('home');
        } else {
            $this->ci->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
            Email atau password salah </div>');
            redirect('member/login');
        }
    }

    public function proteksi_pelanggan()
    {
        if ($this->ci->session->userdata('email') == '') {
            $this->ci->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
            Anda belum login. </div>');
            redirect('member/login');
        }
    }

    public function logout()
    {
        $this->ci->session->unset_userdata('email');
        $this->ci->session->unset_userdata('nama');
        $this->ci->session->unset_userdata('role_id');
        $this->ci->session->set_flashdata('error', '<div class="alert alert-success" role="alert">
            Anda berhasil logout. </div>');
        redirect('member/login');
    }
}
