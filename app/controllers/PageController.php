<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 02.03.17
 * Time: 2:38
 */

namespace app\controllers;

class PageController extends AppController
{
    public function viewAction()
    {
        echo "Page::view";
        debug($this->route);
    }
    public function testAction()
    {
        debug($this->route);
        echo "<BR>";
        var_dump($this->route['params']);
//        debug($_GET);
//        echo "<BR>";
//        echo "Page::test";
//        echo "<BR>";
    }
}