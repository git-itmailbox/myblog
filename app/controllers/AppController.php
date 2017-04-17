<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 02.03.17
 * Time: 16:56
 */

namespace app\controllers;
use vendor\libs\Auth;

class AppController extends \vendor\core\base\Controller
{


    public function __construct($route)
    {
        parent::__construct($route);

        $this->user = Auth::run();

        self::setAuth($this->user);
    }

    public function loginAction()
    {

        $this->user = Auth::run();
        if ($_SERVER['REQUEST_METHOD'] == "POST" && !($this->user)) {
            $this->set(['error' => "Wrong login/password"]);
        }

        if ($this->user !== false)
            header("Location:  /");
    }

    public function logoutAction()
    {
        $this->user = Auth::clearAuthCookie();

        header("Location:  /");
    }


}