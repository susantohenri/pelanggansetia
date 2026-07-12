<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Poins extends MY_Model
{

  function __construct()
  {
    parent::__construct();
    $this->table = 'poin';
  }

  function transaksi($trx)
  {
    $this->create([
      'penjual' => $this->session->userdata('id'),
      'pembeli' => $trx['pembeli'],
      'nilai' => $trx['nilai']
    ]);
  }

  function redeem($rdm)
  {
    $this->create([
      'penjual' => $this->session->userdata('id'),
      'pembeli' => $rdm['pembeli'],
      'nilai' => $rdm['nilai'] * -1
    ]);
  }
}
