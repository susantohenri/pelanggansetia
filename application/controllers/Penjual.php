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

  function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url());
  }

  function scanqrpembeli($md5pembeli)
  {
    $this->load->model('Users');
    $pembeli = $this->Users->findByMd5Id($md5pembeli);
    if (!$pembeli) $error = 'Pelanggan tidak ditemukan';

    if ($post = $this->validatesubmission()) {
      $this->load->model('Poins');
      $this->Poins->transaksi([
        'pembeli' => $pembeli['id'],
        'nilai' => $post['nilai'],
      ]);

      redirect(site_url("Penjual/redeem/{$md5pembeli}"));
    }

    $this->loadview([
      'page_title' => 'Transaksi',
      'header' => $this->session->userdata('nama'),
      'page' => 'scanqr-pembeli.php',
      'token' => $this->generatetoken(),
      'error' => isset($error) ? $error : '',
      'success' => isset($success) ? $success : '',
      'pembeli' => $pembeli
    ]);
  }

  function redeem($md5pembeli)
  {
    $this->load->model('Users');
    $pembeli = $this->Users->findByMd5Id($md5pembeli);
    if (!$pembeli) $error = 'Pelanggan tidak ditemukan';

    if ($post = $this->validatesubmission()) {
      $this->load->model('Poins');
      $error = $this->Poins->redeem([
        'pembeli' => $pembeli['id'],
        'nilai' => $post['nilai'],
      ]);

      if (!$error) redirect(site_url());
    }

    $this->loadview([
      'page_title' => 'Transaksi',
      'header' => $this->session->userdata('nama'),
      'page' => 'redeem.php',
      'token' => $this->generatetoken(),
      'error' => isset($error) ? $error : '',
      'success' => isset($success) ? $success : '',
      'pembeli' => $pembeli
    ]);
  }

  function daftarkanpelanggan()
  {
    if ($post = $this->validatesubmission()) {
      $this->load->model('Users');
      $id = $this->Users->create([
        'nama' => $post['nama'],
      ]);
      redirect(site_url('Penjual/scanqrpembeli/' . md5($id)));
    }

    $this->loadview([
      'page_title' => 'Register',
      'header' => 'Pelanggan Baru',
      'page' => 'signup-pembeli.php',
      'token' => $this->generatetoken(),
      'error' => isset($error) ? $error : '',
      'success' => isset($success) ? $success : '',
      'nama' => !!$post ? $post['nama'] : '',
    ]);
  }
}
