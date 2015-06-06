<?php
/**
 * @file
 */

namespace TingToon\App;

use Silex\Application;
use Silex\ControllerCollection;
use Silex\ControllerProviderInterface;

class AppControllerProvider implements ControllerProviderInterface {

  /**
   * Returns routes to connect to the given application.
   *
   * @param Application $app An Application instance
   *
   * @return ControllerCollection A ControllerCollection instance
   */
  public function connect(Application $app) {
    /** @var ControllerCollection $ctrlFactory */
    $ctrlFactory = $app['controllers_factory'];

    $ctrlFactory->get('/', 'app.controller:index');

    return $ctrlFactory;
  }

}
