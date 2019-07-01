<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\helpers\Url;

use app\models\Akun;
use app\models\AkunForm;

class AkunController extends Controller{

    public function actions(){
        return ['error' => ['class' => 'yii\web\ErrorAction',],];
    }

     public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index',],
                'rules' => [
                    [
                        'actions' => ['index',],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }


   public function actionIndex(){
    $query = Akun::find()->all();

        return $this->render('index', ['akuns'=>$query]);
    }

    public function actionAdd(){
        $forms = new AkunForm();
        if ($forms->load(Yii::$app->request->post()) && $forms->validate()){
            $request = Yii::$app->request;

            $akun = new Akun();
            $akun->username = $request->post('AkunForm')['username'];
            $akun->name = $request->post('AkunForm')['name'];
            $akun->password = md5($request->post('AkunForm')['password']);
            $akun->role = $request->post('AkunForm')['role'];
            $akun->save();

            return $this->redirect(Url::to(['akun/index']));
        }else{
            //$akun = Akun::find()->select(['name', 'username'])->indexBy('username')->column();

            return $this->render('add', ['forms'=>$forms]);

        }
    }

    public function actionDetail($id){
        $akun = Akun::findOne(['username'=>$id]);
        return $this->render('detail', ['akun'=>$akun]);
    }

    public function actionEdit($id){
        $forms = new AkunForm();
        if ($forms->load(Yii::$app->request->post()) && $forms->validate()){
            $request = Yii::$app->request;

            $akun = Akun::findOne(['username', $id]);
            $akun->username = $request->post('AkunForm')['username'];
            $akun->name = $request->post('AkunForm')['name'];
            $akun->password = md5($request->post('AkunForm')['password']);
            $akun->role = $request->post('AkunForm')['role'];
            $akun->save();

            return $this->redirect(Url::to(['akun/detail', 'id'=>$id]));
        }else{
            $akun = Akun::findOne(['username', $id]);

            return $this->render('edit', ['forms'=>$forms, 'akun'=>$akun]);
        }
    }

    public function actionDelete($id){
        $akun = Akun::findOne(['username' => $id]);
        $akun->delete();

        return $this->redirect(Url::to(['akun/index']));
    }

    public function actionDeleteAll(){
        Akun::deleteAll();
        return $this->redirect(Url::to(['akun/index']));
    }
}