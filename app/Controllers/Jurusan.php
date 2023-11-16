<?php

namespace App\Controllers;

use App\Models\JurusanModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Jurusan extends ResourcePresenter
{
    protected $db;
    protected $jurusan;

    public function __construct()
    {
        $this->jurusan = new JurusanModel();
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['jurusan_data'] = $this->jurusan->findAll();
        return view('jurusan/index', $data);
    }

    /**
     * Present a view to present a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Present a view to present a new single resource object
     *
     * @return mixed
     */
    public function new()
    {
        return view('jurusan/new');
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    public function create()
    {
        $validate = $this->validate([
            'nama_jurusan' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama Jurusan tidak boleh kosong',
                    'min_length' => 'Nama Jurusan minimal 3 karakter',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        }
        $data = $this->request->getPost();
        $this->jurusan->insert($data);
        return redirect()->to(site_url('jurusan'))->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $jurusan = $this->jurusan->where('id_jurusan', $id)->first();
        if (is_object($jurusan)) {
            $data['jurusan_data'] = $jurusan;
            return view('jurusan/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    /**
     * Process the updating, full or partial, of a specific resource object.
     * This should be a POST.
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $data = $this->request->getPost();
        $this->jurusan->update($id, $data);
        return redirect()->to(site_url('jurusan'))->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Present a view to confirm the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function remove($id = null)
    {
        //
    }

    /**
     * Process the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->jurusan->delete($id);
        return redirect()->to(site_url('jurusan'))->with('success', 'Data Berhasil Dihapus');
    }

    public function trash()
    {
        $data['jurusan_data'] = $this->jurusan->onlyDeleted()->findAll();
        return view('jurusan/trash', $data);
    }

    public function restore($id = null)
    {
        $this->db = \Config\Database::connect();
        if ($id != null) {
            $this->db->table('jurusan')
                ->set('deleted_at', null, true)
                ->where(['id_jurusan' => $id])
                ->update();
        } else {
            $this->db->table('jurusan')
                ->set('deleted_at', null, true)
                ->where('deleted_at is NOT NULL', NULL, FALSE)
                ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('jurusan'))->with('success', 'Data Berhasil Direstore');
        }
    }
    public function delete2($id = null)
    {
        if($id != null) {
            $this->jurusan->delete($id, true);
            return redirect()->to(site_url('jurusan/trash'))->with('success', 'Data Berhasil Dihapus Permanen');
        } else {
            $this->jurusan->purgeDeleted();
            return redirect()->to(site_url('jurusan/trash'))->with('success', 'Data Trash Berhasil Dihapus Permanen');
        }
    }
}