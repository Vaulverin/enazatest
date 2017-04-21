<?php
namespace app\controllers;

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
            $model->file = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
            return $this->refresh();
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }
}