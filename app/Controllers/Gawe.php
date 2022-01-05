<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Request;

class Gawe extends BaseController
{
  public function index()
  {
    // Cara 1 Query builder
    // $builder = $this->db->table('gawe');
    // $query   = $builder->get()->getResult();

    // Cara 2 Query manual
    $query = $this->db->query("SELECT * FROM gawe");

    $data['gawe'] = $query->getResult();
    return view('gawe/get', $data);
  }

  public function create()
  {
    return view('gawe/add');
  }

  public function store()
  {
    // Cara 1 : name sama
    $data = $this->request->getPost();

    // Cara 2 : name spesifik
    // $data = [
    //   'name_gawe' => $this->request->getVar('name_gawe'),
    //   'date_gawe' => $this->request->getVar('date_gawe'),
    //   'info_gawe' => $this->request->getVar('info_gawe'),
    // ];


    $this->db->table('gawe')->insert($data);

    if ($this->db->affectedRows() > 0) {
      return redirect()->to(site_url('gawe'))->with('success', 'Data berhasil disimpan');
    }
  }

  public function edit($id = null)
  {
    if ($id != null) {
      $query = $this->db->table('gawe')->getWhere(['id_gawe' => $id]);
      if ($query->resultID->num_rows > 0) {
        $data['gawe'] = $query->getRow();
        return view('gawe/edit', $data);
      } else {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
      }
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  public function update($id)
  {
    // Cara 1 : Nama sama
    // $data = $this->request->getPost();
    // unset($data['_method']);

    // Cara 2 : Nama spesifik
    $data = [
      'name_gawe' => $this->request->getVar('name_gawe'),
      'date_gawe' => $this->request->getVar('date_gawe'),
      'info_gawe' => $this->request->getVar('info_gawe'),
    ];


    $this->db->table('gawe')->where(['id_gawe' => $id])->update($data);
    return redirect()->to(site_url('gawe'))->with('success', 'Data berhasil di update');
  }
}
