<?php

namespace App\Controllers;

// use CodeIgniter\Database\Query;

class Auth extends BaseController
{
  public function index()
  {
    return redirect()->to(site_url('login'));
  }

  public function register()
  {
    // Cek jika user ada
    if (session('id_user')) {
      return redirect()->to(site_url('home'));
    }
    return view('auth/register');
  }

  public function registerProcess()
  {
    $data = [
      'name_user' => $this->request->getVar('name'),
      'email_user' => $this->request->getVar('email'),
      'password_user' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT)
    ];
    $this->db->table('users')->insert($data);
    return redirect()->to(site_url('login'))->with('success', 'Berhasil mendaftarkan akun');
  }

  public function login()
  {
    // Cek jika user ada
    if (session('id_user')) {
      return redirect()->to(site_url('home'));
    }
    return view('auth/login');
  }

  public function loginProcess()
  {
    // Mengambil data method POST
    $post = $this->request->getPost();
    // Mencari data email sesuai nama email yang diambil
    $query = $this->db->table('users')->getWhere(['email_user' => $post['email']]);

    $user = $query->getRow();
    if ($user) {
      if (password_verify($post['password'], $user->password_user)) {
        $params = ['id_user' => $user->id_user];
        session()->set($params);

        return redirect()->to(site_url('home'));
      } else {
        return redirect()->back()->with('error', 'Password salah');
      }
    } else {
      return redirect()->back()->with('error', 'Email tidak ditemukan');
    }
  }

  public function logout()
  {
    // Hapus session
    session()->remove('id_user');
    // Lalu di arahkan ke halaman login
    return redirect()->to(site_url('login'));
  }
}
