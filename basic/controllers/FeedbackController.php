<?php
namespace app\controllers;

use Yii;

class FeedbackController extends Controller
{
    /**
     * Displays feedback form.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}