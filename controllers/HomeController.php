<?php
namespace app\controllers;
use app\core\Controller;
class HomeController extends Controller{
    public $home_model;
    public function __construct() {
        $this->home_model = $this->model('HomeModel');
    }
    public function index() {
        $data = [];
        
        if(isset($_COOKIE['token'])) {
            $data = $this->authenticateJWT();
        }

        $this->render('home', $data);
    }

    public function contact() {
        $this->render('contact');
    }

    public function about() {
        $this->render('about');
    }

    public function logout() {
        if(isset($_COOKIE['token'])) {
            setcookie('token', '', time() - 3600, "/", "", true, true);
        }

        session_unset();
        session_destroy();

        header('Location: '._WEB_ROOT.'/login');
        exit();
    }
}