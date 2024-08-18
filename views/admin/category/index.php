<?php
include_once (_DIR_ROOT . '/views/admin/layouts/header.php');
include_once (_DIR_ROOT . '/views/admin/components/sidebar.php');
include_once (_DIR_ROOT . '/views/admin/components/navbar.php');
?>

<div class="container">
    <?php if (isset($message)): ?>
        <div class="card mt-3 bg-info">
            <div class="card-body p-3 text-light">
                <i data-feather="alert-circle"></i>
                <?php echo $message; ?>
                <button type="button" class="btn-close float-end" aria-label="Close"></button>
            </div>
        </div>
    <?php endif; ?>

    <h1 class="my-4">Danh mục bài viết</h1>

    <div class="category__search mt-3">
        <form action="<?php echo _WEB_ROOT_ADMIN . '/admin/category/search'; ?>" method="GET">
            <input class="d-inline p-1" style="width: 350px;" type="text" class="form-control"
                placeholder="Nhập tên danh mục" name="category_name">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </form>
    </div>

    <a class="btn btn-success mb-3 float-end" href="<?php echo _WEB_ROOT_ADMIN . '/admin/category/create'; ?>">
        + Thêm
    </a>
    <?php if (!empty($categories)): ?>
        <table class="table table-hover my-0">
            <thead>
                <tr>
                    <th>STT</th>
                    <th class="d-none d-xl-table-cell">Tên danh mục</th>
                    <th class="d-none d-xl-table-cell">Danh mục cha</th>
                    <th class="d-none d-xl-table-cell">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $index => $category): ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo $category['name']; ?></td>
                        <td><?php echo $category['parent_name']; ?></td>
                        <td>
                            <a class="btn btn-warning"
                                href="<?php echo _WEB_ROOT_ADMIN . '/admin/category/edit?id=' . $category['id']; ?>">
                                <i data-feather="edit-3"></i> Sửa
                            </a>
                            <a class="btn btn-danger"
                                href="<?php echo _WEB_ROOT_ADMIN . '/admin/category/delete?id=' . $category['id']; ?>">
                                <i data-feather="trash-2"></i> Xóa
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    <?php else : ?>
        <h3 class="text-center mt-5">Không có danh mục bài viết nào</h3>
    <?php endif; ?>
</div>

<script src="/mvc_mefoodblog/public/admin/js/app.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var card = document.querySelector('.card');
        var closeButton = document.querySelector('.btn-close');

        closeButton.addEventListener('click', function () {
            card.style.display = 'none';
        });

        setTimeout(function () {
            card.style.display = 'none';
        }, 10000);
    });

</script>

</body>

</html>