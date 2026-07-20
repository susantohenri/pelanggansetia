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
        'icon' => "
          <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"w-6 h-6\" fill=\"currentColor\" viewBox=\"0 0 24 24\">
            <path d=\"M3 9.75 12 3l9 6.75V21a.75.75 0 0 1-.75.75H15v-6h-6v6H3.75A.75.75 0 0 1 3 21V9.75Z\"/>
          </svg>
        ",
        'label' => 'Home',
      ],
      [
        'href' => site_url('Pengunjung/signin'),
        'icon' => "
          <svg xmlns=\"http://www.w3.org/2000/svg\"class=\"w-6 h-6\"fill=\"none\"viewBox=\"0 0 24 24\"stroke=\"currentColor\"stroke-width=\"2\">
            <path stroke-linecap=\"round\" stroke-linejoin=\"round\"   d=\"M16.5 10.5V7.875a4.5 4.5 0 10-9 0V10.5m-1.5 0h12a1.5 1.5 0 011.5 1.5v7.5A1.5 1.5 0 0118 21H6a1.5 1.5 0 01-1.5-1.5V12A1.5 1.5 0 016 10.5Z\"/>
          </svg>
        ",
        'label' => 'Masuk',
      ],
      [
        'href' => site_url('Pengunjung/signuppenjual'),
        'icon' => "
          <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"w-6 h-6\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\">
            <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M12 12a4 4 0 100-8 4 4 0 000 8zm0 2c-4.418 0-8 1.79-8 4v2h16v-2c0-2.21-3.582-4-8-4z\"/> <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M19 8v6M16 11h6\"/>
          </svg>
        ",
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

  function signuppelanggan()
  {
    if ($post = $this->validatesubmission()) {
      $this->load->model('Users');
      $error = $this->Users->signuppelanggan([
        'nama' => $post['nama'],
      ]);
      if (!$error) {
        redirect(site_url('Pelanggan'));
      }
    }

    $this->loadview([
      'page_title' => 'Register',
      'header' => 'Pendaftaran',
      'active_menu' => 2,
      'page' => 'signup-pelanggan.php',
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
      if (!$error) redirect(site_url(ucfirst($this->session->userdata('role'))));
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
    if ($sudahlogin) redirect(site_url('Pelanggan'));
    else $this->loadview([
      'page_title' => 'Scan QR',
      'header' => 'Selamat Datang',
      'active_menu' => 0,
      'token' => $this->generatetoken(),
      'page' => 'scanqr-penjual.php',
    ]);
  }
}
