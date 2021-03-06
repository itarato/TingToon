<?php
/**
 * @file
 */

namespace TingToon\App;


use Silex\Application;
use Silex\ServiceProviderInterface;

class AppServiceProvider implements ServiceProviderInterface {

  /**
   * Registers services on the given app.
   *
   * This method should only be used to configure services and parameters.
   * It should not get services.
   */
  public function register(Application $app) {
    $app['app.controller'] = $app->share(function () {
      return new AppController();
    });
  }

  /**
   * Bootstraps the application.
   *
   * This method is called after all services are registered
   * and should be used for "dynamic" configuration (whenever
   * a service must be requested).
   */
  public function boot(Application $app) { }

}
