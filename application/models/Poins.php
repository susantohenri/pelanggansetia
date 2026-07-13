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
    if (1 > $trx['nilai']) return 'Poin salah';
    $record = [
      'penjual' => $this->session->userdata('id'),
      'pelanggan' => $trx['pelanggan'],
      'nilai' => $trx['nilai']
    ];
    $this->create($record);
    $this->poinPelanggan($record);
    $this->Pelanggans->pelangganSetia($record['penjual']);
    $this->retention($record['penjual']);
  }

  function redeem($rdm)
  {
    if (1 > $rdm['nilai']) return 'Poin salah';
    $record = [
      'penjual' => $this->session->userdata('id'),
      'pelanggan' => $rdm['pelanggan'],
      'nilai' => $rdm['nilai'] * -1
    ];
    $poin = $this->getPoin($record);
    if ($poin + $record['nilai'] < 0) return 'Poin belum cukup';
    $this->create($record);
    $this->poinPelanggan($record);
    $this->redemption($record['penjual']);
  }

  function retention($penjual)
  {
    $awalMinggu  = date('Y-m-d 00:00:00', strtotime('monday this week'));
    $akhirMinggu = date('Y-m-d 23:59:59', strtotime('sunday this week'));

    $retention = $this->db
      ->select('pelanggan')
      ->from('poin')
      ->where('penjual', $penjual)
      ->where('createdAt >=', $awalMinggu)
      ->where('createdAt <=', $akhirMinggu)
      ->group_by('pelanggan')
      // ->having('COUNT(id) >', 1)
      ->count_all_results();

    $this->session->set_userdata('retention', $retention);
  }

  function redemption($penjual)
  {
    $awalMinggu = date('Y-m-d 00:00:00', strtotime('monday this week'));
    $akhirMinggu = date('Y-m-d 23:59:59', strtotime('sunday this week'));

    $redemption = $this->db
      ->from('poin')
      ->where('penjual', $penjual)
      ->where('nilai <', 0)
      ->where('createdAt >=', $awalMinggu)
      ->where('createdAt <=', $akhirMinggu)
      ->count_all_results();

    $this->session->set_userdata('redemption', $redemption);
  }

  private function poinPelanggan($poin)
  {
    $this->load->model('Pelanggans');
    return $this->Pelanggans->updatePoin($poin);
  }

  private function getPoin($record)
  {
    return $this
      ->db
      ->select('SUM(nilai) AS poin')
      ->where('penjual', $record['penjual'])
      ->where('pelanggan', $record['pelanggan'])
      ->where('deletedAt', null)
      ->group_by('penjual')
      ->get($this->table)
      ->row_array()['poin'];
  }
}
