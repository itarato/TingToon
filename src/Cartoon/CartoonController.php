<?php
/**
 * @file
 */

namespace TingToon\Cartoon;

use Exception;
use Symfony\Component\HttpFoundation\Request;
use TingToon\TingToonApp;

class CartoonController {

  /**
   * @var CartoonRepository
   */
  protected $cartoonRepo;

  public function __construct(TingToonApp $app) {
    $this->cartoonRepo = $app['cartoon.repository'];
  }

  public function listAll() {
    $list = $this->cartoonRepo->loadAll();
    return $list;
  }

  public function create(Request $request) {
    $payload = $request->getContent();
    if (!($json = json_decode($payload))) {
      throw new Exception('Invalid payload.');
    }

    $success = $this->cartoonRepo->create($payload);

    return ['success' => $success];
  }

  public function delete($id) {
    $this->cartoonRepo->delete($id);
    return ['success' => TRUE];
  }

}
