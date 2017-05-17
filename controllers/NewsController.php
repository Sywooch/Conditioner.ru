<?php

namespace app\controllers;
use app\models\SystemNews;
use app\models\SystemCommentsNews;
use Yii;
use yii\data\Pagination;

class NewsController extends BaseController
{
    public function actionIndex()
    {
        //
        $count = SystemNews::find()->where(['hide' => 'show'])->count();
        $pages = new Pagination([
            'totalCount' => $count,
            'defaultPageSize' => 10,
        ]);
        $all_news = SystemNews::find()->where(['hide' => 'show'])->limit($pages->limit)->offset($pages->offset)->orderBy(['put_date' => SORT_DESC])->all();

        //
        return $this->render('index', [
            'all_news' => $all_news,
            'pages' => $pages,
        ]);
    }
    //
    public function actionRead() {
    	//
        $id_news = Yii::$app->request->get('id');
        $one_news = SystemNews::find()->where(['hide' => 'show'])->andWhere(['id_news' => $id_news])->all();
        if (empty($one_news)) {
            throw new \yii\web\NotFoundHttpException('Данной записи нет!');
        }
        //
        $model = new SystemCommentsNews();
        //
        $comments_news = $model->find()->where(['hide' => 'show'])->andWhere(['id_news' => $id_news])->all();
        $model->id_news = $id_news;
        $model->put_date = date('Y-n-j H:i:s', time());
        $model->hide = 'show';
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        }
        //
        return $this->render('read', [
            'one_news' => $one_news,
            'model' => $model,
            'comments' => $comments_news,
        ]);
    }
}
