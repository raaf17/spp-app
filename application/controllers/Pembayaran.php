<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Data_model', 'Data');
    }

    public function index()
    {
        if (empty($this->session->userdata('username'))) {
            redirect('auth/blocked');
        }

        $data['title'] = 'Transaksi Pembayaran';
        $data['user'] = $this->db->get_where('tbl_petugas', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pembayaran/index', $data);
        $this->load->view('template/footer', $data);
    }

    public function transaksispp()
    {
        if (empty($this->session->userdata('username'))) {
            redirect('auth/blocked');
        }

        $data['title'] = 'Transaksi Pembayaran';
        $data['user'] = $this->db->get_where('tbl_petugas', ['username' => $this->session->userdata('username')])->row_array();

        $keyword = $this->input->get('search');

        $siswa = $this->Data->search($keyword);
        $tagihan = $this->Data->transaksi($keyword);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pembayaran/view', ['siswa' => $siswa, 'tagihan' => $tagihan]);
        $this->load->view('template/footer', $data);
    }

    public function transaksi($id)
    {
        $search = $this->db->query("SELECT `tbl_siswa`.`NISN` FROM `tbl_siswa`, `tbl_pembayaran` WHERE `tbl_pembayaran`.`NISN` = `tbl_siswa`.`NISN` AND `tbl_pembayaran`.`ID_PEMBAYARAN` = '" . $id . "'")->row_array();

        $jml_bayar = $this->input->post('jml_bayar');
        $siswa

        $tgl_bayar = date('Y-m-d');
        if ($jml_bayar < $search->JUMLAH_BAYAR) {
            $ket = 'BELUM LUNAS';
        } else if ($jml_bayar == $search->JUMLAH_BAYAR) {
            $ket = 'LUNAS';
        }

        $data = [
            'tgl_bayar' => $tgl_bayar,
            'jumlah_bayar' => $jml_bayar,
            'ket' => $ket,
            'id_petugas' => $this->session->userdata('id_petugas')
        ];

        $this->db->set($data);
        $this->db->where('id_pembayaran', $id);
        $this->db->update('tbl_pembayaran');

        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            activity_log('pembayaran', 'Menambah data transaksi pembayaran', $assign_to, $assign_type);

            $this->session->set_flashdata('success',  'Transaksi pembayaran sukses');

            redirect('pembayaran/transaksispp?search=' . $search['NISN']);
        }
    }

    public function hapus($id)
    {
        $search = $this->db->query("SELECT `tbl_siswa`.`NISN` FROM `tbl_siswa`, `tbl_pembayaran` WHERE `tbl_pembayaran`.`NISN` = `tbl_siswa`.`NISN` AND `tbl_pembayaran`.`ID_PEMBAYARAN` = '" . $id . "'")->row_array();

        $tgl_bayar = null;
        $ket = null;

        $data = [
            'tgl_bayar' => $tgl_bayar,
            'ket' => $ket
        ];

        $this->db->set($data);
        $this->db->where('id_pembayaran', $id);
        $this->db->update('tbl_pembayaran');

        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            activity_log('pembayaran', 'Menghapus data transaksi pembayaran', $assign_to, $assign_type);

            $this->session->set_flashdata('success',  'Transaksi pembayaran dihapus');

            redirect('pembayaran/transaksispp?search=' . $search['NISN']);
        } else {
            return false;
        }
    }

    public function history()
    {
        $data['title'] = 'History Pembayaran';
        $data['user'] = $this->db->get_where('tbl_petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['siswa'] = $this->db->get_where('tbl_siswa', ['nisn' => $this->session->userdata('NISN')])->row_array();
        $keyword = $this->session->userdata('NISN');
        $data['pembayaran'] = $this->Data->history_get($keyword);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pembayaran/history', $data);
        $this->load->view('template/footer', $data);
    }

    public function search_history()
    {
        $keyword = $this->input->post('keyword');
        $history = $this->Data->history_get($keyword);

        $hasil = $this->load->view('pembayaran/history_view', [
            'pembayaran' => $history
        ], true);

        $callback = [
            'Hasil' => $hasil
        ];

        echo json_encode($callback);
    }

    public function bayarlain()
    {
        if (empty($this->session->userdata('username'))) {
            redirect('auth/blocked');
        }

        $data['title'] = 'Transaksi Pembayaran Lainnya';
        $data['user'] = $this->db->get_where('tbl_petugas', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('bayarlainnya/index', $data);
        $this->load->view('template/footer', $data);
    }

    public function transaksispplainnya()
    {
        if (empty($this->session->userdata('username'))) {
            redirect('auth/blocked');
        }

        $data['title'] = 'Transaksi Pembayaran Lainnya';
        $data['user'] = $this->db->get_where('tbl_petugas', ['username' => $this->session->userdata('username')])->row_array();
        $keyword = $this->input->get('search');
        $siswa = $this->Data->search($keyword);
        $tagihan = $this->Data->transaksi($keyword);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('bayarlainnya/view', ['siswa' => $siswa, 'tagihan' => $tagihan]);
        $this->load->view('template/footer', $data);
    }

    public function transaksilainnya($id)
    {
        $search = $this->db->query("SELECT `tbl_siswa`.`NISN` FROM `tbl_siswa`, `tbl_pembayaran` WHERE `tbl_pembayaran`.`NISN` = `tbl_siswa`.`NISN` AND `tbl_pembayaran`.`ID_PEMBAYARAN` = '" . $id . "'")->row_array();

        $tgl_bayar = date('Y-m-d');
        $ket = 'LUNAS';

        $data = [
            'tgl_bayar' => $tgl_bayar,
            'ket' => $ket,
            'id_petugas' => $this->session->userdata('id_petugas')
        ];

        $this->db->set($data);
        $this->db->where('id_pembayaran', $id);
        $this->db->update('tbl_pembayaran');

        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            activity_log('pembayaran', 'Menambah data transaksi pembayaran', $assign_to, $assign_type);

            $this->session->set_flashdata('success',  'Transaksi pembayaran sukses');

            redirect('pembayaran/transaksispp?search=' . $search['NISN']);
        }
    }
}