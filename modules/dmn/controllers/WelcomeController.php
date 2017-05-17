<?php

namespace app\modules\dmn\controllers;
use Yii;
use app\models\OrderForm;
class WelcomeController extends DefaultController
{
    public function actionIndex()
    {
        //
        $count = [];
        //
        $orders = new OrderForm();
        $count['contact'] = $orders->find()->count();
        //
        $users = new \app\models\SystemUsers();
        $count['users'] = $users->find()->count();
        //
        $news = new \app\models\SystemNews();
        $count['news'] = $news->find()->count();
        //
        $comments = new \app\models\SystemComments();
        $count['comments'] = $comments->find()->count();
        //
        $photo = new \app\models\SystemPhotoPosition();
        $count['photo'] = $photo->find()->count();
        //
        $about = new \app\models\SystemAbout();
        $count['about'] = $about->find()->count();
        //
        return $this->render('index',[
            'count' => $count,
        ]);
    }
}
