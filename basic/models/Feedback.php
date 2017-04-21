<?php
/**
 * Created by PhpStorm.
 * User: vaulin
 * Date: 21.04.2017
 * Time: 17:08
 */

namespace app\models;


use yii\db\ActiveRecord;

/**
 * Class Feedback
 * @property integer $theme_id
 * @property string $body
 * @property string $file_path
 * @property Theme theme
 * @package app\models
 */
class Feedback extends ActiveRecord
{
    public function getTheme()
    {
        return $this->hasOne(Theme::className(), ['id' => 'theme_id']);
    }

}