<?php

namespace app\controllers;
use app\models\Post;
use yii\web\HttpException;

/**
 * Description of PostController
 *
 * @author Andrey
 */
class PostController extends AppController{
    
    public function actionIndex() {
//        $posts = Post::find()->select('id, title, excerpt')->orderBy('id DESC')->all();
        
        $query = Post::find()->select('id, title, excerpt')->orderBy('id DESC');
        $pages = new \yii\data\Pagination(['totalCount' => $query->count(), 'pageSize' => 2, 'pageSizeParam' => false, 'forcePageParam' => false]);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();
        
//        $this->debug($posts);
//        т debug($posts);
        return $this->render('index', compact('posts', 'pages'));
    }


    public function actionView() {
        $id = \Yii::$app->request->get('id');
        $post = Post::findOne($id);
        if(empty($post)){
            throw new HttpException(404, 'Такой страницы нет...');
        }
        return $this->render('view', compact('post'));
    }

    public function actionTest() {
        return $this->render('test');
    }
    
    public function actionHello() {
        return $this->render('hello');
    }

    public function actionHello2() {
        return $this->render('hello2');
    }
    
}
