<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gambar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_gambar');
        $this->load->model('M_barang');
    }
    public function index()
    {
        $data = array(
            'title' => 'Gambar Barang',
            'gambar' => $this->M_gambar->get_all_data(),
            'isi' => 'gambar_barang/v_gambar'
        );
        $this->load->view('template_admin/wrapper_backend', $data);
    }
    public function add($id_barang)
    {
        $this->form_validation->set_rules('keterangan_gambar', 'Keterangan Gambar', 'required', [
            'required' => 'This field is required!'
        ]);

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']          = './assets/gambar/';
            $config['allowed_types']        = 'gif|jpg|png|jfif|jpeg';
            $config['max_width']            = 2000;
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Add Gambar Barang',
                    'barang' => $this->M_barang->get_data($id_barang),
                    'gambar' => $this->M_gambar->get_gambar($id_barang),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'gambar_barang/v_add',
                );
                $this->load->view('template_admin/wrapper_backend', $data);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_barang' => $id_barang,
                    'keterangan_gambar' => $this->input->post('keterangan_gambar'),
                    'gambar' => $upload_data['uploads']['file_name']
                );
                $this->M_gambar->add($data);
                $this->session->set_flashdata('pesan', 'Gambar berhasil ditambahkan!');
                redirect('admin/gambar/add/' . $id_barang);
            }
        }
        $data = array(
            'title' => 'Add Gambar Barang',
            'barang' => $this->M_barang->get_data($id_barang),
            'gambar' => $this->M_gambar->get_gambar($id_barang),
            'isi' => 'gambar_barang/v_add',
        );
        $this->load->view('template_admin/wrapper_backend', $data);
    }

    public function delete($id_barang, $id_gambar)
    {
        //hapus gambar
        $gambar = $this->M_gambar->get_data($id_gambar);
        if ($gambar->gambar != "") {
            unlink('./assets/gambar/' . $gambar->gambar);
        }
        $data = array('id_gambar' => $id_gambar);
        $this->M_gambar->delete($data);
        $this->session->set_flashdata('pesan', 'Gambar berhasil dihapus!');
        redirect('admin/gambar/add/' . $id_barang);
    }
}
