<?php

namespace App\Controllers;

use App\Models\TahunAjaranModel;
use CodeIgniter\RESTful\ResourcePresenter;

class TahunAjaran extends ResourcePresenter
{
    protected $db;
    protected $tahunajaran;

    public function __construct()
    {
        $this->tahunajaran = new TahunAjaranModel();
    }

    public function index()
    {
        $data['tahunajaran_data'] = $this->tahunajaran->findAll();
        return view('tahunajaran/index', $data);
    }

    public function new()
    {
        return view('tahunajaran/new');
    }

    public function create()
    {
        $data = $this->request->getPost();
        $this->tahunajaran->insert($data);
        return redirect()->to(site_url('tahunajaran'))->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id = null)
    {
        $tahunajaran = $this->tahunajaran->where('id_tahunajaran', $id)->first();
        if (is_object($tahunajaran)) {
            $data['tahunajaran_data'] = $tahunajaran;
            return view('tahunajaran/edit', $data);
        } else {
            return view('tahunajaran/404');
        }
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        $this->tahunajaran->update($id, $data);
        return redirect()->to(site_url('tahunajaran'))->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id = null)
    {
        $this->tahunajaran->delete($id);
        return redirect()->to(site_url('tahunajaran'))->with('success', 'Data Berhasil Dihapus');
    }

    public function trash()
    {
        $data['tahunajaran_data'] = $this->tahunajaran->onlyDeleted()->findAll();
        return view('tahunajaran/trash', $data);
    }

    public function restore($id = null)
    {
        $this->db = \Config\Database::connect();
        if ($id != null) {
            $this->db->table('tahun_ajaran')
                ->set('deleted_at', null, true)
                ->where(['id_tahunajaran' => $id])
                ->update();
        } else {
            $this->db->table('tahun_ajaran')
                ->set('deleted_at', null, true)
                ->where('deleted_at is NOT NULL', NULL, FALSE)
                ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('tahunajaran'))->with('success', 'Data Berhasil Direstore');
        }
    }
    public function delete2($id = null)
    {
        if ($id != null) {
            $this->tahunajaran->delete($id, true);
            return redirect()->to(site_url('tahunajaran/trash'))->with('success', 'Data Berhasil Dihapus Permanen');
        } else {
            $this->tahunajaran->purgeDeleted();
            return redirect()->to(site_url('tahunajaran/trash'))->with('success', 'Data Trash Berhasil Dihapus Permanen');
        }
    }
}
