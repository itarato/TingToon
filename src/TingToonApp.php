<?php
/**
 * @file
 */

namespace TingToon;

use Exception;
use Silex\Application;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use TingToon\App\AppControllerProvider;
use TingToon\App\AppServiceProvider;
use TingToon\Cartoon\CartoonControllerProvider;
use TingToon\Cartoon\CartoonServiceProvider;
use TingToon\Deployment\DeploymentControllerProvider;
use TingToon\Deployment\DeploymentServiceProvider;

class TingToonApp extends Application {

  public function __construct(array $values = array()) {
    parent::__construct($values);

    $this->registerServiceProviders();

    $this->mountControllers();

    $this->registerErrorHandler();

    $this->registerViewHandler();
  }

  protected function registerServiceProviders() {
    $this->register(new ServiceControllerServiceProvider());

    $this->register(new CartoonServiceProvider());
    $this->register(new DeploymentServiceProvider());

    $this->register(new DoctrineServiceProvider(), [
      'db.options' => [
        'driver' => 'pdo_sqlite',
        'path' => __DIR__ . '/../database/tingtoon.db',
      ],
    ]);

    $this->register(new AppServiceProvider());
  }

  protected function mountControllers() {
    $this->mount('/', new CartoonControllerProvider());
    $this->mount('/', new DeploymentControllerProvider());
    $this->mount('/', new AppControllerProvider());
  }

  protected function registerViewHandler() {
    $app = $this;
    $this->view(function ($var) use ($app) {
      return $var !== NULL ? $app->json($var) : '';
    });
  }

  protected function registerErrorHandler() {
    $this->error(function (Exception $e) {
      return ['status' => $e->getMessage()];
    });
  }

}
