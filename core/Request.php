<?php
namespace app\core;
class Request {
    public function getPath() {
        $web_path = $_SERVER['REQUEST_URI'];
    
        $web_path = str_replace('/mvc_mefoodblog/public', '', $web_path);

        return $web_path;
    }
}