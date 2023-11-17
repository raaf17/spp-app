<?php

namespace App\Controllers;

use App\Models\PetugasModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Petugas extends ResourcePresenter
{
    protected $db;
    protected $petugas;
    protected $helpers = ['custom'];

    public function __construct()
    {
        $this->petugas = new PetugasModel();
    }

    public function index()
    {
        $data['petugas_data'] = $this->petugas->findAll();
        return view('petugas/index', $data);
    }

    public function new()
    {
        return view('petugas/new');
    }

    public function create()
    {
        $data = $this->request->getPost();
        $this->petugas->insert($data);
        return redirect()->to(site_url('petugas'))->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id = null)
    {
        $petugas = $this->petugas->where('id_user', $id)->first();
        if (is_object($petugas)) {
            $data['petugas_data'] = $petugas;
            return view('petugas/edit', $data);
        } else {
            return view('petugas/404');
        }
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        $this->petugas->update($id, $data);
        return redirect()->to(site_url('petugas'))->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id = null)
    {
        $this->petugas->delete($id);
        return redirect()->to(site_url('petugas'))->with('success', 'Data Berhasil Dihapus');
    }

    public function trash()
    {
        $data['petugas_data'] = $this->petugas->onlyDeleted()->findAll();
        return view('petugas/trash', $data);
    }

    public function restore($id = null)
    {
        $this->db = \Config\Database::connect();
        if ($id != null) {
            $this->db->table('users')
                ->set('deleted_at', null, true)
                ->where(['id_user' => $id])
                ->update();
        } else {
            $this->db->table('users')
                ->set('deleted_at', null, true)
                ->where('deleted_at is NOT NULL', NULL, FALSE)
                ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('petugas'))->with('success', 'Data Berhasil Direstore');
        }
    }
    public function delete2($id = null)
    {
        if($id != null) {
            $this->petugas->delete($id, true);
            return redirect()->to(site_url('petugas/trash'))->with('success', 'Data Berhasil Dihapus Permanen');
        } else {
            $this->petugas->purgeDeleted();
            return redirect()->to(site_url('petugas/trash'))->with('success', 'Data Trash Berhasil Dihapus Permanen');
        }
    }
}