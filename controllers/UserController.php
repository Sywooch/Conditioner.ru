<?php

namespace app\controllers;
use app\models\SystemUsers;
use app\models\RegForm;
use app\models\LoginForm;
use Yii;
use yii\helpers\Html;
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
    //Отправка Емаил, для сброса пароля!
    public function actionSendEmail()
    {
        //Создаем форму
        $model = new SendEmailForm();
        //Если нажали кнопку "Отправить"
        if ($model->load(Yii::$app->request->post())) {
            //Если ошибок нет, емеил введен коректно и найден
            if ($model->validate()) {
                //Если письмо удачно отправлено
                if ($model->sendEmail()) {
                    Yii::$app->session->setFlash('success', 'Вам было отправленно письмо с инструкциями для сброса пароля!
</br>Проверте свой email.');
                    return $this->refresh();
                } else {
                    Yii::$app->session->setFlash('error', 'Произошла ошибка! Пароль збросить нельзя!');
                    return $this->refresh();
                }
            }
        }
        //Выодим вид
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
                $link = Html::a('Войти', ['user/login']);
                Yii::$app->session->setFlash('success', 'Пароль успешно изменен! ' . $link);

                return $this->goHome();
            }
        }
        //
        return $this->render('reset-password', [
            'model' => $model,
        ]);
    }
}
