<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

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
    <?php include("./header.php");
    ?>

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

        <br><br><br><br><br>

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
                            <img src="assets/img/home_5/about/<?= $home_content['image']; ?>" width="544px"
                                height="704px" alt="">
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
        <section id="hap-footer" class="hap-footer-section">

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