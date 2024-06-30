<?php

include("./admin/connection/connection.php");

$fetch_logo = "SELECT * FROM `db_logo` WHERE `id` = 1";
$logo = mysqli_query($conn, $fetch_logo);
$logo = mysqli_fetch_assoc($logo);

$fetch_home_content = "SELECT * FROM `db_home` WHERE `id` = 1";
$home_content = mysqli_query($conn, $fetch_home_content);
$home_content = mysqli_fetch_assoc($home_content);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quiz Site</title>
    <meta name="description" content="Haptic - Web And Agency HTML Template">
    <meta name="keywords"
        content="agency, app, business, company, corporate, designer, freelance, fullpage, modern, office, personal, portfolio, professional, web, web agency">
    <meta name="author" content="Themexriver">
    <link rel="shortcut icon" href="./logo/<?php echo $logo['logo']; ?>" type="image/x-icon">
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include("./links.php"); ?>

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

    <div class="content">
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
                                        <li><a href="about.php"><i class="fal fa-home"></i> About Us </a></li>

                                        <li><a href="contact.html"><i class="fal fa-envelope"></i> Contact </a></li>
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
                                    © Copyright 2024. All Rights Reserved.
                                </div>
                            </div>
                        </div>
                    </div>
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
                            <img src="assets/img/home_5/about/<?= $home_content['image']; ?>" alt="">
                        </div>
                        <div class="about-exp hap-headline position-absolute">
                            <h3><strong class="counter"><?= $home_content['experience']; ?></strong>+</h3>
                            <span>Years
                                Experinece</span>
                        </div>
                    </div>
                    <div class="hap-about-text-wrapper d-flex justify-content-end">
                        <div class="hap-about-text-area">
                            <div class="hap-section-title bins-text hap-headline pera-content">
                                <div class="sub-title text-uppercase wow fadeInRight" data-wow-delay="200ms"
                                    data-wow-duration="1000ms">
                                    <?= $home_content['subtitle']; ?>
                                </div>
                                <h2 class="text-uppercase headline-title"><?= $home_content['headline_title']; ?></h2>
                                <p><?= $home_content['paragraph']; ?></p>
                            </div>
                            <div
                                class="hap-about-feature-area d-flex justify-content-between flex-wrap position-relative">


                            </div>
                            <div class="hap-btn text-uppercase wow flipInX" data-wow-delay="500ms"
                                data-wow-duration="1000ms">
                                <a href="about.php">about Us <i class="far fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of About section
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

</body>

</html>