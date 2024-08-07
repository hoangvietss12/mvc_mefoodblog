<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Validate;

class ProfileController extends Controller
{
    public $user_model;
    private $rule_avatar = [
        'avatar' => ['image' => ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'], 'maxSize' => 2048],
    ];

    private $rule_password = [
        'old_password' => ['required' => true, 'min' => 6, 'max' => 20],
        'new_password' => ['required' => true, 'min' => 6, 'max' => 20, 'notMatches' => 'old_password'],
        'confirm_password' => ['required' => true, 'matches' => 'new_password'],
    ];
    public function __construct()
    {
        $this->user_model = $this->model('UserModel');
    }
    public function index()
    {
        $data = $this->authenticateJWT();

        $this->render('profile', $data);
    }

    public function updateAvatar()
    {
        $data = $this->authenticateJWT();
        $user_data = $data['data'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                $file_tmp_path = $_FILES['avatar']['tmp_name'];
                $file_name = $_FILES['avatar']['name'];
                $file_type = $_FILES['avatar']['type'];
                $file_size = $_FILES['avatar']['size'];

                $validation = new Validate();

                $validation->check($_FILES, $this->rule_avatar);

                if ($validation->getErrors()) {
                    $data = [
                        'data' => $data['data'],
                        'errors' => $validation->getErrors()
                    ];

                    $this->render('profile', $data);
                } else {
                    global $bucket;

                    if ($user_data->user_avatar !== null) {
                        $parsed_url = parse_url($user_data->user_avatar);
                        $path = $parsed_url['path'];
                        $file_path = ltrim($path, '/');
                        $file_path = substr($file_path, stripos($file_path, 'avatars'));

                        $old_avatar = $bucket->object($file_path);
                        if ($old_avatar->exists()) {
                            $old_avatar->delete();
                        }
                    }

                    $new_image_path = 'avatars/' . basename($file_name);
                    $bucket->upload(fopen($file_tmp_path, 'r'), [
                        'name' => $new_image_path,
                    ]);

                    $status =
                        $this->user_model->updateUserById($user_data->user_id, ['profile_avatar' => $new_image_path]);

                    if ($status) {
                        $data = $this->user_model->getUserByEmail($user_data->user_email);

                        $token = $this->createJWT($data);

                        setcookie("token", $token, time() + 3600, "/", "", true, true);
                        header('Location: ' . _WEB_ROOT . '/profile');
                        exit();
                    } else {
                        $this->render('profile', $data);
                    }
                }
            } else {
                $data = [
                    'data' => $data['data'],
                    'message' => "Có lỗi khi tải ảnh lên!"
                ];

                $this->render('profile', $data);
            }
        }
    }

    public function changePassword()
    {
        $data = $this->authenticateJWT();
        $user_data = $data['data'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = trim($_POST['new_password']);

            $validation = new Validate();

            $validation->check($_POST, $this->rule_password);

            if ($validation->getErrors()) {
                $data = [
                    'data' => $data['data'],
                    'errors' => $validation->getErrors()
                ];

                $this->render('profile', $data);
            }else {
                $status = $this->user_model
                    ->updateUserById($user_data->user_id, ['password' => hash('sha256', $password)]);

                if($status) {
                    $data = [
                        'data' => $data['data'],
                        'message' => "Cập nhật mật khẩu thành công!"
                    ];
                }else {
                    $data = [
                        'data' => $data['data'],
                        'message' => "Có lỗi xảy ra! Vui lòng thử lại sau"
                    ];
                }

                $this->render('profile', $data);
            }
        }else {
            $data = [
                'data' => $data['data'],
                'message' => "Có lỗi khi tải ảnh lên!"
            ];

            $this->render('profile', $data);
        }
    }
}