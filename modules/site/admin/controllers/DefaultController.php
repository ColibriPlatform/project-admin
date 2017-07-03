<?php

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

    /**
     * Display configuration form
     * @return mixed
     */
    /*
    public function actionConfig()
    {
        $model = new Config();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            sleep (3);
            return $this->redirect(['index']);
        }

        return $this->render('config', [
            'model' => $model,
        ]);
    }
    */
}
