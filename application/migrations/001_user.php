<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_user extends CI_Migration
{
  public function up()
  {

    $this->db->query("
      CREATE TABLE `user` (
        `id` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        `username` varchar(255) NOT NULL,
        `password` varchar(32) NOT NULL,
        `role` ENUM('admin', 'penjual', 'pembeli') DEFAULT 'penjual',
        `nama` varchar(255) NOT NULL,
        `poin` float NOT NULL DEFAULT 0,
        `saldo` float NOT NULL DEFAULT 0,
        `createdAt` datetime DEFAULT NULL,
        `updatedAt` datetime DEFAULT NULL,
        `deletedAt` datetime DEFAULT NULL,
        PRIMARY KEY (`id`),
        INDEX `idx_username` (`username`),
        INDEX `idx_nama` (`nama`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

    $this->db->insert('user', [
      'username' => '081901088918',
      'password' => md5('123'),
      'role' => 'admin',
      'nama' => 'Administrator'
    ]);
  }

  public function down()
  {
    $this->db->query("DROP TABLE IF EXISTS `user`");
  }
}
