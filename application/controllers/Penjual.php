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
        'href' => site_url('Penjual/pelanggan'),
        'icon' => 'group',
        'label' => 'Pelanggan',
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
      'active_menu' => 2,
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

  function scanqrpelanggan($md5pelanggan)
  {
    $this->load->model(['Users', 'Pelanggans']);
    $pelanggan = $this->Users->findByMd5Id($md5pelanggan);
    if (!$pelanggan) $error = 'Pelanggan tidak ditemukan';

    if ($post = $this->validatesubmission()) {
      $this->load->model('Poins');
      $error = $this->Poins->transaksi([
        'pelanggan' => $pelanggan['id'],
        'nilai' => $post['nilai'],
      ]);

      if (!$error) redirect(site_url("Penjual/redeem/{$md5pelanggan}"));
    }

    $stats = $this->Pelanggans->findOne([
      'pelanggan' => $pelanggan['id'],
      'penjual' => $this->session->userdata('id')
    ]);
    $stats = !!$stats ? $stats : [
      'poin' => 0,
      'earn' => 0,
      'redeem' => 0
    ];
    $pelanggan = array_merge($stats, $pelanggan);

    $this->loadview([
      'page_title' => 'Transaksi',
      'header' => $this->session->userdata('nama'),
      'page' => 'scanqr-pelanggan.php',
      'token' => $this->generatetoken(),
      'error' => isset($error) ? $error : '',
      'success' => isset($success) ? $success : '',
      'pelanggan' => $pelanggan
    ]);
  }

  function redeem($md5pelanggan)
  {
    $this->load->model(['Users', 'Pelanggans']);
    $pelanggan = $this->Users->findByMd5Id($md5pelanggan);
    if (!$pelanggan) $error = 'Pelanggan tidak ditemukan';

    if ($post = $this->validatesubmission()) {
      $this->load->model('Poins');
      $error = $this->Poins->redeem([
        'pelanggan' => $pelanggan['id'],
        'nilai' => $post['nilai'],
      ]);

      if (!$error) redirect(site_url());
    }

    $stats = $this->Pelanggans->findOne([
      'pelanggan' => $pelanggan['id'],
      'penjual' => $this->session->userdata('id')
    ]);
    $stats = !!$stats ? $stats : [
      'poin' => 0,
      'earn' => 0,
      'redeem' => 0
    ];
    $pelanggan = array_merge($stats, $pelanggan);

    $this->loadview([
      'page_title' => 'Transaksi',
      'header' => $this->session->userdata('nama'),
      'page' => 'redeem.php',
      'token' => $this->generatetoken(),
      'error' => isset($error) ? $error : '',
      'success' => isset($success) ? $success : '',
      'pelanggan' => $pelanggan
    ]);
  }

  function daftarkanpelanggan()
  {
    if ($post = $this->validatesubmission()) {
      $this->load->model('Users');
      $id = $this->Users->create([
        'nama' => $post['nama'],
        'role' => 'pelanggan'
      ]);
      redirect(site_url('Penjual/scanqrpelanggan/' . md5($id)));
    }

    $this->loadview([
      'page_title' => 'Register',
      'header' => 'Pelanggan Baru',
      'page' => 'signup-pelanggan.php',
      'token' => $this->generatetoken(),
      'error' => isset($error) ? $error : '',
      'success' => isset($success) ? $success : '',
      'nama' => !!$post ? $post['nama'] : '',
    ]);
  }

  function pelanggan()
  {
    $this->load->model('Pelanggans');
    $pelanggans = $this->Pelanggans->daftarpelanggan();
    $this->loadview([
      'page_title' => 'Pelanggan',
      'header' => $this->session->userdata('nama'),
      'active_menu' => 1,
      'page' => "pelanggan.php",
      'pelanggans' => $pelanggans
    ]);
  }

  function pelanggandetail($md5pelanggan)
  {
    $this->load->model(['Users', 'Pelanggans']);
    $pelanggan = $this->Users->findByMd5Id($md5pelanggan);
    $stats = $this->Pelanggans->findOne([
      'pelanggan' => $pelanggan['id'],
      'penjual' => $this->session->userdata('id')
    ]);
    $stats = !!$stats ? $stats : [
      'poin' => 0,
      'earn' => 0,
      'redeem' => 0
    ];
    $pelanggan = array_merge($stats, $pelanggan);
    $this->loadview([
      'page_title' => 'Pelanggan',
      'header' => $this->session->userdata('nama'),
      'active_menu' => 1,
      'page' => "pelanggan-detail.php",
      'pelanggan' => $pelanggan,
      'md5pelanggan' => $md5pelanggan,
      'qr' => site_url('Penjual/scanqrpelanggan/' . md5($pelanggan['id']))
    ]);
  }
}
