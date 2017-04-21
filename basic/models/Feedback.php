<?php
/**
 * Created by PhpStorm.
 * User: vaulin
 * Date: 21.04.2017
 * Time: 17:08
 */

namespace app\models;


use yii\db\ActiveRecord;
use yii\web\UploadedFile;

/**
 * Class Feedback
 * @property integer $themeId
 * @property string $body
 * @property string $filePath
 * @property Theme theme
 * @package app\models
 */
class Feedback extends ActiveRecord
{
    /** @var  UploadedFile */
    public $file;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [

            [['themeId', 'body'], 'required'],
            ['themeId', 'integer'],
            ['body', 'string', 'message' => 'Введите сообщение'],
            [['file'], 'file', 'extensions'=>['jpeg', 'jpg', 'png', 'gif', 'pdf']],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'subject' => 'Тема',
            'body' => 'Обращение',
            'file' => 'Прикрепить файл'
        ];
    }

    public function getThemes()
    {
        return Theme::find()
            ->select(['name'])
            ->indexBy('id')
            ->column();
    }

    public function upload()
    {
        if ($this->validate() && $this->file != null) {
            $path = 'uploads/' . $this->file->baseName . '.' . $this->file->extension;
            $this->file->saveAs($path);
            $this->filePath = $path;
            return true;
        }
        return false;
    }

    public function getTheme()
    {
        return $this->hasOne(Theme::className(), ['id' => 'themeId']);
    }

}