<?php
include_once (_DIR_ROOT . '/views/admin/layouts/header.php');
include_once (_DIR_ROOT . '/views/admin/components/sidebar.php');
include_once (_DIR_ROOT . '/views/admin/components/navbar.php');
?>

<div class="container">
    <h1 class="my-4">Thêm danh mục bài viết</h1>

    <form action="<?php echo _WEB_ROOT_ADMIN . '/admin/category/store' ?>" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Tên danh mục:</label>
            <input type="text" class="form-control" id="name" aria-describedby="Category Name" name="name">
            <div id="" class="form-text text-danger">
                <?php echo $errors['name'] ?? ''; ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Danh mục cha:</label>
            <select class="form-select" aria-label="Default select example" name="parent_category">
                <option selected disabled>Chọn danh mục</option>
                <?php foreach($categories as $category) :?>
                    <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Tạo</button>
    </form>

    <a class="btn btn-primary mt-3" href="<?php echo _WEB_ROOT_ADMIN . '/admin/category'; ?>">Quay lại</a>
</div>

<script src="/mvc_mefoodblog/public/admin/js/app.js"></script>