<?php
namespace app\controllers;
use app\core\Controller;
class AdminController extends Controller{
    public function index() {
        $this->render('dashboard');
    }
}