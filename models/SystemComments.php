<?php


namespace app\models;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "system_comments".
 *
 * @property integer $id_position
 * @property string $name
 * @property string $phone
 * @property string $city
 * @property string $comment
 * @property string $answer
 * @property string $put_date
 * @property string $hide
 */
class SystemComments extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'system_comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'comment', 'put_date', 'hide'], 'required'],
            [['name', 'phone', 'city', 'comment', 'answer', 'hide'], 'string'],
            [['put_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_position' => '№ Коментария',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'city' => 'Город',
            'comment' => 'Коментарий',
            'answer' => 'Ответ администратора',
            'put_date' => 'Дата',
            'hide' => 'Скрыт?',
        ];
    }
}
