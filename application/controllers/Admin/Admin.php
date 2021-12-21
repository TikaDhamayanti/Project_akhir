<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->model('M_pmasuk');
    }

    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'total_barang' => $this->M_admin->total_barang(),
            'total_pesanan' => $this->M_admin->total_pesanan(),
            'total_kategori' => $this->M_admin->total_kategori(),
            'total_user' => $this->M_admin->total_user(),
            'isi' => 'v_admin',
        );
        $this->load->view('template_admin/wrapper_backend', $data);
    }

    public function pesanan_masuk()
    {
        $data = array(
            'title' => 'Pesanan Masuk',
            'isi' => 'v_pesan_masuk',
            'pesanan' => $this->M_pmasuk->pesanan_masuk(),
            'dikirim' => $this->M_pmasuk->dikirim(),
            'diterima' => $this->M_pmasuk->diterima(),
            'pesanan_proses' => $this->M_pmasuk->proses(),
        );
        $this->load->view('template_admin/wrapper_backend', $data);
    }

    public function proses($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_order' => 1
        );
        $this->M_pmasuk->update_order($data);
        redirect('admin/admin/pesanan_masuk');
    }

    public function kirim($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_order' => 2,
        );
        $this->M_pmasuk->update_order($data);
        redirect('admin/admin/pesanan_masuk');
    }
}
