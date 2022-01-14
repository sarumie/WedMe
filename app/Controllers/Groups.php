<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;
// use App\Models\GroupModel;


class Groups extends ResourcePresenter
{
    // public function __construct()
    // {
    //     $this->group = new GroupModel();
    // }

    protected $modelName = 'App\Models\GroupModel';
    // protected $helpers = ['custom'];


    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['groups'] = $this->model->findAll();
        return view('groups/index', $data);
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
        return view('groups/new');
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
        $this->model->insert($data);
        return redirect()->to(site_url('groups'))->with('success', 'Data berhasil disimpan');
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
        $group = $this->model->where('id_group', $id)->first();
        if (is_object($group)) {
            $data['group'] = $group;
            return view('groups/edit', $data);
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
        $this->model->update($id, $data);
        return redirect()->to(site_url('groups'))->with('success', 'Data berhasil diupdate');
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
        // Cara 1
        // $this->model->where('id_group', $id)->delete();

        // Cara 2
        $this->model->delete($id);
        return redirect()->to(site_url('groups'))->with('success', 'Grup berhasil dihapus');
    }
    public function trash()
    {
        $data['groups'] = $this->model->onlyDeleted()->findAll();
        return view('groups/trash', $data);
    }

    public function restore($id = null)
    {
        $this->db = \Config\Database::connect();

        if ($id != null) {
            $this->db->table('groups')
                ->set('deleted_at', null, true)
                ->where(['id_group' => $id])
                ->update();
        } else {
            $this->db->table('groups')
                ->set('deleted_at', null, true)
                ->where('deleted_at IS NOT NULL', null, true)
                ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('groups'))->with('success', 'Grup berhasil direstore');
        } else {
            return redirect()->to(site_url('groups'))->with('error', 'Tidak ada grup yang di pulihkan');
        }
    }

    public function delete2($id = null)
    {
        if ($id != null) {
            $this->model->delete($id, true);
        } else {
            $this->model->purgeDeleted();
        }

        $affectedRow = $this->model->affectedRows();
        if ($affectedRow > 0) {
            if ($affectedRow > 1) {
                return redirect()->to(site_url('groups/trash'))->with('success', 'Semua grup telah di hapus permanen');
            } else {
                return redirect()->to(site_url('groups/trash'))->with('success', 'Grup telah di hapus permanen');
            }
        } else {
            return redirect()->to(site_url('groups/trash'))->with('error', 'Tidak ada grup yang terhapus');
        }

        // if ($this->db->affectedRows() > 0) {
        //     if ($this->db->affectedRows() > 1) {
        //         return redirect()->to(site_url('groups/trash'))->with('success', 'Semua grup telah di hapus permanen');
        //     } else {
        //         return redirect()->to(site_url('groups/trash'))->with('success', 'Grup telah di hapus permanen');
        //     }
        // } else {
        //     return redirect()->to(site_url('groups/trash'))->with('error', 'Tidak ada grup yang terhapus');
        // }
    }
}
