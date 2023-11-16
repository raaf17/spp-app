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
        // $siswa = $this->siswa->where('id_siswa', $id)->first();
        $siswa = $this->siswa->find($id);
        if (is_object($siswa)) {
            $data['siswa_data'] = $siswa;
            $data['kelas_data'] = $this->kelas->findAll();
            return view('siswa/edit', $data);
        } else {
            return view('siswa/404');
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
        $this->siswa->delete($id);
        return redirect()->to(site_url('siswa'))->with('success', 'Data Berhasil Dihapus');
    }
}
