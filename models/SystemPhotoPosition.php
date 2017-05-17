<?php



namespace app\models;

use yii\db\ActiveRecord;
/**
 * This is the model class for table "system_photo_position".
 *
 * @property integer $id_position
 * @property string $name
 * @property string $alt
 * @property string $img_small
 * @property string $img_big
 * @property string $hide
 * @property integer $id_catalog
 */
class SystemPhotoPosition extends ActiveRecord
{
    public $image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'system_photo_position';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'alt', 'img_small', 'img_big', 'hide', 'id_catalog'], 'required'],
            [['name', 'alt', 'img_small', 'img_big', 'hide'], 'string'],
            [['id_catalog'], 'integer'],
            [['image'], 'image', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_position' => '№ Позиции',
            'name' => 'Название',
            'alt' => 'Альтернативный текст',
            'img_small' => 'Маленькое из.',
            'img_big' => 'Большое из.',
            'hide' => 'Скрыто?',
            'image' => 'Картинка',
            'id_catalog' => '№ Каталога',
        ];
    }
}
