<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Authenticated extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
    if (!$this->session->userdata('id')) {
      redirect(site_url('Unauthenticated'));
    }

    $this->menu = [
      [
        'href' => base_url(),
        'icon' => 'home',
        'label' => 'Home',
      ],
      // [
      //   'href' => site_url('Authenticated/help'),
      //   'icon' => 'help_outline',
      //   'label' => 'Bantuan',
      // ],
      [
        'href' => site_url('Authenticated/profile'),
        'icon' => 'person',
        'label' => 'Profil',
      ],
    ];
  }

  function index()
  {
    $this->loadview([
      'page_title' => 'Dashboard',
      'header' => $this->session->userdata('header'),
      'active_menu' => 0,
      'page' => "dashboard-{$this->session->userdata('role')}.php",
    ]);
  }

  function help()
  {
    $this->loadview([
      'page_title' => 'Bantuan',
      'header' => $this->session->userdata('header'),
      'active_menu' => 1,
      'page' => 'help.php',
    ]);
  }

  function profile()
  {
    $this->load->model('Users');
    if ($post = $this->validatesubmission()) {
      $error = $this->Users->updateProfile($post);
      if (!$error) $success = 'Perubahan berhasil, akan berlaku saat anda keluar';
    }

    $user = $this->Users->findOne($this->session->userdata('id'));

    $this->loadview([
      'page_title' => 'Profile',
      'header' => $this->session->userdata('header'),
      'active_menu' => 1,
      'page' => 'profile.php',
      'token' => $this->generatetoken(),
      'error' => isset($error) ? $error : '',
      'success' => isset($success) ? $success : '',
      'nama' => $user['nama'],
      'username' => $user['username'],
      'label_nama' => 'customer' == $user['role'] ? 'Nama Customer' : 'Nama Toko',
    ]);
  }

  function transaction($md5merchant, $md5customer)
  {
    $this->loadview([
      'page_title' => 'Profile',
      'header' => $this->session->userdata('header'),
      'active_menu' => 1,
      'page' => 'profile.php',
      'token' => $this->generatetoken(),
      'error' => isset($error) ? $error : '',
      'success' => isset($success) ? $success : '',
      'nama' => $user['nama'],
      'username' => $user['username'],
      'label_nama' => 'customer' == $user['role'] ? 'Nama Customer' : 'Nama Toko',
    ]);
  }

  function transactionsuccess() {}

  function redeem() {}

  function addcustomer() {}

  function customers() {}

  function customer($id) {}

  function Logout()
  {
    $this->session->sess_destroy();
    redirect(base_url());
  }
}
