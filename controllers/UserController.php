<?php

namespace app\controllers;
use app\models\SystemUsers;
use app\models\RegForm;
use app\models\LoginForm;
use Yii;
use app\models\SendEmailForm;
use app\models\ResetPasswordForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;

class UserController extends BaseController
{
    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new RegForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            //
            if ($user = $model->reg()) {
                //
                if ($user->status === $user::STATUS_ACTIVE) {
                    //
                    if (Yii::$app->getUser()->login($user)) {
                        return $this->goHome();
                    }
                }
            } else {
                Yii::$app->session->setFlash('error');
                Yii::error('Ошибка регистрации');
                return $this->refresh();
            }
        }
        //
        return $this->render('register', [
            'model' => $model,
        ]);
    }
    //
    public function actionLogin() {
        $this->layout = 'login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (Yii::$app->user->identity->role == 'admin') {
                return $this->redirect('/dmn');
            } else {
                return $this->goBack();
            }
        }
        return $this->render('login', [
            'model' => $model,
        ]);
        
    }
    //
    public function actionLogout() {
        Yii::$app->user->logout();
        return $this->redirect(['/user/login']);
    }
    //
    public function actionSendEmail()
    {
        $model = new SendEmailForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                if ($model->sendEmail()) {
                    Yii::$app->session->setFlash('warning');
                    return $this->refresh();
                } else {
                    Yii::$app->session->setFlash('error');
                    return $this->refresh();
                }
            }
        }

        return $this->render('send-email', [
            'model' => $model,
        ]);
    }
    //
    public function actionResetPassword($key)
    {
        try {
            $model = new ResetPasswordForm($key);
        } catch (InvalidParamException $exc) {
            throw new BadRequestHttpException($exc->getMessage());
        }
        //
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() && $model->resetPassword()) {
                Yii::$app->session->setFlash('warning');
                $this->refresh();
            }
        }
        //
        return $this->render('reset-password', [
            'model' => $model,
        ]);
    }
}
