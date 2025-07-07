<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Device */

$this->title = 'Add Device';

?>

<h1><?= Html::encode($this->title) ?></h1>
<!-- with this code , two succss message shown
<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success">
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>
-->

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Enter device name']) ?>

<?= $form->field($model, 'ip_address')->textInput(['maxlength' => true, 'placeholder' => 'e.g., 192.168.1.1']) ?>

<?= $form->field($model, 'device_type')->dropDownList([
    '' => 'Select Device Type',
    'Router' => 'Router',
    'Switch' => 'Switch',
    'Firewall' => 'Firewall',
    'Server' => 'Server',
    'Access Point' => 'Access Point',
], ['prompt' => 'Choose device type...']) ?>

<?= $form->field($model, 'status')->dropDownList([
    '' => 'Select Status',
    'online' => 'Online',
    'offline' => 'Offline',
    'unknown' => 'Unknown',
], ['prompt' => 'Choose status...']) ?>

<div class="form-group">
    <?= Html::submitButton('Add Device', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>