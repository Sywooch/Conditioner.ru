<?php


namespace app\models;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "system_photo_catalog".
 *
 * @property integer $id_catalog
 * @property string $name
 * @property string $description
 * @property string $hide
 */
class SystemPhotoCatalog extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'system_photo_catalog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'hide'], 'required'],
            [['name', 'description', 'hide'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_catalog' => '№ Каталога',
            'name' => 'Название',
            'description' => 'Описание',
            'hide' => 'Скрыт?',
        ];
    }
}
