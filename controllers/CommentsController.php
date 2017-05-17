<?php

namespace app\controllers;
use app\models\SystemComments;
use yii\data\Pagination;
use Yii;

class CommentsController extends BaseController
{
    public function actionIndex()
    {
        //
        $model = new SystemComments();
        $query = $model->find()->where(['hide' => 'show']);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'defaultPageSize' => 10,
        ]);
        $comments = $query->limit($pages->limit)->offset($pages->offset)->orderBy(['id_position' => SORT_DESC])->all();
        //
        $model->put_date = date('Y-n-j H:i:s', time());
        $model->hide = 'show';
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        }
        //
        return $this->render('index', [
            'comments' => $comments,
            'model' => $model,
            'pages' => $pages,
        ]);
    }
}
