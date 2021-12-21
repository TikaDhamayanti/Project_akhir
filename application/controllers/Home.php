<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_home');
        $this->pelanggan_login->proteksi_pelanggan();
    }

    public function index()
    {
        $data = array(
            'title' => 'Laperpool',
            'barang' => $this->M_home->get_all_data(),
            'pelanggan' => $this->db->get_where('pelanggan', ['email' => $this->session->userdata('email')])->row_array()
        );

        $this->load->view('template_user/header', $data);
        $this->load->view('template_user/topbar', $data);
        $this->load->view('v_home', $data);
        $this->load->view('template_user/footer', $data);
    }
    public function tambah_ke_keranjang($id)
    {

        $barang = $this->M_home->find($id);

        $data = array(
            'id' => $barang->id_barang,
            'qty' => 1,
            'price' => $barang->harga,
            'name' => $barang->nama_barang,
            'gambar' => $barang->gambar

        );
        $this->cart->insert($data);
        redirect('home');
    }
    public function detail_barang($id_barang)
    {
        $data = array(
            'title' => 'Laperpool',
            'barang' => $this->M_home->detail_barang($id_barang),
            'gambar' => $this->M_home->get_gambar($id_barang),
            'pelanggan' => $this->db->get_where('pelanggan', ['email' => $this->session->userdata('email')])->row_array()

        );
        $this->load->view('template_user/header', $data);
        $this->load->view('template_user/topbar', $data);
        $this->load->view('v_detail', $data);
        $this->load->view('template_user/footer', $data);
    }
    public function shop()
    {
        $data = array(
            'title' => 'Laperpool',
            'barang' => $this->M_home->get_all_data(),
            'pelanggan' => $this->db->get_where('pelanggan', ['email' => $this->session->userdata('email')])->row_array()
        );
        $this->load->view('template_user/header', $data);
        $this->load->view('template_user/topbar', $data);
        $this->load->view('v_shop', $data);
        $this->load->view('template_user/footer', $data);
    }
    public function kategori($id_kategori)
    {
        $kategori = $this->M_home->kategori($id_kategori);
        $data = array(
            'title' => $kategori->nama_kategori,
            'barang' => $this->M_home->get_data_barang($id_kategori),
            'pelanggan' => $this->db->get_where('pelanggan', ['email' => $this->session->userdata('email')])->row_array()
        );
        $this->load->view('template_user/header', $data);
        $this->load->view('template_user/topbar', $data);
        $this->load->view('v_kategori_barang', $data);
        $this->load->view('template_user/footer', $data);
    }
}
