<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_transaksi');
        $this->load->model('M_pmasuk');
    }

    public function index()
    {
        $data = array(
            'title' => "MyOrder",
            'belum_bayar' => $this->M_transaksi->belum_bayar(),
            'diproses' => $this->M_transaksi->proses(),
            'dikirim' => $this->M_transaksi->dikirim(),
            'diterima' => $this->M_transaksi->diterima(),
            'pelanggan' => $this->db->get_where('pelanggan', ['email' => $this->session->userdata('email')])->row_array()
        );
        $this->load->view('template_user/header', $data);
        $this->load->view('template_user/topbar', $data);
        $this->load->view('v_order', $data);
        $this->load->view('template_user/footer');
    }

    public function bayar($id_transaksi)
    {

        $this->form_validation->set_rules('atas_nama', 'Atas Nama', 'required', [
            'required' => 'This field is required!'
        ]);
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required', [
            'required' => 'This field is required!'
        ]);
        $this->form_validation->set_rules('no_rek', 'Nomor Rekening', 'required', [
            'required' => 'This field is required!'
        ]);

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']          = './assets/bukti_bayar';
            $config['allowed_types']        = 'jpg|png|jfif|jpeg';
            $config['max_width']            = 2000;
            $this->upload->initialize($config);
            $field_name = 'bukti_bayar';
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => "Pembayaran",
                    'pesanan' => $this->M_transaksi->detail_pesanan($id_transaksi),
                    'rekening' => $this->M_transaksi->rekening(),
                    'isi' => 'v_bayar',
                );
                $this->load->view('template_user/wrapper', $data);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/bukti_bayar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_transaksi' => $id_transaksi,
                    'atas_nama' => $this->input->post('atas_nama'),
                    'nama_bank' => $this->input->post('nama_bank'),
                    'no_rek' => $this->input->post('no_rek'),
                    'status_bayar' => '1',
                    'bukti_bayar' => $upload_data['uploads']['file_name']
                );
                $this->M_transaksi->bukti_bayar($data);
                $this->session->set_flashdata('pesan', 'Gambar berhasil diupload');
                redirect('pesanan');
            }
        }
        $data = array(
            'title' => "Pembayaran",
            'pesanan' => $this->M_transaksi->detail_pesanan($id_transaksi),
            'rekening' => $this->M_transaksi->rekening(),
            'isi' => 'v_bayar',
            'pelanggan' => $this->db->get_where('pelanggan', ['email' => $this->session->userdata('email')])->row_array()

        );
        $this->load->view('template_user/wrapper', $data);
    }

    public function proses()
    {
        $data = array(
            'title' => "MyOrder",
            'belum_bayar' => $this->M_transaksi->belum_bayar(),
            'pelanggan' => $this->db->get_where('pelanggan', ['email' => $this->session->userdata('email')])->row_array()
        );
        $this->load->view('template_user/header', $data);
        $this->load->view('template_user/topbar', $data);
        $this->load->view('v_order', $data);
        $this->load->view('template_user/footer');
    }

    public function diterima($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_order' => 3,
        );
        $this->M_pmasuk->update_order($data);
        redirect('pesanan');
    }
}
