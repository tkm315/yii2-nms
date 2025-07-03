<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

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

<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<div class="form-group">
    <?= Html::submitButton('Add Device', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
