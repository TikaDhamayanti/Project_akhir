<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{

    public function total_barang()
    {
        return $this->db->get('barang')->num_rows();
    }
    public function total_kategori()
    {
        return $this->db->get('kategori')->num_rows();
    }
    public function total_user()
    {
        return $this->db->get('user')->num_rows();
    }
    public function total_pesanan()
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->where('status_order=0');
        return $this->db->get()->num_rows();
    }

    public function login_user($email, $password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where(array(
            'email' => $email,
            'password' => $password
        ));
        return $this->db->get()->row();
    }
}
