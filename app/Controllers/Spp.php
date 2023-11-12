<?php

namespace App\Controllers;

use App\Models\SppModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Spp extends ResourcePresenter
{
    protected $db;
    protected $spp;

    public function __construct()
    {
        $this->spp = new SppModel();
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['spp_data'] = $this->spp->findAll();
        return view('spp/index', $data);
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
        return view('spp/new');
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
        $this->spp->insert($data);
        return redirect()->to(site_url('spp'))->with('success', 'Data Berhasil Disimpan');
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
        $spp = $this->spp->where('id_spp', $id)->first();
        if (is_object($spp)) {
            $data['spp_data'] = $spp;
            return view('spp/edit', $data);
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
        $this->spp->update($id, $data);
        return redirect()->to(site_url('spp'))->with('success', 'Data Berhasil Diupdate');
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
        // $this->spp->where('id_spp', $id)->delete();
        $this->spp->delete($id);
        return redirect()->to(site_url('spp'))->with('success', 'Data Berhasil Dihapus');
    }

    public function trash()
    {
        $data['spp_data'] = $this->spp->onlyDeleted()->findAll();
        return view('spp/trash', $data);
    }

    public function restore($id = null)
    {
        $this->db = \Config\Database::connect();
        if ($id != null) {
            $this->db->table('spp')
                ->set('deleted_at', null, true)
                ->where(['id_spp' => $id])
                ->update();
        } else {
            $this->db->table('spp')
                ->set('deleted_at', null, true)
                ->where('deleted_at is NOT NULL', NULL, FALSE)
                ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('spp'))->with('success', 'Data Berhasil Direstore');
        }
    }
    public function delete2($id = null)
    {
        if($id != null) {
            $this->spp->delete($id, true);
            return redirect()->to(site_url('spp/trash'))->with('success', 'Data Berhasil Dihapus Permanen');
        } else {
            $this->spp->purgeDeleted();
            return redirect()->to(site_url('spp/trash'))->with('success', 'Data Trash Berhasil Dihapus Permanen');
        }
    }
}