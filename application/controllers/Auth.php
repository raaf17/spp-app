<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Account_model', 'Account');
        $this->load->model('Data_model', 'Data');
    }

    public function index()
    {
        if ($this->session->userdata('username') || $this->session->userdata('NISN')) {
            redirect('user');
        }

        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password tidak boleh kosong!'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('index');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $chk = $this->Account->login_check($username, $password);
        $chk_siswa = $this->Account->siswa_check($username, $this->input->post('password'));

        if ($chk == true) {
            $dataget = $this->Account->login_get($username, $password);
            foreach ($dataget as $userdata) : endforeach;

            $levelget = $this->Account->level_get($userdata->ID_LEVEL);
            foreach ($levelget as $leveldata) : endforeach;

            $data = [
                'id_petugas' => $userdata->ID_PETUGAS,
                'username' => $username,
                'nama' => $userdata->NAMA_PETUGAS,
                'level' => $leveldata->LEVEL
            ];

            $this->session->set_userdata($data);
            redirect('user');

        } else if ($chk_siswa) {
            $dataget = $this->Account->siswa_get($username, $this->input->post('password'));
            foreach ($dataget as $userdata) : endforeach;

            $data = [
                'NISN' => $username,
                'NIS' => $userdata->NIS,
                'nama' => $userdata->NAMA,
                'kelas' => $userdata->ID_KELAS,
                'alamat' => $userdata->ALAMAT,
                'level' => 'Siswa',
                'No_Telp' => $userdata->NO_TELP
            ];

            $this->session->set_userdata($data);
            redirect('user');

        } else {
            $this->session->set_flashdata('error',  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Maaf akun tidak ditemukan!</strong> Mungkin anda salah memasukan username atau password.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();

        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('blocked');
    }
}
