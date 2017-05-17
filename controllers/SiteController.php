<?php

namespace app\controllers;

class SiteController extends BaseController
{

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionClosed()
    {
        return $this->render('closed');
    }
}
