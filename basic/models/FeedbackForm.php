<?php

namespace app\models;

use Yii;
use yii\base\Model;

class FeedbackForm extends Model
{
    public $theme;
    public $body;
    public $file;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [

            [['theme', 'body', 'file'], 'required'],
            ['theme', 'integer'],
            ['body', 'string'],
            ['file', 'file', 'extensions'=>['jpeg', 'png', 'gif', 'pdf']],
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

}
