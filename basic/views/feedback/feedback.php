<?php
use app\models\Feedback;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
/** @var $model Feedback */
$path = strval($model->filePath);
function filesize_formatted($path)
{
    $size = filesize($path);
    $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    $power = $size > 0 ? floor(log($size, 1024)) : 0;
    return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
}
?>

<div class="list-item">
    <h2><?= Html::encode($model->theme->name) ?></h2>
    <?= HtmlPurifier::process($model->body) ?>
    <?php if (!empty($path)):?>
        <a href="/<?=$path?>"><?='('.mime_content_type($path).' '.filesize_formatted($path).')'?></a>
    <?php endif;?>
</div>
