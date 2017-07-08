<?php
/**
 * @copyright   (C) 2017 PHILIP Sylvain. All rights reserved.
 * @license     MIT; see LICENSE.md
 */
require(__DIR__ . '/../vendor/autoload.php');

\colibri\base\Env::load(__DIR__ . '/../.env');

defined('YII_DEBUG') or define('YII_DEBUG', (boolean) getenv('YII_DEBUG'));
defined('YII_ENV') or define('YII_ENV', getenv('YII_ENV')? getenv('YII_ENV') : 'prod');

require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require __DIR__ . '/../config/web.php';

(new \colibri\base\WebApplication($config))->run();
