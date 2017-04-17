<?php
namespace app\controllers;
use app\models\Post;
use app\models\User;
use vendor\libs\UploadImage;


class MainController extends AppController
{
    public $layout = 'main';
//    public $layout = false;


    public function indexAction()
    {
        $modelPost = new Post();
        $posts = $modelPost->findAll();
        $modelUser = new User();
        $users = $modelUser->findAll();

        $this->set(['posts'=>$posts, 'authors'=>$users]);
    }

    public function createAction()
    {
        if( ! $this->user ) {
            header("Location:  /main/login");

        }
        $model = new Post();
        $errors=[];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model->title = $_POST['title'];
            $model->text = $_POST['text'];
            $model->author = $this->user->id;
            $model->logo = UploadImage::upload($_FILES['logo']);
            $errors = $model->validate();
            if (empty($errors))
            {
                if ($model->save())
                    header('Location: /');
            }
        }
        $this->set(['model' => $model, 'errors'=>$errors]);
    }

    public function viewpostAction()
    {
        $modelPost = new Post();
        $modelUser = new User();
        $postId = $this->route['postid'];
        $post = $modelPost->findOne($postId);

        $author =($post)? $modelUser->findOne($post->author) : false;

        $this->set(['post' => $post, 'author' => $author]);

    }

    private function getSearchAuthorsAsJson($searchString)
    {
        $modelUser = new User();

        $result = $modelUser->search($searchString);
        $ret = array();
        foreach($result as $row) {
            $r = array();
            $r["id"] = $row->id;
            $r["value"] = $row->login . " ( $row->l_name $row->f_name ) ";
            $ret[] = $r;
        }
        return json_encode($ret);
    }

    public function searchAuthorAction()
    {
        $this->layout = 'jsonresponse';

        $searchString = $_POST['search'];
        $data = $this->getSearchAuthorsAsJson($searchString);

        $this->set(['data' => $data]);
    }

    public function byauthorAction()
    {
        if(! isset($_POST['author_id']))
            return $this->indexAction();
        $authorId = $_POST['author_id'];
        $modelPost = new Post();
        $posts =($authorId==='')? $modelPost->findAll() : $modelPost->findAllByAuthor($authorId);

        $this->set(['posts'=>$posts]);
    }


    public function registerAction()
    {
        $modelUser = new User();
        $modelUser->fetchModel();

        $errors = $modelUser->validate();
        if(empty($errors))
        {
            if ($modelUser->save())
                header('Location: /');
        }
        $this->set(['model'=>$modelUser, 'errors'=>$errors]);

    }
}