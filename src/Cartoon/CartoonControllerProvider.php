<?php
/**
 * @file
 */

namespace TingToon\Cartoon;

use Silex\ControllerCollection;
use Silex\ControllerProviderInterface;

class CartoonControllerProvider implements ControllerProviderInterface {

  /**
   * Returns routes to connect to the given application.
   *
   * @param \Silex\Application $app An Application instance
   *
   * @return \Silex\ControllerCollection A ControllerCollection instance
   */
  public function connect(\Silex\Application $app) {
    /** @var ControllerCollection $ctrlFactory */
    $ctrlFactory = $app['controllers_factory'];

    $ctrlFactory->get('/cartoon', 'cartoon.controller:listAll');
    $ctrlFactory->post('/cartoon/create', 'cartoon.controller:create');

    return $ctrlFactory;
  }

}
