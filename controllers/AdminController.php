<?php
namespace app\controllers;
use app\core\Controller;
class AdminController extends Controller{
    public function index() {
        $data = $this->authenticateJWT();

        $this->render('dashboard', $data);
    }
}