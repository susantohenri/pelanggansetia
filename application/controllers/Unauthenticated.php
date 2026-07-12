<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Unauthenticated extends MY_Controller
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
        'href' => site_url('Unauthenticated/signin'),
        'icon' => 'login',
        'label' => 'Masuk',
      ],
      [
        'href' => site_url('Unauthenticated/signup'),
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

  function signin()
  {
    if ($post = $this->validatesubmission()) {
      $this->load->model('Users');
      $error = $this->Users->login($post['username'], $post['password']);
      if (!$error) redirect(site_url());
    }

    $this->loadview([
      'page_title' => 'Login',
      'header' => 'Login',
      'active_menu' => 1,
      'page' => 'signin.php',
      'token' => $this->generatetoken(),
      'error' => isset($error) ? $error : '',
      'username' => !!$post ? $post['username'] : '',
    ]);
  }

  function signup($merchantId = null)
  {
    if (!!$merchantId) {
      $this->load->model('Users');
      $merchant = $this->Users->findByMd5Id($merchantId);
      if (!$merchant) $error = 'Toko tidak ditemukan';
    }

    if ($post = $this->validatesubmission()) {
      $this->load->model('Users');
      $error = $this->Users->register([
        'username' => $post['username'],
        'password' => $post['password'],
        'role' => !!$merchantId ? 'customer' : 'merchant',
        'nama' => $post['nama'],
        'merchant' => !!$merchantId ? $merchant['id'] : 0
      ]);
      if (!$error) {
        redirect(base_url());
      }
    }

    $this->loadview([
      'page_title' => 'Register',
      'header' => !!$merchantId ? $merchant['nama'] : 'Pendaftaran',
      'active_menu' => 2,
      'page' => 'signup.php',
      'token' => $this->generatetoken(),
      'error' => isset($error) ? $error : '',
      'success' => isset($success) ? $success : '',
      'label_nama' => !!$merchantId ? 'Nama Customer' : 'Nama Toko',
      'nama' => !!$post ? $post['nama'] : '',
      'username' => !!$post ? $post['username'] : '',
    ]);
  }
}
