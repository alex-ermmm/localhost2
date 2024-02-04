<?php

namespace Core;

use App\Controller\User;

class Application
{
    /**
     * @var AbstractController
     */
    private $route;

    private $controller;
    private $actionName;

    public function __construct()
    {
        $this->route = new Route();
    }

    public function run()
    {

        try {
            $this->AddRoutes();
            $this->initController();
            $this->initAction();

            $view = new View();
            $this->controller->setView($view);

            $content = $this->controller->{$this->actionName}();
            echo $content;

        } catch (RedirectException $e) {
            header('Location: ' . $e->getUrl());
        } catch (RouteExeption $e) {
            header("HTTP/1.0 404 Not Found");
            echo $e->getMessage();
        }

    }

    private function AddRoutes()
    {
        /** @uses// \App\Controller\User::loginAction() */
        $this->route->addRoute('/user/go', User::class, 'login');

        /** @uses //\App\Controller\User::regAction() */
//$this->route->addRoute('/user/reg', \App\Controller\User::class, 'reg');

        /** @uses //\App\Controller\Blog::indexAction() */
//$this->route->addRoute('/blog', \App\Controller\Blog::class, 'indexAction ');
//$this->route->addRoute('/blog/index', \App\Controller\Blog::class, 'indexAction');
    }

    private function initController()
    {
        $controllerName = $this->route->getControllerName();

        if (!class_exists($controllerName)) {
            throw new RouteExeption('Cant not finf controller ' . $controllerName);
        }

        $this->controller = new $controllerName();
    }

    private function initAction()
    {

        $actionName = $this->route->getActionName();

        if (!method_exists($this->controller, $actionName)) {
            throw new RouteExeption(' Action ' . $actionName . ' not foun in ' . get_class($this->controller));
        }

        $this->actionName = $actionName;
    }

}