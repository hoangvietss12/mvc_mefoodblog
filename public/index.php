<?php
require_once __DIR__.'/../vendor/autoload.php';
use Dotenv\Dotenv;

$dir_root = str_replace('\public', '', __DIR__);

define('_DIR_ROOT', $dir_root);
//Xu ly http root
if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on') {
    $web_root = 'https://'.$_SERVER['HTTP_HOST'];
} else {
    $web_root = 'http://'.$_SERVER['HTTP_HOST'];
}

$dirRoot = str_replace('\\', '/', __DIR__);

$documentRoot = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);

$folder = str_replace(strtolower($documentRoot), '', strtolower($dirRoot));

$web_root = $web_root.$folder;

define('_WEB_ROOT', $web_root);

$dotenv = Dotenv::createImmutable(_DIR_ROOT);
$dotenv->load();

session_start();
require_once '../core/Connection.php';

require_once '../core/QueryBuilder.php';

require_once '../core/Database.php';

require_once '../core/Validate.php';

// require_once 'core/Cookie.php';

require_once '../core/Model.php';

require_once '../core/Controller.php';

use app\core\App;

$app = new App();

$app->run();