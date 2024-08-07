<?php
namespace app\core;
use app\controllers\Home;
class Router {
    public Request $request;
    public Controller $controller;
    private $controller_name;
    private $method;
    public function __construct($request) {
        $this->request = $request;
    }

    public function resolve() {
        $path = $this->request->getPath();

        
        if($path !== "/") {
            $path_arr = explode('/', $path);

            $this->controller_name = ucfirst($path_arr[1]).'Controller';
            if(count($path_arr) > 2) {
                if(strpos($path_arr[2], '-')) {
                    $action_name = str_replace('-', ' ', $path_arr[2]);
                    $action_name = str_replace(' ', '', ucwords($action_name));
                    $action_name = lcfirst($action_name);
                }

                $this->method = $action_name ?? $path_arr[2];
            }else {
                $this->method = 'index';
            }
        }else {
            $this->controller_name = 'HomeController';
            $this->method = 'index';
        }
        
        // Định nghĩa namespace
        $controller_namespace = 'app\\controllers\\' . $this->controller_name;
        $method = $this->method;

        if(class_exists($controller_namespace)) {
            $controller_object = new $controller_namespace;
            if(method_exists($controller_object, $method)) {
                $controller_object->$method();
            }else {
                $this->load404Page();
            }
        }else {
            $this->load404Page();
        }
    }

    private function load404Page() {
        require_once _DIR_ROOT.'/views/404.php';
    }
}