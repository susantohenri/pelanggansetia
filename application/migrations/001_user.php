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
        `role` ENUM('admin', 'merchant', 'customer') DEFAULT 'merchant',
        `merchant` INT(11) NOT NULL DEFAULT 0,
        `createdAt` datetime DEFAULT NULL,
        `updatedAt` datetime DEFAULT NULL,
        `deletedAt` datetime DEFAULT NULL,
        `nama` varchar(255) NOT NULL,
        `balance` float NOT NULL DEFAULT 0,
        PRIMARY KEY (`id`),
        UNIQUE KEY `unique_username_merchant` (`username`, `merchant`)
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
