<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quiz Site</title>
    <meta name="description" content="Haptic - Web And Agency HTML Template">
    <meta name="keywords"
        content="agency, app, business, company, corporate, designer, freelance, fullpage, modern, office, personal, portfolio, professional, web, web agency">
    <meta name="author" content="Themexriver">
    <link rel="shortcut icon" href="assets/img/logo/f-icon.png" type="image/x-icon">
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include("./links.php"); ?>
    <?php if (isset($_COOKIE['email']) && isset($_COOKIE['login'])) : ?>
    <script src="assets/js/admin-edit.js" defer></script>
    <?php endif; ?>
</head>

<body class="haptic-home">
    <div id="preloader"></div>
    <div class="up">
        <a href="#" class="scrollup text-center"><i class="fas fa-chevron-up"></i></a>
    </div>
    <div class="cursor"></div>
    <!-- Start of Header section
	============================================= -->
    <?php include("./header.php"); ?>

    <div class="content" id="editable-content">
        <!-- Sidebar sidebar Item -->
        <div class="xs-sidebar-group info-group">
            <div class="xs-overlay xs-bg-black">
                <div class="row loader-area">
                    <div class="col-3 preloader-wrap">
                        <div class="loader-bg"></div>
                    </div>
                    <div class="col-3 preloader-wrap">
                        <div class="loader-bg"></div>
                    </div>
                    <div class="col-3 preloader-wrap">
                        <div class="loader-bg"></div>
                    </div>
                    <div class="col-3 preloader-wrap">
                        <div class="loader-bg"></div>
                    </div>
                </div>
            </div>
            <div class="xs-sidebar-widget" data-background="assets/img/bg/texture.png">
                <div class="sidebar-widget-container">
                    <div class="widget-heading">
                        <a href="#" class="close-side-widget text-uppercase">
                            <i class="fal fa-times"></i> Close
                        </a>
                    </div>
                    <div class="sidebar-textwidget">

                        <!-- Sidebar Info Content -->
                        <div class="sidebar-info-contents headline pera-content">
                            <div class="content-inner">
                                <div class="sidebar-logo">
                                    <a href="#"><img src="assets/img/logo/logo2.png" alt=""></a>
                                </div>
                                <div class="sidebar-menu ul-li-block">
                                    <ul>
                                        <li><a href="about.html"><i class="fal fa-home"></i> About Us </a></li>
                                        <li><a href="service.html"><i class="fal fa-cogs"></i> Service </a></li>
                                        <li><a href="testimonila.html"><i class="fal fa-comments-alt"></i> Testimonial
                                            </a>
                                        </li>
                                        <li><a href="team.html"><i class="fal fa-users"></i> Our Team </a></li>
                                        <li><a href="portfolio.html"><i class="fal fa-briefcase"></i> Portfolio </a>
                                        </li>
                                        <li><a href="blog.html"><i class="fal fa-blog"></i> Blog </a></li>
                                        <li><a href="contact.html"><i class="fal fa-envelope"></i> Contact </a></li>
                                    </ul>
                                </div>
                                <div class="sidebar-more-menu text-uppercase d-flex ul-li">
                                    <span>More:</span>
                                    <ul>
                                        <li><a href="#">My Account </a></li>
                                        <li><a href="#">Job Apply </a></li>
                                        <li><a href="#">Privacy Policy </a></li>
                                    </ul>
                                </div>
                                <div class="sidebar-social ul-li-block">
                                    <span>Social:</span>
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i> Facebook</a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                                        <li><a href="#"><i class="fab fa-dribbble"></i> Dribble</a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                                    </ul>
                                </div>
                                <div class="sidebar-copyright text-center">
                                    © Copyright 2023. All Rights Reserved.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- sidebar cart start -->
        <div class="cart_sidebar">
            <div class="cart_sidebar_top">
                <h2 class="heading_title">Cart</h2>
                <button class="cart_close_btn tx-close"></button>
            </div>
            <div class="cart_items_list">
                <div class="cart_item">
                    <div class="item_image">
                        <img src="assets/img/shop/s_img1.jpg" alt="image_not_found">
                    </div>
                    <div class="item_content headline">
                        <h4 class="item_title">
                            Rorem ipsum dolor sit amet.
                        </h4>
                        <span class="item_price">$19.00</span>
                        <button class="remove_btn"><i class="fal fa-times"></i></button>
                    </div>
                </div>
                <div class="cart_item">
                    <div class="item_image">
                        <img src="assets/img/shop/s_img2.jpg" alt="image_not_found">
                    </div>
                    <div class="item_content headline">
                        <h4 class="item_title">
                            Rorem ipsum dolor sit amet.
                        </h4>
                        <span class="item_price">$22.00</span>
                        <button class="remove_btn"><i class="fal fa-times"></i></button>
                    </div>
                </div>
                <div class="cart_item">
                    <div class="item_image">
                        <img src="assets/img/shop/s_img3.jpg" alt="image_not_found">
                    </div>
                    <div class="item_content headline">
                        <h4 class="item_title">
                            Rorem ipsum dolor sit amet.
                        </h4>
                        <span class="item_price">$43.00</span>
                        <button class="remove_btn"><i class="fal fa-times"></i></button>
                    </div>
                </div>
                <div class="cart_item">
                    <div class="item_image">
                        <img src="assets/img/shop/s_img4.jpg" alt="image_not_found">
                    </div>
                    <div class="item_content headline">
                        <h4 class="item_title">
                            Rorem ipsum dolor sit amet.
                        </h4>
                        <span class="item_price">$14.00</span>
                        <button class="remove_btn"><i class="fal fa-times"></i></button>
                    </div>
                </div>
            </div>
            <div class="cart_sidebar_bottom">
                <div class="total_price">
                    <span>Sub Total:</span>
                    <span>$87.00</span>
                </div>
                <div class="cart_sidebar_button">
                    <a href="#">View Cart</a>
                    <a href="#">Checkout</a>
                </div>
            </div>
        </div>
        <!-- search filed -->
        <div class="search-body">
            <div class="search-form">
                <form action="#" class="search-form-area">
                    <input class="search-input" type="search" placeholder="Search Here">
                    <button type="submit" class="search-btn1">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                <div class="outer-close text-center search-btn">
                    <i class="far fa-times"></i>
                </div>
            </div>
        </div>
        <!-- End of Header section
	============================================= -->



        <!-- Start of About section
	============================================= -->
        <section id="hap-about" class="hap-about-section">
            <div class="container">
                <div class="hap-about-content position-relative">
                    <div class="hap-about-img-area position-absolute wow slideInLeft" data-wow-delay="50ms"
                        data-wow-duration="2000ms">
                        <span class="about-shape1 position-absolute"><img src="assets/img/home_5/shape/sh1.png" alt=""
                                data-parallax='{"x" : -50}'></span>
                        <span class="about-shape2 position-absolute"><img src="assets/img/home_5/shape/sh2.png" alt=""
                                data-parallax='{"x" : 50}'></span>
                        <div class="about-img">
                            <img src="assets/img/home_5/about/ab1.png" alt="">
                        </div>
                        <div class="about-exp hap-headline position-absolute">
                            <h3><strong class="counter">32</strong>+</h3>
                            <span>Years
                                Experinece</span>
                        </div>
                    </div>
                    <div class="hap-about-text-wrapper d-flex justify-content-end">
                        <div class="hap-about-text-area">
                            <div class="hap-section-title bins-text hap-headline pera-content">
                                <div class="sub-title text-uppercase wow fadeInRight" data-wow-delay="200ms"
                                    data-wow-duration="1000ms">
                                    OVER 150.000+ CLIENTS
                                </div>
                                <h2 class="text-uppercase headline-title">creative roblem
                                    solving innovations</h2>
                                <p>On the other hand, We denounce with righteous indignation And Dislike men who are
                                    beguiled and demoralized the Charms of Pleasure At vero eos et</p>
                            </div>
                            <div
                                class="hap-about-feature-area d-flex justify-content-between flex-wrap position-relative">
                                <div class="hap-about-feature-item d-flex align-items-center wow fadeInUp"
                                    data-wow-delay="200ms" data-wow-duration="1000ms">
                                    <div class="feature-icon">
                                        <img src="assets/img/home_5/icon/ic1.png" alt="">
                                    </div>
                                    <div class="feature-text hap-headline">
                                        <h3>Brand Strategy &
                                            Art Direction</h3>
                                    </div>
                                </div>
                                <div class="hap-about-feature-item d-flex align-items-center wow fadeInUp"
                                    data-wow-delay="300ms" data-wow-duration="1000ms">
                                    <div class="feature-icon">
                                        <img src="assets/img/home_5/icon/ic2.png" alt="">
                                    </div>
                                    <div class="feature-text hap-headline">
                                        <h3>UX/UI Design &
                                            Website/App Design</h3>
                                    </div>
                                </div>
                                <div class="hap-about-feature-item d-flex align-items-center wow fadeInUp"
                                    data-wow-delay="400ms" data-wow-duration="1000ms">
                                    <div class="feature-icon">
                                        <img src="assets/img/home_5/icon/ic3.png" alt="">
                                    </div>
                                    <div class="feature-text hap-headline">
                                        <h3>Trendinf designing
                                            experience.</h3>
                                    </div>
                                </div>
                                <div class="hap-about-feature-item d-flex align-items-center wow fadeInUp"
                                    data-wow-delay="500ms" data-wow-duration="1000ms">
                                    <div class="feature-icon">
                                        <img src="assets/img/home_5/icon/ic4.png" alt="">
                                    </div>
                                    <div class="feature-text hap-headline">
                                        <h3>Brand Strategy &
                                            Art Direction</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="hap-btn text-uppercase wow flipInX" data-wow-delay="500ms"
                                data-wow-duration="1000ms">
                                <a href="about.html">about Us <i class="far fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of About section
	============================================= -->

        <!-- Start of Service section
	============================================= -->
        <section id="hap-service" class="hap-service-section position-relative"
            data-background="assets/img/home_5/bg/service-bg.jpg">
            <div class="container">
                <div class="hap-section-title hap-headline dark-bg-title text-center pera-content">
                    <div class="sub-title text-uppercase wow fadeInRight" data-wow-delay="200ms"
                        data-wow-duration="1000ms">
                        web design & development
                    </div>
                    <h2 class="text-uppercase headline-title">We Empower
                        Clients to be loved</h2>
                </div>
                <div class="hap-service-content">
                    <div class="hap-service-item  hap-img-animation position-relative d-flex justify-content-between">
                        <div class="hap-service-title-icon d-flex align-items-center">
                            <div class="service-icon">
                                <i class="flaticon-profit"></i>
                            </div>
                            <div class="service-title hap-headline">
                                <h3><a href="portfolio-single.html"> Development</a></h3>
                                <span class="text-uppercase">Guarenteed quality control</span>
                            </div>
                        </div>
                        <div class="hap-service-category-arrow d-flex align-items-center">
                            <div class="service-category text-uppercase">
                                <a href="#">Creative</a>
                                <a href="#">accessiblilty</a>
                            </div>
                            <div class="service-arrow">
                                <a href="portfolio-single.html"><i class="fas fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="service-hover d-none d-md-block" data-background="assets/img/home_5/about/faq2.jpg">
                        </div>
                    </div>
                    <div class="hap-service-item hap-img-animation position-relative d-flex justify-content-between">
                        <div class="hap-service-title-icon d-flex align-items-center">
                            <div class="service-icon">
                                <i class="flaticon-profit"></i>
                            </div>
                            <div class="service-title hap-headline">
                                <h3><a href="portfolio-single.html"> Marketing</a></h3>
                                <span class="text-uppercase">Guarenteed quality control</span>
                            </div>
                        </div>
                        <div class="hap-service-category-arrow d-flex align-items-center">
                            <div class="service-category text-uppercase">
                                <a href="portfolio.html">Creative</a>
                                <a href="portfolio.html">accessiblilty</a>
                            </div>
                            <div class="service-arrow">
                                <a href="portfolio-single.html"><i class="fas fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="service-hover d-none d-md-block" data-background="assets/img/home_5/about/faq2.jpg">
                        </div>
                    </div>
                    <div class="hap-service-item hap-img-animation position-relative d-flex justify-content-between">
                        <div class="hap-service-title-icon d-flex align-items-center">
                            <div class="service-icon">
                                <i class="flaticon-profit"></i>
                            </div>
                            <div class="service-title hap-headline">
                                <h3><a href="portfolio-single.html"> Branding & SEO</a></h3>
                                <span class="text-uppercase">Guarenteed quality control</span>
                            </div>
                        </div>
                        <div class="hap-service-category-arrow d-flex align-items-center">
                            <div class="service-category text-uppercase">
                                <a href="portfolio.html">Creative</a>
                                <a href="portfolio.html">accessiblilty</a>
                            </div>
                            <div class="service-arrow">
                                <a href="portfolio-single.html"><i class="fas fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="service-hover d-none d-md-block" data-background="assets/img/home_5/about/faq2.jpg">
                        </div>
                    </div>
                    <div class="hap-service-item hap-img-animation position-relative d-flex justify-content-between">
                        <div class="hap-service-title-icon d-flex align-items-center">
                            <div class="service-icon">
                                <i class="flaticon-profit"></i>
                            </div>
                            <div class="service-title hap-headline">
                                <h3><a href="portfolio-single.html"> UI/UX Design</a></h3>
                                <span class="text-uppercase">Guarenteed quality control</span>
                            </div>
                        </div>
                        <div class="hap-service-category-arrow d-flex align-items-center">
                            <div class="service-category text-uppercase">
                                <a href="portfolio.html">Creative</a>
                                <a href="portfolio.html">accessiblilty</a>
                            </div>
                            <div class="service-arrow">
                                <a href="portfolio-single.html"><i class="fas fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="service-hover d-none d-md-block" data-background="assets/img/home_5/about/faq2.jpg">
                        </div>
                    </div>
                </div>
                <div class="hap-service-scroll-text-area hap-headline">
                    <div class="hap-section-title hap-headline dark-bg-title text-center pera-content">
                        <div class="sub-title text-uppercase">
                            More than 200+ companies trusted us worldwide
                        </div>
                    </div>
                    <h2 class="text-uppercase">
                        innovated
                        <div class="text_scroller_1 scroller_item_1 ul-li">
                            <ul>
                                <li>Creative</li>
                                <li>SEO</li>
                                <li>HTML</li>
                                <li>Development</li>
                            </ul>
                        </div>
                        on-side
                    </h2>
                    <h2 class="text-uppercase">
                        Search Engine <span class="strock_txt"> Experts</span>
                        <img src="assets/img/home_5/about/sr1.png" alt="">
                    </h2>
                    <h2 class="text-uppercase">
                        <span class="text_scroller_2 scroller_item_1 ul-li"
                            data-background="assets/img/home_5/bg/scroll-bg.png">
                            <ul>
                                <li>Creative</li>
                                <li>SEO</li>
                                <li>HTML</li>
                                <li>Development</li>
                            </ul>
                        </span>
                        Social Marketing
                    </h2>
                    <h2 class="text-uppercase">
                        <span class="strock_txt">since 2015</span>
                        <div class="text_scroller_3 scroller_item_1 ul-li">
                            <ul>
                                <li>Creative</li>
                                <li>SEO</li>
                                <li>HTML</li>
                                <li>Development</li>
                                <li>Email Marketing</li>
                            </ul>
                        </div>
                    </h2>
                </div>
            </div>
        </section>
        <!-- End of Service section
	============================================= -->


        <!-- Start of Counter section
	============================================= -->
        <section id="hap-counter" class="hap-counter-section  position-relative">
            <div class="container">
                <div class="hap-counter-content">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-md-6">
                            <div class="hap-counter-item position-relative hap-headline pera-content">
                                <h3><span class="counter">28</span>K</h3>
                                <p>Year Of Experience</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="hap-counter-item position-relative hap-headline pera-content">
                                <h3><span class="counter">4</span>K</h3>
                                <p>Projects Completed</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="hap-counter-item position-relative hap-headline pera-content">
                                <h3><span class="counter">12</span>K</h3>
                                <p>Happy Customers</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="hap-counter-item position-relative hap-headline pera-content">
                                <h3><span class="counter">17</span>K</h3>
                                <p>Happy Customers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Counter section
	============================================= -->

        <!-- Start of Testimonial section
	============================================= -->
        <section id="hap-testimonial" class="hap-testimonial-section position-relative"
            data-background="assets/img/home_5/bg/test-bg.png">
            <div class="container">
                <div class="hap-testimonial-content position-relative">
                    <div class="hap-testimonial-slider swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="hap-testimonial-item d-flex align-items-center justify-content-center">
                                    <div class="testimoial-img position-relative">
                                        <img src="assets/img/home_5/about/tst1.png" alt="">
                                    </div>
                                    <div class="testimoial-text-author position-relative" data-background="">
                                        <div class="testimonial-desc">
                                            On the other hand, We denounce with righteous indignation And Dislike men
                                            who
                                            are beguiled and demoralized the Charms of Pleasure At vero eos et accusamus
                                            et
                                            iusto odio Dignis
                                        </div>
                                        <div class="testimonial-author hap-headline">
                                            <h3>Mike Hardson</h3>
                                            <span>Director</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="hap-testimonial-item d-flex align-items-center justify-content-center">
                                    <div class="testimoial-img position-relative">
                                        <img src="assets/img/home_5/about/tst1.png" alt="">
                                    </div>
                                    <div class="testimoial-text-author position-relative" data-background="">
                                        <div class="testimonial-desc">
                                            On the other hand, We denounce with righteous indignation And Dislike men
                                            who
                                            are beguiled and demoralized the Charms of Pleasure At vero eos et accusamus
                                            et
                                            iusto odio Dignis
                                        </div>
                                        <div class="testimonial-author hap-headline">
                                            <h3>Mike Hardson</h3>
                                            <span>Director</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="hap-testimonial-item d-flex align-items-center justify-content-center">
                                    <div class="testimoial-img position-relative">
                                        <img src="assets/img/home_5/about/tst1.png" alt="">
                                    </div>
                                    <div class="testimoial-text-author position-relative" data-background="">
                                        <div class="testimonial-desc">
                                            On the other hand, We denounce with righteous indignation And Dislike men
                                            who
                                            are beguiled and demoralized the Charms of Pleasure At vero eos et accusamus
                                            et
                                            iusto odio Dignis
                                        </div>
                                        <div class="testimonial-author hap-headline">
                                            <h3>Mike Hardson</h3>
                                            <span>Director</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hap-carousel-arrow-next-prev  d-flex">
                        <div
                            class="hap-slider-arrow d-flex justify-content-center align-items-center hap-testimonial-button-prev">
                            <i class="far fa-long-arrow-left"></i>
                        </div>
                        <div
                            class="hap-slider-arrow d-flex justify-content-center align-items-center hap-testimonial-button-next">
                            <i class="far fa-long-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Testimonial section
	============================================= -->


        <!-- Start of Footer section
	============================================= -->
        <section id="hap-footer" class="hap-footer-section" data-background="assets/img/home_5/bg/footer-bg.jpg">
            <div class="hap-footer-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="hap-footer-widget hap-headline pera-content">
                                <div class="logo-widget">
                                    <div class="brand-logo">
                                        <a href="#"><img src="assets/img/logo/logo2.png" alt=""></a>
                                    </div>
                                    <p>Made using clean, non-toxic ingredients, our products are signed for everyone.
                                        Made
                                        using clean, non-toxic</p>
                                    <div class="logo-cta ul-li-block">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-map-marker-alt"></i> Address: No 40 Baria,
                                                    US</a></li>
                                            <li><a href="#"><i class="fas fa-envelope"></i> Email: envato@gmail.com</a>
                                            </li>
                                            <li><a href="#"><i class="fas fa-phone"></i>Phone: (+123) 938 9832</a></li>
                                        </ul>
                                    </div>
                                    <div class="hap-contact-social text-uppercase d-flex">
                                        <a href="#"><i class="fab fa-facebook-f"></i> Facebook</a>
                                        <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="hap-footer-widget hap-headline pera-content">
                                <div class="menu-widget ul-li-block">
                                    <h3 class="widget-title text-uppercase">quick links</h3>
                                    <ul>
                                        <li><a href="#">FAQ</a></li>
                                        <li><a href="#">Trems Condition</a></li>
                                        <li><a href="#">Payment info</a></li>
                                        <li><a href="#">Privacy Notice</a></li>
                                        <li><a href="#">Billing</a></li>
                                        <li><a href="#">Size Chart</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="hap-footer-widget hap-headline pera-content">
                                <div class="menu-widget ul-li-block">
                                    <h3 class="widget-title text-uppercase">categories</h3>
                                    <ul>
                                        <li><a href="#">Cosmatic </a></li>
                                        <li><a href="#">Services</a></li>
                                        <li><a href="#">Payment info</a></li>
                                        <li><a href="#">Size Chart</a></li>
                                        <li><a href="#">Women Product</a></li>
                                        <li><a href="#">Billing</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="hap-footer-widget hap-headline pera-content">
                                <div class="newslatter-widget">
                                    <h3 class="widget-title text-uppercase">subcribe</h3>
                                    <p>You can be always date with our company news</p>
                                    <form action="#" method="get">
                                        <input type="email" name="email" placeholder="Subcribe email">
                                        <button><i class="fal fa-long-arrow-right"></i></button>
                                    </form>
                                    <div class="tranding-service ul-li">
                                        <h4 class="text-uppercase">Trending services</h4>
                                        <ul>
                                            <li><a href="#"><img src="assets/img/home_5/icon/ic8.png" alt=""></a></li>
                                            <li><a href="#"><img src="assets/img/home_5/icon/ic9.png" alt=""></a></li>
                                            <li><a href="#"><img src="assets/img/home_5/icon/ic10.png" alt=""></a></li>
                                            <li><a href="#"><img src="assets/img/home_5/icon/ic11.png" alt=""></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hap-footer-copyright text-center">
                © 2024 All Rights Reserved.
            </div>
        </section>
        <!-- End of Footer section
	============================================= -->
    </div>
    <?php include("./scripts.php") ?>
    <!-- Save button -->
    <!-- Save button -->
    <button id="save-button"
        style="display:none; position:fixed; bottom:10px; right:10px; padding:10px 20px; background-color:#28a745; color:#fff; border:none; border-radius:5px;">Save
        Changes</button>
</body>

</html>