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
        'icon' => "
          <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"w-6 h-6\" fill=\"currentColor\" viewBox=\"0 0 24 24\">
            <path d=\"M3 9.75 12 3l9 6.75V21a.75.75 0 0 1-.75.75H15v-6h-6v6H3.75A.75.75 0 0 1 3 21V9.75Z\"/>
          </svg>
        ",
        'label' => 'Home',
      ],
      [
        'href' => site_url('Pelanggan/logout'),
        'icon' => "
          <svg xmlns=\"http://www.w3.org/2000/svg\"
              width=\"24\"
              height=\"24\"
              viewBox=\"0 0 24 24\"
              fill=\"currentColor\">
            <path d=\"M10 17l5-5-5-5v3H3v4h7v3zm9-14H5c-1.1 0-2 .9-2 2v3h2V5h14v14H5v-3H3v3c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z\"/>
          </svg>
        ",
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
