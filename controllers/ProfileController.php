<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Validate;

class ProfileController extends Controller
{
    public $user_model;
    public $data;
    private $rule_avatar = [
        'avatar' => ['image' => ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'], 'maxSize' => 2048],
    ];

    private $rule_password = [
        'old_password' => ['required' => true, 'min' => 6, 'max' => 20],
        'new_password' => ['required' => true, 'min' => 6, 'max' => 20, 'notMatches' => 'old_password'],
        'confirm_password' => ['required' => true, 'matches' => 'new_password'],
    ];
    private $rule_profile = [
        'fullname' => ['required' => true, 'min' => 5, 'max' => 50],
        'username' => ['required' => true, 'min' => 5, 'max' => 20],
    ];
    public function __construct()
    {
        $this->user_model = $this->model('UserModel');
        $this->data = $this->authenticateJWT();
    }
    public function index()
    {
        $this->render('profile', $this->data);
    }
    public function updateProfile() {
        $this->render('update-profile', $this->data);
    }
    public function updateInformation() {
        $user_data = $this->data['data'];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullName = trim($_POST['fullname']);
            $username = trim($_POST['username']);

            $validation = new Validate();

            $validation->check($_POST, $this->rule_profile);

            if ($validation->getErrors()) {
                $data = [
                    'data' => $this->data['data'],
                    'errors' => $validation->getErrors()
                ];
            }else {
                $status = $this->user_model
                    ->updateUserById($user_data->user_id, ['name' => $fullName, 'username' => $username]);

                if($status) {
                    $data = $this->user_model->getUserByEmail($user_data->user_email);

                    $token = $this->createJWT($data);

                    setcookie("token", $token, time() + 3600, "/", "", true, true);
                    header('Location: ' . _WEB_ROOT . '/profile');
                    exit();
                }else {
                    $data = $this->getDataMessage("Có lỗi xảy ra! Vui lòng thử lại sau");
                }
            }
        }else {
            $data = $this->getDataMessage("Có lỗi khi cập nhật thông tin!");
        }

        $this->render('update-profile', $data);
    }

    public function updateAvatar() {
        $user_data = $this->data['data'];

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
                        'data' => $this->data['data'],
                        'errors' => $validation->getErrors()
                    ];
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
                        $data = $this->getDataMessage("Có lỗi xảy ra! Vui lòng thử lại sau");
                    }
                }
            } else {
                $data = $this->getDataMessage("Có lỗi khi tải ảnh lên!");
            }

            $this->render('profile', $data);
        }
    }

    public function changePassword() {
        $user_data = $this->data['data'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = trim($_POST['new_password']);

            $validation = new Validate();

            $validation->check($_POST, $this->rule_password);

            if ($validation->getErrors()) {
                $data = [
                    'data' => $this->data['data'],
                    'errors' => $validation->getErrors()
                ];
            }else {
                $status = $this->user_model
                    ->updateUserById($user_data->user_id, ['password' => hash('sha256', $password)]);

                if($status) {
                    $data = $this->getDataMessage("Cập nhật mật khẩu thành công!");
                }else {
                    $data = $this->getDataMessage("Có lỗi xảy ra! Vui lòng thử lại sau");
                }
            }
        }else {
            $data = $this->getDataMessage("Có lỗi khi cập nhật mật khẩu!");
        }
        
        $this->render('profile', $data);
    }

    private function getDataMessage($message) {
        return [
            'data' => $this->data['data'],
            'message' => $message
        ];
    }
}