<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('M_kategori');
    }
    public function index()
    {
        $data = array(
            'title' => 'Kategori',
            'isi' => 'v_kategori',
            'kategori' => $this->M_kategori->get_all_data()

        );
        $this->load->view('template_admin/wrapper_backend', $data);
    }
    public function add()
    {
        $data = array(
            'nama_kategori' => $this->input->post('nama_kategori'),
        );
        $this->M_kategori->add($data);
        $this->session->set_flashdata('flash', 'Data berhasil ditambahkan!');
        redirect('admin/kategori');
    }
    public function edit($id_kategori = null)
    {
        $data = array(
            'id_kategori' => $id_kategori,
            'nama_kategori' => $this->input->post('nama_kategori')

        );
        $this->M_kategori->edit($data);
        $this->session->set_flashdata('pesan', 'Data berhasil diedit!');
        redirect('admin/kategori');
    }
    public function delete($id_kategori = null)
    {
        $data = array('id_kategori' => $id_kategori);
        $this->M_kategori->delete($data);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus!');
        redirect('admin/kategori');
    }
}
