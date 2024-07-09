<?php
require_once __DIR__.'/../vendor/autoload.php';

$dir_root = str_replace('\public', '', __DIR__);

define('_DIR_ROOT', $dir_root);

session_start();
// require_once 'core/Connection.php';

// require_once 'core/QueryBuilder.php';

// require_once 'core/Database.php';

// require_once 'core/Validate.php';

// require_once 'core/Cookie.php';

// require_once 'core/Model.php';

// require_once 'core/Controller.php';

use app\core\App;

$app = new App();

$app->run();