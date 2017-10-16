<?php

namespace app\controllers;
use app\models\SystemPhotoCatalog;
use app\models\SystemPhotoPosition;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;
use Yii;

class GalleryController extends BaseController
{
    public function actionIndex()
    {
        //
        $gallery = new SystemPhotoCatalog();
        //
        $model = $gallery->find()->where(['hide' => 'show'])->orderBy(['id_catalog' => SORT_DESC])->all();
        //
//        if (!empty($model)) {
            return $this->render('index', [
                'model' => $model,
            ]);
//        } else {
//            throw new NotFoundHttpException('Галерея пуста.');
//        }
        
    }
    //
    public function actionView() {
        //
        $id_position = Yii::$app->request->get('id');
        $model = new SystemPhotoPosition();
        $count = $model->find()->where([
            'hide' => 'show',
            'id_catalog' => $id_position,
        ])->count();
        $pages = new Pagination([
            'totalCount' => $count,
            'defaultPageSize' => 9,
        ]);
        $photo = $model->find()->where([
            'hide' => 'show',
            'id_catalog' => $id_position,
        ])->limit($pages->limit)->offset($pages->offset)->orderBy(['id_position' => SORT_DESC])->all();
        //
        if ( !empty($photo) ) {
            return $this->render('view', [
                'model' => $photo,
                'pages' => $pages,
            ]);
        } else {
            throw new NotFoundHttpException('Фотографии не найдены.');
        }
    }
}
