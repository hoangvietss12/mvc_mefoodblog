<?php
namespace app\controllers;
use app\core\Controller;
use app\core\Validate;
class CategoryController extends Controller{
    public $category_model;
    public $validation;
    public $data;
    public $data_query;
    private $rules = [
        'name' => ['required' => true, 'max' => 255]
    ];
    public function __construct() {
        $this->category_model = $this->model('CategoryModel');
        $this->data = $this->authenticateJWT();
        $this->validation = new Validate();
    }
    public function index() {
        $data = $this->getData();

        $this->render('category/index', $data);
    }

    public function create() {
        $data = $this->getData();

        $this->render('category/create', $data);
    }

    public function edit() {
        $params = $this->data_query;

        $data = [
            'data' => $this->data['data'],
            'categories' => $this->category_model->getParentCategory(),
            'category' => $this->category_model->getCategoryById(intval($params['id']))
        ];

        $this->render('category/edit', $data);
    }

    public function store() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $category_name = trim($_POST['name']);
            $category_parent = $_POST['parent_category'] ?? null;

            $this->validation->check($_POST, $this->rules);

            if ($this->validation->getErrors()) {
                $data = $this->getData();

                $this->render('category/create', $data);
                exit();
            }else {
                    $status = $this->category_model
                        ->create(['name' => $category_name, 'parent_id' => $category_parent]);

                    if($status) {
                        $data = $this->getData('Thêm danh mục bài viết thành công!');
                    }
            }
        }else {
            $data = $this->getData('Có lỗi xảy ra khi thêm mới! Vui lòng thử lại sau');
        }

        $this->render('category/index', $data);
    }

    public function update() {
        $params = $this->data_query;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $category_name = trim($_POST['name']);
            $category_parent = $_POST['parent_category'] ?? null;

            $this->validation->check($_POST, $this->rules);

            if ($this->validation->getErrors()) {
                $data = $this->getData();

                $this->render('category/edit', $data);
                exit();
            }else {
                    $status = $this->category_model
                        ->updateCategoryById(intval($params['id']), ['name' => $category_name, 'parent_id' => $category_parent]);

                    if($status) {
                        $data = $this->getData('Sửa danh mục bài viết thành công!');
                    }
            }
        }else {
            $data = $this->getData('Có lỗi xảy ra khi sửa! Vui lòng thử lại sau');
        }

        $this->render('category/index', $data);
    }

    public function search() {
        if($_SERVER['REQUEST_METHOD'] === 'GET') {
            $category_name = trim($_GET['category_name']);

            $status = $this->category_model->getCategoriesByName($category_name);

            $data = [
                'data' => $this->data['data'],
                'categories' => $status,
            ];
        }

        $this->render('category/index', $data);
    }

    public function delete() {
        $params = $this->data_query;

        $status = $this->category_model->deleteCategoryById(intval($params['id']));

        if($status) {
            $data = $this->getData('Xóa danh mục bài viết thành công!');
        }else {
            $data = $this->getData('Có lỗi xảy ra khi xóa! Vui lòng thử lại sau');
        }

        $this->render('category/index', $data);
    }

    private function getData($message=null) {
        return [
            'data' => $this->data['data'],
            'categories' => $this->category_model->getCategories(),
            'message' => $message,
            'errors' => $this->validation->getErrors()
        ];
    }
}