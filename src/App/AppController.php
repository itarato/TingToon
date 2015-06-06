<?php
/**
 * @file
 */

namespace TingToon\App;

use TingToon\Cartoon\CartoonRenderer;
use TingToon\Cartoon\CartoonRepository;
use TingToon\TingToonApp;

class AppController {

  public function index(TingToonApp $app) {
    /** @var CartoonRepository $cartoonRepo */
    $cartoonRepo = $app['cartoon.repository'];
    $cartoons = $cartoonRepo->loadAll();

    $this->preProcessCartoonData($cartoons);

    require __DIR__ . '/../../views/ui.php';
  }

  protected function preProcessCartoonData(array &$list) {
    foreach ($list as $idx => $item) {
      $list[$idx] = new CartoonRenderer($item);
    }
  }

}
