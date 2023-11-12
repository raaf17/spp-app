<?php

namespace App\Controllers;

class Auth extends BaseController
{
    // public function index()
    // {
    //     return redirect()->to(site_url('login'));
    // }

    // public function login()
    // {
    //   if(session('id_petugas')){
    //     return redirect()->to(site_url('/'));
    //   }
    //   return view('auth/login');
    // }

    public function loginProcess($id = null)
    {
      $post = $this->request->getPost();
      $query = $this->db->table('petugas')->getWhere(['email' => $post['email']]);
      $user = $query->getRow();
      var_dump($user);
      if($user){
        if(password_verify($post['password'], $user->password)){
            echo 'lanjut';
        } else {
            return redirect()->back()->with('error', 'Password tidak sesuai');
        }
      } else {
        return redirect()->back()->with('error', 'Email tidak ditemukan');
      }
    }

    public function logout()
    {
      session()->remove('id_petugas');
      return redirect()->to(site_url('login'));
    }
}