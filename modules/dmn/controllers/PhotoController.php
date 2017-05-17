<?php

namespace app\modules\dmn\controllers;

use Yii;
use app\models\SystemPhotoPosition;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use app\models\SystemPhotoCatalog;
use yii\web\UploadedFile;
use Imagine\Image\Box;
use yii\imagine\Image;


/**
 * PhotoController implements the CRUD actions for SystemPhotoPosition model.
 */
class PhotoController extends DefaultController
{
    /**
     * Lists all SystemPhotoPosition models.
     * @return mixed
     */
    public function actionIndex()
    {
        //Получаем ИД каталога в котором фотографии модели SystemPhotoCatalog
        $id_catalog = Yii::$app->request->get('id');
        //Выбираем название каталога для вида, чтоб пользователь понимал в какой категории он находиться
        //Используеться также в хлебных крошках
        $catalog = SystemPhotoCatalog::findBySql('SELECT name FROM system_photo_catalog WHERE id_catalog = ' . $id_catalog)->all();
        foreach ($catalog as $catalog_name) {
            $name = $catalog_name->name;
        }
        $dataProvider = new ActiveDataProvider([
            //Получаем все фотографии для каталога с которого перешли
            'query' => SystemPhotoPosition::find()->where(['id_catalog' => $id_catalog]),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        //Передаем все в вид
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'id_catalog' => $id_catalog,
            'catalog' => $name,
        ]);
    }

    /**
     * Displays a single SystemPhotoPosition model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SystemPhotoPosition model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        //Получаем ИД каталога в котором фотографии модели SystemPhotoCatalog
        $id_catalog = Yii::$app->request->get('id');
        $model = new SystemPhotoPosition();
        //
        if ($model->load(Yii::$app->request->post())) {
            //
            $model->image = UploadedFile::getInstance($model, 'image');
            $file = $this->_saveImage($model->image->tempName);
            //
            $model->img_big = $file;
            $model->img_small = 's_' . $file;
            if($model->save())
                return $this->redirect(['view', 'id' => $model->id_position]);
            else
                throw new NotFoundHttpException('Что-то произошло не так как ожидалось.');
        } else {
            return $this->render('create', [
                'model' => $model,
                'id_catalog' => $id_catalog,
            ]);
        }
    }

    /**
     * Updates an existing SystemPhotoPosition model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            //
            $image = $model->image = UploadedFile::getInstance($model, 'image');
            //
            if (empty($image)):
                $model->save();
                return $this->redirect(['view', 'id' => $model->id_position]);
            else:
                //
                $file = $this->_saveImage($image->tempName);
                $img_small = Yii::getAlias('@webroot/images/' . $model->img_small);
                $img_big = Yii::getAlias('@webroot/images/' . $model->img_big);
                //
                if(file_exists($img_small))
                    @unlink($img_small);
                if(file_exists($img_big))
                    @unlink($img_big);
                //
                $model->img_big = $file;
                $model->img_small = 's_' . $file;
                if($model->save())
                    return $this->redirect(['view', 'id' => $model->id_position]);
                else
                    throw new NotFoundHttpException('Что-то произошло не так как ожидалось.');
            endif;
        //
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SystemPhotoPosition model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $id_catalog = $model->id_catalog;
        $img_small = Yii::getAlias('@webroot/images/' . $model->img_small);
        $img_big = Yii::getAlias('@webroot/images/' . $model->img_big);

        if(file_exists($img_small))
            @unlink($img_small);
        if(file_exists($img_big))
            @unlink($img_big);

        $this->findModel($id)->delete();

        return $this->redirect(['index', 'id' => $id_catalog]);
    }

    /**
     * Finds the SystemPhotoPosition model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SystemPhotoPosition the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SystemPhotoPosition::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Запрашиваемая страница не найдена.');
        }
    }
    //Метод генерации имени картинки и изменение размера
    private function _saveImage($file, $prefix = NULL, $ext = NULL) {
        /*
            use Yii;
            use yii\imagine\Image;
            use Imagine\Image\Box;
        */
        //разрешение и префикс
        if($ext == NULL)
            $ext = 'jpeg';
        if($prefix == NULL)
            $prefix = 'photo-';
        $rand_name = 'qwertyuiopasdfghjklzxcvbnm';
        $filename = '';
        for($i = 0; $i < 5; $i++){
            $filename .= rand(1, strlen($rand_name));
        }
        //Открываем переданный нам файл
        $image = Image::getImagine()->open($file);
        //Получаем его размер, текущий
        $size = $image->getSize();
        //Получакм текущие ширину и высоту файла
        $ratio = $size->getWidth()/$size->getHeight();
        //
        $width = 1024;
        $height = round($width/$ratio);
        //
        $box = new Box($width, $height);
        //Изменение размера      //Сохранение в папку
        $image->resize($box)->save(Yii::getAlias('@webroot/images/' . $prefix . $filename . '.' . $ext));
        //
        $box = new Box(460, 180);
        $image->resize($box)->save(Yii::getAlias('@webroot/images/s_' . $prefix . $filename . '.' . $ext));
        //Возвращаем название для записи в БД
        return $prefix.$filename.'.'.$ext;
        /*
        //Обрезка изображения
        //Изменение размера
        $image = Image::thumbnail($file, 1024, 768)//Сохранение в папку
                ->save(Yii::getAlias('@webroot/images/' . $prefix . $filename . '.' . $ext));
        $image = Image::thumbnail($file, 460, 180)//Сохранение в папку
                ->save(Yii::getAlias('@webroot/images/s_' . $prefix . $filename . '.' . $ext));
        return $prefix.$filename.'.'.$ext;
        */
    }
}
