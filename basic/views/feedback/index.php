<?php

/* @var $this yii\web\View */
/* @var $model app\models\FeedbackForm */
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use vova07\imperavi\Widget;



$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">
        <h1>Feedback form is HERE!</h1>
        <div class="row margin-null">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

            <?= $form->field($model, 'themeId')->dropDownList($model->getThemes(),
                ['prompt'=>'- Выберите тему -'])  ?>
            <?= $form->field($model, 'body')->widget(Widget::className(), [
                'settings' => [
                    'lang' => 'ru',
                    'minHeight' => 200,
                    'plugins' => [
                        'clips',
                        'fullscreen'
                    ]
                ]
            ]); ?>
            <?= $form->field($model, 'file')->fileInput() ?>
            <div class="form-group">
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
