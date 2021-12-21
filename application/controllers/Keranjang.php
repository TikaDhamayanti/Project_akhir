<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_transaksi');
    }
    public function index()
    {

        $data = array(
            'title' => "Mycart",
        );
        $this->load->view('template_user/header', $data);
        $this->load->view('template_user/topbar', $data);
        $this->load->view('v_keranjang', $data);
        $this->load->view('template_user/footer', $data);
    }
    public function hapus_keranjang($rowid)
    {
        $this->cart->remove($rowid);
        redirect('keranjang');
    }
    public function edit()
    {

        $i = 1;
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'rowid' => $items['rowid'],
                'qty'   => $this->input->post($i . '[qty]')
            );
            $this->cart->update($data);
            $i++;
        }
        redirect('keranjang');
    }
    public function checkout()
    {
        $this->form_validation->set_rules('atas_nama', 'Nama Penerima', 'required', [
            'required' => 'This field is required!'
        ]);
        $this->form_validation->set_rules('no_telepon', 'no_telepon', 'required', [
            'required' => 'This field is required!'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required', [
            'required' => 'This field is required!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Laperpool',
            );
            $this->load->view('template_user/header', $data);
            $this->load->view('template_user/topbar', $data);
            $this->load->view('v_checkout', $data);
            $this->load->view('template_user/footer', $data);
        } else {
            $data = array(
                'id_pelanggan' => $this->session->userdata('id_pelanggan'),
                'no_order' => $this->input->post('no_order'),
                'tanggal_order' => date('Y-m-d'),
                'atas_nama' => $this->input->post('atas_nama'),
                'no_telepon' => $this->input->post('no_telepon'),
                'alamat' => $this->input->post('alamat'),
                'ongkir' => $this->input->post('ongkir'),
                'total' => $this->input->post('total'),
                'total_bayar' => $this->input->post('total_bayar'),
                'status_bayar' => '0',
                'status_order' => '0'
            );
            $this->M_transaksi->simpan_transaksi($data);

            //simpan ke table rincian transaksi
            $i = 1;
            foreach ($this->cart->contents() as $items) {
                $data_rinci = array(
                    'no_order' => $this->input->post('no_order'),
                    'id_barang' => $items['id'],
                    'qty' => $this->input->post('qty')
                );
                $this->M_transaksi->rincian_transaksi($data_rinci);
            }

            $this->cart->destroy();
            $this->session->set_flashdata('pesan', 'Pesanan Berhasil Diproses');
            redirect('pesanan');
        }
    }
    public function hapus_semua_keranjang()
    {
        $this->cart->destroy();
        redirect('keranjang');
    }

    public function proses_checkout()
    {
    }
}
