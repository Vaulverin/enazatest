<?php
namespace app\controllers;

use app\models\Feedback;
use app\models\FeedbackForm;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;

class FeedbackController extends Controller
{
    /**
     * Displays feedback form.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new FeedbackForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->save();
            return $this->refresh();
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }
}