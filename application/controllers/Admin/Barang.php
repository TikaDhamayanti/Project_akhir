<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('M_barang');
        $this->load->model('M_kategori');
    }
    public function index()
    {
        $data = array(
            'title' => 'Barang',
            'isi' => 'barang/v_barang',
            'barang' => $this->M_barang->get_all_data(),


        );
        $this->load->view('template_admin/wrapper_backend', $data);
    }
    public function add()
    {
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required', [
            'required' => 'This field is required!'
        ]);
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required', [
            'required' => 'This field is required!'
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required', [
            'required' => 'This field is required!'
        ]);
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required', [
            'required' => 'This field is required!'
        ]);

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|jfif|jpeg';
            $config['max_width']            = 2000;
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Add Barang',
                    'error_upload' => $this->upload->display_errors(),
                    'kategori' => $this->M_kategori->get_all_data(),
                    'isi' => 'barang/v_add',
                );
                $this->load->view('template_admin/wrapper_backend', $data);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './uploads/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_barang' => $this->input->post('nama_barang'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'harga' => $this->input->post('harga'),
                    'keterangan' => $this->input->post('keterangan'),
                    'gambar' => $upload_data['uploads']['file_name']
                );
                $this->M_barang->add($data);
                $this->session->set_flashdata('name', 'value');
            }
        }

        $data = array(
            'title' => 'Add Barang',
            'kategori' => $this->M_kategori->get_all_data(),
            'isi' => 'barang/v_add',
        );
        $this->load->view('template_admin/wrapper_backend', $data);
    }
    public function edit($id_barang = null)
    {
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required', [
            'required' => 'This field is required!'
        ]);
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required', [
            'required' => 'This field is required!'
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required', [
            'required' => 'This field is required!'
        ]);
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required', [
            'required' => 'This field is required!'
        ]);

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|jfif|jpeg';
            $config['max_width']            = 2000;
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Edit Barang',
                    'error_upload' => $this->upload->display_errors(),
                    'kategori' => $this->M_kategori->get_all_data(),
                    'barang' => $this->M_barang->get_data($id_barang),
                    'isi' => 'barang/v_edit',
                );
                $this->load->view('template_admin/wrapper_backend', $data);
            } else {
                //hapus gambar
                $barang = $this->M_barang->get_data($id_barang);
                if ($barang->gambar != "") {
                    unlink('./uploads/' . $barang->gambar);
                }
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './uploads/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_barang' => $id_barang,
                    'nama_barang' => $this->input->post('nama_barang'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'harga' => $this->input->post('harga'),
                    'keterangan' => $this->input->post('keterangan'),
                    'gambar' => $upload_data['uploads']['file_name']
                );
                $this->M_barang->edit($data);
                $this->session->set_flashdata('pesan', 'Data berhasil diedit!');
                redirect('admin/barang');
            }
            //jika gambar tidak diedit
            $data = array(
                'id_barang' => $id_barang,
                'nama_barang' => $this->input->post('nama_barang'),
                'id_kategori' => $this->input->post('id_kategori'),
                'harga' => $this->input->post('harga'),
                'keterangan' => $this->input->post('keterangan'),
            );
            $this->M_barang->edit($data);
        }

        $data = array(
            'title' => 'Add Barang',
            'kategori' => $this->M_kategori->get_all_data(),
            'barang' => $this->M_barang->get_data($id_barang),
            'isi' => 'barang/v_edit',
        );
        $this->load->view('template_admin/wrapper_backend', $data);
    }
    public function delete($id_barang = null)
    {
        //hapus gambar
        $barang = $this->M_barang->get_data($id_barang);
        if ($barang->gambar != "") {
            unlink('./uploads/' . $barang->gambar);
        }
        $data = array('id_barang' => $id_barang);
        $this->M_barang->delete($data);
    }
}
