<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_poin extends CI_Migration
{
  public function up()
  {

    $this->db->query("
      CREATE TABLE `poin` (
        `id` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        `penjual` INT(11) NOT NULL,
        `pembeli` INT(11) NOT NULL,
        `nilai` float NOT NULL DEFAULT 0,
        `createdAt` datetime DEFAULT NULL,
        `updatedAt` datetime DEFAULT NULL,
        `deletedAt` datetime DEFAULT NULL,
        PRIMARY KEY (`id`),
        INDEX `idx_penjual` (`penjual`),
        INDEX `idx_pembeli` (`pembeli`),
        INDEX `idx_jumlah` (`nilai`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");
  }

  public function down()
  {
    $this->db->query("DROP TABLE IF EXISTS `poin`");
  }
}
