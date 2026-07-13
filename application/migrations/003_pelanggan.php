<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_pelanggan extends CI_Migration
{
  public function up()
  {

    $this->db->query("
      CREATE TABLE `pelanggan` (
        `id` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        `penjual` INT(11) NOT NULL,
        `pelanggan` INT(11) NOT NULL,
        `poin` float NOT NULL DEFAULT 0,
        `earn` float NOT NULL DEFAULT 0,
        `redeem` INT(11) NOT NULL DEFAULT 0,
        `lastVisit` datetime DEFAULT NULL,
        `createdAt` datetime DEFAULT NULL,
        `updatedAt` datetime DEFAULT NULL,
        `deletedAt` datetime DEFAULT NULL,
        PRIMARY KEY (`id`),
        INDEX `idx_penjual` (`penjual`),
        INDEX `idx_pelanggan` (`pelanggan`),
        INDEX `idx_jumlah` (`poin`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");
  }

  public function down()
  {
    $this->db->query("DROP TABLE IF EXISTS `pelanggan`");
  }
}
