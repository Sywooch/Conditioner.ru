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
            Yii::$app->session->setFlash('success', '
                <h4>Благодарим Вас за обращение к нам. Мы постараемся ответить вам как можно скорее.</h4>
                <p>Наши менеджеры свяжутся с Вами по номеру телефона,
                который Вы нам сообщили и обсудят с вами дату/время выполнения заказа!</p>
            ');
            return $this->refresh();
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }
}
