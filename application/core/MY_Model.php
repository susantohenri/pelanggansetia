<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_Model extends CI_Model
{
  function __construct()
  {
    date_default_timezone_set('Asia/Jakarta');
    parent::__construct();
    $this->load->database();
  }

  public function save($record)
  {
    return isset($record['id']) ? $this->update($record) : $this->create($record);
  }

  public function create($record)
  {
    $record['createdAt'] = date('Y-m-d H:i:s');
    $record['updatedAt'] = date('Y-m-d H:i:s');
    $this->db->insert($this->table, $record);
    return $this->db->insert_id();
  }

  public function update($record)
  {
    $record['updatedAt'] = date('Y-m-d H:i:s');
    $this->db->where('id', $record['id'])->update($this->table, $record);
    return $record['id'];
  }

  public function findOne($param)
  {
    if (!is_array($param)) {
      $param = ['id' => $param];
    }
    $param['deletedAt'] = null;
    return $this->db->get_where($this->table, $param)->row_array();
  }

  public function find($param = [])
  {
    $param["{$this->table}.deletedAt"] = null;
    return $this->db->get_where($this->table, $param)->result();
  }

  public function delete($id)
  {
    return $this->db->where('id', $id)->set('deletedAt', date('Y-m-d H:i:s'))->update($this->table);
  }
}
