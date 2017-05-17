<?php

namespace app\controllers;

use Yii;
use app\models\OrderForm;


class OrderController extends BaseController
{
    //public $defaultAction = 'create';

    public function actionIndex()
    {
        $model = new OrderForm();
        $model->put_date = date('Y-n-j H:i:s', time());
        $model->hide = 'show';
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }
}
