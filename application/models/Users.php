<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users extends MY_Model
{

  function __construct()
  {
    parent::__construct();
    $this->table = 'user';
  }

  function login($username, $password)
  {
    if (!$this->validateUsername($username)) return 'Nomor HP salah';
    $user = $this->findOne(['username' => $username]);
    if (!$user) return 'Pengguna tidak ditemukan';
    else if ($user['password'] !== md5($password)) return 'Password salah';
    else {
      switch ($user['role']) {
        case 'admin':
        case 'merchant':
          $user['header'] = $user['nama'];
          break;
        case 'customer':
          $merchant = $this->Users->findOne($user['merchant']);
          $user['header'] = $merchant['nama'];
          break;
      }
      $this->session->set_userdata($user);
      return false;
    }
  }

  function register($record)
  {
    if (!$this->validateUsername($record['username'])) return 'Nomor HP salah';
    else if (!$this->validateDuplicateUsername($record['username'], $record['merchant'])) return 'Nomor HP sudah terdaftar';
    else {
      $password = $record['password'];
      $record['password'] = md5($password);
      $this->create($record);
      $this->login($record['username'], $password);
      return false;
    }
  }

  function findByMd5Id($md5Id)
  {
    return $this->db->get_where($this->table, ['MD5(id)' => $md5Id])->row_array();
  }

  function updateProfile($record)
  {
    $record['id'] = $this->session->userdata('id');
    $this->db->set('nama', $record['nama']);

    $user = $this->findOne($record['id']);
    if (!$this->validateUsername($record['username'])) return 'Nomor HP salah';
    else if (!$this->validateDuplicateUsername($record['username'], $user['merchant'], $record['id'])) return 'Nomor HP sudah terdaftar';
    else $this->db->set('username', $record['username']);

    if ('' != $record['password']) {
      $this->db->set('password', md5($record['password']));
    }

    $this->db->set('updatedAt', date('Y-m-d H:i:s'));
    $this->db->where('id', $record['id'])->update($this->table);
    return false;
  }

  function validateUsername($username)
  {
    return preg_match('/^08[0-9]{8,11}$/', $username);
  }

  function validateDuplicateUsername($username, $merchant, $id = null)
  {
    if (!!$id) $this->db->where('id <>', $id, false);
    $exists = $this
      ->db
      ->where('username', $username)
      ->where('merchant', $merchant)
      ->where('deletedAt', null)
      ->get($this->table)
      ->row_array();
    return !$exists;
  }
}
