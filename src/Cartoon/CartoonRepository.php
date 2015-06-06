<?php
/**
 * @file
 */

namespace TingToon\Cartoon;

use TingToon\Repository;

class CartoonRepository extends Repository {

  public function create($data, $created = NULL) {
    if (!$created) {
      $created = time();
    }

    $affectedRows = $this->getConn()->createQueryBuilder()
      ->insert('scene')
      ->values([
        'created' => $created,
        'data' => $this->getConn()->quote($data),
      ])
      ->execute();

    return $affectedRows === 1;
  }

  public function loadAll() {
    return $this->getConn()
      ->createQueryBuilder()
      ->select(['data', 'id'])
      ->from('scene')
      ->orderBy('created', 'ASC')
      ->execute()
      ->fetchAll();
  }

  public function delete($id) {
    $this->getConn()
      ->createQueryBuilder()
      ->delete('scene')
      ->where('id = :id')
      ->setParameter(':id', $id)
      ->execute();
  }

}
