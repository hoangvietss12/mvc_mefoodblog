<?php
namespace app\core;
class Request {
    public function getPath() {
        $web_path = $_SERVER['REQUEST_URI'];
    
        if(strpos($web_path, 'admin')) {
            $web_path = str_replace('/mvc_mefoodblog', '', $web_path);
        }else {
            $web_path = str_replace('/mvc_mefoodblog/public', '', $web_path);
        }

        return $web_path;
    }
}