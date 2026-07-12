<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengunjung extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->menu = [
      [
        'href' => base_url(),
        'icon' => 'home',
        'label' => 'Home',
      ],
      [
        'href' => site_url('Pengunjung/signin'),
        'icon' => 'login',
        'label' => 'Masuk',
      ],
      [
        'href' => site_url('Pengunjung/signup'),
        'icon' => 'person_add',
        'label' => 'Daftar',
      ],
    ];
  }

  function index()
  {
    $this->loadview([
      'header' => 'Pelanggan Setia',
    ]);
  }

  function signup()
  {
    if ($post = $this->validatesubmission()) {
      $this->load->model('Users');
      $error = $this->Users->signuppenjual([
        'username' => $post['username'],
        'password' => $post['password'],
        'nama' => $post['nama'],
      ]);
      if (!$error) {
        redirect(base_url());
      }
    }

    $this->loadview([
      'page_title' => 'Register',
      'header' => 'Pendaftaran',
      'active_menu' => 2,
      'page' => 'signup.php',
      'token' => $this->generatetoken(),
      'error' => isset($error) ? $error : '',
      'success' => isset($success) ? $success : '',
      'nama' => !!$post ? $post['nama'] : '',
      'username' => !!$post ? $post['username'] : '',
    ]);
  }

  function signin()
  {
    if ($post = $this->validatesubmission()) {
      $this->load->model('Users');
      $error = $this->Users->login($post['username'], $post['password']);
      if (!$error) redirect(site_url($this->session->userdata('role')));
    }

    $this->loadview([
      'page_title' => 'Login',
      'header' => 'Masuk',
      'active_menu' => 1,
      'page' => 'signin.php',
      'token' => $this->generatetoken(),
      'error' => isset($error) ? $error : '',
      'username' => !!$post ? $post['username'] : '',
    ]);
  }

  function scanqrpenjual($md5idPenjual = null)
  {
    if ($this->validatesubmission()) {
      $this->load->model('Users');
      $this->Users->signuppembeli();
    }

    $sudahlogin = $this->session->userdata('id');
    if ($sudahlogin) redirect(site_url('Pembeli'));
    else $this->loadview([
      'page_title' => 'Scan QR',
      'header' => 'Selamat Datang',
      'active_menu' => 0,
      'token' => $this->generatetoken(),
      'page' => 'punya-akun-kah.php',
    ]);
  }
}
