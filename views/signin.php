<?php
    include_once (_DIR_ROOT . '/views/layouts/header.php');
?>

<!-- Sign In Section Begin -->
<div class="signin">
    <div class="signin__warp">
        <div class="signin__content">
            <h2 class="signin__title">Đăng nhập</h2>
            <div class="signin__form">
                <div class="tab-content">
                    <div class="signin__form__text">
                        <!-- <p>with your social network :</p>
                                <div class="signin__form__signup__social">
                                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="google"><i class="fa fa-google"></i></a>
                                </div> -->
                        <!-- <div class="divide">or</div> -->
                        <form action="<?php echo _WEB_ROOT . '/login/signin'; ?>" method="POST">
                            <div class="form-group">
                                <input type="text" placeholder="Email" name="email" value="<?php echo $email ?? ''; ?>">
                                <span class="text-danger">
                                    <?php echo $errors['email'] ?? ''; ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Mật khẩu" name="password"
                                    value="<?php echo $password ?? ''; ?>">
                                <span class="text-danger">
                                    <?php echo $errors['password'] ?? ''; ?>
                                </span>
                            </div>
                            <button type="submit" class="site-btn">Đăng nhập</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <?php
    include_once (_DIR_ROOT . '/views/components/modal.php');
    ?>
</div>
<!-- Sign In Section End -->

<?php
    include_once (_DIR_ROOT . '/views/layouts/footer.php');
?>