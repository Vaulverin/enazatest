<?php
/* @var $dataProvider ActiveDataProvider */
/* @var $this yii\web\View */

use yii\data\ActiveDataProvider;
use yii\widgets\ListView;


$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">
        <h1>Feedback list is HERE!</h1>
        <div class="row margin-null">
            <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => 'listItem',
                    'emptyText' => 'Список пуст',
            ]);?>
        </div>
    </div>
</div>
