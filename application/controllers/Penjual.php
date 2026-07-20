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
        'icon' => "
          <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"w-6 h-6\" fill=\"currentColor\" viewBox=\"0 0 24 24\">
            <path d=\"M3 9.75 12 3l9 6.75V21a.75.75 0 0 1-.75.75H15v-6h-6v6H3.75A.75.75 0 0 1 3 21V9.75Z\"/>
          </svg>
        ",
        'label' => 'Home',
      ],
      [
        'href' => site_url('Penjual/pelanggan'),
        'icon' => "
          <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"32\" height=\"32\" fill=\"currentColor\" viewBox=\"0 0 24 24\">
            <path d=\"M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V18h14v-1.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.94 1.97 3.45V18h5v-1.5c0-2.33-4.67-3.5-6-3.5z\"/>
          </svg>
        ",
        'label' => 'Pelanggan',
      ],
      [
        'href' => site_url('Penjual/profile'),
        'icon' => "
          <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"32\" height=\"32\" fill=\"currentColor\" viewBox=\"0 0 24 24\">
            <path d=\"M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z\"/>
          </svg>
        ",
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
      'pelanggan' => $pelanggan,
      'qr' => site_url('Penjual/scanqrpelanggan/' . md5($pelanggan['id']))
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
      'header' => $this->session->userdata('nama'),
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
