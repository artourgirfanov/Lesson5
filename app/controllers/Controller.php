<?php

namespace app\controllers;

use app\services\RenderI;
use app\services\RenderServices;

abstract class Controller
{
    protected $actionDefault = 'all';
    /**
     * @var RenderServices
     */
    protected $renderer;

    /**
     * Controller constructor.
     * @param $renderer
     */
    public function __construct(RenderI $renderer)
    {
        $this->renderer = $renderer;
    }

    public function run($action)
    {
        if (empty($action)) {
            $action = $this->actionDefault;
        }

        $action .= "Action";

        if (!method_exists($this, $action)) {
            return '404';
        }

        return $this->$action();
    }

    protected function getId()
    {
        if (empty($_GET['id'])) {
            return 0;
        }

        return (int)$_GET['id'];
    }
}