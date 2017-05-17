<?php


namespace app\models;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "system_comments_news".
 *
 * @property integer $id_position
 * @property string $name
 * @property string $comment
 * @property string $answer
 * @property string $put_date
 * @property string $hide
 * @property integer $id_news
 */
class SystemCommentsNews extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'system_comments_news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'comment', 'put_date', 'hide', 'id_news'], 'required'],
            [['name', 'comment', 'answer', 'hide'], 'string'],
            [['put_date'], 'safe'],
            [['id_news'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_news' => '№ Новости',
            'id_position' => '№ Коментария',
            'name' => 'Имя',
            'comment' => 'Коментарий',
            'answer' => 'Ответ администратора',
            'put_date' => 'Дата',
            'hide' => 'Скрыть?',
        ];
    }
}
