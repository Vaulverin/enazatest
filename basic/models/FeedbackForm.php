<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class FeedbackForm extends Model
{
    public $theme;
    public $body;
    /** @var  UploadedFile */
    public $file;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [

            [['theme', 'body'], 'required'],
            ['theme', 'integer'],
            ['body', 'string', 'message' => 'Введите сообщение'],
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions'=>['jpeg', 'png', 'gif', 'pdf']],
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
        if ($this->validate()) {
            $this->file->saveAs('uploads/' . $this->file->baseName . '.' . $this->file->extension);
            return true;
        } else {
            return false;
        }
    }

}
