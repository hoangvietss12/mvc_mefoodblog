<?php
namespace app\core;

class App{
    private $_controller = 'home';
    private $_action = 'index';
    public Router $router;
    public Request $request;

    public function __construct(){
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run() {
        $this->router->resolve();
    }
}