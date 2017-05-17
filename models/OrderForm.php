<?php


namespace app\models;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "system_contact".
 *
 * @property integer $id_contact
 * @property string $name
 * @property string $phone
 * @property string $subject
 * @property string $message
 * @property string $comment
 * @property string $put_date
 * @property string $status
 */
class OrderForm extends ActiveRecord
{
    public $verifyCode;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'system_orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'subject', 'put_date'], 'required'],
            [['name', 'phone', 'subject', 'message', 'comment', 'hide'], 'string'],
            [['put_date'], 'safe'],
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'phone' => 'Телефон',
            'subject' => 'Услуга?',
            'message' => 'Сообщение',
            'put_date' => 'Дата/Время заказа',
            'hide' => 'Статус',
            'verifyCode' => 'Проверочный код',
        ];
    }
}
