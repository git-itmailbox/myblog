<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 02.03.17
 * Time: 2:25
 */

namespace vendor\core\base;


abstract class Controller
{
    /**
     * current route and params (controller, action, params)
     * @var array
     */
    protected $route = [];

    /**
     * current view
     * @var string
     */
    public $view;


    /**
     * current layout
     * @var string
     */
    public $layout;

    /**
     * params
     * @var array
     */
    protected $vars = [];

    /**
     * auth user
     * @var User
     */
    protected $user;


    public function __construct($route)
    {
        $this->route = $route;
        $this->view = $route['action'];
    }

    public function getView()
    {
        $viewObj = new View( $this->route, $this->layout, $this->view  );
        $viewObj->render($this->vars, $this->user);
    }

    public function set($vars)
    {
        $this->vars=$vars;
    }

    public function setAuth($user)
    {
        $this->user=$user;
    }
}