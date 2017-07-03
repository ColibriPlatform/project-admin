<?php
/**
 * @copyright   (C) 2017 PHILIP Sylvain. All rights reserved.
 * @license     MIT; see LICENSE.md
 */

namespace app\modules\site\admin\controllers;

use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    public function actions(){
        return [
            'config' => [
                'class' => 'pheme\settings\SettingsAction',
                'modelClass' => 'app\modules\site\admin\models\Config',
                'viewName' => 'config'
            ],
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

}
