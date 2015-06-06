<?php
/**
 * @file
 */

namespace TingToon\Deployment;

use Silex\Application;
use Silex\ControllerCollection;
use Silex\ControllerProviderInterface;

class DeploymentControllerProvider implements ControllerProviderInterface {

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

    $ctrlFactory->get('/deploy/install', 'deployment.controller:install');

    return $ctrlFactory;
  }

}
