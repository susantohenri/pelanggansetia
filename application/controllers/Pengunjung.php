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
        'href' => site_url('Pengunjung/signuppenjual'),
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

  function signuppenjual()
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
      'page' => 'signup-penjual.php',
      'token' => $this->generatetoken(),
      'error' => isset($error) ? $error : '',
      'success' => isset($success) ? $success : '',
      'nama' => !!$post ? $post['nama'] : '',
      'username' => !!$post ? $post['username'] : '',
    ]);
  }

  function signuppembeli()
  {
    if ($post = $this->validatesubmission()) {
      $this->load->model('Users');
      $error = $this->Users->signuppembeli([
        'nama' => $post['nama'],
      ]);
      if (!$error) {
        redirect(site_url('Pembeli'));
      }
    }

    $this->loadview([
      'page_title' => 'Register',
      'header' => 'Pendaftaran',
      'active_menu' => 2,
      'page' => 'signup-pembeli.php',
      'token' => $this->generatetoken(),
      'error' => isset($error) ? $error : '',
      'success' => isset($success) ? $success : '',
      'nama' => !!$post ? $post['nama'] : '',
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
    $sudahlogin = $this->session->userdata('id');
    if ($sudahlogin) redirect(site_url('Pembeli'));
    else $this->loadview([
      'page_title' => 'Scan QR',
      'header' => 'Selamat Datang',
      'active_menu' => 0,
      'token' => $this->generatetoken(),
      'page' => 'scanqr-penjual.php',
    ]);
  }
}
