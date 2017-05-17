<?php


namespace app\models;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "system_about".
 *
 * @property integer $id_about
 * @property string $name
 * @property string $info
 * @property string $description
 * @property string $keywords
 * @property string $hide
 */
class SystemAbout extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'system_about';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'info', 'description', 'keywords', 'hide'], 'required'],
            [['name', 'info', 'description', 'keywords', 'hide'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_about' => '№',
            'name' => 'Название',
            'info' => 'Информация',
            'description' => 'Описание',
            'keywords' => 'Ключевые слова',
            'hide' => 'Скрыт?',
        ];
    }
}
