<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (empty($this->session->userdata('username') || $this->session->userdata('NISN'))) {
            $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Maaf! Anda harus login terlebih dahulu.</div>');
            redirect('auth');
        }

        $this->load->model('Data_model', 'Data');
        $this->load->model('Log_model', 'Log');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('tbl_petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['siswa'] = $this->db->get_where('tbl_siswa', ['nisn' => $this->session->userdata('NISN')])->row_array();
        $data['jumlahPetugas'] = $this->Data->count_petugas();
        $data['jumlahSiswa'] = $this->Data->count_siswa();
        $data['jumlahTransaksi'] = $this->Data->count_transaksi();
        $data['jumlahAktifitas'] = $this->Log->count_activity();
        $data['log'] = $this->Log->get_activity_log();
        $data['siswasatu'] = $this->Data->get_siswa();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('user/dashboard', $data);
        $this->load->view('template/footer', $data);
    }

    public function laporan()
    {
        $data['title'] = 'Generate Laporan';
        $data['user'] = $this->db->get_where('tbl_petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['siswa'] = $this->db->get_where('tbl_siswa', ['nisn' => $this->session->userdata('NISN')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('user/laporan');
        $this->load->view('template/footer');
    }

    public function cetakPetugas()
    {
        $data['petugas'] = $this->db->get_where('tbl_petugas', ['id_level' => 2])->result();
        $html = $this->load->view('laporan/petugas', $data, true);
        $this->pdfgenerator->generate($html, 'Data Petugas');

        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            activity_log('cetak', 'Mencetak laporan data petugas', $assign_to, $assign_type);
        } else {
            return false;
        }
    }

    public function cetakSiswa()
    {
        $data['siswa'] = $this->Data->siswa_get();
        $html = $this->load->view('laporan/siswa', $data, true);
        $this->pdfgenerator->generate($html, 'Data Siswa');

        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            activity_log('cetak', 'Mencetak laporan data siswa', $assign_to, $assign_type);
        } else {
            return false;
        }
    }

    public function cetakTransaksi()
    {
        $tgl_mulai  = $this->input->post('tgl1');
        $tgl_sampai  = $this->input->post('tgl2');
        $data['transaksi'] = $this->Data->cetakTransaksi($tgl_mulai, $tgl_sampai);
        $html = $this->load->view('laporan/pembayaran', $data, true);
        $this->pdfgenerator->generate($html, 'Data pembayaran', 'A4', 'landscape');

        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            activity_log('cetak', 'Mencetak laporan data transaksi pembayaran', $assign_to, $assign_type);
        } else {
            return false;
        }
    }

    public function cetakStruk($id)
    {
        $data['transaksi'] = $this->Data->cetakStruk($id);
        $this->load->view('laporan/struk', $data);
        // $this->pdfgenerator->generate($html, 'struk pembayaran', 'A4', 'landscape');

        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            activity_log('cetak', 'Mencetak Struk pembayaran', $assign_to, $assign_type);
        } else {
            return false;
        }
    }
}