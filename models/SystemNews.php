<?php


namespace app\models;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "system_news".
 *
 * @property integer $id_news
 * @property string $name
 * @property string $body
 * @property string $put_date
 * @property string $hide
 */
class SystemNews extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'system_news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'body', 'put_date', 'hide'], 'required'],
            [['body', 'hide'], 'string'],
            [['put_date'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_news' => '№ Новости',
            'name' => 'Название',
            'body' => 'Содержание',
            'put_date' => 'Дата',
            'hide' => 'Скрыть?',
        ];
    }
}
