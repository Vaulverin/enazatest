<?php
use app\models\Feedback;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
/** @var $model Feedback */
?>

<div class="list-item">
    <a href="/feedback/<?=$model->id?>"><h2><?= Html::encode($model->theme->name) ?></h2></a>
    <?= HtmlPurifier::process($model->body) ?>
</div>
