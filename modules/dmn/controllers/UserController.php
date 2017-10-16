<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\dmn\controllers;
use app\models\SystemUsers;
use app\models\ChangePasswordForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
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
            Yii::$app->session->setFlash('success', 'Данные успешно обновлены.');
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
     * @return SystemUsers the loaded model
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
    //
    public function actionPassword($id)
    {
        //
        try {
            $model = new ChangePasswordForm($id);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->changePassword())
        {
            Yii::$app->session->setFlash('success', 'Пароль успешно изменен!');
            $model->resetForm();
        }
        return $this->render('change-password', [
            'model' => $model,
        ]);
    }
}
