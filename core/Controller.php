<?php
namespace app\core;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
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

    public function createJWT($data) {
        $secret_key = $_ENV['JWT_SECRET_KEY'];
        $algorithm = $_ENV['JWT_ALGORITHM'];

        $payload = [
            'iat' => time(),
            'nbf' => time(),
            'exp' => time() + 3600,
            'data' => array(
                'user_id' => $data['id'],
                'user_fullname' => $data['name'],
                'user_name' => $data['username'],
                'user_email' => $data['email'],
                'user_avatar' => $data['profile_avatar']
            )
        ];

        return JWT::encode($payload, $secret_key, $algorithm);
    }

    public function authenticateJWT() {
        $secret_key = $_ENV['JWT_SECRET_KEY'];
        $algorithm = $_ENV['JWT_ALGORITHM'];

        if(isset($_COOKIE['token'])) {
            $token = $_COOKIE['token'];

            try {
                $decode = JWT::decode($token, new Key($secret_key, $algorithm));
                return (array) $decode;
            }catch(Exception $e){
                $this->render('signin', ['message' => 'Phiên đăng nhập hết hạn! Vui lòng đăng nhập lại']);
            }
        }else {
            header('Location: '._WEB_ROOT.'/login');
            exit();
        }
    }
}