<?php
namespace app\controllers;

/**
 * Created by PhpStorm.
 * User: yura
 * Date: 02.03.17
 * Time: 1:22
 */
class MainController extends AppController
{
    public $layout = 'main';
//    public $layout = false;


    public function indexAction()
    {
//        $this->layout = 'main';
//        $this->view = 'test';
//        echo "Main Controller index action";
//        echo json_encode(['1'=>'index without layout']);

        $name = "Yura";
        $this->set(['name'=>$name, 'another_var'=>'hello']);

    }

    public function testAction()
    {
//        echo "Main Controller test action";
    }

}