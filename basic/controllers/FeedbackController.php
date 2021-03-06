<?php
namespace app\controllers;

use app\models\Feedback;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\UploadedFile;

class FeedbackController extends Controller
{
    /**
     * Displays feedback form.
     *
     * @return string
     */
    public function actionIndex($id = null)
    {
        if ($id != null) {
            return $this->render('feedback', [
                'model' => Feedback::findOne(intval($id)),
            ]);
        }
        $model = new Feedback();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->upload();
            $model->save();
            return $this->redirect('/feedback/'.$model->id);
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }


    public function actionAll()
    {
        $query = Feedback::find();

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 3,
            ]
        ]);
        return $this->render('list', [
            'dataProvider' => $provider,
        ]);
    }

}