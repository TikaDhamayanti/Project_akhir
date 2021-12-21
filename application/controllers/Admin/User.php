<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
    }
    public function index()
    {
        $data = array(
            'title' => 'User',
            'isi' => 'v_user',
            'user' => $this->M_user->get_all_data(),
        );
        $this->load->view('template_admin/wrapper_backend', $data);
    }
    public function add()
    {
        $data = array(
            'username' => $this->input->post('username', true),
            'email' => $this->input->post('email', true),
            'password' => $this->input->post('password'),
            'role_id' => $this->input->post('role_id')

        );
        $this->M_user->add($data);
        $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan!');
        redirect('admin/user', 'refresh');
    }
    public function edit($id_user = null)
    {
        $data = array(
            'id_user' => $id_user,
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'role_id' => $this->input->post('role_id')

        );
        $this->M_user->edit($data);
        $this->session->set_flashdata('pesan', 'Data berhasil diedit!');
        redirect('admin/user', 'refresh');
    }
    public function delete($id_user = null)
    {
        $data = array('id_user' => $id_user);
        $this->M_user->delete($data);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus!');
        redirect('admin/user', 'refresh');
    }
}
