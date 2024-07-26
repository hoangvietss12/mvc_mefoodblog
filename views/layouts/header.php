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

    <!-- Favicon -->
    <link rel="shortcut icon" href="/mvc_mefoodblog/public/img/favicon32x32.png" type="image/x-icon">

    <!-- Css Styles -->
    <link rel="stylesheet" href="/mvc_mefoodblog/public/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/mvc_mefoodblog/public/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/mvc_mefoodblog/public/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/mvc_mefoodblog/public/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/mvc_mefoodblog/public/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/mvc_mefoodblog/public/css/style.css?v=<?php echo time(); ?>" type="text/css">
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
            <a href="<?php echo _WEB_ROOT.'/'; ?>"><img src="/mvc_mefoodblog/public/img/humberger/logo.png" alt=""></a>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li><a href="<?php echo _WEB_ROOT.'/'; ?>">Trang chủ</a></li>
                <li><a href="#">Công thức</a></li>
                <li><a href="#">Thực đơn</a></li>
                <li><a href="#">Món ăn vặt</a></li>
                <li><a href="<?php echo _WEB_ROOT.'/home/about'; ?>">Về chúng tôi</a></li>
                <li><a href="<?php echo _WEB_ROOT.'/home/contact'; ?>">Liên hệ</a></li>
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
                                <li class="active"><a href="<?php echo _WEB_ROOT.'/'; ?>">Trang chủ</a></li>
                                <li><a href="#">Công thức</a></li>
                                <li><a href="#">Thực đơn</a></li>
                                <li><a href="#">Món ăn vặt</a></li>
                                <li><a href="<?php echo _WEB_ROOT.'/home/about'; ?>">Giới thiệu</a></li>
                                <li><a href="<?php echo _WEB_ROOT.'/home/contact'; ?>">Liên hệ</a></li>
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
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <?php if(!empty($_COOKIE['token'])) :?>
                        <div class="header__btn d-flex align-items-center flex-column text-center">
                            <p><?php echo $data->user_name; ?></p>
                            <a href="<?php echo _WEB_ROOT.'/home/logout'; ?>" class="primary-btn" style="width: 150px;">Đăng xuất</a>
                        </div>
                    <?php else : ?>
                        <div class="header__btn d-flex align-items-center flex-column text-center">
                            <div>
                                <a href="<?php echo _WEB_ROOT.'/login'; ?>" class="primary-btn" style="width: 150px;">Đăng nhập</a>
                            </div>
                            <div class="mt-2">
                                <a href="<?php echo _WEB_ROOT.'/register'; ?>" class="primary-btn" style="width: 150px;">Đăng ký</a>
                            </div>
                        </div>
                    <?php endif;?>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__logo">
                        <a href="<?php echo _WEB_ROOT.'/'; ?>"><img src="/mvc_mefoodblog/public/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-envelope-o"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->