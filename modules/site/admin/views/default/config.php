<?php
/* @var $this yii\web\View */
/* @var $model app\modules\site\admin\models\Config */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$this->title = 'Site configuration';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box admin-site-config">
<?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>
    <div class="box-header">
    <br>
    </div>

    <?= $form->field($model, 'site_title') ?>
    <?= $form->field($model, 'meta_description')->textarea(['rows' => 2]) ?>
    <?= $form->field($model, 'meta_keywords')->textarea(['rows' => 2]) ?>
    <?= $form->field($model, 'contact_email') ?>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end() ?>

</div>