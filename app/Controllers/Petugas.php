<?php

namespace App\Controllers;

use App\Models\PetugasModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Petugas extends ResourcePresenter
{
    protected $db;
    protected $petugas;

    public function __construct()
    {
        $this->petugas = new PetugasModel();
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['petugas_data'] = $this->petugas->findAll();
        return view('petugas/index', $data);
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
        return view('petugas/new');
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    public function create()
    {
        // $validate = $this->validate([
        //     'nama_petugas' => [
        //         'rules' => 'required|min_length[3]',
        //         'errors' => [
        //             'required' => 'Nama Petugas tidak boleh kosong',
        //             'min_length' => 'Nama Petugas minimal 3 karakter',
        //         ],
        //     ],
        // ]);
        // if (!$validate) {
        //     return redirect()->back()->withInput();
        // }
        $data = $this->request->getPost();
        $this->petugas->insert($data);
        return redirect()->to(site_url('petugas'))->with('success', 'Data Berhasil Disimpan');
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
        $petugas = $this->petugas->where('id_petugas', $id)->first();
        if (is_object($petugas)) {
            $data['petugas_data'] = $petugas;
            return view('petugas/edit', $data);
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
        $this->petugas->update($id, $data);
        return redirect()->to(site_url('petugas'))->with('success', 'Data Berhasil Diupdate');
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
        // $this->petugas->where('id_petugas', $id)->delete();
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
            $this->db->table('petugas')
                ->set('deleted_at', null, true)
                ->where(['id_petugas' => $id])
                ->update();
        } else {
            $this->db->table('petugas')
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