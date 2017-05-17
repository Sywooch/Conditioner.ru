<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\dmn\controllers;
use app\models\SystemUsers;
use Yii;
/**
 * Description of UserController
 *
 * @author Max
 */
class UserController extends DefaultController{
    //
    public function actionIndex() {
        //
        $all_users = SystemUsers::find()->all();
        //
        return $this->render('index', [
            'all_users' => $all_users,
        ]);
    }
    //
    public function actionUpdate() {
        $id = Yii::$app->request->get('id');
        //
        $user = $this->findModel($id);
        //
        if ($user->load(Yii::$app->request->post()) && $user->save()) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        }
        //
        return $this->render('update', [
            'user' => $user,
        ]);
    }
    //
    public function actionDelete() {
        
    }
    
    /**
     * Finds the SystemNews model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SystemNews the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SystemUsers::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Запрашиваемая страница не найдена.');
        }
    }
}
