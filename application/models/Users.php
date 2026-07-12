<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users extends MY_Model
{

  function __construct()
  {
    parent::__construct();
    $this->table = 'user';
  }

  function signuppenjual($record)
  {
    if (!$this->validateUsername($record['username'])) return 'Nomor HP salah';
    else {
      $password = $record['password'];

      $record['password'] = md5($password);
      $record['role'] = 'penjual';
      $this->create($record);

      $this->login($record['username'], $password);
      return false;
    }
  }

  function signuppembeli()
  {
    $id = $this->create([
      'role' => 'pembeli'
    ]);
    $user = $this->findOne($id);
    $this->session->set_userdata($user);

    return false;
  }

  function login($username, $password)
  {
    if (!$this->validateUsername($username)) return 'Nomor HP salah';
    $user = $this->findOne(['username' => $username]);
    if (!$user) return 'Pengguna tidak ditemukan';
    else if ($user['password'] !== md5($password)) return 'Password salah';
    else {
      $this->session->set_userdata($user);
      return false;
    }
  }

  function findByMd5Id($md5Id)
  {
    return $this
      ->db
      ->where('deletedAt', null)
      ->get_where($this->table, ['MD5(id)' => $md5Id])
      ->row_array();
  }

  function updateProfile($record)
  {
    $record['id'] = $this->session->userdata('id');
    $this->db->set('nama', $record['nama']);

    if (!$this->validateUsername($record['username'])) return 'Nomor HP salah';
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
}
