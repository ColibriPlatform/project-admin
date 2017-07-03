<?php

namespace app\modules\site\controllers;

use app\modules\site\models\ContactForm;
use yii\web\Controller;

use Yii;

/**
 * Default controller for the `site` module
 */
class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();

        $contactEmail = Yii::$app->settings->get('contact_email', 'site-config');

        if ($model->load(Yii::$app->request->post()) && $model->contact($contactEmail)) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
            'contactEmail' => $contactEmail
        ]);
    }
}
