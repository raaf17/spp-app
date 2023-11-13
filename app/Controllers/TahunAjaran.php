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
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['tahunajaran_data'] = $this->tahunajaran->findAll();
        return view('tahunajaran/index', $data);
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
        return view('tahunajaran/new');
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
        //     'nama_jurusan' => [
        //         'rules' => 'required|min_length[3]',
        //         'errors' => [
        //             'required' => 'Nama Jurusan tidak boleh kosong',
        //             'min_length' => 'Nama Jurusan minimal 3 karakter',
        //         ],
        //     ],
        // ]);
        // if (!$validate) {
        //     return redirect()->back()->withInput();
        // }
        $data = $this->request->getPost();
        $this->tahunajaran->insert($data);
        return redirect()->to(site_url('tahunajaran'))->with('success', 'Data Berhasil Disimpan');
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
        $tahunajaran = $this->tahunajaran->where('id_tahunajaran', $id)->first();
        if (is_object($tahunajaran)) {
            $data['tahunajaran_data'] = $tahunajaran;
            return view('tahunajaran/edit', $data);
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
        $this->tahunajaran->update($id, $data);
        return redirect()->to(site_url('tahunajaran'))->with('success', 'Data Berhasil Diupdate');
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
        // $this->tahunajaran->where('id_tahunajaran', $id)->delete();
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
