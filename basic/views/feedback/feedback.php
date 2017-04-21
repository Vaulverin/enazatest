<?php
use app\models\Feedback;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
/** @var $model Feedback */
?>

<div class="list-item">
    <h2><?= Html::encode($model->theme->name) ?></h2>
    <?= HtmlPurifier::process($model->body) ?>
</div>
