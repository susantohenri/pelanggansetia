<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends MY_Controller
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
        'href' => site_url('Pelanggan/logout'),
        'icon' => 'logout',
        'label' => 'Keluar',
      ],
    ];

    $role = $this->session->userdata('role');
    if (!$role || 'pelanggan' != $role) {
      redirect(site_url('Pengunjung'));
    }
  }

  function index()
  {
    $this->load->model('Users');
    if ($post = $this->validatesubmission()) {
      $error = $this->Users->updateProfile($post);
      if (!$error) $success = 'Perubahan berhasil';
    }

    $user = $this->Users->findOne($this->session->userdata('id'));
    $this->loadview([
      'page_title' => 'Profil Pelanggan',
      'header' => '' != $user['nama'] ? $user['nama'] : '&nbsp;',
      'active_menu' => 0,
      'page' => "dashboard-{$this->session->userdata('role')}.php",
      'token' => $this->generatetoken(),
      'error' => isset($error) ? $error : '',
      'success' => isset($success) ? $success : '',
      'nama' => isset($post['nama']) ? $post['nama'] : $user['nama'],
      'username' => isset($post['username']) ? $post['username'] : $user['username'],
      'qr' => site_url('Penjual/scanqrpelanggan/' . md5($this->session->userdata('id')))
    ]);
  }

  function Logout()
  {
    $this->session->sess_destroy();
    redirect(base_url());
  }
}
