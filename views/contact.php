<?php 
    include_once(_DIR_ROOT.'/views/layouts/header.php');
?>

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="contact__text">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb__text">
                            <h2>Liên hệ</h2>
                            <div class="breadcrumb__option">
                                <a href="#">Trang chủ</a>
                                <span>Liên hệ</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="contact__map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96748.5538666784!2d-74.25209557318462!3d40.73139236772185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25370329a0e1d%3A0xe1bcdc2adcfee473!2sNewark%2C%20NJ%2C%20USA!5e0!3m2!1sen!2sbd!4v1585643782289!5m2!1sen!2sbd"
                                height="350" style="border:0;" allowfullscreen="" aria-hidden="false"
                                tabindex="0"></iframe>
                        </div>
                        <div class="contact__widget">
                            <ul>
                                <li>
                                    <i class="fa fa-map-marker"></i>
                                    <span>29 P. Liễu Giai, Ngọc Khánh, Ba Đình, Hà Nội, Việt Nam</span>
                                </li>
                                <li>
                                    <i class="fa fa-mobile"></i>
                                    <span>Phone: 258-556-189</span>
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o"></i>
                                    <span>Email: nguyentrongviethoang.12@gmail.com</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="contact__form">
                            <div class="contact__form__title">
                                <h2>Liên hệ với tôi</h2>
                                <p>Cùng đồng hành với tôi để phát triển cộng đồng MeFood Blog trở nên lớn mạnh nào!</p>
                            </div>
                            <form action="#">
                                <input type="text" placeholder="Tên của bạn">
                                <input type="text" placeholder="Email">
                                <textarea placeholder="Lời nhắn"></textarea>
                                <button type="submit" class="site-btn">Gửi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

<?php 
    include_once(_DIR_ROOT.'/views/layouts/footer.php');
?>