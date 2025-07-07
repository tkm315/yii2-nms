<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Device */

$this->title = 'Add Device';
?>


<!-- with this code , two succss message shown
<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success">
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>
-->

<?php $form = ActiveForm::begin(); ?>
    <h1><?= Html::encode($this->title) ?></h1>
<div class="device-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'ip_address')->textInput() ?>

    <?= $form->field($model, 'device_type')->dropDownList([
        'Router' => 'Router',
        'Switch' => 'Switch',
        'Firewall' => 'Firewall',
    ], ['prompt' => 'Select Device Type']) ?>

    <?= $form->field($model, 'status')->dropDownList([
        'online' => 'Online',
        'offline' => 'Offline',
    ], ['prompt' => 'Select Status']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>


</div>

<?php ActiveForm::end(); ?>