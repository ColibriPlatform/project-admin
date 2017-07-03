<?php
use colibri\base\components\Env;
use colibri\base\components\WebApplication;

require(__DIR__ . '/../vendor/autoload.php');

Env::Load(__DIR__ . '/../.env');

defined('YII_DEBUG') or define('YII_DEBUG', (boolean) getenv('YII_DEBUG'));
defined('YII_ENV') or define('YII_ENV', getenv('YII_ENV')? getenv('YII_ENV') : 'prod');

require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require __DIR__ . '/../config/web.php';

(new WebApplication($config))->run();
