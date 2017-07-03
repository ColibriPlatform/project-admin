<?php

namespace app\modules\site\admin;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\site\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    /**
     * Bootstrap method to be called during application bootstrap stage.
     *
     * @param \yii\web\Application $app the application currently running
     */
    public function bootstrap($app)
    {

    }
}
