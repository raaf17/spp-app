<?php

namespace App\Controllers;

use App\Models\TagihanModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Tagihan extends ResourcePresenter
{
    protected $db;
    protected $tagihan;

    public function __construct()
    {
        $this->tagihan = new TagihanModel();
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['tagihan_data'] = $this->tagihan->findAll();
        return view('tagihan/index', $data);
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
        return view('tagihan/new');
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
        $this->tagihan->insert($data);
        return redirect()->to(site_url('tagihan'))->with('success', 'Data Berhasil Disimpan');
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
        $tagihan = $this->tagihan->where('id_tagihan', $id)->first();
        if (is_object($tagihan)) {
            $data['tagihan_data'] = $tagihan;
            return view('tagihan/edit', $data);
        } else {
            return view('tagihan/404');
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
        $this->tagihan->update($id, $data);
        return redirect()->to(site_url('tagihan'))->with('success', 'Data Berhasil Diupdate');
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
        $this->tagihan->delete($id);
        return redirect()->to(site_url('tagihan'))->with('success', 'Data Berhasil Dihapus');
    }

    public function trash()
    {
        $data['tagihan_data'] = $this->tagihan->onlyDeleted()->findAll();
        return view('tagihan/trash', $data);
    }

    public function restore($id = null)
    {
        $this->db = \Config\Database::connect();
        if ($id != null) {
            $this->db->table('tagihan')
                ->set('deleted_at', null, true)
                ->where(['id_tagihan' => $id])
                ->update();
        } else {
            $this->db->table('tagihan')
                ->set('deleted_at', null, true)
                ->where('deleted_at is NOT NULL', NULL, FALSE)
                ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('tagihan'))->with('success', 'Data Berhasil Direstore');
        }
    }
    public function delete2($id = null)
    {
        if($id != null) {
            $this->tagihan->delete($id, true);
            return redirect()->to(site_url('tagihan/trash'))->with('success', 'Data Berhasil Dihapus Permanen');
        } else {
            $this->tagihan->purgeDeleted();
            return redirect()->to(site_url('tagihan/trash'))->with('success', 'Data Trash Berhasil Dihapus Permanen');
        }
    }
}