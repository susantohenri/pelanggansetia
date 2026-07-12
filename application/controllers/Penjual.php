<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penjual extends MY_Controller
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
        'href' => site_url('Penjual/profile'),
        'icon' => 'person',
        'label' => 'Profil',
      ],
    ];

    $role = $this->session->userdata('role');
    if (!$role || 'penjual' != $role) {
      redirect(site_url('Pengunjung'));
    }
  }

  function index()
  {
    $this->loadview([
      'page_title' => 'Scan',
      'header' => $this->session->userdata('nama'),
      'active_menu' => 0,
      'page' => "dashboard-{$this->session->userdata('role')}.php",
    ]);
  }

  function profile()
  {
    $this->load->model('Users');
    if ($post = $this->validatesubmission()) {
      $error = $this->Users->updateProfile($post);
      if (!$error) $success = 'Perubahan berhasil';
    }

    $user = $this->Users->findOne($this->session->userdata('id'));

    $this->loadview([
      'page_title' => 'Profile',
      'header' => $this->session->userdata('nama'),
      'active_menu' => 1,
      'page' => 'profile-penjual.php',
      'token' => $this->generatetoken(),
      'error' => isset($error) ? $error : '',
      'success' => isset($success) ? $success : '',
      'nama' => isset($post['nama']) ? $post['nama'] : $user['nama'],
      'username' => isset($post['username']) ? $post['username'] : $user['username'],
      'qr' => site_url('Pengunjung/scanqrpenjual/' . md5($this->session->userdata('id')))
    ]);
  }

  function Logout()
  {
    $this->session->sess_destroy();
    redirect(base_url());
  }
}
