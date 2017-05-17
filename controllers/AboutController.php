<?php

namespace app\controllers;

use app\models\SystemAbout;
use Yii;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class AboutController extends BaseController
{
    public function actionIndex()
    {
        //
        $query = SystemAbout::find()->where(['hide' => 'show']);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'defaultPageSize' => 10,
        ]);
        $model = $query->limit($pages->limit)->offset($pages->offset)->orderBy(['id_about' => SORT_DESC])->all();
//        if(empty($model))
//            $this->_error();
        //
        return $this->render('index', [
            'model' => $model,
            'pages' => $pages,
        ]);
    }
    public function actionView() {
        //
        $id_about = Yii::$app->request->get('id');
        //
        $about = new SystemAbout();
        $model = $about->find()->where([
            'id_about' => $id_about,
            'hide' => 'show',
        ])->all();
        if (empty($model))
            $this->_error();
        //
        return $this->render('view', [
            'model' => $model,
        ]);
    }
    //
    private function _error(){
        throw new NotFoundHttpException('Запрашиваемая страница не найдена.');
    }
}
