<?php

namespace App\Controllers;

use App\Models\JurusanModel;
use App\Models\KelasModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Kelas extends ResourcePresenter
{
    protected $db;
    protected $jurusan;
    protected $kelas;

    public function __construct()
    {
        $this->jurusan = new JurusanModel();
        $this->kelas = new KelasModel();
    }

    public function index()
    {
        $data['kelas_data'] = $this->kelas->getAll();
        return view('kelas/index', $data);
    }

    public function new()
    {
        $data['jurusan_data'] = $this->jurusan->findAll();
        return view('kelas/new', $data);
    }

    public function create()
    {
        $data = $this->request->getPost();
        $this->kelas->insert($data);
        return redirect()->to(site_url('kelas'))->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id = null)
    {
        $kelas = $this->kelas->find($id);
        if (is_object($kelas)) {
            $data['kelas_data'] = $kelas;
            $data['jurusan_data'] = $this->jurusan->findAll();
            return view('kelas/edit', $data);
        } else {
            return view('kelas/404');
        }
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        $this->kelas->update($id, $data);
        return redirect()->to(site_url('kelas'))->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id = null)
    {
        $this->kelas->delete($id);
        return redirect()->to(site_url('kelas'))->with('success', 'Data Berhasil Dihapus');
    }
}