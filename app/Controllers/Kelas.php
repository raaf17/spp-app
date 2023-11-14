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
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['kelas_data'] = $this->kelas->getAll();
        return view('kelas/index', $data);
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
        // $data['jurusan_data'] = $this->kelas->getAll();
        $data['jurusan_data'] = $this->jurusan->findAll();
        return view('kelas/new', $data);
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
        //     'nama_kelas' => [
        //         'rules' => 'required|min_length[3]',
        //         'errors' => [
        //             'required' => 'Nama Kelas tidak boleh kosong',
        //             'min_length' => 'Nama Kelas minimal 3 karakter',
        //         ],
        //     ],
        // ]);
        // if (!$validate) {
        //     return redirect()->back()->withInput();
        // }
        $data = $this->request->getPost();
        $this->kelas->insert($data);
        return redirect()->to(site_url('kelas'))->with('success', 'Data Berhasil Disimpan');
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
        $kelas = $this->kelas->where('id_kelas', $id)->first();
        if (is_object($kelas)) {
            $data['kelas_data'] = $kelas;
            $data['jurusan_data'] = $this->jurusan->findAll();
            return view('kelas/edit', $data);
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
        $this->kelas->update($id, $data);
        return redirect()->to(site_url('kelas'))->with('success', 'Data Berhasil Diupdate');
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
        // $this->jurusan->where('id_kelas', $id)->delete();
        $this->kelas->delete($id);
        return redirect()->to(site_url('kelas'))->with('success', 'Data Berhasil Dihapus');
    }

    public function trash()
    {
        $data['kelas_data'] = $this->kelas->onlyDeleted()->findAll();
        return view('kelas/trash', $data);
    }

    public function restore($id = null)
    {
        $this->db = \Config\Database::connect();
        if ($id != null) {
            $this->db->table('kelas')
                ->set('deleted_at', null, true)
                ->where(['id_kelas' => $id])
                ->update();
        } else {
            $this->db->table('kelas')
                ->set('deleted_at', null, true)
                ->where('deleted_at is NOT NULL', NULL, FALSE)
                ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('kelas'))->with('success', 'Data Berhasil Direstore');
        }
    }
    public function delete2($id = null)
    {
        if($id != null) {
            $this->kelas->delete($id, true);
            return redirect()->to(site_url('kelas/trash'))->with('success', 'Data Berhasil Dihapus Permanen');
        } else {
            $this->kelas->purgeDeleted();
            return redirect()->to(site_url('kelas/trash'))->with('success', 'Data Trash Berhasil Dihapus Permanen');
        }
    }
}