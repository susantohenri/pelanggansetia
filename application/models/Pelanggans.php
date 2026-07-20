<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggans extends MY_Model
{

  function __construct()
  {
    parent::__construct();
    $this->table = 'pelanggan';
  }

  function updatePoin($poinRecord)
  {
    $pelanggan = [
      'penjual' => $poinRecord['penjual'],
      'pelanggan' => $poinRecord['pelanggan']
    ];

    $record = $this->findOne($pelanggan);
    if (!$record) {
      $record = array_merge($pelanggan, [
        'id' => $this->create($pelanggan),
        'poin' => 0,
        'earn' => 0,
        'redeem' => 0,
      ]);
    }

    $record['poin'] += $poinRecord['nilai'];
    if (0 < $poinRecord['nilai']) $record['earn'] += $poinRecord['nilai'];
    if (0 > $poinRecord['nilai']) $record['redeem'] += 1;

    $record['lastVisit'] = date('Y-m-d H:i:s');
    return $this->update($record);
  }

  function pelanggansetia($penjual)
  {
    $pelanggansetia = $this
      ->db
      ->select('u.nama')
      ->select('p.earn')
      ->join('user u', 'u.id = p.pelanggan')
      ->where('penjual', $penjual)
      ->order_by('earn', 'DESC')
      ->limit(1)
      ->get("{$this->table} p")
      ->row_array();
    if (!isset($pelanggansetia['earn'])) $pelanggansetia = ['nama' => 'Belum Ada', 'earn' => ''];
    $this->session->set_userdata('pelanggansetia', $pelanggansetia);
  }

  function daftarpelanggan()
  {
    $penjual = $this->session->userdata('id');
    $pelanggans = $this
      ->db
      ->select('md5(u.id) id', false)
      ->select('u.nama')
      ->select('u.username')
      ->select('p.lastVisit')
      ->where('penjual', $penjual)
      ->where('p.deletedAt', null)
      ->join('user u', 'u.id = p.pelanggan')
      ->order_by('p.lastVisit', 'DESC')
      ->get("{$this->table} p")
      ->result();
    return array_map(function ($pelanggan) {
      $pelanggan->lastVisit = $this->formatKunjunganTerakhir($pelanggan->lastVisit);
      return $pelanggan;
    }, $pelanggans);
  }

  private function formatKunjunganTerakhir($datetime)
  {
    $time = strtotime($datetime);
    $today = strtotime(date('Y-m-d'));
    $visit = strtotime(date('Y-m-d', $time));

    $selisih = ($today - $visit) / 86400;

    if ($selisih == 0) {
      return 'Hari ini, Jam ' . date('H:i', $time);
    }

    if ($selisih == 1) {
      return 'Kemarin, Jam ' . date('H:i', $time);
    }

    return date('d M Y, \J\a\m H:i', $time);
  }
}
