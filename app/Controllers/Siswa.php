<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\KelasModel;
use App\Models\SppModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Siswa extends ResourcePresenter
{
    protected $db;
    protected $kelas;
    protected $siswa;
    protected $spp;

    public function __construct()
    {
        $this->kelas = new KelasModel();
        $this->siswa = new SiswaModel();
        $this->spp = new SppModel();
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['siswa_data'] = $this->siswa->getAll();
        return view('siswa/index', $data);
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
        $data['kelas_data'] = $this->kelas->findAll();
        $data['spp_data'] = $this->spp->findAll();
        return view('siswa/new', $data);
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
        $this->siswa->insert($data);
        return redirect()->to(site_url('siswa'))->with('success', 'Data Berhasil Disimpan');
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
        $siswa = $this->siswa->where('id_siswa', $id)->first();
        if (is_object($siswa)) {
            $data['siswa_data'] = $siswa;
            $data['kelas_data'] = $this->kelas->findAll();
            $data['spp_data'] = $this->spp->findAll();
            return view('siswa/edit', $data);
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
        $this->siswa->update($id, $data);
        return redirect()->to(site_url('siswa'))->with('success', 'Data Berhasil Diupdate');
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
        // $this->jurusan->where('id_siswa', $id)->delete();
        $this->siswa->delete($id);
        return redirect()->to(site_url('siswa'))->with('success', 'Data Berhasil Dihapus');
    }

    public function trash()
    {
        $data['siswa_data'] = $this->siswa->onlyDeleted()->findAll();
        return view('siswa/trash', $data);
    }

    public function restore($id = null)
    {
        $this->db = \Config\Database::connect();
        if ($id != null) {
            $this->db->table('siswa')
                ->set('deleted_at', null, true)
                ->where(['id_siswa' => $id])
                ->update();
        } else {
            $this->db->table('siswa')
                ->set('deleted_at', null, true)
                ->where('deleted_at is NOT NULL', NULL, FALSE)
                ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('siswa'))->with('success', 'Data Berhasil Direstore');
        }
    }
    public function delete2($id = null)
    {
        if ($id != null) {
            $this->siswa->delete($id, true);
            return redirect()->to(site_url('siswa/trash'))->with('success', 'Data Berhasil Dihapus Permanen');
        } else {
            $this->siswa->purgeDeleted();
            return redirect()->to(site_url('siswa/trash'))->with('success', 'Data Trash Berhasil Dihapus Permanen');
        }
    }
}
