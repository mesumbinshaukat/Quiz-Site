<?php

include("./admin/connection/connection.php");

$fetch_logo = "SELECT * FROM `db_logo` WHERE `id` = 1";
$logo = mysqli_query($conn, $fetch_logo);
$logo = mysqli_fetch_assoc($logo);

$fetch_contact = "SELECT * FROM `db_contact` WHERE `id` = 1";
$contact = mysqli_query($conn, $fetch_contact);
$contact = mysqli_fetch_assoc($contact);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Haptic - Contact</title>
    <meta name="description" content="Haptic - Web And Agency HTML Template">
    <meta name="keywords" content="agency, app, business, company, corporate, designer, freelance, fullpage, modern, office, personal, portfolio, professional, web, web agency">
    <meta name="author" content="Themexriver">
    <link rel="shortcut icon" href="assets/img/logo/f-icon.png" type="image/x-icon">
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/flaticon_aina.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="home-1">
    <div id="preloader"></div>
    <div class="up">
        <a href="#" class="scrollup text-center"><i class="fas fa-chevron-up"></i></a>
    </div>
    <div class="cursor"></div>

    <!-- Start of header section
	============================================= -->
    <?php include("./header.php");
    ?>
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
        <div class="xs-sidebar-widget">
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
                                    <li><a href="testimonila.html"><i class="fal fa-comments-alt"></i> Testimonial </a>
                                    </li>
                                    <li><a href="team.html"><i class="fal fa-users"></i> Our Team </a></li>
                                    <li><a href="portfolio.html"><i class="fal fa-briefcase"></i> Portfolio </a></li>
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

    <!-- End of header section
	============================================= -->

    <br><br><br><br>
    <!-- Start of contact info section
	============================================= -->
    <section id="bi-contact-info" class="bi-contact-info-section inner-page-padding">
        <div class="container">
            <div class="bi-contact-info-content">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="bi-contact-info-item position-relative">
                            <span class="info-bg position-absolute" data-background="assets/img/bg/ci-bg1.jpg"></span>
                            <div class="inner-icon d-flex justify-content-center align-items-center">
                                <img src="assets/img/icon/ci2.png" alt="">
                            </div>
                            <div class="inner-text headline pera-content">
                                <h3>Email Address</h3>
                                <a href="#"><?= $contact['email_one'] ?></a>
                                <a href="#"><?= $contact['email_two'] ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="bi-contact-info-item position-relative">
                            <span class="info-bg position-absolute" data-background="assets/img/bg/ci-bg1.jpg"></span>
                            <div class="inner-icon d-flex justify-content-center align-items-center">
                                <img src="assets/img/icon/ci1.png" alt="">
                            </div>
                            <div class="inner-text headline pera-content">
                                <h3>Phone Number</h3>
                                <a href="#"><?= $contact['contact_number_one'] ?></a>
                                <a href="#"><?= $contact['contact_number_two'] ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="bi-contact-info-item position-relative">
                            <span class="info-bg position-absolute" data-background="assets/img/bg/ci-bg1.jpg"></span>
                            <div class="inner-icon d-flex justify-content-center align-items-center">
                                <img src="assets/img/icon/ci3.png" alt="">
                            </div>
                            <div class="inner-text headline pera-content">
                                <h3>Location / Address</h3>
                                <a href="#"><?= $contact['address'] ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of contact info section
	============================================= -->

    <br><br>

    <!-- Start of Footer  section
	============================================= -->
    <footer id="bi-footer" class="bi-footer-section">
        <div class="hap-footer-copyright text-center">
            © 2024 All Rights Reserved.
        </div>
    </footer>
    <!-- End of Footer  section
	============================================= -->


    <!-- For Js Library -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/appear.js"></script>
    <script src="assets/js/counter.js"></script>
    <script src="assets/js/gsap.min.js"></script>
    <script src="assets/js/knob.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/parallax.min.js"></script>
    <script src="assets/js/ScrollTrigger.min.js"></script>
    <script src="assets/js/ScrollToPlugin.min.js"></script>
    <script src="assets/js/ScrollSmoother.min.js"></script>
    <script src="assets/js/SplitText.min.js"></script>
    <script src="assets/js/jquery.filterizr.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/hover-revel.js"></script>
    <script src="assets/js/split-type.min.js"></script>
    <script src="assets/js/parallax-scroll.js"></script>
    <script src="assets/js/jquery.marquee.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/jquery.meanmenu.min.js"></script>
    <script src="assets/js/tilt.jquery.min.js"></script>
    <script src="assets/js/matter.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>