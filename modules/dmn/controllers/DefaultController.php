<?php

namespace app\modules\dmn\controllers;
use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
/**
 * Default controller for the `dmn` module
 */
class DefaultController extends Controller
{
    public function behaviors()
    {
        $this->actionAcces();
        return [
            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function ($rule, $action){
                    $this->redirect('/');
                },
                //'only' => ['logout'],
                'rules' => [
                    [
                        //'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionAcces()
    {
        if(Yii::$app->user->isGuest)
            $this->redirect('/');
        elseif (Yii::$app->user->identity->role == 'user')
            $this->redirect('/');
    }
}
