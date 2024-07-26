<?php
namespace app\controllers;
use app\core\Controller;
use app\core\Validate;
class LoginController extends Controller{
    public $user_model;
    private $rules = [
        'email' => ['required' => true, 'email' => true],
        'password' => ['required' => true, 'min' => 6, 'max' => 20]
    ];
    public function __construct() {
        $this->user_model = $this->model('UserModel');
    }
    public function index() {
        $this->render('signin');
    }

    public function signin() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            $validation = new Validate();

            $validation->check($_POST, $this->rules);

            if($validation->getErrors()) {
                $data = [
                    'email' => $email,
                    'password' => $password,
                    'errors' => $validation->getErrors()
                ];

                $this->render('signin', $data);
            }else {
                $check_user = $this->checkUserLogin($email, $password);

                if(empty($check_user)) {
                    $data = $this->user_model->getUserByEmail($email);

                    $token = $this->createJWT($data);

                    setcookie("token", $token, time() + 3600, "/", "", true, true);

                    header('Location: '._WEB_ROOT.'/');
                    exit();
                }else {
                    $data = [
                        'email' => $email,
                        'password' => $password,
                        'errors' => $check_user
                    ];

                    $this->render('signin', $data);
                }
            }
        }
    }

    private function checkUserLogin($email, $password) {
        $message = '';
        $data = $this->user_model->getUserByEmail($email);

        if($data) {
            if(hash('sha256', $password) !== $data['password']) {
                $message = [
                    'password' => 'Mật khẩu không chính xác!'
                ];
            }
        }else {
            $message = [
                'email' => 'Email không tồn tại!'
            ];
        }

        return $message;
    }
}