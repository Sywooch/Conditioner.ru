<?php
namespace app\models;
use Yii;
use yii\base\Model;
use yii\base\InvalidParamException;

/**
 * Description of ResetPasswordForm
 *
 * @author Max
 */
class ResetPasswordForm extends Model{
    //Поля
    public $new_password;
    public $password_confirm;
    //Экземпляр класса UserRecord
    private $_user;
    //Проверка
    public function rules()
    {
        return [
            //Поля обезательны
            [['new_password', 'password_confirm'], 'required'],
            //Поле является строкой и максимум 32 симфола и минуму 6
            [['new_password', 'password_confirm'], 'string', 'max' => 32, 'min' => 6],
            //Повторение пароля должно совпадать с пароль
            ['password_confirm', 'compare', 'compareAttribute' => 'new_password'],
        ];
    }
    //Название ячеек
    public function attributeLabels()
    {
        return [
            'password_confirm' => 'Подтвердите пароль',
            'new_password' => 'Новый пароль',
        ];
    }
    //
    public function __construct($key, $config = []) {
        //Проверка на пустоту или не соответствие строке
        if (empty($key) || !is_string($key)) {
            throw new InvalidParamException('Ключ не может быть пустым!');
        }
        //Создаем экземпляр класса и ищем запись по ключу и временной метке
        $this->_user = SystemUsers::findBySecretKey($key);
        if(!$this->_user){
            throw new InvalidParamException('Ключ не верный!');
        }
        parent::__construct($config);
    }
    //Метод сброса пароля
    public function resetPassword() {
        $user = $this->_user;
        $user->setPassword($this->new_password);
        $user->removeSecretKey();
        return $user->save();
    }
}
