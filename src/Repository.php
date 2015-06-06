<?php
/**
 * @file
 */

namespace TingToon;

use Doctrine\DBAL\Connection;

class Repository {

  private $conn;

  public function __construct(Connection $conn) {
    $this->conn = $conn;
  }

  /**
   * @return \Doctrine\DBAL\Connection
   */
  protected function getConn() {
    return $this->conn;
  }

}
