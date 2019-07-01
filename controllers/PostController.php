<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\helpers\Url;

use app\models\Post;
use app\models\PostForm;

class PostController extends Controller{

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
	$query = Post::find();
    $post = $query->orderBy('idpost')->all();

        return $this->render('index', ['post'=>$post]);
    }

    public function actionAdd(){
        $forms = new PostForm();
        if ($forms->load(Yii::$app->request->post()) && $forms->validate()){
            $request = Yii::$app->request;

            $post = new Post();
            $post->idpost = null;
            $post->title = $request->post('PostForm')['title'];
            $post->content = $request->post('PostForm')['content'];
            $post->date = date("Y-m-d H:i:s");
            $post->username = 'admin';
            $post->save();

            return $this->redirect(Url::to(['post/index']));
        }else{
            //$akun = Akun::find()->select(['name', 'username'])->indexBy('username')->column();

            return $this->render('add', ['forms'=>$forms]);

        }
    }

    public function actionDetail($id){
        $post = Post::findOne(['idpost'=>$id]);
        return $this->render('detail', ['post'=>$post]);
    }

    public function actionEdit($id){
        $forms = new PostForm();
        if ($forms->load(Yii::$app->request->post()) && $forms->validate()){
            $request = Yii::$app->request;

            $post = Post::findOne(['idpost', $id]);
            $post->title = $request->post('PostForm')['title'];
            $post->content = $request->post('PostForm')['content'];
            $post->date = date("Y-m-d H:i:s");
            $post->username = 'admin';
            $post->save();

            return $this->redirect(Url::to(['post/detail', 'id'=>$id]));
        }else{
            $post = Post::findOne(['idpost', $id]);

            return $this->render('edit', ['forms'=>$forms, 'post'=>$post]);
        }
    }

    public function actionDelete($id){
        $post = Post::findOne(['idpost' => $id]);
        $post->delete();

        return $this->redirect(Url::to(['post/index']));
    }

    public function actionDeleteAll(){
        Akun::deleteAll();
        return $this->redirect(Url::to(['post/index']));
    }


    }