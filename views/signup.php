<?php
include_once (_DIR_ROOT . '/views/layouts/header.php');
?>

<!-- Sign In Section Begin -->
<div class="signin">
    <div class="signin__warp">
        <div class="signin__content">
            <h2 class="signin__title">Đăng ký</h2>
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
                        <form action="<?php echo _WEB_ROOT . '/register/signup'; ?>" method="POST">
                            <div class="form-group">
                                <input type="text" placeholder="Họ và tên" name="fullname"
                                    value="<?php echo $fullname ?? ''; ?>">
                                <span class="text-danger">
                                    <?php echo $errors['fullname'] ?? ''; ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Tên đăng nhập" name="username"
                                    value="<?php echo $username ?? ''; ?>">
                                <span class="text-danger">
                                    <?php echo $errors['username'] ?? ''; ?>
                                </span>
                            </div>
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
                            <div class="form-group">
                                <input type="password" placeholder="Nhập lại mật khẩu" name="confirm_password">
                                <span class="text-danger">
                                    <?php echo $errors['confirm_password'] ?? ''; ?>
                                </span>
                            </div>
                            <label for="sign-agree-check">
                                Tôi đồng ý với điều khoản và chính sách
                                <input type="checkbox" id="sign-agree-check" required>
                                <span class="checkmark"></span>
                            </label>
                            <button type="submit" class="site-btn">Đăng ký</button>
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

<?php if(isset($message)): ?>
    <script>
        $(document).ready(function() {
            $('#errorModal').modal('show');
        });
    </script>
<?php endif; ?>