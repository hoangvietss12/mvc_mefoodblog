<?php
namespace app\controllers;
use app\core\Controller;
class HomeController extends Controller{
    public $model_home;
    public function __construct() {
        
    }
    public function index() {
        $this->render('category');
    }

    public function contact() {
        $this->render('contact');
    }
}