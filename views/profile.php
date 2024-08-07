<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Foodeiblog Template">
    <meta name="keywords" content="Foodeiblog, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MeFood Blog</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Unna:400,700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/mvc_mefoodblog/public/img/favicon32x32.png" type="image/x-icon">

    <!-- Css Styles -->
    <link rel="stylesheet" href="/mvc_mefoodblog/public/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/mvc_mefoodblog/public/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/mvc_mefoodblog/public/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/mvc_mefoodblog/public/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/mvc_mefoodblog/public/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/mvc_mefoodblog/public/css/style.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" href="/mvc_mefoodblog/public/css/responsive.css?v=<?php echo time(); ?>" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
</head>
<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="<?php echo _WEB_ROOT . '/'; ?>"><img src="/mvc_mefoodblog/public/img/humberger/logo.png"
                    alt=""></a>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li><a href="<?php echo _WEB_ROOT . '/'; ?>">Trang chủ</a></li>
                <li><a href="#">Công thức</a></li>
                <li><a href="#">Thực đơn</a></li>
                <li><a href="<?php echo _WEB_ROOT . '/home/about'; ?>">Về chúng tôi</a></li>
                <li><a href="<?php echo _WEB_ROOT . '/home/contact'; ?>">Liên hệ</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="humberger__menu__about">
            <div class="humberger__menu__title sidebar__item__title">
                <h6>Xin chào các bạn,</h6>
            </div>
            <img src="img/humberger/humberger-about.jpg" alt="">
            <p>Tôi là Việt Hoàng, chủ nhân của blog ẩm thực MeFood. Niềm đam mê nấu nướng và khám phá ẩm thực đã thôi
                thúc tôi tạo nên blog này để mọi người đều có thể chia sẻ những trải nghiệm và kiến thức ẩm thực của
                mình.</p>
            <div class="humberger__menu__about__social sidebar__item__follow__links">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-youtube-play"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-envelope-o"></i></a>
            </div>
        </div>
        <div class="humberger__menu__subscribe">
            <div class="humberger__menu__title sidebar__item__title">
                <h6>Subscribe</h6>
            </div>
            <p>Đăng ký nhận bản tin của chúng tôi và nhận thông tin cập nhật mới nhất của chúng tôi ngay trong hộp thư
                đến của bạn.</p>
            <form action="#">
                <input type="text" class="email-input" placeholder="Email của bạn">
                <label for="agree-check">
                    Tôi đồng ý với các Điều khoản & Điều kiện
                    <input type="checkbox" id="agree-check">
                    <span class="checkmark"></span>
                </label>
                <button type="submit" class="site-btn">Subscribe</button>
            </form>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-1 col-6 order-md-1 order-1">
                        <div class="header__humberger">
                            <i class="fa fa-bars humberger__open"></i>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-10 order-md-2 order-3">
                        <nav class="header__menu">
                            <ul>
                                <li class="active"><a href="<?php echo _WEB_ROOT . '/'; ?>">Trang chủ</a></li>
                                <li><a href="#">Công thức</a></li>
                                <li><a href="#">Thực đơn</a></li>
                                <li><a href="<?php echo _WEB_ROOT . '/home/about'; ?>">Giới thiệu</a></li>
                                <li><a href="<?php echo _WEB_ROOT . '/home/contact'; ?>">Liên hệ</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-2 col-md-1 col-6 order-md-3 order-2">
                        <div class="header__search">
                            <i class="fa fa-search search-switch"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Tab Profile -->
    <div class="container">
        <div class="tab__profile">
            <ul class="nav nav-tabs nav-fill" id="tabProfile" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="account-tab" data-toggle="tab" href="#account" role="tab"
                        aria-controls="account" aria-selected="true">THÔNG TIN TÀI KHOẢN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts"
                        aria-selected="false">QUẢN LÝ BÀI VIẾT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="new-tab" data-toggle="tab" href="#new" role="tab" aria-controls="new"
                        aria-selected="false">TẠO BÀI VIẾT</a>
                </li>
            </ul>
            <div class="tab-content mt-4" id="tabProfileContent">
                <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                    <div class="profile__container">
                        <div class="row">
                            <div class="col-md-3 text-center d-flex flex-column align-items-center">
                                <div class="profile__avatar">
                                    <?php if ($data->user_avatar === null): ?>
                                        <img src="/mvc_mefoodblog/public/img/avatar.jpg" alt="Avatar" />
                                    <?php else: ?>
                                        <img src="<?php echo $data->user_avatar; ?>" />
                                    <?php endif; ?>
                                </div>
                                <form id="avatarForm" action="<?php echo _WEB_ROOT . '/profile/update-avatar'; ?>"
                                    method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="avatar" class="d-block profile__avatar-btn">Đổi avatar</label>
                                        <input type="file" class="form-control-file d-none" id="avatar" name="avatar">
                                        <span class="text-danger">
                                            <?php echo $errors['avatar'] ?? ''; ?>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-9">
                                <div class="profile__info">
                                    <h2 class="mb-3"><?php echo $data->user_fullname; ?></h2>
                                    <p><span class="label font-weight-bold">Tên đăng nhập:</span>
                                        <?php echo $data->user_name; ?></p>
                                    <p><span class="label font-weight-bold">Email:</span>
                                        <?php echo $data->user_email; ?></p>
                                    <button class="primary-btn">Cập nhật thông tin</button>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="row pt-3">
                            <div class="col-md-3">
                                <h5 class="ml-3 mb-3 font-weight-bold">Thay đổi mật khẩu</h5>
                            </div>
                            <div class="col-md-9">
                                <form action="<?php echo _WEB_ROOT . '/profile/change-password'; ?>" method="POST">
                                    <div class="form-group row">
                                        <label for="old_password" class="col-sm-3 col-form-label">Mật khẩu cũ</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="old_password"
                                                placeholder="Mật khẩu cũ">
                                            <span class="text-danger">
                                                <?php echo $errors['old_password'] ?? ''; ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="new_password" class="col-sm-3 col-form-label">Mật khẩu mới</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="new_password"
                                                placeholder="Mật khẩu mới">
                                            <span class="text-danger">
                                                <?php echo $errors['new_password'] ?? ''; ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="confirm_password" class="col-sm-3 col-form-label">Xác nhận mật khẩu
                                            mới</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="confirm_password"
                                                placeholder="Xác nhận mật khẩu mới">
                                            <span class="text-danger">
                                                <?php echo $errors['confirm_password'] ?? ''; ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="offset-md-3">
                                        <button type="submit" class="btn primary-btn">Thay đổi mật khẩu</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                    <table class="table posts__table">
                        <thead>
                            <tr>
                                <th>Danh mục</th>
                                <th>Tên bài viết</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2024-07-31 08:41:47</td>
                                <td>Bạn không thuộc nhóm đối tượng phù hợp để hoàn thành khảo sát P08_10692920 - 1339473
                                </td>
                                <td>
                                    <a href="">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="new" role="tabpanel" aria-labelledby="new-tab">
                    <form action="" class="form__posts">
                        <div class="form-group">
                            <label for="title">Tên tiêu đề:</label>
                            <input type="text" placeholder="Tiêu dề" name="title" id="title"
                                value="<?php echo $title ?? ''; ?>">
                            <span class="text-danger">
                                <?php echo $errors['title'] ?? ''; ?>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="category">Chọn danh mục:</label>
                            <select class="form-control" id="category">
                                <option>1</option>
                                <option>2</option>
                            </select>
                            <span class="text-danger">
                                <?php echo $errors['category'] ?? ''; ?>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="category">Nội dung:</label>
                            <div id="editor">
                                <h3>Viết gì đó đi...</h3>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Thêm hashtag:</label>
                            <input type="text" placeholder="Hashtag (nếu có)..." name="hashtag" id="hashtag"
                                value="<?php echo $hashtag ?? ''; ?>">
                        </div>
                        <button type="submit" class="site-btn">TẠO BÀI VIẾT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <?php
    include_once (_DIR_ROOT . '/views/components/modal.php');
    ?>

    <?php
    include_once (_DIR_ROOT . '/views/layouts/footer.php');
    ?>

    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script src="/mvc_mefoodblog/public/js/quill.js"></script>

<?php if(isset($message)): ?>
    <script>
        $(document).ready(function() {
            $('#errorModal').modal('show');
        });
    </script>
<?php endif; ?>