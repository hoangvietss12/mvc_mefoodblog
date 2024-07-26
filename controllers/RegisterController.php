<?php
namespace app\controllers;
use app\core\Controller;
use app\core\Validate;
class RegisterController extends Controller{
    public $user_model;
    // Thêm rule regex
    private $rules = [
        'fullname' => ['required' => true, 'min' => 5, 'max' => 50],
        'username' => ['required' => true, 'min' => 5, 'max' => 20],
        'email' => ['required' => true, 'email' => true],
        'password' => ['required' => true, 'min' => 6, 'max' => 20],
        'confirm_password' => ['required' => true, 'matches' => 'password']
    ];
    public function __construct() {
        $this->user_model = $this->model('UserModel');
    }
    public function index() {
        $this->render('signup');
    }
    
    public function signup() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullName = trim($_POST['fullname']);
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            $validation = new Validate();

            $validation->check($_POST, $this->rules);

            if ($validation->getErrors()) {
                $data = [
                    'fullname' => $fullName,
                    'username' => $username,
                    'email' => $email,
                    'password' => $password,
                    'errors' => $validation->getErrors()
                ];

                $this->render('signup', $data);
            }else {
                $check_register = $this->checkUserRegister($username, $email);

                if($check_register !== '') {
                    $data = [
                        'fullname' => $fullName,
                        'username' => $username,
                        'email' => $email,
                        'password' => $password,
                        'errors' => $check_register
                    ];

                    $this->render('signup', $data);
                }

                $status = $this->user_model->create([
                    'name' => $fullName,
                    'username' => $username,
                    'email' => $email,
                    'password' => hash('sha256', $password)
                ]);

                if($status) {
                    header('Location: '._WEB_ROOT.'/login');
                    exit();
                }else {
                    $this->render('signup', ['message' => 'Có lỗi xảy ra! Vui lòng thử lại sau']);
                }
            }
        }
    }

    private function checkUserRegister($username, $email) {
        $message = '';
        $check_username = $this->user_model->getUserByUsername($username);
        $check_email = $this->user_model->getUserByEmail($email);

        if($check_email && $check_username) {
            $message = [
                'username' => 'Tên đăng nhập đã tồn tại!',
                'email' => 'Email đã tồn tại!'
            ];
        }else if($check_email) {
            $message = [
                'email' => 'Email đã tồn tại!'
            ];
        }else if($check_username) {
            $message = [
                'username' => 'Tên đăng nhập đã tồn tại!'
            ];
        }

        return $message;
    }
}