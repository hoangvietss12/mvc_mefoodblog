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
                        <form action="#">
                            <input type="text" placeholder="User Name*">
                            <input type="text" placeholder="Password">
                            <input type="text" placeholder="Confirm Password">
                            <input type="text" placeholder="Email Address">
                            <input type="text" placeholder="Full Name">
                            <label for="sign-agree-check">
                                I agree to the terms & conditions
                                <input type="checkbox" id="sign-agree-check">
                                <span class="checkmark"></span>
                            </label>
                            <button type="submit" class="site-btn">Register Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sign In Section End -->

<?php
    include_once (_DIR_ROOT . '/views/layouts/footer.php');
?>