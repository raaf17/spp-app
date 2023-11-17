<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\KelasModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Siswa extends ResourcePresenter
{
    protected $db;
    protected $kelas;
    protected $siswa;
    protected $helpers = ['custom'];

    public function __construct()
    {
        $this->kelas = new KelasModel();
        $this->siswa = new SiswaModel();
    }

    public function index()
    {
        $data['siswa_data'] = $this->siswa->getAll();
        return view('siswa/index', $data);
    }

    public function new()
    {
        $data['kelas_data'] = $this->kelas->findAll();
        return view('siswa/new', $data);
    }

    public function create()
    {
        $data = $this->request->getPost();
        $this->siswa->insert($data);
        return redirect()->to(site_url('siswa'))->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id = null)
    {
        $siswa = $this->siswa->find($id);
        if (is_object($siswa)) {
            $data['siswa_data'] = $siswa;
            $data['kelas_data'] = $this->kelas->findAll();
            return view('siswa/edit', $data);
        } else {
            return view('siswa/404');
        }
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        $this->siswa->update($id, $data);
        return redirect()->to(site_url('siswa'))->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id = null)
    {
        $this->siswa->delete($id);
        return redirect()->to(site_url('siswa'))->with('success', 'Data Berhasil Dihapus');
    }
}
