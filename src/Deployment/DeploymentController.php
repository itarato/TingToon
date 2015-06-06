<?php
/**
 * @file
 */

namespace TingToon\Deployment;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use TingToon\TingToonApp;

class DeploymentController {

  public function install(TingToonApp $app) {
    /** @var Connection $db */
    $db = $app['db'];
    $sm = $db->getSchemaManager();

    $schema = new Schema();

    $table = $schema->createTable('scene');
    $table->addColumn('id', Type::INTEGER);
    $table->addColumn('created', Type::INTEGER, ['unsigned' => TRUE]);
    $table->addColumn('data', Type::TEXT);
    $table->setPrimaryKey(['id']);

    $sm->dropAndCreateTable($table);

    return ['status' => 'ok'];
  }

}
