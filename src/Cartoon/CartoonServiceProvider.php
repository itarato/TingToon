<?php
/**
 * @file
 */

namespace TingToon\Cartoon;

use Silex\Application;
use Silex\ServiceProviderInterface;

class CartoonServiceProvider implements ServiceProviderInterface {

  /**
   * Registers services on the given app.
   *
   * This method should only be used to configure services and parameters.
   * It should not get services.
   */
  public function register(Application $app) {
    $app['cartoon.controller'] = $app->share(function () use ($app) {
      return new CartoonController($app);
    });

    $app['cartoon.repository'] = $app->share(function () use ($app) {
      return new CartoonRepository($app['db']);
    });
  }

  /**
   * Bootstraps the application.
   *
   * This method is called after all services are registered
   * and should be used for "dynamic" configuration (whenever
   * a service must be requested).
   */
  public function boot(Application $app) {
  }

}
