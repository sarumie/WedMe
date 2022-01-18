<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['gawe'] = $this->db->table('gawe')->countAll();
        $data['groups'] = $this->db->table('groups')->countAll();
        $data['contact'] = $this->db->table('contacts')->countAll();
        return view('home', $data);
    }

    // public function generate()
    // {
    //     echo password_hash('12345', PASSWORD_BCRYPT);
    // }
}
