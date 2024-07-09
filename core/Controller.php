<?php
namespace app\core;
class Controller{
    public function model($model) {
        if(file_exists(_DIR_ROOT.'/models/'.$model.'.php')){
            require_once _DIR_ROOT.'/models/'.$model.'.php';
            if(class_exists($model)) {
                $model = new $model();
                return $model;
            }
        }

        return false;
    }

    public function render($view, $data=[]) {
        extract($data);
        
        if(file_exists(_DIR_ROOT.'/views/'.$view.'.php') || file_exists(_DIR_ROOT.'/admin/pages/'.$view.'.php')) {
            $page = _DIR_ROOT.'/views/'.$view.'.php' ?? _DIR_ROOT.'/admin/pages/'.$view.'.php';
            require_once $page;
        }
    }
}